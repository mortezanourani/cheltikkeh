<style>
#m58{
	height: 70px;
	border-bottom: 1px solid rgba(255, 255, 255, 0.5);
	text-align: right;
}
.background58{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(50, 50, 50, 1);
	z-index: 1;
}
.logo58-link{
	position: absolute;
	width: 100px;
	left: 50%;
	margin-left: -50px;
}
.logo58{
	position: absolute;
	top: 0px;
	right: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.phone58{
	position: absolute;
	direction: ltr;
	text-align: left;
	top: 0xp;
	left: 50px;
	height: 70px;
	padding: 20px 0px;
	margin: 0px;
	font: 20px roya;
	color: rgba(255, 255, 255, 1);
	z-index: 3;
}
.phone58:before{
	position: absolute;
	height: 70px;
	padding: 25px 0px;
	top: 0px;
	margin-left: -25px;
	text-align: center;
	font: 25px icon;
	content: "\f095";
}
.menu58-button{
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
.menu58-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu58-button:hover{
	background-color: rgba(255, 255, 255, 0.25);
}
.menu58-button:hover:before{
	content: "\f16f";
}
.menu58-button:focus:before{
	content: "\f18f";
}
.menu58{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu58 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
}
.menu58 a button:hover{
	opacity: 0.9;
	background-color: rgba(255, 255, 255, 0.25);
	cursor: pointer;
}
.menu58 a button:active{
	opacity: 0.7;
	background-color: rgba(255, 255, 255, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m58{
		direction: ltr;
		text-align: right;
		height: 70px;
	}
	.phone58{
		display: none;
	}
	.menu58-button{
		position: relative;
		display: initial;
	}
	.menu58{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu58 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m58" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background58" settings="backcolor"></div>
	<a class="logo58-link" href="/"><img class="logo58" src="http://cheltikkeh.com/includes/images/modules/logo.png" settings="src,parent-href"></a>
	<button class="menu58-button" onclick="menu_click( $(this) )"></button>
	<div class="menu58" onclick="menu_click( $(this) )">
		<a href="#"><button>خدمات</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
	<p class="phone58" settings="text">+98 (911) 606 9878</p>
</div>