<?php
	$items_wrap = '<tr class="item" id="category%1$s">';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="check" id="%1$s"><label for="%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="title" id="title%1$s">%2$s</td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="edit" id="btnedit%1$s"><label for="btnedit%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="delete" id="btndelete%1$s"><label for="btndelete%1$s"><div></div></label></td>';
	$items_wrap .= '</tr>';
	$items_wrap .= '<tr><td colspan="4" class="separater"><hr></td></tr>';

	$scripts = '$(".delete").click(function(){';
	$scripts .= 'if( $(this).parent().parent().find(".check").attr("id") === "1" ){';
	$scripts .= 'alert( "شما مجاز به حذف این مورد نیستید." );';
	$scripts .= '}else{';
	$scripts .= 'if( confirm( "آیا از حذف این مورد مطمئن هستید؟" ) ){';
	$scripts .= 'category_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_categories_list();';
	$scripts .= '}';
	$scripts .= '}';
	$scripts .= '});';

	$scripts_wrap = '$("#btnedit%1$s").click(function(){';
	$scripts_wrap .= 'if( "%1$s" === "1" ){';
	$scripts_wrap .= 'alert( "شما مجاز به تغییر نام این دسته نیستید." );';
	$scripts_wrap .= '}else{';
	$scripts_wrap .= '$("#txtcategoryname").val("%2$s");';
	$scripts_wrap .= '$("#txtcategorylink").val("%3$s");';
	$scripts_wrap .= '$("#categories-menu #btnadd").css({"display": "none"});';
	$scripts_wrap .= '$("#categories-menu #btndelete").css({"display": "none"});';
	$scripts_wrap .= '$("#categories-menu #btnlist").css({"display": "initial"});';
	$scripts_wrap .= '$("#categorieslist").css({"display": "none"});';
	$scripts_wrap .= '$("#categoryeditor #title").text("ویرایش");';
	$scripts_wrap .= '$("#categoryeditor #ok").val("%1$s");';
	$scripts_wrap .= '$("#categoryeditor").css({"transform": "scaleY(1)"});';
	$scripts_wrap .= '}';
	$scripts_wrap .= '});';

?>
<table id="categorieslist" class="listitem">
	<?php 
		get_categories_list( array(
			'items_wrap'	=> $items_wrap,
			'scripts_wrap'	=> $scripts_wrap,
			'scripts'		=> $scripts,
		));
	?>
</table>
<div id="categoryeditor" class="editor">
	<div class="frmeditor">
		<div id="title"></div>
		<table id="form">
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="نام دسته" id="txtcategoryname"><hr></div></td>
			</tr>
			<tr>
				<td><div class="input ltr"><input type="text" placeholder="آدرس دسترسی" id="txtcategorylink"><hr></div></td>
			</tr>
			<tr>
				<td><button class="text" id="ok" value="0">تایید</button></td>
			</tr>
		</table>
	</div>
</div>
<script>
	$("#categoryeditor #ok").click(function(){
		if( $("#txtcategoryname").val().length < 5 ){
			alert( "لطفا نام دسته ی مورد نظر خود را وارد کنید." );
		}else if( $("#txtcategorylink").val().length === 0 || $("#txtcategorylink").val().indexOf('/') != -1 ){
			alert( "لطفا آدرس صفحه ی دسترسی به دسته بندی مورد نظر خود را وارد کنید. \n این نام به عنوان آدرس اینترنتی دسته بندی مورد نظر به کار می رود و تنها باید یک نام انگلیسی باشد." );
		}else{
			if( $(this).val() == "0" ){
				category_create( $("#txtcategoryname").val(), $("#txtcategorylink").val() );
			}else{
				category_rename( $(this).val(), $("#txtcategoryname").val(), $("#txtcategorylink").val() );
			}
			//load_categories_list();
			$("#categories-menu #btnlist").click();
		}
	});
</script>
