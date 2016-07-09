<?php 
include 'connect.php';
if(isset($_POST['delete']) and !empty($_POST['delete'])){
	$id=$_POST['delete'];
	$result=mysql_query("DELETE FROM cities WHERE id='$id'",$db);
	if($result=='TRUE'){
		echo " - этот город был удален";
	}else{
		echo " - этот город не удалось удалить";
	}
}
if(isset($_POST['edit']) and !empty($_POST['edit']) && isset($_POST['price']) and !empty($_POST['price'])){
	$id=$_POST['edit'];
	$price=$_POST['price'];
	$result=mysql_query("UPDATE cities SET price='$price' WHERE id='$id'",$db);
	if($result=='TRUE'){
		echo "цена этого города была изменина";
	}else{
		echo "Извините возникла ошибка :(";
	}

}

?>
