
var address;
var dbname;

function initialize(){
	$(".main-menu button").attr("disabled", false);
	if( address === "" )
		$("#btnhome").attr("disabled", true);
	
	if( $("#posts-menu").css("display") ){
		$("#posts-menu").css({"display": "initial"});
		$("#posts-menu #btnlist").css({"display": "none"});
		$("#categories-menu #btnlist").css({"display": "none"});
		$("#pagetypes-menu #btnlist").css({"display": "none"});
	}

	if( $("#designer-menu").css("display") ){
		$("#modules-menu .module-categories-menu #btnheaders").attr("disabled", true);
		$('#pages-menu button[type="page"][id="1"]').attr("disabled", true);
		$('#pages-menu button[type="category"][id="1"]').remove();
	}
	
	if( $("#store-menu").css("display") ){
		$(".sub-menu #btnheaders").attr("disabled", true);
	}
	
	//$("#login-menu button").attr({"hidden": true});
}

function inside_load( page ){
	$(".container").css({"transform": "scale(0)"});
	setTimeout(function(){
		$(".loading").css({"display": "initial"});
		if( page != 'signup' ){
			if( page != 'store' ){
				$("#content").load("/pages/" + page + ".php", function(){
					$(".loading").css({"display": "none"});
					setTimeout(function(){
						$(".container").css({"transform": "scale(1)"});
					}, 350);
				});
			}else{
				$("#content").load("/store/inside.php", function(){
					$(".loading").css({"display": "none"});
					setTimeout(function(){
						$(".container").css({"transform": "scale(1)"});
					}, 350);
				});
			}
		}else{
			$("#content").load("/signup.php", function(){
				$(".loading").css({"display": "none"});
				setTimeout(function(){
					$(".container").css({"transform": "scale(1)"});
				}, 350);
			});
		}
	}, 350);
}

function inside_refresh(){
	page = 'home';
	if( $('.main-header .icon[active="true"]').attr('id') != undefined )
		page = $('.main-header .icon[active="true"]').attr('id').substr(3);
	inside_load( page );
}

function outside_load( page ){
	$(".container").css({"transform": "scale(0)"});
	setTimeout(function(){
		$(".loading").css({"display": "initial"});
		window.location.href = "/" + page;
	}, 350);
}

function valid_informations(){
	if( $("#txtemail").val().indexOf('@') == -1 ){
		alert("لطفا پست الکترونیک خود را به صورت صحیح وارد نمایید.");
		return false;
	}
	if( $("#txttelephone").val().length == 0 && $("#txtmobilephone").val().length == 0 ){
		alert("شما باید حتما یک شماره تماس ثبت کنید");
		return false;
	}
	if( $("#txttelephone").val().length != 0 && $("#txttelephone").val().length < 11 ){
		alert("شماره تلفن وارد شده نامعتبر است. لطفا در وارد کردن اطلاعات دقت فرمایید.");
		return false;
	}
	if( $("#txtmobilephone").val().length != 0 && $("#txtmobilephone").val().length < 11 ){
		alert("شماره همراه وارد شده نامعتبر است. لطفا در وارد کردن اطلاعات دقت فرمایید.");
		return false;
	}
	if( $("#txtusername").val().length == 0 ){
		alert("لطفا نام کاربری مورد نظر خود را وارد نمایید.");
		return false;
	}
	if( $("#txtusername").val().length > 0 && $("#txtusername").val().length < 6 ){
		alert("نام کاربری وارد شده نامعتبر است. نام کاربری باید بیش از شش کارکتر داشته باشد.");
		return false;
	}
	if( $("#txtpassword").val().length == 0 ){
		alert("لطفا رمز عبور مورد نظر خود را وارد نمایید.");
		return false;
	}
	if( $("#txtpassword").val().length > 0 && $("#txtpassword").val().length < 8 ){
		alert("رمز عبور وارد شده نامعتبر است. رمز عبور باید بیش از هشت کارکتر داشته باشد.");
		return false;
	}
	if( $("#txtpassword").val() != $("#txtrepassword").val() ){
		alert("تکرار رمز عبور، با رمز عبور اصلی همخوانی ندارد. لطفا در وارد کردن اطلاعات دقت فرمایید.");
		return false;
	}
	if( $("#txtsitename").val().length == 0 ){
		alert("آدرس صفحه خود را وارد کنید. این آدرس بعدا از طریق صفحه تنظیمات قابل تصحیح است.");
		return false;
	}
	if( $("#txtsitename").val().length > 0 && $("#txtsitename").val().length < 5 ){
		alert("آدرس های کمتر از پنج کارکتر در حال حاضر در دسترس نیستند. به زودی امکان دسترسی به این آدرس ها در اختیار شما قرار خواهد گرفت.");
		return false;
	}
	if( $("#txtemail").val().length < 6 ){
		alert("لطفا عدد تصویر را به طور کامل وارد نمایید.");
		return false;
	}

	return true;
}

