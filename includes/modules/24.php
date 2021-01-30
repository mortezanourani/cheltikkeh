<style>
#m24{
	height: 650px;
}
.header24{
	position: absolute;
	height: 100%;
	margin-right: -683px;
	right: 50%;
	background-position: center;
	left: 0px;
	opacity: 0.3;
	z-index: 2;
}
.header24-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}
.form24{
	position: absolute;
	right: 10%;
	left: 60%;
	top: 17%;
	bottom: 17%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 1);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	text-align: center;
	padding: 2% 0px;
	z-index: 3;
}
.form24 hr{
	width: 80%;
	outline: none;
	border: 0px;
	border-bottom: 1px solid rgba(220, 220, 220, 1);
}
.form24 input[type="text"]{
	width: 80%;
	height: 10%;
	outline: none;
	padding: 0px 25px;
	margin: 10px 10%;
	border: 0px;
	font: 20px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
}
.form24 #mail24{
	direction: ltr;
	text-align: right;
}
.form24 textarea{
	width: 80%;
	height: 25%;
	outline: none;
	padding: 0px 25px;
	margin: 10px 10%;
	border: 0px;
	font: 20px roya, mitra, nazanin;
	background-color: rgba(0, 0, 0, 0);
	resize: none;
}
.form24 #submit24{
	position: absolute;
	width: 80%;
	height: 65px;
	bottom: 25px;
	right: 0px;
	outline: none;
	padding: 0px 5px;
	padding-right: 105px;
	margin: 10px 10%;
	margin-top: 25px;
	border: 0px;
	border-radius: 4px;
	font: bold 30px mitra, nazanin;
	background-color: rgba(50, 160, 255, 1);
	color: rgba(255, 255, 255, 1);
}
#submit24:before{
	position: absolute;
	width: 75px;
	height: 50px;
	top: 0px;
	right: 0px;
	padding: 15px;
	border-left: 1px solid rgba(255, 255, 255, 1);
	text-align: center;
	font: bold 30px icon;
	content: "\f003";
}
.form24 #submit24:hover{
	opacity: 0.9;
}

.contact24{
	position: absolute;
	right: 45%;
	left: 10%;
	top: 17%;
	bottom: 17%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-align: justify;
	padding: 0% 0px;
	z-index: 3;
}
.contact24 p{
	position: relative;
	direction: ltr;
	height: 12%;
	padding-right: 100px;
	text-align: right;
	margin: 0px;
}
.contact24 p:before{
	position: absolute;
	width: 50px;
	top: 0px;
	right: 50px;
	text-align: center;
	padding: 0px;
	font: 25px icon;
	color: rgba(50, 170, 255, 1);
	background-color: rgba(255, 255, 255, 0);
}

.contact24 .contact24-1{
	direction: rtl;
	height: 20%;
	padding-right: 50px;
	font: bold 60px mitra, nazanin;
}
.contact24 .contact24-2{
	direction: rtl;
	height: 40%;
	padding-right: 50px;
	margin-bottom: 5%;
}
.contact24 .address24:before{
	content: "\f041";
}
.contact24 .phone24:before{
	content: "\f095";
}
.contact24 .mail24{
	font: bold 18px arial;
}
.contact24 .mail24:before{
	margin-top: -4px;
	content: "\f003";
}

@media screen and (max-width: 480px){
	#m24{
		height: 120px;
	}
	.contact24{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 5%;
		bottom: 50%;
	}
	.form24{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 50%;
		bottom: 5%;
	}
}
</style>
<div id="m24" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header24-shadow"><img class="header24" src="http://cheltikkeh.com/includes/images/modules/contact24.jpg" settings="src,parent-backcolor"></div>
	<form class="form24" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token24" name="token" value="#token#">
		<input type="text" id="name24" name="name" placeholder="نام و نام خانوادگی" required settings="font,parent-backcolor"><hr>
		<input type="text" id="mail24" name="mail" placeholder="پست الکترونیکی" required settings="font,parent-backcolor"><hr>
		<textarea type="text" id="message24" name="message" placeholder="پیام یا پرسش شما" required settings="font,parent-backcolor"></textarea><hr>
		<button id="submit24" name="submit" onclick="messaging( event, $('#token24').val(), $('#name24').val(), $('#mail24').val(), $('#message24').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
	<div class="contact24">
		<p class="contact24-1" settings="text,font">تماس با ما</p>
		<p class="contact24-2" settings="text,font">راهنمایی های شما مارا در بهتر شدن یاری خواهد کرد. پس در صورت امکان در پیشرفت ما کنار ما باشید.</p>
		<p class="address24" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone24" settings="font">+98 (911) 606-9878</p>
		<p class="mail24" settings="font">info@cheltikkeh.com</p>
	</div>
</div>