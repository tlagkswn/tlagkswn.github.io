<!doctype html>
<html lang="kor">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script src="js/mousewheel.min.js"></script>
  <script type="text/javascript" src="js/index_new2.js"></script>
  <title>임직원전용 몰</title>
  <link rel="stylesheet" type="text/css" href="css/bx_slider3.css">
  <link rel="stylesheet" type="text/css" href="css/index_new2.css">
 </head>
 <script type="text/javascript">
	$(function(){

	

	//bx
		$('.visual_pc').bxSlider({
			auto: true,
			speed: 600,
			easing: 'swing'
		});

		$('.visual_m').bxSlider({
			auto: true,
			speed: 600,
			easing: 'swing'
		});
		

		$(".bx-pager-item, .sumnail0 li").mouseover(function(){
			var index0 = $(this).index();
			
			$(".sumnail0 li:eq("+index0+")").stop().animate({"top":"0"}, 200)
		}).mouseout(function(){
			var index0 = $(this).index();
			
			$(".sumnail0 li:eq("+index0+")").stop().animate({"top":"100px"}, 200)
		})

		$(".sumnail0 li a").click(function(){
			var index0 = $(this).parent().index();
			$(".bx-pager-link:eq("+index0+")").click();
		})

	//others
			var height0 = $("#header").height();
			var height1 = $(".visual").height();
			var height2 = height0+height1;
		$(window).scroll(function(){
			
			var scroll0 = $(window).scrollTop();
			
			
			if(scroll0>height2){
				$(".quick").css({"top":scroll0-height2})
			}else{
				$(".quick").css({"position":"static","left":"auto"})
				$(".quick").css({"position":"absolute","right":"-180px","top":"-110px"})
			}

		})
		
		$(".back3_btn").click(function(){
			$(".back3").show()
		})
		$(".back3").click(function(){
			$(".back3").hide()
		})
		$(window).load(function(){
			var resize_width = $(window).width();
			if(resize_width<1000){
				$(".back2 img").attr("src","img/mall/contect_num_m.jpg")
				$(".back2 img").css({"width":"80%"})
			}else{
				$(".back2 img").attr("src","img/mall/contect_num.jpg")
			}
		})
		$(window).resize(function(){
			var resize_width = $(window).width();
			if(resize_width<1000){
				$(".back2 img").attr("src","img/mall/contect_num_m.jpg")
				$(".back2 img").css({"width":"80%"})
			}else{
				$(".back2 img").attr("src","img/mall/contect_num.jpg")
			}
		})

		$(".top_icons a").click(function(){
			alert("빠른기간 내에 오픈예정 입니다.")
		})

	})
 </script>
 <body>
	<div id="wrap">
		<div id="header">
			<div id="info_wrap">
				<div id="info">
					<h2>여행몰</h2>
					<h1><img src="img/mall/logo.png" alt="logo" /></h1>
					<div class="top_icons">
						<a href="#none"><img src="img/mall/top_icon1.jpg" alt="" /></a><span><img src="img/hm/line.png" alt="" /></span>
						<a href="#none"><img src="img/hm/point.png" alt="" /></a>	<span><img src="img/hm/line.png" alt="" /></span>
					</div>
				</div>	
			</div>
			<div id="nav">
				<ul>
					<li>
						<a href="#none" class="main_nav">해외여행</a>
						<dl>
							<dt></dt>
							<dd>
								<a href="http://c05096s015.travelmanager.co.kr/app/default.asp" target="blank">하나투어</a>
							</dd>
							<dd>
								<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
							</dd>
							<dd>
								<a href="https://samsungcard.kaltour.com/Main/Index_VPC" target="blank">한진관광</a>
							</dd>
							<dd>
								<a href="http://samsungin2.lottetour.com/sub_main?v_menu_seq=1145&area_code=a&pakageno=01&menuimg=01" target="blank">롯데관광</a>
							</dd>
							<!--
								<dd>
									<a href="http://www.naeiltour.co.kr/main/index.asp" target="blank">내일투어</a>
								</dd>
								<dd>
									<a href="http://www.tourcabin.com/" target="blank">투어케빈</a>
								</dd>
							-->
						</dl>
					</li>
					<li>
						<a href="#none" class="main_nav">호텔</a>
						<dl>
							<dt></dt>
							<dd>
								<a href="http://www.hotelpass.com?gu=twkorea0901" target="blank">호텔패스</a>
							</dd>
							<!--
							<dd>
								<a href="https://www.booking.com/index.html?aid=387637;label=hpmainmenu;" target="blank">부킹닷컴</a>
							</dd>
							<dd>
								<a href="https://www.agoda.com/ko-kr/samsungcard" target="blank">아고다</a>
							</dd>
							<dd>
								<a href="https://www.expedia.co.kr/couponsignup?campaignId=samsungcard-travel&eapid=0-16&MDPCID=KR.DIRECT.SAMSUNGCARDTRAVEL.COUPON.HOTEL#BinCodeView" target="blank">익스피디아</a>
							</dd>
							<dd>
								<a href="http://c05096s015.travelmanager.co.kr/app/wsv/newhotel/lg-30005.asp" target="blank">하나프리</a>
							</dd>
							<dd>
								<a href="http://samsungcard.plbooking.com/aff_simple/index.php" target="blank">프라이빗라벨</a>
							</dd>
							-->
						</dl>
					</li>
					<li>
						<a href="#none" class="main_nav">국내여행</a>
						<dl>
							<dt></dt>
							<dd>
								<a href="http://www.jeju.com?agt=hanmi" target="blank">제주닷컴</a>
							</dd>
							<!--
							<dd>
								<a href="https://sscard2.webtour.com/DH/dh_index.asp" target="blank">웹투어</a>
							</dd>
							<dd>
								<a href="https://samsungcard.tourok.co.kr/condo/main_new.html?r_page=condo" target="blank">여행창조</a>
							</dd>
							<dd>
								<a href="http://samsung.xgolf.com/booking/booking_normal.asp" target="blank">X-GOLF</a>
							</dd>
							-->
						</dl>
					</li>
					<li>
						<a href="#none" class="main_nav" target="blank">국제선항공</a>
						<dl>
							<dt></dt>
							<dd>
								<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
							</dd>
							<dd>
								<a href="http://samsungin2.lottetour.com/sub_main?v_menu_seq=1145&area_code=a&pakageno=01&menuimg=01" target="blank">롯데관광</a>
							</dd>
							<!--
							<dd>
								<a href="https://samsungcard.kaltour.com/Main/Index_VPC" target="blank">한진관광</a>
							</dd>
							
							<dd>
								<a href="http://www.naeiltour.co.kr/ticket/index.asp?menuId=EA" target="blank">내일투어</a>
							</dd>
							<dd>
								<a href="http://www.tourcabin.com/" target="blank">투어케빈</a>
							</dd>
							<dd>
								<a href="http://c05096s015.travelmanager.co.kr/app/default.asp" target="blank">하나투어</a>
							</dd>
							-->
						</dl>
					</li>
					<li>
						<a href="#none" class="main_nav" target="blank">국내선항공</a>
						<dl>
							<dt></dt>
							<dd>
								<a href="http://www.jeju.com/item/air.html?agt=hanmi" target="blank">제주닷컴</a>
							</dd>
							<!--
							<dd>
								<a href="http://airlink.interpark.com/lts/SamsungCardIndex.lts" target="blank">인터파크투어</a>
							</dd>
							<dd>
								<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
							</dd>
							<dd>
								<a href="https://airsamsungcard.lottetour.com/findAirSearch.lts" target="blank">롯데관광</a>
							</dd>
							-->
						</dl>
					</li>
					<li>
						<a href="#none" class="main_nav">기타</a>
						<dl>
							<dt></dt>
							<!--
							<dd>
								<a href="http://www.happartners.com/wl/kr/samsungcard/" target="blank">허츠</a>
							</dd>
							-->
							<dd>
								<a href="http://ap.widemobile.com/?samsungcard_travel" target="blank">포켓 Wi-Fi</a>
							</dd>
						</dl>
					</li>
				</ul>
			</div>
			<div id="nav_m">
				<div class="nav_m_head">
					<span class="nav_m_head0"><a href="#none" class="nav_m_xbox"><img src="img/mall/nav_m_menu.png" alt="nav_m_menu" /></a></span>
					<span class="nav_m_head1"><em>제휴사리스트</em></span>
					<span class="nav_m_head2"><a href="#none" class="nav_m_xbox"><img src="img/mall/nav_m_xbox.png" alt="nav_m_xbox" /></a></span>
				</div>	
				<div class="nav_m_body">
					<dl>
						<dt><img src="img/mall/nav_m_icon0.png" alt="" />해외여행</dt>
						<dd>
							<a href="http://c05096s015.travelmanager.co.kr/app/default.asp" target="blank">하나투어</a>
						</dd>
						<dd>
							<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
						</dd>
						<dd>
							<a href="https://samsungcard.kaltour.com/Main/Index_VPC" target="blank">한진관광</a>
						</dd>
						<dd>
							<a href="http://samsungin2.lottetour.com/sub_main?v_menu_seq=1145&area_code=a&pakageno=01&menuimg=01" target="blank">롯데관광</a>
						</dd>
						<dd>
							<a href="http://www.naeiltour.co.kr/main/index.asp" target="blank">내일투어</a>
						</dd>
						<dd>
							<a href="http://www.tourcabin.com/" target="blank">투어케빈</a>
						</dd>
					</dl>
					<dl>
						<dt><img src="img/mall/nav_m_icon1.png" alt="" />호텔</dt>
						<dd>
							<a href="http://www.hotelpass.com?gu=twkorea0901" target="blank">호텔패스</a>
						</dd>
						<dd>
							<a href="https://www.booking.com/index.html?aid=387637;label=hpmainmenu;" target="blank">부킹닷컴</a>
						</dd>
						<dd>
							<a href="https://www.agoda.com/ko-kr/samsungcard" target="blank">아고다</a>
						</dd>
						<dd>
							<a href="https://www.expedia.co.kr/couponsignup?campaignId=samsungcard-travel&eapid=0-16&MDPCID=KR.DIRECT.SAMSUNGCARDTRAVEL.COUPON.HOTEL#BinCodeView" target="blank">익스피디아</a>
						</dd>
						<dd>
							<a href="http://c05096s015.travelmanager.co.kr/app/wsv/newhotel/lg-30005.asp" target="blank">하나프리</a>
						</dd>
						<dd>
							<a href="http://samsungcard.plbooking.com/aff_simple/index.php" target="blank">프라이빗라벨</a>
						</dd>
					</dl>
					<dl>
						<dt><img src="img/mall/nav_m_icon2.png" alt="" />국내여행</dt>
						<dd>
							<a href="http://www.jeju.com?agt=hanmi" target="blank">제주닷컴</a>
						</dd>
						<dd>
							<a href="https://sscard2.webtour.com/DH/dh_index.asp" target="blank">웹투어</a>
						</dd>
						<dd>
							<a href="https://samsungcard.tourok.co.kr/condo/main_new.html?r_page=condo" target="blank">여행창조</a>
						</dd>
						<dd>
							<a href="http://samsung.xgolf.com/booking/booking_normal.asp" target="blank">X-GOLF</a>
						</dd>
					</dl>
					<dl>
						<dt><img src="img/mall/nav_m_icon3.png" alt="" />국내선 항공</dt>
						<dd>
							<a href="http://airlink.interpark.com/lts/SamsungCardIndex.lts" target="blank">인터파크투어</a>
						</dd>
						<dd>
							<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
						</dd>
						<dd>
							<a href="https://airsamsungcard.lottetour.com/findAirSearch.lts" target="blank">롯데관광</a>
						</dd>
					</dl>
					<dl class="right_border">
						<dt><img src="img/mall/nav_m_icon4.png" alt="" />국제선 항공</dt>
						<dd>
							<a href="http://c05096s015.travelmanager.co.kr/app/default.asp" target="blank">하나투어</a>
						</dd>
						<dd>
							<a href="http://samsungfiretw.modetour.co.kr/Main/OnlineCP_E_NEW2.aspx" target="blank">모두투어</a>
						</dd>
						<dd>
							<a href="https://samsungcard.kaltour.com/Main/Index_VPC" target="blank">한진관광</a>
						</dd>
						<dd>
							<a href="http://samsungin2.lottetour.com/sub_main?v_menu_seq=1145&area_code=a&pakageno=01&menuimg=01" target="blank">롯데관광</a>
						</dd>
						<dd>
							<a href="http://www.naeiltour.co.kr/ticket/index.asp?menuId=EA" target="blank">내일투어</a>
						</dd>
						<dd>
							<a href="http://www.tourcabin.com/" target="blank">투어케빈</a>
						</dd>
					</dl>
					<dl class="right_border">
						<dt><img src="img/mall/nav_m_icon5.png" alt="" />기타</dt>
						<dd>
							<a href="http://www.happartners.com/wl/kr/samsungcard/" target="blank">허츠</a>
						</dd>
						<dd>
							<a href="http://ap.widemobile.com/?twkmall" target="blank">포켓 Wi-Fi</a>
						</dd>
					</dl>
					<dl class="quick_mobile">
						<dt><img src="img/mall/quick_icon2.png" alt="" /><a href="http://samsungfiretw.modetour.co.kr/event/timesale/timesale.aspx?mloc=07&eidx=6203&eidx=6203" target="blank"><span class="color_orange">TODAY’s TIME SALE</span>, 선착순 한정판매!</a></dt>
						<dt class="back3_btn"><img src="img/mall/quick_icon3.png" alt="" /><a href="#"><strong>카카오톡 친구신청</strong>, 친구맺고 혜택받자!</a></dt>
					</dl>
				</div>
			</div>
			<p id="nav_m_btn"><img src="img/mall/nav_m.jpg" alt="nav_m" /></p>
		</div>

		<div id="container">
			<div class="visual">
				<ul class="visual_pc">
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=6808 " target="blank"><img src="img/mall/visu0.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=7787" target="blank"><img src="img/mall/visu1.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=7780" target="blank"><img src="img/mall/visu2.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungin2.lottetour.com/promotionV/7159"><img src="img/mall/visu3.jpg" alt="visu1"  target="blank"/></a></li>
					<li><a href="http://samsungin2.lottetour.com/promotionV/8377"><img src="img/mall/visu4.jpg" alt="visu1"  target="blank"/></a></li>
				</ul>
				<ul class="visual_m">
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=6808 " target="blank"><img src="img/mall/visu_m_0.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=7787" target="blank"><img src="img/mall/2.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungfiretw.modetour.co.kr/event/plan/detail.aspx?mloc=07&eidx=7780" target="blank"><img src="img/mall/3.jpg" alt="visu1" /></a></li>
					<li><a href="http://samsungin2.lottetour.com/promotionV/7159"><img src="img/mall/4.jpg" alt="visu1"  target="blank"/></a></li>
					<li><a href="http://samsungin2.lottetour.com/promotionV/8377"><img src="img/mall/1.jpg" alt="visu1"  target="blank"/></a></li>
				</ul>
				<ul class="sumnail0">
					<li><a href="#none" class="bx-pager-link"><img src="img/mall/visu0.jpg" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="img/mall/visu1.jpg" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="img/mall/visu2.jpg" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="img/mall/visu3.jpg" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="img/mall/visu4.jpg" alt="" /></a></li>
				</ul>
			</div>
			<div class="sub_nav">
				<ul class="sub_nav_pc">
					<li>
						<a href="#none">주목상품! 절호의 찬스</a>
					</li>
					<li>
						<a href="#none">뭉치면 좋은 패키지 할인</a>
					</li>
					<li>
						<a href="#none">세계자연유산 제주도로!</a>
					</li>
					<li>
						<a href="#none">어디서나 더 싸게 꿀잠</a>
					</li>
					<li>
						<a href="#none">할인받고 가볍게 날자!</a>
					</li>
				</ul>
				
			</div>
			<p class="sub_nav_m"><a href="#none">주목상품! 절호의 찬스</a></p>
			<div class="content_0 offset0">
				<ul>
					<li>
						<div>
							<a href="http://samsungfiretw.modetour.co.kr/Package/Item_CA.aspx?Idx=447521" target="blank">
								<p class="imgArea">
									<img src="img/mall/content0_0.jpg" alt="content0_0" />
								</p>
								<div>
									<p class="p_0 p_0_height"><img src="img/mall/content0_s1.jpg" alt="content0_s0" /></p>
									<p class="p_1">[I♥FAMILY]]코타키나발루 수트라하버 퍼시픽(초특급/씨뷰) 5/6일</p>
									<p class="p_2">449,000원 부터 ~</p>
								</div>
							</a>
							<span class="r_icon"><img src="img/hm/rpc_icon2.png" alt="rpc_icon0" /></span>
						</div>
					</li>
					<li>
						<div>
							<a href="http://samsungfiretw.modetour.co.kr/Package/Item_CA.aspx?Idx=447524 " target="blank">
								<p class="imgArea">
									<img src="img/mall/content0_1.jpg" alt="content0_0" />
								</p>
								<div>
									<p class="p_0"><img src="img/mall/content0_s1.jpg" alt="content0_s0" /></p>
									<p class="p_1">괌 니코 수페리어룸 4박5일 상품</p>
									<p class="p_2">2,590,000원 부터 ~</p>
								</div>
							</a>
							<span class="r_icon"><img src="img/hm/rpc_icon2.png" alt="rpc_icon1" /></span>
						</div>
					</li>
					<li>
						<div>
							<a href="http://samsungin2.lottetour.com/evt/A170618369" target="blank">
								<p class="imgArea">
									<img src="img/mall/content0_2.jpg" alt="content0_0" />
								</p>
								<div>
									<p class="p_0"><img src="img/mall/content0_s2.jpg" alt="content0_s0" /></p>
									<p class="p_1">LJ+전일관광】오사카/교토/아라시야마/고베 3일</p>
									<p class="p_2">659,000원 부터 ~</p>
								</div>
							</a>
						</div>	
					</li>
					<li>
						<div>
							<a href="http://samsungin2.lottetour.com/evt/A170616964" target="blank">
								<p class="imgArea">
									<img src="img/mall/content0_3.jpg" alt="content0_0" />
								</p>
								<div>
									<p class="p_0"><img src="img/mall/content0_s2.jpg" alt="content0_s0" /></p>
									<p class="p_1">꽉찬2박3일】【항공+호텔】자유여행▶ 푸통! 푸통! My 대만♥ 3일</p>
									<p class="p_2">469,000원 부터 ~</p>
								</div>
							</a>
						</div>
					</li>
				</ul>
				<div class="quick">
					<ul>
					<!--
						<li>
							<a href="#none">
								<img src="img/mall/quick_icon0.png" alt="" />	
							</a>
							<p>
								<span class="color_green">& 마일리지카드</span><br/>
								지금 신청하세요!
							</p>
						</li>
						<li>
							<a href="#none">
								<img src="img/mall/quick_icon1.png" alt="" />	
							</a>
							<p>
								내가 골라쓰는 혜택!<br/>
								<span class="color_red">맞춤혜택으로 탭탭!</span>
							</p>
						</li>
					-->
						<li class="small_img">
							<a href="http://samsungfiretw.modetour.co.kr/event/timesale/timesale.aspx?mloc=07&eidx=6203&eidx=6203" target="blank">
								<img src="img/mall/quick_icon2.png" alt="" />	
							</a>
							<p>
								<span class="color_orange">TODAY’s TIME SALE</span><br/>
								선착순 한정판매!
							</p>
						</li>
						<li class="small_img kako_quick">
							<a href="#none">
								<img src="img/mall/quick_icon3.png" alt="" />	
							</a>
							<p>
								<strong>카카오톡 친구신청</strong><br/>
								친구맺고 혜택받자!
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_1 offset1">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>해외여행</h3>
						<p>쉿! 남다른 할인 혜택 최대 7%</p>
					</div>
					<ul>
						<li>
							<a href="http://samsungfiretw.modetour.co.kr/Package/Item_CA.aspx?Idx=447522" target="blank">
								<p class="p_0"><img src="img/mall/content1_0.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1 p_1_height"><img src="img/mall/content0_s1.jpg" alt="" /></p>
									<p class="p_2">『 MODE DREAM 』터키 프리미어 퍼펙트 일주 9일</p>
									<p class="p_3">1,390,000원 부터 ~ </p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon2.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://samsungfiretw.modetour.co.kr/Package/Item_CA.aspx?Idx=447523" target="blank">
								<p class="p_0"><img src="img/mall/content1_1.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s1.jpg" alt="" /></p>
									<p class="p_2">【카론 초특급】푸켓 힐튼아카디아(가든뷰) 5/6일</p>
									<p class="p_3">789,000원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon2.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://samsungin2.lottetour.com/evt/A170615578?v_menu_seq=1145&pakageNo=01&menuimg=01" target="blank">
								<p class="p_0"><img src="img/mall/content1_2.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s2.jpg" alt="" /></p>
									<p class="p_2">[롯데홈쇼핑 최다판매] 라오스 5일▶비엔티엔①박/방비엥②박</p>
									<p class="p_3">399,000원 부터 ~</p>
								</div>
							</a>
						</li>
						<li>
							<a href="http://samsungin2.lottetour.com/evt/A170600982?v_menu_seq=1542&pakageNo=01&menuimg=01" target="blank">
								<p class="p_0"><img src="img/mall/content1_3.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s2.jpg" alt="" /></p>
									<p class="p_2">【정통│제남직항】[VIP 리무진] 태항산,통천협,천계산,왕망령 ▶ KE 5일</p>
									<p class="p_3">699,000원 부터 ~</p>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_1 offset2">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>국내여행</h3>
						<p>제주여행의 모든 것 할인 최대 3%</p>
					</div>
					<ul>
						<li>
							<a href="http://www.jeju.com/event/event_view.html?agt=hanmi&code=ramada" target="blank">
								<p class="p_0"><img src="img/mall/content2_0.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content1_s0.jpg" alt="" /></p>
									<p class="p_2">라마다프라자제주호텔에서 바다 위 유람선상에 있는듯한 이색 경험을!</p>
									<p class="p_3">350,000원 부터 ~ </p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon4.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.jeju.com/item/ld_view.html?agt=hanmi&prdno=AC044" target="blank">
								<p class="p_0"><img src="img/mall/content2_1.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content1_s0.jpg" alt="" /></p>
									<p class="p_2">신라호텔제주 - 박당 2인 조식제공, 선착순 바다전망 무료 업그레이드</p>
									<p class="p_3">263,000원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon4.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.jeju.com/item/ld_view.html?agt=hanmi&prdno=AC653" target="blank">
								<p class="p_0"><img src="img/mall/content2_2.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content1_s0.jpg" alt="" /></p>
									<p class="p_2">호텔리젠트마린 - 연박 이용시 bbq치킨1마리 1회 제공</p>
									<p class="p_3">90,000원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon4.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.jeju.com/item/ld_view.html?agt=hanmi&prdno=AC264" target="blank">
								<p class="p_0"><img src="img/mall/content2_3.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content1_s0.jpg" alt="" /></p>
									<p class="p_2">오션그랜드 관광호텔 - 모든 룸 고객2인 조식 포함</p>
									<p class="p_3">90,000원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon4.png" alt="rpc_icon0" /></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_1 offset3">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>호텔</h3>
						<p>같은 숙소! 다른 가격! 최대 5% 할인</p>
					</div>
					<ul>
						<li>
							<a href="http://www.hotelpass.net/cp/hotel/cp_hotel_detail.asp?agent=TWKOREA0901&hoteltype=0&sNatCtyCode=USHNL&hotelCode=USHNL019" target="blank">
								<p class="p_0"><img src="img/mall/content3_0.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s3.jpg" alt="" /></p>
									<p class="p_2">[호텔패스]하와이_하얏트 플레이스와이키키 비치</p>
									<p class="p_3">256,205원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon3.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.hotelpass.net/cp/Hotel/cp_hotel_detail.asp?agent=TWKOREA0901&hoteltype=0&sNatCtyCode=JPOSA&hotelCode=JPOSA121&sackYN=0&sortHotel=4" target="blank">
								<p class="p_0"><img src="img/mall/content3_1.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s3.jpg" alt="" /></p>
									<p class="p_2">[호텔패스]오사카 도본도리 호텔니시신사이바시 도보 5분거리</p>
									<p class="p_3">108,436원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon5.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.hotelpass.net/cp/hotel/cp_hotel_detail.asp?agent=TWKOREA0901&hoteltype=0&sNatCtyCode=THBKK&hotelCode=THBKK096&sackYN=&sortHotel=4&sortcode=THBKK096" target="blank">
								<p class="p_0"><img src="img/mall/content3_2.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s3.jpg" alt="" /></p>
									<p class="p_2">[호텔패스]반얀트리 방콕 호텔멋진 스카이라운지에서 석양을 보며..</p>
									<p class="p_3">161,757원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon3.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://www.hotelpass.net/cp/hotel/cp_hotel_detail.asp?agent=TWKOREA0901&hoteltype=0&sNatCtyCode=SGSIN&hotelCode=SGSIN007&sackYN=&sortHotel=4&sortcode=SGSIN007" target="blank">
								<p class="p_0"><img src="img/mall/content3_3.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s3.jpg" alt="" /></p>
									<p class="p_2">[호텔패스]아마라 호텔 싱가포르세계무역센터, 썬텍시티컨벤션 인접</p>
									<p class="p_3">184,620원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon3.png" alt="rpc_icon0" /></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="content_1 offset4">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>항공</h3>
						<p>알뜰하게! 자유롭게 날자~ 최대 13% 할인</p>
					</div>
					<ul>
						<li>
							<a href="http://airsamsungcard.lottetour.com/booking/findListSpcExhibition.lts?efcCodeList=RB0045" target="blank">
								<p class="p_0"><img src="img/mall/content4_0.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s2.jpg" alt="" /></p>
									<p class="p_2">[항공]에어서울 타고 벚꽃향기를 만나다AIR SEOUL</p>
									<p class="p_3">249,000원 부터 ~</p>
								</div>
							</a>
						</li>
						<li>
							<a href="http://airsamsungcard.lottetour.com/booking/findListSpcExhibition.lts?efcCodeList=RB0049" target="blank">
								<p class="p_0"><img src="img/mall/content4_1.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s2.jpg" alt=""/></p>
									<p class="p_2">[항공] 스타얼라이언스 20주년 기념전 노선 인기도시 특별할인</p>
									<p class="p_3">328,000원 부터 ~</p>
								</div>
							</a>
						</li>
						<li>
							<a href="http://www.modetour.com/event/Event_13/0731_samsung/mode.aspx?mloc=07" target="blank">
								<p class="p_0"><img src="img/mall/content4_3.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s1.jpg" alt=""/></p>
									<p class="p_2">[항공] 모두투어 통큰해택 5월 최대 13% 할인 </p>
									<p class="p_3">189,000원 부터 ~</p>
								</div>
								<span class="r_icon"><img src="img/hm/rpc_icon2.png" alt="rpc_icon0" /></span>
							</a>
						</li>
						<li>
							<a href="http://air.interpark.com/lts/SsIndex.lts?gateTp=1" target="blank">
								<p class="p_0"><img src="img/mall/content4_2.jpg" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="img/mall/content0_s6.jpg" alt="" class="margin-top1"/></p>
									<p class="p_2">[항공]삼성복지몰·인터파크투어 국제선항공권 최대 13% 할인이벤트</p>
									<p class="p_3">460,000원 부터 ~</p>
								</div>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
			<div class="last_section">
				<div class="last_section0">
					<h3>Call Service</h3>
					<p>평일 <span>09:00 ~ 18:00</span> <em>(주말, 공휴일 휴무)</em></p>
					<p><img src="img/mall/call_icon.png" alt="" /></p>
					<a href="#none" class="more_conn">연락처 상세보기</a>
				</div>
				<div class="last_section1">
					<h3>
						해외여행의 필수품<span>|</span><em>Wi-fi 도시락</em>
					</h3>
					<p>
						해외여행에도 와이파이도시락 하나면 데이터 걱정없이!<br/>
						전 세계 어디서든 빠른 무선인터넷 서비스로 여행의 즐거움을 더 해드립니다.
					</p>
					<a href="http://ap.widemobile.com/?twkmall" target="blank">
						<img src="img/mall/banner.jpg" alt="banner" />
					</a>
				</div>
			</div>		
		</div>

		<div id="footer_wrap">
			<div id="footer">
				<p style="font-weight:400;color:#444"><img src="img/mall/check_icon.png" alt="check_icon" style="width:12px;margin-right:10px"/> 티더블유코리아는 거래당사자가 아니며, 입점판매자가 등록한 상품정보 및 거래에 대해 티더블유코리아는 일제 책임을 지지 않습니다. </p>
				<div class="footer0">
					TW코리아 고객센터  <strong>02-511-5457</strong><span>|</span>소셜 IN TW코리아 <a href="https://www.facebook.com/twkoreaa" target="blank"><img src="img/mall/face.png" alt="face" /></a> <a href="http://twkorea1.blog.me/" target="blank"><img src="img/mall/blog.png" alt="blog" /></a><span>|</span>
					<a href="#" class="enter">이용약관</a><span>|</span><a href="#" class="enter2">개인정보처리·취급방침</a><span>|</span><a href="#none">관리자</a>
				</div>
				<div class="footer1">
					<p>대표: 심승현  <span>|</span>  서울특별시 강남구 도산대로 157, 12층(신사동, 신웅타워2)  <span>|</span>  사업자등록번호 670-86-00462<span>|</span>  통신판매업신고증 제 2017-서울강남-00658 호</p>
					<p class="footer1_1">ⓒ TW KOREA CO., All rights reserved.</p>
				</div>
			</div>
		</div>
		<div class="back">
			<p><img src="img/mall/kakao_qu.jpg" alt="kakao_qu" /></p>
		</div>
		<div class="back2">
			<p><img src="img/mall/contect_num.jpg" alt="contect_num" /></p>
		</div>
		<div class="back3">
			<p><img src="img/mall/kakao_qu_m.jpg" alt="kakao_qu" /></p>
		</div>
	</div>
 </body>
</html>
<script type="text/javascript">
	$(function(){
		

		$(".enter").click(function(){
			var openNewWindow = window.open("about:blank");
			openNewWindow.location.href="Policy.php";
		})
		
		$(".enter2").click(function(){
			var openNewWindow = window.open("about:blank");
			openNewWindow.location.href="using.php";
		})
	})
</script>