<?php
	if( !isset( $_SESSION['captcha'] ) )
		session_start();
	
	if( !function_exists( 'create_captcha' ) )
		require_once( "/ct_core/php_functions/session.php" );
	
	if( isset( $_POST['captcha'] ) ){
		if( $_POST['captcha'] != $_SESSION['captcha'] )
			die( 'لطفا در وارد کردن اعداد تصویر دقت فرمایید' );
		unset( $_SESSION['captcha'] );
		unset( $_SESSION['captcha-image'] );
	}else{
		create_captcha();
		echo $_SESSION['captcha_image'];
	}