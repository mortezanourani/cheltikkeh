<style>
.background44{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(50, 150, 250, 1);
}

.title44{
	position: relative;
	font: bold 75px mitra, roya, nazanin;
	margin: 0px;
	color: rgba(235, 235, 235, 1);
	text-align: center;
	width: 40%;
	margin: 0px 30%;
	z-index: 3;
}

.team44{
	position: relative;
	padding: 0px;
	margin: 0px;
	text-align: right;
}
.member44{
	position: relative;
	width: 30%;
	height: 550px;
	top: 0px;
	margin: 0px;
	margin-top: -550px;
	text-align: center;
	color: rgba(235, 235, 235, 1);
	overflow: hidden;
	z-index: 3;
}
.right44{
	margin-right: 20%;
	margin-top: 0px;
}
.left44{
	margin-right: 50%;
}
.member44 .member44-pic{
	position: relative;
	width: 50%;
	margin-top: 10%;
	border-radius: 7px;
	border: 7px solid rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.member44 .name44{
	position: relative;
	margin-top: 10px;
	font: bold 40px mitra, roya, nazanin;
}
.member44 .post44{
	position: relative;
	font: 27px roya, mitra, nazanin;
	margin-top: -35px;
	opacity: 0.65;
}
.member44 .desc44{
	position: relative;
	width: 70%;
	margin: 0px 15%;
	font: 25px mitra, roya, nazanin;
	text-align: center;
}

@media screen and (max-width: 480px){
	.member44{
		width: 90%;
		margin: 0px 5%;
	}
}
</style>
<div id="m44" style="position: relative; width: 100%;">
	<div class="background44" settings="backcolor"></div>
	<p class="title44" settings="text,font">اعضای تیم</p>
	<div class="team44">
		<div class="member44 right44">
			<img class="member44-pic" src="http://cheltikkeh.com/includes/images/modules/profile1.jpg" settings="src">
			<p class="name44" settings="text,font">سعید</p>
			<p class="post44" settings="text,font">مدیر تجاری پروژه</p>
			<p class="desc44" settings="text,font">با بیش از 8 سال سابقه ی فعالیت فضای مجازی و تجارت الکترونیک در سطح بین المللی</p>
		</div>
		<div class="member44 left44">
			<img class="member44-pic" src="http://cheltikkeh.com/includes/images/modules/profile2.jpg" settings="src">
			<p class="name44" settings="text,font">کیوان</p>
			<p class="post44" settings="text,font">برنامه نویس وب</p>
			<p class="desc44" settings="text,font">بیش از 5 سال سابقه ی برنامه نویسی به زبان های php  و jquery و مسلط به اپلیکیشن نویسی اندروید</p>
		</div>
	</div>
</div>