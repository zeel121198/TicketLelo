<?php
	include('connect.php');
	include('header.php');
	if(!isset($_SESSION['mname']))
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

<h1>Manage Screen </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:600px;border-radius:10px;border:3px solid black;">
<table width=100%>
	<tr>
		<td>Select Theatre : 
		<td>				
		<?php
			$sql="select *from theatremaster where theatreid=(select theatreid from managermaster where managerid=".$_SESSION['userid'].")";
			$res=mysql_query($sql);
			$row=mysql_fetch_array($res);
		?>
			<input readonly type="hidden" class="txt" name="txttheatreid" id="txttheatreid" value="<?php echo $row[0]; ?>">
			<input readonly type="text" class="txt" name="txttheatre" id="txttheatre" value="<?php echo $row[2]; ?>">
	<tr>
		<td>Enter Screen Name :
		<td><input required class="txt" type="text" name="txtname" id="txtname" value="<?php echo $_REQUEST['screenname']; ?>"><font color="red" size="5">*</font>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['id']; ?>">
	<tr>
		<td>Enter Capacity :
		<td><input required class="txt" type="number" name="txtcapacity" id="txtcapacity" value="<?php echo $_REQUEST['capacity']; ?>"><font color="red" size="5">*</font>
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
	$theatreid=$_REQUEST['txttheatreid'];
	$capacity=$_REQUEST['txtcapacity'];
	
	if($op=="Save")
	{
		$sql="insert into screenmaster (screenname,theatreid,capacity) 
		values('$name','$theatreid','$capacity')";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('screenname must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="update screenmaster set screenname='$name',theatreid='$theatreid',
			capacity='$capacity' where screenid='$id'";
//		echo $sql;die;
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('screenname must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from screenmaster where screenid=".$_REQUEST['id'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('screenname must be unique.');</script>";
	}
	
	$sql="Select *from screenmaster  where screenid in (select screenid from screenmaster where theatreid=(Select theatreid from managermaster where managerid=".$_SESSION['userid'].")) order by theatreid ";
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="100%" border="1"  class=tabledata>
		<tr><td align="center">Screen Id
		<td align=center>Theatre Name<td align=center>Screen Name<td>Capacity<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$theatreid=$row[1];
			$name=$row[2];
			$capacity=$row[3];
			
			$s="select theatrename from theatremaster where theatreid=$theatreid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			echo "<tr>";
			echo "<td>".$row['screenid'];
			echo "<td>".$row1[0];
			echo "<td>".$row['screenname'];
			echo "<td>".$row['capacity'];
			
			echo "<td><a href='screen.php?id=$id&screenname=$name&theatreid=$theatreid&capacity=$capacity&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='screen.php?id=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
	<br><br>
