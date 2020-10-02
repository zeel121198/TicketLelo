<?php

$theatre=$_REQUEST['theatre'];
$con = mysql_connect('localhost', 'root', ''); 
mysql_select_db('moviedb');

$query="SELECT screenid,screenname FROM screenmaster where theatreid=$theatre";

$result=mysql_query($query);
?>
<select name="txtscreenid" class="txt">
<option>Select Screen </option>
<? while($row=mysql_fetch_array($result)) { ?>
	<option value=<?=$row[0]?>><?=$row[1]?></option>
<? } ?>
</select>
