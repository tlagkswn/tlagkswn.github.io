<?php include_once ("eventadm/ckAuthor.php"); ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/css/font/notosans.css?v=1" media="screen" />
  <link href="css/jquery.bxslider.css" rel="stylesheet" />
  <style type="text/css">
	*{margin:0;padding:0;font-family: 'NotoSansKr', sans-serif;}
	body { font-family: 'NotoSansKr', sans-serif; }

	li{list-style:none;}
	a:link,a:visited{text-decoration:none;color:#ccc;display:block;}

	/*##################### header ########################*/

		#header{font-size:14px;width:1200px;height:88px;line-height:105px;margin:0 auto;font-weight:500;}
		h1{display:inline-block;vertical-align:middle;}
		#header span{vertical-align:middle;}
		.line{height:9px;width:1px;background-color:#CBCBCB;display:inline-block;margin:0 20px 0 15px;}
		.right_logo{display:inline-block;width:887px;height:100%;text-align:right;margin-top:-20px;background-color:red;}
		.top_{position:relative;top:-10px;}

	/*##################### visual ########################*/
		#visual{width:100%;height:500px;position:relative;}
		#visual p{position:absolute;left:50%;top:0;transform:translate(-50%,0);}

	/*##################### content1 ########################*/
		#container{width:1200px;margin:0 auto;font-size:13px;}
		#container a{color:#666666;}
		#container .day{color:#000;}
		#content1{width:100%;height:850px;margin-top:60px;position:relative;}
		.content1_in{width:100%;height:400px;}
		#content1 h4{font-size:20px;text-align:center;}
		#content1 .best li,#content1 .goods li{height:90px;width:100%;margin-top:30px;}
		.best{width:45%;height:400px;padding-right:5%;line-height:23px;position:absolute;left:0;top:450px;}
		.goods{width:45%;height:400px;padding-left:5%;line-height:23px;position:absolute;right:0;top:450px;}

		.img_area{width:30%;height:100%;float:left;}
		.text_area{width:70%;height:100%;float:left;}
		#container .price{color:#0E4C9F;font-weight:700;}

		.special{width:100%;height:400px;position:absolute;left:0;top:0;}
		.special h4{padding-bottom:30px;}
		.navy{color:#0E4C9F}
		
		.special_L{height:340px;width:50%;float:left;position:relative;overflow:hidden;}
		ul.flim{width:300%;height:100%;}
		ul.flim li{width:33.334%;float:left;overflow:hidden;}
		ul.flim2{width:300%;height:100%;}
		ul.flim2 li{width:33.33%;float:left;}


		.s_Left_button{position:absolute;left:0;top:155px;}
		.s_Right_button{position:absolute;right:0;top:155px;}

		.special_R{width:49%;height:340px;float:left;border:1px solid #E6E6E6;border-left:none;text-indent:13px;overflow:hidden;}
		.special_R a{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
		.special_R_top{width:100%;height:67px;border-bottom:1px solid #E6E6E6;}
		.r_img{text-align:center;width:100%;margin:11px 0;}
		.s_title{font-size:14px;}
		.special_R_M{width:100%;height:142px;padding-top:13px;border-bottom:1px solid #E6E6E6;line-height:26px;}
		.special_R_Bottom{width:100%;height:83px;text-align:center;}
		.special_R_Bottom .price{margin:11px 0;font-size:20px;}
		#container .reser{width:240px;height:35px;background-color:#3F79B3;margin:0 auto;color:#fff;line-height:35px;}

		#container #content1 a:hover{color:#0E4C9F;text-decoration:underline;}

	/*##################### side ########################*/
		.side_nav{position:absolute;left:1620px;top:690px;}

	/*##################### content2 ########################*/

		#content2_Wrap{width:100%;height:888px;background-color:#F6F8FA;margin-top:88px;}
		#content2{width:1200px;margin:0 auto;;height:100%;font-size:14px;overflow:hidden;}
		#content2 h3{width:100%;text-align:center;margin:47px auto 25px;font-size:18px;}
		#content2 ul{width:100%;height:888px;}
		#content2 li{width:600px;height:357px;float:left;}

		.con2_cap{width:100%;position:relative;margin-bottom:10px;}
		.con2_title{position:absolute;left:50%;top:5px;transform:translate(-50%,0);color:#fff;font-size:16px;}
		#content2 li.con2_r{width:562px;padding-left:33px;padding-bottom:45px;}
		#content2 ul div{width:270px;height:100%;float:left;position:relative;}
		#content2 ul div span{position:absolute;left:0;top:0;display:inline-block;padding:5px 15px;background-color:rgba(0,0,0,0.5);color:#fff;}
		#content2 ul div.con2_div_r{margin-left:20px;}

		.num{width:99%;height:43px;border:1px solid #E7E7E7;text-align:center;line-height:45px;margin-top:10px;color:#555;}
		.num img{margin:0 10px;}

	/*##################### content3 ########################*/
			
		#content3{width:1200px;height:355px;margin:50px auto 70px;}
		#content3 a{color:#555;}
		.con3_l{width:870px;height:285px;position:relative;float:left;}
		.con3_l_top{width:100%;height:100%;}
		#content3 h3{margin-bottom:45px;}
		.con3_l_top{width:760px;height:65px;margin:0 auto;text-align:center;}
		.con3_l_top a,.con3_l_bottom a{width:190px;float:left;}
		.con3_l_top a img{margin-top:8px;position:relative;z-index:10}

		.con3_l_bottom{width:760px;height:135px;padding-top:15px;margin:0 auto;text-align:center;overflow:hidden;}
		.con3_l_bottom img{padding-bottom:8px;}

		.sale{width:100%;height:50px;background-color:#F3F3F3;color:#555;margin-top:18px;line-height:50px;text-align:center;clear:both;}
		.con3_line{width:100%;display:block;height:1px;background-color:#999999;position:absolute;left:0;top:36px;}
		.con3_r{height:272px;width:294px;float:left;text-align:center;display:block;border:1px solid #eee;font-size:13px;font-weight:600;line-height:23px;margin-left:33px;margin-top:10px;}
		.con3_r img{margin-top:30px;}
		.con_num{font-size:18px;margin-top:5px;}


	/*##################### footer ########################*/
		
		#footer{width:1200px;height:108px;overflow:hidden;margin:0 auto;font-size:12px;color:#777;}
		.phone{width:600px;float:left;}
		.phone img{margin:0 6px 0 12px;vertical-align:middle;}
		.sns{width:600px;float:left;text-align:right;overflow:hidden;}
		.sns a{display:inline-block;vertical-align:middle;}
		.blog{margin-left:10px;}	
		#footer span.footer_line{display:block;clear:both;width:100%;height:1px;background-color:#D6D6D6;margin-top:10px;}
		.address{width:100%;line-height:20px;margin-top:10px;}
		.address img{margin:0 6px 0 10px;vertical-align:middle;}

	@media all and (min-width:600px) and (max-width:1210px){
		#header{font-size:13px;width:100%;height:88px;line-height:105px;margin:0 auto;font-weight:500;overflow:hidden;}

	  /*##################### visual ########################*/
		#visual{width:100%;height:auto;position:relative;overflow:hidden;}
		#visual p{width:100%;position:relative;left:50%;top:0;transform:translate(-50%,0);}
		#visual p img{width:100%;}
	  /*##################### content1 ########################*/
		#container{width:100%;margin:70px auto 0;font-size:11.5px;height:850px;position:relative;overflow:hidden;}
		#container a{color:#666666;}
		#container .day{color:#000;}
		#content1{width:560px;padding:0 auto;height:450px;margin-top:60px}
		#content1 h4{font-size:15px;text-align:center;}
		#content1 .best li,#content1 .goods li{height:90px;width:100%;margin-top:30px;}
		.best{width:275px;height:450px;padding-right:5px;line-height:23px;float:left;position:absolute;left:50%;top:0;transform:translate(-100%,450px);}
		.goods{width:275px;height:450px;padding-left:5px;line-height:23px;float:left;position:absolute;left:50%;top:0;transform:translate(0,450px);}
		.img_area{width:105px;height:100%;float:left;}
		.text_area{width:170px;height:100%;float:left;}
		#container .price{color:#0E4C9F;font-weight:700;}

		.special{width:560px;height:400px;float:left;position:absolute;left:50%;top:0;transform:translate(-50%,0);}
		.special h4{padding-bottom:30px;}
		.navy{color:#0E4C9F}
		
		.special_L{height:340px;width:279px;float:left;position:relative;overflow:hidden;background-color:#aaa;}
		ul.flim{width:300%;height:100%;}
		ul.flim li{width:33.33%;float:left;}
		ul.flim2{width:300%;height:100%;}
		ul.flim2 li{width:33.33%;float:left;}


		.s_Left_button{position:absolute;left:0;top:155px;}
		.s_Right_button{position:absolute;right:0;top:155px;}

		.special_R{width:279px;height:340px;float:left;border:1px solid #E6E6E6;border-left:none;text-indent:13px;overflow:hidden;}
		.special_R a{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
		.special_R_top{width:100%;height:67px;border-bottom:1px solid #E6E6E6;}
		.r_img{text-align:center;width:100%;margin:11px 0;}
		.s_title{font-size:13px;}
		.special_R_M{width:100%;height:142px;padding-top:13px;border-bottom:1px solid #E6E6E6;line-height:26px;}
		.special_R_Bottom{width:100%;height:83px;text-align:center;}
		.special_R_Bottom .price{margin:11px 0;font-size:15px;}
		#container .reser{width:240px;height:35px;background-color:#3F79B3;margin:0 auto;color:#fff;line-height:35px;}

		#container #content1 a:hover{color:#0E4C9F;text-decoration:underline;}
		
	  /*##################### content2 ########################*/

		#content2_Wrap{width:100%;height:1788px;background-color:#F6F8FA;margin-top:88px;}
		#content2{width:567px;margin:0 auto;;height:100%;font-size:14px;overflow:hidden;}
		#content2 h3{width:100%;text-align:center;margin:47px auto 25px;font-size:18px;}
		#content2 ul{width:100%;height:888px;}
		#content2 li{width:567px;height:357px;float:none;}

		.con2_cap{width:100%;height:35px;position:relative;margin-bottom:10px;}
		.con2_cap p{width:100%;height:35px;line-height:0;padding:0;margin:0;}
		.con2_title{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);color:#fff;font-size:16px;background-color:red;}
		.con2_title img{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);}

		#content2 li.con2_r{width:562px;padding-left:0;padding-bottom:0;margin-bottom:45px;}
		#content2 ul div{width:270px;height:100%;float:left;position:relative;}
		#content2 ul div span{position:absolute;left:0;top:0;display:inline-block;padding:5px 15px;background-color:rgba(0,0,0,0.5);color:#fff;}
		#content2 ul div.con2_div_r{margin-left:20px;}

		.num{width:99%;height:43px;border:1px solid #E7E7E7;text-align:center;line-height:45px;margin-top:10px;color:#555;}
		.num img{margin:0 10px;}

	  /*##################### content3 ########################*/
			
		#content3{width:100%;height:705px;margin:50px auto 70px;}
		#content3 a{color:#555;}
		.con3_l{width:100%;;height:285px;position:relative;float:none;}
		.con3_l_top{width:100%;height:100%;}
		#content3 h3{margin-bottom:45px;}
		.con3_l_top{width:98%;height:65px;margin:0 auto;text-align:center;}
		.con3_l_top a,.con3_l_bottom a{width:25%;float:left;}
		.con3_l_bottom p{width:100%;}
		.con3_l_top a img{margin-top:8px;position:relative;z-index:10}

		.con3_l_bottom{width:98%;height:135px;padding-top:15px;margin:0 auto;text-align:center;}
		.con3_l_bottom img{padding-bottom:8px;}

		.sale{width:100%;height:50px;background-color:#F3F3F3;color:#555;margin-top:18px;line-height:50px;text-align:center;clear:both;}
		.con3_line{width:100%;display:block;height:1px;background-color:#999999;position:absolute;left:0;top:36px;}
		.con3_r{height:272px;width:294px;float:none;text-align:center;display:block;border:1px solid #eee;font-size:13px;font-weight:600;line-height:23px;margin-left:33px;margin-top:50px;margin:50px auto 0;}
		.con3_r img{margin-top:30px;}
		.con_num{font-size:18px;margin-top:5px;}
	  
	  /*##################### footer ########################*/
		
		#footer{width:100%;height:108px;overflow:hidden;margin:0 auto;font-size:10.5px;color:#777;}
		.phone{width:70%;float:left;}
		.phone img{margin:0 6px 0 12px;vertical-align:middle;}
		.sns{width:30%;float:left;text-align:right;overflow:hidden;}
		.sns a{display:inline-block;vertical-align:middle;}
		.blog{margin-left:10px;}	
		#footer span.footer_line{display:block;clear:both;width:100%;height:1px;background-color:#D6D6D6;margin-top:10px;}
		.address{width:100%;line-height:20px;margin-top:10px;}
		.address img{margin:0 6px 0 10px;vertical-align:middle;}
	}

	@media all and (min-width:320px) and (max-width:599px){
		#header{font-size:12px;width:100%;height:88px;line-height:105px;margin:0 auto;font-weight:500;overflow:hidden;}
	 /*##################### visual ########################*/
		#visual{width:100%;height:auto;position:relative;overflow:hidden;}
		#visual p{width:100%;position:relative;left:50%;top:0;transform:translate(-50%,0);}
		#visual p img{width:100%;}
	 /*##################### content1 ########################*/
		#container{width:100%;margin:30px auto 0;font-size:11.5px;height:1600px;position:relative;overflow:hidden;}
		#container a{color:#666666;}
		#container .day{color:#000;}
		#content1{width:100%;padding:0 auto;height:450px;margin-top:60px;}
		#content1 h4{font-size:15px;text-align:center;}
		#content1 .best li,#content1 .goods li{height:90px;width:100%;margin-top:30px;}
		.best{width:275px;height:450px;padding-right:5px;line-height:23px;float:left;position:absolute;left:50%;top:0;transform:translate(-50%,750px);}
		.goods{width:275px;height:450px;padding-left:5px;line-height:23px;float:left;position:absolute;left:50%;top:0;transform:translate(-50%,1200px);}
		.img_area{width:105px;height:100%;float:left;}
		.text_area{width:170px;height:100%;float:left;}
		#container .price{color:#0E4C9F;font-weight:700;}

		.special{width:560px;height:400px;float:left;position:absolute;left:50%;top:0;transform:translate(-50%,0);}
		.special h4{padding-bottom:30px;}
		.navy{color:#0E4C9F}
		
		.special_L{height:320px;width:279px;float:none;position:relative;overflow:hidden;background-color:#aaa;background-color:red;margin:0 auto;}
		ul.flim{width:300%;height:100%;}
		ul.flim li{width:33.33%;float:left;}
		ul.flim2{width:300%;height:100%;}
		ul.flim2 li{width:33.33%;float:left;}


		.s_Left_button{position:absolute;left:0;top:155px;}
		.s_Right_button{position:absolute;right:0;top:155px;}

		.special_R{width:279px;height:340px;float:none;border:1px solid #E6E6E6;border-left:1px solid #E6E6E6;text-indent:13px;overflow:hidden;margin:0 auto;}
		.special_R a{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
		.special_R_top{width:100%;height:67px;border-bottom:1px solid #E6E6E6;}
		.r_img{text-align:center;width:100%;margin:11px 0;}
		.s_title{font-size:13px;}
		.special_R_M{width:100%;height:142px;padding-top:13px;border-bottom:1px solid #E6E6E6;line-height:26px;}
		.special_R_Bottom{width:100%;height:83px;text-align:center;}
		.special_R_Bottom .price{margin:11px 0;font-size:15px;}
		#container .reser{width:240px;height:35px;background-color:#3F79B3;margin:0 auto;color:#fff;line-height:35px;}

		#container #content1 a:hover{color:#0E4C9F;text-decoration:underline;}
		
	  /*##################### content2 ########################*/

		#content2_Wrap{width:100%;height:3088px;background-color:#F6F8FA;margin-top:88px;}
		#content2{width:320px;margin:0 auto;;height:100%;font-size:12px;overflow:hidden;}
		#content2 h3{width:100%;text-align:center;margin:47px auto 25px;font-size:15px;}
		#content2 ul{width:100%;height:888px;}
		#content2 li{width:100%;height:750px;float:none;}

		.con2_cap{width:100%;position:relative;margin-bottom:10px;}
		.con2_cap p{}
		.con2_cap img{width:100%;}
		.con2_title{position:absolute;left:50%;top:50%;transform:translate(-50%,-80%);color:#fff;font-size:12px;}
		#content2 li.con2_r{width:320px;padding-left:0;padding-bottom:45px;}
		#content2 ul div{width:270px;height:357px;float:none;position:relative;margin:0 auto;}
		#content2 ul div span{position:absolute;left:0;top:0;display:inline-block;padding:5px 15px;background-color:rgba(0,0,0,0.5);color:#fff;}
		#content2 ul div.con2_div_r{margin-left:20px;}

		.num{width:99%;height:43px;border:1px solid #E7E7E7;text-align:center;line-height:45px;margin-top:10px;color:#555;}
		.num img{margin:0 10px;}
	 
	 /*##################### content3 ########################*/
			
		#content3{width:100%;height:705px;margin:50px auto 70px;font-size:12px;}
		#content3 a{color:#555;}
		.con3_l{width:100%;;height:285px;position:relative;float:none;}
		.con3_l_top{width:100%;height:100%;}
		#content3 h3{margin-bottom:45px;}
		.con3_l_top{width:98%;height:65px;margin:0 auto;text-align:center;}
		.con3_l_top a,.con3_l_bottom a{width:25%;float:left;}
		.con3_l_bottom p{width:100%;}
		.con3_l_top a img{margin-top:8px;position:relative;z-index:10}

		.con3_l_bottom{width:98%;height:135px;padding-top:15px;margin:0 auto;text-align:center;}
		.con3_l_bottom img{padding-bottom:8px;width:70%;}

		.sale{width:100%;height:50px;background-color:#F3F3F3;color:#555;margin-top:18px;line-height:50px;text-align:center;clear:both;}
		.con3_line{width:100%;display:block;height:1px;background-color:#999999;position:absolute;left:0;top:33px;}
		.con3_r{height:272px;width:294px;float:none;text-align:center;display:block;border:1px solid #eee;font-size:12px;font-weight:600;line-height:23px;margin-left:33px;margin-top:50px;margin:50px auto 0;}
		.con3_r img{margin-top:30px;}
	 /*##################### footer ########################*/
		
		#footer{width:100%;height:108px;overflow:hidden;margin:0 auto;font-size:10px;color:#777;}
		.phone{width:80%;float:left;}
		.phone img{margin:0 6px 0 12px;vertical-align:middle;}
		.sns{width:20%;float:left;text-align:right;overflow:hidden;}
		.sns a{display:inline-block;vertical-align:middle;}
		.blog{margin-left:3px;}	
		#footer span.footer_line{display:block;clear:both;width:100%;height:1px;background-color:#D6D6D6;margin-top:10px;}
		.address{width:100%;display:inline-block;line-height:15px;margin-top:10px;}
		.address img{margin:0 6px 0 10px;vertical-align:middle;}

	}

</style>
  <script type="text/javascript">
	/*
	$(function(){
		$(".con3_l_bottom p:not(:first)").hide();

	  // tab basic

		$(".con3_l_top a").click(function(){
			var index = $(this).index();
			
			$(".con3_l_bottom p").hide();
			$(".con3_l_bottom p:eq("+index+")").show();
			$(".con3_l_top a").find("img").css("margin-top","8px");
			$(".con3_l_top a").find("img").attr("src","img/location_off.png");
			$(this).find("img").attr("src","img/location.png");
			$(this).find("img").css("margin-top","4px");
		
		})
		$(".con3_l_top a:first").click();

	  // slide

		$(".flim").prepend($(".flim li:last"));
			$(".flim").css({"marginLeft":"-100%"});

			$(".s_Right_button").click(function(){
				$(".flim:not(:animated)").stop().animate({"marginLeft":"-=100%"},500,"swing",function(){
					$(".flim").append($(".flim li:first"));

					$(".flim").css({"marginLeft":"-100%"});
				});
			});

			$(".s_Left_button").click(function(){
				$(".flim:not(:animated)").stop().animate({"marginLeft":"+=100%"},500,"swing",function(){

					$(".flim").prepend($(".flim li:last"));
					$(".flim").css({"marginLeft":"-100%"});

				});
			});

			$(".flim2").prepend($(".flim2 li:last"));
			$(".flim2").css({"marginLeft":"-100%"});

			$(".s_Right_button").click(function(){
				$(".flim2:not(:animated)").stop().animate({"marginLeft":"-=100%"},500,"swing",function(){
					$(".flim2").append($(".flim2 li:first"));

					$(".flim2").css({"marginLeft":"-100%"});
				});
			});

			$(".s_Left_button").click(function(){
				$(".flim2:not(:animated)").stop().animate({"marginLeft":"+=100%"},500,"swing",function(){

					$(".flim2").prepend($(".flim2 li:last"));
					$(".flim2").css({"marginLeft":"-100%"});

				});
			});

	})
	*/
	$(function(){
		$('.bxslider').bxSlider({

		 
		});

		$('.bxslider2').bxSlider({

		 
		});

		$(".special_L .bx-next, .special_R .bx-next").css({"width":"0","hegith":"0"})
		$(".special_L .bx-prev, .special_R .bx-prev").css({"width":"0","hegith":"0"})
		$(".s_Right_button").click(function(){
			$(".special_L .bx-next, .special_R .bx-next").click()
				
		})
		$(".s_Left_button").click(function(){
			$(".special_L .bx-prev, .special_R .bx-prev").click()
		})
	})
  </script>
 </head>
 <body>
	<div id="header">
		<h1><a href="#"><img src="img/logo.png" alt="logo" /></a></h1><span class="top_ line"></span>
		<span class="top_">임직원전용 몰</span>
		<span class="right_logo"><img src="img/right_logo.png" alt="right_logo" /></span>
	</div>

	<div id="visual">
		<ul class="bxslider2">
			<li>
				<img src="img/visual.png"/>
			</li>
			<li>
				<img src="img/visual.png"/>
			</li>
			<li>
				<img src="img/visual.png"/>
			</li>
		</ul>
	</div>

	<div id="container">
		<div id="content1">			
			<div class="content1_in">
				<div class="best">
					<h4><a href="#"><span class="navy">베스트</span> 상품</a></h4>
					<ul>
						<li>
							<a href="#" class="img_area"><img src="img/content3_2.png"/></a>
							<div class="text_area">
								<a href="#" class="day">라오스 실속 5박6일</a>
								<a href="#">역사적, 예술적 유산으로 가득한
								문화도시, 라오스를 방문하세요!</a>
								<a href="#" class="price">1,099,000원 ~ 1,299,000원</a>
							</div>
						</li>
						<li>
							<a href="#" class="img_area"><img src="img/content1_2.png"/></a>
							<div class="text_area">
								<a href="#" class="day">방콕시티 에어텔 3/4박</a>
								<a href="#">틀에 박힌 여행 일정은 싫다!
								내 맘대로, 태국 자유여행!</a>
								<a href="#" class="price">504,800원 ~ 2,494,800원</a>
							</div>
						</li>
						<li>
							<a href="#" class="img_area"><img src="img/content1_3.png"/></a>
							<div class="text_area">
								<a href="#" class="day">서유럽 4국 10일</a>
								<a href="#">영국, 프랑스, 스위스, 이태리~
								서유럽 핵심 4개국 실속 초특가!</a>
								<a href="#" class="price">2,090,000 원</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="special">
					<h4><a href="#"><span class="navy">제휴사</span> 특별 상품</a></h4>
					<div class="special_L">
						<ul class="flim bxslider">
							<li><a href="#"><img src="img/content2_1.png" alt="content2_1" /></a></li>

							<li><a href="#"><img src="img/content1_1.png" alt="content2_1" /></a></li>
						</ul>
						<a href="#none" class="s_Left_button"><img src="img/left_button.png" alt="left" /></a>
						<a href="#none" class="s_Right_button"><img src="img/right_button.png" alt="left" /></a>
					</div>
					<div class="special_R">
						<ul class="flim2 bxslider">
							<li>
								<div class="special_R_top">
									<a href="#" class="r_img"><img src="img/lotte.png" alt="lotte" /></a>
									<a href="#" class="s_title">[고북수진] 역사와 낭만을, 북경 4일 ..</a>
								</div>
								<dl class="special_R_M">
									<dt></dt>
									<dd><a href="#">· 역사, 전통을 자랑하는 북경의 1별미 특별식</a></dd>
									<dd><a href="#">· 문화유산 관광지, 서커스, 공연 등 볼거리 다수</a></dd>
									<dd><a href="#">· 럭셔리 월드체인 호텔, 품격있고 편안한 숙박</a></dd>
									<dd><a href="#">· 여행의 노고를 풀어줄 전통 마사지 서비스</a></dd>
									<dd><a href="#">· 북경 여행객을 위한 소소한 선물까지!</a></dd>
								</dl>
								<div class="special_R_Bottom">
									<a href="#" class="price">751,400 원 ~ 2,001,400 원</a>
									<a href="#" class="reser">해당상품 예약하기 <span><img src="" alt="" /></span></a>
								</div>
							</li>

							<li>
								<div class="special_R_top">
									<a href="#" class="r_img"><img src="img/lotte.png" alt="lotte" /></a>
									<a href="#" class="s_title">[고북수진] 역사와 낭만을, 북경 4일 ..</a>
								</div>
								<dl class="special_R_M">
									<dt></dt>
									<dd><a href="#">· 역사, 전통을 자랑하는 북경의 3별미 특별식</a></dd>
									<dd><a href="#">· 문화유산 관광지, 서커스, 공연 등 볼거리 다수</a></dd>
									<dd><a href="#">· 럭셔리 월드체인 호텔, 품격있고 편안한 숙박</a></dd>
									<dd><a href="#">· 여행의 노고를 풀어줄 전통 마사지 서비스</a></dd>
									<dd><a href="#">· 북경 여행객을 위한 소소한 선물까지!</a></dd>
								</dl>
								<div class="special_R_Bottom">
									<a href="#" class="price">751,400 원 ~ 2,001,400 원</a>
									<a href="#" class="reser">해당상품 예약하기 <span><img src="" alt="" /></span></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods">
					<h4><a href="#"><span class="navy">기획</span> 상품</a></h4>
					<ul>
						<li>
							<a href="#" class="img_area"><img src="img/content3_2.png"/></a>
							<div class="text_area">
								<a href="#" class="day">라오스 실속 5박6일</a>
								<a href="#">역사적, 예술적 유산으로 가득한
								문화도시, 라오스를 방문하세요!</a>
								<a href="#" class="price">1,099,000원 ~ 1,299,000원</a>
							</div>
						</li>
						<li>
							<a href="#" class="img_area"><img src="img/content1_2.png"/></a>
							<div class="text_area">
								<a href="#" class="day">방콕시티 에어텔 3/4박</a>
								<a href="#">틀에 박힌 여행 일정은 싫다!
								내 맘대로, 태국 자유여행!</a>
								<a href="#" class="price">504,800원 ~ 2,494,800원</a>
							</div>
						</li>
						<li>
							<a href="#" class="img_area"><img src="img/content1_3.png"/></a>
							<div class="text_area">
								<a href="#" class="day">라오스 실속 5박6일</a>
								<a href="#">역사적, 예술적 유산으로 가득한
								문화도시, 라오스를 방문하세요!</a>
								<a href="#" class="price">1,099,000원 ~ 1,299,000원</a>
							</div>
						</li>
					</ul>
				</div>
				<p class="side_nav">
					<a href="#none"><img src="img/side_1.png" alt="side_1" /></a>
					<a href="#none"><img src="img/side_2.png" alt="side_1" /></a>
				</p>
			</div>
		</div>
	</div>

	<div id="content2_Wrap">
		<div id="content2">
			<h3><span class="navy">추천</span> 상품</h3>
			<ul>
				<li>
					<a href="#" class="con2_cap"><p><img src="img/top_cap1.png" alt="top_cap1" /><span class="con2_title">60차월 추천 상품</span></p></a>
					<div>
						<a href="#"><img src="img/top_cap1_1.png" alt="top_cap1_1" />
							<span>돗토리 &amp; 요나고</span>
						</a>
						<p class="num">모두투어<img src="img/line.png" alt="line" />2-2621-7757</p>
					</div>
					<div class="con2_div_r">
						<a href="#"><img src="img/top_cap1_2.png" alt="top_cap1_2" />
							<span>장가계, 원가계 천문산</span>
						</a>
						<p class="num">롯데관광<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
				</li>
				<li class="con2_r">
					<a href="#" class="con2_cap"><p><img src="img/top_cap2.png" alt="top_cap1" /><span class="con2_title">200차월 추천 상품</span></p></a>
					<div>
						<a href="#"><img src="img/top_cap2_1.png" alt="top_cap1_1" />
							<span>그리스, 발칸</span>
						</a>
						<p class="num">서울관광<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
					<div class="con2_div_r">
						<a href="#"><img src="img/top_cap2_2.png" alt="top_cap1_2" />
							<span>사이판</span>
						</a>
						<p class="num">윈드관광<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
				</li>
				<li>
					<a href="#" class="con2_cap"><p><img src="img/top_cap3.png" alt="top_cap1" /><span class="con2_title">2월 추천 상품</span></p></a>
					<div>
						<a href="#"><img src="img/top_cap3_1.png" alt="top_cap1_1" />
							<span>캐나다 로키산맥</span>
						</a>
						<p class="num">강남투어<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
					<div class="con2_div_r">
						<a href="#"><img src="img/top_cap3_2.png" alt="top_cap1_2" />
							<span>지중해 초호화 크루즈</span>
						</a>
						<p class="num">삼성투어<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
				</li>
				<li class="con2_r">
					<a href="#" class="con2_cap"><p><img src="img/top_cap4.png" alt="top_cap1" /><span class="con2_title">가족과 함께 가면 좋은상품</span></p></a>
					<div>
						<a href="#"><img src="img/top_cap4_1.png" alt="top_cap1_1" />
							<span>푸켓</span>
						</a>
						<p class="num">강남투어<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
					<div class="con2_div_r">
						<a href="#"><img src="img/top_cap4_2.png" alt="top_cap1_2" />
							<span>쿠바 & 하바나</span>
						</a>
						<p class="num">윈드투어<img src="img/line.png" alt="line" />02-2621-7757</p>
					</div>
				</li>
			</ul>
		</div>
	</div>

	<div id="content3">
		<h3><span class="navy">임직원 적용몰만의</span> 특별한 혜택!</h3>
		<div class="con3_l">
			<div class="con3_l_top">
				<a href="#none">패키지<br/><img src="img/location_off.png" alt="location_off"/></a>
				<a href="#none">항공<br/><img src="img/location_off.png" alt="location_off" /></a>
				<a href="#none">호텔<br/><img src="img/location_off.png" alt="location_off" /></a>
				<a href="#none">그외<br/><img src="img/location_off.png" alt="location_off" /></a>
			</div>
			<div class="con3_l_bottom">
				<p>
					<a href="#none"><img src="img/travle_1.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_2.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_3.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_4.png" alt="location_off" /><br/>T. 02-2621-7762</a>
				</p>
				<p>
					<a href="#none"><img src="img/travle_3.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_1.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_2.png" alt="location_off" /><br/>T. 02-2621-7762</a>				
					<a href="#none"><img src="img/travle_4.png" alt="location_off" /><br/>T. 02-2621-7762</a>
				</p>
				<p>	
					<a href="#none"><img src="img/travle_2.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_3.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_4.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_1.png" alt="location_off" /><br/>T. 02-2621-7762</a>
				</p>
				<p>
					<a href="#none"><img src="img/travle_3.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_1.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_2.png" alt="location_off" /><br/>T. 02-2621-7762</a>
					<a href="#none"><img src="img/travle_4.png" alt="location_off" /><br/>T. 02-2621-7762</a>
				</p>
			</div>
			<p class="sale">해외 패키지 상품 7% 할인</p>
			<span class="con3_line"></span>
		</div>	
		<a href="#" class="con3_r">
			<p><img src="img/s.png" alt="ergent" /></p>
			<p class="text_area00">여행 중에 긴급한 상황이 생겼다면<br/>
				도움을 요청하세요!<br/></p>
			<p class="con_num">02-2621-7776</p>
		</a>
	</div>

	<div id="footer">
		<p class="phone">
			<span>TW코리아 고객센터  02-511-5957</span><span><img src="img/line.png" alt="line" /></span>
			<span>이용약관</span><span><img src="img/line.png" alt="line" /></span>
			<span>개인정보처리·취급방침</span>
		</p>
		<p class="sns">
			<a href="#noen"><img src="img/face.png" alt="face" /></a>
			<a href="#noen" class="blog"><img src="img/blog.png" alt="blog" /></a>
		</p>
		<span class="footer_line" style="margin-top:28px;"></span>
		<p class="address">
			대표이사:홍길동   <img src="img/line.png" alt="line" />  서울특별시 강남구 신사동 561-31   <img src="img/line.png" alt="line" />   사업자등록번호 123-456-7890    <img src="img/line.png" alt="line" />   통신판매업 신고번호 제 2009-서울강남구-1234호<br/>ⓒ TW KOREA CO., All rights reserved.

		</p>
	</div>
 </body>
</html>
