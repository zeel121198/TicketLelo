<?php include('header.php'); ?>
<center>
<h1>Moviewise Reviews</h1>
<form name="frml" method="post">
<div style="background-color:silver;width:980px;align:center;border-radius:10px;border:2px solid black">
	<table align=center>
	<tr><td>
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
		</table>
	<table cellspacing=10 cellpadding=10 width=100% >
<?php
	$op=$_REQUEST['submit'];
	
	if($op=="Search")
	{
		$sql="select *from reviewdetails where movieid=".$_REQUEST['txtmovieid'];
	//echo $sql;
	$res=mysql_query($sql);
	if(mysql_num_rows($res)>0)
	{
		echo "<table cellpadding=5 cellspacing=5 width=100% class=tabledata>
		<tr><td><b>Review Id
		<td><b>UserName
		<td><b>Subject
		<td><b>Description
		<td><b>Date of Review</center>";
		
		while($row=mysql_fetch_array($res))
		{
				echo "<tr>";
				echo "<td>".$row['reviewid'];
		
				$sql1="select name from usermaster where userid=".$row['userid'];
				$res1=mysql_query($sql1);
				$r=mysql_fetch_array($res1);
				$uname=$r[0];
				
				echo "<td>".$uname;
				echo "<td>".$row['subject'];
				echo "<td>".$row['details'];
				echo "<td>".$row['dateofreview'];
				
		}
		echo "<tr><td colspan=5><font color=red><p align='right'><a href='index.php'><font color=red><b>Back</a> |
		<a href='#' onclick='window.print()'><font color=red><b>Print</a></p>";
		echo "</table><bR><br>";
	}
	else
	{
		echo "<script>alert('No Reviews found for selected movie.');</script>";
	}
	}
?>
</div>
</form>
</center>
</div>
<?php
	include('footer.php');
?>