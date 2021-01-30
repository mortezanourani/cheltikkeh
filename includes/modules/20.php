<style>
.header20{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header20-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.text20-1{
	position: absolute;
	width: 90%;
	bottom: 65%;
	right: 5%;
	left: 5%;
	margin: 0px;
	text-align: right;
	font: bold 100px mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(50, 160, 255, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.text20-2{
	position: absolute;
	width: 90%;
	top: 35%;
	right: 5%;
	left: 5%;
	text-align: right;
	margin: 0px;
	font: bold 35px roya, nazanin, davat;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(50, 160, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu20{
	position: absolute;
	width: 90%;
	right: 5%;
	left: 5%;
	bottom: 30%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button20{
	position: relative;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(45, 45, 50, 0);
	border: 2px solid rgba(50, 160, 255, 1);
	text-align: left;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 23px roya, mitra, nazanin;
	color: rgba(50, 160, 255, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button20:hover{
	cursor: pointer;
	opacity: 0.75;
}
.button20:before{
	position: absolute;
	top: 20px;
	right: 15px;
	font: 25px icon;
}
#button20-1{
	background-color: rgba(50, 160, 255, 1);
	color: rgba(230, 230, 230, 1);
}
#button20-1:before{
	content: "\f02c";
}
#button20-2:before{
	content: "\f07a";
}

@media screen and (max-width: 480px){
	.text20-1{
		width: 90%;
		bottom: 75%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 50px mitra, nazanin;
		z-index: 3;
	}
	.text20-2{
		width: 90%;
		top: 25%;
		right: 5%;
		left: 5%;
		margin: 0px;
		text-align: center;
		font: bold 25px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu20{
		width: 100%;
		right: 0px;
		left: 0px;
		bottom: 10%;
		text-align: center;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="text20-1" settings="text,font">فروش ویژه</p>
	<p class="text20-2" settings="text,font">تمامی محصولات اپل، با قیمتی استثنایی</p>
	</center>
	<menu class="app-menu20">
		<a href="#"><button class="button20" id="button20-1" settings="text,font,backcolor,parent-href">لیست قیمت ها</button></a>
		<a href="#"><button class="button20" id="button20-2" settings="text,font,bordercolor,parent-href">سفارش آنلاین</button></a>
	</menu>
	<center><div class="header20-shadow"><img class="header20" src="http://cheltikkeh.com/includes/images/modules/header20.jpg" settings="src,parent-backcolor"></div></center>
</div>