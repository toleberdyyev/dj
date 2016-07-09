<?php 
include'connect.php';
$city = $_POST['city'];
$result=mysql_query('SELECT * FROM cities WHERE city="$city"');
$myrow=mysql_query($result);
if (empty($myrow['id'])){
	echo "	этот город не найден :(<br>
	чтобы его добавить в список нужно задать цену доставки - сумма за один кг<br>
	<form id='newcity_send'>
		<input type='text' name='new_city' value='".$city."' readonly><br>
		<input type='number' min='1' name='kg_price' required><br>
		<button type='submit'>save</button>
	</form><hr>
	для отказа нажать <button id='clear' onclick='clear()'>cancel</button>
";

 }else{
 	echo "<table>
 	<tr>
 		<td>id</td>
 		<td>city</td>
 		<td>price/kg</td>
 	</tr>
 	<tr>
 		<td>".$myrow['id']."</td>
 		<td>".$myrow['city']."</td>
 		<td>".$myrow['price']."</td>
 	</tr>
 </table>";
 }
 ?>
