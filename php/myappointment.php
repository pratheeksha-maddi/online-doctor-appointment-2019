<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Doctor Appointment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/myappointment.css">
	<style>
	body 
	{
		font-family: Verdana, sans-serif;
		background-image: url("../images/background.jpg");
		background-repeat: no-repeat;
		background-size: cover;
	}
	a{
		color:cyan;
	}
	h3{
		font-family:Georgia;
		font-size: 18px;
	}
	.button {
         background-color: black;
         border: none;
         color: white;
         padding: 10px 20px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 18px;
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
				<td><div class="navbar"><center>
  						<a href="../index.html"><i class="fa fa-sign-out"></i>Logout</a>
  						<a href="userdept.php"><i class="fa fa-pencil-square-o"></i>Book Appointment</a>
  						<a href="#"><i class="fa fa-calendar-check-o"></i>My Appointments</a>
				</div></td>
			</tr>
		</table>
	</header>
	<div class="department">
<?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$userid=$_SESSION["user"];
	$date=date('Y-m-d');
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select * from appointment where userid='$userid' order by date DESC, timeslot;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql)>0)
			{
				while($row = mysqli_fetch_assoc($sql))
				{
					$dateapp=$row['date'];
					$docid=$row['docid'];
					$sql1= mysqli_query($conn,"select * from doctor where docid='$docid';");
					$row1 = mysqli_fetch_assoc($sql1);
					$dept= $row1['deptid'];
					$sql2 = mysqli_query($conn,"select dname from department where deptid='$dept';");
					$row2 = mysqli_fetch_assoc($sql2);
					echo '<div class="card"><table id="dis"> <col width=150px;>
					<tr><td style="text-align:center;" rowspan="3"><img style="width:100% ;height: 20%;" src="/doctor/images/'.$row1['dimage'].'"></td>
						<td><b>Department:</b></td><td>'.ucfirst($row2['dname']).'</td></tr>
					 <tr><td><b>Date:</b></td><td style="width:30%">'.$row['date'].'</td></tr>
					<tr><td><b>Time:</b></td><td>'.$row['timeslot'].'</td></tr>
					 <tr><td style="text-align:center;"><b>'.$row1['name'].'</td>';
					 if($dateapp>$date){
						echo '<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <a id="text" href="cancelappointment.php?docid='.$docid.'&date='.$row['date'].'&t='.$row['timeslot'].'" class="button" onclick="check();">Cancel</a></td>';}
					 else{
						echo '<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="button">Consulted</a></td>'; 
					 }
					 echo '</tr></table></div>';
				}
			}
			else{
				echo'<image Style="width:300px;height:300px;margin-left:500px;margin-right:500px;" src="/doctor/images/sad.gif"/>';
			}
		}
	}
?>
<script>
 function check(e)
 {
	 var r= confirm("Are u sure you want to cancel your appointment");
	 if(r == false){
		document.getElementById('text').href="myappointment.php";
	 }
 }
 </script>
</div>
</body>
</html>