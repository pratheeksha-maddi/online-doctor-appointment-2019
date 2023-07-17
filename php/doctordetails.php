<?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$docname = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$dept = $_POST['department'];
	$qualification = $_POST['qualification'];
	$fromtime = $_POST['from_time'];
	$totime = $_POST['to_time'];
	$f=new DateTime($fromtime);
	$t=new DateTime($totime);
	$difference=$f->diff($t);
	$return=$difference->format('%H');
	$count=$return*4;
	$psword = $_POST['psword'];
	$gender=$_POST['gender'];
	$position=$_POST['position'];
	$dimage = $_FILES['docimage']['name'];
	$c=0;
	foreach ($_POST['day'] as $_subcat)
    {
        $checksub[] = $_subcat;
    } 
	$row1 = implode(',', $checksub);
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select count(*) as count from doctor;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			$chk = mysqli_fetch_assoc($sql);
			$c=$chk['count']+1;
			$docid="doc".$c;
		}
		$sql1= mysqli_query($conn,"select deptid from department where dname='$dept';");
		if(!$sql1)
		{
			echo "Error".mysqli_error($sql1);
		}
		else
		{
			$chk = mysqli_fetch_assoc($sql1);
			$deptid=$chk['deptid'];
		}
		$sql2 = mysqli_query($conn,"insert into doctor values('$docid','$docname','$email','$dimage','$phone','$address','$dob','$gender','$qualification','$position','$row1','$fromtime','$totime','$deptid','$count');");
		if(!$sql2)
		{
			echo "Error".mysqli_error($sql2);
		}
		else
		{
			$sql3 = mysqli_query($conn,"insert into doctorlogin values('$docid','$email','$psword');");
			if(!$sql3)
			{
			echo "Error".mysqli_error($sql3);
			}
			else
			{
			echo "<script>window.location.href = 'http://localhost:3000/doctor/php/viewdoctor.php';</script>";
			}
		}
	}			
?>