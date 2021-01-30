<style>
.background42{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 2;
}
.title42{
	position: relative;
	font: bold 75px mitra, roya, nazanin;
	margin: 0px;
	color: rgba(0, 0, 0, 1);
	text-align: center;
	width: 40%;
	margin: 0px 30%;
	z-index: 3;
}
.team42{
	position: relative;
	padding: 0px;
	padding-bottom: 0px;
	margin: 0px;
}
.member42{
	position: absolute;
	width: 30%;
	height: 85%;
	top: 0px;
	margin: 0px;
	text-align: center;
	color: rgba(0, 0, 0, 1);
	z-index: 3;
}
.right42{
	right: 20%;
	position: relative;
	padding-bottom: 25px;
}
.left42{
	left: 20%;
}
.member42 .member42-pic{
	position: relative;
	width: 50%;
	margin-top: 10%;
	border-radius: 50%;
	border: 7px solid rgba(0, 0, 0, 0);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, 1);
	z-index: 3;
}
.member42 .name42{
	position: relative;
	margin-top: 10px;
	font: bold 40px mitra, roya, nazanin;
}
.member42 .post42{
	position: relative;
	font: 27px roya, mitra, nazanin;
	margin-top: -35px;
	opacity: 0.65;
}
.member42 .desc42{
	position: relative;
	width: 70%;
	margin: 0px 15%;
	font: 25px mitra, roya, nazanin;
	text-align: center;
}

@media screen and (max-width: 480px){
	.background42{
		height: 100%;
	}
	.title42{
		width: 90%;
		margin: 0px 5%;
		font-size: 55px;
		text-align: center;
	}
	.member42{
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
<div id="m42" style="position: relative; width: 100%;">
	<div class="background42" settings="backcolor"></div>
	<p class="title42" settings="text,font">اعضای تیم</p>
	<div class="team42">
		<div class="member42 right42">
			<img class="member42-pic" src="http://cheltikkeh.com/includes/images/modules/profile1.jpg" settings="src">
			<p class="name42" settings="text,font">سعید</p>
			<p class="post42" settings="text,font">مدیر تجاری پروژه</p>
			<p class="desc42" settings="text,font">با بیش از 8 سال سابقه ی فعالیت فضای مجازی و تجارت الکترونیک در سطح بین المللی</p>
		</div>
		<div class="member42 left42">
			<img class="member42-pic" src="http://cheltikkeh.com/includes/images/modules/profile2.jpg" settings="src">
			<p class="name42" settings="text,font">کیوان</p>
			<p class="post42" settings="text,font">برنامه نویس وب</p>
			<p class="desc42" settings="text,font">بیش از 5 سال سابقه ی برنامه نویسی به زبان های php  و jquery و مسلط به اپلیکیشن نویسی اندروید</p>
		</div>
	</div>
</div>