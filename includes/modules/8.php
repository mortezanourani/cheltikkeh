<style>
.header8{
	position: absolute;
	width: 1366px;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header8-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title8{
	position: absolute;
	width: 45%;
	top: 15%;
	left: 45%;
	right: 5%;
	text-align: center;
	margin: 0px;
	font: bold 70px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 5px rgba(255, 255, 255, 0);
	z-index: 3;
}
.desc8{
	position: absolute;
	width: 45%;
	bottom: 85%;
	right: 5%;
	left: 45%;
	text-align: center;
	margin: 0px;
	font: bold 30px nazanin;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 0);
	z-index: 3;
}
.text8{
	position: absolute;
	direction: rtl;
	width: 43%;
	top: 70%;
	right: 5%;
	left: 50%;
	text-align: center;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(0, 0, 0, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu8{
	position: absolute;
	width: 45%;
	right: 5%;
	left: 45%;
	top: 40%;
	padding: 0px;
	z-index: 3;
}
.button8{
	position: relative;
	width: 200px;
	height: 70px;
	left: 0px;
	border-radius: 5px;
	background-color: rgba(230, 230, 225, 0);
	outline: none;
	border: 2px solid rgba(0, 0, 0, 1);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button8:hover{
	opacity: 0.75;
}
.button8:active{
	opacity: 0.5;
}
.button8:before{
	position: absolute;
	top: 20px;
	right: 25px;
	font: 30px icon;
}
#button8-1:before{
	content: "\f0cf";
}
#button8-2{
	background-color: rgba(0, 0, 0, 1);
	border-color: rgba(0, 0, 0, 0);
	color: rgba(230, 230, 225, 1);
}
#button8-2:before{
	content: "\f02e";
}

@media screen and (max-width: 480px){
	.header8{
		left: -100px;
	}
	.title8{
		width: 100%;
		top: 10%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.desc8{
		width: 100%;
		bottom: 90%;
		right: 0px;
		text-align: center;
		z-index: 3;
	}
	.app-menu8{
		position: absolute;
		width: 90%;
		right: 5%;
		left: 5%;
		top: 30%;
		padding: 0px;
		border-radius: 5px;
		z-index: 3;
	}
	.app-menu8 button{
		margin-bottom: 0px;
	}
	.text8{
		width: 80%;
		top: 65%;
		right: 10%;
		left: 10%;
		text-align: center;
		z-index: 3;
	}
}
</style>

<div style="position: relative; width: 100%; height: 640px; overflow: hidden;">
	<center><p class="title8" settings="font">کانون مشاوران نوین</p></center>
	<center><p class="desc8" settings="font">سرمایه گذاری مطمئن و سودآور</p></center>
	<center><p class="text8" settings="text,font">کانون مشاوران نوین، ارائه دهنده ی مشاوره بورس، ریسک متضرر شدن را برای شما کاهش می دهد تا آرامش، امنیت و یک سرمایه گذاری مطمئن را تجربه کنید.</p></center>
	<center>
	<menu class="app-menu8">
		<a href="#"><button class="button8" id="button8-1" settings="text,font,bordercolor,parent-href">تیم مشاوران</button></a>
		<a href="#"><button class="button8" id="button8-2" settings="text,font,backcolor,parent-href">درباره ما</button></a>
	</menu>
	</center>
	<center><div class="header8-shadow"><img class="header8" src="http://cheltikkeh.com/includes/images/modules/header8.jpg" settings="src"></div></center>
</div>