from django.http import HttpResponse
from datetime import datetime
from django.shortcuts import render
import cv2
import numpy as np
import face_recognition
import os
from datetime import datetime
 
def home(request):
    
    path = '/Applications/XAMPP/xamppfiles/htdocs/webapp/database/' #specify path where images fetched into database are located
    images = [] 
    #classNames = []
    myList = os.listdir(path) #list of all images
    #print(myList)
    for cl in myList:
        curImg = cv2.imread(f'{path}/{cl}') #read every image
        images.append(curImg)
        #classNames.append(cl)
        #print(classNames)
    
    def findEncodings(images): #find encodings for all images
        encodeList = []
        for img in images:
            img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
            encode = (face_recognition.face_encodings(img)[0])
            encodeList.append(encode)
        return encodeList
    
    encodeListKnown = findEncodings(images)
    #print('Encoding Complete')
    #print(cv2.CAP_DSHOW)
    cap = cv2.VideoCapture(0) #to open webcam
    ans = ""
    i = 1
    verify = "" #to set verify
    while i<20: 
        success, img = cap.read()
        #print(success,img)
        imgS = cv2.resize(img,(0,0),None,0.25,0.25) #1/4th size of image so that algorithm works fast
        imgS = cv2.cvtColor(imgS, cv2.COLOR_BGR2RGB) #convert image to rgb
        
        facesCurFrame = face_recognition.face_locations(imgS)
        encodesCurFrame = face_recognition.face_encodings(imgS,facesCurFrame)
        
        for encodeFace,faceLoc in zip(encodesCurFrame,facesCurFrame):
            matches = face_recognition.compare_faces(encodeListKnown,encodeFace)
            faceDis = face_recognition.face_distance(encodeListKnown,encodeFace)
            matchIndex = np.argmin(faceDis)
        
            if matches[matchIndex]:
                name = myList[matchIndex]
                ans = name
                
        
        
        cv2.waitKey(1)
        i+=1
    if(ans) in myList:
        verify = "Verified"
    else:
        verify = "Not Verified"
    return render(
        request, "dj_app/home.html",
        {
            'ans' : ans,
            'verify' : verify
        }
    )

def hello(request, name):
    return render(
        request,
        'dj_app/hello.html',
        {
            'name': name,
            'date': datetime.now()
        }
    )