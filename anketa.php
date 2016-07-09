
<table style="text-align:left">
<tr id='fio'>
<td>ФИО</td>
<td><input type="text" name="FIO" required="" id="name"></td>
</tr>	
<tr id="phone">
	<td>контактный телфон</td>
	<td><input type="text" name="PHONE" required="" id="phone"></td>
</tr>
<tr>
	<td>электронная почта</td>
	<td><input type="email" name="ADRES" required="" id='email'></td>
</tr>
<tr id='city'>
	<td>ваш город</td>
	<td>
<select name="sweets" name="city" id='city' required="" >
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
<tr id="add_service"></tr>
</table>    


<button id='kupit' type="submit " >Купить</button>  
  



