<style>
.header15{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header15-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title15{
	position: absolute;
	bottom: 50%;
	right: 10%;
	margin: 0px;
	text-align: right;
	font: bold 80px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(255, 250, 180, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc15{
	position: absolute;
	direction: rtl;
	bottom: 67%;
	right: 10%;
	text-align: right;
	margin: 0px;
	font: bold 35px nazanin, davat;
	color: rgba(255, 250, 180, 1);
	text-shadow: 1px 1px 2px rgba(235, 85, 5, 0);
	z-index: 3;
}
.app-menu15{
	direction: rtl;
	position: absolute;
	right: 10%;
	bottom: 15%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button15{
	position: relative;
	direction: rtl;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(255, 250, 180, 1);
	border: 2px solid rgba(255, 255, 255, 0);
	text-align: right;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 27px nazanin;
	color: rgba(85, 35, 25, 1);
	margin-left: 10px;
	z-index: 3;
}
.button15:before{
	position: absolute;
	top: 13px;
	right: 15px;
	font: 35px icon;
}
#button15-1:before{
	content: "\f017";
}
#button15-2{
	background-color: rgba(85, 35, 25, 0);
	border-color: rgba(255, 250, 180, 1);
	color: rgba(255, 250, 180, 1);
}
#button15-2:before{
	content: "\f041";
}
.text15{
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
	.title15{
		width: 90%;
		top: 35%;
		right: 5%;
		padding: 0px;
		text-align: center;
		font: bold 50px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc15{
		width: 100%;
		bottom: 63%;
		right: 0px;
		left: 0px;
		text-align: center;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu15{
		position: absolute;
		width: 90%;
		right: 5%;
		bottom: 15%;
		padding: 0px;
		text-align: right;
		border-radius: 5px;
		z-index: 3;
	}
	.button15{
		font-size: 20px;
		margin-bottom: 10px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 655px; overflow: hidden;">
	<center>
	<p class="title15" settings="font">کافه دور همی</p>
	<p class="desc15" settings="font">جایی برای با هم بودن</p>
	</center>
	<menu class="app-menu15">
		<button class="button15" id="button15-1" settings="text,font,backcolor">11 الی 22</button>
		<button class="button15" id="button15-2" settings="text,font,bordercolor">خیابان نامجو، جنب کتاب کده ادیب</button>
	</menu>
	<p class="text15" settings="font,text">نشستن در کافه رایگان است</p>
	<center><div class="header15-shadow"><img class="header15" src="http://cheltikkeh.com/includes/images/modules/header15.jpg" settings="src"></div></center>
</div>