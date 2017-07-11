<?php include_once ("eventadm/ckSessionStand.php")?>
<?php include_once ("eventadm/command/dbconn/conn_db.php"); //DB Connection ?>
<?php include_once ("eventadm/command/hm_filter.php"); //word filter ?>
<?php include_once ("eventadm/command/wload.php");  //기존 삼성카드 몰 업로드 ?>
<?php include_once ("eventadm/command/hmload.php"); //hm 몰 업로드 ?>
<?php include_once "eventadm/hmapi/getMyHm.php";?>

<!doctype html>
<style type="text/css">
	.content_1_in .p_0{width:100%;height:166px;overflow:hidden;}
	.imgArea{width:100%;height:275px;overflow:hidden;}
</style>
<html lang="kor">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script src="js/mousewheel.min.js"></script>
  <script type="text/javascript" src="js/index_new2.js"></script>
   <script type="text/javascript" src="js/hm_post.js"></script>
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
				$("#nav_m").hide()
			}
		})

		$(".top_icons1").click(function(){
			window.open("/_innermall/eventadm/hmapi/hmlogin.php?type=balance","hmLogin","top=200, left=200, width=640, height=540");
		})

	})
 </script>
 <body>
	<div id="wrap">
		<div id="header">
			<div id="info_wrap">
				<div id="info">
					<?php
					//헤더 타이틀 및 bx 이미지 리스트
					$hmbigArr = findHmbigLogo($conn);
					?>
					<h2><?php echo $hmbigArr['wtitle']?>			
						<?php if($s_adlevel == 1){?>
						<span class="i_post" onclick="hm_post('hmitembig',0);"><?php echo $i_edit?></span>
						<?php } //If Fin	?>
					</h2>
					<h1><img src="img/mall/logo.png" alt="logo" /></h1>
					<?php   if($s_adlevel == 1 ) :?>
					<div class="top_icons">
					<!--
						<a href="/_innermall/hm_main.php" class="top_icons0"><img src="img/mall/top_icon1.jpg" alt="" /></a><span><img src="img/hm/line.png" alt="" /></span>
						-->
						<a href="#none" class="top_icons1"><img src="img/hm/point.png" alt="" /></a>	<span><img src="img/hm/line.png" alt="" /></span>
					</div>
					<?php   endif; ?>
				</div>	
			</div>
			<div id="nav">
				<ul>
				<?php
					//MenuList
					//	$headerlineArr = findHmheaderline($conn, 1);
					for($i=1; $i<=6; $i++){
						
						$headerlineArr[$i] = findHmheaderline($conn, $i); //헤더 내용
						$headermenuArr[$i] = json_decode($headerlineArr[$i]['menulist'],true); //메뉴 리스트 JSON
						$headerlinkArr[$i] = json_decode($headerlineArr[$i]['linklist'],true); //링크 개수
				?>
					<li>
						<a href="#none" class="main_nav"><?php echo $headerlineArr[$i]['menutitle']?></a>
						<dl>
							<dt></dt>
							<?php
								//소메뉴 개수만큼의 반복
								for($j = 0 ; $j <count($headermenuArr[$i]);$j++){
								if($headerlinkArr[$i][$j] != "" && $headerlinkArr[$i][$j] != null){
							?>
							<dd>
								<a href="<?php echo $headerlinkArr[$i][$j]?>" target="_blank">
									<?php echo $headermenuArr[$i][$j]?>
								</a>
							</dd>
							<?php
									} // except Null
								} // foreach Fin
							?>
						</dl>
					</li>
				<?php
					}//for Fin
				?>
								<?php
					//최고관리자만 접근
					if($s_adlevel == 1){ 
						for($i=1; $i<=6; $i++){
				?>
					<li>
						<span class="i_edit" onclick="hm_post('hmheaderline',<?php echo $i?>);"><?php echo $i_edit?></span>
					</li>
				<?php
						}//for Fin
					}//if Fin
				?>
				</ul>
			</div>
			<div id="nav_m">
				<div class="nav_m_head">
					<span class="nav_m_head0"><a href="#none" class="nav_m_xbox"><img src="img/mall/nav_m_menu.png" alt="nav_m_menu" /></a></span>
					<span class="nav_m_head1"><em>제휴사리스트</em></span>
					<span class="nav_m_head2"><a href="#none" class="nav_m_xbox"><img src="img/mall/nav_m_xbox.png" alt="nav_m_xbox" /></a></span>
				</div>	
				<div class="nav_m_body">
				<?php
					for($i = 1; $i<=6; $i++){
						$k = $i -1;

				?>
					<dl>
						<dt><img src="img/mall/nav_m_icon<?php echo $k?>.png" alt="" /><?php echo $headerlineArr[$i]['menutitle']?></dt>
						<?php 
						for($j = 0 ; $j <count($headermenuArr[$i]);$j++){ 
							if($headerlinkArr[$i][$j] != "" && $headerlinkArr[$i][$j] != null){
						?>	
							<dd>
								<a href="<?php echo $headerlinkArr[$i][$j]?>" target="_blank"><?php echo $headermenuArr[$i][$j]?></a>
							</dd>
						<?php
							}//if
						}//for
						?>
					</dl>
					<?php
						}//for			
						$rightAdArr =findHmRightAd($conn); //광고 페이지 정보
					?>
					<dl class="quick_mobile">
						<dt><img src="<?php echo $rightAdArr['new_logo1']?>" alt="" /><a href="<?php echo $rightAdArr['wlink1']?>" target="blank"><span class="color_orange"><?php echo $rightAdArr['wtitle1']?></span> <?php echo $rightAdArr['wcontents1']?></a></dt>
						<dt class="back3_btn"><img src="<?php echo $rightAdArr['new_logo2']?>" alt="" /><a href="#"><strong><?php echo $rightAdArr['wtitle2']?></strong> <?php echo $rightAdArr['wcontents2']?></a></dt>
					</dl>

				</div>
			</div>
			<p id="nav_m_btn"><img src="img/mall/nav_m.jpg" alt="nav_m" /></p>
		</div>
		<?php
			//이미지 리스트
			$hmitemArr1= findHmitemList($conn,1);
			$hmitemArr2= findHmitemList($conn,2);
			$hmitemArr3= findHmitemList($conn,3);
			$hmitemArr4= findHmitemList($conn,4);
			$hmitemArr5= findHmitemList($conn,5);
		?>
		<div id="container">
			<div class="visual">
				<ul class="visual_pc">
					<li><a href="<?php echo $hmbigArr['wlink1']?>" target="_blank">
					<img src="<?php echo $hmbigArr['new_logo1']?>" alt="visu1" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink2']?>" target="_blank">
					<img src="<?php echo $hmbigArr['new_logo2']?>" alt="visu2" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink3']?>" target="_blank">
					<img src="<?php echo $hmbigArr['new_logo3']?>" alt="visu3" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink4']?>" target="_blank">
					<img src="<?php echo $hmbigArr['new_logo4']?>" alt="visu4" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink5']?>" target="_blank">
					<img src="<?php echo $hmbigArr['new_logo5']?>" alt="visu5" /></a></li>
				</ul>
				<ul class="visual_m">
					<li><a href="<?php echo $hmbigArr['wlink1']?>" target="_blank"><img src="<?php echo $hmbigArr['new_mlogo1']?>" alt="visu1" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink2']?>" target="_blank"><img src="<?php echo $hmbigArr['new_mlogo2']?>" alt="visu2" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink3']?>" target="_blank"><img src="<?php echo $hmbigArr['new_mlogo3']?>" alt="visu3" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink4']?>" target="_blank"><img src="<?php echo $hmbigArr['new_mlogo4']?>" alt="visu4" /></a></li>
					<li><a href="<?php echo $hmbigArr['wlink5']?>" target="_blank"><img src="<?php echo $hmbigArr['new_mlogo5']?>" alt="visu5" /></a></li>
				</ul>
				<ul class="sumnail0">
					<li><a href="#none" class="bx-pager-link"><img src="<?php echo $hmbigArr['new_logo1']?>" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="<?php echo $hmbigArr['new_logo2']?>" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="<?php echo $hmbigArr['new_logo3']?>" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="<?php echo $hmbigArr['new_logo4']?>" alt="" /></a></li>
					<li><a href="#none" class="bx-pager-link"><img src="<?php echo $hmbigArr['new_logo5']?>" alt="" /></a></li>
				</ul>
			</div>
			<div class="sub_nav">
				<ul class="sub_nav_pc">
				<?php
					for($i = 1; $i <= 5; $i++){
						$menuData[$i] = findMenutitle($conn,$i); 
				?>
					<li>
						<a href="#none"><?php echo $menuData[$i]['headertitle']?></a>
						<?php 
						//최고 관리자만 접근
							if($s_adlevel ==1){
						?>
							<span class="i_edit" onclick="hm_post('hmtitle',<?php echo $i?>);"><?php echo $i_edit?></span>
						<?php
							}///If Fin
						?>
					</li>
				<?php
					}//for
				?>
				</ul>
				
			</div>
			<p class="sub_nav_m"><a href="#none">주목상품! 절호의 찬스</a></p>
			<div class="content_0 offset0">
				<ul>
				<?php 
					//1번 폼 상품 목록
					for($i=0; $i<4; $i++){
			
				?>
					<li>
						<div>
							<a href="<?php echo $hmitemArr1[$i]['wlink']?>" target="_blank">
								<p class="imgArea">
									<img src="<?php echo $hmitemArr1[$i]['new_logo1']?>" alt="content0_0" />
								</p>
								<div>
									<p class="p_0 p_0_height"><img src="<?php echo $hmitemArr1[$i]['tourimg']?>" alt="content0_s0" /></p>
									<p class="p_1"><?php echo $hmitemArr1[$i]['wtitle']?></p>
									<p class="p_2"><?php echo $hmitemArr1[$i]['wprice']?></p>
								</div>
							</a>
							<!--  관리자 수정 페이지 1번 폼-->
							<?php if($hmitemArr1[$i]['allow_tourno'] == $s_no || $s_adlevel == 1){	?>
							<span class="i_edit" onclick="hmitem_edit('hmitem','1',<?php echo $hmitemArr1[$i]['no']?>);">
								<?php echo $i_edit?>
							</span> 
							<?php
								} // If Fin
							?>
							
							<span class="r_icon">
							<?php if($hmitemArr1[$i]['eventname'] != '0' && $hmitemArr1[$i]['eventname'] != '없음'){ ?>
								<img src="<?php echo $hmitemArr1[$i]['eventimg']?>" alt="rpc_icon0" />
							<?php }	?>
							</span>
						</div>
					</li>
				<?php }	?>
				</ul>
				<div class="quick">
					<ul>
						<li class="small_img">
							<a href="<?php echo $rightAdArr['wlink1']?>" target="_blank">
								<img src="<?php echo $rightAdArr['new_logo1']?>" alt="" />	
							</a>
							<p>
								<span class="color_orange"><?php echo $rightAdArr['wtitle1']?></span><br/>
								<?php echo $rightAdArr['wcontents1']?>
							</p>
						</li>
						<li class="small_img kako_quick">
							<a href="#none">
								<img src="<?php echo $rightAdArr['new_logo2']?>" alt="" />	
							</a>
							<p>
								<strong><?php echo $rightAdArr['wtitle2']?></strong><br/>
								<?php echo $rightAdArr['wcontents2']?>
							</p>
						</li>
						<span class="i_post" onclick="hm_post('hmright_ad',1);"><?php echo $i_edit?></span>
					</ul>
				</div>
			</div>
			<div class="content_1 offset1">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>
						<?php echo $menuData[2]['maintitle'] ?>  
						<?php if($s_adlevel == 1){?>
						<span class="i_post" onclick="hm_post('hmtitle',2);"><?php echo $i_edit?></span>
						<?php }//If FIn ?>
						</h3>
						<p><?php echo $menuData[2]['subtitle'] ?></p>
					</div>
					<ul>
					<?php
						for($i=0; $i<4; $i++){
					?>
						<li>
							<a href="<?php echo $hmitemArr2[$i]['wlink']?>" target="_blank">
								<p class="p_0"><img src="<?php echo $hmitemArr2[$i]['new_logo1']?>" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1 p_1_height"><img src="<?php echo $hmitemArr2[$i]['tourimg']?>" alt="" /></p>
									<p class="p_2"><?php echo $hmitemArr2[$i]['wtitle']?></p>
									<p class="p_3"><?php echo $hmitemArr2[$i]['wprice']?> </p>
								
								</div>
								<span class="r_icon">
								<?php if($hmitemArr2[$i]['eventname'] != '0' && $hmitemArr2[$i]['eventname'] != '없음'){ ?>
									<img src="<?php echo $hmitemArr2[$i]['eventimg']?>" alt="rpc_icon0" />
								<?php }	?>
								</span>
							</a>
							<!--  관리자 수정 페이지 2번 폼-->
							<?php if($hmitemArr2[$i]['allow_tourno'] == $s_no || $s_adlevel == 1){	?>
							<span class="i_edit" onclick="hmitem_edit('hmitem','2',<?php echo $hmitemArr2[$i]['no']?>);">
								<?php echo $i_edit?>
							</span>
							<?php  
								} //If Fin 
							?>
				
						</li>
					<?php
						} //For Fin
					?>
				
					</ul>
				</div>
			</div>
			<div class="content_1 offset2">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>
						<?php echo $menuData[3]['maintitle'] ?>
						<?php if($s_adlevel == 1){?>
						<span class="i_post" onclick="hm_post('hmtitle',3);"><?php echo $i_edit?></span>
						<?php }//If Fin ?>
						</h3>
						<p>제<?php echo $menuData[3]['subtitle'] ?></p>
					</div>
					<ul>
					<?php
						for($i=0; $i<4; $i++){
					?>
						<li>
							<a href="<?php echo $hmitemArr3[$i]['wlink']?>" target="_blank">
								<p class="p_0"><img src="<?php echo $hmitemArr3[$i]['new_logo1']?>" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="<?php echo $hmitemArr3[$i]['tourimg']?>" alt="" /></p>
									<p class="p_2"><?php echo $hmitemArr3[$i]['wtitle']?></p>
									<p class="p_3"><?php echo $hmitemArr3[$i]['wprice']?> </p>
								</div>
								<span class="r_icon">
								<?php if($hmitemArr3[$i]['eventname'] != '0' && $hmitemArr3[$i]['eventname'] != '없음'){ ?>
									<img src="<?php echo $hmitemArr3[$i]['eventimg']?>" alt="rpc_icon0" />
								<?php }	?>
								</span>
							</a>
							<!--  관리자 수정 페이지 3번 폼-->
							<?php if($hmitemArr3[$i]['allow_tourno'] == $s_no || $s_adlevel == 1){	?>
							<span class="i_edit" onclick="hmitem_edit('hmitem','3',<?php echo $hmitemArr3[$i]['no']?>);">
								<?php echo $i_edit?>
							</span>
							<?php  
								} //If Fin 
							?>
				
						</li>
					<?php
						}//For Fin
					?>
					</ul>
				</div>
			</div>
			<div class="content_1 offset3">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>
						<?php echo $menuData[4]['maintitle'] ?>  
						<?php if($s_adlevel == 1){?>
						<span class="i_post" onclick="hm_post('hmtitle',4);"><?php echo $i_edit?></span>
						<?php }//If Fin	?>
						</h3>
						<p><?php echo $menuData[4]['subtitle'] ?> </p>
					</div>
					<ul>
					<?php
						for($i=0; $i<4; $i++){
					?>
						<li>
							<a href="<?php echo $hmitemArr4[$i]['wlink']?>" target="_blank">
								<p class="p_0"><img src="<?php echo $hmitemArr4[$i]['new_logo1']?>" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="<?php echo $hmitemArr4[$i]['tourimg']?>" alt="" /></p>
									<p class="p_2"><?php echo $hmitemArr4[$i]['wtitle']?></p>
									<p class="p_3"><?php echo $hmitemArr4[$i]['wprice']?> </p>
								</div>
								<span class="r_icon">
								<?php if($hmitemArr4[$i]['eventname'] != '0' && $hmitemArr4[$i]['eventname'] != '없음'){ ?>
									<img src="<?php echo $hmitemArr4[$i]['eventimg']?>" alt="rpc_icon0" />
								<?php }	?>
								</span>
							</a>
							<!--  관리자 수정 페이지 4번 폼-->
							<?php if($hmitemArr4[$i]['allow_tourno'] == $s_no || $s_adlevel == 1){	?>
							<span class="i_edit" onclick="hmitem_edit('hmitem','4',<?php echo $hmitemArr4[$i]['no']?>);">
								<?php echo $i_edit?>
							</span>
							<?php  
								} //If Fin 
							?>
				
						</li>
					<?php
					} //For Fin
					?>
					</ul>
				</div>
			</div>
			<div class="content_1 offset4">
				<div class="content_1_in">
					<div class="content_1_head">
						<h3>
						<?php echo $menuData[5]['maintitle'] ?>
						<?php if($s_adlevel == 1){?>
						<span class="i_post" onclick="hm_post('hmtitle',5);"><?php echo $i_edit?></span>
						<?php }//IF Fin	?>
						</h3> 
						<p><?php echo $menuData[5]['subtitle'] ?></p>
					</div>
					<ul>
					<?php
						for($i=0; $i<4; $i++){
					?>
						<li>
							<a href="<?php echo $hmitemArr5[$i]['wlink']?>" target="_blank">
								<p class="p_0"><img src="<?php echo $hmitemArr5[$i]['new_logo1']?>" alt="" /></p>
								<div class="content_0_inner">
									<p class="p_1"><img src="<?php echo $hmitemArr5[$i]['tourimg']?>" alt="" /></p>
									<p class="p_2"><?php echo $hmitemArr5[$i]['wtitle']?></p>
									<p class="p_3"><?php echo $hmitemArr5[$i]['wprice']?> </p>
							</div>
								<span class="r_icon">
								<?php if($hmitemArr5[$i]['eventname'] != '0' && $hmitemArr5[$i]['eventname'] != '없음'){ ?>
									<img src="<?php echo $hmitemArr5[$i]['eventimg']?>" alt="rpc_icon0" />
								<?php }	?>
								</span>
							</a>
							<!--  관리자 수정 페이지 2번 폼-->
							<?php if($hmitemArr5[$i]['allow_tourno'] == $s_no || $s_adlevel == 1){	?>
							<span class="i_edit" onclick="hmitem_edit('hmitem','5',<?php echo $hmitemArr5[$i]['no']?>);">
								<?php echo $i_edit?>
							</span>
							<?php  
								} //If Fin 
							?>

							
						</li>
					<?php
					}//For Fin
					?>
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
				<?php
					$footerRightArr = findHmFooterRight($conn); //우측 정보 DB
				?>
					<h3>
						<?php echo $footerRightArr['wtitle1']?><span>|</span><em><?php echo $footerRightArr['wtitle2']?></em>
						<span class="i_post" onclick="hm_post('hmfooter_right',0);"><?php echo $i_edit?></span>
					</h3>
					<p>
						<?php echo nl2br($footerRightArr['wcontents'])?>
					</p>
					<a href="<?php echo $footerRightArr['wlink']?>" target="_blank">
						<img src="<?php echo $footerRightArr['new_logo1']?>" alt="banner" />
					</a>
				</div>
			</div>		
		</div>

		<div id="footer_wrap">
			<div id="footer">
				<p style="font-weight:400;color:#444"><img src="img/mall/check_icon.png" alt="check_icon" style="width:12px;margin-right:10px"/> 티더블유코리아는 거래당사자가 아니며, 입점판매자가 등록한 상품정보 및 거래에 대해 티더블유코리아는 일제 책임을 지지 않습니다. </p>
				<div class="footer0">
					TW코리아 고객센터  <strong>02-511-5457</strong><span>|</span>소셜 IN TW코리아 <a href="https://www.facebook.com/twkoreaa" target="blank"><img src="img/mall/face.png" alt="face" /></a> <a href="http://twkorea1.blog.me/" target="blank"><img src="img/mall/blog.png" alt="blog" /></a><span>|</span>
					<a href="/_innermall/using.php" target="_blank" class="enter">이용약관</a><span>|</span><a href="/_innermall/Policy.php" target="_blank" class="enter2">개인정보처리·취급방침</a><span>|</span><a href="/_innermall/eventadm/login.php?referer=hm" target="_blank">관리자</a>
				</div>
				<div class="footer1">
					<p>대표: 심승현  <span>|</span>  서울특별시 강남구 도산대로 157, 12층(신사동, 신웅타워2)  <span>|</span>  사업자등록번호 670-86-00462<span>|</span>  통신판매업신고증 제 2017-서울강남-00658 호</p>
					<p class="footer1_1">ⓒ TW KOREA CO., All rights reserved.</p>
				</div>
			</div>
		</div>
		<div class="back">
			<p><img src="<?php echo $rightAdArr['new_logo3']?>" alt="kakao_qu" /></p>
		</div>
		<div class="back2">
			<p><img src="img/mall/contect_num.jpg" alt="contect_num" /></p>
		</div>
		<div class="back3">
			<p><img src="<?php echo $rightAdArr['new_logo3']?>" alt="kakao_qu" /></p>
		</div>
	</div>
 </body>
</html>
