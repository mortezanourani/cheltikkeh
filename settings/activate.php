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
		$site_db = $account['site_id']. '_db';
	}
		
	require_once( THEME_DIR. '/settings/activate.php' );
