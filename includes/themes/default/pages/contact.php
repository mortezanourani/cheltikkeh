<?php
	if( !function_exists( 'db_single_read' ) && file_exists( FUNCTIONS. '/database.php' ) )
		include '../includes/functions/database.php';
	
	$contact = db_single_read( DB_NAME, 'contact', '' );
	
	if( isset( $_SESSION['login_user'] ) )
		$user = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user']. '"' );
?>
<div class="contact" id="frmContact">
	<table>
		<tr>
			<td class="title" colspan="4" height="40px">
			<?php echo $contact['text']; ?>
			<hr>
			</td>
		</tr>
		<tr>
			<td class="name" height="40px" colspan="3">
			<?php if( !isset( $_SESSION['login_user'] ) ): ?>
			<div class="input rtl">
				<input id="txtname" type="text" placeholder="نام"><hr>
			</div>
			<?php else : ?>
			<p><?php echo $user['firstname']. ' '. $user['lastname']; ?></p>
			<?php endif; ?>
			</td>
			<td style="direction: ltr;">
				<div class="telegramicon"><font style="padding-left: 17px;">telegram.me/cheltikkeh</font></div>
			</td>
		</tr>
		<tr>
			<td class="mail" class="ltr" height="40px" colspan="3">
			<?php if( !isset( $_SESSION['login_user'] ) ): ?>
			<div class="input ltr">
				<input id="txtmail" type="text" placeholder="پست الکترونیکی"><hr>
			</div>
			<?php else : ?>
			<p><?php echo $user['email']; ?></p>
			<?php endif; ?>
			</td>
			<td style="direction: ltr;">
				<div class="instagramicon"><font style="padding-left: 20px;">instagram.com/_cheltikkeh_</font></div>
			</td>
		</tr>
		<tr>
			<td class="message" rowspan="4" style="height: 100%;" colspan="3">
				<textarea id="txtmessage" placeholder="پیام شما"></textarea>
			</td>
			<td style="direction: ltr; padding-top: 0px;">
				<div class="aparaticon"><font style="padding-left: 20px;">aparat.com/cheltikkeh</font></div>
			</td>
		</tr>
		<tr>
			<td class="seprator"></td>
		</tr>
		<tr>
			<td class="seprator">
				<div class="addressicon"><font style="padding-right: 20px;"><?php echo $contact['address']; ?></font></div>
			</td>
		</tr>
		<tr>
			<td style="direction: ltr; padding-top: 15px;">
				<div class="phoneicon"><font style="padding-left: 20px;"><?php echo $contact['phone']; ?></font></div>
			</td>
		</tr>
		<tr>
			<td style="margin: 0px; padding-left: 0px; padding-top: 20px; width: 100px;">
				<div class="input ltr" style="margin: 0px;">
					<input id="txtcaptcha" type="text" placeholder="عدد تصویر"><hr>
				</div>
			</td>
			<td style="width: 50px; padding: 0px; padding: 0px; text-align: left;">
				<button id="btnrecaptcha" class="icon" onclick="recaptcha()"></button>
			</td>
			<td style="width: 200px; padding-right: 0px; text-align: left;">
				<div id="captcha-image">
				<?php
					create_captcha();
					echo $_SESSION['captcha_image'];
				?>
				</div>
			</td>
			<td style="direction: ltr; padding-top: 15px;">
				<div class="mailicon"><font style="padding-left: 20px;"><?php echo $contact['email']; ?></font></div>
			</td>
		</tr>
		<tr>
			<td class="submit" height="40px" colspan="3">
				<button id="btnsubmit" class="text">ارسال پیام</button>
			</td>
			<td class="seprator"></td>
		</tr>
	</table>
</div>
<script>
	$(".contact .submit #btnsubmit").click(function(){
		if( $("#txtname").val() != undefined ){
			var name = $("#txtname").val();
			var mail = $("#txtmail").val();
		}else{
			var name = $(".name p").text();
			var mail = $(".mail p").text();
		}
		var message = $("#txtmessage").val();
		if( name.length < 6 ){
			alert( "لطفا نام کامل خود را وارد نمایید" );
		}else{
			if( mail.indexOf('@') === -1 ){
				alert( "لطفا پست الکترونیک خود رابه صورت صحیح وارد نمایید." );
			}else{
				if( $("#txtcaptcha").val().length != 6 ){
					alert( "لطفا عدد تصویر را به درستی وارد نمایید." );
				}else{
					$.post( "/recaptcha.php", { captcha: $("#txtcaptcha").val() } )
					.done( function( error ){
						if( error ){
							alert( error );
							recaptcha();
						}else{
							$.post( "/pages/contact.php", { name: name, mail: mail, message: message} )
							.done( function( error ){
								if( !error ){
									if( $("#txtname").val() != undefined ){
										$("#txtname").val("");
										$("#txtmail").val("");
									}
									$("#txtmessage").val("");
									alert( "پیام شما با موفقیت ارسال شد. در اولین فرصت پاسخ شما ارسال خواهد شد." );
								}else{
									alert( "در ارسال پیام مشکلی پیش آمده است. لطفا مجددا تلاش نمایید." );
								}
							});
						}
					});
				}
			}
		}
	});
</script>
