<style>
#m28{
	height: 650px;
	text-align: center;
}
.header28{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 0.2;
	z-index: 2;
}
.header28-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}

.contact28{
	position: absolute;
	top: 5%;
	right: 10%;
	bottom: 60%;
	left: 10%;
	margin: 0px;
	overflow: hidden;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0);
	font: bold 20px roya, mitra, nazanin;
	padding: 50px 0px;
	z-index: 3;
}
.contact28 p{
	position: absolute;
	direction: ltr;
	width: 30%;
	height: 50%;
	bottom: 0%;
	margin: 0px;
	color: rgba(255, 255, 255, 1);
	text-align: center;
}
.contact28 p:before{
	position: absolute;
	width: 50px;
	right: 50%;
	top: 0px;
	text-align: center;
	padding: 0px;
	margin-right: -25px;
	margin-top: -60px;
	font: 35px icon;
	color: rgba(100, 200, 50, 1);
}
.contact28 .address28{
	right: 0%;
}
.contact28 .address28:before{
	content: "\f041";
}
.contact28 .phone28{
	right: 35%;
}
.contact28 .phone28:before{
	content: "\f095";
}
.contact28 .mail28{
	left: 0%;
	font: bold 18px arial;
}
.contact28 .mail28:before{
	content: "\f003";
}

.form28{
	position: absolute;
	top: 40%;
	right: 10%;
	bottom: 5%;
	left: 10%;
	border-radius: 3px;
	background-color: rgba(255, 255, 255, 0.3);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	text-align: right;
	overflow: hidden;
	z-index: 3;
}
.form28 hr{
	width: 80%;
	outline: none;
	border: 0px;
	margin: 2% 10%;
	border-bottom: 1px solid rgba(200, 200, 200, 1);
}
.form28 .namemail28{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
}
.form28 input[type="text"]{
	width: 80%;
	height: 43%;
	outline: none;
	padding: 0px 25px;
	margin: 0px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
}
.form28 #mail28{
	direction: ltr;
	text-align: right;
}
.form28 .message28{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
	left: 0px;
}
.form28 textarea{
	width: 80%;
	height: 95%;
	outline: none;
	padding: 10px 25px;
	margin: 0px 10%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(255, 255, 255, 1);
	resize: none;
}
.form28 #submit28{
	position: absolute;
	width: 90%;
	height: 60px;
	bottom: 10%;
	outline: none;
	padding: 0px 5px;
	margin: 0px 5%;
	border: 0px;
	border-radius: 5px;
	font: bold 25px mitra, nazanin;
	background-color: rgba(100, 200, 50, 1);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	color: rgba(255, 255, 255, 1);
	overflow: hidden;
}
.form28 #submit28:before{
	position: absolute;
	width: 75px;
	height: 100%;
	top: 0px;
	right: 0px;
	padding: 15px;
	text-align: center;
	font: bold 25px icon;
	content: "\f040";
}
.form28 #submit28:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	#m28{
		height: 800px;
	}
	.header28{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	.contact28{
		right: 5%;
		left: 5%;
		padding: 25px 0px;
	}
	.contact28 p,
	.contact28 .phone28{
		position: relative;
		width: 100%;
		right: 0px;
		height: 75px;
		padding-right: 60px;
		text-align: right;
	}
	.contact28 p:before{
		margin: -10px 0px;
		right: 0px;
	}
	
	.form28{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 300px;
		bottom: 5%;
	}
	.form28 .namemail28{
		width: 100%;
		height: 30%;
		top: 5%;
	}
	.form28 .message28{
		width: 100%;
		height: 40%;
		top: 38%;
	}
	.form28 #submit28{
		width: 80%;
		height: 15%;
 		bottom: 5%;
		margin: 0px 10%;
	}
}
</style>
<div id="m28" style="position: relative; width: 100%; overflow: hidden;">
	<center><div class="header28-shadow"><img class="header28" src="http://cheltikkeh.com/includes/images/modules/contact28.jpg" settings="src,parent-backcolor"></div></center>
	<div class="contact28">
		<p class="address28" settings="text,font">گیلان، لنگرود، خیابان مدرس</p>
		<p class="phone28" settings="font">+98 (911) 606-9878</p>
		<p class="mail28" settings="font">info@cheltikkeh.com</p>
	</div>
	<form class="form28" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token28" name="token" value="#token#">
		<div class="namemail28">
			<input type="text" id="name28" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
			<input type="text" id="mail28" name="mail" placeholder="پست الکترونیکی" required settings="font"><hr>
		</div>
		<div class="message28">
			<textarea type="text" id="message28" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		</div>
		<button id="submit28" name="submit" onclick="messaging( event, $('#token28').val(), $('#name28').val(), $('#mail28').val(), $('#message28').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
</div>
