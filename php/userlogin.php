<?php
session_start();
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$uname = $_POST['uname'];
	$psword = $_POST['psw'];
	$c=0;
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql = mysqli_query($conn,"select * from userlogin;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql)>0)
			{
				while($chk = mysqli_fetch_assoc($sql))
				{
					if($uname == $chk['uname'] && $psword == $chk['psword'])
					{
						$c++;
						$_SESSION["user"] = $chk["userid"];
					}
				}
				if($c>0)
				{
					echo "<script>window.location.href = 'http://localhost:3000/doctor/html/usersuccess.html';</script>";
				}
				else 
				{
					echo "<script>window.location.href = 'http://localhost:3000/doctor/html/adminloginerror.html';</script>";
				}
			}

		}
	}			
?>