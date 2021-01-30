<style>
.header16{
	position: absolute;
	width: 1366px;
	left: 0px;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header16-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.text16-1{
	position: absolute;
	bottom: 60%;
	right: 10%;
	margin: 0px;
	text-align: right;
	font: bold 70px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(200, 50, 20, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text16-2{
	position: absolute;
	direction: rtl;
	top: 35%;
	right: 12%;
	text-align: right;
	margin: 0px;
	font: bold 35px roya, nazanin, davat;
	color: rgba(200, 50, 20, 1);
	text-shadow: 1px 1px 2px rgba(235, 85, 5, 0);
	z-index: 3;
}
.app-menu16{
	direction: rtl;
	position: absolute;
	right: 10%;
	bottom: 35%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button16{
	position: relative;
	direction: rtl;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(255, 247, 240, 1);
	border: 2px solid rgba(200, 50, 20, 0);
	text-align: right;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 27px nazanin;
	color: rgba(200, 50, 20, 1);
	z-index: 3;
}
.button16:hover{
	cursor: pointer;
	opacity: 0.75;
}
.button16:before{
	position: absolute;
	top: 17px;
	right: 17px;
	font: 30px icon;
}
#button16:before{
	content: "\f07a";
}
.text16{
	position: absolute;
	direction: rtl;
	bottom: 10%;
	right: 10%;
	text-align: right;
	margin: 0px;
	font: 25px roya, nazanin, davat;
	color: rgba(255, 250, 180, 1);
	text-shadow: 1px 1px 2px rgba(235, 85, 5, 0);
	z-index: 3;
}

@media screen and (max-width: 480px){
	.header16{
		left: -50%;
	}
	.text16-1{
		width: 90%;
		bottom: 65%;
		right: 5%;
		padding: 0px;
		text-align: right;
		font: bold 50px roya, mitra, nazanin;
		z-index: 3;
	}
	.text16-2{
		width: 90%;
		top: 35%;
		right: 5%;
		left: auto;
		text-align: right;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu16{
		position: absolute;
		width: 90%;
		right: 5%;
		bottom: 35%;
		padding: 0px;
		text-align: right;
		border-radius: 5px;
		z-index: 3;
	}
	.button16{
		font-size: 20px;
		margin-bottom: 10px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 655px; overflow: hidden;">
	<center>
	<p class="text16-1" settings="text,font">%50 تخفیف</p>
	<p class="text16-2" settings="text,font">جشنواره نوروزی تا پایان فروردین</p>
	</center>
	<menu class="app-menu16">
		<a href="#"><button class="button16" id="button16" settings="text,font,backcolor">سفارش اینترنتی</button></a>
	</menu>
	<center><div class="header16-shadow"><img class="header16" src="http://cheltikkeh.com/includes/images/modules/header16.jpg" settings="src"></div></center>
</div>