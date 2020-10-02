<?php
	include('header.php');
?>
<script>
	function checkpword()
	{
		if(document.frmsignup.txtnpword.value!=document.frmsignup.txtrpword.value)
		{
			document.frmsignup.txtnpword.value="";
			document.frmsignup.txtrpword.value="";
			alert('Password and Confirm Password does not match');
			document.frmsignup.txtnpword.focus();
		}
	}
</script>
<center>
<h1>Change Password</h1>
<form name="frmsignup" method="post">
<div style="background-color:silver;width:980px;height:400px;border-radius:10px;">
<center>
	<table>		<tr><td>&nbsp;</tr>

		<tr>
			<td>User Name :
			<td><input value="<?php echo $_SESSION['uname']; ?>" class="txt" type="text" name="txtuname" readonly>
		<tr>
			<td>Enter Old Password :
			<td><input class="txt"  type="password" name="txtopword" required>
		<tr>
			<td>Enter New Password :
			<td><input class="txt"  type="password" name="txtnpword" required>
		<tr>
			<td>Re-Enter New Password :
			<td><input class="txt" onblur="checkpword();" type="password" name="txtrpword" required>
		<tr><td>&nbsp;</tr>
		<tr>
			<td colspan=2 align=center>
				<input class="button" type="submit" name="txtsubmit" value="Ok">
				<input class="button" type="submit" name="txtcancel" value="Cancel">
		<tr><td>&nbsp;</tr>
		
	</table>
</center>
</form>
</div>	
<?php
	include('footer.php');
?>
<?php

	if(isset($_REQUEST['txtsubmit']))
	{
		$uname=$_REQUEST['txtuname'];
		$opword=$_REQUEST['txtopword'];
		$npword=$_REQUEST['txtnpword'];
		
		if($opword==$_SESSION['pword'])
		{		
			$sql="update usermaster set password='$npword' where username='$uname'";

			//echo $sql;die;
			
			$res=mysql_query($sql,$con);
			
			if($res)
			{
				$_SESSION['pword']=$npword;
				header('Location: index.php?msg=succc');
			}
			else
				echo mysql_error();
		}
		else
		{
			echo "<script>alert('Old Password does not match');</script>";
		}
	}
?>