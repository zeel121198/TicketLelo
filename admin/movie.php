<?php
	include('connect.php');
	include('header.php');
	if(!isset($_SESSION['aname']))
	{
		header('Location: login.php?msg=lf');
	}
?>
<?php 
	require_once('calendar/classes/tc_calendar.php');
?>
<script language="javascript" src="calendar/calendar.js"></script>

<script language="javascript">
	function readURL(input) 
	{
        if (input.files && input.files[0]) 
		{
            var reader = new FileReader();

            reader.onload = function (e) 
			{
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

function delete1() {
   var answer = confirm("Do you want to delete this record?");
   return answer;
}
</script>

<h1>Manage Movie </h1>
<form name="frm" method="post" enctype="multipart/form-data">
<div style="background-color:silver;width:500px;border-radius:10px;border:3px solid black;">
<table>
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
		<td>Enter Movie Name :
		<td><input required class="txt" type="text" name="txtname" id="txtname" value="<?php echo $_REQUEST['moviename']; ?>"><font color="red" size="5">*</font>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['movieid']; ?>">
	<tr>
		<td>Enter Launch Date :
		<td>	
			<?php
				$myCalendar = new tc_calendar("txtstartdate", true);
				$myCalendar->setIcon("calendar/images/iconCalendar.gif");
				$myCalendar->setDate(date('d'), date('m'), date('Y'));
				$myCalendar->setPath("calendar/");
				$myCalendar->setYearInterval(2018, 2020);
				$myCalendar->dateAllow('2018-01-01', '2020-12-31');
				//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
				$myCalendar->setOnChange("myChanged('test')");
				$myCalendar->writeScript();
			?><br><br>
	<tr>
		<td>Enter Movie Description :
		<td><textarea col=100 rows=10 required class="txt" type="text" name="txtdescription" id="txtdescription"><?php echo $_REQUEST['description']; ?></textarea>
			<font color="red" size="5">*</font>
	<tr>
		<td>Enter Trailer Link :
		<td><input required class="txt" type="text" name="txtlink" id="txtlink" value="<?php echo $_REQUEST['link']; ?>"><font color="red" size="5">*</font>
	<tr>
		<td>Select Image to Upload :
		<td><input class="txt" id="txtfile" name="txtfile" type="file" onChange="readURL(this);" 
		accept="image/*"><font color="red" size="5">*</font>
		<img src="" id="blah" height="200" width="200">
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
			<br><br>
			<a href="movielanguage.php">Movie Launched In Languages</a>
	</tr>
</table>
</div>
</form>

<?php

	$op=$_REQUEST['submit'];
	$id=$_REQUEST['txtid'];
	$name=$_REQUEST['txtname'];
	$languageid=$_REQUEST['txtlanguageid'];
	$startdate=$_REQUEST['txtstartdate'];
	$description=$_REQUEST['txtdescription'];
	$imagename=$_FILES["txtfile"]["name"];
	$link=$_REQUEST['txtlink'];
	
	if($op=="Save")
	{
		if (file_exists("upload/" . $_FILES["txtfile"]["name"]))
		{}
		else
		{
			move_uploaded_file($_FILES['txtfile']['tmp_name'], "upload/".$_FILES["txtfile"]["name"]);
		}

		$sql="insert into moviemaster (moviename,languageid,startdate,description,image,youtubelink)
		values('$name','$languageid','$startdate','$description','$imagename','$link')";
		
		//echo $sql;die;
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('moviename must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="";
		if(isset($imagename))
		{
			if (file_exists("upload/" . $_FILES["txtfile"]["name"]))
			{}
			else
			{
				move_uploaded_file($_FILES['txtfile']['tmp_name'], "upload/".$_FILES["txtfile"]["name"]);
			}
			$sql="update moviemaster set image='$imagename',moviename='$name',languageid='$languageid',youtubelink='$link',
				startdate='$startdate',description='$description' where movieid='$id'";
		}
		else
		{
			$sql="update moviemaster set moviename='$name',languageid='$languageid',
				startdate='$startdate',description='$description' where movieid='$id'";
		}
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('moviename must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from moviemaster where movieid=".$_REQUEST['movieid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('moviename must be unique.');</script>";
	}
	
	$sql="Select *from moviemaster order by movieid";
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="100%" border="1"  class=tabledata>
		<tr><td align="center">Movie Id<td align=center>Language Name<td align=center>Movie Name<td>Launch Date<td>Description<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$languageid=$row[1];
			$name=$row[2];
			$startdate=$row[3];
			$description=$row[4];
			$filename=$row[5];
			
			$s="select languagename from languagemaster where languageid=$languageid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			echo "<tr>";
			echo "<td>".$row['movieid'];
			echo "<td>".$row1['languagename'];
			echo "<td>".$row['moviename'];
			echo "<td>".$row['startdate'];
			echo "<td>".$row['description']."<br><img height=200 width=200 src='upload/".$filename."'>";
			
			echo "<td><a href='movie.php?movieid=$id&moviename=$name&languageid=$languageid&startdate=$startdate&description=$description&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='movie.php?movieid=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
<br><br>