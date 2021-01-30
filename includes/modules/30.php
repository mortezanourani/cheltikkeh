<style>
#m30{
	height: 650px;
	text-align: center;
}
.header30-back{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(230, 230, 230, 1);
	z-index: 1;
}

.text30{
	position: absolute;
	right: 5%;
	left: 70%;
	top: 10%;
	font: bold 60px roya, mitra, nazanin, roya;
	text-align: right;
	color: rgba(0, 0, 0, 1);
	z-index: 3;
}

.contact30{
	position: absolute;
	width: 25%;
	right: 5%;
	bottom: 10%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0);
	font: bold 20px roya, mitra, nazanin;
	padding: 0px 0px;
	z-index: 3;
}
.contact30 p{
	position: relative;
	direction: ltr;
	width: 80%;
	right: 5%;
	margin: 20px 10% 0px 10%;
	background-color: rgba(0, 0, 0, 0);
	color: rgba(0, 0, 0, 1);
	text-align: right;
}
.contact30 p:before{
	position: absolute;
	width: 50px;
	right: 0px;
	top: 0px;
	text-align: center;
	padding: 0px;
	margin-right: -50px;
	font: 25px icon;
	color: rgba(250, 150, 50, 1);
}
.contact30 .address30:before{
	content: "\f041";
}
.contact30 .phone30:before{
	content: "\f095";
}
.contact30 .mail30:before{
	content: "\f1fa";
}

.map30{
	position: absolute;
	width: 60%;
	left: 5%;
	bottom: 10%;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	overflow: hidden;
	z-index: 3;
}

@media screen and (max-width: 480px){
	#m30{
		height: 650px;
	}
	.header30{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	
	.text30{
		top: auto;
		bottom: 75%;
		width: 90%;
		right: 5%;
		left: 5%;
		padding: 0px;
		font: bold 50px roya, mitra;
		text-align: center;
	}
	
	.contact30{
		width: 90%;
		top: 22%;
		right: 0%;
		left: 0%;
	}
	.contact30 p{
		position: relative;
		width: 100%;
		right: 0px;
		padding-right: 60px;
		text-align: right;
	}
	.contact30 p:before{
		margin: 0px;
		right: 0px;
	}
	
	.map30{
		width: 90%;
		right: 5%;
		left: 5%;
		bottom: 5%;
	}
}
</style>
<div id="m30" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header30-back" settings="backcolor"></div>
	<p class="text30" settings="text,font">ارتباط با ما</p>
	<img class="map30" src="http://cheltikkeh.com/includes/images/modules/location.jpg" settings="src">
	<div class="contact30">
		<p class="address30" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone30" settings="font">+98 (13) 42 52 41 16</p>
		<p class="mail30" settings="font">info@cheltikkeh.com</p>
	</div>
</div>