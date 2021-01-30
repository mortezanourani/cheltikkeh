<?php
	if( !defined( 'ROOT' ) )
		define( 'ROOT', dirname( __FILE__ ) );
	
	if( !defined( 'INCLUDES' ) )
		require_once( ROOT. '/initialize.php' );

	if( isset($_POST['captcha'] ) ){
		if( !isset( $_SESSION ) )
			session_start();
		
		if( $_POST['captcha'] != $_SESSION['captcha'] )
			die( "لطفا در وارد کردن عدد تصویر دقت فرمایید" );
		
		if( !num_objects( DB_NAME, 'users', 'email="'. $_POST['email']. '"' ) )
			die( 'حساب کاربری با این پست الکترونیکی وجود ندارد' );
		
		db_update( DB_NAME, 'renew', 'active="false"', 'email="'. $_POST['email']. '"' );
		
		$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
		$token = "";
		for( $c = 0; $c < 72; $c++ ){
			$token .= $letters[ rand(0, strlen($letters)-1) ];
		}
		
		$link = "http://cheltikkeh.com/?token=". $token;
		
		$expire_time = date( 'Y-m-d H:i:s', strtotime( "+15 minutes", strtotime( date('Y-m-d H:i:s') ) ) );
		
		db_write( DB_NAME, 'renew', array(
			'columns'	=> 'id, email, token, expired',
			'values'	=> 'NULL, "'. $_POST['email']. '", "'. $token. '", "'. $expire_time. '"',
		) );
		
		require_once('/ct_core/php_functions/class.phpmailer.php');
		$mail = new PHPMailer(true);
		$mail->IsSMTP();

		try{
			$mail->Host       = 'mail.cheltikkeh.com';
			$mail->SMTPAuth   = true;                 
			$mail->Username   = 'info';
			$mail->Password   = '$N0uR@ni66';
			$mail->AddReplyTo('info@cheltikkeh.com', '');
			$mail->AddAddress( $_POST['email'], '');
			$mail->SetFrom( 'info@cheltikkeh.com', 'Cheltikkeh' ); 
			$mail->Subject = 'لینک تغییر رمزعبور';
			$mail->CharSet = 'UTF-8';
			$mail->ContentType = 'text/html';
			$mail->MsgHTML( $link );
			$mail->Send();
		}
		catch (phpmailerException $e) {
			echo $e->errorMessage(); 
		} 
		catch (Exception $e) {
			echo $e->getMessage(); 
		}
	}
?>
<?php if( !isset($_POST['captcha'] ) ): ?>
	<div class="forgetpass">

		<div id="form">
			<div id="title">بازیابی رمز عبور</div>
			<div id="container">
				<table>
					<tr>
						<td colspan="2">
							<div class="input ltr"><input id="txtemail" type="text" placeholder="پست الکترونیک"><hr></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						</td>
					<tr>
					</tr>
						<td style="float: left; padding-left: 10px;">
							<div id="captcha-image">
								<?php
									if( !isset( $_SESSION['captcha'] ) )
										create_captcha();
									echo $_SESSION['captcha_image'];
								?>
							</div>
						</td>
						<td style="width: 50px; float: left; vertical-align: top;">
							<button id="btnrecaptcha" class="icon" onclick="recaptcha();"></button>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="input ltr" style="margin-top: 15px; margin-bottom: 15px;"><input id="txtcaptcha" type="text" placeholder="عدد تصویر بالا را وارد کنید"><hr></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button class="text" id="btnrenew">بازیابی رمز عبور</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>
	
	<script>
		$("#btnrenew").click( function(){
			if( $("#txtemail").val().indexOf('@') == -1 ){
				alert("لطفا پست الکترونیک خود را به صورت صحیح وارد نمایید.");
			}else{
				if( $("#txtcaptcha").val().length === 6 ){
					$.post( "/forgetpass.php ", { email: $("#txtemail").val(), captcha: $("#txtcaptcha").val() } )
					.done( function( result ){
						if( !result ){
							alert( "یک ایمیل برای شما ارسال شده است، لطفا به پست الکترونیک خود مراجعه کنید. \n لینک موجود در این ایمیل 15 دقیقه اعتبار دارد.");
							inside_load( 'home' );
						}else{
							alert( result );
							recaptcha();
						}
					});
				}else{
					alert( "لطفا عدد تصویر را در کادر مربوطه وارد نمایید." );
				}
			}
		});
	</script>
<?php endif; ?>
