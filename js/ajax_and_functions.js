var cart = [0]
$('#articul_send').submit(function(){
var index_artikul=$('#articul').val()
var str = $(this).serialize();//
var articul=$("#articul").val();
var check_spaces = new RegExp(" ");
var check_dots = new RegExp(".");var check_00=check_dots.test(articul);
var check_num =  /^[0-9]+$/;
var check_01 = check_spaces.test(articul);
var check_02 = check_num.test(articul)
if (check_01==true){
	$('#errors').html('В вашем артикле есть лишние пробелы');}
else{
	if(check_02==false && check_00==false){
		$('#errors').html('артикуль должен состоять только из цифр');}
	else{
		$.ajax({
		type:'POST',
		url:'php/stuff.php',
		data: str,
		success:function(html){
				if(cart.indexOf(index_artikul)==-1){
				console.log(cart)
				if (html=='error_articul'){
					$('#errors').html('Неверный артикуль');}
				else{
					if ($('#content').children().length==0){
					$('#content').html('<tr id="row_0"><td>name</td><td>price</td><td>count</td><td>total</td></tr>')
					$('#btn01').html('<button id="buy" onclick="finish_order()">Оформить заказ</button>');
					
				}
					cart.push(String(index_artikul));
					$('#errors').html('');
					var content=$("#content").html();
					$('#content').html(content+html);
					ves_count(index_artikul)
					total_price()
				}

				}
			else{
				$('#errors').html('Вы уже добавили этот товар в ваш список заказов');}
			}
		});
		}
	}
	return false;
});


function count(o){
	var name=o.id
	var articul=name.substring(4,name.length)
	ves_count(articul)
	var price=document.getElementById('price_'+String(articul)).value;
	var kef = document.getElementById('ctn_'+String(articul)).value;
	var total=kef*price
	document.getElementById("total_"+String(articul)).value = String(total);
	total_price()
	var dostavka= document.getElementById('dostavka').innerHTML
	var service= document.getElementById('add').innerHTML
	
}


function delete_obj(o){
	var id_btn=o.id;
	var articul=id_btn.substring(4,14)

	index_row=cart.indexOf(articul)
	cart.splice(index_row,1);$('#errors').html('');
	document.getElementById("content").deleteRow(index_row);
	var x = document.getElementById("content").rows.length;
	if (x==1){
		document.getElementById("content").innerHTML=''
		document.getElementById('order').innerHTML=''
		document.getElementById('total_price').innerHTML=''
		document.getElementById('total_ves').innerHTML=''
		document.getElementById('total_price').innerHTML=''
		document.getElementById('total_dostavka').innerHTML=''
		document.getElementById('total_add').innerHTML=''
		document.getElementById('sum').innerHTML=''
		document.getElementById('ves').innerHTML=''
		document.getElementById('dostavka').innerHTML=''
		document.getElementById('add').innerHTML=''
		document.getElementById('buy_it').innerHTML=''
		document.getElementById('status').innerHTML=''
		document.getElementById('money').innerHTML=''
	}
	total_price()
	
}

function total_price(){
	var x = document.getElementById("content").rows.length;
	var sum=0
	var ves=0
	for (var i=1;i<x;i++){
		var item_ves=document.getElementById('ves_'+String(cart[i])).innerHTML;
		var item= document.getElementById('total_'+String(cart[i])).value;
		ves=ves+parseFloat(item_ves)
		sum=sum+parseInt(item)
		document.getElementById('total_ves').innerHTML="общая груза подьемность"
		document.getElementById('total_price').innerHTML="вы заказали на сумму "
		document.getElementById('sum').innerHTML=sum
		document.getElementById('ves').innerHTML=ves
	}
}


function ves_count(arcl){
	var kef = document.getElementById('ctn_'+String(arcl)).value;
	var ves_old = document.getElementById('ves_h_'+String(arcl)).innerHTML;
	var ves_new = parseFloat(ves_old)*kef
	document.getElementById('ves_'+String(arcl)).innerHTML=Math.round(ves_new * 100) / 100
}


