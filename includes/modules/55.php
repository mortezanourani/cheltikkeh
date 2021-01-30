<style>
#m55{
	height: 70px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
	text-align: right;
}
.background55{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(250, 250, 250, 1);
	z-index: 1;
}
.logo55{
	position: relative;
	top: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.phone55{
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
	z-index: 3;
}
.phone55:before{
	position: absolute;
	height: 70px;
	padding: 25px 0px;
	top: 0px;
	margin-left: -25px;
	text-align: center;
	font: 25px icon;
	content: "\f095";
}
.menu55-button{
	position: absolute;
	outline: none;
	width: 70px;
	height: 70px;
	top: 0px;
	border: 0px;
	background-color: transparent;
	z-index: 3;
	display: none;
}
.menu55-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu55-button:hover{
	background-color: rgba(0, 0, 0, 0.1);
}
.menu55-button:hover:before{
	content: "\f16f";
}
.menu55-button:focus:before{
	content: "\f18f";
}
.menu55{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 110px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu55 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
}
.menu55 a button:hover{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.menu55 a button:active{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m55{
		direction: ltr;
		text-align: left;
		height: 70px;
	}
	.phone55{
		position: absolute;
		top: 0px;
		margin-top: 0px;
		left: 100px;
	}
	.logo55{
		position: absolute;
		right: 0px;
		margin-right: 25px;
	}
	.menu55-button{
		position: relative;
		right: 0px;
		display: initial;
	}
	.menu55{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu55 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m55" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background55" settings="backcolor"></div>
	<a href="/"><img class="logo55" src="http://cheltikkeh.com/includes/images/modules/logo.png" settings="src,parent-href"></a>
	<button class="menu55-button" onclick="menu_click( $(this) )"></button>
	<div class="menu55" onclick="menu_click( $(this) )">
		<a href="#"><button>سرویس ها</button></a>
		<a href="#"><button>سفارش آنلاین</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
	<p class="phone55" settings="text">+98 (911) 606 9878</p>
</div>