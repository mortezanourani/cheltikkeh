<style>
#m61{
	height: 70px;
	border-top: 1px solid rgba(0, 0, 0, 0.5);
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
	text-align: center;
}
.background61{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(250, 250, 250, 1);
	z-index: 1;
}
.menu61-button{
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
.menu61-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu61-button:hover{
	background-color: rgba(0, 0, 0, 0.25);
}
.menu61-button:hover:before{
	content: "\f16f";
}
.menu61-button:focus:before{
	content: "\f18f";
}
.menu61{
	position: absolute;
	height: 70px;
	top: 0px;
	right: 25px;
	left: 25px;
	text-align: center;
	margin: 0px;
	z-index: 2;
}
.menu61 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
	color: rgba(0, 0, 0, 1);
}
.menu61 a button:hover{
	text-shadow: 0px 0px 0.1px rgba(0, 0, 0, 1);
	cursor: pointer;
}
.menu61 a button:active{
	opacity: 0.7;
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m61{
		direction: ltr;
		text-align: center;
		height: 70px;
	}
	.menu61-button{
		position: relative;
		width: 100%;
		display: initial;
	}
	.menu61{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu61 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m61" class="main-module" style="position: relative; width: 100%; overflow: hidden;">
	<div class="background61" settings="backcolor"></div>
	<button class="menu61-button" onclick="menu_click( $(this) )"></button>
	<div class="menu61" onclick="menu_click( $(this) )">
		<a href="#"><button>محصولات</button></a>
		<a href="#"><button>نمونه کار ها</button></a>
		<a href="#"><button>لیست قیمت ها</button></a>
		<a href="#"><button>طرح های تخفیفی</button></a>
	</div>
</div>