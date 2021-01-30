<style>
#m32{
	height: 650px;
	text-align: center;
}
.header32{
	position: absolute;
	width: 100%;
	height: 100%;
	background-position: center;
	background-color: rgba(50, 150, 250, 1);
	left: 0px;
	opacity: 1;
	z-index: 2;
}

.contact32{
	position: absolute;
	top: 5%;
	right: 15%;
	bottom: 65%;
	left: 15%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	padding: 50px 0px;
	z-index: 3;
}
.contact32 p{
	position: absolute;
	direction: ltr;
	width: 30%;
	height: 50%;
	bottom: 0%;
	margin: 0px;
	color: rgba(255, 255, 255, 1);
	text-align: center;
}
.contact32 p:before{
	position: absolute;
	width: 50px;
	right: 50%;
	top: 0px;
	text-align: center;
	padding: 0px;
	margin-right: -25px;
	margin-top: -60px;
	font: bold 35px icon;
	color: rgba(0, 0, 0, 0.5);
}
.contact32 .address32{
	right: 0%;
}
.contact32 .address32:before{
	content: "\f19f";
}
.contact32 .phone32{
	right: 35%;
}
.contact32 .phone32:before{
	content: "\f0b8";
}
.contact32 .mail32{
	left: 0%;
	font: bold 18px arial;
}
.contact32 .mail32:before{
	content: "\f1df";
}

.map32{
	position: absolute;
	top: 30%;
	right: 15%;
	bottom: 5%;
	left: 15%;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0.3);
	background-position: center center;
	background-repeat: no-repeat;
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	text-align: right;
	overflow: hidden;
	z-index: 3;
}

@media screen and (max-width: 480px){
	#m32{
		height: 650px;
	}
	.header32{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	.contact32{
		right: 5%;
		left: 5%;
		bottom: 50%;
		padding: 25px 10px;
	}
	.contact32 p,
	.contact32 .phone32{
		position: relative;
		width: 100%;
		right: 0px;
		height: 75px;
		padding-right: 60px;
		text-align: right;
	}
	.contact32 p:before{
		margin: -10px 0px;
		right: 0px;
	}
	
	.map32{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 45%;
		bottom: 5%;
	}
}
</style>
<div id="m32" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header32" settings="backcolor"></div>
	<div class="contact32">
		<p class="address32" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone32" settings="font">+98 (911) 606-9878</p>
		<p class="mail32" settings="font">info@cheltikkeh.com</p>
	</div>
	<div class="map32" style="background-image: url('http://cheltikkeh.com/includes/images/modules/location.jpg');" settings="backimage"></div>
</div>
