<style>
#m35{
	direction: rtl;
	text-align: left;
	background-color: rgba(255, 255, 255, 1);
}
.header35{
	position: relative;
	width: 50%;
	z-index: 1;
}

.text35{
	position: absolute;
	width: 40%;
	right: 0%;
	bottom: 75%;
	left: 50%;
	margin: 0px 5%;
	font: bold 50px mitra, roya, nazanin;
	color: rgba(0, 0, 0, 1);
	text-align: right;
	z-index: 3;
}

.form35{
	position: absolute;
	width: 40%;
	top: 30%;
	right: 3%;
	bottom: 5%;
	padding-top: 5px;
	border-radius: 3px;
	background-color: transparent;
	text-align: right;
	overflow: hidden;
	z-index: 3;
}
.form35 hr{
	width: 90%;
	outline: none;
	border: 0px;
	margin: 1% 5%;
	border-bottom: 1px solid rgba(0, 0, 0, 0.3);
}
.form35 input[type="text"]{
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
.form35 #mail35{
	direction: ltr;
	text-align: right;
}
.form35 textarea{
	width: 90%;
	height: 30%;
	outline: none;
	padding: 10px 25px;
	margin: 0px 5%;
	border: 0px;
	font: bold 20px roya, mitra, nazanin;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
	resize: none;
}
.form35 #submit35{
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
	background-color: rgba(50, 100, 200, 1);
	box-shadow: 0px 0px 2px rgba(0, 0, 0, 1);
	color: rgba(255, 255, 255, 1);
	overflow: hidden;
}
.form35 #submit35:before{
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
.form35 #submit35:hover{
	opacity: 0.9;
}

@media screen and (max-width: 480px){
	#m35{
		height: 650px;
	}
	.header35{
		display: none;
	}
	.text35{
		width: 90%;
		margin: 0px 5%;
	}
	.form35{
		width: 90%;
		right: 5%;
		left: 5%;
	}
	.form35 textarea{
		height: 45%;
	}
	.form35 #submit35{
		width: 90%;
		height: 55px;
		margin: 0px 5%;
	}
}
</style>
<div id="m35" style="position: relative; width: 100%; overflow: hidden;">
	<img class="header35" src="http://cheltikkeh.com/includes/images/modules/contact35.jpg" settings="src,parent-backcolor">
	<p class="text35" settings="text,font">با ما در تماس باشید</p>
	<form class="form35" enctype="multipart/form-data" method="post">
		<input type="hidden" id="token35" name="token" value="#token#">
		<input type="text" id="name35" name="name" placeholder="نام و نام خانوادگی" required settings="font"><hr>
		<input type="text" id="mail35" name="mail" placeholder="پست الکترونیکی" required settings="font"><hr>
		<textarea type="text" id="message35" name="message" placeholder="پیام یا پرسش شما" required settings="font"></textarea><hr>
		<button id="submit35" name="submit" onclick="messaging( event, $('#token35').val(), $('#name35').val(), $('#mail35').val(), $('#message35').val() );" settings="backcolor,font">ارسال پیام</button>
	</form>
</div>
