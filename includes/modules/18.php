<style>
.header18{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header18-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.profile18-box{
	position: absolute;
	width: 130px;
	height: 130px;
	bottom: 0px;
	right: 50%;
	margin-bottom: -70px;
	margin-right: -70px;
	border: 5px solid rgba(255, 255, 255, 1);
	background-color: rgba(0, 0, 0, 0);
	transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	-webkit-transform: rotate(45deg);
	overflow: hidden;
	z-index: 2;
}
.profile18{
	position: absolute;
	width: 190px;
	height: 190px;
	margin-right: -95px;
	margin-top: -95px;
	right: 50%;
	top: 50%;
	background-color: rgba(255, 255, 255, 1);
	transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
	z-index: 2;
}
.name18{
	position: absolute;
	width: 80%;
	bottom: 55%;
	right: 10%;
	margin: 0px;
	text-align: left;
	font: bold 70px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(45, 45, 50, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc18{
	position: absolute;
	width: 80%;
	top: 45%;
	right: 10%;
	text-align: left;
	margin-top: -20px;
	font: bold 35px roya, nazanin, davat;
	background-color: rgba(45, 45, 50, 0);
	color: rgba(45, 45, 50, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu18{
	direction: ltr;
	position: absolute;
	width: 80%;
	left: 10%;
	bottom: 20%;
	padding: 0px;
	text-align: left;
	z-index: 3;
}
.button18{
	position: relative;
	direction: ltr;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(45, 45, 50, 0);
	border: 2px solid rgba(45, 45, 50, 1);
	text-align: left;
	padding-left: 55px;
	padding-right: 15px;
	font: bold 20px arial, mitra, nazanin;
	color: rgba(45, 45, 50, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button18:before{
	position: absolute;
	top: 13px;
	left: 15px;
	font: 35px icon;
	content: "\f1df";
}

@media screen and (max-width: 480px){
	.name18{
		width: 90%;
		bottom: 65%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 70px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc18{
		width: 90%;
		top: 35%;
		right: 5%;
		left: 5%;
		text-align: center;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu18{
		width: 100%;
		right: 0px;
		left: 0px;
		text-align: center;
	}
}
</style>

<div style="position: relative; width: 100%; height: 460px;">
	<a class="profile18-box" href=""><img class="profile18" src="/includes/images/modules/nourani.jpg" settings="src,parent-bordercolor,parent-href,parent-hposition"></a>
	<center>
	<p class="name18" settings="font,text-align">مرتضا نورانی</p>
	<p class="desc18" settings="font,text-align">برنامه نویس و توسعه دهنده وب</p>
	</center>
	<menu class="app-menu18">
		<button class="button18" id="button18" settings="text,font,bordercolor,parent-textalign">mortizanourani@gmail.com</button>
	</menu>
	<center><div class="header18-shadow"><img class="header18" src="http://cheltikkeh.com/includes/images/modules/header18.jpg" settings="src"></div></center>
</div>