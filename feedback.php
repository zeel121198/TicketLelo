<?php
	include('header.php'); 
	if(!isset($_SESSION['uname']))
	{
		header('Location: login.php?msg=lf');
	}
?>
<div class="menu_block2">						
	Write your Review Here
</div>
<div style="font-size:18px;border:3px;border-style:solid;border-color:gray;border-radius:10px;width:900px;height:auto;padding:10px;">						
	<form method="post"><center>
		<table border="0" align=center>
			<tr>
			<td>Your Name :
			<td><input class=txt type="text" value="<?php echo $_SESSION['uname']; ?>" name="txtname" required>
			<tr>
			<td>Subject
			<td><input class=txt type="text" value="" name="txtsubject">
			<tr>
			<td>Feedback Detail
			<td><textarea class=txt1 name="txtdetail" rows=5></textarea>
			<tr>
			<td colspan=2>
			<input type="submit"  class=btn value="Send Feedback" name="submit" class="btn">
			<input type="reset" class=btn value="clear" class="btn">			
		</table>
		</form>		</div>
<?php
	 $op=$_REQUEST['submit'];
	 //echo $op;die;
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Send Feedback")
	 {
		$name=$_REQUEST['txtname'];
		$subject=$_REQUEST['txtsubject'];
		$detail=$_REQUEST['txtdetail'];
		
		$userid=$_SESSION['userid'];
		
		$sql="insert into feedbackdetail (userid,subject,detail,dateoffeedback) values('$userid','$subject','$detail',NOW())";

		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Feedback sent to Administrator. Admin will call you soon.');</script>";
			header('Location: index.php?msg=succf');
		}
		else
			echo mysql_error();
		}
?>
</div>	
<?php
include('footer1.php');
?>