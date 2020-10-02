<?php
	include('connect.php');
	include('header.php');
	if(!isset($_SESSION['mname']))
	{
		header('Location: login.php?msg=lf');
	}
?>
<?php 
	require_once('calendar/classes/tc_calendar.php');
?>
<script language="javascript" src="calendar/calendar.js"></script>

<script language="javascript">

	function getXMLHTTP() 
	{ //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getScreen(theatre) {		
		
		var strURL="findScreen.php?theatre="+theatre;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('screendiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	function getMovie(l) {		
		
		var strURL="findMovie.php?l="+l;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('moviediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

function delete1() {
   var answer = confirm("Do you want to delete this record?");
   return answer;
}
</script>

<h1>Manage Show Times </h1>
<form name="frm" method="get">
<div style="background-color:silver;width:500px;border-radius:10px;border:3px solid black;">
<table>
	<tr>
		<td>Select Language : 
		<td><select class="txt" name="txtlanguageid" id="txtlanguageid" 
		onChange="getMovie(this.value);">
				
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
		<tr style="">
			<td>Select Movie : </td>
			<td ><div id="moviediv">
				<select name="txtmovieid" class="txt" >
					<option>Select Language First</option>
				</select></div></td>
		</tr>
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
		<td>Select Screen : 
		<td><select class="txt" name="txtscreenid" id="txtscreenid">
				
		<?php
			$sql="select *from screenmaster where theatreid in (Select theatreid from managermaster where managerid=".$_SESSION['userid'].")";
			$res=mysql_query($sql);
			while($row=mysql_fetch_array($res))
			{	
				
		?>
				<option <?php if($_REQUEST['screenid']==$row[0]){ ?> selected <?php } ?> value="<?php echo $row['screenid']; ?>"><?php echo $row['screenname']; ?>
		<?php
			}
		?>
		</select>	
		
	<tr>
		<td>Enter Show Times :
		<td><input required class="txt" type="text" name="txtshowtime" id="txtshowtime" value="<?php echo $_REQUEST['movieshowtime']; ?>"><font color="red" size="5">*</font>
		<input class="txt" type="hidden" name="txtid" id="txtid" value="<?php echo $_REQUEST['showid']; ?>">
	<tr>
		<td>Enter Start Date :
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
		<td>Enter End Date :
		<td>	
			<?php
				$myCalendar = new tc_calendar("txtenddate", true);
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
	$name=$_REQUEST['txtshowtime'];
	$languageid=$_REQUEST['txtlanguageid'];
	$movieid=$_REQUEST['txtmovieid'];
	$screenid=$_REQUEST['txtscreenid'];
	$startdate=$_REQUEST['txtstartdate'];
	$enddate=$_REQUEST['txtenddate'];
	$showtime=$_REQUEST['txtshowtime'];
	
	if($op=="Save")
	{
		$sql="insert into showdetail (showtime,languageid,startdate,enddate,movieid,screenid)
		values('$showtime','$languageid','$startdate','$enddate','$movieid','$screenid')";
		
		//echo $sql;die;
		
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Inserted');</script>";
		else
			echo "<script>alert('showtime must be unique.');</script>";
	}
	if($op=="Update")
	{
		$sql="update showdetail set showtime='$showtime',languageid='$languageid',
			startdate='$startdate',enddate='$enddate',movieid='$movieid',screenid='$screenid'
			where showid='$id'";
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Updated');</script>";
		else
			echo "<script>alert('movieshowtime must be unique.');</script>";
	}
	if($op=="Delete")
	{
		
		$sql="delete from showdetail where showid=".$_REQUEST['showid'];
		$res=mysql_query($sql);
		
		if($res)
			echo "<script>alert('Record Deleted');</script>";
		else
			echo "<script>alert('Showtime must be unique.');</script>";
	}
	
	$sql="Select *from showdetail where screenid in (select screenid from screenmaster where theatreid=(Select theatreid from managermaster where managerid=".$_SESSION['userid'].")) order by showid ";
//	echo $sql;
	$res=mysql_query($sql);
?>
	<br><br>
	<table width="100%" border="1"  class=tabledata>
		<tr><td align="center">Show Id
		<td align=center>Language
		<td align=center>Movie
		<td align=center>Theatre-Screen
		<td>Start Date
		<td>End Date
		<td>Show Time
		<td align=center colspan=2>Options</tr>
<?php	
		while($row=mysql_fetch_array($res))
		{
			$id=$row[0];
			$movieid=$row[1];
			$screenid=$row[2];
			$languageid=$row[3];
			$startdate=$row[4];
			$enddate=$row[5];
			$showtime=$row[6];
			
			$s="select languagename from languagemaster where languageid=$languageid";
			$r=mysql_query($s);
			$row1=mysql_fetch_array($r);
			
			$s1="select moviename from moviemaster where movieid=$movieid";
			$r1=mysql_query($s1);
			$row2=mysql_fetch_array($r1);
			
			$s2="select theatreid,screenname from screenmaster where screenid=$screenid";
			$r2=mysql_query($s2);
			$row3=mysql_fetch_array($r2);
			
			$theatreid=$row3[0];
			$s3="select theatrename from theatremaster where theatreid=$theatreid";
			$r3=mysql_query($s3);
			$row4=mysql_fetch_array($r3);
			
			echo "<tr>";
			echo "<td>".$row['showid'];
			echo "<td>".$row1['languagename'];
			echo "<td>".$row2['moviename'];
			echo "<td>".$row4['theatrename']."-".$row3['screenname'];
			echo "<td>".$row['startdate'];
			echo "<td>".$row['enddate'];
			echo "<td>".$row['showtime'];
			
			echo "<td><a href='showtimes.php?showid=$id&showtime=$showtime&languageid=$languageid&startdate=$startdate&enddate=$enddate&movieid=$movieid&screenid=$screenid&description=$description&mode=Update'><img src='pencil.png'></a>";
			echo "<td><a href='showtimes.php?showid=$id&submit=Delete' onclick='return delete1();'><img src='cross.png'></a>";
		}
?>
	</table>
<br><br>