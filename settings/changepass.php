<?php
	if( !isset( $_SESSION ) )
	session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_SESSION['login_user'] ) ){
		$account = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user'] . '"' );
		$site = db_single_read( DB_NAME, 'sites', 'id="'. $account['site_id']. '"' );
	}

	if( isset( $_POST['operation'] ) ){
		switch( $_POST['operation'] ){
			case( 'changepass' ):
				if( md5( $_POST['password']. "MaryamGhanbariRad" ) === $account['password'] ){
					db_update( DB_NAME, 'users', 'password="'. md5( $_POST['newpassword']. "MaryamGhanbariRad" ). '"', 'username="'. $_SESSION['login_user']. '"' );
					password_change( $_SESSION['login_user'], md5( $_POST['newpassword']. "MaryamGhanbariRad" ) );
					echo 'تغییرات با موفقیت اعمال شدند';
				}else{
					echo 'رمز عبور وارد شده صحیح نیست.';
				}
				break;
				
			case( 'renewpass' ):
				db_update( DB_NAME, 'users', 'password="'. md5( $_POST['newpassword']. "MaryamGhanbariRad" ). '"', 'email="'. $_POST['email']. '"' );
				db_update( DB_NAME, 'renew', 'active="false"', 'email="'. $_POST['email']. '"' );
				break;
		}
	}else{
		
		require_once( THEME_DIR. '/settings/changepass.php' );
	}