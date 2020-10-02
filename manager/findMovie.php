<?php

$language=$_REQUEST['l'];
$con = mysql_connect('localhost', 'root', ''); 
mysql_select_db('moviedb');

$query="SELECT movieid,moviename FROM moviemaster where languageid=$language";

$result=mysql_query($query);
?>
<select name="txtmovieid" class="txt">
<option>Select Movie </option>
<? while($row=mysql_fetch_array($result)) { ?>
	<option value=<?=$row[0]?>><?=$row[1]?></option>
<? } ?>
</select>
