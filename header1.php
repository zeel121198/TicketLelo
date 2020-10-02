<?php
	ob_start();
	session_start();
	include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ticket Lelo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-func.js"></script>
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="#">MovieHunter</a></h1>
    <div class="social">
      <?php
				if(isset($_SESSION['uname']))
				{
					echo "Welcome ".$_SESSION['uname'].", ";
			?>
					<a href="logout.php">Logout</a> | 
					<a href="cpword.php">Change Password</a>
			<?php 
				}
				else
				{
			?>
					Welcome Guest,  
					<a href="login.php">Login</a> | 
					<a href="signup.php">Register Now</a>

			<?php
				}
			?>
    </div>

    <div id="navigation">
       <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="download.php">Download</a></li>
        <li><a href="upcoming.php">Upcoming</a></li>
		<li><a href="movie.php">Book Now</a></li>
        <?php 
		if(isset($_SESSION['uname']))
		{	?>
				<li><a href="inquiry.php">Complain</a></li>
		<?php
		}
		else
		{
		?>
			<li><a href="visitorinquiry.php">Inquiry</a></li>
		<?php		
		}
		?>
        <li><a href="contect.php">Contacts</a></li>
		<li><a href="aboutus.php">About us</a></li>
      </ul>
    </div>
  </div>		  
</div>
  <div id="main1">
          <marquee behavior=alternate>
			<img height=400px width=500px src="images/01.jpg" alt="">
			<img height=400px width=500px src="images/02.jpg" alt="">
			<img height=400px width=500px src="images/03.jpg" alt="">
			<img height=400px width=500px src="images/04.jpg" alt="">
			<img height=400px width=500px src="images/05.jpg" alt="">
			<img height=400px width=500px src="images/06.jpg" alt="">
			<img height=400px width=500px src="images/07.jpg" alt="">
			<img height=400px width=500px src="images/08.jpg" alt="">
			<img height=400px width=500px src="images/09.jpg" alt="">
		  </marquee>
        
    