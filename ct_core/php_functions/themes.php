<?php
	/*
	Themes functions
	*/

	/* Find directory of selected theme */
	function get_selected_theme(){
		$data = db_single_read( DB_NAME, 'themes', 'active = "true"' );
		return $data['directory'];
	}
	
	/* Detect browser user agent */
	function get_user_agent(){
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$mozilla = strpos( $user_agent, 'Firefox' );
		$chrome = strpos( $user_agent, 'Chrome' );
		$safari = strpos( $user_agent, 'Safari' );
		if( $safari && !$chrome){
			return 'safari';
		}elseif( $chrome ){
			return 'chrome';
		}elseif( $mozilla ){
			return 'mozilla';
		}else{
			return 'ie';
		}
	}
	
	/* Detect active address */
	function get_page_address(){
		return substr( $_SERVER['PHP_SELF'], 1, strpos( substr( $_SERVER['PHP_SELF'], 1 ), '/' ) );
	}
	
	/* Get menu item data */
	function get_menu( $args = array() ){
		$defaults = array(
			'menu'				=> '',
			'container'			=> 'div',
			'container_class'	=> '',
			'container_id'		=> '',
			'menu_class'		=> '',
			'menu_id'			=> '',
			'items_class'		=> '',
			'items_wrap'		=> '<a class="%1$s" id="%2$s" href="%3$s"><img src="%4$s">%5$s</a>',
			'echo'				=> true,
		);
		
		$args = array_merge( $defaults, $args );

		/* Read and arrange the menu data */
		$items['nums'] = num_objects( DB_NAME, 'menus', 'menu = "'. $args['menu']. '"' );
		for( $c = 1; $c <= $items['nums']; $c++ ){
			$items[$c] = db_single_read( DB_NAME, 'menus', 'menu = "'. $args['menu']. '" AND position="'. $c. '"' );
		}
		
		if( $args['echo'] )
			$menu = create_menu( $items, $args );
			
		return $items;
	}	

	/* Create menu by $args data */
	function create_menu( $items = array(), $args = array() ){
		echo '<'. $args['container'];
		if( !empty( $args['container_class'] ) )
			echo ' class="'. $args['container_class']. '"';
		if( !empty( $args['container_id'] ) )
			echo ' id="'. $args['container_id']. '"';
		echo '>';
		
		echo '<menu';
		if( !empty( $args['menu_class'] ) )
			echo ' class="'. $args['menu_class']. '"';
		if( !empty( $args['menu_id'] ) )
			echo ' id="'. $args['menu_id']. '"';
		echo '>';
		
		for( $c = 1; $c <= $items['nums']; $c++ ){
			printf( $args['items_wrap'], $args['items_class'], $items[$c]['name'], $items[$c]['link'], $items[$c]['image'], $items[$c]['alternative'] );
		}
		
		echo '</menu>';
		echo '</'. $args['container']. '>';
		
		return;
	}

	/* Create the head file */
	function get_head(){
		echo '<meta lang="fa">';
		echo '<meta name="viewport">';
		echo '<meta http-equiv="content-type">';
		echo '<meta http-equiv="pragma" content="nocache">';
		echo '<meta content="text/html; charset=UTF-8; width=device-width;">';
		echo '<meta charset="UTF-8">';
		echo '<meta name="enamad" content="474806776"/>';
		
		// Load Cheltikkeh CSS file 
		$cheltikkeh_css_file = 'cheltikkeh.css';
		echo '<link rel="stylesheet" href="/'. $cheltikkeh_css_file. '">';
		
		// Load Page CSS file 
		echo '<link rel="stylesheet" href="/includes/themes/'. get_selected_theme(). '/includes/css/fonts.css">';
		$css_file = '/includes/themes/'. get_selected_theme(). '/includes/css/main.css';
		if( !empty( get_page_address() ) && 'pages' !== get_page_address() )
			$css_file = '/includes/themes/'. get_selected_theme(). '/includes/css/'. get_page_address(). '.css';
		echo '<link rel="stylesheet" href="'. $css_file. '">';
		
		if( file_exists( THEME_DIR. '/includes/css/pages.css' ) )
			echo '<link rel="stylesheet" href="/includes/themes/'. get_selected_theme(). '/includes/css/pages.css">';
		
		$jquery_source_file = '/ct_core/js_functions/source.js';
		echo '<script src="'. $jquery_source_file. '"></script>';
		
		$jquery_functions_file = '/ct_core/js_functions/functions.js';
		echo '<script src="'. $jquery_functions_file. '"></script>';
		
		$theme_functions_file = '/includes/themes/'. get_selected_theme(). '/includes/js/functions.js';
		echo '<script src="'. $theme_functions_file. '"></script>';
		
		echo '<title> چل تیکه، ارائه دهنده خدمات تارنما </title>';
		
		return;
	}

	/* Load page header */
	function get_header(){
		if( file_exists( THEME_DIR. '/header.php' ) ){
			require_once( THEME_DIR. '/header.php' );
		}
		
		return;
	}
	
	/* Load page footer */
	function get_footer(){
		if( file_exists( THEME_DIR. '/footer.php' ) ){
			require_once( THEME_DIR. '/footer.php' );
		}
		
		return;
	}
	
	/* Detect footer visibility */
	function footer_visible(){
		return false;
	}