<style>
#m62{
	height: 70px;
	border-top: 1px solid rgba(255, 255, 255, 1);
	border-bottom: 1px solid rgba(255, 255, 255, 1);
	text-align: center;
}
.background62{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(85, 85, 85, 1);
	z-index: 1;
}
.menu62-button{
	position: absolute;
	outline: none;
	width: 70px;
	height: 70px;
	top: 0px;
	border: 0px;
	background-color: transparent;
	color: rgba(235, 235, 235, 0.5);
	z-index: 3;
	display: none;
}
.menu62-button:before{
	font: 40px icon;
	content: "\f137";
}
.menu62-button:hover:before{
	color: rgba(235, 235, 235, 1);
	content: "\f137";
}
.menu62-button:focus:before{
	color: rgba(235, 235, 235, 1);
	content: "\f13a";
}
.menu62{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: 25px;
	text-align: center;
	margin: 0px;
	z-index: 2;
}
.menu62 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(235, 235, 235, 1);
}
.menu62 a button:hover{
	font-weight: bold;
	cursor: pointer;
}
.menu62 a button:active{
	font-weight: normal;
	opacity: 0.7;
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m62{
		direction: ltr;
		text-align: right;
		height: 70px;
	}
	.menu62-button{
		position: relative;
		right: 0px;
		display: initial;
	}
	.menu62{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu62 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m62" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background62" settings="backcolor"></div>
	<button class="menu62-button" onclick="menu_click( $(this) )"></button>
	<div class="menu62" onclick="menu_click( $(this) )">
		<a href="#"><button>مقالات</button></a>
		<a href="#"><button>پژوهش ها</button></a>
		<a href="#"><button>دل نوشته ها</button></a>
	</div>
</div>