<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>
	<script type="text/javascript">
		$(function(){
			$(".esti_right_table_bott0 .esti_ul0 a").click(function(){
				if(!$(this).hasClass("active")){
					$(".chk_box_esti").attr("value",1);
					$(".esti_right_body_bott").find(".chk_box0").css({"display":"none"});
					$(".esti_right_body_bott").find(".chk_box1").css({"display":"inline-block"});
					$(".esti_right_table_bott0 .esti_ul0 a").addClass("active");
					$(".esti_right_table_bott1 .esti_ul0 a").addClass("active");
					
					
				}else{
					$(".chk_box_esti").attr("value",0);
					$(".esti_right_body_bott").find(".chk_box0").css({"display":"inline-block"});
					$(".esti_right_body_bott").find(".chk_box1").css({"display":"none"});
					$(".esti_right_table_bott0 .esti_ul0 a").removeClass("active");
					$(".esti_right_table_bott1 .esti_ul0 a").removeClass("active");
				}

			})

			$(".esti_right_table_bott1 .esti_ul0 a").click(function(){
					
				if(!$(this).hasClass("active")){
					var index0 = $(this).find("img").attr("alt");
					$("#"+index0+"").attr("value",1);
					$(this).find(".chk_box0").css({"display":"none"});
					$(this).find(".chk_box1").css({"display":"inline-block"});
					$(this).addClass("active");
					
				}else{
					var index0 = $(this).find("img").attr("alt");
					$("#"+index0+"").attr("value",0);
					$(this).find(".chk_box0").css({"display":"inline-block"});
					$(this).find(".chk_box1").css({"display":"none"});
					$(this).removeClass("active");
				}
			})

			

		})
	</script>
	<div id="esti_wrap">
		<?php include "hm_sideNav.php"?>
		<form id="esti_right_wrap" action="" method="post">
			<input type="hidden" id="chk_box_0" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_1" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_2" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_3" value="0" class="chk_box_esti"/>
			<div class="esti_right_head">
				<h4>예상경비</h4>
				<p class="esti_right_head0">ALL <span>(4)</span></p>
				<p class="esti_right_head1"><select name="" id="">
					<option value="0">최신순으로 진열하기</option>
				</select></p>
			</div>
			<div class="esti_right_body">
				<div class="esti_right_body_top">
				<!--
					<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
				-->
					<a href="#none"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="/_innermall/hm_estimate0_1.php"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
				</div>
				<div class="esti_right_body_bott">
					<ul class="esti_right_table_bott0">
						<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
						<li class="esti_ul1">순서</li>
						<li class="esti_ul2">추천 항공</li>
						<li class="esti_ul3">추천 호텔</li>
						<li class="esti_ul4">예상 요금</li>
						<li class="esti_ul5">수정</li>
					</ul>
					<ul class="esti_right_table_bott1">
						<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
						<li class="esti_ul1">1</li>
						<li class="esti_ul2">
							<a href="#none">
								<div>
									<p>국적사 비즈니스 항공권</p>
									<p>(단가 : ￦4,215,700 /1인)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul3">
							<a href="#none">
								<div>
									<p>Hotel America</p>
									<p>(단가 : ￦660,108/6박)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul4">￦4,875,808</li>
						<li class="esti_ul5">
							<a href="/_innermall/hm_estimate0_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
						</li>
					</ul>
					<ul class="esti_right_table_bott1">
						<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_1" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_1" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
						<li class="esti_ul1">2</li>
						<li class="esti_ul2">
							<a href="#none">
								<div>
									<p>국적사 비즈니스 항공권</p>
									<p>(단가 : ￦4,215,700 /1인)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul3">
							<a href="#none">
								<div>
									<p>Hotel America</p>
									<p>(단가 : ￦660,108/6박)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul4">￦4,875,808</li>
						<li class="esti_ul5">
							<a href="/_innermall/hm_estimate0_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
						</li>
					</ul>
					<ul class="esti_right_table_bott1">
						<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_2" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_2" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
						<li class="esti_ul1">3</li>
						<li class="esti_ul2">
							<a href="#none">
								<div>
									<p>국적사 비즈니스 항공권</p>
									<p>(단가 : ￦4,215,700 /1인)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul3">
							<a href="#none">
								<div>
									<p>Hotel America</p>
									<p>(단가 : ￦660,108/6박)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul4">￦4,875,808</li>
						<li class="esti_ul5">
							<a href="/_innermall/hm_estimate0_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
						</li>
					</ul>
					<ul class="esti_right_table_bott1">
						<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_3" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_3" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
						<li class="esti_ul1">4</li>
						<li class="esti_ul2">
							<a href="#none">
								<div>
									<p>국적사 비즈니스 항공권</p>
									<p>(단가 : ￦4,215,700 /1인)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul3">
							<a href="#none">
								<div>
									<p>Hotel America</p>
									<p>(단가 : ￦660,108/6박)</p>
								</div>
							</a>
						</li>
						<li class="esti_ul4">￦4,875,808</li>
						<li class="esti_ul5">
							<a href="#none"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</div>
<?php include "hm_foot.php"; ?>