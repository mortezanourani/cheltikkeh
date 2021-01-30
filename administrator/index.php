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
	if( file_exists( THEME_DIR. '/administrator.php' ) ){
		require_once( THEME_DIR. '/administrator.php' );
	}else{
		require_once( THEME_DIR. '/index.php' );
	}
	
	
	if(isset($_FILES['image'])){
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];   
		$file_ext_tmp = explode( '.', $_FILES['image']['name'] );
		$file_ext = strtolower( end( $file_ext_tmp ) );
		
		$expensions= array( "jpeg", "jpg", "png", "" ); 		
		if( in_array( $file_ext, $expensions ) === false )
			$errors[] = "نوع فایل مجاز نمی باشد. فایل های jpg و png مجاز می باشند.";
		if( $file_size > 1048576 )
			$errors[] = 'حجم فایل مورد نظر نمی تواند از 1MB بیشتر باشد.';
		if( empty( $errors ) ){
			$id = photo_upload( $_POST['title'], $_POST['caption'], $_POST['description'], $file_ext );
			move_uploaded_file($file_tmp, "../". $_SESSION['login_user']. "/includes/images/".$file_name);
			$folder = "../". $_SESSION['login_user']. "/includes/images/";
			rename( $folder. $file_name, $folder. $id. ".". $file_ext );
			echo '<script>';
			echo '$("#administrator-menu button").attr("disabled", false);';
			echo '$("#administrator-menu #btngallery").attr("disabled", true);';
			echo '$.post( "/administrator/gallery.php" )';
			echo '.done( function( result ){';
			echo '$("#content").html( result );';
			echo '});';
			echo '$("#gallery-menu #btnlist").css({"display": "none"});';
			echo '$("#gallery-menu #btnadd").css({"display": "initial"});';
			echo '$("#gallery-menu #btndelete").css({"display": "initial"});';
			echo '</script>';
		}else{
			print_r($errors);
		}
	}
	