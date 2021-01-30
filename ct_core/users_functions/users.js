
function messaging( event, token, name, mail, message ){
	event.preventDefault();
	var wrong = false;
	if( name.length < 3 )
		wrong = true;
	if( mail.indexOf('@') === -1 )
		wrong = true;
	if( message.length < 10 )
		wrong = true;
	if( wrong === true ){
		alert( "لطفا اطلاعات را به صورت صحیح وارد نمایید." );
	}else{
		$.post( "/ct_core/users_functions/messaging.php", { token: token, name: name, mail: mail, message: message } )
		.done( function( result ){
			alert( result );
		});
	}
}

function menu_click( element ){
	Height = element.next().height() + 123;
	if( element.parent().width() < "480" ){
		if( element.parent().css("height") === "70px" ){
			element.parent().animate({"height": Height}, 200);
		}else{
			element.parent().animate({"height": "70px"}, 200);
			element.blur();
		}
	}
}
