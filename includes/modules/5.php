<style>
.header5{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 50%;
	margin-left: -683px;
	opacity: 0.5;
	z-index: 2;
}
.header5-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(150, 100, 0, 1);
	z-index: 1;
}
.title5{
	position: absolute;
	width: 90%;
	top: 30%;
	right: 5%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: Bold 70px mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.desc5{
	position: absolute;
	width: 90%;
	bottom: 70%;
	right: 5%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 40px mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.text5{
	position: absolute;
	direction: rtl;
	width: 50%;
	top: 65%;
	right: 25%;
	left: 25%;
	text-align: center;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu{
	position: absolute;
	width: 50%;
	left: 25%;
	top: 45%;
	padding: 0px;
	border-radius: 5px;
	z-index: 3;
}
.button5{
	position: relative;
	width: 200px;
	height: 70px;
	left: 0px;
	border-radius: 5px;
	background-color: rgba(255, 255, 255, 1);
	outline: none;
	border: 2px solid rgba(255, 255, 255, 0);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button5:hover{
	opacity: 0.75;
}
.button5:active{
	opacity: 0.5;
}
.button5:before{
	position: absolute;
	top: 15px;
	right: 25px;
	font: 30px icon;
}
#button5-1{
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	background-color: rgba(255, 255, 255, 1);
	color: rgba(90, 60, 30, 1);
}
#button5-1:before{
	content: "\f091";
}
#button5-2{
	box-shadow: 0px 0px 3px rgba(255, 255, 255, 1);
	background-color: rgba(90, 60, 30, 1);
	color: rgba(255, 255, 255, 1);
}
#button5-2:before{
	content: "\f135";
}

@media screen and (max-width: 480px){
	.title5{
		width: 100%;
		top: 15%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc5{
		width: 100%;
		bottom: 85%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.text5{
		width: 90%;
		top: 69%;
		right: 5%;
		left: 5%;
		text-align: center;
		z-index: 3;
	}
	.app-menu{
		position: absolute;
		width: 50%;
		left: 25%;
		top: 30%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 660px; overflow: hidden;">
	<center><p class="desc5" settings="font">ما شما را زبان زد می کنیم</p></center>
	<center><p class="title5" settings="font">کانون تبلیغاتی نوین</p></center>
	<center><p class="text5" settings="text,font">در دنیای امروزی، با افزایش رقبای اقتصادی، تبلیغات سالم بهترین راه برای پیشرفت است. ما این کار را ساده تر و ارزان تر برای شما انجام می دهیم. حرفه ای کار کیند.</p></center>
	<center>
	<menu class="app-menu">
	<a href="#"><button class="button5" id="button5-1" settings="text,font,backcolor,parent-href">نمونه کارها</button></a>
	<a href="#"><button class="button5" id="button5-2" settings="text,font,backcolor,parent-href">ثبت سفارش</button></a>
	</menu>
	</center>
	<center><div class="header5-shadow"><img class="header5" src="http://cheltikkeh.com/includes/images/modules/header5.jpg" settings="src,parent-backcolor"></div></center>
</div>