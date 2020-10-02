<?php
	
	session_start();
	include('header.php');
	include('connect.php');
	
	if(!isset($_SESSION['mname']))
	{
		header('Location: login.php?msg=lf');
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succl")
	{
		echo "<script>alert('Login Successful.');</script>";
	}
	if($_REQUEST['msg']=="succr")
	{
		echo "<script>alert('Registration Successful');</script>";
	}
	if($_REQUEST['msg']=="succb")
	{
		echo "<script>alert('Booking Successful');</script>";
	}
	if($_REQUEST['msg']=="succc")
	{
		echo "<script>alert('Password updated Successfully.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succf")
	{
		echo "<script>alert('Feedback sent to admin successfully. Your suggestions are always welcome.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succru")
	{
		echo "<script>alert('Inquiry Reply Updated successfully.');</script>";
	}
	
?>
<h1>Welcome Administrator</h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;">
Hello...
</div>
</form>
