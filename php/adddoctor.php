<html>
<head>
	<title>Online Doctor Appointment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/adminsuccess.css">
	<style>
	body 
	{
		background-image: url("../images/background.jpg");
		background-repeat: no-repeat;
		background-size: cover;
	}
	a{
		color: cyan;
	}
	h3{
		font-family:Georgia;
		font-size: 18px;
	}
  .input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}
label{
  font-size: 20px;
}
tr{
  font-size: 18px;
}
  button {
  background-color:dodgerblue;
  font-family: Georgia;
  font-size: 16px;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.cancelbtn{
  background-color: red;
}
.cancelbtn, .signupbtn {
  width: 40%;
}
.btn:hover {
  opacity: 1;
}
	</style>
</head>
<body>
	<header>
    <table>
      <tr>
        <td rowspan="3";><img src="../images/plus1.jpg" style="width:60%; height:120px;"></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><div class="navbar">
              <a href="../index.html"><i class="fa fa-sign-out"></i>Logout</a>
              <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-user-md"></i>Doctor</button>
                  <div class="dropdown-content">
                      <a href="#">Add Doctor</a>
                      <a href="viewdoctor.php">View Doctor</a>
                  </div>
             </div> 
              <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-hospital-o"></i>Department</button>
                  <div class="dropdown-content">
                      <a href="../html/adddepartment.html">Add Department</a>
                      <a href="adminviewdepartment.php">View Department</a>
                  </div>
             </div> 
        </div></td>
      </tr>
    </table>
  </header>
  <div class="register">
<form method="POST" action="doctordetails.php" enctype="multipart/form-data" style="max-width:500px;margin:auto">
  <fieldset>
    <legend><h2>Add Doctor</h2></legend>
  <div class="input-container"><label>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input class="input-field" type="text" oninvalid="InvalidMsg(this);" placeholder="Enter Name" name="name" required>
  </div>
<br>
  <div class="input-container"><label>Email id:&nbsp;&nbsp;</label>
    <input class="input-field" type="email" oninvalid="InvalidMsg(this);" placeholder="Enter email" name="email" required>
  </div>
<p>
    <label style="font-size: 20px;">Doctor Image:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="file" name="docimage" accept="image/*" oninvalid="InvalidMsg(this);" required><br></p>
    <div class="input-container"><label>Phone no:</label>
    <input class="input-field" type="text" placeholder="Enter Phone number" name="phoneno" oninvalid="InvalidMsg(this);" required>
  </div>
<br>
  <div class="input-container"><label>Address:</label><br>
    <textarea placeholder="Enter Address" rows="6" cols="65" oninvalid="InvalidMsg(this);" name="address" required></textarea>
  </div>
<br>
  <div class="input-container"><label>Date of Birth:</label>
    <input class="input-field" type=date name="dob" oninvalid="InvalidMsg(this);" required>
  </div>
<p><label>Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="gender" value="male" checked> Male&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="gender" value="female"> Female&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="gender" value="other"> Other </p> 
<div class="input-container"><label>Department:</label>
    <select class="input-field" name="department" oninvalid="InvalidMsg(this);" required>
	 <option disabled selected value> Select Department</option>
	 <?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select dname from department;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql)>=0)
			{
				while($row = mysqli_fetch_assoc($sql))
				{
					echo '<option value="'.$row['dname'].'">'.$row['dname'].'</option>'; 
				}
			}
		}
	}
?>
</select>
  </div>
<br>
  <div class="input-container"><label>Qualification:&nbsp;</label>
    <input class="input-field" type="text" placeholder="qualification" name="qualification" oninvalid="InvalidMsg(this);" required>
  </div>
<br>
<br>
  <div class="input-container"><label>Position:&nbsp;</label>
    <input class="input-field" type="text" placeholder="position" name="position" oninvalid="InvalidMsg(this);" required>
  </div>
<br>
<div class ="input-container"><label>Days available:</label>
<table><tr><td>
<input type="checkbox" name="day[]" value="Monday">Monday
<td><input type="checkbox" name="day[]" value="Tuesday">Tuesday
<td><input type="checkbox" name="day[]" value="Wednesday">Wednesday
<td><input type="checkbox" name="day[]" value="Thursday">Thursday</tr>
<tr><td><input type="checkbox" name="day[]" value="Friday">Friday
<td><input type="checkbox" name="day[]" value="Saturday">Saturday
<td><input type="checkbox" name="day[]" value="Sunday">Sunday</tr></table>
</div>
<br>
  <div class="input-container"><label>Timings:&nbsp;&nbsp;&nbsp;&nbsp;From:</label>
    <input  type="time" name="from_time" oninvalid="InvalidMsg(this);" required>
	<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:</label>
    <input type="time" name="to_time" oninvalid="InvalidMsg(this);" required>
  </div>
<br>
<div class="input-container"><label>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input class="input-field" type="password" placeholder="Enter Password" name="psword" oninvalid="InvalidMsg(this);" required>
  </div>
<br>
<div>
<center><button type="submit" class="signupbtn">Add</button>&nbsp;&nbsp;&nbsp;
  <button type="submit" class="cancelbtn" onclick="parent.location='../html/adminsuccess.html'">Cancel</button></center>
</div>
</fieldset>
</form>
</div>
<script>
function InvalidMsg(textbox) { 
            if (textbox.value == '') { 
				if(textbox.name=='name'){
                textbox.setCustomValidity('please enter your Name'); 
				}
				if(textbox.name=='email'){
                textbox.setCustomValidity('please enter your Email id'); 
				}
				if(textbox.name=='docimage'){
					textbox.setCustomValidity('Please upload image!'); 
				}
				if(textbox.name=='phoneno'){
                textbox.setCustomValidity('please enter your Phone number'); 
				}
				if(textbox.name=='address'){
                textbox.setCustomValidity('please enter your Address'); 
				}
				if(textbox.name=='dob'){
                textbox.setCustomValidity('please enter Date of Birth'); 
				}
				if(textbox.name=='department'){
                textbox.setCustomValidity('please select department'); 
				}
				if(textbox.name=='qualification'){
                textbox.setCustomValidity('please enter qualification'); 
				}
				if(textbox.name=='position'){
					textbox.setCustomValidity('Please enter position'); 
				}
				if(textbox.name=='from_time'){
                textbox.setCustomValidity('please enter the time from which doctor is available'); 
				}
				if(textbox.name=='to_time'){
                textbox.setCustomValidity('please enter the time till what time doctor will be available'); 
				}
				if(textbox.name=='psword'){
                textbox.setCustomValidity('please enter password'); 
				}
            } 
			else {
                textbox.setCustomValidity(''); 
            } 
            return true; 
        } 
</script>
</body>
</html>