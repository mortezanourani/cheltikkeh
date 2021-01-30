
<div class="laws">
	<table id="laws">
		<?php
			$acts = db_multi_read( DB_NAME, 'laws', '1' );
			for( $i = 1; $i <= $acts['nums']; $i++ ){
				$act = str_replace( "\n", "<br>", $acts[$i]['text'] );
				echo '<tr><td colspan="3">';
				$j = $i - 1;
				if( $i != 1 )
					if( $j != 10 ){
						echo '<font class="number">'. $j . '. </font>';
					}else{
						echo '<br>';
					}
				echo '<font class="act">'. $act. '</font>';
				echo '</td></tr>';
			}			
		?>
	</table>
</div>