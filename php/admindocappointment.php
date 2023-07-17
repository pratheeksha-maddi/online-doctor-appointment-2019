<html>
<head>
  <title>Online Doctor Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/doctor.css">
  <link rel="stylesheet" href="../css/adminsuccess.css">
  <link rel="stylesheet" href="../css/adminviewdoc.css">
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
		 .tab{
	  margin-top:2%;
	  margin-left:30%;
	  border-collapse: collapse;
	 font-size:21px;
	 text-align:center;
  }
  th{
	   background-color:maroon;
	   color:white;
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
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><div class="navbar">
              <a href="../index.html"><i class="fa fa-sign-out"></i>Logout</a>
              <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-user-md"></i>Doctor</button>
                  <div class="dropdown-content">
                      <a href="adddoctor.php">Add Doctor</a>
                      <a href="viewdoctor.php">View Doctor</a>
                  </div>
             </div> 
              <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-hospital-o"></i>Department</button>
                  <div class="dropdown-content">
                      <a href="../html/adddepartment.html">Add Department</a>
                      <a href="adminviewdepartment.php">View Department</a>
                  </div>
             </div> 
        </div></td>
      </tr>
    </table>
  </header>
<?php
  $host = "127.0.0.1";
	$user = "hindu";
	$pass = "gvhindu@98";
	$dbname = "hitha";
	$docid=$_GET['docid'];
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$sql2 = mysqli_query($conn,"select * from doctor where docid='$docid';");
		if(!$sql2)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql2)>=0)
			{
				while($row = mysqli_fetch_assoc($sql2))
				{
					echo '<div class="department"><div class="card"><p><img src="../images/'.$row['dimage'].'" style="width:100%; height:100%;"><br><b><center>Dr. '.$row['name'].'</center></b>
						  <br><a href="singledocview.php?id1='.$docid.'" class="abutton" >BACK</a></p></div>';
			    }
		    }
		}
		$sql = mysqli_query($conn,"select * from appointment where docid='$docid' order by date DESC, timeslot;");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql)>0)
			{
				$date=date('Y-m-d');
				echo '<table class="tab" border="2px" cellpadding="20" ><col width="240"><col width="150"><col width="150"><col width="160">
				<tr><th>PATIENT NAME</th><th>DATE</th><th>TIME</th><th>CANCEL</th></tr>';
				while($row = mysqli_fetch_assoc($sql))
				{
					$userid=$row['userid'];
					$dateapp=$row['date'];
					$sql1= mysqli_query($conn,"select * from patient where userid='$userid';");
					$row1 = mysqli_fetch_assoc($sql1);
					$name= $row1['name'];
					if($dateapp>$date){
					echo '<tr><td>'.$name.'</td><td>'.$row['date'].'</td><td>'.$row['timeslot'].'</td><td>
						  <a onclick="check();" id="text" href="admindoccancel.php?docid='.$docid.'&userid='.$userid.'&date='.$dateapp.'&t='.$row['timeslot'].'">
						  <center><img style="width:25%;height:15%;" src="../images/delete.png"></center></a></td></tr></td></tr>';
					}
					else{
						echo '<tr style="color:red;"><td>'.$name.'</td><td>'.$row['date'].'</td><td>'.$row['timeslot'].'</td><td>
						  <a><center><img style="width:32%;height:20%;" src="../images/tick.png"></center></a></td></tr></td></tr>';
					}
				}
				echo '</table>';
				
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