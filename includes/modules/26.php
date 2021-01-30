<style>
#m26{
	height: 650px;
}
.header26{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 0.2;
	z-index: 2;
}
.header26-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}

.contact26{
	position: absolute;
	right: 10%;
	left: 10%;
	top: 5%;
	bottom: 55%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	color: rgba(255, 255, 255, 1);
	text-align: justify;
	padding: 0px 5px;
	z-index: 3;
}
.contact26 p{
	position: relative;
	direction: rtl;
	height: 30%;
	padding-right: 50px;
	text-align: justify;
	margin: 0px;
}
.contact26 p:before{
	position: absolute;
	width: 50px;
	right: 0px;
	margin-top: -7px;
	top: 0px;
	text-align: center;
	padding: 0px;
	font: 35px icon;
	color: rgba(250, 230, 50, 1);
}

.contact26 .contact26-1{
	direction: rtl;
	padding-right: 0px;
	font: bold 60px mitra, nazanin;
}
.contact26 .contact26-2{
	direction: rtl;
	height: 40%;
	padding-right: 0px;
}
.contact26 .address26{
	position: absolute;
	right: 0px;
	left: 70%;
}
.contact26 .address26:before{
	content: "\f041";
}
.contact26 .phone26{
	position: absolute;
	direction: ltr;
	text-align: right;
	left: 33%;
	right: 33%;
}
.contact26 .phone26:before{
	content: "\f095";
}
.contact26 .mail26{
	position: absolute;
	font: bold 18px arial;
	left: 0px;
	right: 66%;
}
.contact26 .mail26:before{
	content: "\f003";
}

.form26{
	position: absolute;
	right: 10%;
	left: 10%;
	top: 50%;
	bottom: 5%;
	margin: 0px;
	border-radius: 3px;
	background-color: rgba(127, 127, 127, 0.3);
	box-shadow: 0px 0px 3px rgba(127, 127, 127, 1);
	text-align: right;
	padding: 0px 0px;
	overflow: hidden;
	z-index: 3;
}
.form26 hr{
	width: 80%;
	outline: none;
	border: 0px;
	margin: 2% 10%;
	border-bottom: 1px solid rgba(150, 150, 150, 1);
}
.form26 .namemail26{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
}
.form26 input[type="text"]{
	width: 80%;
	height: 40%;
	outline: none;
	padding: 0px 25px;
	margin: 0px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
}
.form26 #mail26{
	direction: ltr;
	text-align: right;
}
.form26 .message26{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
	left: 0px;
}
.form26 textarea{
	width: 80%;
	height: 95%;
	outline: none;
	padding: 10px 25px;
	margin: 0px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(250, 250, 250, 1);
	resize: none;
}
.form26 #submit26{
	position: absolute;
	width: 90%;
	height: 20%;
	bottom: 10%;
	right: 0px;
	outline: none;
	padding: 0px 5px;
	padding-right: 105px;
	margin: 0px 5%;
	border: 0px;
	border-radius: 4px;
	font: bold 25px mitra, nazanin;
	background-color: rgba(250, 230, 50, 1);
	color: rgba(0, 0, 0, 1);
	overflow: hidden;
}
#submit26:before{
	position: absolute;
	width: 75px;
	height: 100%;
	top: 0px;
	right: 0px;
	padding: 15px;
	border-left: 1px solid rgba(0, 0, 0, 1);
	text-align: center;
	font: bold 25px icon;
	content: "\f040";
}
.form26 #submit26:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	#m26{
		height: 1000px;
	}
	.header26{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	.contact26{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 5%;
		bottom: 50%;
	}
	.contact26 .contact26-1{
		height: 22%;
	}
	.contact26 .address26,
	.contact26 .phone26,
	.contact26 .mail26{
		position: relative;
		height: 12%;
		right: 0px;
	}
	.contact26 .contact26-2{
		height: 35%;
	}
	.form26{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 50%;
		bottom: 5%;
	}
	.form26 .namemail26{
		width: 100%;
		height: 30%;
		top: 5%;
	}
	.form26 .message26{
		width: 100%;
		height: 30%;
		top: 35%;
	}
	.form26 #submit26{
		width: 80%;
		height: 15%;
		bottom: 5%;
		margin: 0px 10%;
	}
}
</style>

<div id="m26" style="position: relative; width: 100%; overflow: hidden;">
	<center><div class="header26-shadow"><img class="header26" src="http://cheltikkeh.com/includes/images/modules/contact26.jpg" settings="src,parent-backcolor"></div></center>
	<div class="contact26">
		<p class="contact26-1" settings="text,font">تماس با ما</p>
		<p class="contact26-2" settings="text,font">راهنمایی های شما مارا در بهتر شدن یاری خواهد کرد. پس در صورت امکان در پیشرفت ما کنار ما باشید.</p>
		<p class="address26" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone26" settings="font">+98 (911) 606-9878</p>
		<p class="mail26" settings="font">info@cheltikkeh.com</p>
	</div>
	<form class="form26" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token26" name="token" value="#token#">
		<div class="namemail26">
			<input type="text" id="name26" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
			<input type="text" id="mail26" name="mail" placeholder="پست الکترونیکی" required settings="font"><hr>
		</div>
		<div class="message26">
			<textarea type="text" id="message26" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		</div>
		<button id="submit26" name="submit" onclick="messaging( event, $('#token26').val(), $('#name26').val(), $('#mail26').val(), $('#message26').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
</div>