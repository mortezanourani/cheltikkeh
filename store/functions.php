<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_POST['operation'] ) )
		switch( $_POST['operation'] ){
			case( "read_modules" ):
				if( isset( $_SESSION['login_user'] ) )
					$site_db = get_site_db( $_SESSION['login_user'] );
				$type = substr( $_POST['type'], 0, strlen( $_POST['type'] ) - 1 );
				$modules = db_multi_read( DB_NAME, 'modules', 'type="'. $type. '"' );
				for( $c = 1; $c <= $modules['nums']; $c++ ){
					echo '<button class="btnmodule" type="'. $modules[$c]['type']. '" id="'. $modules[$c]['id']. '" style="background-image: url( /includes/images/modules/'. $modules[$c]['image']. ' );">';
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
				break;
				
			case( "buy_module" ):
				$module = db_single_read( DB_NAME, 'modules', 'type="'. $_POST['type']. '" AND id="'. $_POST['id'].'"' );
				$price = $module['price'] * ( ( 100 - $module['off'] ) / 100 );
				$title = $module['title'];
				$image = $module['image'];
				$html = $module['html'];
				$style = $module['css'];
				$script = $module['script'];
				$site_db = get_site_db( $_SESSION['login_user'] );
				$last_transfer = num_objects( $site_db['DB_NAME'], 'balance', '' );
				$module = db_single_read( $site_db['DB_NAME'], 'balance', 'id="'. $last_transfer. '"' );
				$credit = $module['credit'];
				
				if( $credit < $price ){
					echo "موجودی حساب کاربری شما کافی نیست! \n لطفا جهت افزایش اعتبار به حساب کاربری خود مراجعه کنید.";
				}else{
					$credit -= $price;
					db_write( $site_db['DB_NAME'], 'balance', array(
						'columns'	=> 'transfer, credit, date, description',
						'values'	=> '"-'. $price. '", "'. $credit. '", "'. date("Y-m-d h:i:sa"). '", "خرید '. $title. '"',
					) );

					db_write( $site_db['DB_NAME'], 'modules', array(
						'columns'	=> 'main_id, type, title, image, html, css, script',
						'values'	=> '"'. $_POST['id']. '", "'. $_POST['type']. '", "'. $title. '", "'. $image. '", "'. $html. '", "'. $style. '", "'. $script. '"',
					) );
				}
				break;
				
			case( "module_info" ):
				$module = db_single_read( DB_NAME, 'modules', 'type="'. $_POST['type']. '" AND id="'. $_POST['id']. '"' );
				echo '<img src="/includes/images/modules/'. $module['image']. '">';
				echo '<div id="description">'. $module['description']. '</div>';
				break;
				
			case( "save_module" ):
				$html = base64_encode( $_POST['html'] );
				$style = base64_encode( $_POST['style'] );
				$script = base64_encode( $_POST['script'] );
				db_write( DB_NAME, 'modules', array(
						'columns'	=> 'type, title, image, price, off, html, css, script',
						'values'	=> '"'. $_POST['type']. '", "'. $_POST['title']. '", "'. $_POST['image']. '", "'. $_POST['price']. '", "'. $_POST['off']. '", "'. $html. '", "'. $style. '", "'. $script. '"',
					) );
				break;
		}
