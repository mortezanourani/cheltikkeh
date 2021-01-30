<style>
.header11{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header11-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}
.text11-1{
	position: absolute;
	width: 90%;
	bottom:65%;
	left: 5%;
	right: 5%;
	margin: 0px;
	text-align: center;
	font: bold 100px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text11-2{
	position: absolute;
	direction: rtl;
	width: 100%;
	top: 30%;
	text-align: center;
	margin: 0px;
	font: 50px davat, roya, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu11{
	position: absolute;
	width: 50%;
	right: 25%;
	left: 25%;
	bottom: 10%;
	padding: 0px;
	text-align: center;
	z-index: 3;
}
.button11{
	position: relative;
	width: 300px;
	height: 70px;
	border-radius: 5px;
	background-color: transparent;
	outline: none;
	border: 2px solid rgba(255, 255, 255, 1);
	text-align: right;
	padding-right: 75px;
	font: bold 25px mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button11:hover{
	opacity: 0.5;
}
.button11:active{
	opacity: 0.75;
}
.button11:before{
	position: absolute;
	top: 17px;
	right: 25px;
	font: 30px icon;
}
#button11:before{
	content: "\f02d";
}

@media screen and (max-width: 480px){
	.header11{
		right: -300px;
	}
	.text11-1{
		width: 100%;
		bottom: 70%;
		right: 0px;
		text-align: center;
		font: bold 70px roya, mitra, nazanin;
		z-index: 3;
	}
	.text11-2{
		width: 100%;
		top: 30%;
		right: 0px;
		left: 0px;
		text-align: center;
		font: 30px davat, roya, nazanin;
		z-index: 3;
	}
	.app-menu11{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		bottom: 15%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="text11-1" settings="text,font">مسابقه عکاسی</p>
	<p class="text11-2" settings="text,font">آخرین مهلت ارسال آثار 15 فروردین</p>
	</center>
	<menu class="app-menu11">
		<a href="#"><button class="button11" id="button11" settings="text,font,bordercolor">شرایط شرکت در مسابقه</button></a>
	</menu>
	<center><div class="header11-shadow"><img class="header11" src="http://cheltikkeh.com/includes/images/modules/header11.jpg" settings="src,parent-backcolor"></div></center>
</div>