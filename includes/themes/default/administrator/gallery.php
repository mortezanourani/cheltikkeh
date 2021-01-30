<script>
	$(".sub-menu").css({"display": "none"});
	$("#gallery-menu").css({"display": "initial"});
</script>
<?php
	$items_wrap = '<tr id="photo%1$s"><td class="image" rowspan="3" style="background-image: url(/'. $_SESSION['login_user']. '/%2$s);"><input type="checkbox" class="check" id="%1$s"><label for="%1$s"><div></div></label></td><td class="title">%3$s</td><td class="controller"><input type="checkbox" class="edit" id="btnedit%1$s"><label for="btnedit%1$s"><div></div></label></td><td class="controller"><input type="checkbox" class="delete" id="btndelete%1$s"><label for="btndelete%1$s"><div></div></label></td></tr>';
	$items_wrap .= '<tr><td colspan="3" class="caption">%4$s</td></tr>';
	$items_wrap .= '<tr id="description%1$s"><td colspan="3" class="description">%5$s</td></tr>';
	$items_wrap .= '<tr><td colspan="4" class="separater"><hr></td></tr>';

	$scripts = '$(".delete").click(function(){';
	$scripts .= 'if( confirm( "آیا از حذف این مورد مطمئن هستید؟" ) ){';
	$scripts .= 'photo_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_photos_list();';
	$scripts .= '}';
	$scripts .= '});';

	$scripts_wrap = '$("#btnedit%1$s").click(function(){';
	$scripts_wrap .= '$("#txtphototitle").val("%3$s");';
	$scripts_wrap .= '$("#txtphotocaption").val("%4$s");';
	$scripts_wrap .= '$("#txtphotodescription").val("%5$s");';
	$scripts_wrap .= '$("#gallery-menu #btnadd").css({"display": "none"});';
	$scripts_wrap .= '$("#gallery-menu #btndelete").css({"display": "none"});';
	$scripts_wrap .= '$("#gallery-menu #btnlist").css({"display": "initial"});';
	$scripts_wrap .= '$("#photoslist").css({"display": "none"});';
	$scripts_wrap .= '$("#photoeditor #title").text("ویرایش");';
	$scripts_wrap .= '$("#photoeditor #ok").val("%1$s");';
	$scripts_wrap .= '$("#photoeditor #photofile").parent().parent().css({"display": "none"});';
	$scripts_wrap .= '$("#photoeditor #ok").parent().css({"display": "initial"});';
	$scripts_wrap .= '$("#photoeditor #submit").parent().css({"display": "none"});';
	$scripts_wrap .= '$("#photoeditor").css({"display": "inline-table"});';
	$scripts_wrap .= 'setTimeout( function(){';
	$scripts_wrap .= '$("#photoeditor").css({"transform": "scaleY(1)"});';
	$scripts_wrap .= '}, 10 );';
	$scripts_wrap .= '});';

?>
<table id="photoslist">
	<?php
		get_photos_list( array(
		'items_wrap'	=> $items_wrap,
		'scripts_wrap'	=> $scripts_wrap,
		'scripts'		=> $scripts,
		) );
	?>
	</table>
<div id="photoeditor" class="editor">
	<form class="frmeditor" method="POST" action="" enctype="multipart/form-data">
		<div id="title"></div>
		<table id="form">
			<tr>
				<td><div class="input ltr"><input type="file" id="photofile" name="image"></div><hr></td>
			</tr>
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="نام عکس" id="txtphototitle" name="title"><hr></div></td>
			</tr>
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="عنوان عکس" id="txtphotocaption" name="caption"><hr></div></td>
			</tr>
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="توضیحات عکس" id="txtphotodescription" name="description"><hr></div></td>
			</tr>
			<tr>
				<td><button class="text" id="ok">تایید</button></td>
				<td><input type="submit" id="submit" value="تایید"></td>
			</tr>
		</table>
	</form>
</div>

<script>
	$("#photoeditor #ok").click(function( event ){
		event.preventDefault();
		if( $("#txtphototitle").val().length < 5 ){
			alert("لطفا نامی مناسب برای عکس انتخاب نمایید.");
		}else{
			var id = $(this).val();
			var title = $("#txtphototitle").val();
			var caption = $("#txtphotocaption").val();
			var description = $("#txtphotodescription").val();
			photo_edit( id, title, caption, description );
			load_photos_list();
			$("#gallery-menu #btnlist").click();
		}
	});
</script>


