<div class="support">

	<div id="form">
		<div id="title">طرح مشکل با پشتیبانی</div>
		<div id="container">
			<table>
				<tr>
					<td>
						<textarea id="txtticket" placeholder="مشکل خود را در این کادر نوشته، سپس کلید ارسال را کلیک کنید تا در اولین فرصت با شما تماس بگیریم"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<button class="text" id="btnupdate">ارسال</button>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
<script>
	function validity(){
		if( $("#txtticket").val().length == 0 ){
			alert("مشکل خود را ذکر نمایید.");
			return false;
		}
		return true;
	}
	$("#btnupdate").click(function(){
		ticket = $("#txtticket").val();
		if( validity() )
			send_ticket( ticket );
		$("#txtticket").val("");
	});
	
	$("#txtpassword").keypress(function(event){
		if( event.which == 13 )
			$("#btnupdate").click()
	});
</script>
