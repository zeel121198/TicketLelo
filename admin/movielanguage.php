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

<h1>Manage movielanguage </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;border:3px solid black;">
<table>
	<tr>
		<td>Select movie : 
		<td><select class="txt" name="txtmovieid" id="txtmovieid">
				
		<?php
			$sql="select *from moviemaster";
			$res=mysql_query($sql);
			
			while($row=mysql_fetch_array($res))
			{	
		?>
				<option <?php if($_REQUEST['movieid']==$row[0]){ ?> selected <?php } ?> value="<?php echo $row['movieid']; ?>"><?php echo $row['moviename']; ?>
		<?php
			}
		?>
			</select>	
	<tr>
		<td>Select Language : 
		<td><select class="txt" name="txtlanguageid" id="txtlanguageid">
				
		<?php
			$sql="select *from languagemaster";
			$res=mysql_query($sql);
			
			while($row=mysql_fetch_array($res))
			{	
		?>
				<option <?php if($_REQUEST['languageid']==$row[0]){ ?> selected <?php } ?> value="<?php echo $row['languageid']; ?>"><?php echo $row['languagename']; ?>
		<?php
			}
		?>
			</select>	
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
	$languageid=$_REQUEST['txtlanguageid'];
	$movieid=$_REQUEST['txtmovieid'];
	if($op=="Save")
	{
		$sql="insert into movielanguagemaster (languageid,movieid) values('$languageid','$movieid')";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('movielanguagename must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="update movielanguagemaster set movieid='$movieid',languageid='$languageid' where movielanguageid='$id'";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('movielanguagename must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from movielanguagemaster where movielanguageid=".$_REQUEST['movielanguageid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('movielanguagename must be unique.');</script>";
	}
	
	$sql="Select *from movielanguagemaster order by movielanguageid";
	$res=mysql_query($sql);
?>
	<br><br>
	<div style="background-color:silver;width:500px;">
	<table width="100%"  class=tabledata>
		<tr><td align="center">Id<td align=center>Movie Name<td align=center>Language Name<td align=center>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$movieid=$row[1];
			$languageid=$row[2];
			
			$s="select moviename from moviemaster where movieid=$movieid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			$s="select languagename from languagemaster where languageid=$languageid";
			$r=mysql_query($s);
			$row2=mysql_fetch_array($r);
			
			echo "<tr>";
			echo "<td>".$row['movielanguageid'];
			echo "<td>".$row1['moviename'];
			echo "<td>".$row2['languagename'];
			
			echo "<td><a href='movielanguage.php?movielanguageid=$id&movieid=$movieid&languageid=$languageid&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='movielanguage.php?movielanguageid=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
</div>
