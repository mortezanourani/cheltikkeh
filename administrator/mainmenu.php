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
					menu_item_create( $_POST['title'], $_POST['link'] );
					break;
				case( "edit" ):
					menu_item_edit( $_POST['id'], $_POST['title'], $_POST['link'] );
					break;
				case( "delete" ):
					menu_item_delete( $_POST['id'] );
					break;
			}
		}else{
			
			require_once( THEME_DIR. "/administrator/mainmenu.php" );
		}
	}

		