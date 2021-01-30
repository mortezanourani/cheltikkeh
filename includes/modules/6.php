<style>
.header6{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 50%;
	margin-left: -683px;
	opacity: 1;
	z-index: 2;
}
.header6-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title6{
	position: absolute;
	width: 45%;
	bottom: 70%;
	right: 5%;
	left: 50%;
	text-align: right;
	margin: 0px;
	font: bold 70px mitra, nazanin;
	color: rgba(70, 130, 190, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc6{
	position: absolute;
	width: 45%;
	top: 27%;
	right: 5%;
	left: 50%;
	text-align: right;
	margin: 0px;
	font: bold 40px nazanin;
	color: rgba(70, 130, 190, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text6{
	position: absolute;
	direction: rtl;
	width: 45%;
	top: 65%;
	right: 5%;
	left: 50%;
	text-align: justify;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(70, 130, 190, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu6{
	position: absolute;
	width: 40%;
	right: 5%;
	left: 50%;
	top: 37%;
	padding: 0px;
	z-index: 3;
}
.button6{
	position: relative;
	width: 200px;
	height: 70px;
	left: 0px;
	border-radius: 5px;
	background-color: rgba(70, 130, 190, 0);
	outline: none;
	border: 2px solid rgba(70, 130, 190, 1);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(70, 130, 190, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button6:hover{
	opacity: 0.75;
}
.button6:active{
	opacity: 0.5;
}
.button6:before{
	position: absolute;
	top: 12px;
	right: 17px;
	font: 40px icon;
}
#button6:before{
	content: "\f05a";
}

@media screen and (max-width: 480px){
	.title6{
		width: 100%;
		bottom: 75%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc6{
		width: 100%;
		top: 25%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.app-menu6{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: 35%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
	.text6{
		width: 90%;
		top: 65%;
		right: 5%;
		left: 5%;
		text-align: center;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 450px; overflow: hidden;">
	<center><p class="title6" settings="font">گروه چل تیکه</p></center>
	<center><p class="desc6" settings="font">ارائه دهنده خدمات فضای مجازی</p></center>
	<center><p class="text6" settings="text,font">طراحی وب سایت، پشتیبانی و مانیتورینگ، تبلیغات فضای مجازی، ارائه مشاوره های کسب و کارهای اینترنتی، سرمایه گذاری برای استارتاپ های دارای آینده</p></center>
	<center>
	<menu class="app-menu6">
		<a href="#"><button class="button6" id="button6" settings="text,font,backcolor,bordercolor,parent-href">اطلاعات بیشتر</button></a>
	</menu>
	</center>
	<center><div class="header6-shadow"><img class="header6" src="http://cheltikkeh.com/includes/images/modules/header6.jpg" settings="src"></div></center>
</div>