<?php
include "connect.php"; 
$mid = $_GET['mid'];

$q = "update message set status='Hide' where mid = $mid";
$rs = mysqli_query($conn,$q);

header("location:sent.php");
mysqli_close($conn);


?>