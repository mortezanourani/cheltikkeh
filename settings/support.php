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

	if( isset( $_POST['operation'] ) && $_POST['operation'] === 'ticket' ){
		db_write( DB_NAME, 'tickets', array(
			'columns'	=> 'id, username, firstname, lastname, phone, mobile, site_name, date, ticket, status',
			'values'	=> 'NULL, "'. $_SESSION['login_user']. '", "'. $account['firstname']. '", "'.
							$account['lastname']. '", "'. $account['phone']. '", "'. $account['mobile']. '", "'.
							$site['name']. '", "'. date("Y-m-d h:i:sa"). '", "'. $_POST['ticket']. '", "pending"',
		) );
		echo 'در اسرع وقت با شما تماس گرفته خواهد شد.';
	}else{
		
		require_once( THEME_DIR. '/settings/support.php' );
	}