<?php
	
	/* 
	Define all addresses in " includes " folder
	*/
	
	if( !defined( 'ROOT' ) )
		define( 'ROOT', dirname( __FILE__ ) );
	
	/* Define Core address */
	if( !defined( 'CORE' ) )
		define( 'CORE', ROOT. '/ct_core');
	
	/* Define includes address */
	if( !defined( 'INCLUDES' ) )
		define( 'INCLUDES', ROOT. '/includes');
	
	/* Define functions address */
	if( !defined( 'FUNCTIONS' ) )
		define( 'FUNCTIONS', INCLUDES. '/functions');

	/* Define themes address */
	if( !defined( 'THEMES' ) )
		define( 'THEMES', INCLUDES. '/themes');

	/* 
	MySQL settings - You can get this info from your web host
	*/
	
	/* The name of the database for ChelTikkeh */
	if( !defined( 'DB_NAME' ) )
		define('DB_NAME', '');

	/* MySQL database username */
	if( !defined( 'DB_USER' ) )
		define('DB_USER', '');

	/* MySQL database password */
	if( !defined( 'DB_PASS' ) )
		define('DB_PASS', '');

	/* MySQL hostname */
	if( !defined( 'DB_HOST' ) )
		define('DB_HOST', '127.0.0.1:3306');

	/* Database Charset to use in creating database tables */
	if( !defined( 'DB_CHARSET' ) )
		define('DB_CHARSET', 'utf8');

	/* The Database Collate type */
	if( !defined( 'DB_COLLATE' ) )
		define('DB_COLLATE', '');

	/* LOAD ChELTIKKEH CORE */
	/* Load functions */
	if( defined( 'CORE' ) && file_exists( CORE. '/php_functions/cheltikkeh.php' ) ){
		/* Call ChelTikkeh (CT) main functions */
		if( !function_exists( 'get_site_db' ) )
			require( CORE. '/php_functions/cheltikkeh.php' );
		
		/* Call database functions */
		if( !function_exists( 'connect' ) )
			require( CORE. '/php_functions/database.php' );

		/* Call themes functions */
		if( !function_exists( 'get_selected_theme' ) )
			require( CORE. '/php_functions/themes.php' );
		
		/* Call SESSION functions */
		if( !function_exists( 'is_online' ) )
			require( CORE. '/php_functions/session.php' );
		
	}
	
	/* Define selected theme address */
	if( !defined( 'THEME' ) )
		define( 'THEME', get_selected_theme() );

	/* Define theme directories */
	if( !defined( 'THEME_DIR' ) )
		define( 'THEME_DIR', THEMES. '/'. THEME );
	
	