<?php
session_start();
?>
<html>
<head>
  <title>Online Doctor Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/doctor.css">
  <link rel="stylesheet" href="../css/adminsuccess.css">
  <link rel="stylesheet" href="../css/adminviewdoc.css">
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
    font-family: Georgia;
    font-size: 18px;
  }
 .abutton {
         background-color: black;
         border: none;
         color: white;
         padding: 12px 24px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
		 font-family: Georgia;
         font-size: 16px;
         margin: 4px 2px;
         cursor: pointer;
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
        <td><div class="navbar"><center>
  						<a href="../index.html"><i class="fa fa-sign-out"></i>Logout</a>
  						<a href="../php/doctorupdate.php"><i class="fa fa-pencil-square-o"></i>Update</a>
  						<a href="docappointment.php"><i class="fa fa-calendar-check-o"></i>Appointments</a>
				</div></td>
      </tr>
    </table>
  </header>
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
		$id=$_SESSION["doc"];
		$sql = mysqli_query($conn,"select * from doctor where docid='$id';");
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
					$checksub  = explode(',',$row['days']);
					$dept= $row['deptid'];
					$sql1 = mysqli_query($conn,"select dname from department where deptid='$dept';");
					$row1 = mysqli_fetch_assoc($sql1);
					echo '<div class="department"><div class="card"><p><img src="../images/'.$row['dimage'].'"style="width:100%; height:100%;"><br><b><center>Dr. '.$row['name'].'</center></b>
						  <br><a class="abutton" onclick="edittextbox()">EDIT</a></p></div>';
					echo '<div class="docdetails"><form method="POST" action="doctorupdatedetails.php?did='.$id.'"><table style="font-size:18px;">
					 <tr><td><b>Qualification:</b></td><td><input type="text" name="qualification" id="editqualification" value="'.$row['qualification'].'" disabled></td></tr>
					 <tr><td><b>Position:</b></td><td><input type="text" name="position" id="editpos" value="'.$row['position'].'" disabled></td></tr>
					 <tr><td><b>Department:</b></td><td><input type="text" id="editd" value="'.$row1['dname'].'" disabled></td></tr>
					 <tr><td><b>Date of Birth:</b></td><td><input type="text" value="'.$row['dob'].'" disabled></</tr>
					 <tr><td><b>Gender:</b></td><td><input type="text" value="'.$row['gender'].'" disabled></</tr>
					 <tr><td><b>Email:</b></td><td><input type="text" name="email" id="editemail" value="'.$row['email'].'" disabled></td></tr>
					 <tr><td><b>Phone No:</b></td><td><input type="text" name="phoneno" id="editphone" value="'.$row['phone'].'" disabled></td></tr>
					 <tr><td><b>Address:</b></td><td><input type="text" name="address" id="editaddress" value="'.$row['address'].'" disabled></td></tr>
					 <tr style="width:200px;height:40px;"><td><b>Timings:</b></td><td><b>From:</b>&nbsp;&nbsp;&nbsp;
					  <input type="time" name="from_time" id="editfromtime" value="'.$row['fromtime'].'" disabled>
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>To:</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="time" name="to_time" id="edittotime" value="'.$row['totime'].'" disabled></td></tr>
					  <tr style="width:200px;height:40px;"><td ><b>Days Available:</b></td><td>';
					if(in_array("Monday",$checksub))echo '<input type="checkbox" id="editmonday" name="day[]" value="Monday" checked disabled>Monday&nbsp;&nbsp;'; 
					else echo '<input type="checkbox" id="editmonday" name="day[]" value="Monday" disabled>Monday&nbsp;&nbsp;';
					if(in_array("Tuesday",$checksub))echo '<input type="checkbox" id="edittuesday" name="day[]" value="Tuesday" checked disabled>Tuesday&nbsp;&nbsp;'; 
					else echo '<input type="checkbox" id="edittuesday" name="day[]" value="Tuesday" disabled>Tuesday&nbsp;&nbsp;';
					if(in_array("Wednesday",$checksub))echo '<input type="checkbox" id="editwednesday" name="day[]" value="Wednesday" checked disabled>Wednesday&nbsp;&nbsp;';  
					else echo '<input type="checkbox" id="editwednesday" name="day[]" value="Wednesday" disabled>Wednesday&nbsp;&nbsp;';
					if(in_array("Thursday",$checksub))echo '<input type="checkbox" id="editthursday" name="day[]" value="Thursday" checked disabled>Thursday&nbsp;&nbsp;';  
					else echo '<input type="checkbox" id="editthursday" name="day[]" value="Thursday" disabled>Thursday&nbsp;&nbsp;';
					if(in_array("Friday",$checksub))echo '<input type="checkbox" id="editfriday" name="day[]" value="Friday" checked disabled>Friday&nbsp;&nbsp;';  
					else echo '<input type="checkbox" id="editfriday" name="day[]" value="Friday" disabled>Friday&nbsp;&nbsp;';
					if(in_array("Saturday",$checksub))echo '<input type="checkbox" id="editsaturday" name="day[]" value="Saturday" checked disabled>Saturday&nbsp;&nbsp;'; 
					else echo '<input type="checkbox" id="editsaturday" name="day[]" value="Saturday" disabled>Saturday&nbsp;&nbsp;';
					if(in_array("Sunday",$checksub))echo '<input type="checkbox" id="editsunday" name="day[]" value="Sunday" checked disabled>Sunday&nbsp;&nbsp;';  
					else echo '<input type="checkbox" id="editsunday" name="day[]" value="Sunday" disabled>Sunday&nbsp;&nbsp;';
					echo '</td></tr></table>';
				}
			}
		}
	}
?>
  <center><button type="submit" id="updatebtn" class="signupbtn" disabled>UPDATE</button>&nbsp;&nbsp;&nbsp;
  <a class="cancelbtn" href="../html/doctorsuccess.html">CANCEL</a></center>
  </form>
</div>
</div>
<script>
    function edittextbox(){
      document.getElementById("editqualification").disabled=false;
	  document.getElementById("editpos").disabled=false;
	  document.getElementById("editemail").disabled=false;
	  document.getElementById("editphone").disabled=false;
	  document.getElementById("editaddress").disabled=false;
	  document.getElementById("editfromtime").disabled=false;
	  document.getElementById("edittotime").disabled=false;
	  document.getElementById("editmonday").disabled=false;
	  document.getElementById("edittuesday").disabled=false;
	  document.getElementById("editwednesday").disabled=false;
	  document.getElementById("editthursday").disabled=false;
	  document.getElementById("editfriday").disabled=false;
	  document.getElementById("editsaturday").disabled=false;
	  document.getElementById("editsunday").disabled=false;
	  document.getElementById("updatebtn").disabled=false;
    }
</script>
</body>
</html>