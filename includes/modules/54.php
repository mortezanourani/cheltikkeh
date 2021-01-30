<style>
#m54{
	height: 70px;
	border-bottom: 1px solid rgba(235, 245, 255, 0.5);
}
.background54{
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0px;
	right: 0px;
	background-color: rgba(50, 50, 50, 1);
	z-index: 1;
}
.logo54{
	position: relative;
	top: 0px;
	height: 70px;
	margin: 0px;
	margin-right: 25px;
	z-index: 3;
}
.menu54-button{
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
.menu54-button:before{
	font: 25px icon;
	content: "\f0c9";
}
.menu54-button:hover{
	background-color: rgba(255, 255, 255, 0.25);
}
.menu54-button:hover:before{
	content: "\f16f";
}
.menu54-button:focus:before{
	content: "\f18f";
}
.menu54{
	position: absolute;
	height: 70px;
	top: 0px;
	right: auto;
	left: 0px;
	text-align: left;
	padding-left: 25px;
	z-index: 2;
}
.menu54 a button{
	outline: none;
	border: 0px;
	height: 70px;
	padding: 0px 15px;
	background-color: transparent;
	font: bold 20px roya, mitra, nazanin;
	color: rgba(235, 245, 255, 1);
}
.menu54 a button:hover{
	opacity: 0.7;
	background-color: rgba(235, 245, 255, 0.25);
	cursor: pointer;
}
.menu54 a button:active{
	opacity: 0.9;
	background-color: rgba(0, 0, 0, 0.1);
	cursor: pointer;
}

@media screen and (max-width: 480px){
	#m54{
		direction: ltr;
		text-align: left;
		height: 70px;
	}
	.logo54{
		position: absolute;
		left: 25px;
	}
	.menu54-button{
		position: relative;
		right: 0px;
		display: initial;
	}
	.menu54{
		position: relative;
		display: initial;
		width: 100%;
		height: auto;
		left: 0px;
		padding: 0px;
		text-align: center;
	}
	.menu54 a button{
		width: 100%;
		height: 70px;
	}
}
</style>
<div id="m54" class="main-module" style="position: relative; width: 100%; text-align: right; overflow: hidden;">
	<div class="background54" settings="backcolor"></div>
	<a href="/"><img class="logo54" src="http://cheltikkeh.com/includes/images/modules/logo.png" settings="src,parent-href"></a>
	<button class="menu54-button" onclick="menu_click( $(this) )"></button>
	<div class="menu54" onclick="menu_click( $(this) )">
		<a href="#"><button>محصولات</button></a>
		<a href="#"><button>درباره ما</button></a>
		<a href="#"><button>تماس با ما</button></a>
	</div>
</div>
