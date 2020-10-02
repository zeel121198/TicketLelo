<?php
	include('connect.php');
	include('header.php');
	if(!isset($_SESSION['aname']))
	{
		header('Location: login.php?msg=lf');
	}
?>

<?php 
	require_once('calendar/classes/tc_calendar.php');
?>

<script language="javascript" src="calendar/calendar.js"></script>

<script language="javascript">
function delete1() {
   var answer = confirm("Do you want to delete this record?");
   return answer;
}


function validatedate()
{
	var str=document.orderfrm.txtuser_birthdate.value;
	mydate=new Date();
	givendate=new Date();
	givendate=str;
	if(mydate<givendate)
	{
		alert("You have entered invalid Birth Date. Birth Date must be less than today.");
		return false;
	}
}
function checkname(a)
	{
		var name=a;
		if(name=="")
		{
			alert("Please enter data.");
			return false;
		}
		else
		{
			x=/^[A-Z ]+$/;
			if(name.match(x))
			{}
			else
			{
				alert("Only uppercase are allowed...");
				return false;
			}
		}
	}	
	
	function checkadd(a)
	{
		var name=a;
		if(name=="")
		{
			alert("Please enter data.");
			return false;
		}
		else
		{
			x=/^[A-Za-z0-9.-/ ]+$/;
			if(name.match(x))
			{}
			else
			{
				alert("Only Alphabets, Digits, ., -, / are allowed...");
				return false;
			}
		}
	}
	
	function checknum(a)
	{
		var name=a;
		if(name=="")
		{
			alert("Please enter data.");
			return false;
		}
		else
		{
			x=/^[0-9-() ]+$/;
			if(name.match(x))
			{}
			else
			{
				alert("Only Digits, -, () are allowed...");
				return false;
			}
		}
	}
	
	function checklogin(a)
	{
		var name=a;
		if(name=="")
		{
			alert("Please enter data.");
			return false;
		}
		else if(name.length()<6)
			alert("Loginname and Password must of atleast 6 characters.");
		else
		{
			x=/^[A-Za-z0-9_-. ]+$/;
			if(name.match(x))
			{}
			else
			{
				alert("Only Alphabets, Digits, -, _, . are allowed...");
				return false;
			}
		}
	}
	
	function checkmail()
	{
		var x=document.forms["teacher"]["email"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Not a valid e-mail address");
			document.getElementById('email').focus();
			return false;
		}
	}
</script>

