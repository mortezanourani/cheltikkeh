
<div class="about">
	<table id="about">
		<?php
			$about = db_multi_read( DB_NAME, 'about', '1' );
			for( $c = 1; $c <= $about['nums']; $c++ ){
				$text = str_replace( "\n", "<br>", $about[$c]['text'] );
				echo '<tr><td>'. $text. '</td></tr>';
			}
		?>
	</table>
</div>