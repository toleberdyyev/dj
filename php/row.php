<tr id="<?php echo 'row_'.$myrow['artikul']; ?>">
	<td>
	<img src="<?php echo $myrow['image']; ?>" class='stuff_img'>
	<div class="opisaniye">
		<h3 id='<?php echo "name_".$myrow['artikul']; ?>'><?php echo $myrow['name']; ?></h3>
		<table>
	
		<tr>
			<td><b>Артикль</b></td>
			<td><?php echo $myrow['artikul']; ?></td>
		</tr>
		<tr>
			<td><b>Размеры</b></td>
			<td><?php echo $myrow['razmer']; ?></td>
		</tr>
		<tr>
			<td><b>Вес</b></td>
			<td id='<?php echo "ves_".$myrow["artikul"]; ?>'><?php echo $myrow['ves']; ?></td>
			<td id='<?php echo "ves_h_".$myrow["artikul"]; ?>' style='display: none'><?php echo $myrow['ves']; ?></td>
		</tr>
		<tr>
			
			<td id='<?php echo "del_btn_".$myrow["artikul"]; ?>'><button id='<?php echo "del_".$myrow["artikul"]; ?>'onclick="delete_obj(this)">Delete</button></td>
		</tr>
		</table>
	</div>
		

	</td>
	<td style="padding:20px;">
	<table>
		<tr><b>Цена(руб.):</b></tr>
		<tr><br><input type="text" value="<?php echo $myrow['price'];?>" readonly style='border:hidden;font-size: 20px;text-align: center;' id="<?php echo 'price_'.$myrow['artikul']; ?>"></tr>
	</table></td>
	<td style="padding:20px;">
	<table>
		<tr><b>Кол-во:</b><br></tr><br>
		<tr>
			<input type="number" name="<?php echo 'num_'.$myrow['artikul']; ?>" value='<?php echo $_POST['count']; ?>' min='1' max='99' id="<?php echo 'ctn_'.$myrow['artikul']; ?>">
			<button type="submit" id="<?php echo 'btn_'.$myrow['artikul']; ?>" onclick="count(this)">ok</button>
		</tr>
	</table></td>
	<td style="padding:20px;">
	<table>
		<tr><b>Суммаб(руб.):<br></b></tr>
		<tr><input type="text" value="<?php echo $myrow['price']*$_POST['count'];?>" readonly style='border:hidden;font-size: 20px;text-align: center;' id="<?php echo 'total_'.$myrow['artikul']; ?>"></tr>
	</table></td>


</tr>