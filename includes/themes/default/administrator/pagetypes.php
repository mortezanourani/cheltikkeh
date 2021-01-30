<?php
	$items_wrap = '<tr class="item" id="pagetype%1$s">';
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
	$scripts .= 'page_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_pages_list();';
	$scripts .= '}';
	$scripts .= '}';
	$scripts .= '});';

	$scripts_wrap = '$("#btnedit%1$s").click(function(){';
	$scripts_wrap .= 'if( "%1$s" === "1" ){';
	$scripts_wrap .= 'alert( "شما مجاز به تغییر نام این صفحه نیستید." );';
	$scripts_wrap .= '}else{';
	$scripts_wrap .= '$("#txtpagetypename").val("%2$s");';
	$scripts_wrap .= '$("#txtpagetypelink").val("%3$s");';
	$scripts_wrap .= '$("#pagetypes-menu #btnadd").css({"display": "none"});';
	$scripts_wrap .= '$("#pagetypes-menu #btndelete").css({"display": "none"});';
	$scripts_wrap .= '$("#pagetypes-menu #btnlist").css({"display": "initial"});';
	$scripts_wrap .= '$("#pagetypeslist").css({"display": "none"});';
	$scripts_wrap .= '$("#pagetypeeditor #title").text("ویرایش");';
	$scripts_wrap .= '$("#pagetypeeditor #ok").val("%1$s");';
	$scripts_wrap .= '$("#pagetypeeditor").css({"transform": "scaleY(1)"});';
	$scripts_wrap .= '}';
	$scripts_wrap .= '});';

?>
<table id="pagetypeslist" class="listitem">
	<?php 
		get_pages_list( array(
			'items_wrap'	=> $items_wrap,
			'scripts_wrap'	=> $scripts_wrap,
			'scripts'		=> $scripts,
		));
	?>
</table>
<div id="pagetypeeditor" class="editor">
	<div class="frmeditor">
		<div id="title"><p></p></div>
		<table id="form">
			<tr>
				<td><div class="input rtl"><input type="text" placeholder="نام صفحه" id="txtpagetypename"><hr></div></td>
			</tr>
			<tr>
				<td><div class="input ltr"><input type="text" placeholder="آدرس صفحه" id="txtpagetypelink"><hr></div></td>
			</tr>
			<tr>
				<td><button class="text" id="ok" value="0">تایید</button></td>
			</tr>
		</table>
	</div>
</div>
<script>
	$("#pagetypeeditor #ok").click(function(){
		if( $("#txtpagetypename").val().length === 0 ){
			alert( "لطفا نام صفحه ی مورد نظر خود را وارد کنید." );
		}else if( $("#txtpagetypelink").val().length === 0 || $("#txtpagetypelink").val().indexOf('/') != -1 ){
			alert( "لطفا آدرس صفحه ی مورد نظر خود را وارد کنید. \n این نام به عنوان آدرس اینترنتی صفحه ی مورد نظر به کار می رود و باید تنها یک نام انگلیسی باشد." );
		}else{
			if( $(this).val() == "0" ){
				page_create( $("#txtpagetypename").val(), $("#txtpagetypelink").val() );
			}else{
				page_rename( $(this).val(), $("#txtpagetypename").val(), $("#txtpagetypelink").val() );
			}
			$("#pagetypes-menu #btnlist").click();
		}
	});
</script>
