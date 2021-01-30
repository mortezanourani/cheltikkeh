<?php
	/* Load initialize files */
	define( 'ROOT', dirname( dirname( __FILE__ ) ) );
	require_once( ROOT. '/initialize.php' );
	
	session_start();

	if( isset( $_POST['name'] ) && isset( $_POST['mail'] ) && isset( $_POST['message'] ) ){
		db_write( DB_NAME, 'messages', array(
			'columns'	=> 'id, name, mail, message, date, status',
			'values'	=> 'NULL, "'. $_POST['name']. '", "'. $_POST['mail']. '", "'. $_POST['message']. '", "'. date("Y-m-d H:i:s"). '", "pending"',
		) );
	}else{
		require_once( THEME_DIR. '/pages/contact.php' );
	}