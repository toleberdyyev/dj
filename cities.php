<form>
 <label>Your city</label>
<select name="sweets" onchange="selected()" name="city" id='city_select'>
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
<option id='city_".$row['id']."'  value='".$row['price']."'>
".$row['city']."
</option>




    	";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</select><br>
<?php 
include 'php/connect.php';
$result=mysql_query('SELECT * FROM services');
$myrow=mysql_fetch_array($result);

 ?>
 <label><b>Сервис: </b>учитывать доставку до двери ?</label> 
<input type="checkbox" name="service" value="25" id='service' onchange="clicked()">
        
</form>


