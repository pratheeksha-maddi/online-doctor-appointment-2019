<html>
<head>
	<title>Online Doctor Appointment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/adminsuccess.css">
  <link rel="stylesheet" href="../css/department.css">
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
                      <a href="#">View Doctor</a>
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
<div class="department">
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
		$sql = mysqli_query($conn,"select * from doctor;");
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
					echo '<div class="card"><p><img src="../images/'.$row['dimage'].'" style="width:100%; height:100%;"><br><br>
						<a href="singledocview.php?id1='.$row['docid'].'" class="button">'.$row['name'].'</a></p></div>';
				}
			}
		}
	}
?>
</div>
</body>
</html>