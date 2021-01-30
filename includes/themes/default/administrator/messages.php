<?php
	$items_wrap = '<tr class="item" id="message%1$s">';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="check" id="%1$s"><label for="%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="name" id="name%1$s">%2$s</td>';
	$items_wrap .= '<td class="mail" id="mail%1$s">%3$s</td>';
	$items_wrap .= '<td class="date" id="date%1$s">%5$s</td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="status" id="btnstatus%1$s" %6$s><label for="btnstatus%1$s"><div></div></label></td>';
	$items_wrap .= '<td class="controller"><input type="checkbox" class="delete" id="btndelete%1$s"><label for="btndelete%1$s"><div></div></label></td>';
	$items_wrap .= '</tr>';
	$items_wrap .= '<tr><td colspan="6" class="separater"><hr></td></tr>';
	$items_wrap .= '<tr><td colspan="6" class="message" id="message%1$s">%4$s</td></tr>';

	$scripts = '$(".delete").click(function(){';
	$scripts .= 'if( confirm( "آیا از حذف این مطلب مطمئن هستید؟") )';
	$scripts .= 'message_delete( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_messages_list();';
	$scripts .= '});';
	$scripts .= '$(".status").click(function(){';
	$scripts .= 'message_status_change( $(this).parent().parent().find(".check").attr("id") );';
	$scripts .= 'load_messages_list();';
	$scripts .= '});';
	$scripts .= '$(".name").click(function(){';
	$scripts .= 'message_show( $(this) )';
	$scripts .= '});';
	$scripts .= '$(".mail").click(function(){';
	$scripts .= 'message_show( $(this) )';
	$scripts .= '});';
	$scripts .= '$(".date").click(function(){';
	$scripts .= 'message_show( $(this) )';
	$scripts .= '});';

	$scripts_wrap = '';

?>
<table id="messageslist" class="listitem">
	<?php
		get_messages_list( array(
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
			$items_wrap = '<button class="image-selector-item" id="%1$s" src="%2$s" style="background-image: url(/'. $_SESSION['login_user']. '%2$s);">';
			$items_wrap .= '</button>';
			get_photos_list( array(
				'items_wrap'	=> $items_wrap,
			) );
		?>
		</div>
	</div>
</div>