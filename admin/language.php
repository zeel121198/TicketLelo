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

<h1>Manage Language </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:600px;border-radius:10px;border:3px solid black;">
<table>
	<tr>
		<td>Enter Language Name :
		<td><input class="txt" type="text" name="txtname" id="txtname" value="<?php echo $_REQUEST['languagename']; ?>" required>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['languageid']; ?>"><font color="red" size="5">*</font>
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
	
	if($op=="Update")
	{
		$sql="update languagemaster set languagename='$name' where languageid='$id'";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('Languagename must be unique.');</script>";
	}
	else if($op=="Save")
	{
		$sql="insert into languagemaster (languagename) values('$name')";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('Languagename must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from languagemaster where languageid=".$_REQUEST['languageid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('Languagename must be unique.');</script>";
	}
	
	$sql="Select *from Languagemaster order by Languageid";
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="100%" border="1"  class=tabledata>
		<tr><td align="center">Language Id<td align=center>Language Name<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$name=$row[1];
			
			echo "<tr>";
			echo "<td>".$row[0];
			echo "<td>".$row[1];
			echo "<td><a href='language.php?languageid=$id&languagename=$name&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='language.php?languageid=$id&submit=Delete&mode=delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
