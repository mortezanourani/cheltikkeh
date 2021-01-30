<?php

	/* Load functions files */
	define( 'ROOT', dirname( __FILE__ ) );
	require_once( ROOT. '/initialize.php' );
	
	/* Check there is all necessary data */
	if( 
		isset( $_POST['firstname'] ) &&
		isset( $_POST['lastname'] ) &&
		isset( $_POST['email'] ) &&
		isset( $_POST['phone'] ) &&
		isset( $_POST['mobile'] ) &&
		isset( $_POST['username'] ) &&
		isset( $_POST['password'] ) &&
		isset( $_POST['sitename'] ) &&
		isset( $_POST['sitetitle'] ) &&
		isset( $_POST['description'] )
	){
		
		/* Die if user has one account in ChelTikkeh */
		if( num_objects( DB_NAME, 'users', 'firstname="'. $_POST['firstname']. '" AND lastname="'. $_POST['lastname']. '"' ) )
			die( $_POST['firstname']. ' '. $_POST['lastname']. ' ، شما یک حساب کاربری در «چل تیکه» دارید. \nلطفا از همان حساب کاربری استفاده نمایید.' );
		
		if( num_objects( DB_NAME, 'users', 'email="'. $_POST['email']. '"' ) )
			die( "این آدرس ایمیل یک حساب کاربری در «چل تیکه» دارد. \nاگر این آدرس ایمیل متعلق به شماست می توانید برای بازیابی رمز عبور خود با پشتیبانی تماس بگیری." );
			
		if( num_objects( DB_NAME, 'users', 'username="'. $_POST['username']. '"' ) )
			die( "این نام کاربری قبلا به ثبت رسیده است. \nلطفا نام کاربری دیگری انتخاب نمایید." );
			
		if( num_objects( DB_NAME, 'sites', 'name="'. $_POST['sitename']. '"' ) )
			die( "این آدرس سایت قبلا ثبت شده است.\nتوجه داشته باشید که این آدرس تنها برای زیر صفحه ی شما در «چل تیکه» مورد استفاده قرار می گیرد. \nاین آدرس در هیچ کجای سایت شما دیده نخواهد شد." );
		
		/* Write site data on sites table in ChelTikkeh (CT) database */
		$expire_date = date( 'Y-m-d', strtotime( "+15 days", strtotime( date('Y-m-d') ) ) );
		db_write( DB_NAME, 'sites', array(
			'columns'	=> 'name, title, expire_date, description',
			'values'	=> '"'. $_POST['sitename']. '", "'. $_POST['sitetitle']. '", "'. $expire_date. '", "'. $_POST['description']. '"',
		) );
		
		/* Read site id to write it on users table in ChelTikkeh (CT) database */
		$site = db_single_read( DB_NAME, 'sites', 'name="'. $_POST['sitename']. '"');
		
		/* Write user data on users table in ChelTikkeh (CT) database */
		db_write( DB_NAME, 'users', array(
			'columns'	=> 'firstname, lastname, email, phone, mobile, username, password, site_id',
			'values'	=> '"'. $_POST['firstname']. '", "'. $_POST['lastname']. '", "'
							. $_POST['email']. '", "'. $_POST['phone']. '", "'. $_POST['mobile']. '", "'
							. $_POST['username']. '", "'. md5( $_POST['password']. "MaryamGhanbariRad" ). '", "'. $site['id']. '"',
			)
		);
		
		/* Read user id to write it on info table in SITE database */
		$user = db_single_read( DB_NAME, 'users', 'username="'. $_POST['username']. '"'); 
		
		/* Create Site database by user identification */
		$site_db = $site['id']. '_db';
		create_db( $site_db );
		
		/* Create MySQL user that can control Site database */
		create_user( $_POST['username'], md5( $_POST['password']. "MaryamGhanbariRad" ) );
		
		/* Grant privileges for user to access its database */
		grant_privileges( $site_db, $_POST['username'], 'ALL' );
		
		/* Create Folders And Copy Essential Files */
		$temp_dir = "includes/template/";
		$user_dir = $_POST['username']. "/";
		
		if( !empty( $_POST['username'] ) ){
			
			if( !is_dir( $user_dir ) ){
				mkdir( $user_dir );
			}
			
			$temp = db_multi_read( DB_NAME, 'temps', 'type="dir"' );
			for( $c = 1; $c <= $temp['nums']; $c++ ){
				$dir = $user_dir. $temp[$c]['address']. $temp[$c]['name'];
				if( !is_dir( $dir ) )
					mkdir( $dir );
			}
			
			$temp = db_multi_read( DB_NAME, 'temps', 'type="file"' );
			for( $c = 1; $c <= $temp['nums']; $c++ ){
				$temp_file = $temp_dir. $temp[$c]['address']. $temp[$c]['name'];
				$user_file = $user_dir. $temp[$c]['address']. $temp[$c]['name'];
				if( !file_exists( $user_file ) )
					copy( $temp_file, $user_file );
			}
			
			copy( $temp_dir. 'index.php', $user_dir. 'index.php' );
			
		}
		
	}else{
		
		require_once( THEME_DIR. '/signup.php' );
		
	}
