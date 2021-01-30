
<?php if( !isset( $_SESSION['login_user'] ) ) : ?>

<script>
	$("#btnsubmit").click(function(){
		if( valid_informations() ){
			$.post( "/recaptcha.php", { captcha: $("#txtcaptcha").val() } )
			.done( function( error ){
				if( error ){
					alert( error );
					recaptcha();
				}else{
					$(".container").css({"transform": "scaleY(0)"});
					setTimeout(function(){
						$(".loading").css({"display": "initial"});

						$.post("/signup.php", {
							firstname:		$("#txtfirstname").val(),
							lastname:		$("#txtlastname").val(),
							email:			$("#txtemail").val(),
							phone:			$("#txttelephone").val(),
							mobile:			$("#txtmobilephone").val(),
							username:		$("#txtusername").val(),
							password:		$("#txtpassword").val(),
							sitename:		$("#txtsitename").val(),
							sitetitle:		'',
							description:	''
						})
						.done(function( error ){
							if( !error ){
								inside_refresh();
								$("#user-menu").css({"display": "none"});
								$("#login-menu").css({"display": "none"});
								$("#profile-menu").css({"display": "initial"});
							}else{
								alert( error );
								$(".loading").css({"display": "none"});
								$(".container").css({"transform": "scaleY(1)"});
							}
						});
					}, 350 );
				}
			});
		}
	});
</script>

<div class="signup">
	<div id="start"></div>
	<table id="contract">
		<?php
			create_captcha();
			$acts = db_multi_read( DB_NAME, 'contract', '1' );
			for( $i = 1; $i < $acts['nums']; $i++ ){
				$title = $acts[$i]['title'];
				$act = str_replace( "\n", "<br>", $acts[$i]['text'] );
				echo '<tr><td colspan="3">';
				if( !empty( $title ) )
					echo '<font class="title">'. $title. '</font><br>';
				echo '<font class="act">'. $act. '</font>';
				echo '</td></tr>';
				if( $i < $acts['nums'] - 1 )
					echo '<tr><td class="separator"></td></tr>';
			}
			$title = $acts[$acts['nums']]['title'];
			$act = str_replace( "\n", "<br>", $acts[$acts['nums']]['text'] );
			echo '<tr><td>';
			if( !empty( $title ) )
				echo '<font class="title">'. $title. '</font>';
			echo '<font class="act">'. $act. '</font>';
			echo '</td><td style="vertical-align: top; width: 50px;"><button id="btnrecaptcha" class="icon" onclick="recaptcha();"></button>';
			echo '</td><td style="text-align: left; width: 200px;">';
			echo '<div id="captcha-image">';
			echo $_SESSION['captcha_image'];
			echo '</div>';
			echo '<div class="input ltr" style="width: 200px; float: left; margin: 0px;">';
			echo '<input id="txtcaptcha" type="text" placeholder="عدد عکس بالا را در این کادر بنویسید"><hr>';
			echo '</div></td></tr>';
			echo '<tr><td class="separator"></td></tr>';
			
		?>
		<tr>
			<td style="text-align: left;" colspan="3">
				<button class="text" id="btnsubmit" style="width: 200px; text-align: center;">تایید و ثبت اطلاعات</button>
			</td>
		</tr>
	</table>
</div>
<?php else : ?>
	<script> alert("لطفا جهت ثبت نام، از حساب کاربری کنونی خروج کنید"); </script>
<?php endif; ?>
