<?php
	include('header.php');
?>
<center>
<h1>Booking History</h1>
<br><br>
<?php
	$sql="select *from bookingdetails where userid=".$_SESSION['userid']."";
	//echo $sql;
	$result=mysql_query($sql,$con);
	
	echo "<table  width=100% class=tabledata>
		<tr  class=head>
		<td  class=head>Id
		<td  class=head>User Name
		<td  class=head>Show Detail
		<td  class=head>Date Of Booking
		<td  class=head>No Of Seats
		<td  class=head>Ticket Charges
		<td  class=head>Total Charges";
	echo "<tr><td colspan=7><hr>";
	while($row=mysql_fetch_array($result))
	{
		
		$userid=$row['userid'];
		$sql1="select name from usermaster where userid=".$row['userid'];
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$uname=$r[0];
		
		$sql1="select *from showdetail where showid=".$row['showid'];
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$showtime=$r['showtime'];
		$movieid=$r['movieid'];
		$lid=$r['languageid'];
		$screenid=$r['screenid'];
		
		$sql1="select *from moviemaster where movieid=$movieid";
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$mn=$r['moviename'];
		
		$sql1="select *from languagemaster where languageid=$lid";
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$ln=$r['languagename'];
		
		$sql1="select *from theatremaster where theatreid=(select theatreid from screenmaster where screenid=$screenid)";
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$tn=$r['theatrename'];
				
		echo "<tr><td>";
		echo $row['bookingid'];
		echo "<td>";
		echo $uname;
		echo "<td>";
		echo $showtime."<br>".$mn."<br>".$ln."<br>".$tn;
		echo "<td>";
		echo $row['dateofbooking'];
		echo "<td>";
		echo $row['noofseats'];
		echo "<td>";
		echo $row['ticketcharges'];
		echo "<td>";
		echo $row['totalcharges'];
		echo "<tr><td colspan=7><hr>";
	}
	
	echo "<tr><td colspan=7><font color=red><p align='right'><a href='playermaster.php'><font color=red><b>Back</a> |
	<a href='#' onclick='window.print()'><font color=red><b>Print</a></p><br><br>";
	echo "</table><br><br><br></div></center>";
	include('footer.php');
?>