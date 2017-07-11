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
		<form method="post" action="" id="esti_right2" class="recommand_form_1">
			<div class="esti_right2_head">
				<h3>추천일정 작성하기</h3>
				<p>한미 출장 시스템에서는 추천일정정보를 진열하는데 필요한 기본정보를 입력합니다.</p>
			</div>
			<div class="esti_right2_body">
				<h4 class="small_title"><input type="text" class="input_type2" style="width:30px"/> 일차 일정</h4>
				<div class="esti_right2_body_in">
					<ul>
						<li>
							<div>
								<p class="esti_right2_body_p">날짜</p>
								<div>
									<input type="text" value="" class="input_type1 date_picker" placeholder="ex) 2017-05-10"/>
								</div>
							</div>
						</li>
						
						</li>
					</ul>

					<h4 style="padding:15px 0;border-bottom:1px solid #e6e6e6;">* 선택사항 - 항공편 출도착시간</h4>
					<table>
						<tr>
							<th class="th_0">출발</th>
							<th class="th_1">도착 및 경유</th>
							<th class="th_2">전체시간소요</th>
						</tr>
						<tr>
							<td>
								<p><input type="text" class="input_type5 date_picker" placeholder="ex) 2017-05-10" /></p>
								<p class="td_p_center"><input type="text" class="input_type5" placeholder="오전 11:00" /></p>
								<p><input type="text" class="input_type5" placeholder="출발지"/></p>
							</td>
							<td>
								<p><input type="text" class="input_type5 date_picker" placeholder="ex) 2017-05-10"/></p>
								<p class="td_p_center"><input type="text" class="input_type5" placeholder="오후 11:00" /></p>
								<p><input type="text" class="input_type5" placeholder="도착지" /></p>
							</td>
							<td class="th_2">
								<input type="text" class="input_type1"/> 시간
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="esti_right2_body">
				<h4 class="small_title">출장일정 내역</h4>
				<div class="esti_right_body trafficInfo">
				<div class="esti_right_body_top">
				<!--
					<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
				-->
					<a href="#none"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
				</div> 
				<div class="esti_right_body_bott">
					<table>
						<tr class="esti_right_table_bott0">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">순서</td>
							<td class="esti_ul2">일정 타이틀</td>
							<td class="esti_ul3">일정 내용</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
						</tr>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">1</td>
							<td class="esti_ul2">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
							<td class="esti_ul3">
								<a href="#none">
									<div>
										<textarea name="" id=""></textarea>
									</div>
								</a>
							</td>
						</tr>
					</table>
				</div>
			</div>
			</div>

			<div class="btns">
				<a href="javascript:history.go(-1)" style="margin-right:20px;"><img src="img/hm/apply_btn7.png" alt="apply_btn7" /></a><a href="javascript:history.go(-1)"><img src="img/hm/apply_btn8.png" alt="apply_btn8" /></a>
			</div>
		</div>
	</form>
<?php include "hm_foot.php"; ?>