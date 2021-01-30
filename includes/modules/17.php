<style>
.header17{
	position: absolute;
	width: 1366px;
	right: 0%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header17-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title17{
	position: absolute;
	bottom: 60%;
	right: 5%;
	margin: 0px;
	text-align: right;
	font: bold 100px mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(35, 50, 80, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc17{
	position: absolute;
	direction: rtl;
	top: 37%;
	right: 5%;
	text-align: right;
	margin: 0px;
	font: bold 35px roya, nazanin, davat;
	padding: 10px;
	border-radius: 3px;
	background-color: rgba(35, 50, 80, 0.5);
	color: rgba(235, 240, 250, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu17{
	direction: rtl;
	position: absolute;
	left: 10%;
	bottom: 5%;
	padding: 0px;
	z-index: 3;
}
.button17{
	position: relative;
	direction: rtl;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(0, 0, 0, 0);
	border: 2px solid rgba(0, 0, 0, 0);
	font: bold 27px nazanin;
	color: rgba(35, 50, 80, 1);
	z-index: 3;
}
.button17:hover{
	cursor: pointer;
	opacity: 0.75;
}
.button17:before{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	left: 0px;
	font: 75px icon;
	content: "\f13a";
}
.text17{
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
	.header17{
		right: -85%;
	}
	.title17{
		bottom: 75%;
		right: 5%;
		padding: 0px;
		text-align: right;
		font: bold 70px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc17{
		top: 22%;
		right: 5%;
		left: auto;
		text-align: right;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu17{
		position: absolute;
		left: 5%;
		bottom: 10%;
		z-index: 3;
	}
	.button17{
		padding: 0px 35px;
		font-size: 20px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="title17" settings="font">نوین دوز</p>
	<p class="desc17" settings="font">تولیدکننده پوشاک آقایان</p>
	</center>
	<menu class="app-menu17">
		<a href="#"><button class="button17" id="button17" settings="font"></button></a>
	</menu>
	<center><div class="header17-shadow"><img class="header17" src="http://cheltikkeh.com/includes/images/modules/header17.jpg" settings="src"></div></center>
</div>