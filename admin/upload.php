<!DOCTYPE html>

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
<head>
<script language="javascript" type="text/javascript">

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
</script>
</head>
<h1>Upload Audio/Video</h1>
<form name="frm" method="post" enctype="multipart/form-data">
<div style="background-color:silver;width:700px;border-radius:10px;border:3px solid black;">
<table width=100% align=center>
<?php
	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")
	{
?>
<tr>
<td>Upload Id:
<td>
<input class="txt" type=text name="txtid" value="<?php echo $_REQUEST['id']; ?>">
	<?php
	}
	?>
	<tr>
		<td>Manager/Admin Name :
		<td><input class="txt" readonly type="text" name="txtadminname" value="<?php echo $_SESSION['aname']; ?>"  class="txt"><span class="err">*</span></td>

<tr>
			<td> Title :
			<td><input class="txt"  type="text" name="txtupload" value="<?php if(isset($_REQUEST['uploadtitle'])){echo $_REQUEST['name'];} ?>"><font color="red" size="5">*</font>
	<tr>
<td>Select Movie :
<td><select name="movieid" id="movieid" class="txt" >
	<?php
		$sql="select *from moviemaster";
		$res=mysql_query($sql);
		
		while($row=mysql_fetch_array($res))
		{
		?>			
		<option value="<?php echo $row['movieid']; ?>"><?php echo $row['moviename']; ?>			
		<?php
		}
	?>
</select><font color="red" size="5">*</font>
			
			
<tr>
<td>Select Image to Upload :
<td><input class="txt" id="txtfile" name="txtfile" type="file" onChange="readURL(this);" 
accept="image/*"><font color="red" size="5">*</font>
	<img src="" id="blah" height="200" width="200">
			<tr>
<td>Select Audio/Video :
<td>
<input accept="video/*|audio/*" type="file" class="txt" name="file" id="file" /> <font color="red" size="5">*</font>
<tr><td colspan=2 align=center>
			<?php
				if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit")
				{
			?>
			<input class="btn" type="submit" name="submit" value="Update">
			<?php
				}
				else
				{
			?>
			<input class="button" type="submit" name="submit" value="Save">
			<?php
				}
			?>
			<input class="button" type="reset" name="reset" value="Clear">
			</tr></table></center>
					</form>
<?php

if(isset($_REQUEST["submit"]))
{
	//$uploadid=$_REQUEST['txtid'];
	$adminid=$_SESSION['adminid'];
	$uploadname=$_REQUEST['txtupload'];
	$movieid=$_REQUEST['movieid'];
	$type=$_FILES["file"]["type"];
	$size=$_FILES["file"]["size"];
	$filename=$_FILES["file"]['name'];
	$op=$_REQUEST["submit"];
	$imagename=$_FILES["txtfile"]["name"];
	
	if($op=="Save")
	{
		if($size < 2000000000000)  
		{			  
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else
			{
		/*		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
		*/
				if (file_exists("upload/" . $_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $filename);
				}
				if (file_exists("upload/" . $_FILES["txtfile"]["name"]))
				{
				//	echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES['txtfile']['tmp_name'], "upload/".$_FILES["txtfile"]["name"]);
				}
					$old="upload/".$filename;
					$new=str_replace(" ","","upload/".$filename);
					$new=str_replace("(","",$new);
					$new=str_replace("'","''",$new);

					rename($old,$new);
					$filename=str_replace(" ","",$filename);
					$filename=str_replace("(","",$filename);
					$filename=str_replace("'","''",$filename);

					$sql="insert into uploadmaster(userid,name,filename,movieid,coverimage,view,liking) values('$adminid','$uploadname','$filename','$movieid','$imagename',0,0)";
			//		echo $sql;die;
					$res=mysql_query($sql);

					if($res)
						echo "<script>alert('Record Save Successfully')</script><br>";
					else
						echo mysql_error(),"<br>";
				
			}
		}
	}
	if($op=="Update")
	{
		$sql="";
		if(isset($filename))
		{
			$id=$_POST["txtid"];
				if (file_exists("uploads/" . $_FILES["file"]["name"]))
				{
				//	echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/" . $filename);
				}
				$sql="Update uploadmaster set userid='$adminid',filename='$filename',name='$uploadname',movieid='$movieid' where uploadid='$id'";
		}
		else
		{
			$sql="Update uploadmaster set userid='$adminid',filename='$filename',name='$uploadname',movieid='$movieid' where uploadid='$id'";
		}
		//echo $sql;die;
		$res=mysql_query($sql);
		if($res)
		{
			echo "<script>alert('Record Updated Successfully')</script><br>";
			header("location: upload.php");
		}
		else
		{	
			echo mysql_error(),"<br>";
		}
	}
}

	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="delete")
	{
	$op=$_REQUEST['mode'];//edit | delete
	$id=$_REQUEST['id'];	//id
	if($op=="delete")
	{
	$sql="delete from uploadmaster where uploadid=$id";
	//echo $sql;die;
	$res=mysql_query($sql);

	if($res)
	{
	echo "<script>alert('Record Deleted Successfully');</script><br>";
	header("location: upload.php");
	}
	else	
	echo mysql_error(),"<br>";
	}
	}

	$sql="select *from uploadmaster";
	$res=mysql_query($sql);
	?>
	<br><br><center>
<?php
	echo "<table width=100% class=tabledata>
	<tr bgcolor=white><td><b>Upload Id<td><b>Uploader Name<td><b>Cover Image
	<td><b>Upload Title<td><b>Movie Name<td colspan=2><b><font color=black>Options</b></font>";
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
	
	$sql1="select moviename from moviemaster where movieid=$movieid";
	$res1=mysql_query($sql1);
	$row1=mysql_fetch_array($res1);
	$moviename=$row1['moviename'];

	echo "<tr><td><font color=black>".$row['uploadid'].
	"<td><font color=black>".$adminname.
	"<td class=tdc><img src='upload/$imagename' width=75 height=75></a></td>".
	"<td><font color=black>".$row['name'].
	"<td><font color=black>".$moviename;
	?>
	<?php echo "<td><font color=black><a href='upload.php?mode=edit&id=$id&adminname=$adminname&uploadname=$uploadname&filename=$filename&movieid=$moviename' onclick='return edit();'><img src=pencil.png></a>
	<td><a href='adminupload.php?mode=delete&id=$id' onclick='return del();'><img src=cross.png></a>";
}
echo "</table><br><br>";
?>