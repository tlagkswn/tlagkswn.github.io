<?php include "hm_head2.php"; ?>
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
			<div class="esti_right_head">
				<h4>교통정보</h4>
				<p class="esti_right_head0">ALL <span>(4)</span></p>
				<p class="esti_right_head1"><select name="" id="">
					<option value="0">최신순으로 진열하기</option>
				</select></p>
			</div>
			<div class="esti_right_body trafficInfo">
				<div class="esti_right_body_top">
				<!--
					<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
				-->
					<a href="#none"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="/_innermall/hm_estimate3_1.php"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
				</div> 
				<div class="esti_right_body_bott">
					<table>
						<tr class="esti_right_table_bott0">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">순서</td>
							<td class="esti_ul2">호텔명</td>
							<td class="esti_ul3">상세내역</td>
							<td class="esti_ul4">수정</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none">
									<div>
										<p>출장지역 대중교통 및 택시</p>
									</div>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<p>- 니스 코트다쥐르 공항에서 칸느까지 택시를 탑승한다면, 40분거리이나 한화 약 11~15만원의 요금이 나옵니다. 프랑스의 택시비는 비쌉니다. </p>
										<p style="margin-top:10px;">- 택시외에 버스 탑승과 기차탑승 두가지의 방법으로 ...</p>
									</div>
								</a>
							</td>
							<td class="esti_ul4">
								<a href="/_innermall/hm_estimate3_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</form>
	</div>
<?php include "hm_foot.php"; ?>