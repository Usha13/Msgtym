
<?php

include "header.php";
include "connect.php";
$mid =$_SESSION['mid'];
$m="";
$q = "select * from message where mid = $mid";
$rs = mysqli_query($conn,$q);
while($r=mysqli_fetch_array($rs))
{
	$m = $r[4];
}	
?>
<?php 
if(isset($_POST["btn"]))
{
	$sid=$_SESSION['id'];
	$rid=$_POST['v1'];
	$sb=$_POST['v2'];
	$msg=$_POST['v3'];
	$dt=date("d/m/y");
	$tm=date("h:m:s");
	
	$q="select * from user where uid = '$rid'";
	$rs=mysqli_query($conn,$q);
	$f=0;
	while($r= mysqli_fetch_array($rs))
	{
		$f=1;
	}
	if($f==0)
	{
	echo "<script>alert('Invalid ID');
	           window.open('frwd.php','_self')</script>";	
	}
	else
	{
	$q1="insert into message (recid,sendid,subject,msg,mdate,mtime,status) values('$rid','$sid','$sb','$msg','$dt','$tm','Show')";
	$rs1= mysqli_query($conn,$q1);
	
	echo "<script>alert('Message Sent');
	       window.open('index.php','_self')</script>";
	}	   
	mysqli_close($conn);
	
}
if(isset($_POST['btn2']))
{
	header("location:index.php");
}
	
?>

<html>
<link href="css/main.css" rel="stylesheet" type="text/css">
<body>
<div class="box">
<center>
<h1>Forward Message</h1>
<form method="post" action="frwd.php">

<table border="1" cellpadding="10">
  <tr><td class="l">To</td>
       <td><input class="ip1" type="text" name="v1" style="width:500px;"></td>
  </tr>
  
   <tr><td class="l">Subject</td>
       <td><input class="ip1" type="text" name="v2" style="width:500px;" autocomplete="off"></td>
  </tr>
  
   <tr><td class="l">Message Body</td>
       <td><textarea class="ip1" name="v3"  style="height:200px; width:500px; resize:none;" readonly><?php echo $m; ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" ><input id="b" type="submit" value="Send" name="btn" style="margin-left:180px;">
	<input id="b" type="submit" value="Cancel" name="btn2"  style="margin-left:180px;"></td>
	</tr>
   
</table>
</form>
</center>
</div>
</body>

</html>