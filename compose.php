
<?php

include "header.php";
include "connect.php";


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
	
	
	$q="select * from user where uid = '$rid'";
	$rs=mysqli_query($conn,$q);
	$f=0;
	while($r= mysqli_fetch_array($rs))
	{
		$f=1;
	}
	if($f==0)
	{
	echo "<script>alert('Invalid ID');</script>";	
	}
	else
	{
	$q1="insert into message (recid,sendid,subject,msg,mfile,mdate,mtime,status) values('$rid','$sid','$sb','$msg','$img','$dt','$tm','Show')";
	$rs1= mysqli_query($conn,$q1);
	
	echo "<script>alert('Message Sent');</script>";
	}
	mysqli_close($conn);
}


if(isset($_POST["btn1"]))
{
	$sid=$_SESSION['id'];
	$sb=$_POST['v2'];
	$msg=$_POST['v3'];
	
	$dt=date("d/m/y");
	$tm=date("h:m:s");
	
	$img = $_FILES['v4']['name'];
    $timg = $_FILES['v4']['tmp_name'];

    move_uploaded_file($timg,"files/".$img);
		
	$q2= "select uid from user where uid not in('$sid')";
	$rs2= mysqli_query($conn,$q2);
	
	while($r2= mysqli_fetch_array($rs2))
	{
		$rid=$r2[0];
	  $q3="insert into message (recid,sendid,subject,msg,mfile,mdate,mtime,status) values('$rid','$sid','$sb','$msg','$img','$dt','$tm','Show')";
	$rs3= mysqli_query($conn,$q3);
	
	
	}
	echo "<script>alert('Message Sent');</script>";	
}
?>

<html>
<link href="css/main.css" rel="stylesheet" type="text/css">;
<body>
<div class="box">
<center>
<h1>Compose Message</h1>
<form method="post" action="compose.php" enctype="multipart/form-data">

<table border="1" cellpadding="10">
  <tr><td class="l">To</td>
       <td><input class="ip1" type="text" name="v1" style="width:500px;"></td>
  </tr>
  
   <tr><td class="l">Subject</td>
       <td><input class="ip1" type="text" name="v2" style="width:500px;"></td>
  </tr>
  
   <tr><td class="l">Message Body</td>
       <td><textarea  class="ip1" name="v3" style="height:200px; width:500px; resize:none;"></textarea></td>
  </tr>
  
   <tr><td class="l">Attach File</td>
       <td><input class="ip1" type="file" name="v4" style="width:500px;"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input id="b" type="submit" value="Send" name="btn">
   <input id="b" type="submit" value="Send To All" name="btn1"></td>
   </tr>
   
</table>
</form>
</center>
</div>
</body>

</html>