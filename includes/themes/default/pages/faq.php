<?php
	if( !function_exists( 'db_multi_read' ) && file_exists( '../includes/functions/database.php' ) )
		include '../includes/functions/database.php';
	$faq = db_multi_read( DB_NAME, 'faq', '' );
?>
<div type="faq">
	در این جا سعی شده است به سوالات احتمالی که برای شما پیش می آید پاسخ داده شود. این سوالات همگام با خبرهای ارسالی، به روز رسانی می شوند.
	<hr>
	<table>
	<?php for( $c = 1; $c <= $faq['nums']; $c++ ): ?>
		<tr><td type="question">
		<?php echo $faq[$c]['position']. '. '. $faq[$c]['question']; ?>
		</td></tr>
		<tr><td type="answer">
		<?php echo str_replace( "\n", '<br>', $faq[$c]['answer'] ); ?>
		</td></tr>
	<?php endfor; ?>
	</table>
</div>

