<?php
	include('header1.php');
?>
<div class="menu_block2">						
	Visitor Inquiry Report
</div>

<?php
	$sql="select *from visitorinquiry";
	$result=mysql_query($sql,$con);
	
	echo "<br><br><table class=mytable>
		<tr  class=head>
		<td  class=head>Inquiry Id
		<td  class=head>Name
		<td  class=head>Contact Detail
		<td  class=head>Subject
		<td  class=head>Detail
		<td  class=head>Date Of Inquiry";
	
	while($row=mysql_fetch_array($result))
	{
		echo "<tr><td>";
		echo $row['inquiryid'];
		echo "<td>";
		echo $row['name'];
		echo "<td>";
		echo $row['contactno']."<br>".$row['email'];
		echo "<td>";
		echo $row['subject'];
		echo "<td>";
		echo $row['detail'];
		echo "<td>";
		echo $row['dateofinquiry'];
		echo "<tr><td colspan=6><hr>";
	}
	
	echo "<tr><td colspan=6><font color=red><p align='right'><a href='showvisitorinquiry.php'><font color=red><b>Back</a> |
	<a href='#' onclick='window.print()'><font color=red><b>Print</a></p><br><br>";
	echo "</table>";
	include('footer1.php');
?>