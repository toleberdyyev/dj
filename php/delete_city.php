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

?>