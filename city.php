<?php
include 'php/connect.php';
$conn = new mysqli('localhost', 'root', '123', 'ikea_test');
mysqli_set_charset($conn,'utf8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM cities";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   	echo "<table border='1'>
   		<tr>
   			<td>id</td>
   			<td>city</td>
   			<td>price/kg</td>
   			<td>to do:</td>
   		</tr>";
    while($row = $result->fetch_assoc()) {
    	echo "
    	<tr>
    		<td id='id_".$row['id']."'>".$row['id']."</td>
    		<td id='city_".$row['id']."'>".$row['city']."</td>
    		<td><input type='text' id='price_".$row['id']."' value='".$row['price']."' readonly ></td>
    		<td>
    			<button id='edit_".$row['id']."' onclick='edit(this)'>Edit</button>
    			<button id='delt_".$row['id']."' onclick='del(this)'>Delete</button>
    		</td>
    	</tr>
    	";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>