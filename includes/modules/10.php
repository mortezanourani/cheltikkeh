<style>
.header10{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header10-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.logo10{
	position: absolute;
	width: 150px;
	height: 150px;
	background-position: center;
	right: 10%;
	top: 18%;
	border-radius: 50%;
	border: 4px solid rgba(180, 0, 0, 1);
	background-color: rgba(245, 245, 245, 1);
	box-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	opacity: 1;
	z-index: 2;
}
.title10{
	position: absolute;
	width: 70%;
	top: 15%;
	right: 30%;
	text-align: right;
	margin: 0px;
	font: bold 70px mitra, nazanin;
	color: rgba(180, 0, 0, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.desc10{
	position: absolute;
	width: 70%;
	bottom: 60%;
	right: 30%;
	text-align: right;
	margin: 0px;
	font: bold 40px nazanin;
	color: rgba(180, 0, 0, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.text10{
	position: absolute;
	direction: rtl;
	width: 90%;
	top: 65%;
	right: 30%;
	left: 5%;
	text-align: right;
	margin: 0px;
	font: bold 30px nazanin;
	color: rgba(180, 0, 0, 1);
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu10{
	position: absolute;
	width: 90%;
	right: 30%;
	left: 5%;
	top: 43%;
	padding: 0px;
	text-align: right;
	z-index: 3;
}
.button10{
	position: relative;
	direction: ltr;
	width: 300px;
	height: 70px;
	border-radius: 5px;
	background-color: rgba(245, 245, 245, 1);
	outline: none;
	border: 2px solid rgba(180, 0, 0, 1);
	text-align: left;
	padding-left: 55px;
	font: 20px mitra, nazanin;
	color: rgba(180, 0, 0, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button10:before{
	position: absolute;
	top: 13px;
	left: 15px;
	font: 35px icon;
}
#button10-1:before{
	content: "\f1df";
}
#button10-2{
	font: bold 25px nazanin;
	background-color: rgba(150, 0, 0, 1);
	border-color: rgba(245, 245, 245, 0);
	color: rgba(245, 245, 245, 1);
}
#button10-2:before{
	content: "\f098";
}

@media screen and (max-width: 480px){
	.header10{
		right: -300px;
	}
	.logo10{
		top: 5%;
		margin-right: -75px;
		right: 50%;
	}
	.title10{
		width: 100%;
		top: 30%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc10{
		width: 100%;
		top: 20%;
		right: 0px;
		text-align: center;
		display: none;
		z-index: 3;
	}
	.app-menu10{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: 40%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
	.app-menu10 button{
		margin-bottom: 0px;
	}
	.text10{
		width: 80%;
		top: 70%;
		right: 10%;
		left: 10%;
		text-align: center;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 655px; overflow: hidden;">
	<img class="logo10" src="http://cheltikkeh.com/includes/images/modules/moein.png" settings="src,backcolor,bordercolor">
	<center><p class="title10" settings="font">معین طراحان</p></center>
	<center><p class="desc10" settings="font">طراح و مجری دکوراسیون داخلی</p></center>
	<center><p class="text10" settings="text,font">پخش انحصاری کاغذ دیواری های کره ای در استان های سمنان، قم و مرکزی<br>طراحی و اجرای دکوراسیون داخلی منازل و دفاتر</p></center>
	<menu class="app-menu10">
		<button class="button10" id="button10-1" settings="text,font,backcolor,bordercolor">moeintarrahan@gmail.com</button>
		<button class="button10" id="button10-2" settings="text,font,backcolor,bordercolor">021-33050363</button>
	</menu>
	<center><div class="header10-shadow"><img class="header10" src="http://cheltikkeh.com/includes/images/modules/header10.jpg" settings="src,parent-backcolor"></div></center>
</div>