<?php
	/* Load page header */
	echo get_header();
?>
	
	<div id="frmlogin">
		<div class="glass"></div>
		<div id="container">
			<div id="title">ورود به چل تیکه</div>
			<form id="login-form">
				<center>
				<div class="input ltr">
					<input type="text" class="ltr" id="username" placeholder="Username"><hr>
				</div>
				<div class="input ltr">
					<input type="password" class="ltr" id="password" placeholder="Password"><hr>
				</div>
				<input type="submit" value="ورود">
				</center>
			</form>
			<br>
			<button id="passreset" class="text" onclick="open_forget()">برای بازیابی رمز عبور کلیک کنید</button>
		</div>
	</div>
	
	<div class="loading">
	<div class="icon"></div>
	<div class="loading-icon"></div>
	</div>
	
	<div class="container">
		<div id="background-logo"></div>
		<div id="content">
		<?php
			if( isset( $_GET['token'] ) ){
				if( num_objects( DB_NAME, 'renew', 'token="'. $_GET['token']. '"' ) ){
					$ticket = db_single_read( DB_NAME, 'renew', 'token="'. $_GET['token']. '"' );
					$now = date("Y-m-d H:i:s");
					echo $ticket['creation']. "<BR>";
					echo $now;
				}
			}else{
				if( get_page_address() != "" ){
					switch( get_page_address() ){
						case( "administrator" ):
							require_once( THEME_DIR. '/administrator/posts.php' );
							break;
						case( "settings" ):
							require_once( THEME_DIR. '/settings/account.php' );
							break;
						case( "designer" ):
							require_once( THEME_DIR. '/designer/index.php' );
							break;
						case( "store" ):
							require_once( THEME_DIR. '/store/index.php' );
							break;
					}
				}else{
					require_once( THEME_DIR. '/pages/home.php' );
				}
			}
		?>
		</div>
	</div>

<?php
	/* Load page footer */
	echo get_footer();
?>
