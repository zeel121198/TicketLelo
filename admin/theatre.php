<?php
	include('connect.php');
	include('header.php');
	if(!isset($_SESSION['aname']))
	{
		header('Location: login.php?msg=lf');
	}
?>

<script language="javascript">
function delete1() {
   var answer = confirm("Do you want to delete this record?");
   return answer;
}
</script>

<h1>Manage Theatre </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:600px;border-radius:10px;border:3px solid black;">
<table width=100%>
	<tr>
		<td>Select Area : 
		<td><select class="txt" name="txtareaid" id="txtareaid">
				
		<?php
			$sql="select *from areamaster";
			$res=mysql_query($sql);
			
			while($row=mysql_fetch_array($res))
			{	
		?>
				<option <?php if($_REQUEST['areaid']==$row[0]){ ?> selected <?php } ?> value="<?php echo $row['areaid']; ?>"><?php echo $row['areaname']; ?>
		<?php
			}
		?>
			</select>	
	<tr>
		<td>Enter Theatre Name :
		<td><input required class="txt" type="text" name="txtname" id="txtname" value="<?php echo $_REQUEST['theatrename']; ?>"><font color="red" size="5">*</font>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['theatreid']; ?>">
	<tr>
		<td>Enter Address :
		<td><input required class="txt" type="text" name="txtaddress" id="txtaddress" value="<?php echo $_REQUEST['address']; ?>"><font color="red" size="5">*</font>
	<tr>
		<td>Enter Mobile No :
		<td><input required class="txt" type="text" name="txtmobileno" id="txtmobileno" value="<?php echo $_REQUEST['mobileno']; ?>"><font color="red" size="5">*</font>
	<tr>
		<td>Enter Web site Address :
		<td><input required class="txt" type="text" name="txtweb" id="txtweb" value="<?php echo $_REQUEST['web']; ?>"><font color="red" size="5">*</font>
	</tr>
	<tr>
		<td colspan=2 align=center>
			<?php
				if($_REQUEST['mode']=="Update")
				{
			?>
				<input class="button" type="submit" name="submit" id="submit" value="Update">
			<?php
				}
				else
				{
			?>
				<input class="button" type="submit" name="submit" id="submit" value="Save">
			<?php
				}
			?>
			<input class="button" type="reset" name="reset" id="reset" value="Reset">
	</tr>
</table>
</div>
</form>

<?php

	$op=$_REQUEST['submit'];
	$id=$_REQUEST['txtid'];
	$name=$_REQUEST['txtname'];
	$areaid=$_REQUEST['txtareaid'];
	$address=$_REQUEST['txtaddress'];
	$mobileno=$_REQUEST['txtmobileno'];
	$web=$_REQUEST['txtweb'];
	
	if($op=="Save")
	{
		$sql="insert into theatremaster (theatrename,areaid,address,mobileno,website) values('$name','$areaid','$address','$mobileno','$web')";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('theatrename must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="update theatremaster set theatrename='$name',areaid='$areaid',
			address='$address',mobileno='$mobileno',website='$web' where theatreid='$id'";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('theatrename must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from theatremaster where theatreid=".$_REQUEST['theatreid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('theatrename must be unique.');</script>";
	}
	
	$sql="Select *from theatremaster order by theatreid";
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="100%" border="1"  class=tabledata>
		<tr><td align="center">Theatre Id<td align=center>Area Name<td align=center>Aheatre Name<td>Address<td>Mobile No<td>Web Site<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$areaid=$row[1];
			$name=$row[2];
			$address=$row[3];
			$mobileno=$row[4];
			$web=$row[5];
			
			$s="select areaname from areamaster where areaid=$areaid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			echo "<tr>";
			echo "<td>".$row['theatreid'];
			echo "<td>".$row1['areaname'];
			echo "<td>".$row['theatrename'];
			echo "<td>".$row['address'];
			echo "<td>".$row['mobileno'];
			echo "<td>".$row['website'];
			
			echo "<td><a href='theatre.php?theatreid=$id&theatrename=$name&areaid=$areaid&address=$address&mobileno=$mobileno&web=$web&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='theatre.php?theatreid=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
	<br><br>
