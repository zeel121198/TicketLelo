<?php
	include('header.php'); 
	if(!isset($_SESSION['uname']))
	{
		header('Location: login.php?msg=lf');
	}
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
	
	function getShowtime(theatre,movie) {		
		
		var strURL="findShowtime.php?theatre="+theatre+"&movie="+movie;
		//alert(strURL);
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('showtimediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCharges(show) {		
		
		var strURL="findCharges.php?show="+show;
		//alert(strURL);
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
					//alert(req.responseText);
						document.getElementById('txtCharges').value=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	function getTotal()
	{
		//alert('hi');
		var c=document.getElementById('txtCharges').value;
		var t=document.getElementById('txttickets').value;
	
		//alert(c);
		//alert(t);
		
		var ans=c*t;
//		alert(ans);
		
		document.getElementById('txttotal').value=ans;		
	}
</script>

<center>
<h1>Book Tickets</h1>
<form name="frm" method="post">
<div style="background-color:silver;width:500px;border-radius:10px;">
		<table border="0" align=center>
			<tr><td><br>
			<tr>
			<td>Your Name :
			<td><input class=txt type="text" value="<?php echo $_SESSION['uname']; ?>" name="txtname" required>
			<tr>
			<tr>
			<td>Movie Name :
			<td><input readonly class=txt type="text" value="<?php echo $_REQUEST['moviename']; ?>" name="txtname">
			<tr>
			<td>Select Theatre : 
			<td><select name="txttheatreid" id="txttheatreid" onChange="getShowtime(this.value,<?php echo $_REQUEST['movieid']; ?>);" class=txt >
				<?php
					$sql="select *from theatremaster where 
						areaid in(Select areaid from usermaster where userid=".$_SESSION['userid'].") 
						and
						theatreid in (select theatreid from screenmaster where screenid in 
						(select screenid from showdetail where movieid=".$_REQUEST['movieid']."))
						";
					$res=mysql_query($sql);
					
					while($row=mysql_fetch_array($res))
					{
						$areaid=$row['areaid'];
						
						$sql1="Select cityname from citymaster where cityid=(select cityid from areamaster where areaid=$areaid)";
						$res1=mysql_query($sql1);
						$row1=mysql_fetch_array($res1);
				?>
					<option value="<?php echo $row['theatreid']; ?>"><?php echo $row[0]."-".$row['theatrename']."-".$row1[0]; ?>
				<?php
					}
				?>
				</select><font color="red" size="5">*</font>
		<tr style="">
			<td>Select Show Time : </td>
			<td ><div id="showtimediv">
				<select name="txtshowtimeid" class="txt" onchange="getCharges(this.value);">
					<option>Select Theatre First</option>
				</select></div></td>
		</tr>
		<tr>
			<td>Show Date :
			<td>
						<?php
							$myCalendar = new tc_calendar("txtshowdate", true);
							$myCalendar->setIcon("calendar/images/iconCalendar.gif");
							$myCalendar->setDate(01, 03, 2018);
							$myCalendar->setPath("calendar/");
							$myCalendar->setYearInterval(2018, 2020);
							$myCalendar->dateAllow('2018-01-01', '2020-12-31');
							//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
							$myCalendar->setOnChange("myChanged('test')");
							$myCalendar->writeScript();
						?><br><br>
					</td>
				</tr>
		<tr>
			<td>Ticket Charges : 
			<td><input readonly class=txt type="text" name="txtCharges" id="txtCharges" onblur="getTotal();">
		<tr>
			<td>Number of Tickets :
			<td><input type="number" class=txt required name="txttickets" id="txttickets" onblur="getTotal();">
		<tr>
			<td>Total Charges :
			<td><input readonly type="number" class=txt required name="txttotal" id="txttotal">	
		<tr><td><br>
			<tr>
			<td colspan=2>
			<input type="submit"  class=button value="Book Now" name="submit" class="button">
			<input type="submit" formnovalidate name="submit" value="Cancel" class="button">			
			<tr><td><br>
		</table>
		</form>		
		</div>
<?php
	 $op=$_REQUEST['submit'];
	 //echo $op;die;
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Book Now")
	 {		
		$userid=$_SESSION['userid'];
		$showid=$_REQUEST['txtshowid'];
		$charges=$_REQUEST['txtcharges'];
		$tickets=$_REQUEST['txttickets'];
		$total=$_REQUEST['txttotal'];
		$showdate=$_REQUEST['txtshowdate'];
		
		$sql="insert into bookingdetails 
		(userid,showid,dateofbooking,noofseats,ticketcharges,totalcharges,showdate) 
		values('$userid','$showid',NOW(),'$tickets','$charges','$total','$showdate')";

		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Booking is Confirmed.');</script>";
			header('Location: movie.php?msg=succb');
		}
		else
			echo mysql_error();
	}
?>
</center>

<?php
include('footer.php');
?>