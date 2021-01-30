<?php
	if( isset( $_POST['token'] ) ){
		define( 'HOST_NAME', 'localhost' );
		$connection = mysqli_connect( HOST_NAME, 'cheltikkeh', '$N0uR@ni66', 'cheltikkeh' );
		if( !$connection )
			die( "Can not connect to server!" );
		
		mysqli_query( $connection, 'SET CHARACTER SET utf8' );
		
		$query = mysqli_query( $connection, 'SELECT * FROM users WHERE site_id="'. base64_decode( $_POST['token'] ). '"' );
		if( !$query )
			die( "Could not read data from server!" );
		
		$user = mysqli_fetch_array( $query, MYSQL_ASSOC );
		
		$db_name = base64_decode( $_POST['token'] ). '_db';
		
		$connection = mysqli_connect( HOST_NAME, $user['username'], $user['password'], $db_name );
		if( !$connection )
			die( "Can not connect to server!" );
		
		mysqli_query( $connection, 'SET CHARACTER SET utf8' );
		
		$query = mysqli_query( $connection, 'INSERT INTO messages ( name, mail, message ) VALUES ( "'. $_POST['name']. '", "'. $_POST['mail']. '", "'. $_POST['message']. '" )' );
		if( !$query )
			die( "1Could not read data from server!" );
		
		echo 'پیام شما با موفقیت ثبت شد.';
	}