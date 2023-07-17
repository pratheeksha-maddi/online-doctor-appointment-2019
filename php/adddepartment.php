<?php
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$dname = $_POST['dname'];
	$dimage = $_FILES['dimage']['name'];
	$dtext=$_POST['about_dept'];
	$c=0;
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select count(*) as count from department;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			$chk = mysqli_fetch_assoc($sql);
			$c=$chk['count']+1;
			$deptid="dept".$c;
		}
		$sql1 = mysqli_query($conn,"insert into department values('$deptid','$dname','$dimage','$dtext');");
		if(!$sql1)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			echo "<script>
					window.location.href = 'http://localhost:3000/doctor/php/adminviewdepartment.php';
				</script>";
		}
	}			
?>