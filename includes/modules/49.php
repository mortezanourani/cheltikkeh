<style>
.background49{
	position: absolute;
	width: 100%;
	height: 100%;
	background-color: rgba(255, 255, 255, 1);
	z-index: 2;
}
.title49{
	position: relative;
	font: bold 75px mitra, roya, nazanin;
	margin: 0px;
	color: rgba(0, 0, 0, 1);
	text-align: center;
	width: 40%;
	margin-right: 30%;
	z-index: 3;
}
.team49{
	position: relative;
	padding: 0px;
	padding-bottom: 0px;
	text-align: center;
	margin: 0px;
}
.member49{
	position: relative;
	width: 40%;
	height: 150px;
	top: 0px;
	margin: 0px;
	margin-top: -180px;
	padding-bottom: 30px;
	text-align: left;
	color: rgba(235, 235, 235, 1);
	z-index: 3;
}
.right49{
	margin-right: 9%;
	margin-top: 0px;
	text-align: right;
}
.left49{
	margin-right: -moz-calc( 49% + 25px );
	margin-right: -webkit-calc( 49% + 25px );
}
.member49 .member49-pic{
	position: relative;
	height: 100%;
	margin: 0px;
	border: 5px solid rgba(50, 125, 25, 1);
	z-index: 3;
}
.member49 .member49-info{
	position: relative;
	height: 100%;
	margin-top: -160px;
	margin-left: 185px;
	padding: 5px;
	background-color: rgba(50, 125, 25, 1);
	overflow: hidden;
	z-index: 3;
}
.right49 .member49-info{
	margin-left: 0px;
	margin-right: 185px;
}
.member49 .name49{
	position: relative;
	width: 90%;
	margin: 0px 5%;
	font: bold 35px mitra, roya, nazanin;
	text-align: right;
}
.member49 .post49{
	position: relative;
	width: 90%;
	margin: -10px 5% 0px 5%;
	font: 20px mitra, roya, nazanin;
	color: rgba(235, 235, 235, 1);
	text-align: right;
	z-index: 3;
}
.member49 .desc49{
	position: relative;
	margin: 0px;
	width: 90%;
	margin: 0px 5%;
	font: 17px mitra, roya, nazanin;
	text-align: justify;
}

@media screen and (max-width: 480px){
	.background49{
		height: 100%;
	}
	.title49{
		width: 90%;
		margin: 0px 5%;
		font-size: 65px;
		text-align: center;
	}
	.member49{
		position: relative;
		width: 90%;
		height: auto;
		margin: 0px 5%;
		padding-bottom: 25px;
		text-align: center;
	}
	.member49 .member49-pic{
		width: 250px;
		height: 250px;
		margin: 0px 5%;
	}
	.member49 .member49-info{
		position: relative;
		width: 250px;
		height: auto;
		margin: 25px 0px 0px 0px;
		margin-right: -webkit-calc( 50% - 130px );
	}
	.member49 .name49{
		text-align: center;
	}
	.member49 .post49{
		text-align: center;
		margin: 0px 5%;
	}
	.member49 .desc49{
		margin: 15px 5%;
		text-align: center;
		z-index: 3;
	}
}
</style>
<div id="m49" style="position: relative; width: 100%; text-align: right;">
	<div class="background49" settings="backcolor"></div>
	<p class="title49" settings="text,font">اعضای تیم</p>
	<div class="team49">
		<div class="member49 right49">
			<img class="member49-pic" src="http://cheltikkeh.com/includes/images/modules/profile1.jpg" settings="src,bordercolor">
			<div class="member49-info">
				<p class="name49" settings="text,font,parent-backcolor">سعید</p>
				<p class="post49" settings="text,font,parent-backcolor">مدیر تجاری پروژه</p>
				<p class="desc49" settings="text,font,parent-backcolor">با بیش از 8 سال سابقه ی فعالیت فضای مجازی و تجارت الکترونیک در سطح بین المللی</p>
			</div>
		</div>
		<div class="member49 left49">
			<img class="member49-pic" src="http://cheltikkeh.com/includes/images/modules/profile2.jpg" style="border-color: rgba(50, 100, 200, 1);" settings="src,bordercolor">
			<div class="member49-info" style="background-color: rgba(50, 100, 200, 1);">
				<p class="name49" settings="text,font,parent-backcolor">کیوان</p>
				<p class="post49" settings="text,font,parent-backcolor">برنامه نویس وب</p>
				<p class="desc49" settings="text,font,parent-backcolor">بیش از 5 سال سابقه ی برنامه نویسی به زبان های php  و jquery و مسلط به اپلیکیشن نویسی اندروید</p>
			</div>
		</div>
	</div>
</div>