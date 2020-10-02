<?php
	include('header.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
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
	function getSque(uname) 
	{	
		var strURL="findSque.php?uname="+uname;
		var req = getXMLHTTP();
		if (req) 
		{
			req.onreadystatechange = function() 
			{
			if (req.readyState == 4) {
				// only if "OK"
				if (req.status == 200) {					
					//alert(req.responseText);
					var response=req.responseText;
					var result=response.split("--");
					//alert(response);
					if(response=="0")
					{
						alert('Invalid UserName');
						document.frmfp.txtsque.value="";
						document.frmfp.txtuname.value="";
						document.frmfp.txtuname.focus();
					}
					else
					{
						document.frmfp.txtsque.value=result[0];
						document.frmfp.txtsansold.value=result[1];
					}	
				} 
				else 
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("POST", strURL, true);
		req.send(null);
		}		
	}
	function checkans()
	{
		if(document.frmfp.txtsans.value==document.frmfp.txtsansold.value)
		{
			document.frmfp.txtpword.disabled=false;
			document.frmfp.txtrpword.disabled=false;
		}
		else
		{
			alert('Invalid Security Answer');
			document.frmfp.txtpword.disabled=true;
			document.frmfp.txtrpword.disabled=true;
		}
	}
</script>
<center>
<h1>Reset Password</h1>
<form name="frmfp" method="post">
<div style="background-color:silver;width:500px;border-radius:10px;">
<center>
	<table>
		<tr>
			<td>Enter User Name :
			<td><input onblur="getSque(this.value);" class="txt" type="text" name="txtuname" required>				
		<tr>
			<td>Security Question :
			<td>
			<div id="squediv">
			<input readonly class="txt" type="text" name="txtsque"></div>
		<tr>
			<td>Enter Security Answer :
			<td><input class="txt"  name="txtsans" type="password" onblur="checkans();">
			<input  class="txt"  name="txtsansold" type="hidden">
		<tr>
			<td>Enter Password :
			<td><input disabled class="txt"  type="password" name="txtpword" required>
		<tr>
			<td>Re-enter Password :
			<td><input disabled class="txt" onblur="checkpword();" type="password" name="txtrpword" required>
		<tr>
			<td colspan=2 align=center>
				<input class="button" type="submit" name="txtsubmit" value="Reset Now">
				<input class="button" type="submit" name="txtcancel" value="Cancel">
		
	</table>
</center>
</form>
</div>
<?php
	include('footer.php');
?>
<?php

	if(isset($_REQUEST['txtsubmit']))
	{
	$uname=$_REQUEST['txtuname'];
	$pword=$_REQUEST['txtpword'];
	
	$sql="update usermaster set password='$pword' where username='$uname'";

	//echo $sql;die;
	
	$res=mysql_query($sql,$con);
	
	if($res)
	{
		header('Location: login.php?msg=succfp');
	}
	else
		echo mysql_error();
	}
?>