<?php
	include('header.php');
	include('connect.php');
	
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="lf")
	{
		echo "<script>alert('Please Login First.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succl")
	{
		echo "<script>alert('Login Successful.');</script>";
	}
	
?>
<h1>Administrator Login </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;">
<table>
	<tr>
		<td>Enter Login Name :
		<td><input class="txt" type="text" name="txtuname" id="txtname">
	</tr>
	<tr>
		<td>Enter Password :
		<td><input class="txt" type="password" name="txtpword" id="txtpassword">
	</tr>
	<tr>
		<td colspan=2 align=center>
			<input class="button" type="submit" name="submit" id="submit" value="Login Now">
			<input class="button" type="reset" name="cancel" id="cancel" value="Clear">
	</tr>
</table>
</div>
</form>

<?php
	if(isset($_REQUEST['submit']))
	{
		$uname=$_REQUEST['txtuname'];
		$pword=$_REQUEST['txtpword'];

		if($uname=="Administrator")
		{
			$sql="select *from adminmaster where adminname='$uname' and password='$pword'";
			$res=mysql_query($sql,$con);

			$cnt=mysql_num_rows($res);
			
			if($cnt==1)
			{
				$_SESSION['aname']=$uname;
				$_SESSION['apword']=$pword;
				header('Location: index.php?msg=succl');
			}	
			else
			{
				echo "<script>alert('Invalid Username and Password.');</script>";
			}
		}
		else
		{
			echo "<script>alert('Invalid Username and Password.');</script>";
		}
	}
?>