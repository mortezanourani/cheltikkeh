<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) )
		define( 'ROOT', dirname( __FILE__ ) );
	
	if( !function_exists( 'db_single_read' ) )
		require_once( '/initialize.php' );
	
	if( isset ( $_POST['operation'] ) )
		switch( $_POST['operation'] ){
			case( 'add-plan' ):
				$_SESSION['accept'] = "false";
				$plan = db_single_read( DB_NAME, 'plans', 'id="'. $_POST['id']. '"' );
				if( isset( $_SESSION['plan-title'] ) && !empty( $_SESSION['plan-title'] ) )
					die( 'یک طرح در سبد خرید شما وجود دارد! اگر مایل به تغییر این طرح هستید باید ابتدا طرح قبلی را از سبد خرید حذف کنید.' );
				$_SESSION['plan-title'] = $plan['title'];
				$_SESSION['plan-host'] = $plan['host'];
				$_SESSION['plan-bandwidth'] = $plan['bandwidth'];
				$_SESSION['plan-price'] = $plan['price'];
				$_SESSION['plan-off'] = $plan['off'];
				$_SESSION['plan-last-price'] = ( $plan['price'] * ( ( 100 - $plan['off'] ) / 100 ) );
				break;
				
			case( 'remove-plan' ):
				$_SESSION['accept'] = "false";
				if( $_SESSION['plan-title'] ){
					unset( $_SESSION['plan-title'] );
					unset( $_SESSION['plan-host'] );
					unset( $_SESSION['plan-bandwidth'] );
					unset( $_SESSION['plan-price'] );
					unset( $_SESSION['plan-off'] );
					unset( $_SESSION['plan-last-price'] );
				}
				break;
				
			case( 'add-module' ):
				$_SESSION['accept'] = "false";
				$module = db_single_read( DB_NAME, 'modules', 'id="'. $_POST['id']. '"' );
				
				if( !isset( $_SESSION['num-modules'] ) || empty( $_SESSION['num-modules'] ) ){
					$_SESSION['num-modules'] = 1;
					$nums = 1;
				}else{
					$nums = $_SESSION['num-modules'];
					for( $c = 1; $c <= $_SESSION['num-modules']; $c++ ){
						if( $_SESSION['module'. $c. '-title'] === $module['title'] )
							die( 'این المان قبلا به سبد خرید اضافه شده است.' );
					}
					$nums++;
				}
				$_SESSION['num-modules'] = $nums;
				$_SESSION['module'. $nums. '-id'] = $module['id'];
				$_SESSION['module'. $nums. '-type'] = $module['type'];
				$_SESSION['module'. $nums. '-title'] = $module['title'];
				$_SESSION['module'. $nums. '-image'] = $module['image'];
				$_SESSION['module'. $nums. '-price'] = $module['price'];
				$_SESSION['module'. $nums. '-off'] = $module['off'];
				$_SESSION['module'. $nums. '-html'] = $module['html'];
				$_SESSION['module'. $nums. '-css'] = $module['css'];
				$_SESSION['module'. $nums. '-script'] = $module['script'];
				$_SESSION['module'. $nums. '-last-price'] = ( $module['price'] * ( ( 100 - $module['off'] ) / 100 ) );
				break;
				
			case( 'remove-module' ):
				$_SESSION['accept'] = "false";
				unset( $_SESSION['module'. $_POST['id']. '-id'] );
				unset( $_SESSION['module'. $_POST['id']. '-type'] );
				unset( $_SESSION['module'. $_POST['id']. '-title'] );
				unset( $_SESSION['module'. $_POST['id']. '-image'] );
				unset( $_SESSION['module'. $_POST['id']. '-price'] );
				unset( $_SESSION['module'. $_POST['id']. '-off'] );
				unset( $_SESSION['module'. $_POST['id']. '-html'] );
				unset( $_SESSION['module'. $_POST['id']. '-css'] );
				unset( $_SESSION['module'. $_POST['id']. '-script'] );
				unset( $_SESSION['module'. $_POST['id']. '-last-price'] );
				
				$nums = $_SESSION['num-modules'];
				$nums--;
				for( $c = $_POST['id']; $c <= $nums; $c++ ){
					$d = $c + 1;
					$_SESSION['module'. $c. '-id'] = $_SESSION['module'. $d. '-id'];
					$_SESSION['module'. $c. '-type'] = $_SESSION['module'. $d. '-type'];
					$_SESSION['module'. $c. '-title'] = $_SESSION['module'. $d. '-title'];
					$_SESSION['module'. $c. '-image'] = $_SESSION['module'. $d. '-image'];
					$_SESSION['module'. $c. '-price'] = $_SESSION['module'. $d. '-price'];
					$_SESSION['module'. $c. '-off'] = $_SESSION['module'. $d. '-off'];
					$_SESSION['module'. $c. '-html'] = $_SESSION['module'. $d. '-html'];
					$_SESSION['module'. $c. '-css'] = $_SESSION['module'. $d. '-css'];
					$_SESSION['module'. $c. '-script'] = $_SESSION['module'. $d. '-script'];
					$_SESSION['module'. $c. '-last-price'] = $_SESSION['module'. $d. '-last-price'];
				}
				
				$_SESSION['num-modules'] = $nums;
				if( $nums <= 0 )
					unset( $_SESSION['num-modules'] );
				
				break;
				
			case( 'accept' ):
				if( !isset( $_SESSION['login_user'] ) )
					die( "برای تایید نهایی سبد خرید، باید وارد حساب کاربری خود شوید.\n اگر حساب کاربری ندارید، هم اکنون ثبت نام کنید." );
				
				$site = get_site_db( $_SESSION['login_user'] );
				
				$plan = db_single_read( DB_NAME, 'sites', 'name = "'. $_SESSION['login_user']. '"' );
				if( ( isset( $_SESSION['plan-title'] ) && !empty( $_SESSION['plan-title'] ) ) && !empty( $plan['plan'] ) )
					die( "طرح استفاده از سامانه « چل تیکه » برای شما فعال است. \n جهت تغییر طرح، از قسمت « طرح مشکل با پشتیبانی » از صفحه تنظیمات و با ارسال تیکت اقدام نمایید. \n پس از حذف طرح موجود در سبد خرید، برای ادامه روند خرید، مجددا تلاش فرمایید.");
				

				if( isset( $_SESSION['num-modules'] ) && !empty( $_SESSION['num-modules'] ) ){
					$nums = $_SESSION['num-modules'];
					for( $i = $nums; $i >= 1 ; $i-- ){
						if( num_objects( $site['DB_NAME'], 'modules', 'title= "'. $_SESSION['module'. $i. '-title']. '"' ) ){
							unset( $_SESSION['module'. $i. '-type'] );
							unset( $_SESSION['module'. $i. '-title'] );
							unset( $_SESSION['module'. $i. '-image'] );
							unset( $_SESSION['module'. $i. '-price'] );
							unset( $_SESSION['module'. $i. '-off'] );
							unset( $_SESSION['module'. $i. '-html'] );
							unset( $_SESSION['module'. $i. '-css'] );
							unset( $_SESSION['module'. $i. '-script'] );
							unset( $_SESSION['module'. $i. '-last-price'] );
							
							$nums--;
							for( $c = $i; $c <= $nums; $c++ ){
								$d = $c + 1;
								$_SESSION['module'. $c. '-type'] = $_SESSION['module'. $d. '-type'];
								$_SESSION['module'. $c. '-title'] = $_SESSION['module'. $d. '-title'];
								$_SESSION['module'. $c. '-image'] = $_SESSION['module'. $d. '-image'];
								$_SESSION['module'. $c. '-price'] = $_SESSION['module'. $d. '-price'];
								$_SESSION['module'. $c. '-off'] = $_SESSION['module'. $d. '-off'];
								$_SESSION['module'. $c. '-html'] = $_SESSION['module'. $d. '-html'];
								$_SESSION['module'. $c. '-css'] = $_SESSION['module'. $d. '-css'];
								$_SESSION['module'. $c. '-script'] = $_SESSION['module'. $d. '-script'];
								$_SESSION['module'. $c. '-last-price'] = $_SESSION['module'. $d. '-last-price'];
							}
						}
					}
					if( $nums != $_SESSION['num-modules'] )
						echo 'refresh-modules';
					$_SESSION['num_modules'] = $nums;
				}
				
				$_SESSION['accept'] = "true";
				
				break;

			case( 'payment' ):
				$user = db_single_read( DB_NAME, 'users', 'username = "'. $_SESSION['login_user']. '"' );
				$site_db = $user['site_id']. "_db";
				if( $user['password'] != md5( $_POST['pass']. "MaryamGhanbariRad" ) )
					die( "رمز عبور وارد شده نادرست است." );
				
				if( isset( $_SESSION['accept'] ) && isset( $_SESSION['final-price'] ) ){
					$last_transfer = num_objects( $site_db, 'balance', '' );
					$balance = db_single_read( $site_db, 'balance', 'id="'. $last_transfer. '"' );
					$credit = $balance['credit'];
					if( $credit < $_SESSION['final-last-price'] )
						die( "موجودی اعتبار شما کافی نیست. \n لطفا از قسمت « وضعیت مالی » اقدام به افزایش اعتبار خود نمایید." );
					
					if( isset( $_SESSION['plan-title'] ) && !empty( $_SESSION['plan-title'] ) ){
						$dayinc = substr( $_SESSION['plan-title'], 1, 2 ) * 30;
						$expire_date = date( 'Y-m-d', strtotime( "+". $dayinc. " days", strtotime( date('Y-m-d') ) ) );
						db_update( DB_NAME, 'sites', 'plan = "'. $_SESSION['plan-title']. '", upgrade_date = "'. date("Y-m-d"). '", expire_date = "'. $expire_date. '"', 'id="'. $user['site_id'].'"' );
						
						$credit -= $_SESSION['plan-last-price'];
						db_write( $site_db, 'balance', array(
							'columns'	=> 'id, transfer, credit, date, description',
							'values'	=> 'NULL, "-'. $_SESSION['plan-last-price']. '", "'. $credit. '", "'. date("Y-m-d H:i:s"). '", "فعال سازی طرح '. $_SESSION['plan-title']. '"',
						) );
						
						unset( $_SESSION['plan-title'] );
						unset( $_SESSION['plan-host'] );
						unset( $_SESSION['plan-bandwidth'] );
						unset( $_SESSION['plan-price'] );
						unset( $_SESSION['plan-off'] );
						unset( $_SESSION['plan-last-price'] );
						
					}
					
					if( isset( $_SESSION['num-modules'] ) && !empty( $_SESSION['num-modules'] ) ){
						$nums = $_SESSION['num-modules'];
						for( $c = 1; $c <= $_SESSION['num-modules']; $c++ ){
							db_write( $site_db, 'modules', array(
								'columns'	=> 'main_id, type, title, image, html, css, script',
								'values'	=> '"'. $_SESSION['module'. $c. '-id']. '", "'. $_SESSION['module'. $c. '-type']. '", "'. $_SESSION['module'. $c. '-title']. '", "'. $_SESSION['module'. $c. '-image']. '", "'. $_SESSION['module'. $c. '-html']. '", "'. $_SESSION['module'. $c. '-css']. '", "'. $_SESSION['module'. $c. '-script']. '"',
							) );

							$credit -= $_SESSION['module'. $c. '-last-price'];
							db_write( $site_db, 'balance', array(
								'columns'	=> 'transfer, credit, date, description',
								'values'	=> '"-'. $_SESSION['module'. $c. '-last-price']. '", "'. $credit. '", "'. date("Y-m-d H:i:s"). '", "خرید المان '. $_SESSION['module'. $c. '-title']. '"',
							) );
							
							unset( $_SESSION['module'. $c. '-type'] );
							unset( $_SESSION['module'. $c. '-title'] );
							unset( $_SESSION['module'. $c. '-image'] );
							unset( $_SESSION['module'. $c. '-price'] );
							unset( $_SESSION['module'. $c. '-off'] );
							unset( $_SESSION['module'. $c. '-html'] );
							unset( $_SESSION['module'. $c. '-css'] );
							unset( $_SESSION['module'. $c. '-script'] );
							unset( $_SESSION['module'. $c. '-last-price'] );
							
						}
						unset( $_SESSION['num-modules'] );
					}
				}
				
				unset( $_SESSION['accept'] );
				break;
		}