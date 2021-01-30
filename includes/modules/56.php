<style>
#m56{
	height: 70px;
	border-bottom: 1px solid rgba(235, 245, 255, 0.5);
	text-align: right;
}
.background56{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(50, 50, 50, 1);
	z-index: 1;
}
.logo56{
	position: relative;
	top: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.phone56{
	position: absolute;
	direction: ltr;
	text-align: left;
	top: 0xp;
	left: 50px;
	height: 70px;
	padding: 20px 0px;
	margin: 0px;
	margin-top: -70px;
	font: 20px roya;
	color: rgba(255, 255, 255, 1);
	z-index: 3;
}
.phone56:before{
	position: absolute;
	height: 70px;
	padding: 25px 0px;
	top: 0px;
	margin-left: -25px;
	text-align: center;
	font: 25px icon;
	content: "\f095";
}
.menu56-button{
	position: absolute;
	outline: none;
	width: 70px;
	height: 70px;
	top: 0px;
	border: 0px;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
	z-index: 3;
	display: none;
}
.menu56-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu56-button:hover{
	background-color: rgba(255, 255, 255, 0.25);
}
.menu56-button:hover:before{
	content: "\f16f";
}
.menu56-button:focus:before{
	content: "\f18f";
}
.menu56{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 110px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu56 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
}
.menu56 a button:hover{
	opacity: 0.9;
	background-color: rgba(255, 255, 255, 0.25);
	cursor: pointer;
}
.menu56 a button:active{
	opacity: 0.7;
	background-color: rgba(255, 255, 255, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m56{
		direction: ltr;
		text-align: left;
		height: 70px;
	}
	.phone56{
		position: absolute;
		top: 0px;
		margin-top: 0px;
		left: 100px;
	}
	.logo56{
		position: absolute;
		right: 0px;
		margin-right: 25px;
	}
	.menu56-button{
		position: relative;
		right: 0px;
		display: initial;
	}
	.menu56{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu56 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m56" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background56" settings="backcolor"></div>
	<a href="/"><img class="logo56" src="http://cheltikkeh.com/includes/images/modules/logo.png" settings="src,parent-href"></a>
	<button class="menu56-button" onclick="menu_click( $(this) )"></button>
	<div class="menu56" onclick="menu_click( $(this) )">
		<a href="#"><button>سرویس ها</button></a>
		<a href="#"><button>سفارش آنلاین</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
	<p class="phone56" settings="text">+98 (911) 606 9878</p>
</div>