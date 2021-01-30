<style>
.header12{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header12-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}
.text12-1{
	position: absolute;
	width: 75%;
	bottom:65%;
	right: 3%;
	margin: 0px;
	text-align: right;
	font: bold 100px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text12-2{
	position: absolute;
	direction: rtl;
	width: 75%;
	top: 32%;
	right: 3%;
	text-align: right;
	margin: 0px;
	font: bold 45px nazanin, roya, davat;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text12-3{
	position: absolute;
	direction: rtl;
	width: 75%;
	bottom: 30%;
	right: 3%;
	text-align: right;
	margin: 0px;
	font: 25px roya, davat, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu12{
	position: absolute;
	width: 75%;
	right: 3%;
	top: 70%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button12{
	position: relative;
	width: 210px;
	height: 70px;
	border-radius: 5px;
	background-color: rgba(235, 185, 50, 1);
	outline: none;
	border: 2px solid rgba(235, 185, 50, 1);
	text-align: right;
	padding-right: 70px;
	font: bold 25px mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button12:hover{
	opacity: 0.5;
}
.button12:active{
	opacity: 0.75;
}
.button12:before{
	position: absolute;
	top: 17px;
	right: 25px;
	font: 30px icon;
}
#button12-1:before{
	content: "\f097";
}
#button12-2{
	background-color: rgba(255, 255, 255, 0);
	border-color: rgba(235, 185, 50, 1);
	color: rgba(235, 185, 50, 1);
}
#button12-2:before{
	content: "\f040";
}

@media screen and (max-width: 480px){
	.header12{
		right: -400px;
	}
	.text12-1{
		width: 100%;
		bottom: 75%;
		right: 0px;
		text-align: center;
		font: bold 70px roya, mitra, nazanin;
		z-index: 3;
	}
	.text12-2{
		width: 100%;
		top: 23%;
		right: 0px;
		left: 0px;
		text-align: center;
		font: 30px nazanin, davat, roya;
		z-index: 3;
	}
	.text12-3{
		width: 90%;
		top: 75%;
		right: 5%;
		left: 5%;
		text-align: center;
		font: 25px roya, nazanin, davat;
		z-index: 3;
	}
	.app-menu12{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: auto;
		bottom: 25%;
		padding: 0px;
		text-align: center;
		border-radius: 5px;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="text12-1" settings="text,font">پیش فروش</p>
	<p class="text12-2" settings="text,font">برج های مسکونی شهرک نوین</p>
	<p class="text12-3" settings="text,font">پیش فروش واحد های مسکونی هفت برج 21 طبقه شهرک مسکونی نوین با شرایط استثنائی</p>
	</center>
	<menu class="app-menu12">
		<a href="#"><button class="button12" id="button12-1" settings="text,font,backcolor">اطلاعات بیشتر</button></a>
		<a href="#"><button class="button12" id="button12-2" settings="text,font,bordercolor">ثبت نام</button></a>
	</menu>
	<center><div class="header12-shadow"><img class="header12" src="http://cheltikkeh.com/includes/images/modules/header12.jpg" settings="src,parent-backcolor"></div></center>
</div>