<?php
    include('header.php');
	include('connect.php');
	if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="succf")
	{
		echo "<script>alert('Review sent to admin/manager successfully.');</script>";
	}
	if($_REQUEST['msg']=="succb")
	{
		echo "<script>alert('Booking Confirmed.');</script>";
	}
?>
<center>
<h1>Book Your Show</h1>
<form name="frmlogin" method="post">
<div style="background-color:silver;width:980px;align:center;border-radius:10px;border:2px solid black">
<center>
	<table cellspacing=10 cellpadding=10 width=100% >
<?php
	$sql="select *from moviemaster";
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

	if($i%4==0 || $i==0)
		echo "<tr><td colspan=4><hr  color=gray size=2><tr>";

	echo "<td>";
	
	?>
	    <div class="movie">
          <div class="movie-image"> 
		  <a href="#">
		  <img src="admin/upload/<?php echo $imagename; ?>" alt="<?php echo $moviename; ?>" /></a> </div>
          <br><div class="rating">
            <center>
			<a title="Movie Detail" href="moviedetail.php?movieid=<?php echo $id; ?>"><img src='images/favorites.png' height=30></a>
			<a title="Write Review" href="review.php?movieid=<?php echo $id; ?>&moviename=<?php echo $moviename; ?>"><img src='images/review.png' height=30></a>
			<a title="Book Now" href="book.php?movieid=<?php echo $id; ?>&moviename=<?php echo $moviename; ?>"><img src='images/book-now.png' height=30></a></center> 
		</div>	
        </div>
	
	<?php
		$i++;
	}
?>
</table>
</div>
</form>
<?php
     include('footer.php');
?>


