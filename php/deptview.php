<html>
<head>
	<title>Online Doctor Appointment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/first.css">
	<link rel="stylesheet" href="../css/header.css">
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
				<td><div class="navbar">
  						<a href="#" onclick="login();"><i class="fa fa-pencil-square-o"></i> Book Appointment</a> 
  						<a href="#" onclick="admin();"><i class="fa fa-fw fa-user"></i> Admin</a>
  						<a href="../html/contact.html"><i class="fa fa-fw fa-phone"></i> Contact us</a> 
  						<a href="../html/about.html"><i class="fa fa-address-book-o"></i> About us</a> 
  						<a href="doctor.php"><i class="fa fa-user-md"></i> Doctor</a> 
  						<a href="department.php"><i class="fa fa-hospital-o"></i>Department</a> 
  						<a href="../index.html"><i class="fa fa-fw fa-home"></i> Home</a> 
				</div></td>
			</tr>
		</table>
	</header>
	<div id="id01" class="modal">
  
  <form class="modal-content animate" id="login" action="../php/userlogin.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img id= "userimg" src="../images/loginimage.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" oninvalid="InvalidMsg(this);" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" oninvalid="InvalidMsg(this);" name="psw" required>
        
      <button type="submit" style="font-family:Florence; font-size: 18px;"><b>Login</b></button><br>
	  
	   <br><center><a id="reset1" href="#" onclick="passwordresetadmin()">Forgot Password?</a></center>
	  <center><a id="reset" href="#" onclick="passwordresetuser()">Forgot Password?</a></center>
      <center><p id="para" style="color:white;">New User?&nbsp;&nbsp;<a href="../html/register.html">Register</a></center>
    </div>
  </form>
</div>
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
							while($row1 = mysqli_fetch_assoc($sql1))
							{
								echo '<div class="department"><div class="card"><p><img src="../images/'.$row1['dimage'].'" style="width:100%; height:100%;"><br><h3>Dr. '.$row1['name'].'</h3>
						<p class="title" style="color:black;">'.$row1['position'].'<br>'.$row['dname'].'</p>
						<p style="font-size: 14px;"><i>'.$row1['qualification'].'</i></p>
						<button onclick="login();">Book Appointment</button></div>';
							}
						}
					}
				}
			}
		}
	}
?>
<script>
	function login(){
  document.getElementById('id01').style.display='block'; 
    document.getElementById('para').style.visibility='visible';
    document.getElementById('userimg').src='../images/userlogin.jpg';
    document.getElementById('login').action='userlogin.php';
	document.getElementById('reset').style.visibility='visible';
	document.getElementById('reset1').style.visibility='hidden';
}
function admin(){
  document.getElementById('id01').style.display='block';
  document.getElementById('para').style.visibility='hidden';
  document.getElementById('userimg').src='../images/loginimage.jpg';
  document.getElementById('login').action='adminlogin.php';
  document.getElementById('reset1').style.visibility='visible';
	document.getElementById('reset').style.visibility='hidden';
}
function passwordresetuser(e)
 {
	var email = prompt("Please enter your email:");
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	if (email == '' || !re.test(email))
	{
		alert('Please enter a valid email address.');
		return false;
	}
	else
	{
	alert('Please check your email for your login credintials');
	window.location.href = "http://localhost:3000/doctor/php/forget.php?i=1&id="+email;
	}
}
 function passwordresetadmin(e)
 {
	var email = prompt("Please enter your email:");
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
	if (email == '' || !re.test(email))
	{
		alert('Please enter a valid email address.');
		return false;
	}
	else
	{
		if(email=="hithahealthcare@gmail.com"){
		alert('Please check your email for your login credintials');
		window.location.href = "http://localhost:3000/doctor/php/forget.php?i=0&id="+email;}
		else{
		alert('Please check your email for your login credintials');
		window.location.href = "http://localhost:3000/doctor/php/forget.php?i=2&id="+email;}
	}
 }
function InvalidMsg(textbox) { 
            if (textbox.value === '') { 
				if(textbox.name=='uname'){
                textbox.setCustomValidity('Entering email name is necessary!'); 
				}
				if(textbox.name=='psw'){
					textbox.setCustomValidity('Please enter password!'); 
				}
            } 
			else {
                textbox.setCustomValidity(''); 
            } 
            return true; 
        } 
</script>
</body>
</html>