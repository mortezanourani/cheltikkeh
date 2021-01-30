<style>
.background45{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 200, 1);
	z-index: 2;
}
.title45{
	position: relative;
	font: bold 75px mitra, roya, nazanin;
	margin: 0px;
	color: rgba(235, 85, 5, 1);
	text-align: center;
	width: 40%;
	margin-right: 30%;
	z-index: 3;
}
.team45{
	position: relative;
	padding: 0px;
	padding-bottom: 0px;
	text-align: right;
	margin: 0px;
}
.member45{
	position: relative;
	width: 28%;
	height: 500px;
	top: 0px;
	margin: 0px;
	margin-top: -500px;
	text-align: center;
	color: rgba(0, 0, 0, 1);
	z-index: 3;
}
.right45{
	margin-right: 7%;
	margin-top: 0px;
}
.center45{
	margin-right: 36%;
}
.left45{
	margin-right: 65%;
}
.member45 .member45-pic{
	position: relative;
	width: 50%;
	margin-top: 10%;
	padding-bottom: 50px;
	border-radius: 5px;
	background-color: rgba(235, 85, 5, 1);
	border: 5px solid rgba(235, 85, 5, 0);
	box-shadow: 1px 1px 2px rgba(0, 0, 0, 0);
	z-index: 3;
}
.member45 .post45{
	position: relative;
	font: 23px mitra, roya, nazanin;
	margin-top: -45px;
	color: rgba(235, 235, 235, 1);
	z-index: 3;
}
.member45 .name45{
	position: relative;
	margin: 10px;
	font: bold 40px mitra, roya, nazanin;
}
.member45 .desc45{
	position: relative;
	width: 70%;
	margin: 0px 15%;
	font: 20px mitra, roya, nazanin;
	text-align: center;
}

@media screen and (max-width: 480px){
	.background45{
		height: 100%;
	}
	.title45{
		width: 90%;
		margin: 0px 5%;
		font-size: 55px;
		text-align: center;
	}
	.member45{
		position: relative;
		width: 90%;
		height: auto;
		left: 0px;
		right: 0px;
		margin: 0px 5%;
		padding-bottom: 50px;
	}
}
</style>
<div id="m45" style="position: relative; width: 100%; text-align: right;">
	<div class="background45" settings="backcolor"></div>
	<p class="title45" settings="text,font">اعضای تیم</p>
	<div class="team45">
		<div class="member45 right45">
			<img class="member45-pic" src="http://cheltikkeh.com/includes/images/modules/profile1.jpg" settings="src,backcolor,bordercolor">
			<p class="post45" settings="text,font">مدیر تجاری پروژه</p>
			<p class="name45" settings="text,font">سعید</p>
			<p class="desc45" settings="text,font">با بیش از 8 سال سابقه ی فعالیت فضای مجازی و تجارت الکترونیک در سطح بین المللی</p>
		</div>
		<div class="member45 center45">
			<img class="member45-pic" src="http://cheltikkeh.com/includes/images/modules/profile2.jpg" settings="src,backcolor,bordercolor">
			<p class="post45" settings="text,font">برنامه نویس وب</p>
			<p class="name45" settings="text,font">کیوان</p>
			<p class="desc45" settings="text,font">بیش از 5 سال سابقه ی برنامه نویسی به زبان های php  و jquery و مسلط به اپلیکیشن نویسی اندروید</p>
		</div>
		<div class="member45 left45">
			<img class="member45-pic" src="http://cheltikkeh.com/includes/images/modules/profile3.jpg" settings="src,backcolor,bordercolor">
			<p class="post45" settings="text,font">طراح و گرافیست</p>
			<p class="name45" settings="text,font">سارا</p>
			<p class="desc45" settings="text,font">طراح و گرافیست، بیش از 5 سال کار حرفه ای به عنوان طراح لوگو برای وب سایت ها و شرکت ها</p>
		</div>
	</div>
</div>