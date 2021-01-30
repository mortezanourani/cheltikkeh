<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_SESSION['login_user'] ) ){
		if( isset( $_POST['operation'] ) ){
			switch( $_POST['operation'] ){
				case( "delete" ):
					message_delete( $_POST['id'] );
					break;
				case( "status" ):
					message_status_change( $_POST['id'], 'change' );
					break;
				case( "read" ):
					message_status_change( $_POST['id'], 'read' );
					break;
			}
		}else{

			require_once( THEME_DIR. "/administrator/messages.php" );
		}

	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}
