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
				case( "edit" ):
					photo_edit( $_POST['id'], $_POST['title'], $_POST['caption'], $_POST['description'] );
					break;
				case( "delete" ):
					photo_delete( $_POST['id'] );
					break;
			}
		}else{

			require_once( THEME_DIR. "/administrator/gallery.php" );
		}

	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}
