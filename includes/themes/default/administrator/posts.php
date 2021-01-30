<?php
	$items_wrap = '<tr class="item" id="post%1$s">';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="check" id="%1$s"><label for="%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="title" id="title%1$s">%3$s</td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="commentable" id="btncommentable%1$s" %8$s><label for="btncommentable%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="visible" id="btnvisible%1$s" %7$s><label for="btnvisible%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="delete" id="btndelete%1$s"><label for="btndelete%1$s"><div></div></label></td>';
	$items_wrap .= '</tr>';
	$items_wrap .= '<tr><td colspan="6" class="separater"><hr></td></tr>';

	$scripts = '$(".delete").click(function(){';
	$scripts .= 'if( confirm( "آیا از حذف این مطلب مطمئن هستید؟") )';
	$scripts .= 'post_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_posts_list();';
	$scripts .= '});';
	$scripts .= '$(".visible").click(function(){';
	$scripts .= 'post_visibility_change( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_posts_list();';
	$scripts .= '});';
	$scripts .= '$(".commentable").click(function(){';
	$scripts .= 'post_commentability_change( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_posts_list();';
	$scripts .= '});';

	$scripts_wrap = '$("#title%1$s").click(function(){';
	$scripts_wrap .= '$("#btnsavepost").val("%1$s");';
	$scripts_wrap .= '$("#txtposttitle").val("%3$s");';
	$scripts_wrap .= '$("#btnpostimage").val("%4$s");';
	$scripts_wrap .= '$("#txtpostcontent").val( "%5$s" );';
	$scripts_wrap .= '$("#btnpostcommentable").prop("checked", %8$s);';
	$scripts_wrap .= '$("#btnpostvisiblity").prop("checked", false);';
	$scripts_wrap .= 'if("%7$s" === "visible") $("#btnpostvisiblity").prop("checked", true);';
	$scripts_wrap .= '$("#post-category-menu button").attr({"disabled": false});';
	$scripts_wrap .= '$("#post-category-menu").find("button").filter(function(){return this.value==="%9$s"}).attr({"disabled": true});';
	$scripts_wrap .= '$("#slctpostcategory").text( $("#post-category-menu").find("button:disabled").text() );';
	$scripts_wrap .= '$("#posts-menu #btnadd").css({"display": "none"});';
	$scripts_wrap .= '$("#posts-menu #btndelete").css({"display": "none"});';
	$scripts_wrap .= '$("#postslist").css({"display": "none"});';
	$scripts_wrap .= '$("#posts-menu #btnlist").css({"display": "initial"});';
	$scripts_wrap .= '$("#posteditor").css({"display": "inline-table"});';
	$scripts_wrap .= 'setTimeout( function(){';
	$scripts_wrap .= '$("#posteditor").css({"transform": "scaleY(1)"});';
	$scripts_wrap .= '}, 10 );';
	$scripts_wrap .= '});';

?>
<table id="postslist" class="listitem">
	<?php
		get_posts_list( array(
		'items_wrap'	=> $items_wrap,
		'scripts_wrap'	=> $scripts_wrap,
		'scripts'		=> $scripts,
		) );
	?>		
</table>

<table id="posteditor">
	<tr style="height: 50px;">
		<td width="100%;"><div class="input rtl"><input type="text" placeholder="عنوان" id="txtposttitle"><hr></div></td>
		<td><button id="btnpostimage" class="neg-icon"></button></td>
		<td>
		<?php
			$user = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user']. '"' );
			$site = db_single_read( DB_NAME, 'sites', 'id="'. $user['site_id']. '"' );
			$site_db = $site['id']. '_db';
			$num_categories = num_objects( $site_db, 'categories', '' );
			echo '<script> num_cats = '. $num_categories. '; </script>';
			$category = db_single_read( $site_db, 'categories', 'id="1"' );
		?>
			<button id="slctpostcategory" <?php if($num_categories <= 1){ echo " disabled"; } ?>>
				<?php
					echo $category['name'];
				?>
				<hr>
			</button>
			<div class="select-menu" id="post-category-menu">
				<menu id="select-menu">
					<div id="container">
						<?php
							$category = db_multi_read( $site_db, 'categories', '' );
							for($c = 1; $c <= $num_categories; $c++){
								if($c == 1){
									echo '<button class="text" id="category'. $c. '" value="'. $category[$c]['id']. '" disabled>'. $category[$c]['name']. '</button>';
								}else{
									echo '<button class="text" id="category'. $c. '" value="'. $category[$c]['id']. '">'. $category[$c]['name']. '</button>';
								}
							}
						?>
					</div>
				</menu>
			</div>
		</td>
		<td><input type="checkbox" id="btnpostcommentable" checked><label for="btnpostcommentable" class="icon-checkbox"><div></div></label></td>
		<td><input type="checkbox" id="btnpostvisiblity"><label for="btnpostvisiblity" class="icon-checkbox"><div></div></label></td>
		<td><button id="btnsavepost" class="neg-icon"></button></td>
	</tr>
	<tr>
		<td colspan="6" style="position: relative;"><textarea id="txtpostcontent"></textarea></td>
	</tr>
</table>

<div id="image-selector">
	<div class="glass"></div>
	<div class="images-list">
		<div id="container">
		<?php
			$items_wrap = '<button class="image-selector-item" id="%1$s" src="%2$s" style="background-image: url(/'. $_SESSION['login_user']. '/%2$s);">';
			$items_wrap .= '</button>';
			get_photos_list( array(
				'items_wrap'	=> $items_wrap,
			) );
		?>
		</div>
	</div>
</div>

<script>
	$("#btnpostimage").click(function(){
		$("#image-selector .image-selector-item").removeClass("selected");
		if( $(this).attr("value") != "" )
			$("#image-selector").find("button[src='" + $(this).attr("value") + "']").addClass("selected");
		$("#image-selector").css({"transform": "scaleY(1)"});
	});

	$(".image-selector-item").click(function(){
		$("#btnpostimage").val( $(this).attr("src") );
		$("#image-selector").css({"transform": "scaleY(0)"});
	});

	$("#image-selector .glass").click(function(){
		$("#image-selector").css({"transform": "scaleY(0)"});
	});

	$("#posteditor #btnsavepost").click(function(){
		var id = $(this).val();
		var title = $("#posteditor #txtposttitle").val();
		var image = $("#posteditor #btnpostimage").attr("value");
		var content = $("#posteditor #txtpostcontent").val();
		var status = $("#posteditor #btnpostvisiblity").prop("checked");
		if( status ){
			status = "visible";
		}else{
			status = "invisible";
		}
		var commentable = $("#posteditor #btnpostcommentable").prop("checked");
		var category = $("#posteditor #post-category-menu").find("button:disabled").val();
		if( id === "0" ){
			post_write( title, image, content, status, commentable, category );
		}else{
			post_edit( id, title, image, content, status, commentable, category );
		}
		setTimeout( function(){
			load_posts_list();
		}, 500);
		$("#posts-menu #btnlist").click();
	});
</script>
