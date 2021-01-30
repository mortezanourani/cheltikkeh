<?php
	session_start();
	if( 'store' != get_page_address() )
		if( !empty( get_page_address() ) && !isset( $_SESSION['login_user'] ) ){
			header("location: /");
		}
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
		get_head();
		echo '<script> address = "'. get_page_address(). '"; </script>';
	?>
	</head>
	<body>
		<header class="main-header">
		<?php if( empty( get_page_address() ) ): ?>
			<button class="icon" id="btnhome" title="چل تیکه"></button>
			<br>
			<menu class="main-menu">
				<button class="icon" id="btnlogin" title="ورود"></button>
				<div id="login">
					<button class="icon" id="btnsignup" title="ثبت نام"></button>
				</div>
				<button class="icon" id="btnfactor" title="سبد خرید"<?php if( isset( $_SESSION['plan-title'] ) || isset( $_SESSION['num-modules'] ) ){ echo ' status="full"'; }else{ echo ' status="empty"'; } ?>></button>
				<div id="store">
					<button class="icon" id="btntariff" title="طرح ها"></button>
					<button class="icon" id="btnstore" title="المان ها"></button>
				</div>
				<button class="icon" id="btntemplates" title="قالب ها"></button>
				<button class="icon" id="btnfaq" title="سوالات متداول"></button>
				<button class="icon" id="btnlaws" title="قوانین"></button>
				<button class="icon" id="btnlearning" title="آموزش"></button>
				<button class="icon" id="btnblog" title="بلاگ"></button>
				<button class="icon" id="btnabout" title="درباره ما"></button>
				<button class="icon" id="btncontact" title="ارتباط با ما"></button>
				
		<?php endif; ?>
		<?php
			if( get_user_agent() != 'ie' )
			get_menu( array(
				'menu'				=> get_page_address(). '/',
				'menu_class'		=> 'main-menu',
				'items_class'		=> 'icon',
				'items_wrap'		=> '<button class="%1$s" id="btn%2$s" title="%5$s"></button>'
			) );
		?>
		<?php if( 'store' === get_page_address() ): ?>
			<div id="login">
				<button class="icon" id="btnsignup" title="ثبت نام"></button>
			</div>
			<button class="icon" id="btnfactor" title="سبد خرید"<?php if( isset( $_SESSION['plan-title'] ) || isset( $_SESSION['num-modules'] ) ){ echo ' status="full"'; }else{ echo ' status="empty"'; } ?>></button>
			<div id="store">
				<button class="icon" id="btntariff" title="طرح ها"></button>
				<button class="icon" id="btnstore" title="المان ها"></button>
			</div>
		<?php endif; ?>
		<div class="user-menu" id="user-menu">
		<?php
			/* Read Profile menu items */
			get_menu( array(
				'menu'				=> 'profile',
				'menu_class'		=> 'profile',
				'menu_id'			=> 'profile-menu',
				'items_class'		=> 'icon',
				'items_wrap'		=> '<button class="%1$s" id="btn%2$s" title="%5$s"></button>'
			) );
			
			if( is_online() ){
				echo '<script> $("#profile-menu").css({"display": "initial"}); </script>';
			}else{
				echo '<script> $("#profile-menu").css({"display": "none"}); </script>';
			}
		?>
		</div>
		
		<?php if( !empty( get_page_address() ) && 'administrator' === get_page_address() ): // Check page is administrator or not ?>
		<div class="notifications-menu" id="notifications-menu">
			<menu class="notifications">
				<?php
					get_notifications( $_SESSION['login_user'], array(
						'items_wrap'	=> '<button class="notification-item" type="%3$s">%2$s</button>',
					) );
				?>
			</menu>
		</div>
		<?php endif; ?>
		
		<?php if( !empty( get_page_address() ) && 'designer' === get_page_address() ): // Check page is designer or not ?>
		<div class="pages-menu" id="pages-menu">
			<menu class="items-list">
				<div class="container">
					<?php
						echo get_pages_list( array(
							'items_wrap'	=> '<button class="text" type="page" id="%1$s">%2$s</button><br>',
						) );
						echo '<hr>';
						echo get_categories_list( array(
							'items_wrap'	=> '<button class="text" type="category" id="%1$s">%2$s</button>',
						) );
					?>
				</div>
			</menu>
		</div>
		
		<div class="modules-menu" id="modules-menu">
			<?php
				get_menu( array(
					'menu'				=> 'modules',
					'menu_class'		=> 'module-categories-menu',
					'items_class'		=> 'icon',
					'items_wrap'		=> '<button class="%1$s" id="btn%2$s" title="%5$s"></button>',
				) );
			?>
			<menu class="items-list" id="headers">
				<div class="container">
					<?php
						$headers = get_modules_list( 'header' );
						if( $headers['nums'] > 0 )
							for( $c=1; $c<=$headers['nums']; $c++ )
								echo '<img src="/includes/images/modules/'. $headers[$c]['image']. '" ondragstart="drag(event, '. $headers[$c]['id']. ')"><hr>';
					?>
					<a href="/store"><img src="/includes/images/modules/store.png"></a>
				</div>
			</menu>
			<menu class="items-list" id="contents" hidden>
				<div class="container">
					<?php
						$contents = get_modules_list( 'content' );
						if( $contents['nums'] > 0 )
							for( $c=1; $c<=$contents['nums']; $c++ )
								echo '<img src="/includes/images/modules/'. $contents[$c]['image']. '" ondragstart="drag(event, '. $contents[$c]['id']. ')"><hr>';
					?>
					<a href="/store"><img src="/includes/images/modules/store.png"></a>
				</div>
			</menu>
			<menu class="items-list" id="footers" hidden>
				<div class="container">
					<?php
						$footers = get_modules_list( 'footer' );
						if( $footers['nums'] > 0 )
							for( $c=1; $c<=$footers['nums']; $c++ )
								echo '<img src="/includes/images/modules/'. $footers[$c]['image']. '" ondragstart="drag(event, '. $footers[$c]['id']. ')"><hr>';
					?>
					<a href="/store"><img src="/includes/images/modules/store.png"></a>
				</div>
			</menu>
			<menu class="items-list" id="floats" hidden>
				<div class="container">
					<?php
						$floats = get_modules_list( 'float' );
						if( $floats['nums'] > 0 )
							for( $c=1; $c<=$floats['nums']; $c++ )
								echo '<img src="/includes/images/modules/'. $floats[$c]['image']. '" ondragstart="drag(event, '. $floats[$c]['id']. ')"><hr>';
					?>
					<a href="/store"><img src="/includes/images/modules/store.png"></a>
				</div>
			</menu>
			<menu class="items-list" id="plugins" hidden>
				<div class="container">
					<?php
						$plugins = get_modules_list( 'plugin' );
						if( $plugins['nums'] > 0 )
							for( $c=1; $c<=$plugins['nums']; $c++ )
								echo '<img src="/includes/images/modules/'. $plugins[$c]['image']. '" ondragstart="drag(event, '. $plugins[$c]['id']. ')"><hr>';
					?>
					<a href="/store"><img src="/includes/images/modules/store.png"></a>
				</div>
			</menu>
		</div>
		<?php endif; ?>
		
		<?php
			if( !empty( get_page_address() ) )
				switch ( get_page_address() ){
					case ( 'administrator' ):
						get_menu( array(
							'menu'				=> 'posts',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'posts-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>',
						) );
						
						get_menu( array(
							'menu'				=> 'categories',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'categories-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>'
						) );
						
						get_menu( array(
							'menu'				=> 'gallery',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'gallery-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>'
						) );
						
						get_menu( array(
							'menu'				=> 'mainmenu',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'mainmenu-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>'
						) );
						
						get_menu( array(
							'menu'				=> 'pagetypes',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'pagetypes-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>'
						) );
						
						get_menu( array(
							'menu'				=> 'messages',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'messages-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s"></button>'
						) );
						
						break;
						
					case( 'designer' ):
						get_menu( array(
							'menu'				=> 'designer',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'designer-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s" title="%5$s"></button>',
						) );
						
						break;
						
					case( 'store' ):
						get_menu( array(
							'menu'				=> 'store',
							'menu_class'		=> 'sub-menu',
							'menu_id'			=> 'store-menu',
							'items_class'		=> 'icon',
							'items_wrap'		=> '<button class="%1$s" id="btn%2$s" title="%5$s"></button>',
						) );
						
						break;
				}
		?>
		</header>
		
		<?php if( !empty( get_page_address() ) && 'designer' === get_page_address() ): ?>
			<div id="settings-form-glass">
				<div id="settings-form">
					<div id="title">تنظیمات المان</div>
					<div id="container">
					<center>
						<div id="text" class="control">
							<table>
								<tr>
									<td class="title">
										متن:
									</td>
									<td class="text">
										<div class="input"><input type="text" id="txttext"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="width" class="control">
							<table>
								<tr>
									<td class="title">
										عرض:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txtwidth"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="height" class="control">
							<table>
								<tr>
									<td class="title">
										ارتفاع:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txtheight"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="top" class="control">
							<table>
								<tr>
									<td class="title">
										فاصله از بالا:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txttop"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="right" class="control">
							<table>
								<tr>
									<td class="title">
										فاصله از راست:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txtright"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="bottom" class="control">
							<table>
								<tr>
									<td class="title">
										فاصله از پایین:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txtbottom"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="left" class="control">
							<table>
								<tr>
									<td class="title">
										فاصله از چپ:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" class="control" id="txtleft"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="vposition" class="control">
							<table>
								<tr>
									<td class="title">
										موقعیت عمودی:
									</td>
									<td width="30px">
										<input type="radio" name="vposition" id="opttop" value="90%"><label for="opttop" title="بالا"></label>
									</td>
									<td width="30px">
										<input type="radio" name="vposition" id="optmiddle" value="50%" checked><label for="optmiddle" title="وسط"></label>
									</td>
									<td width="30px">
										<input type="radio" name="vposition" id="optbottom" value="10%"><label for="optbottom" title="پایین"></label>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="hposition" class="control">
							<table>
								<tr>
									<td class="title">
										موقعیت افقی:
									</td>
									<td width="30px">
										<input type="radio" name="hposition" id="optright" value="10%"><label for="optright" title="راست"></label>
									</td>
									<td width="30px">
										<input type="radio" name="hposition" id="optcenter" value="50%" checked><label for="optcenter" title="وسط"></label>
									</td>
									<td width="30px">
										<input type="radio" name="hposition" id="optleft" value="90%"><label for="optleft" title="چپ"></label>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="color" class="control">
							<table>
								<tr>
									<td colspan="2">
										رنگ پس زمینه
									</td>
								</tr>
								<tr>
									<td rowspan="3">
										<div id="preview"></div>
									</td>
									<td>
										<div class="color">
											<div id="red" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="color">
											<div id="green" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="color">
											<div id="blue" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div id="bordercolor" class="control">
							<table>
								<tr>
									<td colspan="2">
										رنگ حاشیه دور
									</td>
								</tr>
								<tr>
									<td rowspan="3">
										<div id="preview"></div>
									</td>
									<td>
										<div class="color">
											<div id="red" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="color">
											<div id="green" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="color">
											<div id="blue" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
							</table>
						</div>
						<div id="src" class="control" style="display: initial;">
							<table>
								<tr>
									<td width="50px">
										<button class="icon" id="delete"></button>
									</td>
									<td>
										<div id="preview"></div>
									</td>
									<td width="50px">
										<button class="icon" id="browse"></button>
									</td>
								</tr>
							</table>
						</div>
						<div id="text-align" class="control">
							<table>
								<tr>
									<td class="title">
										جهت نوشته:
									</td>
									<td width="30px">
										<input type="radio" name="text-align" id="opttright" value="right"><label for="opttright" title="راست"></label>
									</td>
									<td width="30px">
										<input type="radio" name="text-align" id="opttcenter" value="center" checked><label for="opttcenter" title="وسط"></label>
									</td>
									<td width="30px">
										<input type="radio" name="text-align" id="opttleft" value="left"><label for="opttleft" title="چپ"></label>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div id="font" class="control">
							<table>
								<tr>
									<td class="title">
										قلم:
									</td>
									<td>
										<input type="checkbox" id="style"><label for="style"></label>
									</td>
									<td>
										<input type="checkbox" id="weight"><label for="weight"></label>
									</td>
									<td style="font-size: 16px">
										px <input type="number" min="10" id="size" value="14">
									</td>
									<td>
										<select id="family">
											<option>mitra</option>
											<option>nazanin</option>
											<option>roya</option>
											<option>shiraz</option>
											<option>titr</option>
											<option>tahoma</option>
											<option>arial</option>
										</select>
									</td>
								</tr>
								<tr>
									<td rowspan="3" id="font-preview">
										الف<br>text
									</td>
									<td colspan="4">
										<div class="color">
											<div id="red" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="4">
										<div class="color">
											<div id="green" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="4">
										<div class="color">
											<div id="blue" class="bar"></div>
											<button class="pointer"></button>
										</div>
									</td>
								</tr>
								<tr>
									<td>

									</td>
								</tr>
							</table>
						</div>
						<div id="href" class="control">
							<table>
								<tr>
									<td class="title">
										پیوند:
									</td>
									<td class="text">
										<div class="input ltr"><input type="text" id="txthref"><hr></div>
									</td>
									<td></td>
								</tr>
							</table>
						</div>
					</center>
					</div>
					<button class="text" id="submit">اعمال تغییرات</button>
					<button class="text" id="cancel">لغو تغییرات</button>
				</div>
			</div>
			
			<div id="image-selector">
				<div class="glass"></div>
				<div class="images-list">
					<div id="container">
					<?php
						$items_wrap = '<button class="image-selector-item" id="%1$s" src="%2$s" style="background-image: url(/'. $_SESSION['login_user']. '/%2$s);">';
						$items_wrap .= '</button>';
						get_photos_list( array(
							'items_wrap'	=> $items_wrap,
						) );
					?>
					</div>
				</div>
			</div>

			<script>
				$("#settings-form #container #src #browse").click(function(){
					$("#image-selector .image-selector-item").removeClass("selected");
					if( $(this).attr("value") != "" )
						$("#image-selector").find("button[src='" + $(this).attr("value") + "']").addClass("selected");
					$("#image-selector").css({"transform": "scaleY(1)"});
				});

				$(".image-selector-item").click(function(){
					$("#settings-form #container #src #browse").val( "<?php echo '/'. $_SESSION['login_user']. '/'; ?>" + $(this).attr("src") );
					$("#settings-form #container #src #preview").css({"background-image": "url(' <?php echo '/'. $_SESSION['login_user']. '/'; ?>" + $(this).attr("src") + "')"}  );
					$("#image-selector").css({"transform": "scaleY(0)"});
				});

				$("#settings-form #container #src #delete").click(function(){
					$("#settings-form #container #src #browse").val("");
					$("#settings-form #container #src #preview").css({"background-image": ""}  );
				});
				
				$("#image-selector .glass").click(function(){
					$("#image-selector").css({"transform": "scaleY(0)"});
				});
			</script>
		<?php endif; ?>

		<?php if( !empty( get_page_address() ) && 'store' === get_page_address() ): ?>
			<div id="info"></div>
		<?php endif; ?>

		<?php if( !empty( get_page_address() ) && ( 'designer' != get_page_address() && 'store' != get_page_address() ) ): ?>
			<div class="sidebar">
				<?php
				/* Read sidebar menu */
				get_menu( array(
					'menu'				=> get_page_address(),
					'menu_class'		=> 'sidebar-menu',
					'menu_id'			=> get_page_address(). '-menu',
					'items_class'		=> 'text',
					'items_wrap'		=> '<button class="%1$s" id="btn%2$s">%5$s</button>'
				) );
				?>
				<?php if( 'administrator' === get_page_address() ): ?>
					<header>مدیریت سایت</header>
					<script> $("#btnposts").attr("disabled", true); </script>
				<?php elseif( 'settings' === get_page_address() ): ?>
					<header>تنظیمات حساب کاربری</header>
					<script> $("#btnaccount").attr("disabled", true); </script>
				<?php endif; ?>
			</div>
		<?php endif; ?>
