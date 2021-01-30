<style>
#m29{
	height: 650px;
	text-align: center;
}
.header29{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 0.2;
	z-index: 2;
}
.header29-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}

.text29{
	position: absolute;
	right: 5%;
	padding: 0px 50px;
	font: bold 60px mitra, nazanin, roya;
	color: rgba(255, 255, 255, 1);
	z-index: 3;
}

.form29{
	position: absolute;
	top: 30%;
	right: 5%;
	bottom: 5%;
	left: 35%;
	padding: 10px 0px;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 0);
	text-align: right;
	overflow: hidden;
	z-index: 3;
}
.form29 hr{
	width: 90%;
	outline: none;
	border: 0px;
	margin: 2% 5%;
	border-bottom: 1px solid rgba(200, 200, 200, 1);
}
.form29 input[type="text"]{
	width: 90%;
	height: 10%;
	outline: none;
	padding: 0px 25px;
	margin: 0px 5%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
}
.form29 #mail29{
	direction: ltr;
	text-align: right;
}
.form29 textarea{
	width: 90%;
	height: 35%;
	outline: none;
	padding: 10px 25px;
	margin: 0px 5%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
	resize: none;
}
.form29 #submit29{
	position: absolute;
	width: 90%;
	height: 60px;
	bottom: 5%;
	outline: none;
	padding: 0px 5px;
	margin: 0px 5%;
	border-radius: 5px;
	border: 2px solid rgba(250, 150, 50, 0);
	font: bold 25px mitra, nazanin;
	background-color: rgba(250, 150, 50, 1);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	color: rgba(255, 255, 255, 1);
	overflow: hidden;
}
.form29 #submit29:hover{
	opacity: 0.75;
}

.contact29{
	position: absolute;
	right: 70%;
	bottom: 10%;
	left: 5%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	padding: 0px 0px;
	z-index: 3;
}
.contact29 p{
	position: relative;
	direction: ltr;
	width: 80%;
	right: 5%;
	margin: 20px 10% 0px 10%;
	background-color: rgba(255, 255, 255, 0);
	color: rgba(255, 255, 255, 1);
	text-align: right;
}
.contact29 p:before{
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
.contact29 .address29:before{
	content: "\f124";
}
.contact29 .phone29:before{
	content: "\f095";
}
.contact29 .mail29:before{
	content: "\f1fa";
}

@media screen and (max-width: 480px){
	#m29{
		height: 800px;
	}
	.header29{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	
	.text29{
		bottom: 75%;
		width: 90%;
		right: 5%;
		left: 5%;
		padding: 0px;
		font: bold 50px mitra;
	}
	
	.contact29{
		top: 22%;
		right: 0%;
		left: 0%;
	}
	.contact29 p{
		position: relative;
		width: 100%;
		right: 0px;
		padding-right: 60px;
		text-align: right;
	}
	.contact29 p:before{
		margin: 0px;
		right: 0px;
	}
	
	.form29{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 50%;
		bottom: 5%;
	}
	.form29 input[type="text"]{
		padding: 0px 10px;
	}
	.form29 textarea{
		height: 50%;
		padding: 0px 10px;
	}
	.form29 #submit29{
		width: 90%;
		height: 15%;
 		bottom: 0%;
		margin: 0px 5%;
	}
}
</style>
<div id="m29" style="position: relative; width: 100%; overflow: hidden;">
	<center><div class="header29-shadow"><img class="header29" src="http://cheltikkeh.com/includes/images/modules/contact29.jpg" settings="src,parent-backcolor"></div></center>
	<p class="text29" settings="text,font">با ما در تماس باشید</p>
	<div class="contact29">
		<p class="address29" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone29" settings="font">+98 (911) 606-9878</p>
		<p class="mail29" settings="font">info@cheltikkeh.com</p>
	</div>
	<form class="form29" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token29" name="token" value="#token#">
		<input type="text" id="name29" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
		<input type="text" id="mail29" name="mail" placeholder="پست الکترونیکی" lang="en" required settings="font"><hr>
		<textarea type="text" id="message29" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		<button id="submit29" name="submit" onclick="messaging( event, $('#token29').val(), $('#name29').val(), $('#mail29').val(), $('#message29').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
</div>
