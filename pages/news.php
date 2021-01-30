<?php
	/* Load initialize files */
	define( 'ROOT', dirname( dirname( __FILE__ ) ) );
	require_once( ROOT. '/initialize.php' );
	
	session_start();
	
	require_once( THEME_DIR. '/pages/news.php' );
