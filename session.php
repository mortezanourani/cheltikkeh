<?php
	/*
	SESSION functions that are necessary for log in form
	*/

	/* Load initialize functions file */
	define( 'ROOT', dirname( __FILE__ ) );
	require_once( ROOT. '/initialize.php');
	
	/* Start SESSION */
	session_start();
	
	/* If a user be online just a message sent and notify this */
	if( is_online() )
		die( $_SESSION['login_user']. ' is online!' );

	/* If there is no USERNAME or PASSWORD the page will be dead */
	if( !isset( $_POST['username'] ) || !isset( $_POST['password'] ) )
		die( 'You have no permission to enter this page!' );
	
	/* If USERNAME or PASSWORD field is empty there is a notification */
	if( !is_gotten( array(
		'USERNAME'	=> $_POST['username'],
		'PASSWORD'	=> $_POST['password'],
	) ) )
		die( 'Please fill all fields' );

	/* Find USERNAME and PASSWORD in database */
	if( !is_true( array(
		'USERNAME'	=> $_POST['username'],
		'PASSWORD'	=> md5( $_POST['password']. "MaryamGhanbariRad" ),
	) ) )
		die( 'نام کاربری یا رمز عبور نادرست است!' );
	
	/* Check Query Tables in database */
	$user = db_single_read( DB_NAME, 'users', 'username="'. $_POST['username']. '"' );
	$site_db = $user['site_id']. "_db";
	$queries = db_multi_read( DB_NAME, 'queries', '' );
	for( $c = 1; $c <= $queries['nums']; $c++ ){
		if( !table_exists( $site_db, $queries[$c]['table_name'] ) ){
			create_table( $site_db, $queries[$c]['table_name'], $queries[$c]['table_query'] );
			$query = db_single_read( DB_NAME, 'queries', 'table_name="'. $queries[$c]['table_name']. '"' );
			if( !empty( $query['columns'] ) ){
				db_write( $site_db, $queries[$c]['table_name'], array(
					'columns'	=> $queries[$c]['columns'],
					'values'	=> $queries[$c]['values'],
					)
				);
			}
		}
	}
	
	if( num_objects( $site_db, 'info', '1' ) <= 0 ){
		$site = db_single_read( DB_NAME, 'sites', 'id="'. $user['site_id']. '"' );
		db_write( $site_db, 'info', array(
			'columns'	=> 'user_id, firstname, lastname, email, phone, site_id, site_title, site_description',
			'values'	=> '"'. $user['id']. '", "'. $user['firstname']. '", "'. $user['lastname']. '", "'. $user['email']. '", "'. $user['phone']. '", "'. $site['id']. '", "'. $site['title']. '", "'. $site['description']. '"',
			)
		);
	}
	
	$_SESSION['login_user'] = $_POST['username'];
