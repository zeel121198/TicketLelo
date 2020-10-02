<?php
	
	session_start();
	include('header.php');
	include('connect.php');
	
	if(!isset($_SESSION['aname']))
	{
		header('Location: login.php?msg=lf');
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succl")
	{
		echo "<script>alert('Login Successful.');</script>";
	}
	
?>
<h1>Welcome Administrator</h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;">
Hello...
</div>
</form>
