<?php
	include('header1.php');
	if($_REQUEST['msg']=="succr")
	{
		echo "<script>alert('Registration Successful');</script>";
	}
	if($_REQUEST['msg']=="succb")
	{
		echo "<script>alert('Booking Confirmed.');</script>";
	}
	if($_REQUEST['msg']=="succc")
	{
		echo "<script>alert('Password updated Successfully.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succf")
	{
		echo "<script>alert('Feedback sent to admin successfully. Your suggestions are always welcome.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succi")
	{
		echo "<script>alert('Complain sent to admin/manager successfully.');</script>";
	}
?>

<?php
	include('footer1.php');
?>
