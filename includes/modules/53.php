<style>
#m53{
	height: 70px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}
.background53{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(250, 250, 250, 1);
	z-index: 1;
}
.logo53{
	position: relative;
	top: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.menu53-button{
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
.menu53-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu53-button:hover{
	background-color: rgba(0, 0, 0, 0.1);
}
.menu53-button:hover:before{
	content: "\f16f";
}
.menu53-button:focus:before{
	content: "\f18f";
}
.menu53{
	position: absolute;
	height: 70px;
	top: 0px;
	right: auto;
	left: 0px;
	text-align: left;
	padding-left: 25px;
	z-index: 2;
}
.menu53 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: 20px roya, mitra, nazanin;
}
.menu53 a button:hover{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.05);
	cursor: pointer;
}
.menu53 a button:active{
	opacity: 0.7;
	background-color: rgba(0, 0, 0, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m53{
		direction: ltr;
		text-align: left;
		height: 70px;
	}
	.logo53{
		position: absolute;
		left: 25px;
	}
	.menu53-button{
		position: relative;
		right: 0px;
		display: initial;
	}
	.menu53{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu53 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m53" class="main-module" style="position: relative; width: 100%; text-align: right; overflow: hidden;">
	<div class="background53" settings="backcolor"></div>
	<a href="/"><img class="logo53" src="http://cheltikkeh.com/includes/images/modules/logo.png" settings="src,parent-href"></a>
	<button class="menu53-button" onclick="menu_click( $(this) )"></button>
	<div class="menu53" onclick="menu_click( $(this) )">
		<a href="#"><button>محصولات</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
</div>