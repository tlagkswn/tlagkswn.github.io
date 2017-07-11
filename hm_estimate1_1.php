<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>
<?php
	//선택했던 출장 타입 리스트
	$typelist = getTripTypeDataOne($conn,$tcode);
	$air_arr = listRecommendAirData($conn,$tcode,$odr1,0);
	//게시글 수정 모드
	
	//항공 데이터 가져오기
	if($no_air != 0){		
		$data_arr= getRecommendAirDataOne($conn, $tcode,$no_air);
		$data_member = getTripTypeEachMember($conn, $data_arr['trip_type_no']); //현재 참가자
		$cur_member_list = str_replace("[","",$data_member['member_wname']);
		$cur_member_list = str_replace("]","",$cur_member_list);
		$cur_member_list = str_replace("\"","",$cur_member_list);	
		$cur_member_list ="*신청자 리스트 - ".$cur_member_list;
	}
	
	if($proc == 'e')
	{		
		$submit_img = "apply_btn9.png";
	}
	else
	{	
		$submit_img = "apply_btn8.png";
	}
	
	///승인 확정 단계이거나 취소 단계는 등록할 수 없다
	if($rstatus == 0 || $rstatus == 4)
	{
		echo "<script>alert('취소 또는 확정된 견적서는 등록 및 수정이 불가능합니다.'); location.href='hm_estimate1.php?no=$no&tcode=$tcode';</script>";
	}
	/////

?>

