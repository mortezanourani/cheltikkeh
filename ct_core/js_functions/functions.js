
function load_posts_list(){
	$.post( "/administrator/posts.php" ) .done( function( result ){
		$("#content").html( result );
	});
}

function post_write( post_title, post_image, post_content, post_status, post_commentable, post_category ){
	$.post( "/administrator/posts.php", {operation: 'write', title: post_title, image: post_image, content: post_content, status: post_status, commentable: post_commentable, category: post_category} )
	.done(function( error ){
		if( error ){
			alert( "متاسفانه اختلالی در سیستم پیش آمده است. مجددا تلاش فرمایید." );
		}
	});
}

function post_edit( post_id, post_title, post_image, post_content, post_status, post_commentable, post_category ){
	$.post( "/administrator/posts.php", {operation: 'edit', id: post_id, title: post_title, image: post_image, content: post_content, status: post_status, commentable: post_commentable, category: post_category} )
	.done(function( error ){
		if( error ){
			alert( "متاسفانه اختلالی در سیستم پیش آمده است. مجددا تلاش فرمایید." );
		}
	});
}

function post_visibility_change( post_id ){
	$.post( "/administrator/posts.php", {operation: 'visibility', id: post_id} )
	.done(function( result ){
		if( result ){
			$("#content").html( result );
		}
	});
}

function post_commentability_change( post_id ){
	$.post( "/administrator/posts.php", {operation: 'commentability', id: post_id} )
	.done(function( error ){
		if( error ){
			alert( error );
		}
		return;
	});
}

function post_delete( post_id ){
	$.post( "/administrator/posts.php", {operation: 'delete', id: post_id} )
	.done(function( result ){
		if( result ){
			$("#content").html( result );
		}
	});
}

function load_categories_list(){
	$.post( "/administrator/categories.php" ) .done( function( result ){
		$("#content").html( result );
		return;
	});
}

function category_create( category_name, category_link ){
	$.post( "/administrator/categories.php", {operation: 'create', name: category_name, link: category_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			load_categories_list();
			alert( "دسته ی مورد نظر با موفقیت ساخته شد." );
		}
		return;
	});
}

function category_rename( category_id, category_name, category_link ){
	$.post( "/administrator/categories.php", {operation: 'rename', id: category_id, name: category_name, link: category_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			load_categories_list();
			alert( "تغییر نام دسته ی مورد نظر با موفقیت انجام شد." );
		}
		return;
	});
}

function category_delete( category_id ){
	$.post( "/administrator/categories.php", {operation: 'delete', id: category_id} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "دسته ی مورد نظر با موفقیت حذف شد." );
		}
		return;
	});
}

function load_photos_list(){
	$.post( "/administrator/gallery.php" ) .done( function( result ){
		$("#content").html( result );
		return;
	});
}

function photo_upload( category_name ){
	$.post( "/administrator/categories.php", {operation: 'create', name: category_name} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "دسته ی مورد نظر با موفقیت ساخته شد." );
		}
		return;
	});
}

function photo_edit( photo_id, photo_title, photo_caption, photo_description ){
	$.post( "/administrator/gallery.php", {operation: 'edit', id: photo_id, title: photo_title, caption: photo_caption, description: photo_description} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "تغییرات مورد نظر با موفقیت انجام شد." );
		}
		return;
	});
}

function photo_delete( photo_id ){
	$.post( "/administrator/gallery.php", {operation: 'delete', id: photo_id} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "تصویر مورد نظر با موفقیت حذف شد." );
		}
		return;
	});
}

function load_menu_items_list(){
	$.post( "/administrator/mainmenu.php" ) .done( function( result ){
		$("#content").html( result );
		return;
	});
}

function menu_item_create( item_title, item_link ){
	$.post( "/administrator/mainmenu.php", {operation: 'create', title: item_title, link: item_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}
		return;
	});
}

