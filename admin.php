<!DOCTYPE html>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<title>Admin Page</title>
	<meta charset="utf8">
</head>
<body >
<a href="index.php">< Back.</a>
<h2>Настройка доставки в города</h2>
<h3>список городов</h3><hr>
<b id="status"></b><br>
<div id='cities_content'></div>
<button id='add_city_btn'>добавить город</button>
<div id='content' style="display:none;">
<hr>
	<form id='add_city'>
	<label>названи города</label><br>
		<input type="text" name="city" ><br>
	<label>цена за доставки за один кг</label><br>
		<input type="number" name="kg_price"><br>
		<button type="submit">добавить</button>
	</form>
	<hr>
</div>
</body>
<script src='js/admin_set.js'></script>

</script>
</html>