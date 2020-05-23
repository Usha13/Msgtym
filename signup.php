<?php

include "connect.php";

if(isset($_POST["btn"]))
{
	
$id = $_POST["id"];
$n = $_POST["name"];
$p = $_POST["psw"];
$img = $_FILES['f']['name'];
$timg = $_FILES['f']['tmp_name'];

move_uploaded_file($timg,"img/".$img);
	
$q="insert into user values('$id','$n','$p','$img')";
$rs=mysqli_query($conn,$q);
if($rs)
{
?>  
<script>
    alert("Sign up Successfully");
    window.open("login.php","_self");
</script>;
<?php
}
mysqli_close($conn);
}
?>

<html>
<head>
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="box">
<center>
<h1>Sign In</h1>
<form method="post" action="signup.php" enctype="multipart/form-data">

<table border="1" cellpadding="10">

    
    <tr><td class="l">Enter Id</td></tr>
   
   <tr><td><input  type="text" class="ip" name="id" autocomplete="off"></td></tr>

   <tr><td class="l">Enter Name</td></tr>
  
   <tr><td><input  type="text" class="ip" name="name" autocomplete="off" ></td></tr>
   
    <tr><td class="l">Enter Password</td></tr>
   
   <tr><td><input  type="password" class="ip" name="psw" autocomplete="off"></td></tr> 
   
   <tr><td class="l">Upload Image</td></tr>
   <tr><td><input class="ip" type="file" name="f"></td></tr> 
   
    
	 <tr><td align="center"><input  type="submit" id="b" value="Sign In" name="btn"></td></tr> 
     <tr><td align="center"><a id="su" href="login.php">Back to LogIn</a></td></tr>	 
	 
</table>
</form>
</center>
</div>
</body>
</html>