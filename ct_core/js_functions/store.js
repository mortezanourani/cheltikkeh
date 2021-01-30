
/* ---------------------------------------------------------------------------------------------------- */
var js_file = '<script src="/includes/js/store.js"></script>';
/* ---------------------------------------------------------------------------------------------------- */
$(function(){
	$("#btnstore").attr({"active": true});
	
	$("#btnsignup").click(function(){
		if( $(this).attr("active") != "true" ){
			$(".main-menu .icon").attr({"active": false});
			$(this).attr({"active": true});
			inside_load( 'signup' );
			$("#btnfactor").attr({"active": false});
			$("#store .icon").attr({"active": false});
			$(".sub-menu").css({"display": "none"});
		}
	});
	
	$("#btnfactor").click(function(){
		$(".sub-menu").css({"display": "none"});
		$("#store .icon").attr({"active": false})
		if( $(this).attr("active") != "true" ){
			$("#store .icon").attr({"active": false});
			$(this).attr({"active": true});
			inside_load( 'factor' );
			$("#btnsignup").attr({"active": false});
		}
	});
	
	$("#store .icon").click(function(){
		$("#btnfactor").attr({"active": false});
		$("#btnsignup").attr({"active": false});
		if( $(this).attr("active") != "true" ){
			var name = $(this).attr("id").substr(3);
			$("#store .icon").attr({"active": false});
			$(this).attr({"active": true});
			inside_load( name );
			if( name === 'store' ){
				$(".sub-menu button").attr({"disabled": false});
				$(".sub-menu #btnheaders").attr({"disabled": true});
				$(".sub-menu").css({"display": "initial"});
			}else{
				$(".sub-menu").css({"display": "none"});
			}
		}
	});
	
	$(".sub-menu button").click(function(){
		var type = $(this).attr("id").substr(3);
		$(".sub-menu button").prop({"disabled": false});
		$(this).prop({"disabled": true});
		$(".container").css({"transform": "scale(0)"});
		$(".container #content").html( ' ' );
		setTimeout(function(){
			$(".loading").css({"display": "initial"});
			$.post( "/store/functions.php", { operation: "read_modules", type: type } )
			.done(function( modules ){
				$(".container #content").html( '<script src="/ct_core/js_functions/store.js"></script><center>' + modules + '</center>' );
				$(".loading").css({"display": "none"});
				setTimeout(function(){
					$(".container").css({"transform": "scale(1)"});
				}, 350);
			});
		}, 350);
	});
	
	$(".btnmodule").click(function( event ){
		element = $(this);
		var width = $(this).width();
		var height = $(this).height();
		var offset = $(this).offset();
		var mouseX = ( event.pageX - offset.left );
		var mouseY = ( height - ( event.pageY - offset.top ) );
		if( ( $(this).find("#btnbuy").attr("id") != undefined ) && mouseX < 50 && mouseY < 50 ){			// Buy Button Click
			confirmation = confirm( "آیا اضافه کردن المان مورد نظر به سبد خرید را تایید می کنید؟" );
			if( confirmation ){
				module_id = $(this).attr("id");
				$.post( "/shopping.php", { operation: "add-module", id : module_id } )
				.done(function( error ){
					if( !error ){
						alert( "المان مورد نظر با موفقیت به سبد خرید اضافه شد." );
						$("#btnfactor").attr({"status": "full"});
					}else{
						alert( error );
					}
				});
			}
		}else{																								// Info Button Click
			module_id = $(this).attr("id");
			module_type = $(this).attr("type");
			$.post( "/store/functions.php", { operation: "module_info", type: module_type, id : module_id } )
			.done(function( info ){
				$("#info").html( '<center>' + info + '</center>' );
				$("#info").css({"transform": "scaleY(1)"});
			});
		}
	});
	
	$("#info").click(function(){
		buy_click = false;
		$("#info").css({"transform": "scaleY(0)"});
	});
	
});