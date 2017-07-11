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
		<form id="esti_right_wrap" action="" method="post" class="recommand_form">
			<input type="hidden" id="chk_box_0" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_1" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_2" value="0" class="chk_box_esti"/>
			<div class="esti_right_head">
				<h4>추천항공권</h4>
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
					<a href="/_innermall/hm_estimate5_1.php"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
				</div>
				<div class="esti_right_body_bott">
					<table>
						<tr class="esti_right_table_bott0">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">순서</td>
							<td class="esti_ul2">일차</td>
							<td class="esti_ul4">날짜</td>
							<td class="esti_ul3">일정 상세내역</td>
							
							<td class="esti_ul5">수정</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none" style="margin:0">
									<div>
										<p style="text-align:center;">1일차</p>
									</div>
								</a>
							</td>
							<td class="esti_ul4">
								<a href="#none">
									<span style="font-weight:500;">2017-05-10(수)</span>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<p>인천출발</p>
										<p>11:00pm, 대한항공 미정<br/>
											니스공항에서 210번 공항버스 탑승 칸 이동<br/>
											[버스로 1시간 이동]
										</p>
									</div>
								</a>
							</td>
							
							<td class="esti_ul5">
								<a href="/_innermall/hm_estimate5_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
							</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_1" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_1" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none" style="margin:0">
									<div>
										<p style="text-align:center;">1일차</p>
									</div>
								</a>
							</td>
							<td class="esti_ul4">
								<a href="#none">
									<span style="font-weight:500;">2017-05-10(수)</span>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<p>인천출발</p>
										<p>11:00pm, 대한항공 미정<br/>
											니스공항에서 210번 공항버스 탑승 칸 이동<br/>
											[버스로 1시간 이동]
										</p>
									</div>
								</a>
							</td>
							
							<td class="esti_ul5">
								<a href="/_innermall/hm_estimate5_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
							</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_2" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_2" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none" style="margin:0">
									<div>
										<p style="text-align:center;">1일차</p>
									</div>
								</a>
							</td>
							<td class="esti_ul4">
								<a href="#none">
									<span style="font-weight:500;">2017-05-10(수)</span>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<p>인천출발</p>
										<p>11:00pm, 대한항공 미정<br/>
											니스공항에서 210번 공항버스 탑승 칸 이동<br/>
											[버스로 1시간 이동]
										</p>
									</div>
								</a>
							</td>
							
							<td class="esti_ul5">
								<a href="/_innermall/hm_estimate5_1.php"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
							</td>
						</tr>

					</table>
				</div>
			</div>
		</form>
	</div>
<?php include "hm_foot.php"; ?>