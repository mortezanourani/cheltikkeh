<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_SESSION['login_user'] ) ){
		$account = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user']. '"' );
	}
	
	if( isset( $_POST['operation'] ) && $_POST['operation'] === 'account' ){
		if( md5( $_POST['password']. "MaryamGhanbariRad" ) === $account['password'] ){
			db_update( DB_NAME, 'users', 'firstname="'. $_POST['firstname']. '", lastname="'. $_POST['lastname']. '", email="'. $_POST['email']. '", phone="'. $_POST['phone']. '", mobile="'. $_POST['mobile']. '"', 'username="'. $_SESSION['login_user']. '"' );
			db_update( $account['site_id']. '_db', 'info', 'firstname="'. $_POST['firstname']. '", lastname="'. $_POST['lastname']. '", email="'. $_POST['email']. '", phone="'. $_POST['phone']. '"', 'site_id="'. $account['site_id']. '"' );
			echo 'تغییرات با موفقیت اعمال شدند';
		}else{
			echo 'رمز عبور وارد شده صحیح نیست.';
		}
	}else{
		
		require_once( THEME_DIR. '/settings/account.php' );
	}