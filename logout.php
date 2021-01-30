<?php
	/*
	Log out functions
	*/

	/* Load initialize functions file */
	define( 'ROOT', dirname( __FILE__ ) );
	require_once( ROOT. '/initialize.php');
	
	/* Start SESSION */
	session_start();
	
	if( is_online() ){
		/* If a user be online log out this user */
		user_logout();
	}else{
		/* If there is no loged user in just notify this */
		echo 'There is no user that log in';
	}
	

