<style>
.header13{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header13-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}
.title13{
	position: absolute;
	width: 75%;
	bottom:65%;
	right: 5%;
	margin: 0px;
	text-align: right;
	font: bold 80px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc13{
	position: absolute;
	direction: rtl;
	width: 75%;
	top: 32%;
	right: 5%;
	text-align: right;
	margin: 0px;
	font: bold 45px nazanin, roya, davat;
	color: rgba(255, 255, 255, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu13{
	position: absolute;
	direction: ltr;
	width: 90%;
	right: 5%;
	bottom: 10%;
	padding: 0px;
	text-align: center;
	z-index: 3;
}
.button13{
	position: relative;
	width: 24%;
	border-radius: 5px;
	outline: none;
	border: 2px solid rgba(255, 255, 255, 1);
	text-align: center;
	padding-top: 16%;
	font: bold 25px mitra, nazanin;
	background-color: rgba(255, 255, 255, 1);
	background-size: 100% auto;
	background-repeat: no-repeat;
	color: rgba(0, 0, 0, 1);
	margin: 0px 2px;
	opacity: 1;
	z-index: 3;
}
.button13:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	.header13{
		right: -400px;
	}
	.title13{
		width: 100%;
		bottom: 75%;
		right: 0px;
		text-align: center;
		font: bold 50px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc13{
		width: 100%;
		top: 25%;
		right: 0px;
		left: 0px;
		text-align: center;
		font: 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu13{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: auto;
		bottom: 10%;
		padding: 0px;
		text-align: center;
		border-radius: 5px;
		z-index: 3;
	}
	.button13{
		width: 45%;
		padding-top: 30%;
		font-size: 20px;
		margin-bottom: 5px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 655px; overflow: hidden;">
	<center>
	<p class="title13" settings="font">رستوران فست فود</p>
	<p class="desc13" settings="font">انواع سالاد، انواع فست فود، غذای دریایی و دسر</p>
	</center>
	<menu class="app-menu13">
		<a href="#"><button class="button13" style="background-image: url('/includes/images/modules/header13-1.jpg');" settings="backimage,backcolor,bordercolor,font,text,parent-href">سالاد</button></a>
		<a href="#"><button class="button13" style="background-image: url('/includes/images/modules/header13-2.jpg');" settings="backimage,backcolor,bordercolor,font,text,parent-href">پیتزا</button></a>
		<a href="#"><button class="button13" style="background-image: url('/includes/images/modules/header13-3.jpg');" settings="backimage,backcolor,bordercolor,font,text,parent-href">غذای دریایی</button></a>
		<a href="#"><button class="button13" style="background-image: url('/includes/images/modules/header13-4.jpg');" settings="backimage,backcolor,bordercolor,font,text,parent-href">دسر</button></a>
	</menu>
	<center><div class="header13-shadow"><img class="header13" src="http://cheltikkeh.com/includes/images/modules/header13.jpg" settings="src,parent-backcolor"></div></center>
</div>