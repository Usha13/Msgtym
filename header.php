<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/header.css" rel="stylesheet" type="text/css">

<?php
   session_start();
   
if(!isset($_SESSION['id']))
{
	header("location:login.php");
}

   
   
  $id = $_SESSION['id'];
  $pic = $_SESSION['p'];
  
 echo "<table cellpadding='10' width='70%' >";
 echo "<tr>";
  echo "<td align='center'><img src='img/$pic' height='100px' width='100px' style='border-radius:50px;'></td>";
  echo "<td id='cl' rowspan='2' align='right'  ><img src='bg/logo2.jpg' height='100px' width='100px' style='border-radius:50px;'>
         <td align='left'><h1 id='lg'>essage World</h1></td>";

  echo "<tr><td align='center'>";  
  echo "<p style='font-size:25px;'> $id</p></td>";
  echo "</table>";
 
   
?>
   
</head>
<body>
<div class="menu">
<hr>
      <table cellpadding="10" width="100%">
    <tr>
     <td><a href="phome.php">Home</a></td> 
     <td><a href="index.php">Inbox</a></td> 
     <td><a href="compose.php">Compose</a></td> 
     <td><a href="sent.php">Sent</a></td> 
   
     <td><a href="logout.php">Log Out</a></td>
</tr>	
	</table>

<hr>
</div>
</body>

</html>