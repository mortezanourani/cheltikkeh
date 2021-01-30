<?php
	/*
	Welcome to ChelTikkeh (CT), the first modular site builder
	*/
	
	/* Define root address */
	define( 'ROOT', dirname( __FILE__ ) );

	/*
	Initialize ChelTikkeh (CT) kernel
	*/
	
	/* Load initialization files and functions */
	if( file_exists( ROOT. '/initialize.php' ) ){
		require_once( ROOT. '/initialize.php' );
	}
	
	/*
	Load ChelTikkeh (CT)
	*/
	get_head();
?>
<style>
	html, body{
		direction: ltr;
		float: left;
		padding: 5px;
	}
</style>
<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			var type = $("#slcttype").val();
			var title = $("#txttitle").val();
			var image = $("#txtimage").val();
			var price = $("#txtprice").val();
			var off = $("#txtoff").val();
			var html = $("#txthtml").val();
			var style = $("#txtstyle").val();
			var script = $("#txtscript").val();
			$.post( "/store/functions.php", { operation: "save_module", type: type, title: title, image: image, price: price, off: off, html: html, style: style, script: script } )
			.done( function( error ){
				if( error != '' ){
					alert( error );
				}else{
					location.reload();
				}
				
			});
		});
	})
</script>
<table style="position: absolute; width: 99%; height: 98%;">
	<tr id="type">
		<td style="width: 50px; height: 25px; vertical-align: top;">
			Type:
		</td>
		<td>
			<select id="slcttype" style="width: 150px; height: 25px;">
				<option id="header">header</option>
				<option id="content">content</option>
				<option id="footer">footer</option>
				<option id="float">float</option>
				<option id="plugin">plugin</option>
			</select>
		</td>
	</tr>
	<tr>
		<td style="width: 50px; height: 25px; vertical-align: top;">
			Title:
		</td>
		<td>
			<input type="text" id="txttitle">
		</td>
	</tr>
	<tr>
		<td style="width: 50px; height: 25px; vertical-align: top;">
			Image:
		</td>
		<td>
			<input type="text" id="txtimage">
		</td>
	</tr>
	<tr>
		<td style="width: 50px; height: 25px; vertical-align: top;">
			PRICE:
		</td>
		<td>
			<input type="text" id="txtprice">ریال
		</td>
	</tr>
	<tr>
		<td style="width: 50px; height: 25px; vertical-align: top;">
			OFF:
		</td>
		<td>
			<input type="text" id="txtoff">%
		</td>
	</tr>
	<tr>
		<td style="width: 50px; vertical-align: top;">
			HTML:
		</td>
		<td>
			<textarea id="txthtml" style="resize: none; width: 100%; height: 100%;"></textarea>
		</td>
	</tr>
	<tr>
		<td style="width: 50px; vertical-align: top;">
			STYLE:
		</td>
		<td>
			<textarea id="txtstyle" style="resize: none; width: 100%; height: 100%;"></textarea>
		</td>
	</tr>
	<tr>
		<td style="width: 50px; vertical-align: top;">
			SCRIPT:
		</td>
		<td>
			<textarea id="txtscript" style="resize: none; width: 100%; height: 100%;"></textarea>
		</td>
	</tr>
	<tr>
		<td style="width: 50px; height: 25px; vertical-align: top;">
			Submit:
		</td>
		<td>
			<button id="submit">Submit</button>
		</td>
	</tr>
</table>

<?php
	get_footer();
?>
