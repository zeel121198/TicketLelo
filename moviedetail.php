<?php
     include('header.php');
	 include('connect.php');
?>
<script language='javascript'>
	
	
</script>
<center>
<h1>Movie Detail</h1>
<form name="frmlogin" method="post">
<div style="background-color:silver;width:980px;border-radius:10px;border:2px solid black">
<table width=100% >
<?php
	$sql="select *from moviemaster where movieid=".$_REQUEST['movieid'];
	$res=mysql_query($sql);
	
	while($row=mysql_fetch_array($res))
	{
	$id=$row['movieid'];
	$imagename=$row['image'];
	$moviename=$row['moviename'];
	$languageid=$row['languageid'];
	$startdate=$row['startdate'];
	$desc=$row['description'];
	$link=$row['youtubelink'];
	
	$sql2="select languagename from languagemaster where languageid=$languageid";
	$res2=mysql_query($sql2);
	$row2=mysql_fetch_array($res2);
	$lname=$row2[0];

	?>

	<?php
	echo "<tr><td valign=top bgcolor=#aaaaaa style='border:1px solid #666666;'>
	<b><font color=red>Movie Name : </font> $moviename
	<br><br><font color=red>  Language : </font>$lname".
	"<br><br><font color=red>Launch Date : </font>$startdate".		
	"<br><br><font color=red>Description : </font>$desc".
	"<br><br><center>
	<a target='_blank' id='home' href='$link'>
	<img class='image_on' src='admin/upload/$imagename' width=400 height=400>
	<img class='image_off' src='images/download.png' width=400 height=400>
	</a><br><br><b>".
	"<td valign=bottom bgcolor=#aaaaaa style='border:1px solid #666666;'><a href='$link'><img src='images/download.png' height=50></a></span>";
	}
?>
</table>
</div>
</form>
<?php
     include('footer.php');
?>