function finish_order(){
	var row = document.getElementById('row_0');
	row.deleteCell(1);
	row.deleteCell(2);
	document.getElementById('zakaz_btn').disabled=true;
	var x = document.getElementById("content").rows.length;
	for (var i=1;i<x;i++){
		var row = document.getElementById('row_'+String(cart[i]));
		document.getElementById('del_btn_'+String(cart[i])).innerHTML=''
		row.deleteCell(1);
		row.deleteCell(1);
	}
	document.getElementById('order').style.display='inline-block'
	document.getElementById('btn01').style.display='none'
	var sum =document.getElementById('sum').innerHTML
	document.getElementById('total').innerHTML='<h1 id="sum_txt">'+sum+' :цена за товар(ы)</h1>'
	document.getElementById('total').style.display='inline-block'
}

function select(o) {
	document.getElementById('total').innerHTML=''
	var sum =document.getElementById('sum').innerHTML
	document.getElementById('total').innerHTML='<h1 id="sum_txt">'+sum+' :цена за товар(ы)</h1>'
	document.getElementById('total').style.display='inline-block'
    var x = o.value;
   	var ves =$('#ves').html();
 	var fixed_ves=$('#fixed_ves').html();
	var fixed_prc=$('#fixed_prc').html();
	if (parseFloat(ves)<=parseFloat(fixed_ves)){
		var content=$('#total').html();
		total=parseFloat(fixed_prc)+parseFloat(sum)
		$('#total').html(content+'<h1 id="dst_txt">+'+fixed_prc+" :цена за доставку</h1><h1 id='total_txt'> "+total+"</h1>")
	}else{
		fixed_prc=ves*x;
		var content=$('#total').html();
		$('#total').html(content+'<h1 id="dst_txt">+'+fixed_prc+" :цена за доставку</h1><h1 id='total_txt'> </h1>")

	}

}


$('#kupit').click(function(){
var	name = $('#name').val();
var phone = $('#phone').val();
var email = $('#email').val();
var dostavka=$('#city').val();
var city=$("#city option:selected").text();
var adrs=$('#adrs').val();
var price=$('#sum').html();
var ves =$('#ves').html();
var fixed_ves=$('#fixed_ves').html();
var fixed_prc=$('#fixed_prc').html();
if(parseFloat(ves)<=parseFloat(fixed_ves)){
	dostavka=parseFloat(fixed_prc)
}else{
	dostavka=parseFloat(ves)*parseFloat(dostavka)
}
var total_price=dostavka+parseFloat(price)
data=[name,phone,email,dostavka,city,adrs,ves,price,total_price];
d_names=['name=','&phone=','&email=','&dostavka=','&city=','&adrs=','&ves=','&price=','&total_price=']
if (name!='' && dostavka!='' && phone!='' && email!='' && city!='' && adrs!=''){
	$('#status').html('')
	for (var i=1;i<cart.length;i++){
		var str=''
		var tovar_name=document.getElementById('name_'+String(cart[i])).innerHTML
		for(var j=0;j<data.length;j++){
			data[j]=$.trim(data[j])
			str=str+d_names[j]+data[j]
		}
		str=str+"&artikul="+cart[i]+"&tovar_name="+tovar_name;
		$.ajax({
			type:'POST',
			url:'php/orders.php',
			data: str,
			success:function(html){
				if (html==''){
					document.getElementById('status').innerHTML='Возникла ошибка , попробуйте еще раз '
				}else{
				document.getElementById('wall').innerHTML='<center><h1>Ваш анкета была принята <br>Большое спасибо за ваш заказ ! :)</h1><br><a href="index.php">вернуться назад</a></center>'
				}
				

			}})

		}
	
}else{
	$('#status').html('Анкета заполнена не верна')

}

})

