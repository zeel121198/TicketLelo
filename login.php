<?php
	include('header.php');
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="lf")
	{
		echo "<script>alert('Please Login First.');</script>";
	}	
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succr")
	{
		echo "<script>alert('Registration Successful.');</script>";
	}
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succfp")
	{
		echo "<script>alert('Your password has been reset.');</script>";
	}
	unset($_REQUEST['msg']);
?>
<center>
<h1>Login Now</h1>
<form name="frmlogin" method="post">
<div style="background-color:silver;width:980px;height:300px;border-radius:10px;">
	<table>	 	
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>Enter User Name :</td>
			<td><input required class="txt" type="text" name="txtuname" required></td>
		</tr>
		<tr>
			<td>Enter Password :</td>
			<td><input class="txt" type="password" name="txtpword" required></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan=2 align=center>
				<input class="button" type="submit" name="txtsubmit" value="Login">
				<input class="button" type="submit" name="txtcancel" value="Cancel">
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan=2 align=center>
			<a href="forgotpword.php">Forgot Password</a></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
	</table>
</div>
</form>
</center>
<?php
	if(isset($_REQUEST['txtsubmit']))
	{
		$uname=$_REQUEST['txtuname'];
		$pword=$_REQUEST['txtpword'];

		if($uname=="Administrator")
		{
			$sql="select *from adminmaster where adminname='$uname' and password='$pword'";
	//		echo $sql;die;
			$res=mysql_query($sql,$con);

			$cnt=mysql_num_rows($res);
			
			if($cnt==1)
			{
				$_SESSION['aname']=$uname;
				$_SESSION['apword']=$pword;
				header('Location: admin/index.php?msg=succl');
			}	
			else
			{
				echo "<script>alert('Invalid Username and Password.');</script>";
			}
		}
		else
		{
			$sql="select *from usermaster where username='$uname' and password='$pword'";
	//		echo $sql;die;
			$res=mysql_query($sql,$con);
			$row=mysql_fetch_array($res);
			$cnt=mysql_num_rows($res);
			
			if($cnt==1)
			{
				$_SESSION['userid']=$row['userid'];
				$_SESSION['uname']=$uname;
				$_SESSION['pword']=$pword;
				$_SESSION['email']=$row['email'];
				$_SESSION['mobileno']=$row['mobileno'];
				header('Location: index.php?msg=succl');
			}	
			else
			{
				echo "<script>alert('Invalid Username and Password.');</script>";
			}
		}
	}
?>
<?php
	include('footer.php');
?>
