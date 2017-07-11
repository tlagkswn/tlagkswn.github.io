<?php include_once ("eventadm/ckAuthor.php"); ?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
  <title>임직원전용 몰</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <script type="text/javascript" src="js/indexOpen.js"></script>
  <script type="text/javascript" src="js/manipulateCk.js"></script>
  <script type="text/javascript">
	$(function(){
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

		headerH = $("#header").height();
		visualH = $("#visual").height();

		total = visualH+headerH;
		
		$(window).scroll(function(){
		var nowScroll1 = $(document).scrollTop()
		if(nowScroll1 >= total){
			$(".side_nav").css({"position":"fixed","margin-left":"351px","margin-top":"45px"})
		}
		else{
			$(".side_nav").css({"position":"absolute","margin-left":"0","margin-top":"0"})
		}
		})
	})
  </script>
 </head>
 <body>
	<div id="header">
		<h1><a href="#"><img src="<?php echo $mainheadArr['new_logo1'];?>" alt="logo" class="mainhead_img"/></a></h1><?php echo $w_edit_mainhead;?>
	
<!-- 		<span class="top_">임직원전용 몰</span> -->
		<span class="right_logo">
			<a href="#none" style="display:inline"><img src="img/application.jpg" alt="application" style="margin-right:2%;"/></a>
			<img src="img/right_logo.png" alt="right_logo" />
		</span>
	</div>

	<div id="" style="text-align:center;">
		<?php echo $w_edit_mainbig?>
	</div>
	<div id="visual">
		<ul class="visual_pc">
			<li>
				<a href="<?php echo $mainbigArr['wlink1']?>" style="width:100%;height:500px;background:url(<?php echo $mainbigArr['new_logo1']?>)no-repeat center;background-size:cusor;" target="_blank" class="visu_logo1"></a>
			</li>
			<li>
				<a href="<?php echo $mainbigArr['wlink2']?>" style="width:100%;height:500px;background:url(<?php echo $mainbigArr['new_logo2']?>)no-repeat center;background-size:cusor; target="_blank" class="visu_logo2"></a>
			</li>
			<li>
				<a href="<?php echo $mainbigArr['wlink3']?>" style="width:100%;height:500px;background:url(<?php echo $mainbigArr['new_logo3']?>)no-repeat center;background-size:cusor;" target="_blank" class="visu_logo3"></a>
			</li>		
		</ul>
		<ul class="visual_m">
			<li>
				<a href="<?php echo $mainbigArr['wlink1']?>" target="_blank"><img src="<?php echo $mainbigArr['new_mlogo1']?>"/></a>
			</li>
			<li>
				<a href="<?php echo $mainbigArr['wlink2']?>" target="_blank"><img src="<?php echo $mainbigArr['new_mlogo2']?>"/></a>
			</li>
			<li>
				<a href="<?php echo $mainbigArr['wlink3']?>" target="_blank"><img src="<?php echo $mainbigArr['new_mlogo3']?>"/></a>
			</li>
		</ul>
	</div>

	<div id="container">
		<div id="content1">			
			<div class="best">
				<h4><span class="navy">베스트</span> 상품 <?php echo $w_edit_best?> </h4>
				<ul>
				<?php
					for($i = 0; $i< 4 ; $i++){

				?>
					<li>
						<a href="<?php echo $bestArr[$i]['wlink']?>" class="img_area" target="_blank"><img src="<?php echo $bestArr[$i]['new_logo1']?>"/></a>
						<div class="text_area">
							<a href="<?php echo $bestArr[$i]['wlink']?>" class="day" target="_blank"><?php echo $bestArr[$i]['wtitle']?></a>
							<a href="<?php echo $bestArr[$i]['wlink']?>" target="_blank"><?php echo $bestArr[$i]['wcontents']?></a>
							<a href="<?php echo $bestArr[$i]['wlink']?>" class="price" target="_blank"><?php echo $bestArr[$i]['wprice']?></a> 
							<a class="del_cursor" onclick="editOk('<?php echo $bestArr['type']?>','<?php echo $bestArr[$i]['no']?>','<?php echo $scode?>');">
								<?php echo $w_amend?>
							</a>
							<a class="del_cursor" onclick="deleteOk('<?php echo $bestArr['type']?>','<?php echo $bestArr[$i]['no']?>','<?php echo $scode?>');">
							<!--type = best no = 가져온 숫자-->
								<?php echo $w_del;?>
							</a>
						</div>
					</li>
				<?php
					}
				?>
				</ul>
			</div>
			<div class="special">
				<h4><span class="navy">제휴사</span> 특별 상품 <?php echo $w_edit_parter; ?></h4>
				<div class="special_L">
					<ul class="flim bxslider">
					<?php
						for($i=0; $i < 2; $i++){
					?>
						<li><a href="<?php echo $partnerArr[$i]['wlink'];?>" target="_blank">
						<img src="<?php echo $partnerArr[$i]['new_logo1']?>" alt="content2_1" /></a>
						</li>
					<?
						}
					?>
					</ul>
					<a href="#none" class="s_Left_button"><img src="img/left_button.png" alt="left" /></a>
					<a href="#none" class="s_Right_button"><img src="img/right_button.png" alt="left" /></a>

				</div>
				<div class="special_R">
					<ul class="flim2 bxslider">
					<?php
						for($i=0; $i<2; $i++){
					?>
						<li>
							<div class="special_R_top">
								<a href="<?php echo $partnerArr[$i]['wlink'];?>" class="r_img" target="_blank">
									<img src="<?php echo $partnerArr[$i]['new_logo2']?>" alt="new_logo" /></a>
								<a href="<?php echo $partnerArr[$i]['wlink'];?>" class="s_title" target="_blank">
									<?php echo $partnerArr[$i]['wtitle'];?>
								</a>
								
							</div>
							<dl class="special_R_M">
								<dt></dt>
								<dd><?php echo $partnerArr[$i]['wcontents1'];?></dd>
								<dd><?php echo $partnerArr[$i]['wcontents2'];?></dd>
								<dd><?php echo $partnerArr[$i]['wcontents3'];?></dd>
								<dd><?php echo $partnerArr[$i]['wcontents4'];?></dd>
								<dd><?php echo $partnerArr[$i]['wcontents5'];?></dd>
							</dl>
							<div class="special_R_Bottom">
								<a href="<?php echo $partnerArr[$i]['wlink'];?>" class="price" target="_blank">
									<?php echo $partnerArr[$i]['wprice'];?>
								</a>
									Tel.<?php echo $partnerArr[$i]['wtel']?>
								<br />
								<a class="del_cursor" onclick="editOk('<?php echo $partnerArr['type']?>','<?php echo $partnerArr[$i]['no']?>','<?php echo $scode?>');">
									<?php echo $w_amend;?>
								</a>
								<a class="del_cursor" onclick="deleteOk('<?php echo $partnerArr['type']?>','<?php echo $partnerArr[$i]['no']?>','<?php echo $scode?>');">
									<?php echo $w_del;?>
								</a>
							</div>
							
						</li>
					<?php
						}
					?>
					</ul>
				</div>
			</div>
			<div class="goods">
				<h4><span class="navy">기획</span> 상품 <?php echo $w_edit_plan;?></h4><!-- indexOpen.js를 통해(type,proc,code포함.) 바로 update_page.php로 가줌. -->
				<ul>
				<?php
					for($i = 0; $i< 4 ; $i++){
				?>
					<li>
						<a href="<?php echo $planArr[$i]['wlink']?>" class="img_area" target="_blank"><img src="<?php echo $planArr[$i]['new_logo1']?>"/></a><!--  사진   -->
						<div class="text_area">
							<a href="<?php echo $planArr[$i]['wlink']?>" class="day" target="_blank"><?php echo $planArr[$i]['wtitle']?></a><!-- 첫번째 글   -->
							<a href="<?php echo $planArr[$i]['wlink']?>" target="_blank"><?php echo $planArr[$i]['wcontents']?></a>
							<a href="<?php echo $planArr[$i]['wlink']?>" class="price" target="_blank"><?php echo $planArr[$i]['wprice']?></a> 
							<a class="del_cursor" onclick="editOk('<?php echo $planArr['type']?>','<?php echo $planArr[$i]['no']?>','<?php echo $scode?>');">
								<?php echo $w_amend?>
							</a>
							<a class="del_cursor" onclick="deleteOk('<?php echo $planArr['type']?>','<?php echo $planArr[$i]['no']?>','<?php echo $scode?>');">
								<?php echo $w_del;?>
							</a>
						</div>
					</li>
				<?php
					}
				?>
				</ul>
			</div>
			<p class="side_nav">
			
				<?php echo $w_edit_sidebar; ?>
				
				<a href="<?php echo $sidebarArr['wlink1']?>" target="_blank"><img src="<?php echo $sidebarArr['new_logo1']?>" alt="side_1" /></a>
				<?php echo nl2br($sidebarArr['exp1']);?>
		
				<a href="<?php echo $sidebarArr['wlink2']?>" target="_blank"><img src="<?php echo $sidebarArr['new_logo2']?>" alt="side_1" /></a>
				<?php echo nl2br($sidebarArr['exp2']);?> 
				<br />
				<a class="del_cursor" onclick="deleteOk('<?php echo $sidebarArr['type']?>','<?php echo $sidebarArr['no']?>','<?php echo $scode?>');">
					<?php echo $w_del;?>
				</a>
				
			</p>
		</div>
	</div>
