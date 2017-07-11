		<div class="esti_title">
			<h4 class="hm_title">출장 견적서 요청서 | <a href="hm_main.php">목록</a></h4>
			<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
		</div>
		<div id="side_nav_wrap">
			<div class="side_nav">
			<?php
				//Current URI
				$request_uri = $_SERVER['REQUEST_URI'];
				$side_style = 'style="background-color:#cccedb;color:#fff;"';
			?>
				<h3 style="text-align:center;"><a href="#none"><img src="img/hm/folder_icon.png" alt="folder_icon" />출장 견적서 관리</a></h3>

				<ul>
					<li>
						<a href="/_innermall/hm_estimate1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr=<?php echo $odr?>" <?php if(strpos($request_uri,'hm_estimate1') !== false){ echo $side_style; }?> >
						<img src="img/hm/triangle_icon.png" alt="triangle_icon" />추천항공권
						</a>
					</li>
					<li>
						<a href="/_innermall/hm_estimate2.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr=<?php echo $odr?>" <?php if(strpos($request_uri,'hm_estimate2') !== false){ echo $side_style; }?> >
						<img src="img/hm/triangle_icon.png" alt="triangle_icon" />추천호텔
						</a>
					</li>
					<li>
						<a href="/_innermall/hm_estimate0_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr=<?php echo $odr?>" <?php if(strpos($request_uri,'hm_estimate0') !== false){ echo $side_style; }?>>
						<img src="img/hm/triangle_icon.png" alt="triangle_icon" />예상경비
						</a>
					</li>
					<li>
						<a href="hm_apply_view.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>" target="_blank">
						<img src="img/hm/triangle_icon.png" alt="triangle_icon" />견적서 조회
						</a>
					</li>
					<!--
					<li><a href="/_innermall/hm_estimate3.php"><img src="img/hm/triangle_icon.png" alt="triangle_icon" />교통정보</a></li>
					<li><a href="/_innermall/hm_estimate4.php"><img src="img/hm/triangle_icon.png" alt="triangle_icon" />지역정보</a></li>
					<li><a href="/_innermall/hm_estimate5.php"><img src="img/hm/triangle_icon.png" alt="triangle_icon" />추천일정</a></li>
					-->
				</ul>
			</div>
			<a href="#none" class="apply_btn6">
<!-- 				<img src="img/hm/apply_btn6.png" alt="apply_btn6" /> -->
			</a>	
		</div>