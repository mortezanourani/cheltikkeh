<style>
#m60{
	height: 70px;
	border-bottom: 1px solid rgba(255, 255, 255, 0.5);
	text-align: right;
}
.background60{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(50, 50, 50, 1);
	z-index: 1;
}
.menu60-button{
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
.menu60-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu60-button:hover{
	background-color: rgba(255, 255, 255, 0.25);
}
.menu60-button:hover:before{
	content: "\f16f";
}
.menu60-button:focus:before{
	content: "\f18f";
}
.menu60{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu60 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
}
.menu60 a button:hover{
	opacity: 0.9;
	background-color: rgba(255, 255, 255, 0.25);
	cursor: pointer;
}
.menu60 a button:active{
	opacity: 0.7;
	background-color: rgba(255, 255, 255, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m60{
		direction: ltr;
		text-align: center;
		height: 70px;
	}
	.menu60-button{
		position: relative;
		width: 100%;
		display: initial;
	}
	.menu60{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu60 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m60" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background60" settings="backcolor"></div>
	<button class="menu60-button" onclick="menu_click( $(this) )"></button>
	<div class="menu60" onclick="menu_click( $(this) )">
		<a href="#"><button>صفحه اصلی</button></a>
		<a href="#"><button>محصولات</button></a>
		<a href="#"><button>نمونه کارها</button></a>
		<a href="#"><button>درباره ما</button></a>
	</div>
</div>