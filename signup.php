<?php include('header.php'); 
	require_once('calendar/classes/tc_calendar.php');
?>
<script language="javascript" src="calendar/calendar.js"></script>

<script language="javascript">
function checkusername()
{
	var uname=document.frmsignup.txtuname.value;
	if(uname=="")
	{
		alert("Username cannot be empty...");
		document.frmsignup.txtuname.value="";
		document.frmsignup.txtuname.focus();
		return false;
	}
	else
	{
		if(uname.length<4 || uname.length>15)
		{
			alert("length of username must be between 4 and 12");
			document.frmsignup.txtuname.value=""
			document.frmsignup.txtuname.focus();
			return false;
		}
	}
}

function checkpassword()
{
	var password=document.frmsignup.txtpword.value;
	if(password=="")
	{
		alert("password cannot be empty...");
		document.frmsignup.txtpword.value="";
		document.frmsignup.txtpword.focus();
		
		
		return false;
	}
	else
	{
		if(password.length<5 || password.length>20)
		{
			alert("length of password must be between 5 and 20");
			//document.frmsignup.txtpwd.value="";
			document.frmsignup.txtpword.focus();
			
			return false;
		}
	}
}

function checksque()
{
	var csque=document.frmsignup.txtsque.value;
	if(csque=="")
	{
		alert("Select security question...");
	}
	else
	{
		//alert("Selected Value is:"+csque);
	}
	
	//if(document.frmsignup.txtsque.selectedIndex==0)
	//{
	//	alert("plz select sq...");
		//		document.frmsignup.txtsque.value.focus();return false;
	//}
}
function checksans()
{
	if(document.frmsignup.txtsans.value=="")
	{
		alert("Security Answer cannot be left empty...");
		document.frmsignup.txtsans.value.focus();return false;
	}
}
function checkcity()
{	
	if(document.frmsignup.txtcity.value=="")
	{
		alert("City can not be left empty...");
		document.frmsignup.txtcity.value.focus();return false;
	}
}
function checkdob()
{	
	if(document.frmsignup.txtdob.value=="")
	{
		alert("Date of birth can not be left empty...");
		document.frmsignup.txtdob.value.focus();return false;
	}
}

function checkemail()
{

/*
	a
	abc.com
	abc@gmail
	abc@gmail.
*/
//abc@gmail.com
//length : 13
	var email=document.frmsignup.txtemail.value;
	var a=email.length;	//@
	var dot=email.length;	//.
	if(email=="")
	{
		alert("Email cannot be left empty...");
		document.frmsignup.txtemail.focus();return false;
	}
	else
	{
	//@	4
	//.	9
	//length 13
	//4<9 && 9<13
		for(i=0;i<email.length;i++)
		{
			if(email.charAt(i)=="@")
				a=i;
			if(email.charAt(i)==".")
				dot=i;
		}
		if(!(a<dot && dot<email.length-1))
		{
			alert("Invalid email Id");
			document.frmsignup.txtemail.value="";
			document.frmsignup.txtemail.focus();
			return false;
		}
	}
	}
	function checkphno(a)
	{
	//10 digits only
	  var phoneno = /^\d{10}$/;
	  if(a.value.match(phoneno))
			{
		  return true;
			}
		  else
			{
			alert("Not a valid Phone Number");
			return false;
			}
	}
	function checkmno(a)
	{
	//10 digits only
	  var phoneno = /^\d{10}$/;
	  if(a.value.match(phoneno))
			{
				return true;
			}
		  else
			{
			alert("Not a valid Mobile Number");
			return false;
			}
	}
	function checkadd1()
	{
		var address=document.frmsignup.txtadd1.value;
		if(address=="")
		{
			alert("Address cannot be left blank...");
			document.validationform.txtadd1.focus();return false;
		}
		/*else
		{
			x=/^[A-Za-z0-9 ]+$/;
			if(address.match(x))
			{}
			else
			{
				alert("Only alphabets, digits , / . are allowed...");
				document.validationform.address.value="";
				document.validationform.address.focus();
			}
		}*/
	}

function checkadd2()
	{
		var address=document.frmsignup.txtadd2.value;
		if(address=="")
		{
			alert("Address cannot be left blank...");
			document.validationform.txtadd2.focus();return false;
		}
		/*else
		{
			x=/^[A-Za-z0-9 ]+$/;
			if(address.match(x))
			{}
			else
			{
				alert("Only alphabets, digits , / . are allowed...");
				document.validationform.address.value="";
				document.validationform.address.focus();
			}
		}*/
	}

function processform()
{
	if(!checkusername(document.frmsignup.txtusername.value))
	{
		document.frmsignup.txtusername.focus();
		return false;
	}
	if(!checkpassword(document.frmsignup.txtpword.value))
	{
		document.frmsignup.txtpwordd.focus();
		return false;
	}
	if(!checkadd1(document.frmsignup.txtadd1.value))
		{
			document.frmsignup.txtadd1.focus();
			return false;
		}
	
	if(!checkadd2(document.frmsignup.txtadd1.value))
		{
			document.frmsignup.txtadd1.focus();
			return false;
		}
	if(!checksque(document.frmsignup.txtsque.value))
	{
		document.frmsignup.txtsque.focus();
		return false;
	}
	if(!checksans(document.frmsignup.txtsans.value))
	{
		document.frmsignup.txtsans.focus();
		return false;
	}
	if(!checkphno(document.frmsignup.txtphno.value))
		{
			document.frmsignup.txtphno.focus();
			return false;
		}
		if(!checkmno(document.frmsignup.txtmno.value))
		{
			document.frmsignup.txtmno.focus();
			return false;
		}
	
	if(!checkemail(document.frmsignup.txtemail.value))
	{
		document.frmsignup.txtemail.focus();
		return false;
	}
}
	

