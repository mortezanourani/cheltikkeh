<style>
#m64{
	direction: rtl;
}
.hidden{
	display: none;
}

.background64{
	position: absolute;
	width: 100%;
	top: 0px;
	bottom: 0px;
	background-color: rgba(255, 255, 255, 1);
}
.post64-image{
	position: relative;
	width: 40%;
	z-index: 1;
}
.post64-image[src=""]{
	opacity: 0;
	min-height: 500px;
}

.post64-title{
	position: absolute;
	width: 50%;
	bottom: 80%;
	right: 40%;
	left: 0px;
	margin: 0px 5%;
	border: 0px;
	text-align: right;
	font: bold 30px mitra, nazanin;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
}
.post64-post{
	position: absolute;
	width: 50%;
	height: 60%;
	top: 25%;
	right: 40%;
	left: 0px;
	margin: 20px 5%;
	border: 0px;
	text-align: justify;
	font: 22px mitra, nazanin;
	overflow: hidden;
	background-color: transparent;
	color: rgba(0, 0, 0, 1);
}
.post64-date{
	position: absolute;
	width: 50%;
	height: 5%;
	top: 20%;
	right: 40%;
	left: 0px;
	margin: 0px 5%;
	border: 0px;
	text-align: justify;
	font: 17px roya, mitra, nazanin;
	overflow: hidden;
	background-color: transparent;
	color: rgba(127, 127, 127, 1);
}

.dirrtl{
	position: relative;
	text-align: right;
}
.dirrtl .post64-title,
.dirrtl .post64-post,
.dirrtl .post64-date{
	right: 40%;
	left: 0px;
}

.dirltr{
	position: relative;
	text-align: left;
}
.dirltr .post64-title,
.dirltr .post64-post,
.dirltr .post64-date{
	left: 40%;
	right: 0px;
}

@media screen and (max-width: 480px){
	.post64-image{
		width: 100%;
	}
	.post64-image[src=""]{
		display: none;
	}

	.dirltr,
	.dirrtl{
		direction: rtl;
		text-align: right;
		margin-bottom: 25px;
	}
	.dirrtl .post64-title,
	.dirrtl .post64-date,
	.dirrtl .post64-post,
	.dirltr .post64-title,
	.dirltr .post64-date,
	.dirltr .post64-post{
		position: relative;
		width: 90%;
		height: auto;
		left: auto;
		right: 0px;
		top: 0px;
		bottom: 0px;
		margin: 15px 5%;
		text-align: center;
	}
}
</style>
<div id="m64" style="position: relative; width: 100%; overflow: hidden; text-align: right;">
	<div class="background64" settings="backcolor"></div>
	<p class="hidden">#post_read_2#</p>
		<img class="post64-image" src="http://cheltikkeh.com/includes/images/modules/content64.jpg">
		<p class="post64-title" settings="font">چراغ مطالعه طرح سوسن</p>
		<p class="post64-date" settings="font">25 اسفند 1394</p>
		<p class="post64-post" settings="font">بدنه استیل زد خش<br>چهار عدد لامپ ال ای دی<br>سیم 1.5 متری<br>دارای باطری با قابلیت شارژ برای 7 ساعت کار کرد<br>دو حالت روشنایی: روشنایی 50% و روشنایی 100%<br>ارتفاع: 45 سانتی متر<br>وزن: 340 گرم<br><br>قیمت برای مصرف کننده: 20,0000 تومان<br>هزینه ارسال به خارج از استان: 2,000 تومان</p>
	<p class="hidden">#/post_read_2#</p>
</div>
