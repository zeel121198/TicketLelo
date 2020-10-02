<?php
	include('header.php'); 
	if(!isset($_SESSION['uname']))
	{
		header('Location: login.php?msg=lf');
	}
	$movieid=$_REQUEST['movieid'];
	
?>
<center>
<h1>Write your Review Here...</h1>
<div style="font-size:18px;border:3px;border-style:solid;border-color:gray;border-radius:10px;width:900px;height:auto;padding:10px;">						
	<form method="post"><center>
		<table border="0" align=center>
			<tr>
			<td>Your Name :
			<td><input readonly class=txt type="text" value="<?php echo $_SESSION['uname']; ?>" name="txtname">
			<tr>
			<td>Movie Name :
			<td><input readonly class=txt type="text" value="<?php echo $_REQUEST['moviename']; ?>" name="txtname">
			<tr>
			<td>Subject :
			<td><input required class=txt type="text" value="" name="txtsubject">
			<tr>
			<td>Feedback Detail : 
			<td><textarea required class=txt name="txtdetail" rows=5></textarea>
			<tr>
			<td>Rating(out of 5) :
			<td><input required class=txt type="number" min=0 max=5 step="0.25" value="" name="txtrating">
			<tr><td><br>
			<tr>
			<td colspan=2>
			<input type="submit"  value="Write Review" name="submit" class="button">
			<input type="submit" formnovalidate name="submit" value="Cancel" class="button">			
			<tr><td><br>
		</table>
		</form>		
		</div>
<?php
	 $op=$_REQUEST['submit'];
	 //echo $op;die;
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Cancel")
	 {
		 header('Location: movie.php');
	 }
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Write Review")
	 {
		$name=$_REQUEST['txtname'];
		$subject=$_REQUEST['txtsubject'];
		$detail=$_REQUEST['txtdetail'];
		$rating=$_REQUEST['txtrating'];
		
		$userid=$_SESSION['userid'];
		
		$sql="insert into reviewdetails (rating,movieid,userid,subject,details,dateofreview) 
		values('$rating','$movieid','$userid','$subject','$detail',NOW())";

		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Review sent to Administrator. Admin will call you soon.');</script>";
			header('Location: movie.php?msg=succf');
		}
		else
			echo mysql_error();
		}
?>
</div>	
<?php
include('footer1.php');
?>