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

<h1>Manage Area </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;border:3px solid black;">
<table>
	<tr>
		<td>Select City : 
		<td><select class="txt" name="txtcityid" id="txtcityid">
				
		<?php
			$sql="select *from citymaster";
			$res=mysql_query($sql);
			
			while($row=mysql_fetch_array($res))
			{	
		?>
				<option <?php if($_REQUEST['cityid']==$row[0]){ ?> selected <?php } ?> value="<?php echo $row['cityid']; ?>"><?php echo $row['cityname']; ?>
		<?php
			}
		?>
			</select>	
	<tr>
		<td>Enter Area Name :
		<td><input required class="txt" type="text" name="txtname" id="txtname" value="<?php echo $_REQUEST['areaname']; ?>"><font color="red" size="5">*</font>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['areaid']; ?>">
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
	$cityid=$_REQUEST['txtcityid'];
	if($op=="Save")
	{
		$sql="insert into areamaster (areaname,cityid) values('$name','$cityid')";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('areaname must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="update areamaster set areaname='$name',cityid='$cityid' where areaid='$id'";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('areaname must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from areamaster where areaid=".$_REQUEST['areaid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('areaname must be unique.');</script>";
	}
	
	$sql="Select *from areamaster order by areaid";
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="500px" border="1" class=tabledata>
		<tr><td align="center">Area Id<td align=center>City Name<td align=center>Area Name<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$cityid=$row[1];
			$name=$row[2];
			
			$s="select cityname from citymaster where cityid=$cityid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			echo "<tr>";
			echo "<td>".$row['areaid'];
			echo "<td>".$row1['cityname'];
			echo "<td>".$row['areaname'];
			
			echo "<td><a href='area.php?areaid=$id&areaname=$name&cityid=$cityid&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='area.php?areaid=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
	<br><br>
