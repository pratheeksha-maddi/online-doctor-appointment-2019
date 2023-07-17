<?php
session_start();
	$host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$dateselected=$_POST['dateselected'];
	$docid=$_GET['id2'];
	$userid=$_SESSION["user"];
	$c=0;
	$co=0;
	$t=15;
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
		$sql4=  mysqli_query($conn,"select * from doctor where docid='$docid';");
		$chk1 = mysqli_fetch_assoc($sql4);
		$time=$chk1['fromtime'];
		$docname=$chk1['name'];
		$sql = mysqli_query($conn,"select count(*) as cont from confirm where docid='$docid' and date='$dateselected';");
		$chk = mysqli_fetch_assoc($sql);
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
				if($chk['cont']==0)
				{
					$c=$c+1;
					$sql1 = mysqli_query($conn,"Insert into confirm values('$docid','$dateselected','$c');");
					if(!$sql1)
					{
						echo "Error".mysqli_error($sql);
					}
					else
					{
						$sql3 = mysqli_query($conn,"Insert into appointment values('$docid','$userid','$dateselected','$time');");
						if(!$sql3)
						{
							echo "Error".mysqli_error($sql);
						}
						else
						{
							$sub = "Appointment status";
							//the message
							$msg = "your appointment has been sucessfully booked on".$dateselected.",".$time."to consult".$docname.".";
							//recipient email here
							//send email
							mail($email,$sub,$msg);
							header("Location:myappointmentsuccess.php");
							exit;
						}
					}
				}
				else
				{
					$sql1 = mysqli_query($conn,"select count from confirm where docid='$docid' and date='$dateselected';");
					$chk = mysqli_fetch_assoc($sql1);
					$c=$chk['count'];
					$c=$c+1;
					$sql2 = mysqli_query($conn,"Update confirm set count='$c' where docid='$docid' and date='$dateselected';");
					if(!$sql2)
					{
						echo "Error".mysqli_error($sql);
					}
					else
					{
						$sql5= mysqli_query($conn,"Select timeslot from appointment where docid='$docid' and date='$dateselected';");
						while($row = mysqli_fetch_assoc($sql5)){
							$co++;
						}
						$ti=$t*$co;
						$time2 = $ti."minutes";
						$timestamp = strtotime($time." +".$time2);
						$time1 = date("H:i:s", $timestamp);
						$sql3 = mysqli_query($conn,"Insert into appointment values('$docid','$userid','$dateselected','$time1');");
						if(!$sql3)
						{
							echo "Error".mysqli_error($sql);
						}
						else
						{
							$sub = "Appointment status";
							//the message
							$msg = "your appointment has been sucessfully booked on".$dateselected.",".$time1."to consult".$docname.".";
							//recipient email here
							//send email
							mail($email,$sub,$msg);
							header("Location:myappointmentsuccess.php");
						}
					}
				}
				
		}
	}			
?>