<h1>Manage Manager</h1>
<form name="frm" method="get">
<div style="background-color:silver;width:800px;border-radius:10px;border:3px solid black;">
			<table  border="2" bordercolor="yellow" height="700" width="550">
				<tr >
					<td>
						Enter FirstName :
					</td>
					
					<td >
						<input required class=txt type="text" name="fname" id="fname" onblur="return checkname(this);" /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter MiddleName :
					</td>
					
					<td >
						<input required class=txt  type="text" name="mname" id="mname" onblur="return checkname(this);"/><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter LastName :
					</td>
					
					<td >
						<input required class=txt  type="text" name="lname" id="lname" onblur="return checkname(this);"/><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter Address Line1 :
					</td>
					
					<td >
						<textarea required class=txt  type="text" name="ad1" id="ad1" onblur="return checkadd(this);">
						</textarea><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter Address Line 2 :
					</td>
					
					<td >
						<textarea required type="text"  class=txt name="ad2" id="ad2">
						</textarea>
					</td>
				</tr>
				<tr >
					<td >
						Select City :
					</td>
					
					<td >
						<select name="cityid" id="cityid" class=txt onblur="if(this.value=='Select City')
							alert('Please Select City');" >
						<option value="Select City">Select City</option>
							<?php
								$sql="select *from citymaster";
								$res=mysql_query($sql);
								while($row=mysql_fetch_array($res))
								{
							?>
								<option value="<?php echo $row['cityid']; ?>">
									<?php echo $row['cityname']; ?>
								</option>
							<?php
								}
							?>
						</select><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter Pincode :
					</td>
					
					<td >
						<input type="text" name="pincode" id="pincode" class=txt onblur="checknum(this);"  maxlength="6" /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter Phone Number :
					</td>
					
					<td >
						<input type="text" name="phonenumber" id="phonenumber" class=txt  onblur="checknum(this);" maxlength="12" />
					</td> 
				</tr>
				<tr >
					<td >
						Enter Mobile Number :
					</td>
					
					<td >
						<input class=txt required type="text" name="mobilenumber" id="mobilenumber"  onblur="checknum(this);" maxlength="12" /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >	
					<td >
						Select Gender :
					</td>
					
					<td >
						<input type="radio" value="Male" name="gender" id="gender" checked />Male
						<input type="radio" value="Female" name="gender" id="gender">Female
					</td>
				</tr>
				<tr >
					<td >
						Enter DateOfBirth :
					</td>
					
					<td  class=txt>
						<?php
							$myCalendar = new tc_calendar("dob", true);
							$myCalendar->setIcon("calendar/images/iconCalendar.gif");
							$myCalendar->setDate(01, 03, 1960);
							$myCalendar->setPath("calendar/");
							$myCalendar->setYearInterval(1960, 2016);
							$myCalendar->dateAllow('1960-01-01', '2016-01-01');
							//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
							$myCalendar->setOnChange("myChanged('test')");
							$myCalendar->writeScript();
						?>
						<font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter EmailId :
					</td>
					
					<td >
						<input required type="text" class=txt  onblur="checkmail(this);" name="email" id="email" /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter Login Name :
					</td>
					
					<td >
						<input required type="text" onblur="checklogin(this);"  class=txt name="login" id="login" /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Enter PassWord :
					</td>
					
					<td >
						<input required type="password" onblur="checklogin(this);" name="password" id="password" class=txt  /><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Select Security Questaion :
					</td>
					
					<td >
						<select name="sque" id="sque"  class=txt >
							<option value="what is your petname" /> what is your petname
							<option value="what is your favourite color"/> what is your favourite color
							<option value="what is your spouse name"/> what is your spouse name
							<option value="what is your phone no?"/> what is your phone no?
							<option value="what is your mobile no?"/> what is your mobile no?
						</select><font color="red" size="5">*</font>
					</td>
				</tr>
				<tr >
					<td >
						Security Answer : 
					</td>
					
					<td >
						<input type="text" name="sans" id="sans" required class=txt /><font color="red" size="5">*</font>
					</td>
				</tr>
						<tr>
			<td>Select Theatre : 
			<td><select name="txttheatreid" id="txttheatreid" class=txt onblur="if(this.value=='Select theatre')
							alert('Please Select theatre');" >
							<?php
					//$sql="select *from theatremaster where theatreid not in (select theatreid from managermaster)";
					$sql="select *from theatremaster";
					$res=mysql_query($sql);
					
					while($row=mysql_fetch_array($res))
					{
				?>
					<option value="<?php echo $row['theatreid']; ?>"><?php echo $row['theatrename']; ?>
				<?php
					}
				?>
				</select><font color="red" size="5">*</font>
				<tr >
						<td colspan=2 align=center>
			<?php
				if($_REQUEST['mode']=="Update")
				{
			?>
				<input class="button" type="submit" name="submit" id="submit" value="Update">
			<?php
				}
				else
				{
			?>
				<input class="button" type="submit" name="submit" id="submit" value="Save">
			<?php
				}
			?>
			<input class="button" type="reset" name="reset" id="reset" value="Reset">
		</tr>
		</table>
		</form>
<?php
	$op=$_REQUEST['submit'];
	if($op=="Save")
	{
		$fname=$_REQUEST['fname'];
		$mname=$_REQUEST['mname'];
		$lname=$_REQUEST['lname'];
		$ad1=$_REQUEST['ad1'];
		$ad2=$_REQUEST['ad2'];
		$cityid=$_REQUEST['cityid'];
		$pincode=$_REQUEST['pincode'];
		$phonenumber=$_REQUEST['phonenumber'];
		$mobilenumber=$_REQUEST['mobilenumber'];
		$gender=$_REQUEST['gender'];
		$dob=$_REQUEST['dob'];
		$theatreid=$_REQUEST['txttheatreid'];
		
		$email=$_REQUEST['email'];
		$login=$_REQUEST['login'];
		$password=$_REQUEST['password'];
		$sque=$_REQUEST['sque'];
		$sans=$_REQUEST['sans'];
		
		$sql="Insert into managermaster (firstname,middlename,lastname,address1,address2,cityid,pincode,phonenumber,mobilenumber,gender,
			dateofbirthday,dateofjoin,emailid,loginname,password,sque,sans,theatreid) values('$fname','$mname','$lname','$ad1','$ad2','$cityid',
			'$pincode','$phonenumber','$mobilenumber','$gender','$dob',NOW(),'$email','$login','$password','$sque','$sans','$theatreid')";
		$res=mysql_query($sql);
		if($res)
		{
			header('Location: index.php?msg=suc');
		}
		else
		{
			echo mysql_error();
		}
	}
?>
</div>
<br><br>	<br><br>
	<br><br>
