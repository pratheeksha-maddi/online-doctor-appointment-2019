<?php
session_start();
?>
<html>
<head>
  <title>Online Doctor Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
  .department{
  margin-top: 1%;
  margin-bottom: 10%;
  width:auto;
  padding:10px;
  height: auto;
}
.docdetails{
  float: left;
  margin-left: 3%;
  padding-top: 0%;
  width:auto;
  height:auto;
  font-family: TimesNewRoman;
}
.card{
 float: left;
  margin-left: 8%;
  margin-bottom: 8%;
  padding-top:1%;
  width:18%;
  height:28%;
  text-align: center;
  font-family: arial;
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
 button{
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
	.hide{
  display:none;
}
.show{
  display:block;
}
#textInput{
	position:fixed;
	float:left;
	margin-left:35%;
	margin-top:12%;
	font-family: Georgia;
    font-size: 18px;
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
				<td><div class="navbar"><center>
  						<a href="../index.html"><i class="fa fa-sign-out"></i>Logout</a>
  						<a href="userdept.php"><i class="fa fa-pencil-square-o"></i>Book Appointment</a>
  						<a href="myappointment.php"><i class="fa fa-calendar-check-o"></i>My Appointments</a>
				</div></td>
			</tr>
		</table>
	</header>
<?php
$days=array();
$dates=array();
$userid=$_SESSION["user"];
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
		$id=$_GET['id1'];
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
					$sql2= mysqli_query($conn,"select * from confirm where docid='$id';");
					while($row2 = mysqli_fetch_assoc($sql2)){
						$date=$row2['date'];
						if($row['count']==$row2['count'])array_push($dates,$date);
					}
					$checksub  = explode(',',$row['days']);
					if(in_array("Monday",$checksub)) array_push($days,1);
					if(in_array("Tuesday",$checksub)) array_push($days,2);
					if(in_array("Wednesday",$checksub)) array_push($days,3);
					if(in_array("Thursday",$checksub)) array_push($days,4);
					if(in_array("Friday",$checksub)) array_push($days,5);
					if(in_array("Saturday",$checksub)) array_push($days,6);
					if(in_array("Sunday",$checksub)) array_push($days,0);
					$dept= $row['deptid'];
					$fromtime=date("H:i",strtotime($row['fromtime']));
					$totime=date("H:i",strtotime($row['totime']));
					$sql1 = mysqli_query($conn,"select dname from department where deptid='$dept';");
					$row1 = mysqli_fetch_assoc($sql1);
					echo '<div class="department"><div class="card"><p><img src="../images/'.$row['dimage'].'" style="width:100%; height:100%;"><br><b><center>Dr. '.$row['name'].'</center></b>
						  <br><a class="abutton" onclick="display()">Book</a>&nbsp;&nbsp;&nbsp;&nbsp;
						  <a class="abutton" href="userdeptview.php?id='.$dept.'">Back</a></p></div>';
					echo '<div class="docdetails"><table cellspacing="14" style="font-size:18px;">
					 <tr><td><b>Qualification:</b></td><td>'.$row['qualification'].'</td></tr>
					 <tr><td><b>Position:</b></td><td>'.$row['position'].'</td></tr>
					 <tr><td><b>Department:</b></td><td>'.$row1['dname'].'</td></tr>
					 <tr><td><b>Gender:</b></td><td>'.$row['gender'].'</td></tr>
					 <tr><td><b>Email:</b></td><td>'.$row['email'].'</td></tr>
					 <tr><td><b>Phone No:</b></td><td>'.$row['phone'].'</td></tr>
					 <tr><td><b>Address:</b></td><td>'.$row['address'].'</td></tr>
					 <tr><td><b>Available Time:</b></td><td>'.$fromtime.'-'.$totime.'</td></tr></table>';
				}
			}
		}
	}
?>
</div>

<br><br><br><br><br><br><br><br><br><br>
<div class="hide" id="textInput">
<form id="txt" action="dateselection.php?id2=<?php echo $id;?>" method="POST">
<label>Select date:</label>
<input type="text" autocomplete="off" name="dateselected" id="datepicker"><br><br>
 <center><button onclick="check();">Confirm</button></center>
</form>
</div>
</div>
<script>
var unavailableDate = <?php echo json_encode($days); ?>;
var unavailableDates = <?php echo json_encode($dates); ?>;
function Disable(date) {
	day=date.getDay();
	dmy = date.getFullYear()+"-"+(date.getMonth() + 1) + "-" +date.getDate();
if(($.inArray(day, unavailableDate) == -1) || ($.inArray(dmy, unavailableDates) != -1)) {
    return [false, "", "Disable"];}
else {
	 return [true, ""];
}
}
  $( function() {
    $( "#datepicker" ).datepicker({ 
		minDate: 1,
		maxDate: "+1M",
		dateFormat: 'yy-mm-d',
        beforeShowDay:Disable
	});
  });
function display(){
	document.getElementById('textInput').className="show";
}
function check(e)
 {
	 var r= confirm("Are u sure you want to book your appointment");
	 if(r == false){
		document.getElementById("txt").addEventListener("click", function(event){
		event.preventDefault()});
	 }
	 else{
	 txt.submit();
	 }
 }
</script>
</body>
</html>