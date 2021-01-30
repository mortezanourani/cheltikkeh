<?php
	/* Load page header */
	echo get_head();
?>
	
	<div class="loading">
	<div class="icon"></div>
	<div class="loading-icon"></div>
	</div>
	
	<menu id="socials">
		<a href="https://telegram.me/cheltikkeh" title="https://telegram.me/cheltikkeh" target="_blank"><button id="telegram" class="icon"></button></a>
		<br>
		<a style="direction: ltr; float: left; text-align: left;" href="http://instagram.com/_cheltikkeh_" title="http://instagram.com/_cheltikkeh_" target="_blank"><button id="instagram" class="icon"></button></a>
		<br>
		<a href="http://aparat.com/cheltikkeh" title="http://aparat.com/cheltikkeh" target="_blank"><button id="aparat" class="icon"></button></a>
	</menu>
	<div class="container">
		<div id="background-logo"></div>
		<div id="content" style="font: bold 50px mitra; text-align: center; color: rgba(235, 85, 5, 1); text-shadow: 0px 0px 2px rgba(0, 60, 170, 1);">
		<?php
			if( isset( $_GET['token'] ) ){
				if( num_objects( DB_NAME, 'renew', 'token="'. $_GET['token']. '"' ) ){
					$ticket = db_single_read( DB_NAME, 'renew', 'token="'. $_GET['token']. '"' );
					$expired = strtotime( "+15 minutes", strtotime( $ticket['expired'] ) );
					$now = strtotime( date("Y-m-d H:i:s") );
					if( $expired > $now ){
						if( $ticket['active'] === "true" ){
							define( 'show_form', true );
						}else{
							echo '<div style="width: 70%; margin: 15%; direction: rtl; text-align: right; font: bold 23px mitra; text-shadow: 0px 0px 0px rgba(0, 0, 0, 1);">
								<font style="font-size: 40px;">این لینک غیر فعال است.</font>
								<br>
								<font style="color: rgba(0, 60, 170, 1);">این مساله به دو دلیل رخ داده است:</font>
								<br>
								1. <font style="color: rgba(235, 135, 50, 1);">قبلا توسط این لینک رمز عبور خود را تغییر داده اید.</font>
								<br>
								2. <font style="color: rgba(235, 135, 50, 1);">پس از دریافت این لینک، لینک دیگری جهت تغییر رمز عبور برای شما ارسال شده است.</font>
								</div>';
						}
					}else{
						echo "این لینک منقضی شده است";
					}
				}else{
					echo "تیکتی با این شناسه وجود ندارد. این لینک غیرمجاز است.";
				}
			}else{
				echo "شما مجاز به ورود به این صفحه نیستید";
			}
		?>
		<?php if( defined( 'show_form' ) && show_form === true ): ?>
			<div id="frmrenewpass">
				<div id="title">رمز عبور جدید</div>
				<div id="container">
					<table>
						<tr>
							<td>
								<div class="input ltr"><input id="txtnewpassword" type="password" placeholder="رمز عبور جدید"><hr></div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="input ltr"><input id="txtnewrepassword" type="password" placeholder="تکرار رمز عبور جدید"><hr></div>
							</td>
						</tr>
						<tr>
							<td>
								<button class="text" id="btnupdate">تایید رمز عبور</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<script>
				$("#btnupdate").click( function(){
					var password = $("#txtnewpassword").val();
					var repassword = $("#txtnewrepassword").val();
					if( password.length < 8 ){
						alert( "رمز عبور وارد شده نا معتبر است. \n رمز عبور باید بیش از هشت کارکتر باشد." );
					}else{
						if( password != repassword ){
							alert( "تکرار رمز عبور با رمز عبور وارد شده یکسان نیست. \n لطفا در وارد کردن رمز عبور و تکرار آن دقت فرمایید." );
						}else{
							$.post( "/settings/changepass.php", { operation: 'renewpass', newpassword: password, email: "<?php echo $ticket['email']; ?>" } )
							.done(function( error ){
								if( error ){
									alert( error );
								}else{
									alert( "رمز عبور جدید با موفقیت ثبت شد." );
									window.location = "http://cheltikkeh.com";
								}
							});
						}
					}
				});
			</script>
		<?php endif; ?>
		</div>
	</div>
<?php
	/* Load page footer */
	echo get_footer();
?>
