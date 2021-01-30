<?php
	/*
	Welcome to ChelTikkeh (CT) login page
	*/
	
	/* Define root folder address */
	define( 'ROOT', dirname( dirname( __FILE__ ) ) );
	
	/* Initialize ChelTikkeh (CT) kernel */
	require_once( ROOT. '/initialize.php' );
	
	/* Detect exist of login template in selected theme */
	require_once( THEME_DIR. '/pages/login.php' );
