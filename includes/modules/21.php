<style>
.header21{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header21-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title21{
	position: absolute;
	bottom: 65%;
	right: 5%;
	margin: 0px;
	text-align: right;
	font: bold 75px mitra, nazanin;
	background-color: rgba(0, 0, 0, 0.5);
	color: rgba(240, 185, 25, 1);
	padding: 0px 15px;
	border-radius: 7px;
	text-shadow: 1px 1px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.desc21{
	position: absolute;
	top: 35%;
	right: 5%;
	text-align: right;
	margin: 0px;
	font: bold 35px roya, nazanin, davat;
	padding: 0px 15px;
	border-radius: 7px;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(230, 60, 60, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu21{
	position: absolute;
	left: 5%;
	top: 65%;
	text-align: left;
	border-radius: 7px;
	padding: 0px 15px;
	background-color: rgba(0, 0, 0, 0.5);
	z-index: 3;
}
.button21{
	position: relative;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(45, 45, 50, 0);
	border: 2px solid rgba(235, 245, 160, 1);
	text-align: right;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 23px roya, mitra, nazanin;
	color: rgba(235, 245, 160, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button21:hover{
	opacity: 0.6;
	cursor: pointer;
}
.button21:before{
	position: absolute;
	top: 20px;
	right: 15px;
	font: 25px icon;
}
#button21-1{
	background-color: rgba(235, 245, 160, 1);
	color: rgba(230, 60, 60, 1);
}
#button21-1:before{
	content: "\f005";
}
#button21-2:before{
	content: "\f02a";
}

@media screen and (max-width: 480px){
	.title21{
		width: 90%;
		bottom: 75%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 40px mitra, nazanin;
		z-index: 3;
	}
	.desc21{
		width: 90%;
		top: 35%;
		right: 5%;
		left: 5%;
		padding: 0px;
		margin: 0px;
		text-align: center;
		font: bold 22px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu21{
		width: 100%;
		right: 0%;
		left: 0%;
		bottom: 0%;
		top: auto;
		padding: 5px 0px;
		margin: 0px;
		text-align: center;
		background-color: rgba(0, 0, 0, 0.5);
	}
	.button21{
		width: 45%;
		margin: 5px 0px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="title21" settings="font">کانون تبلیغاتی مشاوران شرق</p>
	<p class="desc21" settings="font">طراحی لوگو، کارت ویزیت، پاکت و پوشه<br>چاپ انواع کارت ویزیت، پاکت و پوشه<br>چاپ روی انواع لیوان، نوشت افزار و پیکسل</p>
	</center>
	<menu class="app-menu21">
		<a href="#"><button class="button21" id="button21-1" settings="text,font,backcolor,parent-href">نمونه کار ها</button></a>
		<a href="#"><button class="button21" id="button21-2" settings="text,font,bordercolor,parent-href">درباره ما</button></a>
	</menu>
	<center><div class="header21-shadow"><img class="header21" src="http://cheltikkeh.com/includes/images/modules/header21.jpg" settings="src"></div></center>
</div>