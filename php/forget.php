<?php
$host = "127.0.0.1";
$user = "hindu";
$pass = "gvhindu@98";
$dbname = "hitha";
$email=$_GET['id'];
$conn = mysqli_Connect("$host","$user","$pass","$dbname");
if(!$conn)
{
	echo("Server not connected".mysqli_error($conn));
}
else
{
	if($_GET['i']==0){
		$msg = "Please find below your login details:\n Email: ".$email."\n Password:hitha157";
		}
	else if($_GET['i']==2){
			$sql = mysqli_query($conn,"select * from doctorlogin where uname='$email';");
			if(!$sql){echo "Error".mysqli_error($sql);}
			else{
				if(mysqli_num_rows($sql)>0)
				{
					$row = mysqli_fetch_assoc($sql);
					$password=$row['psword'];
					$msg = "Please find below your login details:
Email: ".$email."
Password: ".$password;
				}
				else{$msg="Sorry for inconvinence we could not find ur login details please register yourself in the website";}
			}
		}
		else{
			$sql = mysqli_query($conn,"select * from userlogin where uname='$email';");
			if(!$sql){echo "Error".mysqli_error($sql);}
			else{
				if(mysqli_num_rows($sql)>0)
				{
					$row = mysqli_fetch_assoc($sql);
					$password=$row['psword'];
					$msg = "Please find below your login details:
Email: ".$email."
Password: ".$password;
				}
				else{$msg="Sorry for inconvinence we could not find ur login details please register yourself in the website";}
			}
		}
$sub="Login Credentials";
mail($email,$sub,$msg);
header("Location:../index.html");
}
?>