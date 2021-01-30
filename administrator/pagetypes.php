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
				case( "create" ):
					page_create( $_POST['name'], $_POST['link'] );
					break;
				case( "rename" ):
					page_rename( $_POST['id'], $_POST['name'], $_POST['link'] );
					break;
				case( "delete" ):
					page_delete( $_POST['id'] );
					break;
			}
		}else{

			require_once( THEME_DIR. "/administrator/pagetypes.php" );
		}
	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}
		