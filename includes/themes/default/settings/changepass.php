<div class="changepass">

	<div id="form">
		<div id="title">رمز عبور</div>
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
				<tr><td></td><tr>
				<tr>
					<td>
						<div class="input ltr"><input id="txtpassword" type="password" placeholder="رمز عبور فعلی"><hr></div>
					</td>
				</tr>
				<tr>
					<td>
						<button class="text" id="btnupdate">تغییر رمز عبور</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
</div>
<script>
	function validity(){
		if( $("#txtnewpassword").val().length == 0 ){
			alert("لطفا رمز عبور مورد نظر خود را وارد نمایید.");
			return false;
		}
		if( $("#txtnewpassword").val().length > 0 && $("#txtnewpassword").val().length < 8 ){
			alert("رمز عبور وارد شده نامعتبر است. رمز عبور باید بیش از هشت کارکتر داشته باشد.");
			return false;
		}
		if( $("#txtnewpassword").val() != $("#txtnewrepassword").val() ){
			alert("تکرار رمز عبور، با رمز عبور اصلی همخوانی ندارد. لطفا در وارد کردن اطلاعات دقت فرمایید.");
			return false;
		}
		return true;
	}
	$("#btnupdate").click(function(){
		password = $("#txtpassword").val();
		newpassword = $("#txtnewpassword").val();
		if( validity() ){
			save_new_password( password, newpassword );
			$("#txtpassword").val("");
			$("#txtnewpassword").val("");
			$("#txtnewrepassword").val("");
		}
	});
	
	$("#txtpassword").keypress(function(event){
		if( event.which == 13 )
			$("#btnupdate").click()
	});
</script>
