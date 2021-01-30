<style>
.header19{
	position: absolute;
	width: 1366px;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header19-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}
.profile19{
	position: absolute;
	width: 175px;
	height: 175px;
	margin-right: -175px;
	margin-top: -175px;
	right: 27%;
	bottom: 55%;
	border-radius: 50%;
	border: 5px solid rgba(80, 80, 85, 1);
	background-color: rgba(255, 255, 255, 1);
	z-index: 2;
}
.name19{
	position: absolute;
	bottom: 55%;
	right: 30%;
	margin: 0px;
	text-align: right;
	font: bold 70px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(215, 225, 215, 1);
	border-radius: 7px;
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.desc19{
	position: absolute;
	top: 45%;
	right: 30%;
	text-align: right;
	margin: 0px;
	margin-right: -120px;
	font: bold 35px roya, nazanin, davat;
	background-color: rgba(215, 225, 215, 0);
	color: rgba(215, 225, 215, 1);
	text-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.app-menu19{
	direction: ltr;
	position: absolute;
	width: 80%;
	left: 10%;
	bottom: 10%;
	padding: 0px;
	text-align: center;
	z-index: 3;
}
.button19{
	position: relative;
	height: 70px;
	border-radius: 5px;
	outline: none;
	background-color: rgba(45, 45, 50, 0);
	border: 2px solid rgba(215, 225, 215, 1);
	text-align: left;
	padding-right: 55px;
	padding-left: 15px;
	font: bold 23px roya, mitra, nazanin;
	color: rgba(215, 225, 215, 1);
	margin: 15px 5px;
	z-index: 3;
}
.button19:before{
	position: absolute;
	top: 13px;
	right: 15px;
	font: 35px icon;
	content: "\f007";
}

@media screen and (max-width: 480px){
	.profile19{
		position: absolute;
		width: 150px;
		height: 150px;
		margin-right: -75px;
		margin-top: -75px;
		right: 50%;
		bottom: 65%;
		border-radius: 50%;
		border: 5px solid rgba(80, 80, 85, 1);
		background-color: rgba(255, 255, 255, 1);
		z-index: 2;
	}
	.name19{
		width: 90%;
		top: 37%;
		right: 5%;
		left: 5%;
		padding: 0px;
		text-align: center;
		font: bold 50px roya, mitra, nazanin;
		z-index: 3;
	}
	.desc19{
		width: 90%;
		top: 50%;
		right: 5%;
		left: 5%;
		margin: 0px;
		text-align: center;
		font: bold 30px nazanin, davat, roya;
		z-index: 3;
	}
	.app-menu19{
		width: 100%;
		right: 0px;
		left: 0px;
		text-align: center;
	}
}
</style>

<div style="position: relative; width: 100%; height: 650px; overflow: hidden;">
	<img class="profile19" src="/includes/images/modules/header19-1.jpg" settings="src,bordercolor">
	<center>
	<p class="name19" settings="font">موسی ابراهیمی</p>
	<p class="desc19" settings="font">نقاش، عکاس، کارگردان تئاتر و مستند ساز</p>
	</center>
	<menu class="app-menu19">
		<a href="#"><button class="button19" id="button19" settings="text,font,bordercolor,parent-href">درباره من</button></a>
	</menu>
	<center><div class="header19-shadow"><img class="header19" src="http://cheltikkeh.com/includes/images/modules/header19.jpg" settings="src,parent-backcolor"></div></center>
</div>