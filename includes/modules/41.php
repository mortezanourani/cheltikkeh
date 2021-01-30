<style>
.background41{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
}

.title41{
	position: relative;
	font: bold 75px mitra, roya, nazanin;
	margin: 0px;
	color: rgba(0, 0, 0, 1);
	text-align: center;
	width: 40%;
	margin: 0px 30%;
	z-index: 3;
}

.team41{
	position: relative;
	padding: 0px;
	margin: 0px;
	text-align: right;
}
.member41{
	position: relative;
	width: 30%;
	height: 550px;
	top: 0px;
	margin: 0px;
	margin-top: -550px;
	text-align: center;
	overflow: hidden;
	z-index: 3;
}
.right41{
	margin-right: 5%;
	margin-top: 0px;
}
.center41{
	margin-right: 35%;
}
.left41{
	margin-right: 65%;
}
.member41 .member41-pic{
	position: relative;
	width: 50%;
	margin-top: 10%;
	border-radius: 50%;
	border: 7px solid rgba(60, 120, 180, 0);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.member41 .name41{
	position: relative;
	margin-top: 10px;
	font: bold 40px mitra, roya, nazanin;
}
.member41 .post41{
	position: relative;
	font: 27px roya, mitra, nazanin;
	margin-top: -35px;
	opacity: 0.65;
}
.member41 .desc41{
	position: relative;
	width: 70%;
	margin: 0px 15%;
	font: 25px mitra, roya, nazanin;
	text-align: center;
}

@media screen and (max-width: 480px){
	.member41{
		width: 90%;
		margin: 0px 5%;
	}
}
</style>
<div id="m41" style="position: relative; width: 100%;">
	<div class="background41" settings="backcolor"></div>
	<p class="title41" settings="text,font">اعضای تیم</p>
	<div class="team41">
		<div class="member41 right41">
			<img class="member41-pic" src="http://cheltikkeh.com/includes/images/modules/profile1.jpg" settings="src">
			<p class="name41" settings="text,font">سعید</p>
			<p class="post41" settings="text,font">مدیر تجاری پروژه</p>
			<p class="desc41" settings="text,font">با بیش از 8 سال سابقه ی فعالیت فضای مجازی و تجارت الکترونیک در سطح بین المللی</p>
		</div>
		<div class="member41 center41">
			<img class="member41-pic" src="http://cheltikkeh.com/includes/images/modules/profile2.jpg" settings="src">
			<p class="name41" settings="text,font">کیوان</p>
			<p class="post41" settings="text,font">برنامه نویس وب</p>
			<p class="desc41" settings="text,font">بیش از 5 سال سابقه ی برنامه نویسی به زبان های php  و jquery و مسلط به اپلیکیشن نویسی اندروید</p>
		</div>
		<div class="member41 left41">
			<img class="member41-pic" src="http://cheltikkeh.com/includes/images/modules/profile3.jpg" settings="src">
			<p class="name41" settings="text,font">سارا</p>
			<p class="post41" settings="text,font">طراح و گرافیست</p>
			<p class="desc41" settings="text,font">طراح و گرافیست، بیش از 5 سال کار حرفه ای به عنوان طراح لوگو برای وب سایت ها و شرکت ها</p>
		</div>
	</div>
</div>