function menu_item_edit( item_id, item_title, item_link ){
	$.post( "/administrator/mainmenu.php", {operation: 'edit', id: item_id, title: item_title, link: item_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}
		return;
	});
}

function menu_item_delete( item_id ){
	$.post( "/administrator/mainmenu.php", {operation: 'delete', id: item_id} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "آیتم مورد نظر با موفقیت حذف شد." );
		}
		return;
	});
}

function load_pages_list(){
	$.post( "/administrator/pagetypes.php" ) .done( function( result ){
		$("#content").html( result );
	});
}

function page_create( page_name, page_link ){
	$.post( "/administrator/pagetypes.php", {operation: 'create', name: page_name, link: page_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			load_pages_list();
			alert( "صفحه ی مورد نظر با موفقیت انجام شد." );
		}
		return;
	});
}

function page_rename( page_id, page_name, page_link ){
	$.post( "/administrator/pagetypes.php", {operation: 'rename', id: page_id, name: page_name, link: page_link} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			load_pages_list();
			alert( "تغییر نام صفحه ی مورد نظر با موفقیت انجام شد." );
		}
		return;
	});
}

function page_delete( page_id ){
	$.post( "/administrator/pagetypes.php", {operation: 'delete', id: page_id} )
	.done(function( error ){
		if( error ){
			alert( error );
		}else{
			alert( "صفحه ی مورد نظر با موفقیت حذف شد." );
		}
	});
}

function load_messages_list(){
	$.post( "/administrator/messages.php" ) .done( function( result ){
		$("#content").html( result );
	});
}

function message_show( element ){
	$(".loading").css({"display": "initial"});
	if( element.parent().next().next().find(".message").css("display") === "none" ){
		$(".listitem .message").fadeOut(250);
		setTimeout( function(){
			element.parent().next().next().find(".message").fadeToggle(250);
			$.post( "/administrator/messages.php", { operation: 'read', id: element.parent().find(".check").attr("id") } )
			.done(function( result ){
				if( !result ){
					element.parent().find(".status").attr({"checked": true});
					$(".loading").css({"display": "none"});
				}else{
					alert( "خطایی رخ داده است \nلطفا مجددا تلاش فرمایید.");
				}
			});
		}, 250);
	}else{
		element.parent().next().next().find(".message").fadeToggle(250);
		setTimeout( function(){
			$(".loading").css({"display": "none"});
		}, 250);
	}
}

function message_status_change( message_id ){
	$(".loading").css({"display": "initial"});
	$.post( "/administrator/messages.php", {operation: 'status', id: message_id} )
	.done(function( result ){
		if( !result ){
			$(".loading").css({"display": "none"});
		}else{
			alert( result );
		}
	});
}

function message_delete( message_id ){
	$(".loading").css({"display": "initial"});
	$.post( "/administrator/messages.php", {operation: 'delete', id: message_id} )
	.done(function( result ){
		if( !result ){
			$(".loading").css({"display": "none"});
		}
	});
}

function save_account_changes( password, firstname, lastname, email, phone, mobile ){
	$.post( "/settings/account.php", { operation: 'account', password: password, firstname: firstname, lastname: lastname, email: email, phone: phone, mobile: mobile } )
	.done(function( result ){
		if( result ){
			alert(result);
		}
	});
}

function save_site_configuration_changes( password, sitetitle, sitedescription ){
	$.post( "/settings/siteconfig.php", { operation: 'siteconfig', password: password, title: sitetitle, description: sitedescription } )
	.done(function( result ){
		if( result ){
			alert(result);
		}
	});
}

function save_new_password( password, newpassword ){
	$.post( "/settings/changepass.php", { operation: 'changepass', password: password, newpassword: newpassword } )
	.done(function( result ){
		if( result ){
			alert(result);
		}
	});
}

function send_ticket( ticket ){
	$.post( "/settings/support.php", { operation: 'ticket', ticket: ticket } )
	.done(function( result ){
		if( result ){
			alert(result);
		}
	});
}
