<style>
#m31{
	height: 650px;
	text-align: center;
}
.header31{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 0.2;
	z-index: 2;
}
.header31-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}

.contact31{
	position: absolute;
	left: 5%;
	bottom: 7%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0);
	font: bold 20px roya, mitra, nazanin;
	text-align: left;
	z-index: 3;
}
.contact31 p{
	position: relative;
	direction: ltr;
	width: 100%;
	right: 0px;
	margin: 20px 25px;
	padding-right: 25px;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(255, 255, 255, 1);
	text-align: right;
}
.contact31 p:before{
	position: absolute;
	width: 50px;
	right: 0px;
	top: 0px;
	text-align: center;
	padding: 0px;
	margin-right: -25px;
	margin-top: -5px;
	font: bold 30px icon;
	color: rgba(250, 220, 50, 1);
}
.contact31 .address31:before{
	content: "\f041";
}
.contact31 .phone31:before{
	content: "\f095";
}
.contact31 .mail31:before{
	content: "\f1fa";
}

@media screen and (max-width: 480px){
	#m31{
		height: 650px;
	}
	.header31{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	
	.text31{
		top: auto;
		bottom: 75%;
		width: 90%;
		right: 5%;
		left: 5%;
		padding: 0px;
		font: bold 50px roya, mitra;
		text-align: center;
	}
	
	.contact31{
		width: 90%;
		right: 5%;
		bottom: 5%;
		left: 5%;
	}
	.contact31 p{
		position: relative;
		width: 100%;
		right: 0px;
		padding-right: 60px;
		text-align: right;
	}
	.contact31 p:before{
		margin: 0px;
		right: 0px;
	}
	
}
</style>
<div id="m31" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header31-shadow"><img class="header31" src="http://cheltikkeh.com/includes/images/modules/contact31.jpg" settings="src,parent-backcolor"></div>
	<div class="contact31">
		<p class="address31" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone31" settings="font">+98 (13) 42 52 41 16</p>
		<p class="mail31" settings="font">info@cheltikkeh.com</p>
	</div>
</div>
