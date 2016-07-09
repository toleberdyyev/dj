<?php 
include 'connect.php';
if(isset($_POST['city']) and isset($_POST['kg_price']) and !empty($_POST['city']) and !empty($_POST['kg_price'])){
	$new_city=$_POST['city'];
	$price=$_POST['kg_price'];
	$new_city = stripslashes($new_city);
	$price = stripslashes($price);
	$new_city = htmlspecialchars($new_city);
	$price = htmlspecialchars($price);
	$new_city=trim($new_city);
	$price=trim($price);
	$result=mysql_query("SELECT id FROM cities WHERE city='$new_city'",$db);
	$myrow=mysql_fetch_array($result);
	if(empty($myrow['id'])){
		mysql_query("INSERT INTO cities (city,price) VALUES('$new_city','$price')")or die(mysql_error());
		echo "Город '".$new_city."' был успешно добавлен";
	}else{
		echo "Город '".$new_city."' уже есть в этом списке";
	}
}else{echo "вы не полностью заполнили форму";}
 ?>