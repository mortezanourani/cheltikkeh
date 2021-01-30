<style>
.header23{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header23-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.title23{
	position: absolute;
	bottom: 60%;
	right: 45%;
	left: 5%;
	margin: 0px;
	text-align: center;
	font: bold 50px mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(150, 125, 95, 1);
	padding: 0px 15px;
	border-radius: 7px;
	text-shadow: 0px 0px 1px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc23{
	position: absolute;
	top: 40%;
	right: 45%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 25px roya, nazanin, davat;
	padding: 0px 15px;
	border-radius: 7px;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(150, 125, 95, 1);
	text-shadow: 0px 0px 1px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu23{
	position: absolute;
	right: 45%;
	left: 5%;
	bottom: 15%;
	text-align: center;
	border-radius: 7px;
	padding: 0px 15px;
	background-color: rgba(0, 0, 0, 0);
	z-index: 3;
}
.button23{
	position: relative;
	height: 50px;
	border-radius: 25px;
	outline: none;
	background-color: rgba(0, 0, 0, 0);
	border: 2px solid rgba(150, 125, 95, 1);
	text-align: right;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 23px roya, mitra, nazanin;
	color: rgba(150, 125, 95, 1);
	margin: 10px -3px;
	z-index: 3;
}
.button23:hover{
	opacity: 0.6;
	cursor: pointer;
}
.button23:before{
	position: absolute;
	top: 10px;
	right: 20px;
	font: 25px icon;
}
#button23-1{
	border-radius: 0px 25px 25px 0px;
}
#button23-1:before{
	content: "\f02e";
}
#button23-2{
	border-radius: 25px 0px 0px 25px;
	background-color: rgba(150, 125, 95, 1);
	color: rgba(255, 255, 255, 1);
}
#button23-2:before{
	content: "\f091";
}

@media screen and (max-width: 480px){
	.header23{
		margin: 0px;
		right: 0px;
	}
	.title23{
		width: 90%;
		bottom: 70%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 40px mitra, nazanin;
		z-index: 3;
	}
	.desc23{
		width: 90%;
		top: 30%;
		right: 5%;
		left: 5%;
		padding: 0px;
		margin: 0px;
		text-align: center;
		font: bold 23px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu23{
		width: 100%;
		right: 0%;
		left: 0%;
		top: auto;
		padding: 5px 0px;
		border-radius: 0px;
		margin: 0px;
	}
	#button23-1,
	#button23-2{
		border-radius: 25px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<center>
	<p class="title23" settings="font">مسابقه عکاسی با موبایل</p>
	<p class="desc23" settings="font">آخرین مهلت ارسال آثار پایان فروردین</p>
	</center>
	<menu class="app-menu23">
		<a href="#"><button class="button23" id="button23-1" settings="text,font,bordercolor,parent-href">اطلاعات بیشتر</button></a>
		<a href="#"><button class="button23" id="button23-2" settings="text,font,backcolor,parent-href">شرکت در مسابقه</button></a>
	</menu>
	<center><div class="header23-shadow"><img class="header23" src="http://cheltikkeh.com/includes/images/modules/header23.jpg" settings="src"></div></center>
</div>