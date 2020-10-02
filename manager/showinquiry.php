<?php
	include('header.php');
?>
<center>
<h1>Complain Reply</h1>
<div style="background-color:silver;width:980px;align:center;border-radius:10px;border:2px solid black">
<br><br>
<?php
	$sql="select *from inquirydetail where theatreid in (Select theatreid from managermaster where managerid=".$_SESSION['userid'].")";
	//echo $sql;
	$result=mysql_query($sql,$con);
	
	echo "<table  width=100% class=tabledata>
		<tr  class=head>
		<td  class=head>Complain Id
		<td  class=head>User Name
		<td  class=head>Subject
		<td  class=head>Detail
		<td  class=head>Date Of Complain
		<td  class=head>Manager Reply
		<td  class=head>Write Reply";
	
	while($row=mysql_fetch_array($result))
	{
		$iid=$row['inquiryid'];
		$userid=$row['userid'];
		$detail=$row['detail'];

		$type=substr($row['userid'],0,3);
		
		$sql1="select name from usermaster where userid=".$row['userid'];
		$res1=mysql_query($sql1);
		$r=mysql_fetch_array($res1);
		$uname=$r[0];
				

		echo "<tr><td><br><br>";
		echo $row['inquiryid'];
		echo "<td>";
		echo $uname;
		echo "<td>";
		echo $row['subject'];
		echo "<td>";
		echo $row['detail'];
		echo "<td>";
		echo $row['dateofinquiry'];
		echo "<td>";
		echo "<font color=red><br>Reply : </font>".$row['reply']."</font><br><font color=red><br>Reply Date : </font>".$row['dateofreply'];
		echo "<td><a href='replyinquiry.php?id=$iid&detail=$detail'><img src=pencil.png></a>";
	}
	
	echo "<tr><td colspan=7><font color=red><p align='right'><a href='playermaster.php'><font color=red><b>Back</a> |
	<a href='#' onclick='window.print()'><font color=red><b>Print</a></p><br><br>";
	echo "</table><br><br><br></div></center>";
	include('footer.php');
?>