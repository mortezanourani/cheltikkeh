<style>
#m59{
	height: 70px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
	text-align: right;
}
.background59{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(250, 250, 250, 1);
	z-index: 1;
}
.menu59-button{
	position: absolute;
	outline: none;
	width: 70px;
	height: 70px;
	top: 0px;
	border: 0px;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
	z-index: 3;
	display: none;
}
.menu59-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu59-button:hover{
	background-color: rgba(0, 0, 0, 0.1);
}
.menu59-button:hover:before{
	content: "\f16f";
}
.menu59-button:focus:before{
	content: "\f18f";
}
.menu59{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: auto;
	text-align: right;
	margin: 0px;
	z-index: 2;
}
.menu59 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(0, 0, 0, 1);
}
.menu59 a button:hover{
	opacity: 0.9;
	background-color: rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.menu59 a button:active{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m59{
		direction: ltr;
		text-align: center;
		height: 70px;
	}
	.menu59-button{
		position: relative;
		width: 100%;
		display: initial;
	}
	.menu59{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu59 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m59" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background59" settings="backcolor"></div>
	<button class="menu59-button" onclick="menu_click( $(this) )"></button>
	<div class="menu59" onclick="menu_click( $(this) )">
		<a href="#"><button>صفحه اصلی</button></a>
		<a href="#"><button>محصولات</button></a>
		<a href="#"><button>نمونه کارها</button></a>
		<a href="#"><button>درباره ما</button></a>
	</div>
</div>