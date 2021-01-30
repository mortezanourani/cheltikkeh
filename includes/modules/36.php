<style>
#m36{
	direction: rtl;
	text-align: right;
	background-color: rgba(235, 245, 255, 1);
}
.header36{
	position: relative;
	width: 50%;
	z-index: 1;
}

.text36{
	position: absolute;
	width: 40%;
	right: 50%;
	top: 15%;
	margin: 0px 5%;
	font: bold 60px mitra, roya, nazanin;
	color: rgba(0, 0, 0, 1);
	text-align: right;
	z-index: 3;
}

.contact36{
	position: absolute;
	width: 40%;
	right: 55%;
	bottom: 5%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	font: bold 30px mitra, nazanin;
	padding: 0px 0px;
	z-index: 3;
}
.contact36 p{
	position: relative;
	direction: ltr;
	width: 80%;
	right: 5%;
	margin: 25px 10% 15px 10%;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(0, 0, 0, 1);
	text-align: right;
}
.contact36 p:before{
	position: absolute;
	width: 50px;
	right: 0px;
	top: 0px;
	text-align: center;
	padding: 0px;
	margin-right: -50px;
	font: 30px icon;
	color: rgba(0, 0, 0, 0.5);
}
.contact36 .address36:before{
	content: "\f041";
}
.contact36 .phone36:before{
	content: "\f095";
}
.contact36 .mail36{
	font: 25px tahoma;
}
.contact36 .mail36:before{
	content: "\f1fa";
}

@media screen and (max-width: 480px){
	#m36{
		height: 650px;
	}
	.header36{
		display: none;
	}
	.text36{
		width: 90%;
		right: 5%;
		margin: 0px 5%;
	}
	.contact36{
		width: 90%;
		right: 5%;
		left: 5%;
	}
}
</style>
<div id="m36" style="position: relative; width: 100%; overflow: hidden;">
	<img class="header36" src="http://cheltikkeh.com/includes/images/modules/contact36.jpg" settings="src,parent-backcolor">
	<p class="text36" settings="text,font">ارتباط با ما</p>
	<div class="contact36">
		<p class="address36" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone36" settings="font">+98 (13) 42 52 41 16</p>
		<p class="mail36" settings="font">info@cheltikkeh.com</p>
	</div>
</div>
