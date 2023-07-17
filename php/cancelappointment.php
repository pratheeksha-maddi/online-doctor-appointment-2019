<?php
session_start();
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$dateselected=$_GET['date'];
	$docid=$_GET['docid'];
	$timeslot=$_GET['t'];
	$userid=$_SESSION["user"];
	$c=0;
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql7=mysqli_query($conn,"select email from patient where userid='$userid';");
		$chk3= mysqli_fetch_assoc($sql7);
		$email=$chk3['email'];
		$sql = mysqli_query($conn,"Delete from appointment where docid='$docid' and date='$dateselected' and userid='$userid' and timeslot='$timeslot';");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			$sql1 = mysqli_query($conn,"select count from confirm where docid='$docid' and date='$dateselected';");
			$chk = mysqli_fetch_assoc($sql1);
			$c=$chk['count'];
			$c=$c-1;
			$sql2 = mysqli_query($conn,"Update confirm set count='$c' where docid='$docid' and date='$dateselected';");
			if(!$sql2)
			{echo "Error".mysqli_error($sq2);}
			else
			{
				$sql3=mysqli_query($conn,"select * from doctor where docid='$docid';");
				$chk1 = mysqli_fetch_assoc($sql3);
				$docname=$chk1['name'];
				$sub = "Appointment status";
				$msg = "your appointment has been sucessfully cancelled on ".$dateselected. "," .$timeslot. " to consult DR. ".$docname.".";
				mail($email,$sub,$msg);
				header("Location:myappointment.php");
			}
			
		}
	}			
?>