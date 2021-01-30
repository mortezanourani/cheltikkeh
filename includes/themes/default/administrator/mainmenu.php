<?php
	$items_wrap = '<tr class="item" id="menuitem%1$s">';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="check" id="%1$s"><label for="%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="title" id="title%1$s">%2$s</td>';
	$items_wrap .= '<td class="link" id="link%1$s">%3$s</td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="edit" id="btnedit%1$s"><label for="btnedit%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="delete" id="btndelete%1$s"><label for="btndelete%1$s"><div></div></label></td>';
	$items_wrap .= '</tr>';
	$items_wrap .= '<tr><td colspan="5" class="separater"><hr></td></tr>';
	
	$scripts = '$(".delete").click(function(){';
	$scripts .= 'if( $(this).parent().parent().find(".check").attr("id") === "1" ){';
	$scripts .= 'alert( "شما مجاز به حذف این مورد نیستید." );';
	$scripts .= '}else{';
	$scripts .= 'if( confirm( "آیا از حذف این مورد مطمئن هستید؟" ) ){';
	$scripts .= 'menu_item_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_menu_items_list();';
	$scripts .= '}';
	$scripts .= '}';
	$scripts .= '});';

	$scripts_wrap = '$("#btnedit%1$s").click(function(){';
	$scripts_wrap .= 'if( "%1$s" === "1" ){';
	$scripts_wrap .= 'alert( "شما مجاز به تغییر نام این دسته نیستید." );';
	$scripts_wrap .= '}else{';
	$scripts_wrap .= '$("#txtitemtitle").val("%2$s");';
	$scripts_wrap .= '$("#txtitemlink").val("%3$s");';
	$scripts_wrap .= '$("#mainmenu-menu #btnadd").css({"display": "none"});';
	$scripts_wrap .= '$("#mainmenu-menu #btndelete").css({"display": "none"});';
	$scripts_wrap .= '$("#mainmenu-menu #btnlist").css({"display": "initial"});';
	$scripts_wrap .= '$("#menulist").css({"display": "none"});';
	$scripts_wrap .= '$("#menueditor #title").text("ویرایش");';
	$scripts_wrap .= '$("#menueditor #ok").val("%1$s");';
	$scripts_wrap .= '$("#menueditor").css({"transform": "scaleY(1)"});';
	$scripts_wrap .= '}';
	$scripts_wrap .= '});';

?>
<table id="menulist" class="listitem">
	<?php 
		get_menu_items_list( array(
			'items_wrap'	=> $items_wrap,
			'scripts_wrap'	=> $scripts_wrap,
			'scripts'		=> $scripts,
		));
	?>
</table>
<div id="menueditor" class="editor">
	<div class="frmeditor">
		<div id="title"></div>
		<table id="form">
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="عنوان آیتم" id="txtitemtitle"><hr></div></td>
			</tr>
			<tr>
				<td><div class="input ltr"><input type="text" placeholder="آدرس" id="txtitemlink"><hr></div></td>
			</tr>
			<tr>
				<td><button class="text" id="ok" value="0">تایید</button></td>
			</tr>
		</table>
	</div>
</div>
<script>
	$("#menueditor #ok").click(function(){
		var error = 0;
		if( $("#txtitemtitle").val().length < 5 )
			error = "لطفا عنوان آیتم مورد نظر خود را وارد کنید.";
		if( $("#txtitemlink").val().length < 7 )
			error = "لطفا آدرس آیتم مورد نظر خود را وارد کنید.";
		if( error === 0 ){
			if( $(this).val() === "0" ){
				menu_item_create( $("#txtitemtitle").val(), $("#txtitemlink").val() );
			}else{
				menu_item_edit( $(this).val(), $("#txtitemtitle").val(), $("#txtitemlink").val() );
			}
			alert( "عملیات درخواستی با موفقیت انجام شد." );
			load_menu_items_list();
			$("#mainmenu-menu #btnlist").click();
		}else{
			alert( error );
		}
	});
</script>
