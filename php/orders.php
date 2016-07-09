<?php 
$name=$_POST['name'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$dostavka= $_POST['dostavka'];
$city= $_POST['city'];
$adrs=$_POST['adrs'];
$ves= floatval($_POST['ves']);
$price= intval($_POST['price']);
$artikul=$_POST['artikul'];
$total = $_POST['total_price'];
$tovar_name = $_POST['tovar_name'];
include 'connect.php';
$result=mysql_query("SELECT * FROM ikeatable WHERE artikul='$artikul'");
$myrow=mysql_fetch_array($result);
$tovar_pr= intval($myrow['price']);
$tovar_vs= $myrow['ves'];
$count=$price/$tovar_pr;
$result01=mysql_query("INSERT INTO orders (name,phone,email,city,adrs,artikul,tovar_name,tovar_pr,tovar_vs,count,ves,dostavka,price,total_price,status) VALUES('$name','$phone','$email','$city','$adrs','$artikul','$tovar_name','$tovar_pr','$tovar_vs','$count','$ves','$dostavka','$price','$total',0)");
if($result01=='TRUE'){
	echo "saved";
}else{
	echo "";
}
?>


 																																																																																									