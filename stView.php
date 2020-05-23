<?php
include "header.php";
include "connect.php";
echo "<link href='css/main.css' rel='stylesheet' type='text/css'>";

$mid = $_GET['mid'];
$q = "select * from message where mid= '$mid' ";
$rs = mysqli_query($conn,$q);

echo "<div class='box'>";
echo "<center>";
echo "<h1>Message</h1>";
echo "<table border=1 cellpadding=10>";

while($r=mysqli_fetch_array($rs))
{
	echo "<tr><td class='l'>Subject";
	echo "<td colspan=3 class='ip1'>".$r[3]."</tr>";
	echo "<tr><td class='l'>From";
	echo "<td class='ip1' style='width:700px;'>".$r[2]."<td class='ip1' rowspan='2'>$r[6]   $r[7]</tr>";
	echo "<tr><td class='l'>To";
	echo "<td class='ip1' style='width:700px;'>".$r[1];
	echo "<tr><td class='l'>Message";
	echo "<td colspan=3><textarea class='ip1' style='height:200px; width:700px; resize:none;' readonly>$r[4]</textarea>'</tr>";
	
	echo "<tr><td class='l'>File";
	echo "<td class='ip1' colspan=3 ><a href='files/$r[5]' >$r[5]</a></td>";
	echo "</tr>";

echo "</tabel>";
echo "<table>";
echo "<tr align='center'>";
echo "<td style='width:200px;'><a  class='ex' href=streply.php?sid=$r[1]>Reply</a>";
echo "<td style='width:200px;'><a  class='ex' href=stfrwd.php?mid=$r[0]>Forward</a>";
echo "<td style='width:200px;'><a  class='ex' href=sent.php >Back</a>";
echo "</tr>";
echo "</table>";
}
echo "</center>";
mysqli_close($conn);
?>