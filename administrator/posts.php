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
				case( "write" ):
					post_write( $_POST['title'], $_POST['image'], $_POST['content'], $_POST['status'], $_POST['commentable'], $_POST['category'] );
					break;
				case( "edit" ):
					post_edit( $_POST['id'], $_POST['title'], $_POST['image'], $_POST['content'], $_POST['status'], $_POST['commentable'], $_POST['category'] );
					break;
				case( "delete" ):
					post_delete( $_POST['id'] );
					break;
				case( "visibility" ):
					post_visibility_change( $_POST['id'] );
					break;
				case( "commentability" ):
					post_commentability_change( $_POST['id'] );
					break;
			}
		}else{

			require_once( THEME_DIR. "/administrator/posts.php" );
		}

	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}
