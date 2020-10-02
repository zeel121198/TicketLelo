<?php 
	include('header.php'); 
?>
<head>
<script language="javascript">
</script>
</head>
<center>
<h1>Write your Inquiry Here...</h1>
<form name="frmsignup" method="post">
<div style="background-color:silver;width:980px;height:auto;border-radius:10px;">
<center>
	<form method="get" name="frm"><center>
		<table align=center>
		<tr><td>&nbsp;</tr>
			<tr>
			<td>Your Name :
			<td><input class=txt type="text"  name="txtname" required>
			<tr>
			<td>Contact No :
			<td><input class=txt type="text"  onblur="checkphno(this);"  name="txtcontact" required>
			<tr>
			<td>Email Id :
			<td><input class=txt type="email" value="" name="txtemail" required>
			<tr>
			<td>Subject : 
			<td><input class=txt type="text" value="" name="txtsubject">
			<tr>
			<td>Inquiry Detail :
			<td><textarea class=txt1 name="txtdetail" rows=10 cols=75></textarea>
			<tr><td>&nbsp;</tr>
			<tr>
			<td align=center colspan=2>
			<input type="submit"  class="button" value="Send Inquiry" name="submit" class="button">
			<input type="reset" class="button" value="Clear" class="button">			
			<tr><td>&nbsp;</tr>
			<tr><td>&nbsp;</tr>
		</table>
		</form>		
<?php
	 $op=$_REQUEST['submit'];
	 //echo $op;die;
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Send Inquiry")
	 {
		$name=$_REQUEST['txtname'];
		$contact=$_REQUEST['txtcontact'];
		$email=$_REQUEST['txtemail'];
		$subject=$_REQUEST['txtsubject'];
		$detail=$_REQUEST['txtdetail'];
		
		$sql="insert into visitorinquiry (name,contactno,email,subject,detail,dateofinquiry) values('$name','$contact','$email','$subject','$detail',NOW())";

		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Inquiry sent to Administrator. Admin will call you soon.');</script>";
			header('Location: index.php?msg=succi');
		}
		else
			echo mysql_error();
		}
?>
</div>	
<?php
include('footer.php');
?>