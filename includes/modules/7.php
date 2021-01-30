<style>
.header7{
	position: absolute;
	width: 1366px;
	background-position: center;
	right: 175px;
	margin-right: -175px;
	opacity: 1;
	z-index: 2;
}
.header7-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title7{
	position: absolute;
	width: 45%;
	bottom: 70%;
	right: 45%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 70px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 5px rgba(255, 255, 255, 0);
	z-index: 3;
}
.desc7{
	position: absolute;
	width: 45%;
	top: 28%;
	right: 45%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 30px nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text7{
	position: absolute;
	direction: rtl;
	width: 45%;
	top: 70%;
	right: 45%;
	left: 10%;
	text-align: center;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	padding: 10px;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0.5);
	z-index: 3;
}
.app-menu7{
	position: absolute;
	width: 45%;
	right: 45%;
	left: 5%;
	top: 40%;
	padding: 0px;
	z-index: 3;
}
.button7{
	position: relative;
	width: 200px;
	height: 70px;
	left: 0px;
	border-radius: 5px;
	background-color: rgba(255, 255, 255, 1);
	outline: none;
	border: 2px solid rgba(235, 85, 5, 0);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(240, 175, 90, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button7:hover{
	opacity: 0.75;
}
.button7:active{
	opacity: 0.5;
}
.button7:before{
	position: absolute;
	top: 12px;
	right: 17px;
	font: 40px icon;
}
#button7-1:before{
	content: "\f05a";
}
#button7-2{
	background-color: rgba(235, 85, 5, 0);
	border-color: rgba(255, 255, 255, 1);
	color: rgba(255, 255, 255, 1);
}
#button7-2:before{
	content: "\f21d";
}

@media screen and (max-width: 480px){
	.header7{
		right: -25px;
	}
	.title7{
		width: 100%;
		bottom: 80%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc7{
		width: 100%;
		top: 20%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.app-menu7{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: 25%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
	.app-menu7 button{
		margin-bottom: 0px;
	}
	.text7{
		width: 80%;
		top: 65%;
		right: 10%;
		left: 10%;
		text-align: center;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 500px; overflow: hidden;">
	<center><p class="title7" settings="font">عکاسان نوین</p></center>
	<center><p class="desc7" settings="font">برگزار کننده ی کلاس های عکاسی</p></center>
	<center><p class="text7" settings="text,font">تیم آموزشی عکاسان نوین با حمایت و همیاری اساتید بزرگ عکاسی ایران، اقدام به برگزاری کلاس های عکاسی نوین در دو مقطع مبتدی و حرفه ای نموده است.</p></center>
	<center>
	<menu class="app-menu7">
		<a href="#"><button class="button7" id="button7-1" settings="text,font,backcolor,parent-href">اطلاعات بیشتر</button></a>
		<a href="#"><button class="button7" id="button7-2" settings="text,font,bordercolor,parent-href">ثبت نام</button></a>
	</menu>
	</center>
	<center><div class="header7-shadow"><img class="header7" src="http://cheltikkeh.com/includes/images/modules/header7.jpg" settings="src"></div></center>
</div>