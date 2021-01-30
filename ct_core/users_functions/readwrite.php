<?php
	if( !function_exists( 'db_multi_read' ) )
		require_once( '../php_functions/database.php' );
	
	function read_post( $post_wrap, $post_id ){
		if( $post_id === 0 ){
			$post = db_multi_read( )
			for( $c = 1; $c <= $posts['nums']; $c++ ){
				if( $post['status'] === "visible" )
					printf( $post_wrap, $post[$c]['id'], $post[$c]['title'], $post[$c]['image'], str_replace( "\n", "<br>", $post[$c]['content'] ), $post[$c]['date'] );
			}
		}else{
			printf( $post_wrap, $post['id'], $post['title'], $post['image'], str_replace( "\n", "<br>", $post['content'] ), $post['date'] );
		}
		
		return;
	}