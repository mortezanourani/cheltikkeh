<div class="siteconfig">

	<div id="form">
		<div id="title">مشخصات عمومی سایت</div>
		<div id="container">
			<table>
				<tr>
					<td>
						<div class="input rtl"><input id="txtsitetitle" type="text" placeholder="عنوان سایت" value="<?php echo $site['title']; ?>"><hr></div>
					</td>
				</tr>
				<tr>
					<td>
						<textarea id="txtsitedescription" placeholder="توضیح مختصری درباره ی فعالیت سایت"><?php echo $site['description']; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<div class="input ltr"><input id="txtpassword" type="password" placeholder="رمز عبور فعلی"><hr></div>
					</td>
				</tr>
				<tr>
					<td>
						<button class="text" id="btnupdate">اعمال تغییرات</button>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
<script>
	$("#btnupdate").click(function(){
		password = $("#txtpassword").val();
		sitetitle = $("#txtsitetitle").val();
		sitedescription = $("#txtsitedescription").val();
		save_site_configuration_changes( password, sitetitle, sitedescription );
		$("#txtpassword").val("");
	});
	
	$("#txtpassword").keypress(function(event){
		if( event.which == 13 )
			$("#btnupdate").click()
	});
</script>
