<?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$psword = $_POST['psw'];
	$gender=$_POST['gender'];
	$c=0;
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select count(*) as count from patient;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			$chk = mysqli_fetch_assoc($sql);
			$c=$chk['count']+1;
			$userid="pati".$c;
		}
		$sql1= mysqli_query($conn,"insert into patient values('$userid','$name','$email','$phone','$gender','$address','$dob');");
		if(!$sql1)
		{
			echo "Error".mysqli_error($sql1);
		}
		else
		{
			$sql2 = mysqli_query($conn,"insert into userlogin values('$userid','$email','$psword');");
			if(!$sql2)
			{
			echo "Error".mysqli_error($sql2);
			}
			else
			{
				$_SESSION["user"] = $userid;
			echo "<script>window.location.href = 'http://localhost:3000/doctor/index.html';</script>";
			}
		}
	}			
?>