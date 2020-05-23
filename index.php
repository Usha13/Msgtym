<?php
include "header.php";
include "connect.php";

echo "<link href='css/main.css' rel='stylesheet' type='text/css'>";
?>

<?php 
$id = $_SESSION['id'];

$q = "select * from message where recid = '$id' and status='Show' or recid='All' ";
$rs = mysqli_query($conn,$q);

echo "<center>";
echo "<div class='box'>";
echo "<h1>Inbox</h1>";
echo "<table border=1 cellpadding=10>";
echo "<tr class='l'><th >Sender Id</th> <th>Subject</th> <th> Date</th> <th>Time</th> </tr>";

while($r=mysqli_fetch_array($rs))
{
	echo "<tr>";
	echo "<td class='ip'>".$r[2];
	echo "<td class='ip'>".$r[3];
	echo "<td class='ip'>".$r[6];
	echo "<td class='ip'>".$r[7];
	echo "<td class='ip'><a class='ex' href='View.php?mid=$r[0]'>View</a></td>"; 
	echo "<td class='ip'><a class='ex' href='Delete.php?mid=$r[0]'>Delete</a></td>";  
	echo "</tr>";
}	
echo "</table>";
echo "</div>";

echo "</center>";

mysqli_close($conn);
?>