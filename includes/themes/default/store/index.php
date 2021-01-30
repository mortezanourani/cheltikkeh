
<script src="/ct_core/js_functions/store.js"></script>
<center>
<?php
	$type = "header";
	if( isset( $_SESSION['login_user'] ) )
		$site_db = get_site_db( $_SESSION['login_user'] );
	$modules = db_multi_read( DB_NAME, 'modules', 'type="'. $type. '"' );
	for( $c = 1; $c <= $modules['nums']; $c++ ){
		echo '<button class="btnmodule" type="'. $modules[$c]['type']. '" id="'. $modules[$c]['id']. '" style="background-image: url( /includes/images/modules_temp/'. $modules[$c]['image']. ' );">';
			if( $modules[$c]['price'] > 0 ){
				echo '<p id="price">'. $modules[$c]['price']. ' ریال </p>';
			}else{
				echo '<p id="price">رایگان</p>';
			}
			
			if( $modules[$c]['off'] > 0 )
				echo '<p id="off">'. $modules[$c]['off']. '<font style="font-size: 18px;">%off</font></p>';
			
			if( $modules[$c]['price'] > 0 ){
				if( $modules[$c]['off'] > 0 ){
					$price =  $modules[$c]['price'] * ( ( 100 - $modules[$c]['off'] ) / 100 );
					if( $price > 0 ){
						echo $price. ' ريال';
					}else{
						echo 'رایگان';
					}
				}else{
					echo $modules[$c]['price']. ' ريال';
				}
			}else{
				echo 'رایگان';
			}
			
			if( isset( $site_db['DB_NAME'] ) ){
				$own = db_single_read( $site_db['DB_NAME'], 'modules', 'type="'. $type. '" AND main_id="'. $modules[$c]['id']. '"' );
				if( empty( $own ) ){
					echo '<p id="btnbuy" title="اضافه کردن به سبد خرید"></p>';
				}else{
					echo '<p id="btnown" title="خریداری شده"></p>';
				}
			}else{
				echo '<p id="btnbuy" title="اضافه کردن به سبد خرید"></p>';
			}
			
		echo '</button>';
	}
?>
</center>
