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

	if( isset( $_POST['operation'] ) && $_POST['operation'] === 'siteconfig' ){
		if( md5( $_POST['password']. "MaryamGhanbariRad" ) === $account['password'] ){
			db_update( DB_NAME, 'sites', 'title="'. $_POST['title']. '", description="'. $_POST['description']. '"', 'id="'. $account['site_id']. '"' );
			db_update( $account['site_id']. '_db', 'info', 'site_title="'. $_POST['title']. '", site_description="'. $_POST['description']. '"', 'site_id="'. $account['site_id']. '"' );
			echo 'تغییرات با موفقیت اعمال شدند';
		}else{
			echo 'رمز عبور وارد شده صحیح نیست.';
		}
	}else{
		
		require_once( THEME_DIR. '/settings/siteconfig.php' );
	}