<?php
	/*
	Welcome to ChelTikkeh (CT), the first modular site builder
	*/
	
	/* Define root address */
	define( 'ROOT', dirname( __FILE__ ) );

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
	if( isset( $_GET['token'] ) ){
		require_once( THEME_DIR. '/renew.php' );
	}else{
		require_once( THEME_DIR. '/index.php' );
	}

	if( empty( get_page_address() ) )
		echo '<img id="drftdrftsguinbpebrgw" style="cursor:pointer; position: fixed; left: 0px; bottom: 25px; z-index: 99999;" onclick="window.open(&quot;http://trustseal.enamad.ir/Verify.aspx?id=11026&amp;p=nbpdnbpddrfswkynhwmb&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)" alt="" src="http://trustseal.enamad.ir/logo.aspx?id=11026&amp;p=lznblznbgthvqesgkzoe">';