<!-- $w_edit_help -->
	<div id="content2_Wrap">
		<div id="content2">
			<h3><span class="navy">추천</span> 상품</h3>
			<div class="" style="text-align:center;">
				<?php echo $w_edit_recommend1;?><?php echo $w_edit_recommend2;?><?php echo $w_edit_recommend3;?><?php echo $w_edit_recommend4;?>
			</div>
			<ul>

			<?php
				for($n = 1; $n <= 4; $n++){
					$con1 = ""; //li css 클래스
					if($n % 2 == 0)
					{
						$con1 = " class=con2_r";
					}
			?>
				<li <?php echo $con1?> >
					<p class="con2_cap"><img src="img/top_cap<?php echo $n?>.png" alt="top_cap1" />
						<span class="con2_title">
							<?php echo $recommendArr[$n][0]['wtitle']?>
						</span>
					</p>
					<?php
					for($i=0; $i<2; $i++){
						$con2 = "class=con2_div_r";
						if($i == 0)
						{
							$con2 = "";
						}
					?>
					<div <?php echo $con2?> >
						<a href="<?php echo $recommendArr[$n][$i]['wlink']?>" target="_blank">
							<img src="<?php echo $recommendArr[$n][$i]['new_logo1']?>" alt="top_cap1_1"  class="recommend_list"/>
							<span>
								<?php echo $recommendArr[$n][$i]['wsubtitle']?>
							</span>
						</a>
						<p class="num">
							<?php echo $recommendArr[$n][$i]['wtour']?><img src="img/line.png" alt="line" />
							<?php echo $recommendArr[$n][$i]['wtel']?>
							<a class="del_cursor" onclick="editOkPos('<?php echo $recommendArr[$n]['type']?>','<?php echo $recommendArr[$n][$i]['no']?>','<?php echo $scode?>','<?php echo $recommendArr[$n][$i]['pos']?>');">
								<?php echo $w_amend?>
							</a>
							<a class="del_cursor" onclick="deleteOk('<?php echo $recommendArr[$n]['type']?>','<?php echo $recommendArr[$n][$i]['no']?>','<?php echo $scode?>');">
								<?php echo $w_del;?>
							</a>
						</p>

					</div>
					<?php
						} // i.for문 종료
					?>
				</li>
				<?
			} // n.For문 종료
				?>
				
			</ul>
		</div>
	</div>

	<div id="content3">
		<h3>
			<span class="navy">임직원 전용몰만의</span> 특별한 혜택!
			<?php echo $w_edit_special1?><?php echo $w_edit_special2?><?php echo $w_edit_special3?><?php echo $w_edit_special4?>
		</h3>
		
		<div class="con3_l">
			<div class="con3_l_top">
			<?php		for($i=1; $i<=4; $i++){		?>
				<a href="#none"><?php echo  $specialArr[$i]["wtitle"];?><br/><img src="img/location_off.png" alt="location_off"/></a>
			<?php	    } //for문 종료		?>
			</div>
			<div class="con3_l_bottom">
				<?php	for($i=1; $i<=4; $i++){    ?>
					<p>
					<?php
							for($j=1; $j<=4; $j++){
							if($specialArr[$i]['wtel'.$j] != ""){ //연락처 정보가 있어야 이미지가 등록된다
								
							
					?>
							<a href="<?php echo $specialArr[$i]['wlink'.$j]?>" target="_blank" >
								<img src="<?php echo $specialArr[$i]['new_logo'.$j]?>" alt="location_off" /><br/>
								T.<?php echo $specialArr[$i]['wtel'.$j]?>
							</a>
					<?php
							}else{
					?>
							<a href="#none" style="opacity:0; cursor:default;">
								<br />
							</a>
					<?php
									}
								 // if 로고가 없으면 표시하지않는다.
							} // j for
					?>
					</p>
				<?php	} //i For		?>
			</div>
			<div class="sale">
				<p style="width:100%;background-color:#eee;height:40px;line-height:40px;"><?php echo $sfooterArr['wtitle']?><?php echo $w_edit_sfooter;?></p>
				<ul class="sale_in">
					<li><?php echo $sfooterArr['wcontent']?></li>
					<li><?php echo $sfooterArr['wcontent2']?></li>
					<li><?php echo $sfooterArr['wcontent3']?></li>
					<li><?php echo $sfooterArr['wcontent4']?></li>
					<li><?php echo $sfooterArr['wcontent5']?></li>
				</ul>
			</div>
			<span class="con3_line"></span>
		</div>	
		
		<div class="con3_r">
		<?php echo $w_edit_help; ?>
			<p><img src="<?php echo $helpArr['new_logo1']?>" alt="ergent" /></p>
			<p class="text_area_r"><?php echo nl2br($helpArr['wtitle'])?><br/></p>
			<p class="con_num"><?php echo $helpArr['wtel']?></p>
		</div>

	</div>

	<div id="footer">
		<p class="phone">
			<span>TW코리아 고객센터  02-511-5457</span><span><img src="img/line.png" alt="line" /></span>
			<span class="enter2">이용약관</span><span><img src="img/line.png" alt="line" /></span>
			<span class="enter">개인정보처리·취급방침</span><span><img src="img/line.png" alt="line" /></span>
			<span class="Admin"><a href="eventadm/login.php" style="display:inline-block;color:#777;">Admin</a></span>
		</p>
		<p class="sns">
		<?php echo $w_edit_snsurl?>
			<a href="<?php echo $snsurlArr['wlink_fb']?>" target="_blank"><img src="img/face.png" alt="face" style="position:relative;top:-1px;"/></a>
			<a href="<?php echo $snsurlArr['wlink_bl']?>" class="blog" target="_blank"><img src="img/blog.png" alt="blog" /></a>
		</p>
		<span class="footer_line" style="margin-top:28px;"></span>
		<p class="address">
			대표이사:심승현   <img src="img/line.png" alt="line" />  서울특별시 강남구 도산대로 157, 2층(신사동, 신웅타워2)   <img src="img/line.png" alt="line" />   사업자등록번호 670-86-00462    <img src="img/line.png" alt="line" />ⓒ TW KOREA CO., All rights reserved.

		</p>
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
