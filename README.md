# Get-Set-Go

One stop application to book your flight ticket, Verify face and check-in at the airport by face recognition technology implemented using open-cv python which is safe and secured.

Link to deployed app:

See the video demo here:

#### GetSetGo Features:

- Book flight tickets online
- Book with mobile number so no hassles of remembering the passwords
- Verifying the face hardly takes 10-20 seconds so no need to stand in long queues to check in at the airport
- Recieve the pdf of booking details instantly as soon as you book and download it

## Tech Stack [MAMP/WAMP]

#### Frontend

- Frontend Language: `HTML`
- Frontend Framework: `Django`
- Styling: `CSS`

#### Backend

- Server: `Apache(xampp)`
- Database: `MySQL`
- Face Recognition Library: `OpenCV`
- Backend Language: `PHP`
- Backend Framework: `Django`

#### CI/CD

- Heroku

## ER Diagram

- User can create as many classes as they want. By default, whosoever creates the class is the teacher and the one who joins, is the student.
- Teacher can create as many MCQ quizzes and file based assignments.
- Students can make their individual submissions on MCQ/assignments.

## Application Setup Guidelines

1. Clone the project

   ```
   git clone https://github.com/pranshu20/Get-Set-Go-Engage-2022
   ```

2. Create a `.env` file in `/backend` folder, and setup [Environment Variables](environment-variables).

   ```
   MONGO_URI          : MongoDB connection string
   JWT_SECRET_KEY     : Secret key for signing JWT
   GOOGLE_CLIENT_ID   : Google client ID for Google OAuth
   AWS_BUCKET_NAME    : AWS S3 Bucket Name
   AWS_BUCKET_REGION  : AWS S3 Region, e.g. us-east-1
   AWS_ACCESS_KEY     : AWS S3 access key
   AWS_SECRET_KEY     : AWS S3 secret key

   ```

3. Create a `.env` file in `/client` folder, and setup [Environment Variables](environment-variables).

   ```
   REACT_APP_GOOGLE_CLIENT_ID   : Google client ID for Google OAuth
   ```

4. Run these commands then -
   ```
   npm install
   cd client
   npm install
   ```
5. To start the client and the server
   ```
   npm run server
   cd client
   npm start
   ```

## Screenshots

#### Home

![Home](./screenshots/Home.jpg)

#### Services

![services](./screenshots/Services.jpg)

#### Booking Form

![form](./screenshots/Form.jpg)

#### Pdf

![pdf](./screenshots/PDF.jpg)

#### Verification Page

![page](./screenshots/Verification page.jpg)

#### My SQL database

![sql-database](./screenshots/MySQL.jpg)

#### Quiz Performance- For Student

![quiz-result](./screenshots/QuizResults.png)

## Developer

https://www.linkedin.com/in/pranshu-goyal-390542198/
