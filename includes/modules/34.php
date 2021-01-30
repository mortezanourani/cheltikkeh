<style>
#m34{
	height: 650px;
	text-align: center;
}
.header34{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(225, 255, 205, 1);
	z-index: 1;
}

.text34{
	position: absolute;
	width: 90%;
	bottom: 75%;
	margin: 0px 10%;
	font: bold 60px mitra, roya, nazanin;
	color: rgba(0, 0, 0, 1);
	text-align: right;
	z-index: 3;
}

.form34{
	position: absolute;
	width: 80%;
	top: 30%;
	right: 10%;
	bottom: 5%;
	left: 10%;
	padding-top: 5px;
	border-radius: 3px;
	background-color: transparent;
	text-align: right;
	overflow: hidden;
	z-index: 3;
}
.form34 hr{
	width: 90%;
	outline: none;
	border: 0px;
	margin: 1% 5%;
	border-bottom: 1px solid rgba(0, 0, 0, 0.3);
}
.form34 input[type="text"]{
	width: 90%;
	height: 15%;
	outline: none;
	padding: 0px 25px;
	margin: 0px 5%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
}
.form34 #mail34{
	direction: ltr;
	text-align: right;
}
.form34 textarea{
	width: 90%;
	height: 34%;
	outline: none;
	padding: 10px 25px;
	margin: 0px 5%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
	resize: none;
}
.form34 #submit34{
	position: absolute;
	width: 90%;
	height: 60px;
	bottom: 1%;
	outline: none;
	padding: 0px 5px;
	margin: 0px 5%;
	border: 0px;
	border-radius: 5px;
	font: bold 25px mitra, nazanin;
	background-color: rgba(75, 240, 50, 1);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	color: rgba(0, 0, 0, 1);
	overflow: hidden;
}
.form34 #submit34:before{
	position: absolute;
	width: 75px;
	height: 100%;
	top: 0px;
	right: 0px;
	padding: 15px;
	text-align: center;
	font: bold 25px icon;
	content: "\f124";
}
.form34 #submit34:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	#m34{
		height: 650px;
	}
	.text34{
		width: 90%;
		margin: 0px 5%;
	}
	.form34{
		width: 90%;
		right: 5%;
		left: 5%;
	}
	.form34 textarea{
		height: 45%;
	}
	.form34 #submit34{
		width: 90%;
		height: 55px;
		margin: 0px 5%;
	}
}
</style>
<div id="m34" style="position: relative; width: 100%; overflow: hidden;">
	<div class="header34" settings="backcolor,backimage"></div>
	<p class="text34" settings="text,font">با ما در تماس باشید</p>
	<form class="form34" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token34" name="token" value="#token#">
		<input type="text" id="name34" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
		<input type="text" id="mail34" name="mail" placeholder="پست الکترونیکی" required settings="font"><hr>
		<textarea type="text" id="message34" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		<button id="submit34" name="submit" onclick="messaging( event, $('#token34').val(), $('#name34').val(), $('#mail34').val(), $('#message34').val() );" settings="text,backcolor,font">ارسال پیام</button>
	</form>
</div>
