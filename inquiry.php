<?php
	include('header.php'); 
	if(!isset($_SESSION['uname']))
	{
		header('Location: login.php?msg=lf');
	}
?>
<center>
<h1>Write your Complain Here...</h1>
<form name="frmsignup" method="post">
<div style="background-color:silver;width:500px;border-radius:10px;">
		<table border="0" align=center>
			<tr><td><br>
			<tr>
			<td>Your Name :
			<td><input class=txt type="text" value="<?php echo $_SESSION['uname']; ?>" name="txtname" required>
			<tr>
			<td>Select Theatre : 
			<td><select name="txttheatreid" id="txttheatreid" class=txt onblur="if(this.value=='Select theatre')
						alert('Please Select theatre');" >
				<?php
					$sql="select *from theatremaster order by areaid";
					$res=mysql_query($sql);
					
					while($row=mysql_fetch_array($res))
					{
						$areaid=$row['areaid'];
						
						$sql1="Select cityname from citymaster where cityid=(select cityid from areamaster where areaid=$areaid)";
						$res1=mysql_query($sql1);
						$row1=mysql_fetch_array($res1);
				?>
					<option value="<?php echo $row['theatreid']; ?>"><?php echo $row['theatrename']."-".$row1[0]; ?>
				<?php
					}
				?>
				</select><font color="red" size="5">*</font>
			<tr>
			<td>Email Id :
			<td><input class=txt type="email" value="<?php echo $_SESSION['email']; ?>" readonly name="txtcontact" >
			<tr>
			<td>Subject
			<td><input class=txt type="text" required value="" name="txtsubject">
			<tr>
			<td>Complain Detail
			<td><textarea class=txt required name="txtdetail" rows=5></textarea>
			<tr><td><br>
			<tr>
			<td colspan=2>
			<input type="submit"  class=button value="Submit Complain" name="submit" class="button">
			<input type="submit" formnovalidate name="submit" value="Cancel" class="button">			
			<tr><td><br>
		</table>
		</form>		
		</div>
<?php
	 $op=$_REQUEST['submit'];
	 //echo $op;die;
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit Complain")
	 {
		$name=$_REQUEST['txtname'];
		$contact=$_REQUEST['txtcontact'];
		$subject=$_REQUEST['txtsubject'];
		$detail=$_REQUEST['txtdetail'];
		
		$userid=$_SESSION['userid'];
		$tid=$_REQUEST['txttheatreid'];
		
		$sql="insert into inquirydetail (userid,emailid,subject,detail,dateofinquiry,theatreid) 
		values('$userid','$contact','$subject','$detail',NOW(),'$tid')";

		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Complain sent to Administrator. Admin will reply you soon.');</script>";
			header('Location: index.php?msg=succi');
		}
		else
			echo mysql_error();
	}
?>
</center>

<?php
include('footer.php');
?>