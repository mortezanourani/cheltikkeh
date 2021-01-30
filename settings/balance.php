<?php
	if( !isset( $_SESSION ) )
	session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_SESSION['login_user'] ) ){
		$account = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user'] . '"' );
	}

	if( isset( $_POST['operation'] ) && $_POST['operation'] === 'balance' ){
		if( md5( $_POST['password']. "MaryamGhanbariRad" ) === $account['password'] ){

			echo 'تغییرات با موفقیت اعمال شدند';
		}else{
			echo 'رمز عبور وارد شده صحیح نیست.';
		}
	}else{
		
		require_once( THEME_DIR. '/settings/balance.php' );
	}