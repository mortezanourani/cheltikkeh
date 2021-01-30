<style>
.header22{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header22-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.profile22{
	position: absolute;
	width: 10%;
	margin-right: -5%;
	right: 50%;
	bottom: 55%;
	border-radius: 15px;
	border: 5px solid rgba(255, 255, 255, 1);
	z-index: 2;
}
.name22{
	position: absolute;
	bottom: 40%;
	right: 5%;
	left: 5%;
	margin: 0px;
	text-align: center;
	font: bold 50px mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(255, 255, 255, 1);
	padding: 0px 15px;
	border-radius: 7px;
	text-shadow: 0px 0px 1px rgba(0, 0, 0, 1);
	z-index: 3;
}
.desc22{
	position: absolute;
	top: 60%;
	right: 5%;
	left: 5%;
	text-align: center;
	margin: 0px;
	font: bold 25px roya, nazanin, davat;
	padding: 0px 15px;
	border-radius: 7px;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(255, 255, 255, 1);
	text-shadow: 0px 0px 1px rgba(0, 0, 0, 1);
	z-index: 3;
}
.app-menu22{
	position: absolute;
	right: 5%;
	left: 5%;
	bottom: 10%;
	text-align: center;
	border-radius: 7px;
	padding: 0px 15px;
	background-color: rgba(0, 0, 0, 0);
	z-index: 3;
}
.button22{
	position: relative;
	height: 50px;
	border-radius: 35px;
	outline: none;
	background-color: rgba(0, 0, 0, 0);
	border: 2px solid rgba(245, 245, 245, 1);
	text-align: right;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 23px roya, mitra, nazanin;
	color: rgba(245, 245, 245, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button22:hover{
	opacity: 0.6;
	cursor: pointer;
}
.button22:before{
	position: absolute;
	top: 10px;
	right: 20px;
	font: 25px icon;
	content: "\f007";
}

@media screen and (max-width: 480px){
	.profile22{
		width: 150px;
		margin-right: -75px;
		right: 50%;
		top: 15%;
	}
	.name22{
		width: 90%;
		bottom: 50%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 40px mitra, nazanin;
		z-index: 3;
	}
	.desc22{
		width: 90%;
		top: 50%;
		right: 5%;
		left: 5%;
		padding: 0px;
		margin: 0px;
		text-align: center;
		font: bold 22px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu22{
		width: 100%;
		right: 0%;
		left: 0%;
		bottom: 10%;
		top: auto;
		padding: 5px 0px;
		margin: 0px;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<img class="profile22" src="/includes/images/modules/header22-1.jpg" settings="src,bordercolor">
	<center>
	<p class="name22" settings="font,text-align">هادی سعیدزاده</p>
	<p class="desc22" settings="font,text-align">وکیل پایه یک دادگستری</p>
	</center>
	<menu class="app-menu22">
		<a href="#"><button class="button22" id="button22" settings="text,font,bordercolor,parent-href">درباره من</button></a>
	</menu>
	<center><div class="header22-shadow"><img class="header22" src="http://cheltikkeh.com/includes/images/modules/header22.jpg" settings="src"></div></center>
</div>