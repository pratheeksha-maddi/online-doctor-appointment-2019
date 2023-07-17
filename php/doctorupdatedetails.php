<?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$docid=$_GET['did'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$address = $_POST['address'];
	$qualification = $_POST['qualification'];
	$fromtime = $_POST['from_time'];
	$totime = $_POST['to_time'];
		$f=new DateTime($fromtime);
	$t=new DateTime($totime);
	$difference=$f->diff($t);
	$return=$difference->format('%H');
	$count=$return*4;
	$position=$_POST['position'];
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
		$sql = mysqli_query($conn,"Update doctor set email='$email', phone='$phone', address='$address', qualification='$qualification', 
		position='$position', fromtime='$fromtime', totime='$totime',days='$row1',count='$count' where docid='$docid';");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			echo "<script>window.location.href = 'http://localhost:3000/doctor/php/doctorupdate.php?id1=$docid';</script>";
		}
	}			
?>