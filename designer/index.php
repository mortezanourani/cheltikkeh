<?php
	/*
	Welcome to ChelTikkeh (CT), the first modular site builder
	*/
	
	/* Define root address */
	define( 'ROOT', dirname( dirname( __FILE__ ) ) );

	/*
	Initialize ChelTikkeh (CT) kernel
	*/
	
	/* Load initialization files and functions */
	if( file_exists( ROOT. '/initialize.php' ) ){
		require_once( ROOT. '/initialize.php' );
	}
	
	/*
	Load ChelTikkeh (CT)
	*/
	if( file_exists( THEME_DIR. '/designer.php' ) ){
		require_once( THEME_DIR. '/designer.php' );
	}else{
		require_once( THEME_DIR. '/index.php' );
	}
	