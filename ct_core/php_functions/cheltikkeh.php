<?php
	/*
	ChelTikkeh main functions
	*/

	/* Read site_db name */
	function get_site_db( $username ){
		$user = db_single_read( DB_NAME, 'users', 'username="'. $username. '"' );
		$site_db = array(
			'DB_NAME'	=> $user['site_id']. '_db',
			'USERNAME'	=> $user['username'],
			'PASSWORD'	=> $user['password'],
		);
		
		return $site_db;
	}
	
	/* Read list of notifications */
	function get_notifications( $username, $args ){
		$site_db = get_site_db( $username );
		$notifications = db_multi_read( $site_db['DB_NAME'], 'notifications', 'status="unseen"' );
		for( $c=1; $c <= $notifications['nums']; $c++ ){
			printf( $args['items_wrap'],
					$notifications[$c]['id'], $notifications[$c]['post'], $notifications[$c]['event'], $notifications[$c]['date'], $notifications[$c]['status'] );
		}
		return;
	}
	
	/* Read posts of site */
	function get_posts_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$posts = db_multi_read( $site_db['DB_NAME'], 'posts', $args['conditions'] );

		for( $c = $posts['nums']; $c >= 1; $c-- ){
			$checked[$c]['status'] = '';
			if( 'visible' === $posts[$c]['status'] )
				$checked[$c]['status'] = 'checked';
			
			$checked[$c]['commentable'] = '';
			if( 'true' === $posts[$c]['commentable'] )
				$checked[$c]['commentable'] = 'checked';
			
			if( $args['echo'] )
				printf( $args['items_wrap'],
						$posts[$c]['id'], $posts[$c]['auther'], $posts[$c]['title'], $posts[$c]['image'], str_replace("\n", '\n', $posts[$c]['content'] ), $posts[$c]['date'],
						$checked[$c]['status'], $checked[$c]['commentable'], $posts[$c]['category'], $posts[$c]['num_comments'] );
		}
		
		echo '<script>';
		for( $c = $posts['nums']; $c >= 1; $c-- ){
			if( $args['echo'] )
				printf( $args['scripts_wrap'],
						$posts[$c]['id'], $posts[$c]['auther'], $posts[$c]['title'], $posts[$c]['image'], str_replace("\n", '\n', $posts[$c]['content'] ), $posts[$c]['date'],
						$posts[$c]['status'], $posts[$c]['commentable'], $posts[$c]['category'], $posts[$c]['num_comments'] );
		}
		echo $args['scripts'];
		echo '</script>';

		return;
	}
	
	/* Write new post */
	function post_write( $title, $image, $content, $status, $commentable, $category ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$user = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user']. '"' );
		$post = db_write( $site_db['DB_NAME'], 'posts', array(
			'columns'	=> 'id, auther, modified, title, image, content, date, status, commentable, category, num_comments',
			'values'	=> 'NULL, "'. $user['id']. '", "'. date("Y-m-d"). '", "'. $title. '", "'. $image. '", "'. $content. '", "'. date("Y-m-d H:i:s"). '", "'. $status. '", "'. $commentable. '", "'. $category. '", "0"',
		) );
		return;
	}

	/* Edit a post by id */
	function post_edit( $id, $title, $image, $content, $status, $commentable, $category ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$post = db_update( $site_db['DB_NAME'], 'posts', 
				'title="'. $title. '", image="'. $image. '", content="'. $content. '", status="'. $status. '", commentable="'. $commentable. '", category="'. $category. '"',
				'id="'. $id. '"');
		return;
	}

	/* Change the visiblity of a post by id */
	function post_visibility_change( $post_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$post = db_single_read( $site_db['DB_NAME'], 'posts', 'id="'. $post_id. '"' );
		$status = 'visible';
		if( $status === $post['status'] )
			$status = 'invisible';
		db_update( $site_db['DB_NAME'], 'posts', 'status="'. $status. '"', 'id="'. $post_id. '"' );
		return;
	}

	/* Change the cammentable of a post by id */
	function post_commentability_change( $post_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$post = db_single_read( $site_db['DB_NAME'], 'posts', 'id="'. $post_id. '"' );
		$commentable = 'false';
		if( $commentable === $post['commentable'] )
			$commentable = 'true';
		db_update( $site_db['DB_NAME'], 'posts', 'commentable="'. $commentable. '"', 'id="'. $post_id. '"' );
		return;
	}

	/* Delete a post by id */
	function post_delete( $post_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_delete( $site_db['DB_NAME'], 'posts', 'id="'. $post_id. '"' );
		return;
	}

	/* Read categories of site */
	function get_categories_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$categories = db_multi_read( $site_db['DB_NAME'], 'categories', $args['conditions'] );

		for( $c = 1; $c <= $categories['nums']; $c++ ){
			if( $args['echo'] ){
				printf( $args['items_wrap'],
						$categories[$c]['id'], $categories[$c]['name'], $categories[$c]['link'], $categories[$c]['category_count'] );
				
				if( !empty( $args['scripts_wrap'] ) ){
					echo '<script>';
					printf( $args['scripts_wrap'],
							$categories[$c]['id'], $categories[$c]['name'], $categories[$c]['link'], $categories[$c]['category_count'] );
					echo '</script>';
				}
			}
		}
		
		if( !empty( $args['scripts'] ) )
			echo '<script>'. $args['scripts']. '</script>';

		return;
	}

	/* Create a category */
	function category_create( $category_name, $category_link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		if( num_objects( $site_db['DB_NAME'], 'pages', 'link="'. strtolower( $category_link ). '"' ) )
			die( 'شما قبلا صفحه ای با این آدرس ساخته اید. لطفا آدرس صفحه را اصلاح نمایید.' );
		if( num_objects( $site_db['DB_NAME'], 'categories', 'link="'. strtolower( $category_link ). '"' ) )
			die( 'شما قبلا یک دسته بندی با این آدرس ساخته اید. لطفا آدرس را اصلاح نمایید.' );
		db_write( $site_db['DB_NAME'], 'categories', array(
			'columns'	=> 'id, name, link, category_count',
			'values'	=> 'NULL, "'. $category_name. '", "'. strtolower( $category_link ). '", "0"',
		) );
		return;
	}

	/* Rename a category by id */
	function category_rename( $category_id, $category_name, $category_link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		
		if( num_objects( $site_db['DB_NAME'], 'pages', 'link="'. strtolower( $category_link ). '"' ) )
			die( 'شما قبلا صفحه ای با این آدرس ساخته اید. لطفا آدرس صفحه را اصلاح نمایید.' );
		
		$samelink = db_single_read( $site_db['DB_NAME'], 'categories', 'link="'. strtolower( $category_link ). '"' );
		if( !empty( $samelink['id'] ) && ( $samelink['id'] != $category_id ) )
			die( 'شما قبلا یک دسته بندی با این آدرس ساخته اید. لطفا آدرس را اصلاح نمایید.' );
		
		$current = db_single_read( $site_db['DB_NAME'], 'categories', 'id="'. $category_id. '"' );
		db_update( $site_db['DB_NAME'],
					'categories', 
					'name="'. $category_name. '", link="'. strtolower( $category_link ). '"',
					'id="'. $category_id. '"' );
		
		$dir_oldname = '../'. $_SESSION['login_user']. '/'. $current['link'];
		$dir_newname = '../'. $_SESSION['login_user']. '/'. strtolower( $category_link );
		if( is_dir( $dir_oldname ) ){
			rename( $dir_oldname, $dir_newname );
		}
		
		return;
	}

	/* Delete a category by id */
	function category_delete( $category_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$category = db_single_read( $site_db['DB_NAME'], 'categories', 'id="'. $category_id. '"' );
		$dir = "../". $site_db['USERNAME']. "/". $category['link'];
		if( $category_id != 1 ){
			if( is_dir( $dir ) ){
				if( file_exists( $dir. "/index.php" ) )
					unlink( $dir. "/index.php" );
				rmdir( $dir );
			}
			
			if( num_objects( $site_db['DB_NAME'], 'designs', 'type="category" AND id="'. $category_id. '"' ) > 0 )
				db_delete( $site_db['DB_NAME'], 'designs', 'type="category" AND id="'. $category_id. '"' );
			
			db_delete( $site_db['DB_NAME'], 'categories', 'id="'. $category_id. '"' );
		}

		return;
	}

	/* Read photos of gallery of site */
	function get_photos_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$photos = db_multi_read( $site_db['DB_NAME'], 'gallery', $args['conditions'] );

		for( $c = 1; $c <= $photos['nums']; $c++ ){
			if( $args['echo'] ){
				printf( $args['items_wrap'],
						$photos[$c]['id'], $photos[$c]['src'], $photos[$c]['title'], $photos[$c]['caption'], $photos[$c]['description'] );
				
				if( !empty( $args['scripts_wrap'] ) ){
					echo '<script>';
					printf( $args['scripts_wrap'],
							$photos[$c]['id'], $photos[$c]['src'], $photos[$c]['title'], $photos[$c]['caption'], $photos[$c]['description'] );
					echo '</script>';
				}
			}
		}
		
		if( !empty( $args['scripts'] ) )
			echo '<script>'. $args['scripts']. '</script>';

		return;
	}

	/* Upload a photo to gallery */
	function photo_upload( $title, $caption, $description, $file_ext ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_write( $site_db['DB_NAME'], 'gallery', array(
			'columns'	=> 'id, title, caption, description',
			'values'	=> 'NULL, "'. $title. '", "'. $caption. '", "'. $description. '"',
		) );
		
		$connection = connect( $site_db['DB_NAME'] );
		set_char( $connection );
		$query = mysqli_query( $connection, 'SELECT MAX(id) FROM gallery' );
		$photo = mysqli_fetch_row( $query );
		$id = $photo[0];
		
		db_update( $site_db['DB_NAME'], 'gallery', 'src="includes/images/'. $id. '.'. $file_ext. '"', 'id="'. $id. '"' );
		return $id;
	}

	/* Rename a photo of gallery by id */
	function photo_edit( $photo_id, $photo_title, $photo_caption, $photo_description ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_update( $site_db['DB_NAME'],
					'gallery', 
					'title="'. $photo_title. '", caption="'. $photo_caption. '", description="'. $photo_description. '"',
					'id="'. $photo_id. '"' );
		return;
	}

	/* Delete a photo of gallery by id */
	function photo_delete( $photo_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$photo = db_single_read( $site_db['DB_NAME'], 'gallery', 'id="'. $photo_id. '"' );
		unlink( '../'. $_SESSION['login_user']. $photo['src'] );
		db_delete( $site_db['DB_NAME'], 'gallery', 'id="'. $photo_id. '"' );
		return;
	}

	/* Read menu items of site */
	function get_menu_items_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$menuitems = db_multi_read( $site_db['DB_NAME'], 'menu', $args['conditions'] );

		for( $c = 1; $c <= $menuitems['nums']; $c++ ){
			if( $args['echo'] ){
				printf( $args['items_wrap'],
						$menuitems[$c]['id'], $menuitems[$c]['title'], $menuitems[$c]['link'] );
				
				if( !empty( $args['scripts_wrap'] ) ){
					echo '<script>';
					printf( $args['scripts_wrap'],
							$menuitems[$c]['id'], $menuitems[$c]['title'], $menuitems[$c]['link'] );
					echo '</script>';
				}
			}
		}
		
		if( !empty( $args['scripts'] ) )
			echo '<script>'. $args['scripts']. '</script>';

		return;
	}

	/* Create a menu item */
	function menu_item_create( $title, $link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_write( $site_db['DB_NAME'], 'menu', array(
			'columns'	=> 'id, title, link',
			'values'	=> 'NULL, "'. $title. '", "'. $link. '"',
		) );
		return;
	}

	/* Rename a menu item by id */
	function menu_item_edit( $id, $title, $link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_update( $site_db['DB_NAME'],
					'menu', 
					'title="'. $title. '", link="'. $link. '"',
					'id="'. $id. '"' );
		return;
	}

	/* Delete a menu item by id */
	function menu_item_delete( $id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		if( $id != 1 )
			db_delete( $site_db['DB_NAME'], 'menu', 'id="'. $id. '"' );
		return;
	}

	/* Read page types of site */
	function get_pages_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$pages = db_multi_read( $site_db['DB_NAME'], 'pages', $args['conditions'] );

		for( $c = 1; $c <= $pages['nums']; $c++ ){
			if( $args['echo'] ){
				printf( $args['items_wrap'],
						$pages[$c]['id'], $pages[$c]['name'], $pages[$c]['link'] );
				
				if( !empty( $args['scripts_wrap'] ) ){
					echo '<script>';
					printf( $args['scripts_wrap'],
							$pages[$c]['id'], $pages[$c]['name'], $pages[$c]['link'] );
					echo '</script>';
				}
			}
		}
		
		if( !empty( $args['scripts'] ) )
			echo '<script>'. $args['scripts']. '</script>';

		return;
	}

	/* Create a page type */
	function page_create( $page_name, $page_link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		if( num_objects( $site_db['DB_NAME'], 'pages', 'link="'. strtolower( $page_link ). '"' ) )
			die( 'شما قبلا صفحه ای با این آدرس ساخته اید. لطفا آدرس صفحه را اصلاح نمایید.' );
		if( num_objects( $site_db['DB_NAME'], 'categories', 'link="'. strtolower( $page_link ). '"' ) )
			die( 'شما قبلا یک دسته بندی با این آدرس ساخته اید. لطفا آدرس را اصلاح نمایید.' );
		db_write( $site_db['DB_NAME'], 'pages', array(
			'columns'	=> 'id, name, link',
			'values'	=> 'NULL, "'. $page_name. '", "'. strtolower( $page_link ). '"',
		) );
		return;
	}

	/* Rename a category by id */
	function page_rename( $page_id, $page_name, $page_link ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		
		if( num_objects( $site_db['DB_NAME'], 'categories', 'link="'. strtolower( $page_link ). '"' ) )
			die( 'شما قبلا یک دسته بندی با این آدرس ساخته اید. لطفا آدرس را اصلاح نمایید.' );
		
		$samelink = db_single_read( $site_db['DB_NAME'], 'pages', 'link="'. strtolower( $page_link ). '"' );
		if( !empty( $samelink['id'] ) && ( $samelink['id'] != $page_id ) )
			die( 'شما قبلا یک دسته بندی با این آدرس ساخته اید. لطفا آدرس را اصلاح نمایید.' );
		
		$current = db_single_read( $site_db['DB_NAME'], 'pages', 'id="'. $page_id. '"' );
		db_update( $site_db['DB_NAME'],
					'pages', 
					'name="'. $page_name. '", link="'. strtolower( $page_link ). '"',
					'id="'. $page_id. '"' );
					
		$dir_oldname = '../'. $_SESSION['login_user']. '/'. $current['link'];
		$dir_newname = '../'. $_SESSION['login_user']. '/'. strtolower( $page_link );
		if( is_dir( $dir_oldname ) ){
			rename( $dir_oldname, $dir_newname );
		}
		
		return;
	}

	/* Delete a page tpye by id */
	function page_delete( $page_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$page = db_single_read( $site_db['DB_NAME'], 'pages', 'id="'. $page_id. '"' );
		$dir = "../". $site_db['USERNAME']. "/". $page['link'];
		if( $page_id != 1 ){
			if( is_dir( $dir ) ){
				if( file_exists( $dir. "/index.php" ) )
					unlink( $dir. "/index.php" );
				rmdir( $dir );
			}
			
			if( num_objects( $site_db['DB_NAME'], 'designs', 'type="page" AND id="'. $page_id. '"' ) > 0 )
				db_delete( $site_db['DB_NAME'], 'designs', 'type="page" AND id="'. $page_id. '"' );
			
			db_delete( $site_db['DB_NAME'], 'pages', 'id="'. $page_id. '"' );
		}
		return;
	}

	/* Read messages of site */
	function get_messages_list( $args = array() ){
		$defaults = array(
			'conditions'	=> '',
			'items_wrap'	=> '',
			'scripts_wrap'	=> '',
			'scripts'		=> '',
			'echo'			=> true,
		);
		
		$args = array_merge( $defaults, $args );
		
		$site_db = get_site_db( $_SESSION['login_user'] );
		$messages = db_multi_read( $site_db['DB_NAME'], 'messages', $args['conditions'] );

		for( $c = $messages['nums']; $c >= 1; $c-- ){
			$checked[$c]['status'] = '';
			if( 'read' === $messages[$c]['status'] )
				$checked[$c]['status'] = 'checked';
			
			if( $args['echo'] )
				printf( $args['items_wrap'],
						$messages[$c]['id'], $messages[$c]['name'], $messages[$c]['mail'], str_replace("\n", '<br>', $messages[$c]['message'] ), $messages[$c]['date'], $checked[$c]['status'] );
		}
		
		echo '<script>';
		for( $c = $messages['nums']; $c >= 1; $c-- ){
			if( $args['echo'] )
				printf( $args['scripts_wrap'],
						$messages[$c]['id'], $messages[$c]['name'], $messages[$c]['mail'], str_replace("\n", '<br>', $messages[$c]['message'] ), $messages[$c]['date'], $checked[$c]['status'] );
		}
		echo $args['scripts'];
		echo '</script>';

		return;
	}
	
	/* Change the status of a message by id */
	function message_status_change( $message_id, $job ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$message = db_single_read( $site_db['DB_NAME'], 'messages', 'id="'. $message_id. '"' );
		$status = 'read';
		if( $job === 'change' && $status === $message['status'] )
			$status = 'unread';
		db_update( $site_db['DB_NAME'], 'messages', 'status="'. $status. '"', 'id="'. $message_id. '"' );
		return;
	}

	/* Delete a message by id */
	function message_delete( $message_id ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		db_delete( $site_db['DB_NAME'], 'messages', 'id="'. $message_id. '"' );
		return;
	}

	/* Get list of site modules */
	function get_modules_list( $type ){
		$site_db = get_site_db( $_SESSION['login_user'] );
		$modules = db_multi_read( $site_db['DB_NAME'], 'modules', 'type="'. $type. '"' );
		return $modules;
	}

