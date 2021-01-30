<style>
#m27{
	height: 650px;
	text-align: center;
}
.header27{
	position: absolute;
	height: 100%;
	background-position: center;
	left: 0px;
	opacity: 1;
	z-index: 2;
}
.header27-shadow{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	z-index: 1;
}

.text27-1{
	position: absolute;
	top: 5%;
	right: 10%;
	color: rgba(255, 255, 255, 1);
	background-color: rgba(0, 0, 0, 0.25);
	font: bold 50px mitra, nazanin;
	padding: 25px;
	margin: 0px;
	border-radius: 5px;
	z-index: 3;
}
.form27{
	position: absolute;
	top: 35%;
	right: 30%;
	bottom: 5%;
	left: 10%;
	border-radius: 3px;
	background-color: rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	text-align: right;
	padding: 0px 0px;
	overflow: hidden;
	z-index: 3;
}
.form27 hr{
	width: 80%;
	outline: none;
	border: 0px;
	margin: 2% 10%;
	border-bottom: 1px solid rgba(200, 200, 200, 1);
}
.form27 .namemail27{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
}
.form27 input[type="text"]{
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
.form27 #mail27{
	direction: ltr;
	text-align: right;
}
.form27 .message27{
	position: absolute;
	width: 50%;
	height: 50%;
	top: 10%;
	left: 0px;
}
.form27 textarea{
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
.form27 #submit27{
	position: absolute;
	width: 90%;
	height: 60px;
	bottom: 10%;
	right: 0px;
	outline: none;
	padding: 0px 5px;
	padding-right: 105px;
	margin: 0px 5%;
	border: 0px;
	border-radius: 4px;
	font: bold 25px mitra, nazanin;
	background-color: rgba(250, 250, 250, 1);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	color: rgba(30, 90, 90, 1);
	overflow: hidden;
}
.form27 #submit27:before{
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
.form27 .form27 #submit27:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	#m27{
		height: 650px;
	}
	.header27{
		width: 1366px;
		margin-right: -683px;
		right: 50%;
	}
	.text27-1{
		right: 5%;
		left: 5%;
	}
	.form27{
		width: 90%;
		right: 5%;
		left: 5%;
		top: 30%;
		bottom: 5%;
	}
	.form27 .namemail27{
		width: 100%;
		height: 30%;
		top: 5%;
	}
	.form27 .message27{
		width: 100%;
		height: 40%;
		top: 35%;
	}
	.form27 #submit27{
		width: 80%;
 		bottom: 5%;
		margin: 0px 10%;
	}
}
</style>
<div id="m27" style="position: relative; width: 100%; overflow: hidden;">
	<center><div class="header27-shadow"><img class="header27" src="http://cheltikkeh.com/includes/images/modules/contact27.jpg" settings="src"></div></center>
	<center><p class="text27-1" settings="text,font">با ما در تماس باشید</p></center>
	<form class="form27" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token27" name="token" value="#token#">
		<div class="namemail27">
			<input type="text" id="name27" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
			<input type="text" id="mail27" name="mail" placeholder="پست الکترونیکی" required settings="font"><hr>
		</div>
		<div class="message27">
			<textarea type="text" id="message27" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		</div>
		<button id="submit27" name="submit" onclick="messaging( event, $('#token27').val(), $('#name27').val(), $('#mail27').val(), $('#message27').val() );" settings="backcolor,font">ارسال</button>
	</form>
</div>
