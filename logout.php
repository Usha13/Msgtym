<?php 
session_start();
session_destroy();
?>

<script>
 alert("Logout Successfully");
 window.open("login.php","_self");
 </script>