</script>
<center>
<h1>Customer Registration</h1>
<form name="frmsignup" method="post">
<div style="background-color:silver;width:980px;border-radius:10px;">
<center>
	<table align=center>		
	<tr><td>&nbsp;</tr>
		<tr>
			<td>Enter User Name :
		<td><input required type="text" name="txtuname" class="txt"><span class="err">*</span></td>
		<tr>
			<td>Enter Password :
	        <td><input required type="password" name="txtpword" class="txt"><span class="err">*</span></td>
		<tr>
			<td>Select Security Question :
			<td><select name="txtsque" class="txt"><span class="err">*</span>
					<option value="0">select Security Question</option>
					<option value="What is your pet name">What is your pet name</option>
					<option value="What is your pet''s name">What is your pet's name</option>
					<option value="What is your first phone no?">What is your first phone no?</option>
					<option value="What is your spouse name">What is your spouse name</option>														
				</select>
				<span class="err">*</span></td>
		<tr>
			<td>Enter Security Answer :
			<td><input required type="text" name="txtsans" class="txt"><span class="err">*</span></td>
		<tr>
			<td>DateOfBirth :
			<td>
						<?php
							$myCalendar = new tc_calendar("txtdob", true);
							$myCalendar->setIcon("calendar/images/iconCalendar.gif");
							$myCalendar->setDate(01, 03, 1960);
							$myCalendar->setPath("calendar/");
							$myCalendar->setYearInterval(1960, 2016);
							$myCalendar->dateAllow('1960-01-01', '2016-01-01');
							//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
							$myCalendar->setOnChange("myChanged('test')");
							$myCalendar->writeScript();
						?><br><br>
					</td>
				</tr>
			<tr>
			<td>Enter Name :
		<td><input required type="text" name="txtname" class="txt"><span class="err">*</span></td>
		<tr>
			<td>Enter address1 :
			<td><input required type="text" name="txtadd1" class="txt"><span class="err">*</span></td>
			<tr>
			<td>Enter address2 :
			<td><input type="text" name="txtadd2" class="txt"></td>
		<tr>
		<td>Select City :
		<td>
			<select name="txtcityid" class="txt" value="<?php echo $_REQUEST['cityid']; ?>">
			<?php
				$sql="select *from citymaster";
				$res=mysql_query($sql);
				while($row=mysql_fetch_array($res))
				{	?>
				<option value="<?php echo $row['cityid']; ?>"><?php echo $row['cityname']; ?></option>
			<?php
				}
			?>
			<tr>
			<td>Enter Pincode :
			<td><input type="text" name="txtpincode" class="txt"></td>
			<tr>
			<td>Enter phoneno :
			<td><input  type="number" name="txtphno"  class="txt"></td>
			<tr>
			<td>Enter mobileno :
			<td><input required type="number" name="txtmno" class="txt"><span class="err">*</span></td>
			<tr>
			<td>Enter email :
			<td><input required type="email" name="txtemail" class="txt"><span class="err">*</span></td>
			<tr>
			<td>Gender :
			<td><input type="radio" value="Male" name="txtgender" checked >Male
				<input type="radio" value="Female" name="txtgender">Female<br><br>
		<tr><td>&nbsp;</tr>
			
		<tr>
			<td colspan=2 align=center><input type="submit" name="submit" value="Register Now" class="button">
			<input type="reset" name="reset" value="Clear"  class="button">
		<tr><td>&nbsp;</tr>
		</table>
	</div>
</form>

<?php
	if(isset($_REQUEST['submit']))
	{
		$username=$_REQUEST['txtuname'];
		$password=$_REQUEST['txtpword'];
		$email=$_REQUEST['txtemail'];
		$sque=$_REQUEST['txtsque'];
		$sque=str_replace("'","''",$sque);
		$sans=$_REQUEST['txtsans'];
		$address1=$_REQUEST['txtadd1'];
		$address2=$_REQUEST['txtadd2'];
		$cityid=$_REQUEST['txtcityid'];
		$phoneno=$_REQUEST['txtphno'];
		$mobileno=$_REQUEST['txtmno'];
		$email=$_REQUEST['txtemail'];
		$gender=$_REQUEST['txtgender'];
		$dateofbirth=$_REQUEST['txtdob'];
		$name=$_REQUEST['txtname'];
		$pincode=$_REQUEST['txtpincode'];
		
		$sql="insert into usermaster (name,pincode,username,password,sque,sans,address1,address2,cityid,phoneno,mobileno,email,gender,dateofbirth,dateofjoin) values('$name','$pincode','$username','$password','$sque','$sans','$address1','$address2','$cityid','$phoneno','$mobileno','$email','$gender','$dateofbirth',NOW())";
		$res=mysql_query($sql);
		
		if($res)
		{
			echo "Registration Successful<br>";
			header('Location: Login.php?msg=succr');
		}
		else
			echo mysql_error(),"<br>";
		//		echo $sque;
	}
?>
<?php
	include('footer.php');
?>
