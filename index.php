<!DOCTYPE html>
<html lang="ru">
<head >
	<meta charset="utf8".>
	<title>Test Ikea</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>
<body>
<?php 
include 'php/connect.php';
$result=mysql_query('SELECT * from rules');
$myrow=mysql_fetch_array($result);
echo "<p style='display:none' id='fixed_prc'>".$myrow['fixed']."</p>";
echo "<p style='display:none' id='fixed_ves'>".$myrow['ves']."</p>";


 ?>
<div id="wall">
<div class="div_form">
	<a href="admin.php">Настройки админа ></a><br><br>
	<form id='articul_send'>
	<label>Write a Artikul  </label>
		<input type="text" name="articul" id="articul" required="">	
		<input type="number" name="count" value='1' min='1' max='99'>
		<button type="submit" id='zakaz_btn'>заказать</button>
	</form><br>
</div>
<h3 id="errors"></h3>

<table id="content" border="1"></table><hr>
<table>
	<tr>
		<td id='total_price' style=""></td>
		<td id="sum" style="font-weight:600;color:green;font-size:20px;"></td>
	</tr>
	<tr>
		<td id='total_ves'></td>
		<td id="ves"></td>
	</tr>
	<tr>
		<td id='total_dostavka'></td>
		<td id="dostavka" style="font-weight:600;"></td>
	</tr>
	<tr style="">
		<td id='total_add'></td>
		<td id="add"></td>
	</tr>
</table>
<hr>
<div id="btn01"></div>
<div id="order" style="display:none">
		<table style="text-align:left">
		<tr >
		<td>ФИО</td>
		<td><input type="text" name="FIO" required="" id="name"></td>
		</tr>	
		<tr>
		<td>контактный телфон</td>
		<td><input type="text" name="PHONE" required="" id="phone"></td>
		</tr>
		<tr>
		<td>электронная почта</td>
		<td><input type="email" name="ADRES" required="" id='email'></td>
		</tr>
		<tr>
		<td>ваш город</td>
		<td>
		<select name="sweets" name="city" id='city' required="" onchange="select(this)">
		<option value="0">select your city</option>
		<?php

		$conn = new mysqli('localhost', 'root', '123', 'ikea_test');
		mysqli_set_charset($conn,'utf8');
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM cities";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		echo "

		<option id='city_".$row['id']."'  value='".$row['price']."'>".$row['city']."</option>";}} else {
		echo "0 results";}
		$conn->close();?>
		</select><br>
		<?php 
		include 'php/connect.php';
		$result=mysql_query('SELECT * FROM services');
		$myrow=mysql_fetch_array($result);?>
		</td>
		</tr>
		<tr>
		<td>точный адрес</td>
		<td><input type="text" name="ADRES" required="" id="adrs"></td>
		</tr>
		<tr></tr>
		</table>    


		<button id='kupit' type="submit " >Купить</button>  
  




</div>
<div id="total" style="display:none;">as</div><hr>
<div id="status"></div>
</div>
<script src='js/ajax_and_functions.js'></script>
</body>
</html>