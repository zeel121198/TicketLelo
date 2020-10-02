<?php
     include('header.php');
	 include('connect.php');
?>
<center>
<h1>Download Songs/Videos</h1>
<form name="frmlogin" method="post">
<div style="background-color:silver;width:980px;align:center;border-radius:10px;border:2px solid black">
<center>
	<table align=center>
	<tr><td><br>
		<tr>
			<td align=right>Select Movie : 
			<td><select class=txt name="txtmovieid">
			<?php
				$sql="select * from moviemaster";
				$res=mysql_query($sql);
				
				while($row=mysql_fetch_array($res))
				{
			?>
					<option value="<?php echo $row[0]; ?>"><?php echo $row[2]; ?></option>
			<?php
				}
			?>
			</select>
			<input type="submit" name="submit" value="Search" class="button">
			<tr><td><br>
		</table>
	<table cellspacing=10 cellpadding=10 width=100% >
<?php
	$op=$_REQUEST['submit'];
	
	if($op=="Search")
	{
	$movieid=$_REQUEST['txtmovieid'];
	$op=$_REQUEST['submit'];
	$sql="select *from uploadmaster where movieid=$movieid";
	$res=mysql_query($sql);
	$i=0;
	
	while($row=mysql_fetch_array($res))
	{
	$id=$row['uploadid'];
	$filename=$row['filename'];
	$uploadname=$row['name'];
	$userid=$row['userid'];
	$movieid=$row['movieid'];
	$imagename=$row['coverimage'];
	
	if($userid==0)
		$adminname="ADMIN";
	else
	{
		$sql1="select adminname from adminmaster where userid=$userid";
		$res1=mysql_query($sql1);
		$row1=mysql_fetch_array($res1);
		$adminname=$row1['adminname'];
	}
	
	$sql2="select moviename from moviemaster where movieid=$movieid";
	$res2=mysql_query($sql2);
	$row2=mysql_fetch_array($res2);
	$moviename=$row2['moviename'];

	if($i%3==0 || $i==0)
		echo "<tr>";

	echo "<td bgcolor=#aaaaaa align=center style='border:1px solid #666666;'>
	<br><img src='admin/upload/$imagename' width=175 height=175><br><br><b>".$uploadname.
	"<br><br><a href='admin/upload/$filename' download>Download</a>
	 | <a href='admin/upload/$filename'>Play</a>
	 <br><hr size=3 color=#666666></td>";
	
	$i++;
	}}
?>
</table>
</div>
</form>
<?php
     include('footer.php');
?>