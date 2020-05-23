
<?php

include "header.php";
include "connect.php";

$rid =$_GET['sid'];
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
	
	$img = $_FILES['v4']['name'];
    $timg = $_FILES['v4']['tmp_name'];

    move_uploaded_file($timg,"files/".$img);
	
	$q1="insert into message (recid,sendid,subject,msg,mfile,mdate,mtime,status) values('$rid','$sid','$sb','$msg','$img','$dt','$tm','Show')";
	$rs= mysqli_query($conn,$q1);
	
	echo "<script>alert('Message Sent');
	       window.open('sent.php','_self')</script>";
	mysqli_close($conn);
																																																																																																																																																																																																																																																																																																																																																																																																																																					
}
if(isset($_POST['btn2']))
{
	header("location:sent.php");
}
	
?>

<html>
<link href="css/main.css" rel="stylesheet" type="text/css">
<body>
<div class="box">
<center>
<h1>Reply</h1>
<form method="post" action="streply.php"  enctype="multipart/form-data">

<table border="1" cellpadding="10">
  <tr><td class="l">To</td>
       <td><input class="ip1" type="text" name="v1" value="<?php echo $rid; ?>" style="width:500px;" readonly></td>
  </tr>
  
   <tr><td class="l">Subject</td>
       <td><input class="ip1" type="text" name="v2" style="width:500px;" autocomplete="off"></td>
  </tr>
  
   <tr><td class="l">Message Body</td>
       <td><textarea class="ip1" name="v3" style="height:200px; width:500px; resize:none;"></textarea></td>
  </tr>
  <tr><td class="l">Attach File</td>
       <td><input class="ip1" type="file" name="v4" style="width:500px;"></td>
  </tr>
  <tr>
    <td colspan="2" ><input id="b" type="submit" value="Send" name="btn" style="margin-left:160px;">
	<input id="b" type="submit" value="Cancel" name="btn2"  style="margin-left:160px;"></td>
	</tr>
   
</table>
</form>
</center>
</body>

</html>