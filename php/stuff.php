<?php 
include 'connect.php';
header('Content-Type: text/html; charset=utf8');
$artikul=$_POST['articul'];$count=$_POST['count'];
$result=mysql_query("SELECT * FROM ikeatable WHERE artikul='$artikul'")or die(mysql_error());
$myrow=mysql_fetch_array($result);
if ($artikul=$myrow['artikul']){
	include 'row.php';
}else{
	echo "error_articul";
}
?>
