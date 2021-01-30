<style>
.header14{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header14-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title14{
	position: absolute;
	bottom: 55%;
	right: 10%;
	margin: 0px;
	text-align: right;
	font: bold 80px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0.5);
	color: rgba(255, 255, 255, 1);
	padding: 0px 15px;
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc14{
	position: absolute;
	direction: rtl;
	top: 45%;
	right: 10%;
	text-align: right;
	margin: 0px;
	font: bold 35px roya, nazanin, davat;
	color: rgba(130, 60, 50, 1);
	text-shadow: 1px 1px 2px rgba(235, 85, 5, 0);
	z-index: 3;
}
.app-menu14{
	direction: ltr;
	position: absolute;
	left: 15%;
	bottom: 10%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button14{
	position: relative;
	direction: ltr;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(130, 60, 50, 0);
	border: 2px solid rgba(130, 60, 50, 1);
	text-align: left;
	padding-left: 55px;
	padding-right: 15px;
	font: bold 20px arial, mitra, nazanin;
	color: rgba(130, 60, 50, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button14:before{
	position: absolute;
	top: 13px;
	left: 15px;
	font: 35px icon;
}
#button14-1:before{
	content: "\f1df";
}
#button14-2{
	font: bold 27px nazanin;
	background-color: rgba(130, 60, 50, 1);
	border-color: rgba(245, 245, 245, 0);
	color: rgba(245, 245, 245, 1);
}
#button14-2:before{
	content: "\f098";
}

@media screen and (max-width: 480px){
	.title14{
		width: 90%;
		bottom: 75%;
		right: 5%;
		padding: 0px;
		text-align: center;
		font: bold 50px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc14{
		width: 100%;
		top: 30%;
		right: 0px;
		left: 0px;
		text-align: center;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu14{
		position: absolute;
		width: 100%;
		left: 0px;
		bottom: 10%;
		padding: 0px;
		text-align: center;
		border-radius: 5px;
		z-index: 3;
	}
	.button14{
		font-size: 20px;
		margin-bottom: 0px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="title14" settings="font">صنایع چوب نوین</p>
	<p class="desc14" settings="font">تولید کننده انواع میز، کمد دیواری، کابینت و سرویس آشپزخانه</p>
	</center>
	<menu class="app-menu14">
		<button class="button14" id="button14-2" settings="text,font,backcolor">021-33445566</button>
		<button class="button14" id="button14-1" settings="text,font,bordercolor">novinwood@cheltikkeh.com</button>
	</menu>
	<center><div class="header14-shadow"><img class="header14" src="http://cheltikkeh.com/includes/images/modules/header14.jpg" settings="src,parent-backcolor"></div></center>
</div>