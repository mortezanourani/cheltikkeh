<?php
	/*
	MySQL functions
	*/
	
	/* Connect to mysql server */
	function connect( $db_name ){
		$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASS, $db_name );
		if( !$connection ){
			die( "Can not connect to server!" );
		}else{
			return $connection;
		}
	}
	
	/* Close previusly opened connection on server */
	function disconnect( $connection ){
		mysqli_close( $connection );
		
		return;
	}
	
	/* Create a MySQL user */
	function create_user( $username, $password ){
		$connection = connect( DB_NAME );
		
		$sql = "CREATE USER '". $username. "'@'". DB_HOST. "' IDENTIFIED BY '". $password. "'";
		
		$query = mysqli_query( $connection, $sql );
		if( !$query )
			die( 'Could not Create User' );
		
		disconnect( $connection );
		return;
	}
	
	/* Change Password of MySQL user */
	function password_change( $username, $password ){
		$connection = connect( DB_NAME );
		
		$sql = "UPDATE mysql.user SET Password=PASSWORD('$password') WHERE User='$username' AND Host='". DB_HOST. "'";
		
		$query = mysqli_query( $connection, $sql );
		if( !$query )
			die( 'Could not Create User' );
		
		$sql = "FLUSH PRIVILEGES";
		
		$query = mysqli_query( $connection, $sql );
		if( !$query )
			die( 'Could not Create User' );
		
		disconnect( $connection );
		return;
	}
	
	/* Grant privileges for user */
	function grant_privileges( $db_name, $username, $privileges ){
		$connection = connect( DB_NAME );

		$sql = "GRANT ". $privileges. " PRIVILEGES ON ". $db_name. ".* TO '". $username. "'@'". DB_HOST. "' WITH GRANT OPTION";
		$query = mysqli_query( $connection, $sql );
		if( !$query )
			die( 'Could not grant privileges' );
		
		disconnect( $connection );
		
		return;
	}
	
	/* Create a MySQL database */
	function create_db( $db_name ){
		$connection = connect( DB_NAME );
		
		$sql = "CREATE DATABASE ". $db_name. " CHARACTER SET utf8 COLLATE utf8_bin";
		
		$query = mysqli_query( $connection, $sql );
		if( !$query )
			die( 'Could not Create Database' );

		disconnect( $connection );
		
		return;
	}
	
	/* Create a table on a database */
	function create_table( $db_name, $table_name, $columns ){
		$connection = connect( $db_name );
		
		$query = query( $connection, $table_name, $columns, 'CREATE' );
		if( !$query )
			die( 'Could not Create Table' );
		
		disconnect( $connection );
		
		return;
	}

	/* Set character query */
	function set_char( $connection ){
		mysqli_query( $connection, 'SET CHARACTER SET '. DB_CHARSET );
		
		return;
	}
	
	/* Run query */
	function query( $connection, $table_name, $conditions, $type ){
		if( empty( $conditions ) )
			$conditions = 1;
		switch( $type ){
			case( 'SELECT' ):
				$query = mysqli_query( $connection, 'SELECT * FROM '. $table_name. ' WHERE '. $conditions );
				break;
			case( 'INSERT' ):
				$query = mysqli_query( $connection, 'INSERT INTO '. $table_name. ' '. $conditions );
				break;
			case( 'CREATE' ):
				$query = mysqli_query( $connection, 'CREATE TABLE '. $table_name. ' ( '. $conditions. ' )' );
				break;
			case( 'DELETE' ):
				$query = mysqli_query( $connection, 'DELETE FROM '. $table_name. ' WHERE '. $conditions );
				break;
			case( 'UPDATE' ):
				$query = mysqli_query( $connection, 'UPDATE '. $table_name. ' SET '. $conditions );
				break;
			case( 'SHOW' ):
				$query = mysqli_query( $connection, 'SHOW TABLES LIKE "'. $table_name. '"' );
				break;
		}
		if( !$query ){
			die( "Could not read data from server!" );
		}else{
			return $query;
		}		
	}
	
	/* Fetch array */
	function fetch( $query ){
		return mysqli_fetch_array( $query, MYSQLI_ASSOC );
	}
	
	/* Read data from a table in database */
	function db_single_read( $db_name, $table_name, $conditions ){
		$connection = connect( $db_name );
		
		set_char( $connection );
		
		$query = query( $connection, $table_name, $conditions, 'SELECT' );

		$object = fetch( $query );
		
		disconnect( $connection );
		
		return $object;
	}

	function db_multi_read( $db_name, $table_name, $conditions ){
		$connection = connect( $db_name );
		
		set_char( $connection );
		
		$query = query( $connection, $table_name, $conditions, 'SELECT' );
		
		$object['nums'] = mysqli_num_rows( $query );
		
		for ( $c = 1; $c <= $object['nums']; $c++ ){
			$object[$c] = fetch( $query );
		}

		disconnect( $connection );

		return $object;
	}
	
	/* Write data on a table in database */
	function db_write( $db_name, $table_name, $args = array() ){
		$connection = connect( $db_name );
		
		set_char( $connection );
		
		$values = "( ". $args['columns']. " ) VALUES ( ". $args['values']. " )";
		$query = query( $connection, $table_name, $values, 'INSERT' );

		disconnect( $connection );

		return;
	}
	
	/* Update data on a table in database */
	function db_update( $db_name, $table_name, $new_values, $conditions ){
		$connection = connect( $db_name );
		
		set_char( $connection );
		
		$values = $new_values. ' WHERE '. $conditions;
		$query = query( $connection, $table_name, $values, 'UPDATE' );

		disconnect( $connection );

		return;
	}
	
	/* Delete data on a table in database */
	function db_delete( $db_name, $table_name, $conditions ){
		$connection = connect( $db_name );
		
		$query = query( $connection, $table_name, $conditions, 'DELETE' );
		
		disconnect( $connection );
		
		return;
	}

	/* Get the number of rows in a table */
	function num_objects( $db_name, $table_name, $conditions ){
		$connection = connect( $db_name );
		
		$query = query( $connection, $table_name, $conditions, 'SELECT' );
		
		$nums = mysqli_num_rows( $query );

		disconnect( $connection );
		
		return $nums;
	}
	
	/* Find a several table is exist in database */
	function table_exists( $db_name, $table_name ){
		$connection = connect( $db_name );
		
		$query = query( $connection, $table_name, '', 'SHOW' );

		$exists = mysqli_num_rows( $query );

		disconnect( $connection );
		
		return $exists;
	}
	
/* ------------------------------------------------------------------------------------------------------------------------------------- */
	