<script type="text/javascript">
		$(function(){
			

			$(document).on("click",".esti_right2_body_div a",function(){
					
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
			$(document).on("click",".eni_icon6",function(){
				$(".active").parents("ul.esti_right_table_bott1").remove();
			})

	// add
			esti_right_body_num = $(".esti_right_body_bott ul").length;	

			$(document).on("click",".add_btn",function(){
			var number = $(".esti_right_body_bott ul").length;
			
			number = parseInt(number);
			esti_right_body_num++;
				$(".esti_right_body_bott").append('<ul class="esti_right_table_bott1"><li class="esti_ul0"><dl><dt></dt><dd><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class="es_chk_box0 es_chk_box chk_box0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class="es_chk_box01 es_chk_box chk_box1"/></a></dd></dl></li><li class="esti_ul1"><dl><dt></dt><dd>'+number+'</dd></dl></li><li class="esti_ul2"><dl><dt></dt><dd><input type="text" name="airname[]" class="input_type4" placeholder="항공명" /></dd><dd><input type="text" name="air_sdate[]" class="input_type4 date_picker" placeholder="출발날짜"/></dd><dd><input type="text" name="air_fdate[]" class="input_type4 date_picker" placeholder="도착날짜"/></dd><dd><select name="air_rank[]" id="" class="input_type4"><option value="이코노미" >이코노미</option>	<option value="비즈니스" >비즈니스</option>	<option value="1등석" >1등석</option>	</select></dd></dl></li><li class="esti_ul3"><dl><dt></dt><dd><input type="text" name="air_stime[]" class="input_type4" placeholder="출발시간" /></dd><dd><input type="text" name="air_ftime[]" class="input_type4" placeholder="도착시간" /></dd><dd><input type="text" name="air_dtime[]" class="input_type4" placeholder="소요시간" /></dd></dl></li><li class="esti_ul4"><dl><dt></dt><dd><input type="text" name="air_sname[]" class="input_type4" placeholder="편명" /></dd><dd><input type="text" name="air_scity[]" class="input_type4" placeholder="출발도시" /></dd><dd><input type="text" name="air_fcity[]" class="input_type4" placeholder="도착도시" /></dd></dl></li><li class="esti_ul5"><dl><dd><input type="number" name="aircost[]" class="input_type4" placeholder="기본항공료" /></dd><dd><input type="number" name="agencyfee[]" class="input_type4" placeholder="대행수수료" /></dd><dd><input type="number" name="airtax[]" class="input_type4" placeholder="TAX" /></dd></dl></li><li class="esti_ul6"><dl><dt></dt><dd><textarea name="air_require_text[]" id=""></textarea></dd></dl></li></ul>');
			
			$(".air_sdate").datepicker();
			$(".air_fdate").datepicker();
			$(".date_picker").datepicker();

			$(".estimate_info").height($(".estimate_info_body").height());
			for(var i=0; i<number; i++){
					$(".estimate_applicant_add li:eq("+i+")").find("dt span").text(i+1);
				}
			
			})



		//신청자 리스트 불러오기
			$("select[name=trip_type_no]").change(function(){
				var typeno = $(this).val();
				//alert(type);
				$.ajax({
					 type: 'post',
					 cache : false,
					 url: 'eventadm/command/hm_each_type_member.php',
					 dataType : 'text',
					 data: {
						typeno : typeno
					 },
					 success: function (response) {
						$('p.esti_part_members').html(response);
					 }

			   });
			});

		})
		////JQuery Fin
		function ask_recommend_air(proc)
		{
			var form = document.recommend_air_form;
//			var airname = form.airname.value;
//			var airtax = form.airtax.value;
//			var aircost = form.aircost.value;
//			var agencyfee = form.agencyfee.value;
			var trip_type_no = form.trip_type_no.value;
//			
			if(proc == '' || proc =='w' || proc == 'c'){
				var msg = "추천항공권을 작성하시겠습니까?";
			}
			else{
				var msg = "추천항공권을 수정하시겠습니까?";
			}

			if(trip_type_no == 0 || trip_type_no == "")
			{
				alert('출장자 타입을 선택하십시오.');
				return;
			}
			else if(confirm(msg))
			{
				form.submit();
			}
			else
			{
				return false;
			}
		}
</script>
	
	<div id="esti_wrap">
		<?php include "hm_sideNav.php"?>
		<form method="post" name="recommend_air_form" action="eventadm/command/hm_trip_upload_data.php" id="esti_right2" class="esti_airChk">
			<input type="hidden" name="referer" value="recommend_air" />
			<input type="hidden" name="trip_tcode" value="<?php echo $tcode?>" />
			<input type="hidden" name="no" value="<?php echo $no?>" />
			<input type="hidden" name="proc" value="<?php echo $proc?>" />
			<input type="hidden" name="no_air" value="<?php echo $no_air?>" />

			
			<input type="hidden" id="chk_box_0" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_1" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_2" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_3" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_4" value="0" class="chk_box_esti"/>
			<input type="hidden" id="index_ul" value="0"/>
			<div class="esti_right2_head">
				<h3>추천항공권 작성하기</h3>
				<p>한미 출장 시스템에서는 추천항공권을 진열하는데 필요한 기본정보를 입력합니다.</p>
			</div>
		
			<div class="bottom_area">
				<h4 class="small_title" style="margin-top:50px;display:inline-block">날짜별 항공명</h4>
				<p class="esti_right_head1" style="display:inline-block;margin-left:15px;">
						<select name="trip_type_no">
							<option value="0">--타입 선택--</option>
								<?php
									//번호모음
									for($i=0; $i<count($typelist); $i++){
										$typeno = $i + 1;
								?>
									<option value="<?php echo $typelist[$i]['no']?>" <?php if($data_arr['trip_type_no']==$typelist[$i]['no']) echo ' selected '; ?> >Type<?php echo $typeno?></option>
								<?php
									}//
								?>
						</select>
						<select name="" onchange="location = this.value;">
							<option>--복사할 게시글--</option>
							<?php
								$recent_copy = 0;
								foreach($air_arr as $air){
									$recent_copy++;
							?>
								<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&no_air=<?php echo $air['no']?>&proc=c"><?php echo $recent_copy?>번 글</option>
							<?php
								} //Copy Board
							?>
						</select>
					</p>
				<div class="esti_right_body">
					<div class="esti_right_body_top">
					<!--
						<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
						<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
						<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
						<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
					-->
						<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
						<a href="#none" class="add_btn"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					<!-- 					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a> -->
					</div>
					<div class="esti_right_body_bott">
						<ul class="esti_right_table_bott0">
							<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
							<li class="esti_ul1">번호</li>
							<li class="esti_ul2">날짜</li>
							<li class="esti_ul3">출도착시간</li>
							<li class="esti_ul4">항공편</li>
							<li class="esti_ul5">요금(1인 기준)</li>
							<li class="esti_ul6">비고</li>
						</ul>
					<?php
					/*** 작성 모드***/
						if($proc == 'w' || $proc == ''){
						for($i=1; $i<=1; $i++){
					?>
						<ul class="esti_right_table_bott1">
							<li class="esti_ul0">
								<dl>
									<dt></dt>
									<dd>
										<a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a>
									</dd>
								</dl>
							</li>
							<li class="esti_ul1">
								<dl>
									<dt></dt>
									<dd>
										<?php echo $i?>
									</dd>
								</dl>
							</li>
							<li class="esti_ul2">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="airname[]" class="input_type4" placeholder="항공명" />
									</dd>
									<dd>
										<input type="text" name="air_sdate[]" class="input_type4 date_picker" placeholder="출발날짜"/>
									</dd>
									<dd>
										<input type="text" name="air_fdate[]" class="input_type4 date_picker" placeholder="도착날짜"/>
									</dd>
									<dd>
										<select name="air_rank[]" id="" class="input_type4">
											<option value="이코노미" >이코노미</option>	
											<option value="비즈니스" >비즈니스</option>	
											<option value="1등석" >1등석</option>	
										</select>
									</dd>
								</dl>
							</li>
							<li class="esti_ul3">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="air_stime[]" class="input_type4" placeholder="출발시간" />
									</dd>
									<dd>
										<input type="text" name="air_ftime[]" class="input_type4" placeholder="도착시간" />
									</dd>
									<dd>
										<input type="text" name="air_dtime[]" class="input_type4" placeholder="소요시간" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul4">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="air_sname[]" class="input_type4" placeholder="편명" />
									</dd>
									<dd>
										<input type="text" name="air_scity[]" class="input_type4" placeholder="출발도시" />
									</dd>
									<dd>
										<input type="text" name="air_fcity[]" class="input_type4" placeholder="도착도시" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul5">
								<dl>
									<dd>
										<input type="number" name="aircost[]" class="input_type4" placeholder="기본항공료" onchange="sumAirFee(this.value,0,0);" />
									</dd>
									<dd>
										<input type="number" name="agencyfee[]" class="input_type4" placeholder="대행수수료" onchange="sumAirFee(0,this.value,0);"/>
									</dd>
									<dd>
										<input type="number" name="airtax[]" class="input_type4" placeholder="TAX" 
										onchange="sumAirFee(0,0,this.value);"/>
									</dd>
								</dl>
							</li>
							<li class="esti_ul6">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="air_require_text[]" id=""></textarea>
									</dd>
								</dl>
							</li>
						</ul>
					<?php
							}//For Fin
						}//IF Write Mode Fin
					?>

					<?php
					/*** 수정 모드***/
					/** 복사 모드 **/
						if(($proc == 'e' || $proc =='c') && $tcode != ''){
						
						//항공 비용 누적 값
						 $all_aircost = 0;
						 $all_airtax = 0;
						 $all_agencyfee = 0;

                         $airname_arr = json_decode($data_arr['airname'],true);
						 $aircost_arr = json_decode($data_arr['aircost'],true);
						 $airtax_arr = json_decode($data_arr['airtax'],true);
						 $agencyfee_arr = json_decode($data_arr['agencyfee'],true);

						 $air_sdate_arr = json_decode($data_arr['air_sdate'],true);
						 $air_fdate_arr = json_decode($data_arr['air_fdate'],true);
						 $air_stime_arr = json_decode($data_arr['air_stime'],true);
						 $air_ftime_arr = json_decode($data_arr['air_ftime'],true);
						 $air_dtime_arr = json_decode($data_arr['air_dtime'],true);
						 $air_sname_arr = json_decode($data_arr['air_sname'],true);
						 $air_scity_arr = json_decode($data_arr['air_scity'],true);
						 $air_fcity_arr = json_decode($data_arr['air_fcity'],true);
						 $air_require_text_arr = json_decode($data_arr['air_require_text'],true);
						 $air_rank_arr = json_decode($data_arr['air_rank'],true);
						//입력한 항공 번호만큼 출력	
						for($i=0; $i< count($air_sdate_arr); $i++){
							if($air_sdate_arr[$i] != "" && $air_scity_arr[$i] != ""){
								$h = $i+1;
								
								$all_aircost += $aircost_arr[$i];
								$all_airtax += $airtax_arr[$i];
								$all_agencyfee += $agencyfee_arr[$i];
					?>
						<ul class="esti_right_table_bott1">
							<li class="esti_ul0">
								<dl>
									<dt></dt>
									<dd>
										<a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a>
									</dd>
								</dl>
							</li>
							<li class="esti_ul1">
								<dl>
									<dt></dt>
									<dd>
										<?php echo $h?>
									</dd>
								</dl>
							</li>
							<li class="esti_ul2">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="airname[]" value="<?php echo $airname_arr[$i]?>" class="input_type4" placeholder="항공명" />
									</dd>
									<dd>
										<input type="text" name="air_sdate[]" value="<?php echo $air_sdate_arr[$i]?>" class="input_type4 date_picker" placeholder="출발날짜"/>
									</dd>
									<dd>
										<input type="text" name="air_fdate[]" value="<?php echo $air_fdate_arr[$i]?>" class="input_type4 date_picker" placeholder="도착날짜"/>
									</dd>
									<dd>
										<select name="air_rank[]" id="" class="input_type4">
											<option value="이코노미" >이코노미</option>	
											<option value="비즈니스" >비즈니스</option>	
											<option value="1등석" >1등석</option>	
										</select>
									</dd>
								</dl>
							</li>
							<li class="esti_ul3">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="air_stime[]" value="<?php echo $air_stime_arr[$i]?>" class="input_type4" placeholder="출발시간" />
									</dd>
									<dd>
										<input type="text" name="air_ftime[]" value="<?php echo $air_ftime_arr[$i]?>" class="input_type4" placeholder="도착시간" />
									</dd>
									<dd>
										<input type="text" name="air_dtime[]" value="<?php echo $air_dtime_arr[$i]?>" class="input_type4" placeholder="소요시간" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul4">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="air_sname[]" value="<?php echo $air_sname_arr[$i]?>" class="input_type4" placeholder="편명" />
									</dd>
									<dd>
										<input type="text" name="air_scity[]" value="<?php echo $air_scity_arr[$i]?>" class="input_type4" placeholder="출발도시" />
									</dd>
									<dd>
										<input type="text" name="air_fcity[]" value="<?php echo $air_fcity_arr[$i]?>" class="input_type4" placeholder="도착도시" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul5">
								<dl>
									<dd>
										<input type="number" name="aircost[]" value="<?php echo $aircost_arr[$i]?>" class="input_type4" placeholder="기본항공료" />
									</dd>
									<dd>
										<input type="number" name="agencyfee[]" value="<?php echo $agencyfee_arr[$i]?>" class="input_type4" placeholder="대행수수료" />
									</dd>
									<dd>
										<input type="number" name="airtax[]" value="<?php echo $airtax_arr[$i]?>" class="input_type4" placeholder="TAX" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul6">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="air_require_text[]" id=""><?php echo $air_require_text_arr[$i]?></textarea>
									</dd>
								</dl>
							</li>
						</ul>
					<?php
								} // check null or black Fin
							}//For Fin
						}//IF Write Mode Fin
					?>

					</div>
				</div>
			</div>
			<div class="esti_right2_body estimate1Php_wrap" data-ng-app="" data-ng-init="">
				<h4 class="small_title">
					총 항공요금(1인 기준) 
					<!-- 					<span style="padding-left:15px"> -->
					<!-- 						<select name="" id="" class="input_type4"> -->
					<!-- 							<option value="0">Copy Of Type</option> -->
					<!-- 							<option value="0">Type1</option> -->
					<!-- 							<option value="0">Type2</option> -->
					<!-- 						</select> -->
					<!-- 					</span> -->
				</h4>
				<div class="typesSelect">

					<p class="esti_part_members">
						<?php echo $cur_member_list?>
					</p>
				</div>
				<div class="esti_right2_body_in">
					<ul>
						<li>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">총요금</p>
								<div class="esti_right2_body_div">
									<input type="number" class="input_type1" id="allair_max" name="allair_max" value="<?php echo $all_aircost+$all_agencyfee+$all_airtax?>"/> KRW
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">기본항공료</p>
								<div class="esti_right2_body_div">
									<input id="aircost_max" value="<?php echo $all_aircost?>" maxlength="11" type="number" class="input_type1"/> KRW
								</div>
							</div>
						</li>
						<li>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">대행수수료</p>
								<div class="esti_right2_body_div">
									<input id="agencyfee_max" value="<?php echo $all_agencyfee?>" maxlength="11" type="number" class="input_type1"/> KRW
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">TAX</p>
								<div class="esti_right2_body_div">
									<input id="airtax_max" value="<?php echo $all_airtax?>"  maxlength="11" type="number" class="input_type1"/> KRW
								</div>
							</div>
						</li>
						<li class="esti_right_last_li">
							<div> 
								<p class="esti_right2_body_p">요금조건</p>
								<div class="esti_right2_body_di2">
									<p style="height:157px">
									<textarea name="require_text" id="" class="input_type3" style="width:72%;height:70%;margin-top:20px"><?php echo $data_arr['require_text']?></textarea></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="btns">
				<a href="hm_estimate1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>" style="margin-right:20px;"><img src="img/hm/apply_btn7.png" alt="apply_btn7" /></a>
		
				<a href="#" onclick="ask_recommend_air('<?php echo $proc?>');"><img src="img/hm/<?php echo $submit_img?>" alt="apply_btn8" /></a>
		
				
			</div>
		</div>
	</form>
<?php include "hm_foot.php"; ?>