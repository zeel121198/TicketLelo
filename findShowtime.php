<?php
$movie=$_REQUEST['movie'];
$theatre=$_REQUEST['theatre'];

$con = mysql_connect('localhost', 'root', ''); 
mysql_select_db('moviedb');

$sql="select *from showdetail where 
	movieid=$movie and
	screenid in (select screenid from screenmaster where theatreid=$theatre)
	";

$result=mysql_query($sql);
?>
<select name="txtshowtimeid" class="txt" onchange="getCharges(this.value);">
<option>Select Showtime </option>
<?php while($row=mysql_fetch_array($result)) { ?>
	<option value=<?=$row[0]?>><?=$row[6];?></option>
<?php } ?>
</select>

