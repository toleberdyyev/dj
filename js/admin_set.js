$(document).ready(function(){
   $( window ).load(function() {
        $("#cities_content").load("city.php");
    });

   $('#add_city_btn').click(function(){
   		$('#content').fadeIn();
   });

   $('#add_city').submit(function(){
   	var str =$(this).serialize()
   	$.ajax({
   		type:'POST',
		url:'php/save_new_city.php',
		data: str,
		success:function(html){
			$('#content').fadeIn(100);
			$('#status').html(html);
			console.log(html)
			reload_city()
			$('#content').fadeOut();
		}
   	})
   	return false;
   })

});
function reload_city(){
        $("#cities_content").load("city.php");
}

function del(o){
	var btn_id= o.id;
	var id=btn_id.substring(5,btn_id.lenght)
	$.ajax({
		type:'POST',
		url:'php/functions.php',
		data: 'delete='+id,
		success:function(html){
			var city=document.getElementById('city_'+String(id)).innerHTML
			$('#status').html(city+html)
			reload_city()
		}

	})
}

function edit(o){
	var btn_id= o.id;
	var id=btn_id.substring(5,btn_id.lenght)
	var text=document.getElementById('price_'+String(id))
	if (text.readOnly){
		o.innerHTML='save';
		text.readOnly=false;
	}else{
		o.innerHTML='edit';
		text.readOnly=true;
		var price =text.value;
		$.ajax({
			type:'POST',
			url:'php/functions.php',
			data: 'edit='+id+'&price='+price,
			success:function(html){
			$('#status').html(html)
			reload_city()
				
			}

		})

	}
}

