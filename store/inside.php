<?php
	/*
	Welcome to ChelTikkeh (CT), the first modular site builder
	*/

	/* Define root address */
	define( 'ROOT', dirname( dirname( __FILE__ ) ) );

	/* Load initialization files and functions */
	if( file_exists( ROOT. '/initialize.php' ) ){
		require_once( ROOT. '/initialize.php' );
	}
	
	require_once( THEME_DIR. '/store/index.php' );
	