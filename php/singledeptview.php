<html>
<head>
<title>Online Doctor Appointment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/adminsuccess.css">
<link rel="stylesheet" href="../css/adminviewdept.css">
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
font-family:Georgia;
font-size: 18px;
}
  .button {
         background-color: black;
         border: none;
         color: white;
         padding: 15px 30px;
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
	$conn = mysqli_Connect("$host","$user","$pass","$dbname");
	if(!$conn)
	{
		echo("Server not connected".mysqli_error($conn));
	}
	else
	{
		$id=$_GET['id'];
		$sql = mysqli_query($conn,"select * from department where deptid='$id';");
		if(!$sql)
		{
			echo "Error".mysqli_error($sql);
		}
		else
		{
			if(mysqli_num_rows($sql)>=0)
			{
				while($row = mysqli_fetch_assoc($sql))
				{
					echo '<div class="departmentdetails"><p><div class="img">
									<img src="../images/'.$row['dimage'].'" style="width: 63%;height: 100%"><br><b>'.strtoupper($row['dname']).'</b></p></div>
									<div class="deptext"><p>'.$row['dtext'].'</p></div></div>';
					$sql1 = mysqli_query($conn,"select * from doctor where deptid='$id';");
					if(!$sql1){echo "Error".mysqli_error($sql);}
					else
					{
						if(mysqli_num_rows($sql1)>=0)
						{
							echo '<div class="department">';
							while($row1 = mysqli_fetch_assoc($sql1))
							{
								echo '<div class="card"><p><img src="../images/'.$row1['dimage'].'" style="width:100%; height:100%;"><br>
									  <p><a href="deptsingledocview.php?id1='.$row1['docid'].'" class="button">'.$row1['name'].'</a></p></div>';
							}
							echo '</div>';
						}
					}
				}
			}
		}
	}
?>
</body>
</html>
