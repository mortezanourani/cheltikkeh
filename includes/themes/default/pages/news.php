<?php
	if( !function_exists( 'db_multi_read' ) && file_exists( '../includes/functions/database.php' ) )
		include '../includes/functions/database.php';
	$news = db_multi_read( DB_NAME, 'news', '' );
?>
<div class="news">
	<table>
	<?php for( $c = $news['nums']; $c >= 1; $c-- ): ?>
		<tr>
			<td class="preview" style="display: inline-table;">
				<?php if( !empty( $news[$c]['image'] ) ): ?>
					<img src="<?php echo $news[$c]['image'];?>" align="right" width="150px" height="100px">
				<?php endif; ?>
				<p class="date" style="margin: 0px; padding: 0px;"><?php echo $news[$c]['date']; ?></p>
				<p class="title" style="margin: 0px; padding: 0px;"><?php echo $news[$c]['title']; ?></p>
				<?php echo substr( str_replace( "\n", '<br>', $news[$c]['text'] ), 0, strpos( $news[$c]['text'], '.' ) + 1 ); ?>
			</td>
			<td class="text" style="display: none;">
				<?php if( !empty( $news[$c]['image'] ) ): ?>
					<img src="<?php echo $news[$c]['image'];?>" align="right">
				<?php endif; ?>
				<p class="date" style="margin: 0px; padding: 0px;"><?php echo $news[$c]['date']; ?></p>
				<p class="title" style="margin: 0px; padding: 0px;"><?php echo $news[$c]['title']; ?></p>
				<?php echo str_replace( "\n", '<br>', $news[$c]['text'] ); ?>
			</td>
		</tr>
		<tr>
			<td><hr></td>
		</tr>
	<?php endfor; ?>
	</table>
</div>

<script>
	$(".preview").live('click', function(){
		$(".text").css({"display": "none"});
		$(".text").prev().css({"display": "inline-table"});
		$(this).css({"display": "none"});
		$(this).next().css({"display": "inline-table"});
	});
	$(".text").live('click', function(){
		$(this).css({"display": "none"});
		$(this).prev().css({"display": "inline-table"});
	});
</script>