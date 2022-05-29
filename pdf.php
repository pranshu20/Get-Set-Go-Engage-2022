<?php
/* code for data entered into the form to send to my SQL database starts*/
if(!empty($_POST['submit']))
{
	$username=$_POST['username'];
    $ticketno = time();
    $destination=$_POST['destination'];
    $duration=$_POST['duration'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $address=$_POST['address'];
    $travelclass=$_POST['travelclass'];
    if(!empty($_FILES['image']['name']))
    {
            
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        
        $path = 'database/'.$name;
        
        move_uploaded_file($tmp_name,$path); // insert image into database folder
    }

	// Database connection
	$CONNECTION = new mysqli('localhost','root','','web');
	if($CONNECTION->connect_error){
		echo "$CONNECTION->connect_error";
		die("Connection Failed : ". $CONNECTION->connect_error);
	} else {
		$stmt = $CONNECTION->prepare("insert into people(username, ticketno, destination, duration, phone, date, address, travelclass, image) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssissss", $username,$ticketno, $destination, $duration, $phone, $date, $address, $travelclass, $name);
		$execval = $stmt->execute();
		//echo $execval;
		//echo "Registration successfully...";
		$stmt->close();
		$CONNECTION->close();
	}
    // making of pdf starts using fpdf
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf -> SetFont("Arial","B",30);
    
    // add logo
    $pdf->Image('travel_logo.jpeg', 75, 5);
    
    $pdf->SetXY(10, 80); 
    $pdf->Cell(0,20,'e-Ticket Receipt',0,1,'C');

    //making of table starts
    $fill = true; //to fill the color in the table 
    $pdf->SetFillColor(255, 165, 0);
    $pdf -> SetFont("Arial","B",20);
    $pdf -> Cell(0,30,"Travel Details",1,1,'C',$fill);
    $pdf -> SetFont("Arial","",16);
    $pdf->SetFillColor(224,235,255);
    $fill = false;
    //to fill the color in the table alternatively
    $pdf -> Cell(95,13,"Name",1,0,'C',$fill);
    $pdf -> Cell(95,13,$username,1,1,'C',$fill);

    $pdf -> Cell(95,13,"Ticket Number",1,0,'C',!$fill);
    $pdf -> Cell(95,13,$ticketno,1,1,'C',!$fill);

    $pdf -> Cell(95,13,"Destination",1,0,'C',$fill);
    $pdf -> Cell(95,13,$destination,1,1,'C',$fill);

    $pdf -> Cell(95,13,"Duration",1,0,'C',!$fill);
    $pdf -> Cell(95,13,$duration,1,1,'C',!$fill);

    $pdf -> Cell(95,13,"Phone No",1,0,'C',$fill);
    $pdf -> Cell(95,13,$phone,1,1,'C',$fill);

    $pdf -> Cell(95,13,"Date",1,0,'C',!$fill);
    $pdf -> Cell(95,13,$date,1,1,'C',!$fill);

    $pdf -> Cell(95,13,"Address",1,0,'C',$fill);
    $pdf -> Cell(95,13,$address,1,1,'C',$fill);

    $pdf -> Cell(95,13,"Travel Class",1,0,'C',!$fill);
    $pdf -> Cell(95,13,$travelclass,1,1,'C',!$fill);

    $pdf -> Write(10,'Your electronic ticket is stored in our computer system. This e-Ticket receipt is your record of your electronic ticket and forms part of carriage. You need to show this receipt to enter the airport and to prove return or onward travel to customs and immigration officials');
    $file = time().'.pdf';
    $pdf -> output($file,'I');
}
?>