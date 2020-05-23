


<?php
include "header.php";
include "connect.php";
echo "<link href='css/main.css' rel='stylesheet' type='text/css'>";
?>

<?php 

$id = $_SESSION['id'];

$q = "select * from message where sendid = '$id' and status='Show'";
$rs = mysqli_query($conn,$q);

echo "<center>";
echo "<div class='box'>";
echo "<h1>Sent Messages</h1>";
echo "<table border=1 cellpadding=10>";
echo "<tr  class='l'><th>Receiver Id <th>Subject<th> Date <th>Time </tr>";

while($r=mysqli_fetch_array($rs))
{
	echo "<tr>";
	echo "<td class='ip'>".$r[1];
	echo "<td class='ip'>".$r[3];
	echo "<td class='ip'>".$r[6];
	echo "<td class='ip'>".$r[7];
	echo "<td class='ip'><a class='ex' href='stView.php?mid=$r[0]'>View</a></td>"; 
	echo "<td class='ip'><a class='ex' href='stDelete.php?mid=$r[0]'>Delete</a></td>";  
	echo "</tr>";
}	
echo "</table>";
echo "</center>";

mysqli_close($conn);
?>