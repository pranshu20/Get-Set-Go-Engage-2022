<html>
   <head>
      <title>Insert A Record</title>
      <link rel="stylesheet" href="css/style1.css">
   </head>
   <body>
      <!-- title -->
   <h1 class="h-primary center">Book Flight</h1>
      <h5 class="h-primary center">Welcome to Get Set Go</h5>
      <form action='pdf.php' method="POST" class="booking-form" enctype="multipart/form-data">
         <!-- design fields -->
            <div>
                <p><label for="username">User Name</label></p>
                <input type="text" name="username" autocomplete="off" >
             </div>
             <div>
                <p><label for="destination">Destination</label></p>
                <input type="text" name="destination"  autocomplete="off">
             </div>
             <div>
               <p><label for="duration" class="form-label">Duration</label></p>
               <input class="form-control" list="days" name="duration" id="duration">
               <datalist id="days">
                  <option value="Any">
                  <option value="1 Day Tour">
                  <option value="2-4 Days Tour">
                  <option value="5-7 Days Tour">
                  <option value="7+ Days Tour">
               </datalist>
            </div>
             <div>
                <p><label for="phone">Phone No.</label></p>
                <input type="number" name="phone"  >
             </div>
             <div>
					<p><label for="date">Date</label></p>
					<input type="date" name="date" placeholder="Date">
				</div>
            <div>
               <p><label for="travelclass" class="form-label">Travel Class</label></p>
               <input class="form-control" list="classes" name="travelclass" id="travelclass">
               <datalist id="classes">
                  <option value="First Class">
                  <option value="Business Class">
                  <option value="Economy Class">
               </datalist>
            </div>
             <div>
                <p><label for="address">Address</label></p>
                <input type="text" name="address"  >
             </div>
             <!-- for input image -->
             <div class="controls">             
               <input type="file" class="span11" name="image" id="image" multiple />
               <img src="" id="profile-img-tag" alt="">
            </div>
            <!-- button -->
            <a href="pdf.php"> <button type="submit" value="submit" name="submit" id="btn">Book Now</button></a>
      </form>
   </body>
</html>


