
<?php
	$site_db = get_site_db( $_SESSION['login_user'] );
	$modules = db_single_read( $site_db['DB_NAME'], 'designs', 'type="page" AND id="1"' );
?>
<script src="/ct_core/js_functions/designer.js"></script>
<center>
<?php if( empty( $modules['html'] ) ): ?>

	<div class="module-place" id="new-module" ondrop="add( event )" ondragover="firstdrop( event )">
		با کشیدن و قرار دادن یکی از المان ها در این محل طراحی این صفحه را آغاز کنید.
	</div>
	
<?php else: ?>

	<?php
		$design = db_single_read( $site_db['DB_NAME'], 'designs', 'type="page" AND id="1"' );

		echo base64_decode( $design['html'] );
	?>
	
<?php endif; ?>
</center>

