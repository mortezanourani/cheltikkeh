<style>
.header9{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header9-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title9{
	position: absolute;
	width: 90%;
	bottom: 75%;
	left: 5%;
	right: 5%;
	text-align: center;
	margin: 0px;
	font: bold 70px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc9{
	position: absolute;
	width: 90%;
	top: 25%;
	right: 5%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 30px nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text9{
	position: absolute;
	direction: rtl;
	width: 90%;
	top: 70%;
	right: 5%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu9{
	position: absolute;
	width: 90%;
	right: 5%;
	left: 5%;
	top: 40%;
	padding: 0px;
	text-align: center;
	z-index: 3;
}
.button9{
	position: relative;
	width: 200px;
	height: 70px;
	border-radius: 5px;
	background-color: rgba(230, 230, 230, 1);
	outline: none;
	border: 2px solid rgba(0, 0, 0, 1);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button9:hover{
	opacity: 0.75;
}
.button9:active{
	opacity: 0.5;
}
.button9:before{
	position: absolute;
	top: 20px;
	right: 25px;
	font: 30px icon;
}
#button9-1:before{
	content: "\f1b2";
}
#button9-2{
	background-color: rgba(0, 0, 0, 1);
	border-color: rgba(0, 0, 0, 0);
	color: rgba(230, 230, 225, 1);
}
#button9-2:before{
	content: "\f005";
}
#button9-3:before{
	content: "\f040";
}

@media screen and (max-width: 480px){
	.header9{
		left: -100px;
	}
	.title9{
		width: 100%;
		bottom: 80%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc9{
		width: 100%;
		top: 20%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.app-menu9{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: 27%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
	.app-menu9 button{
		margin-bottom: 0px;
	}
	.text9{
		width: 80%;
		top: 75%;
		right: 10%;
		left: 10%;
		text-align: center;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center><p class="title9" settings="font">نوین دکوراتور</p></center>
	<center><p class="desc9" settings="font">طراح و مجری دکوراسیون داخلی</p></center>
	<center><p class="text9" settings="text,font">وارد کننده مبلمان و سرویس خواب، طراحی و اجرای دکوراسیون داخلی منزل، محل کار و نمایشگاه های هنری</p></center>
	<menu class="app-menu9">
		<a href="#"><button class="button9" id="button9-1" settings="text,font,backcolor,bordercolor,parent-href">محصولات</button></a>
		<a href="#"><button class="button9" id="button9-2" settings="text,font,backcolor,bordercolor,parent-href">نمونه کارها</button></a>
		<a href="#"><button class="button9" id="button9-3" settings="text,font,backcolor,bordercolor,parent-href">ثبت سفارش</button></a>
	</menu>
	<center><div class="header9-shadow"><img class="header9" src="http://cheltikkeh.com/includes/images/modules/header9.jpg" settings="src,parent-backcolor"></div></center>
</div>