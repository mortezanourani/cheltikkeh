<?php
	/*
	Welcome to ChelTikkeh kernel files
	*/
	
	/* Check user is online or not */
	function is_online(){
		if( isset($_SESSION['login_user'] ) )
			return true;
		return false;			
	}
	
	/* Check USERNAME and PASSWORD was gotten */
	function is_gotten( $args = array() ){
		$default = array(
			'USERNAME'	=> '',
			'PASSWORD'	=> '',
		);
		
		$args = array_merge( $default, $args );
		
		if( empty( $args['USERNAME'] ) )
			return false;
		
		if( empty( $args['PASSWORD'] ) )
			return false;
		
		return true;
	}
	
	/* Check USERNAME and PASSWORD are true or not */
	function is_true( $args = array() ){
		$default = array(
			'USERNAME'	=> '',
			'PASSWORD'	=> '',
		);
		
		$args = array_merge( $default, $args );
		
		$condition = 'username="'. $args['USERNAME']. '" AND password="'. $args['PASSWORD']. '"';
		return num_objects( DB_NAME, 'users', $condition );
	}
	
	/* Log out the loged in USER */
	function user_logout(){
		unset( $_SESSION['accept'] );
		unset( $_SESSION['login_user'] );
		session_destroy();
		return;		
	}

	/* Create a Captcha */
	function create_captcha(){
		ob_start();
		$image = imagecreatetruecolor(200, 50);

		$background_color = imagecolorallocate($image, rand(0, 128), rand(0, 128), rand(0, 128));  
		imagefilledrectangle($image, 0, 0, 200, 50,$background_color);

		$line_color = imagecolorallocate($image, 255, 255, 255); 
		for( $c = 0; $c < 4; $c++ ){
			imageline($image, 0, rand()%50, 200, rand()%50, $line_color);
			imageline($image, rand()%200, 0, rand()%200, 50, $line_color);
		}

		$pixel_color = imagecolorallocate($image, 255, 255, 255);
		for( $c = 0; $c < 1500; $c++ ){
			imagesetpixel($image, rand()%200, rand()%50, $pixel_color);
		}

		$letters = '1234567890';
		$len = strlen($letters);
		$letter = $letters[rand(0, $len-1)];
		$word = "";

		$text_color = imagecolorallocate($image, 255, 255, 255);
		
		if( !function_exists( 'get_selected_theme' ) )
			define( 'ROOT', dirname( dirname( dirname( __FILE__ ) ) ) );
		
		require_once( ROOT. '/initialize.php' );
		
		if( !defined( 'FONT' ) )
			define( 'FONT', ROOT. "/includes/themes/". get_selected_theme(). "/includes/fonts/captcha.ttf" );
		
		for( $i = 0; $i < 6; $i++ ){
			$letter = $letters[ rand(0, $len-1) ];
			imagettftext ( $image, 25, rand()%30, 15+($i*30), rand(30, 50), $text_color, FONT, $letter);
			$word .= $letter;
		}

		imagepng($image);
		
		$ImageData = ob_get_clean();

		imagedestroy($image);

		if( !isset( $_SESSION ) ){
			session_start();
		}
		$_SESSION['captcha'] = $word;
		$_SESSION['captcha_image'] = "<img src='data:image/png;base64," .base64_encode( $ImageData ) . "' />";

		return;
	}
