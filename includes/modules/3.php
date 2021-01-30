<style>
.header3{
	position: absolute;
	width: 1366px;
	background-color: white;
	background-position: center;
	left: 50%;
	margin-left: -683px;
	z-index: 1;
}
.header3-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.75);
	z-index: 2;
}
.title3{
	position: absolute;
	width: 90%;
	bottom: 70%;
	left: 5%;
	right: 5%;
	text-align: center;
	margin: 0px;
	font: Bold 70px mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.desc3{
	position: absolute;
	width: 90%;
	top: 30%;
	left: 5%;
	right: 5%;
	text-align: center;
	margin: 0px;
	font: bold 30px nazanin, mitra;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.text3{
	position: absolute;
	direction: rtl;
	width: 70%;
	top: 50%;
	left: 15%;
	text-align: center;
	margin: 0px;
	font: bold 23px mitra;
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu{
	position: absolute;
	width: 50%;
	left: 25%;
	top: 66%;
	padding: 0px;
	border-radius: 5px;
	z-index: 3;
}
.button3{
	position: relative;
	width: 200px;
	height: 70px;
	left: 0px;
	border-radius: 5px;
	background-color: rgba(255, 255, 255, 1);
	outline: none;
	border: 2px solid rgba(255, 255, 255, 0);
	text-align: right;
	padding-right: 65px;
	font: bold 25px mitra, nazanin;
	color: rgba(0, 0, 0, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button3:hover{
	opacity: 0.75;
}
.button3:active{
	opacity: 0.5;
}
.button3:before{
	position: absolute;
	top: 20px;
	right: 30px;
	font: 25px icon;
}
#button3-1{
	background-color: rgba(60, 120, 240, 1);
	color: rgba(255, 255, 255, 1);
}
#button3-1:before{
	content: "\f02e";
}
#button3-2{
	background-color: rgba(255, 255, 255, 1);
	color: rgba(60, 120, 240, 1);
}
#button3-2:before{
	content: "\f0cf";
}
</style>

<div style="position: relative; width: 100%; height: 660px; overflow: hidden;">
	<center><p class="title3" settings="font,text-align">کانون مشاوران اندیشه نوین</p></center>
	<center><p class="desc3" settings="font,text-align">با حرفه ای ها کار کنید، تا حرفه ای کار کنید</p></center>
	<center><p class="text3" settings="text,font,text-align">کانون مشاوران اندیشه نوین، سرمایه گذار و حامی استارتاپ های نو پا، و ارائه دهنده مشاوره های تبلیغاتی و بازرگانی به فعالان فضای مجازی</p></center>
	<center>
	<menu class="app-menu">
	<a href="#"><button class="button3" id="button3-2" settings="text,font,backcolor,parent-href">تیم مشاوران</button></a>
	<a href="#"><button class="button3" id="button3-1" settings="text,font,backcolor,parent-href">درباره ما</button></a>
	</menu>
	</center>
	<div class="header3-shadow"></div>
	<center><img class="header3" src="http://cheltikkeh.com/includes/images/modules/header3.jpg" settings="src"></center>
</div>