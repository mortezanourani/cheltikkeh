<?php
	if( !isset( $_SESSION ) )
		session_start();
	
	if( !defined( 'ROOT' ) ){
		define( 'ROOT', dirname( dirname( __FILE__ ) ) );
		require_once( ROOT. '/initialize.php' );
	}
	
	if( isset( $_SESSION['login_user'] ) ){
		if( isset( $_POST['operation'] ) )
			switch( $_POST['operation'] ){
				case( "read_module" ):
					$site_db = get_site_db( $_SESSION['login_user'] );
					$module = db_single_read( $site_db['DB_NAME'], 'modules', 'id="'. $_POST['module_id']. '"' );
					echo '<style>'. base64_decode( $module['css'] ). '</style>';
					echo '<script>'. base64_decode( $module['script'] ). '</script>';
					echo base64_decode( $module['html'] );
					break;
					
				case( "read_design" ):
					$site_db = get_site_db( $_SESSION['login_user'] );
					$design = db_single_read( $site_db['DB_NAME'], 'designs', 'type="'. $_POST['type']. '" AND id="'. $_POST['id']. '"' );
					echo base64_decode( $design['html'] );
					break;
					
				case( "delete_design" ):
					$site_db = get_site_db( $_SESSION['login_user'] );
					$design = db_delete( $site_db['DB_NAME'], 'designs', 'type="'. $_POST['type']. '" AND id="'. $_POST['id']. '"' );
					break;
					
				case( "save_design" ):
					$site_db = get_site_db( $_SESSION['login_user'] );
					$design = str_replace( array(
						'<center>',
						'</center>',
						'<script src="/ct_core/js_functions/designer.js"></script>',
						'<div class="module-place" id="new-module" ondrop="add( event )" ondragover="firstdrop( event )">با کشیدن و قرار دادن یکی از المان ها در این محل طراحی این صفحه را آغاز کنید.</div>'
						), '', $_POST['module'] );
					
					db_write( $site_db['DB_NAME'], 'designs', array(
						'columns'	=> 'type, id, html, script',
						'values'	=> '"'. $_POST['type']. '", "'. $_POST['id']. '", "'. base64_encode( $design ). '", "'. $_POST['script']. '"',
					) );
					break;

				case( "publish_design" ):
					$site_db = get_site_db( $_SESSION['login_user'] );
					if( $_POST['type'] === 'page' && $_POST['id'] === "1" ){
						$design = "<?php if( !defined( 'ROOT' ) ) define( 'ROOT', dirname( dirname( __FILE__ ) ) ); if( file_exists( ROOT. '/initialize.php' ) ) require_once( ROOT. '/initialize.php' ); ";
					}else{
						$design = "<?php if( !defined( 'ROOT' ) ) define( 'ROOT', dirname( dirname( dirname( __FILE__ ) ) ) ); if( file_exists( ROOT. '/initialize.php' ) ) require_once( ROOT. '/initialize.php' ); ";
					}
					$design .= '$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME ); if( !$connection ) die( "اختلالی در سیستم پیش آمده است. لطفا مجددا تلاش فرمایید." ); mysqli_query( $connection, "SET CHARACTER SET '. DB_CHARSET . '" ); ';
					$design .= '$sql = "SELECT * FROM users WHERE username='. "'". $site_db['USERNAME']. "'". '"; $result = mysqli_query( $connection, $sql ); $user = mysqli_fetch_array( $result, MYSQL_ASSOC ); ';
					$design .= '$connection = mysqli_connect( DB_HOST, "'. $site_db['USERNAME']. '", $user["password"], "'. $site_db['DB_NAME']. '" ); if( !$connection ) die( "اختلالی در سیستم پیش آمده است. لطفا مجددا تلاش فرمایید." ); mysqli_query( $connection, "SET CHARACTER SET utf8" ); ?>';
					
					$design .= '<html>
								<head>
									<meta http-equiv="content-type" content="text/html; charset=UTF-8; width=device-width;">
									<?php if( strtolower( $_SERVER["HTTP_HOST"] ) === "cheltikkeh.com" || strtolower( $_SERVER["HTTP_HOST"] ) === "www.cheltikkeh.com" || strtolower( $_SERVER["HTTP_HOST"] ) === "localhost" ): ?>
									<base href="/'. $site_db['USERNAME']. '/" >
									<?php else: ?>
									<base href="/" >
									<?php endif; ?>
									<script src="http://'. DB_HOST. '/ct_core/users_functions/users.js"></script>
									<script src="includes/js/source.js"></script>
									<link rel="stylesheet" href="includes/css/body.css">
									<link rel="stylesheet" href="includes/css/fonts.css">
								</head>
								<body>'. $_POST['design']. '</body></html>';

					$design = str_replace( array(
						"\t",
						'<script src="/ct_core/js_functions/designer.js"></script>',
						'<div class="module-place" id="new-module" ondrop="add( event )" ondragover="firstdrop( event )">با کشیدن و قرار دادن یکی از المان ها در این محل طراحی این صفحه را آغاز کنید.</div>',
						'<button id="btndelete" onclick="module_delete( $(this) )"></button><button id="btnmove" draggable="true" ondragstart="module_drag( $(this) )"></button>',
						'ondrop="add( event )"',
						'ondragover="allowdrop( event, $(this) )"'
						), '', $design );
					
					$design = str_replace( "<!--", "<", $design );
					$design = str_replace( "-->", ">", $design );
					
					$design = str_replace( 'src="/'. $_SESSION['login_user']. '/', 'src="', $design );
					$design = str_replace( "url=('/". $_SESSION['login_user']. "/", "url=('", $design );
					
					
					if( $_POST['type'] === 'page' && $_POST['id'] === "1" ){
						$dir = "../". $site_db['USERNAME'];
						if( !is_dir( $dir ) ){
							mkdir( $dir );
						}
					}else{
						if( $_POST['type'] === 'page' ){
							$page = db_single_read( $site_db['DB_NAME'], 'pages', 'id="'. $_POST['id']. '"' );
						}else{
							$page = db_single_read( $site_db['DB_NAME'], 'categories', 'id="'. $_POST['id']. '"' );
						}
						$dir = "../". $site_db['USERNAME']. "/". $page['link'];
						if( !is_dir( $dir ) ){
							mkdir( $dir );
						}
					}
					
// Define PHP Tags						
					$site_title = '<?php $sql = "SELECT * FROM info WHERE 1"; $result = mysqli_query( $connection, $sql ); $site = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo $site["site_title"]; ?>';
					$site_title_tag = array(
										"عنوان سایت شما",
										"گروه چل تیکه",
										"کانون مشاوران اندیشه نوین",
										"برنامه نویسان نوین",
										"کانون تبلیغاتی نوین",
										"عکاسان نوین",
										"کانون مشاوران نوین",
										"نوین دکوراتور",
										"معین طراحان",
										"رستوران فست فود",
										"صنایع چوب نوین",
										"کافه دور همی",
										"نوین دوز",
										"کانون تبلیغاتی مشاوران شرق",
										"مسابقه عکاسی با موبایل",
										);
										
					$design = str_replace( $site_title_tag, $site_title , $design );
					
					$site_description = '<?php $sql = "SELECT * FROM info WHERE 1"; $result = mysqli_query( $connection, $sql ); $site = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo str_replace("\n", "<br>", $site["site_description"]); ?>';
					$site_description_tag = array(
											"توضیحات سایت شما",
											"ارائه دهنده ی خدمات فضای مجازی",
											"با حرفه ای ها کار کنید، تا حرفه ای کار کنید",
											"زیبایی، امنیت، سادگی",
											"برگزار کننده ی کلاس های عکاسی",
											"سرمایه گذاری مطمئن و سودآور",
											"طراح و مجری دکوراسیون داخلی",
											"انواع سالاد، انواع فست فود، غذای دریایی و دسر",
											"تولید کننده انواع میز، کمد دیواری، کابینت و سرویس آشپزخانه",
											"جایی برای با هم بودن",
											"تولیدکننده پوشاک آقایان",
											"برنامه نویس و توسعه دهنده وب",
											"نقاش، عکاس، کارگردان تئاتر و مستند ساز",
											"طراحی لوگو، کارت ویزیت، پاکت و پوشه<br>چاپ انواع کارت ویزیت، پاکت و پوشه<br>چاپ روی انواع لیوان، نوشت افزار و پیکسل",
											"وکیل پایه یک دادگستری",
											"آخرین مهلت ارسال آثار پایان فروردین",
											"ما شما را زبان زد می کنیم",
											);
											
					$design = str_replace( $site_description_tag, $site_description , $design );
					
					$auther_name = '<?php $sql = "SELECT * FROM info WHERE 1"; $result = mysqli_query( $connection, $sql ); $site = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo $site["firstname"]. " ". $site["lastname"]; ?>';
					$auther_name_tag = array(
										"نام شما",
										"مرتضا نورانی",
										"موسی ابراهیمی",
										"هادی سعیدزاده",
										);

					$design = str_replace( $auther_name_tag, $auther_name , $design );
										
					$auther_mail = '<?php $sql = "SELECT * FROM info WHERE 1"; $result = mysqli_query( $connection, $sql ); $site = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo $site["email"]; ?>';
					$auther_mail_tag = array(
										"mail@yourdomain.com",
										"info@cheltikkeh.com",
										"moeintarrahan@gmail.com",
										"novinwood@cheltikkeh.com",
										"mortizanourani@gmail.com",
										);
					
					$design = str_replace( $auther_mail_tag, $auther_mail , $design );

					$auther_phone = '<?php $sql = "SELECT * FROM info WHERE 1"; $result = mysqli_query( $connection, $sql ); $site = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo $site["phone"]; ?>';
					$auther_phone_tag = array(
										"021-33050363",
										"021-33445566",
										"+98 (911) 606-9878",
										"+98 (13) 42 52 41 16",
										);
					
					$design = str_replace( $auther_phone_tag, $auther_phone , $design );

// Replace Menu Bar PHP Tags
					
					$main_menu = '<?php $sql = "SELECT * FROM menu WHERE 1"; $result = mysqli_query( $connection, $sql ); $nums = mysqli_num_rows( $result ); for( $c = 1; $c <= $nums; $c++ ){ $main_menu_items = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo "<a href="; if( strtolower( substr( $main_menu_items["link"], 0, 4 ) ) != "http" ){ echo "/"; } echo $main_menu_items["link"]. "><button>". $main_menu_items["title"]. "</button></a>"; }; ?>';
					$main_menu_tag = array(
										'<a href="#"><button>صفحه اصلی</button></a>'. "\n". '<a href="#"><button>محصولات</button></a>'. "\n". '<a href="#"><button>نمونه کارها</button></a>'. "\n". '<a href="#"><button>درباره ما</button></a>',
										);
										
					$design = str_replace( $main_menu_tag, $main_menu, $design );

					$main_menu_2 = '<?php $sql = "SELECT * FROM menu WHERE 1"; $result = mysqli_query( $connection, $sql ); $nums = mysqli_num_rows( $result ); $main_menu_items = mysqli_fetch_array( $result, MYSQL_ASSOC ); for( $c = 1; $c < $nums; $c++ ){ $main_menu_items = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo "<a href="; if( strtolower( substr( $main_menu_items["link"], 0, 4 ) ) != "http" ){ echo "/"; } echo $main_menu_items["link"]. "><button>". $main_menu_items["title"]. "</button></a>"; }; ?>';
					$main_menu_tag_2 = array(
										'<a href="#"><button>خدمات</button></a>'. "\n". '<a href="#"><button>درباره ما</button></a>'. "\n". '<a href="#"><button>تماس با ما</button></a>',
										'<a href="#"><button>محصولات</button></a>'. "\n". '<a href="#"><button>درباره ما</button></a>'. "\n". '<a href="#"><button>تماس با ما</button></a>',
										'<a href="#"><button>سرویس ها</button></a>'. "\n". '<a href="#"><button>سفارش آنلاین</button></a>'. "\n". '<a href="#"><button>درباره ما</button></a>'. "\n". '<a href="#"><button>تماس با ما</button></a>',
										);
										
					$design = str_replace( $main_menu_tag_2, $main_menu_2, $design );

// Replace Category Menu PHP Tags
					
					$category_menu = '<?php $sql = "SELECT * FROM categories WHERE 1"; $result = mysqli_query( $connection, $sql ); $nums = mysqli_num_rows( $result ); $category_menu_items = mysqli_fetch_array( $result, MYSQL_ASSOC ); for( $c = 2; $c <= $nums; $c++ ){ $category_menu_items = mysqli_fetch_array( $result, MYSQL_ASSOC ); echo "<a href=/". $category_menu_items["link"]. "><button>". $category_menu_items["name"]. "</button></a>"; }; ?>';
					$category_menu_tag = array(
										'<a href="#"><button>مقالات</button></a><a href="#"><button>پژوهش ها</button></a><a href="#"><button>دل نوشته ها</button></a>',
										'<a href="#"><button>محصولات</button></a>'. "\n". '<a href="#"><button>نمونه کار ها</button></a>'. "\n". '<a href="#"><button>لیست قیمت ها</button></a>'. "\n". '<a href="#"><button>طرح های تخفیفی</button></a>',
										);
										
					$design = str_replace( $category_menu_tag, $category_menu, $design );

// Replace POST read PHP Tags

					$post_wrap = substr( $design, strpos( $design, '<p class="hidden">#post_read#</p>' ), strpos( $design, '<p class="hidden">#/post_read#</p>' ) - strpos( $design, '<p class="hidden">#post_read#</p>' ) );
					
					$post_tag = $post_wrap;
					
					$post_wrap = str_replace( '<p class="hidden">#post_read#</p>', '', $post_wrap);
					$post_wrap = str_replace( "#encryptpostid#", '%1$s', $post_wrap );
					$post_wrap = str_replace( "چرا از « چل تیکه » برای ساخت سایتم استفاده کنم؟", '%2$s', $post_wrap );
					$post_wrap = str_replace( "http://cheltikkeh.com/includes/images/modules/content63.jpg", '%3$s', $post_wrap );
					$post_wrap = str_replace( "پاسخ این سوال بسیار ساده است.<br>طراحی و ساخت یک وبسایت پویا نیاز به دانش فنی، صرف زمان و هزینه دارد. اما با استفاده از « چل تیکه » شما بدون نیاز به داشتن دانش فنی، با صرف تنها چند ساعت زمان و هزینه ای اندک می توانید صاحب یک وبسایت شوید.<br>در حالتی که بخواهید به صورت معمول یک سایت طراحی کنید، با فرض در اختیار داشتن فضای میزبانی، تیم طراحی گرافیکی و تیم برنامه نویسی نیاز به مدیریت این تیم ها و البته صرف زمانی قابل توجه دارید.<br>در حالی که اگر با استفاده از « چل تیکه » به طراحی سایت خود بپردازید، با صرف تنها چند ساعت وقت، می توانید سایت خود را راه اندازی کنید. چرا که تیم « چل تیکه » با افتخار در خدمت شما هستند و تمام ابزارهای مورد نیاز شما برای طراحی و مدیریت سایتتان را در اختیارتان قرار داده اند. با استفاده از این ابزارها، شما بدون نیاز به داشتن دانش فنی، خود به تنهایی، کاری معادل یک تیم برنامه نویسی و یک تیم گرافیکی انجام می دهید.", '%4$s', $post_wrap );
					
					$post = '<?php if( !isset( $_GET["id"] ) ){ ';
					
					$post .= '$self_splited = explode( "/", $_SERVER["PHP_SELF"] ); $page_address = $self_splited[ sizeof( $self_splited ) - 2 ]; ';
					
					$post .= '$sql = "SELECT * FROM categories WHERE link=';
					$post .= "'";
					$post .= '". $page_address. "'; 
					$post .= "'";
					$post .= '"; $result = mysqli_query( $connection, $sql ); $nums = mysqli_num_rows( $result ); ';
					
					$post .= 'if( $nums === 0 ){ ';		// There is no categories that linked to this Page Address
					
					$post .= '$sql = "SELECT * FROM posts WHERE category=1"; $result = mysqli_query( $connection, $sql ); $posts_nums = mysqli_num_rows( $result ); ';
					
					$post .= '}else{ ';		// There is a category that linked to this Page Address
					
					$post .= '$category = mysqli_fetch_array( $result, MYSQL_ASSOC ); ';
					$post .= '$sql = "SELECT * FROM posts WHERE category=';
					$post .= "'";
					$post .= '". $category["id"]. "';
					$post .= "'";
					$post .= '"; $result = mysqli_query( $connection, $sql ); $posts_nums = mysqli_num_rows( $result ); ';
					
					$post .= '} ';
					
					$post .= 'switch( $posts_nums ){ ';
					$post .= 'case(0): ';
					$post .= 'echo "پستی بااین موضوع وجود ندارد."; break; ';
					
					$post .= 'case(1): ';
					$post .= 'echo "<style> #post-continue{ display: none; } </style>"; ';
					$post .= '$post = mysqli_fetch_array( $result, MYSQL_ASSOC ); printf( ';
					$post .= "'". $post_wrap. "'";
					$post .= ', $post["id"], $post["title"], $post["image"], str_replace( array( "\n", "chr(13)" ), "<br>", $post["content"] ), $post["date"] ); break; ';
					
					$post .= 'default: ';
					$post .= 'echo "<style> #post-continue{ display: initial; } #post-image{ display: none; } </style>"; ';
					$post .= 'for( $c = 1; $c <= $posts_nums; $c++ ){ $post = mysqli_fetch_array( $result, MYSQL_ASSOC ); if( $post["status"] === "visible" ) ';
					$post .= 'printf( ';
					$post .= "'". $post_wrap. "'";
					$post .= ', base64_encode( base64_encode( $post["id"] ) ), $post["title"], $post["image"], str_replace( "\n", "<br>", substr( $post["content"], 0, 255 ) ), $post["date"] ); } } ';

					$post .= '}else{ ';
					
					$post .= 'echo "<style> #post-continue{ display: none; } </style>"; ';
					$post .= '$sql = "SELECT * FROM posts WHERE id=". base64_decode( base64_decode( $_GET["id"] ) ); $result = mysqli_query( $connection, $sql ); ';
					$post .= 'if( !$result ){ echo "چنین مطلبی وجود ندارد. لطفا از لینک های مجاز سایت استفاده نمایید."; }else{';
					$post .= '$post = mysqli_fetch_array( $result, MYSQL_ASSOC ); ';
					$post .= 'printf( ';
					$post .= "'". $post_wrap. "'";
					$post .= ', $post["id"], $post["title"], $post["image"], str_replace( array( "\n", "chr(13)" ), "<br>", $post["content"] ), $post["date"] ); } } ?>';

					$design = str_replace( $post_tag, $post, $design );
					$design = str_replace( '<p class="hidden">#post_read#</p>', '', $design);
					$design = str_replace( '<p class="hidden">#/post_read#</p>', '', $design);
					
// Replace POST read 2 PHP Tags

					$post_wrap_2 = substr( $design, strpos( $design, '<p class="hidden">#post_read_2#</p>' ), strpos( $design, '<p class="hidden">#/post_read_2#</p>' ) - strpos( $design, '<p class="hidden">#post_read_2#</p>' ) );
					
					$post_tag_2 = $post_wrap_2;
					
					$post_wrap_2 = str_replace( '<p class="hidden">#post_read_2#</p>', '', $post_wrap_2);
					$post_wrap_2 = str_replace( "25 اسفند 1394", '%5$s', $post_wrap_2 );
					$post_wrap_2 = str_replace( "چراغ مطالعه طرح سوسن", '%2$s', $post_wrap_2 );
					$post_wrap_2 = str_replace( "http://cheltikkeh.com/includes/images/modules/content64.jpg", '%3$s', $post_wrap_2 );
					$post_wrap_2 = str_replace( "بدنه استیل زد خش<br>چهار عدد لامپ ال ای دی<br>سیم 1.5 متری<br>دارای باطری با قابلیت شارژ برای 7 ساعت کار کرد<br>دو حالت روشنایی: روشنایی 50% و روشنایی 100%<br>ارتفاع: 45 سانتی متر<br>وزن: 340 گرم<br><br>قیمت برای مصرف کننده: 20,0000 تومان<br>هزینه ارسال به خارج از استان: 2,000 تومان", '%4$s', $post_wrap_2 );

					$post_2 = '<?php $self_splited = explode( "/", $_SERVER["PHP_SELF"] ); $page_address = $self_splited[ sizeof( $self_splited ) - 2 ]; ';
					
					$post_2 .= '$sql = "SELECT * FROM categories WHERE link=';
					$post_2 .= "'";
					$post_2 .= '". $page_address. "'; 
					$post_2 .= "'";
					$post_2 .= '"; $result = mysqli_query( $connection, $sql ); $nums = mysqli_num_rows( $result ); ';
					
					$post_2 .= 'if( $nums === 0 ){ ';		// There is no categories that linked to this Page Address
					
					$post_2 .= '$sql = "SELECT * FROM posts WHERE category=1"; $result = mysqli_query( $connection, $sql ); $posts_nums = mysqli_num_rows( $result ); ';
					
					$post_2 .= '}else{ ';		// There is a category that linked to this Page Address
					
					$post_2 .= '$category = mysqli_fetch_array( $result, MYSQL_ASSOC ); ';
					$post_2 .= '$sql = "SELECT * FROM posts WHERE category=';
					$post_2 .= "'";
					$post_2 .= '". $category["id"]. "';
					$post_2 .= "'";
					$post_2 .= '"; $result = mysqli_query( $connection, $sql ); $posts_nums = mysqli_num_rows( $result ); ';
					
					$post_2 .= '} ';
					
					$post_2 .= 'switch( $posts_nums ){ ';
					$post_2 .= 'case(0): ';
					$post_2 .= 'echo "مطلبی درباره این موضوع وجود ندارد."; break; ';
					
					$post_2 .= 'default: ';
					$post_2 .= 'for( $c = 1; $c <= $posts_nums; $c++ ){ $post = mysqli_fetch_array( $result, MYSQL_ASSOC ); if( $post["status"] === "visible" ) ';
					$post_2 .= 'if( $c === 1 || $c%2 === 1 ){ printf( ';
					$post_2 .= "'<div class=";
					$post_2 .= '"dirrtl">'. $post_wrap_2;
					$post_2 .= "</div>'";
					$post_2 .= ', $post["id"], $post["title"], $post["image"], str_replace( "\n", "<br>", $post["content"] ), $post["date"] ); ';
					
					$post_2 .= '}else{ printf( ';
					$post_2 .= "'<div class=";
					$post_2 .= '"dirltr">'. $post_wrap_2;
					$post_2 .= "</div>'";
					$post_2 .= ', $post["id"], $post["title"], $post["image"], str_replace( "\n", "<br>", $post["content"] ), $post["date"] ); ';

					$post_2 .= '} } } ?>';
					
					$design = str_replace( $post_tag_2, $post_2, $design );
					$design = str_replace( '<p class="hidden">#post_read_2#</p>', '', $design);
					$design = str_replace( '<p class="hidden">#/post_read_2#</p>', '', $design);
//-----------------------------------------------------------------------------------------------------------------------------//
					
// Replace DBNAME in Query Code

					$dbname = base64_encode( substr( $site_db['DB_NAME'], 0, strpos( $site_db['DB_NAME'], "_" ) ) );
					$design = str_replace( "#token#", $dbname , $design );
					
					$page_file = $dir. '/index.php';
					
					$myfile = fopen($page_file, "w");
					fwrite($myfile, $design);
					fclose($myfile);
					break;
			}
	}else{
		echo 'شما مجاز به ورود به این صفحه نیستید.';
	}