function open_signup(){
	$(".main-menu button").attr({"disabled": false});
	inside_load("signup");
	$(".main-menu #btnSignup").attr({"disabled": true});
	$("#content").animate({scrollTop: 0}, 50);
}
function open_forget(){
	$(".main-menu button").attr({"disabled": false});
	inside_load("../forgetpass");
	$("#frmlogin .glass").click();
}
function open_tariff(){
	$(".main-menu button").attr({"disabled": false});
	inside_load("Tariff");
	$(".main-menu #btnTariff").attr({"disabled": true});
}
function open_learning(){
	$(".main-menu button").attr({"disabled": false});
	inside_load("Learning");
	$(".main-menu #btnLearning").attr({"disabled": true});
}
function open_contact(){
	$(".main-menu button").attr({"disabled": false});
	inside_load("Contact");
	$(".main-menu #btnContact").attr({"disabled": true});
}

function recaptcha(){
	$.post( "/recaptcha.php" )
	.done( function( captcha ){
		$("#captcha-image").html( captcha );
	});
}

$(function(){
	initialize();

	$(window).resize(function(){
		if( $("#user-menu").css("left") ){
			$("#user-menu").css("left", $("#btnlogin").position().left + 35 );
			if( address != '' && address != 'store' )
				$("#user-menu").css("left", $("#btnlogin").position().left + 15 );
		}

		if( $("#notifications-menu").css("left") )
			$("#notifications-menu").css("left", $("#posts-menu").position().left - 200);

		if( $("#pages-menu").css("left") )
			$("#pages-menu").css("left", $("#designer-menu").position().left);
		
		if( $("#modules-menu").css("left") )
			$("#modules-menu").css("left", $("#designer-menu").position().left - 50);
	});

	$(".main-menu .icon").click(function(){
		if( $(this).attr("active") != "true" ){
			var name = $(this).attr("id").substr(3);
			if( name != 'login' && name != 'logout' ){
				$(".main-header .icon").attr({"active": false});
				$(this).attr({"active": true});
				if( name === 'home' && address != '' ){
					outside_load('');
				}else{
					if( name === 'store' ){
						outside_load('store');
					}else{
						if( name === 'blog' ){
							$(".container").css({"transform": "scale(0)"});
							setTimeout(function(){
								$(".loading").css({"display": "initial"});
								document.location = 'http://blog.cheltikkeh.com/';
							}, 250);
						}else{
							if( address === 'administrator' && ( name === 'factor' || name === 'tariff' ) ){
								$("#administrator-menu .text").attr({"disabled": false});
								$(".sub-menu").css({"display": "none"});
								$("#btnadministrator").attr({"active": true});
							}
							if( address === 'settings' && ( name === 'factor' || name === 'tariff' ) ){
								$("#settings-menu .text").attr({"disabled": false});
								$(".sub-menu").css({"display": "none"});
								$("#btnsettings").attr({"active": true});
							}
							if( address === 'designer' && ( name === 'factor' || name === 'tariff' ) ){
								$(".sub-menu button").attr({"disabled": true});
								$(".sub-menu #btnpages").attr({"disabled": false});
								$(".pages-menu button").attr({"disabled": false});
								$("#btndesigner").attr({"active": true});
							}
							inside_load( name );
						}
					}
				}
				$("#btnhome").attr({"disabled": false});
			}
		}
	});

	$("#btnhome").click(function(){
		$(".main-menu .icon").attr({"active": false});
		$(this).attr({"disabled": true});
		inside_load('home');
	});
		
	$("#btnlogin").mouseover(function(){
		$("#login").slideDown(250);
	});
	$("#btnlogin").mouseleave(function( event ){
		var top = $(this).offset().top;
		var height = $(this).height();
		var mouseY = event.pageY;
		if( mouseY < top + height )
			$("#login").slideUp(250);
	});
	$("#login").mouseleave(function( event ){
		var top = $(this).offset().top;
		var mouseY = event.pageY;
		if( mouseY > top )
			$("#login").slideUp(250);
	});
	$("#btnlogin").click(function(){
		$("#btn" + address).attr("active", true);
		$("#user-menu").css("left", $("#btnlogin").position().left + 35 );
		if( address != '' && address != 'store' )
			$("#user-menu").css("left", $("#btnlogin").position().left + 15 );
		if( $("#profile-menu").css("display") === "none" ){
			$("#user-menu").css({"display": "none"});
			$("#frmlogin").css({"display": "initial"});
			setTimeout(function(){
				$("#frmlogin").css({"opacity": "1"});
			}, 5);
		}else{
			if( $("#user-menu").css("display") == "none" ){
				$("#user-menu").css({"display": "initial"});
			}else{
				$("#user-menu").css({"display": "none"});
			}
		}
	});

	$("#btnfactor").mouseover(function(){
		$("#store").slideDown(250);
	});
	$("#btnfactor").mouseleave(function( event ){
		var top = $(this).offset().top;
		var height = $(this).height();
		var mouseY = event.pageY;
		if( mouseY < top + height )
			$("#store").slideUp(250);
	});
	$("#store").mouseleave(function( event ){
		var top = $(this).offset().top;
		var mouseY = event.pageY;
		if( mouseY > top )
			$("#store").slideUp(250);
	});

	$("#frmlogin .glass").click(function(){
		$("#frmlogin").css({"opacity": "0"});
		setTimeout(function(){
			$("#username").val('');
			$("#password").val('');
			$("#frmlogin").css({"display": "none"});
		}, 250);
	});

	$("#login-form").submit(function(event){
		event.preventDefault();
		$.post( "/session.php", {
			username: $("#username").val(),
			password: $("#password").val()
		} )
		.done(function( error ){
			if( !error ){
				$("#frmlogin").css({"opacity": "0"});
				setTimeout(function(){
					$("#username").val('');
					$("#password").val('');
					$("#frmlogin").css({"display": "none"});
					
					if( address === 'store' ){
						$(".container").css({"transform": "scaleY(0)"});
						$("#btnfactor").attr({"active": false});
						$("#btntariff").attr({"active": false});
						setTimeout(function(){
							$(".loading").css({"display": "initial"});
							var js_file = '<script src="/ct_core/js_functions/store.js"></script>';
							var type = $(".sub-menu button:disabled").attr('id').substr(3);
							$.post( "/store/functions.php", { operation: "read_modules", type: type } )
							.done(function( modules ){
								$(".container #content").html( js_file + '<center>' + modules + '</center>' );
								setTimeout(function(){
									$(".container").css({"transform": "scaleY(1)"});
								}, 350);
								$(".loading").css({"display": "none"});
							});
						}, 350);
					}else{
						inside_refresh();
					}
				}, 250);
				$("#login-menu").css({"display": "none"});
				$("#profile-menu").css({"display": "initial"});
			}else{
				alert( error );
			}
		});
	});

	$("#profile-menu .icon").click(function(){
		if( $(this).attr("active") != "true" || address === '' ){
			var name = $(this).attr("id").substr(3);
			if( name != 'logout' ){
				if( name === 'store' )
					window.location = 'http://cheltikkeh.com/store/';
				outside_load( name );
			}
		}
	});
	
	$("#btnlogout").click(function(){
		$.post( "/logout.php" )
		.done(function( error ){
			if( !error ){
				if( address === '' ){
					inside_refresh();
				}else{
					if( address === 'store' ){
						$(".container").css({"transform": "scaleY(0)"});
						$("#btnfactor").attr({"active": false});
						$("#btntariff").attr({"active": false});
						setTimeout(function(){
							$(".loading").css({"display": "initial"});
							var js_file = '<script src="/ct_core/js_functions/store.js"></script>';
							var type = $(".sub-menu button:disabled").attr('id').substr(3);
							$.post( "/store/functions.php", { operation: "read_modules", type: type } )
							.done(function( modules ){
								$(".container #content").html( js_file + '<center>' + modules + '</center>' );
								setTimeout(function(){
									$(".container").css({"transform": "scaleY(1)"});
								}, 350);
								$(".loading").css({"display": "none"});
							});
						}, 350);
					}else{
						outside_load('');
					}
				}
				
				$("#user-menu").css({"display": "none"});
				$("#profile-menu").css({"display": "none"});
			}else{
				alert( error );
			}
		});
	});
	
	$(".btnplan").live( 'click', function(){
		plan_id = $(this).attr("id");
		if ( confirm( "آیا اضافه شدن طرح مورد نظر به سبد خرید را تایید می کنید؟" ) ){
			$.post('/shopping.php', { operation: "add-plan", id: plan_id })
			.done(function( error ){
				if( !error ){
					alert( "طرح مورد نظر با موفقیت به سبد خرید اضافه شد!" );
					$("#btnfactor").attr({"status": "full"});
				}else{
					alert( error );
				}
			});
		}
	});
	
	$("#btnremoveplan").live( 'click', function(){
		$(".loading").css({"display": "initial"});
		$.post( '/shopping.php', { operation: "remove-plan" })
		.done( function( error ){
			if( error ){
				alert( error );
				$(".loading").css({"display": "none"});
			}else{
				$("#content").load("/pages/factor.php", function(){
					$(".loading").css({"display": "none"});
				});
			}
		});
	});
	
	$("#modules .neg-icon").live( 'click', function(){
		$(".loading").css({"display": "initial"});
		var id = $(this).attr("id").substr(15);
		$.post( '/shopping.php', { operation: "remove-module", id: id })
		.done( function( error ){
			if( error ){
				alert( error );
				$(".loading").css({"display": "none"});
			}else{
				$("#content").load("/pages/factor.php", function(){
					$(".loading").css({"display": "none"});
				});
			}
		});
	});
	
	$("#btnacceptshopping").live( 'click', function(){
		$(".loading").css({"display": "initial"});
		$.post( '/shopping.php', { operation: "accept" })
		.done( function( error ){
			if( error ){
				if( error === "refresh-modules" ){
					alert( "المان هایی که قبلا خریداری نموده اید و در حساب کاربری شما موجودند، از سبد خرید حذف شدند." );
					$("#content").load("/pages/factor.php", function(){
						$(".loading").css({"display": "none"});
					});
				}else{
					alert( error );
					$(".loading").css({"display": "none"});
				}
			}else{
				$("#content").load("/pages/factor.php", function(){
					$(".loading").css({"display": "none"});
				});
			}
		});
	});
	
	$("#btnpayshopping").live( 'click', function(){
		$(".loading").css({"display": "initial"});
		$.post( '/shopping.php', { operation: "payment", pass: $("#txtpassword").val() })
		.done( function( error ){
			if( error ){
				alert( error );
				$(".loading").css({"display": "none"});
			}else{
				$("#content").load("/pages/factor.php", function(){
					alert("محتویات سبد خرید با موفقیت خریداری شد. \n از اعتماد شما متشکریم");
					$(".loading").css({"display": "none"});
				});
			}
		});
	});
	
/* Administrator JS functions ---------------------------------------------------------------------------------------- */
	/* Administrator Sidebar Menu */
	$("#administrator-menu button").click(function(){
		$("#btntariff").attr({"active": false});
		$("#btnfactor").attr({"active": false});
		$("#administrator-menu button").attr("disabled", false);
		$(this).attr("disabled", true);
		subpage = $(this).attr('id').substr(3);
		$(".sub-menu").css({"display": "none"});
		$(".loading").css({"display": "initial"});
		$("#content").html( ' ' );
		$.post( "/administrator/" + subpage + ".php" )
		.done( function( result ){
			$("#content").html( result );
			$("#"+subpage+"-menu").css({"display": "initial"});
			setTimeout(function(){
				$(".loading").css({"display": "none"});
			}, 350);
		});
		if( $("#"+subpage+"-menu #btnlist") ){
			$("#"+subpage+"-menu #btnlist").css({"display": "none"});
			$("#"+subpage+"-menu #btnadd").css({"display": "initial"});
			$("#"+subpage+"-menu #btndelete").css({"display": "initial"});
		}
	});
	
	/* Posts Sub Menu */
	$("#slctpostcategory").live('click', function(){
		if( $("#post-category-menu").css("display") == "none" ){
			$("#post-category-menu").css({"display": "block"});
		}else{
			$("#post-category-menu").css({"display": "none"});
		}
	});

	$("#post-category-menu button").live('click', function(){
		$("#post-category-menu button").attr({"disabled": false});
		$(this).attr({"disabled": true});
		$("#slctpostcategory").text( $(this).text() );
		$("#post-category-menu").css({"display": "none"});
	});
	
	$("#posts-menu #btnadd").click(function(){
		$("#btnsavepost").val("0");
		$("#txtposttitle").val("");
		$("#txtpostcontent").val("");
		$("#btnpostcommentable").prop("checked", true);
		$("#btnpostvisiblity").prop("checked", false);
		$("#slctpostcategory #option1").prop("checked", true);
		$("#slctpostcategory").find("p").text( $("#slctpostcategory #option1").next().text() );

		$("#posts-menu #btnadd").css({"display": "none"});
		$("#posts-menu #btndelete").css({"display": "none"});
		$("#postslist").css({"display": "none"});
		$("#posts-menu #btnlist").css({"display": "initial"});
		$("#posteditor").css({"display": "inline-table"});
		setTimeout( function(){
			$("#posteditor").css({"transform": "scaleY(1)"});
		}, 10 );
	});
	
	$("#posts-menu #btnlist").click(function(){
		$("#posts-menu #btnlist").css({"display": "none"});
		$("#posteditor").css({"transform": "scaleY(0)"});
		$("#image-selector").css({"transform": "scaleY(0)"});
		setTimeout( function(){
			$("#posteditor").css({"display": "none"})
		}, 250 );
		$("#posts-menu #btnadd").css({"display": "initial"});
		$("#posts-menu #btndelete").css({"display": "initial"});
		$("#postslist").css({"display": "inline-table"});
	});
	
	$("#posts-menu #btnnotifications").click(function(){
		$("#notifications-menu").css( "left", $("#posts-menu").position().left - 200 );
		if( $("#notifications-menu").css("display") == "none" ){
			$("#notifications-menu").css({"display": "initial"});
		}else{
			$("#notifications-menu").css({"display": "none"});
		}
	});
	
	$("#posts-menu #btndelete").click(function(){
		if( $(".item .check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_posts = $(".item").size();
			var id = [];
			id[num_posts] = $("#postslist").find(".check").attr("id");
			for( c = num_posts - 1; c >= 1 ; c-- ){
				id[c] = $("#post" + id[c+1]).next().next().find(".check").attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 1; c <= num_posts; c++ ){
					if( $("#post" + id[c]).find(".check:checked").attr("id") != undefined )
						$.post( "/administrator/posts.php", {operation: 'delete', id: id[c]} );
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_posts_list();
			}
		}
	});
	
	/* Categories Sub Menu */
	$("#categories-menu #btnlist").click(function(){
		$("#categories-menu #btnadd").css({"display": "initial"});
		$("#categories-menu #btndelete").css({"display": "initial"});
		$("#categories-menu #btnlist").css({"display": "none"});
		$("#categorieslist").css({"display": "inline-table"});
		$("#categoryeditor #ok").val("0");
		$("#categoryeditor").css({"transform": "scaleY(0)"});
	});
	
	$("#categories-menu #btnadd").click(function(){
		$("#txtcategoryname").val("");
		$("#categories-menu #btnadd").css({"display": "none"});
		$("#categories-menu #btndelete").css({"display": "none"});
		$("#categories-menu #btnlist").css({"display": "initial"});
		$("#categorieslist").css({"display": "none"});
		$("#categoryeditor #title").text("دسته ی جدید");
		$("#categoryeditor").css({"transform": "scaleY(1)"});
	});
	
	$("#categories-menu #btndelete").click(function(){
		if( $(".item .check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_categories = $(".item").size();
			var id = [];
			id[1] = $("#category1").attr("id");
			for( c = 2; c <= num_categories; c++ ){
				id[c] = $("#" + id[c-1]).next().next().attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 2; c <= num_categories; c++ ){
					if( $("#" + id[c]).find(".check:checked").attr("id") != undefined ){
						category_id = $("#" + id[c]).find(".check:checked").attr("id");
						$.post( "/administrator/categories.php", {operation: 'delete', id: category_id} );
					}
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_categories_list();
			}
		}
	});
	
	/* Gallery Sub Menu */
	$("#gallery-menu #btnlist").click(function(){
		$("#gallery-menu #btnadd").css({"display": "initial"});
		$("#gallery-menu #btndelete").css({"display": "initial"});
		$("#gallery-menu #btnlist").css({"display": "none"});
		$("#photoslist").css({"display": "inline-table"});
		$("#photoeditor").css({"transform": "scaleY(0)"});
		setTimeout( function(){
			$("#photoeditor").css({"display": "none"})
		}, 250 );
	});
	
	$("#gallery-menu #btnadd").click(function(){
		$("#photoeditor input[type='text']").val("");
		$("#gallery-menu #btnadd").css({"display": "none"});
		$("#gallery-menu #btndelete").css({"display": "none"});
		$("#gallery-menu #btnlist").css({"display": "initial"});
		$("#photoslist").css({"display": "none"});
		$("#photoeditor #title").text("بارگذاری عکس جدید");
		$("#photoeditor #ok").parent().css({"display": "none"});
		$("#photoeditor #submit").parent().css({"display": "initial"});
		$("#photoeditor #photofile").parent().parent().css({"display": "inline-table"});
		$("#photoeditor").css({"display": "inline-table"})
		setTimeout( function(){
			$("#photoeditor").css({"transform": "scaleY(1)"});
		}, 10 );
	});
	
	$("#gallery-menu #btndelete").click(function(){
		if( $("#photoslist").find(".check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_photos = $("#photoslist .check").size();
			var id = [];
			id[1] = $("#photoslist").find(".check").attr("id");
			for( c = 2; c <= num_photos; c++ ){
				id[c] = $("#description" + id[c-1]).next().next().find(".check").attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 1; c <= num_photos; c++ ){
					if( $("#photo" + id[c] ).find(".check:checked").attr("id") != undefined ){
						photo_id = id[c];
						$.post( "/administrator/gallery.php", {operation: 'delete', id: photo_id} );
					}
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_photos_list();
			}
		}
	});
	
	/* Main Menu Sub Menu */
	$("#mainmenu-menu #btnlist").click(function(){
		$("#mainmenu-menu #btnadd").css({"display": "initial"});
		$("#mainmenu-menu #btndelete").css({"display": "initial"});
		$("#mainmenu-menu #btnlist").css({"display": "none"});
		$("#menulist").css({"display": "inline-table"});
		$("#menueditor #ok").val("0");
		$("#menueditor").css({"transform": "scaleY(0)"});
	});
	
	$("#mainmenu-menu #btnadd").click(function(){
		$("#txtitemtitle").val("");
		$("#txtitemlink").val("");
		$("#mainmenu-menu #btnadd").css({"display": "none"});
		$("#mainmenu-menu #btndelete").css({"display": "none"});
		$("#mainmenu-menu #btnlist").css({"display": "initial"});
		$("#menulist").css({"display": "none"});
		$("#menueditor #title").text("آیتم جدید");
		$("#menueditor").css({"transform": "scaleY(1)"});
	});
	
	$("#mainmenu-menu #btndelete").click(function(){
		if( $(".item .check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_items = $(".item").size();
			var id = [];
			id[1] = 1;
			for( c = 2; c <= num_items; c++ ){
				id[c] = $("#menuitem" + id[c-1]).next().next().find(".check").attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 2; c <= num_items; c++ ){
					if( $("#menuitem" + id[c]).find(".check:checked").attr("id") != undefined ){
						item_id = id[c];
						$.post( "/administrator/mainmenu.php", {operation: 'delete', id: item_id} );
					}
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_menu_items_list();
			}
		}
	});
	
	/* Pagetypes Sub Menu */
	$("#pagetypes-menu #btnadd").click(function(){
		$("#txtpagetypename").val("");
		$("#pagetypes-menu #btnadd").css({"display": "none"});
		$("#pagetypes-menu #btndelete").css({"display": "none"});
		$("#pagetypes-menu #btnlist").css({"display": "initial"});
		$("#pagetypeslist").css({"display": "none"});
		$("#pagetypeeditor #title").text("صفحه ی جدید");
		$("#pagetypeeditor").css({"transform": "scaleY(1)"});
	});
	
	$("#pagetypes-menu #btnlist").click(function(){
		$("#pagetypes-menu #btnadd").css({"display": "initial"});
		$("#pagetypes-menu #btndelete").css({"display": "initial"});
		$("#pagetypes-menu #btnlist").css({"display": "none"});
		$("#pagetypeslist").css({"display": "inline-table"});
		$("#pagetypeeditor").css({"transform": "scaleY(0)"});
	});
	
	$("#pagetypes-menu #btndelete").click(function(){
		if( $(".item .check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_pages = $(".item").size();
			var id = [];
			id[1] = $("#pagetype1").attr("id");
			for( c = 2; c <= num_pages; c++ ){
				id[c] = $("#" + id[c-1]).next().next().attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 2; c <= num_pages; c++ ){
					if( $("#" + id[c]).find(".check:checked").attr("id") != undefined ){
						pagetype_id = $("#" + id[c]).find(".check:checked").attr("id");
						$.post( "/administrator/pagetypes.php", {operation: 'delete', id: pagetype_id} );
					}
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_pages_list();
			}
		}
	});
	
	/* Messages Sub Menu */
	$("#messages-menu #btndelete").click(function(){
		if( $(".item .check:checked").attr("id") === undefined ){
			alert( "شما هیچ موردی را انتخاب نکرده اید." );
		}else{
			var num_messages = $(".item").size();
			var id = [];
			id[num_messages] = $("#messageslist").find(".check").attr("id");
			for( c = num_messages - 1; c >= 1 ; c-- ){
				id[c] = $("#message" + id[c+1]).next().next().next().find(".check").attr("id");
			}
			if( confirm( "آیا از حذف موارد انتخاب شده مطمئن هستید؟" ) ){
				for( c = 1; c <= num_messages; c++ ){
					if( $("#message" + id[c]).find(".check:checked").attr("id") != undefined )
						$.post( "/administrator/messages.php", {operation: 'delete', id: id[c]} );
				}
				alert( "موارد مورد نظر با موفقیت حذف شد." );
				load_messages_list();
			}
		}
	});
	
/* Designer JS functions --------------------------------------------------------------------------------------------- */
	$("#designer-menu #btnpages").click(function(){
		$("#modules-menu").css({"display": "none"});
		$("#pages-menu").css( "left", $("#designer-menu").position().left );
		if( $("#pages-menu").css("display") == "none" ){
			$("#pages-menu").css({"display": "initial"});
		}else{
			$("#pages-menu").css({"display": "none"});
		}
	});

	$("#pages-menu button").click(function(){
		$("#pages-menu button").attr("disabled", false);
		$(this).attr("disabled", true);
		$("#pages-menu").css({"display": "none"});
	});

	$("#designer-menu #btnmodules").click(function(){
		$("#pages-menu").css({"display": "none"});
		$("#modules-menu").css( "left", $("#designer-menu").position().left - 50 );
		if( $("#modules-menu").css("display") == "none" ){
			$("#modules-menu").css({"display": "initial"});
		}else{
			$("#modules-menu").css({"display": "none"});
		}
	});

	$("#modules-menu .module-categories-menu button").click(function(){
		$("#modules-menu button").attr("disabled", false);
		$(this).attr("disabled", true);
		id = $(this).attr("id").substring(3);
		$("#modules-menu .items-list").attr("hidden", true);
		$("#modules-menu #" + id).attr("hidden", false);
	});

/* Settings JS functions --------------------------------------------------------------------------------------------- */
	/* Settings Sidebar Menu */
	$("#btntariff").attr({"active": false});
	$("#btnfactor").attr({"active": false});
	$("#settings-menu button").click(function(){
		$("#settings-menu button").attr("disabled", false);
		$(this).attr("disabled", true);
		subpage = $(this).attr('id').substr(3);
		$(".loading").css({"display": "initial"});
		$("#content").html( ' ' );
		$.post( "/settings/" + subpage + ".php" )
		.done( function( result ){
			$("#content").html( result );
			setTimeout(function(){
				$(".loading").css({"display": "none"});
			}, 350);
		});
	});
	
	
	$(".balance button").live( 'click', function(){
		$(".loading").css({"display": "initial"});
		var amount = $(".balance #txtincrease").val() / 10;
		$.post( "/bazpardakht.php", { send: "y", amount: amount } )
		.done( function( result ){
			if( $.isNumeric( result ) && result > 0 ){
				window.location = 'http://bazpardakht.com/webservice/go.php?id=' + result;
			}else{
				alert( result )
				$(".loading").css({"display": "none"});
			}
		});
	});
});