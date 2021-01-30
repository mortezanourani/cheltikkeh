<?php
	if( !isset( $account['username'] ) )
		$account = db_single_read( DB_NAME, 'users', 'username="'. $_SESSION['login_user']. '"' );
?>		
<div class="account">

	<div id="form">
		<div id="title">اطلاعات کاربری</div>
		<div id="container">
			<table>
				<tr>
					<td>
						<div class="input rtl"><input id="txtlastname" type="text" placeholder="نام خانوادگی" value="<?php echo $account['lastname']; ?>"><hr></div>
					</td>
					<td>
						<div class="input rtl"><input id="txtfirstname" type="text" placeholder="نام" value="<?php echo $account['firstname']; ?>"><hr></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="input ltr"><input id="txtemail" type="email" placeholder="پست الکترونیک" value="<?php echo $account['email']; ?>"><hr></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="input ltr"><input id="txtmobile" type="text" placeholder="شماره تلفن همراه" value="<?php echo $account['mobile']; ?>"><hr></div>
					</td>
					<td>
						<div class="input ltr"><input id="txtphone" type="text" placeholder="شماره تلفن ثابت" value="<?php echo $account['phone']; ?>"><hr></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="input ltr"><input id="txtpassword" type="password" placeholder="رمز عبور فعلی"><hr></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<button class="text" id="btnupdate">اعمال تغییرات</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
</div>
<script>
	function validity(){
		if( email.indexOf('@') == -1 ){
			alert("لطفا پست الکترونیک خود را به صورت صحیح وارد نمایید.");
			return false;
		}
		if( phone.length == 0 && mobile.length == 0 ){
			alert("شما باید حتما یک شماره تماس ثبت کنید");
			return false;
		}
		if( phone.length != 0 && phone.length < 11 ){
			alert("شماره تلفن وارد شده نامعتبر است. لطفا در وارد کردن اطلاعات دقت فرمایید.");
			return false;
		}
		if( mobile.length != 0 && mobile.length < 11 ){
			alert("شماره همراه وارد شده نامعتبر است. لطفا در وارد کردن اطلاعات دقت فرمایید.");
			return false;
		}
		
		return true;
	}
	$("#btnupdate").click(function(){
		password = $("#txtpassword").val();
		firstname = $("#txtfirstname").val();
		lastname = $("#txtlastname").val();
		email = $("#txtemail").val();
		phone = $("#txtphone").val();
		mobile = $("#txtmobile").val();
		if( validity() ){
			save_account_changes( password, firstname, lastname, email, phone, mobile );
			$("#txtpassword").val("");
		}
	});
	
	$("#txtpassword").keypress(function(event){
		if( event.which == 13 )
			$("#btnupdate").click()
	});
</script>
