<?php
	include('header.php'); 
	if(!isset($_SESSION['mname']))
	{
		header('Location: login.php?msg=lf');
	}
?>
<h1>Write Complain Reply Here...</h1>
<div style="background-color:silver;width:980px;align:center;border-radius:10px;border:2px solid black">
	<form method="post"><center>
		<table border="0" align=center>
			<tr>
				<td>Complain Detail
				<td>
					<input type="hidden" name="txtid" value="<?php echo $_REQUEST['id']; ?>">
					<textarea readonly class=txt name="txtdetail" rows=5><?php echo $_REQUEST['detail']; ?></textarea>
			<tr>
				<td>Reply
				<td><textarea class=txt name="txtreply" rows=5></textarea>
			<tr>
			<td colspan=2>
			<input type="submit"  class=button value="Update Reply" name="submit">
			<input type="submit" formnovalidate name="submit" value="Cancel" class="button">			
		</table>
		</form>	
	</div>	
<?php
	 $op=$_REQUEST['submit'];
	 if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Update Reply")
	 {
		$id=$_REQUEST['txtid'];
		$reply=$_REQUEST['txtreply'];
		$detail=$_REQUEST['txtdetail'];
		
		$sql="update inquirydetail set reply='$reply',dateofreply=NOW() where inquiryid=$id";
		//echo $sql;die;
		$res=mysql_query($sql);
		
		if($res)
		{	
			echo "<script>alert('Reply Updated.');</script>";
			header('Location: index.php?msg=succru');
		}
		else
			echo mysql_error();
		}
?>
</div>	</div>
<?php
include('footer.php');
?>