<?php 
	include('connect.php');

	$uname=$_REQUEST['uname'];

	$query="SELECT sque,sans FROM usermaster WHERE username='$uname'";
	//echo $query;die;

	$result=mysql_query($query);

	$cnt=mysql_num_rows($result);

	if($cnt==1)
	{
		$row=mysql_fetch_array($result);
		echo $row['sque']."--".$row['sans'];
	}
	else
		echo "0";
?>