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
					category_create( $_POST['name'], $_POST['link'] );
					break;
				case( "rename" ):
					category_rename( $_POST['id'], $_POST['name'], $_POST['link'] );
					break;
				case( "delete" ):
					category_delete( $_POST['id'] );
					break;
			}
		}else{

			require_once( THEME_DIR. "/administrator/categories.php" );
		}
	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}

		