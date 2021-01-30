<style>
#m57{
	height: 70px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
	text-align: right;
}
.background57{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(250, 250, 250, 1);
	z-index: 1;
}
.logo57-link{
	position: absolute;
	width: 100px;
	left: 50%;
	margin-left: -35px;
}
.logo57{
	position: absolute;
	top: 0px;
	right: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.phone57{
	position: absolute;
	direction: ltr;
	text-align: left;
	top: 0xp;
	left: 50px;
	height: 70px;
	padding: 20px 0px;
	margin: 0px;
	font: 20px roya;
	z-index: 3;
}
.phone57:before{
	position: absolute;
	height: 70px;
	padding: 25px 0px;
	top: 0px;
	margin-left: -25px;
	text-align: center;
	font: 25px icon;
	content: "\f095";
}
.menu57-button{
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
.menu57-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu57-button:hover{
	background-color: rgba(0, 0, 0, 0.1);
}
.menu57-button:hover:before{
	content: "\f16f";
}
.menu57-button:focus:before{
	content: "\f18f";
}
.menu57{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu57 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
}
.menu57 a button:hover{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.menu57 a button:active{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m57{
		direction: ltr;
		text-align: right;
		height: 70px;
	}
	.phone57{
		display: none;
	}
	.menu57-button{
		position: relative;
		display: initial;
	}
	.menu57{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu57 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m57" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background57" settings="backcolor"></div>
	<button class="menu57-button" onclick="menu_click( $(this) )"></button>
	<div class="menu57" onclick="menu_click( $(this) )">
		<a href="#"><button>خدمات</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
	<p class="phone57" settings="text">+98 (911) 606 9878</p>
</div>