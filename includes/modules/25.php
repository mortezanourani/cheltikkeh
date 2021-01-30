<style>
#m25{
	height: 650px;
}
.header25{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 0.5;
	z-index: 2;
}
.header25-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 1;
}
.form25{
	position: absolute;
	right: 60%;
	left: 10%;
	top: 17%;
	bottom: 17%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	text-align: center;
	padding: 2% 0px;
	z-index: 3;
}
.form25 hr{
	width: 80%;
	outline: none;
	border: 0px;
	border-bottom: 1px solid rgba(50, 50, 50, 1);
}
.form25 input[type="text"]{
	width: 80%;
	height: 10%;
	outline: none;
	padding: 0px 25px;
	margin: 10px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(250, 250, 250, 1);
}
.form25 #mail25{
	direction: ltr;
	text-align: right;
}
.form25 textarea{
	width: 80%;
	height: 25%;
	outline: none;
	padding: 0px 25px;
	margin: 10px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(250, 250, 250, 1);
	resize: none;
}
.form25 #submit25{
	position: absolute;
	width: 80%;
	height: 65px;
	bottom: 25px;
	right: 0px;
	outline: none;
	padding: 0px 5px;
	padding-left: 105px;
	margin: 10px 10%;
	margin-top: 25px;
	border: 0px;
	border-radius: 4px;
	font: bold 30px mitra, nazanin;
	background-color: rgba(220, 60, 70, 1);
	color: rgba(255, 255, 255, 1);
	overflow: hidden;
}
#submit25:before{
	position: absolute;
	width: 75px;
	height: 50px;
	top: 0px;
	left: 0px;
	padding: 15px;
	border-right: 1px solid rgba(255, 255, 255, 1);
	text-align: center;
	font: bold 30px icon;
	content: "\f003";
}
.form25 #submit25:hover{
	opacity: 0.9;
}

.contact25{
	position: absolute;
	right: 10%;
	left: 45%;
	top: 17%;
	bottom: 17%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	color: rgba(25, 25, 25, 1);
	text-align: justify;
	padding: 0px 5px;
	z-index: 3;
}
.contact25 p{
	position: relative;
	direction: ltr;
	height: 12%;
	padding-right: 50px;
	text-align: right;
	margin: 0px;
}
.contact25 p:before{
	position: absolute;
	width: 50px;
	right: 0px;
	margin-top: -17px;
	top: 0px;
	text-align: center;
	padding: 0px;
	font: 35px icon;
	color: rgba(220, 60, 70, 1);
}

.contact25 .contact25-1{
	direction: rtl;
	height: 20%;
	padding-right: 0px;
	font: bold 60px mitra, nazanin;
}
.contact25 .contact25-2{
	direction: rtl;
	height: 40%;
	padding-right: 0px;
	margin-bottom: 5%;
}
.contact25 .address25:before{
	content: "\f041";
}
.contact25 .phone25:before{
	content: "\f095";
}
.contact25 .mail25{
	font: bold 18px arial;
}
.contact25 .mail25:before{
	content: "\f003";
}

@media screen and (max-width: 480px){
	#m25{
		height: 1000px;
	}
	.header25{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	.contact25{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 5%;
		bottom: 50%;
	}
	.form25{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 50%;
		bottom: 5%;
	}
}
</style>

<div id="m25" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header25-shadow"><img class="header25" src="http://cheltikkeh.com/includes/images/modules/contact25.jpg" settings="src,parent-backcolor"></div>
	<form class="form25" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token25" name="token" value="#token#">
		<input type="text" id="name25" name="name" placeholder="نام و نام خانوادگی" required settings="font,parent-backcolor"><hr>
		<input type="text" id="mail25" name="mail" placeholder="پست الکترونیکی" required settings="font,parent-backcolor"><hr>
		<textarea type="text" id="message25" name="message" placeholder="پیام یا پرسش شما" required settings="font,parent-backcolor"></textarea><hr>
		<button id="submit25" name="submit" onclick="messaging( event, $('#token25').val(), $('#name25').val(), $('#mail25').val(), $('#message25').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
	<div class="contact25">
		<p class="contact25-1" settings="text,font">تماس با ما</p>
		<p class="contact25-2" settings="text,font">راهنمایی های شما ما را در بهتر شدن یاری خواهد کرد. پس در صورت امکان در پیشرفت ما کنار ما باشید.</p>
		<p class="address25" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone25" settings="font">+98 (911) 606-9878</p>
		<p class="mail25" settings="font">info@cheltikkeh.com</p>
	</div>
</div>