<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>
<?php
	//선택했던 출장 타입 리스트
	$typelist = getTripTypeDataOne($conn,$tcode);
	$hotel_arr = listRecommendHotelData($conn,$tcode,$odr2,0);
	
	//호텔 데이터 가져오기
	if($no_hotel != 0){
		$data_arr= getRecommendHotelDataOne($conn, $tcode,$no_hotel);
		$data_member = getTripTypeEachMember($conn, $data_arr['trip_type_no']); //현재 참가자
		$cur_member_list = str_replace("[","",$data_member['member_wname']);
		$cur_member_list = str_replace("]","",$cur_member_list);
		$cur_member_list = str_replace("\"","",$cur_member_list);	
		$cur_member_list ="*신청자 리스트 - ".$cur_member_list;
	}
	//게시글 수정 모드
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
		echo "<script>alert('취소 또는 확정된 견적서는 등록 및 수정이 불가능합니다.'); location.href='hm_estimate2.php?no=$no&tcode=$tcode';</script>";
	}	
?>
<style type="text/css">
	.esti_part_members{margin-bottom:15px;}
</style>
<script type="text/javascript">
	////
	$(function(){
		// add
			esti_right_body_num = $(".esti_right_body_bott ul").length;	

			$(document).on("click",".add_btn",function(){
			var number = $(".esti_right_body_bott ul").length;
			
			number = parseInt(number);
			esti_right_body_num++;
				$(".esti_right_body_bott").append('<ul class="esti_right_table_bott1"><li class="esti_ul0"><dl><dt></dt><dd><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class="es_chk_box0 es_chk_box chk_box0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class="es_chk_box01 es_chk_box chk_box1"/></a></dd></dl></li><li class="esti_ul1"><dl><dt></dt><dd>'+number+'</dd></dl></li><li class="esti_ul2"><dl><dt></dt><dd><input type="text" name="cityname[]" value="" class="input_type4" placeholder="도시명" /></dd><dd><input type="text" name="city_sdate[]" class="input_type4 date_picker" placeholder="입실날짜"/></dd><dd><input type="text" name="city_fdate[]" class="input_type4 date_picker" placeholder="퇴실날짜"/></dd><dd><input type="text" name="period[]" value="" class="input_type4" placeholder="박수" /></dd></dl></li><li class="esti_ul3"><dl><dt></dt><dd><input type="text" name="hotelprice_krw[]" class="input_type4" placeholder="단가(현지)" /></dd><dd><input type="text" type="tel" name="hotelprice[]" value="" maxlength="11" class="input_type4" placeholder="단가(원화)" /></dd><dd><input type="text"name="hotelprice_all_krw[]" maxlength="11" class="input_type4" placeholder="총요금(현지)" /></dd><dd><input type="text" name="hotelprice_all[]" class="input_type4" placeholder="총요금(원화)" /></dd></dl></li><li class="esti_ul4"><dl><dt></dt><dd><input type="text" name="hotelname[]" class="input_type4" placeholder="호텔명" /></dd><dd><input type="text" name="hotelurl[]" class="input_type4" placeholder="URL" /></dd><dd><input type="text" name="room_type[]" class="input_type4" placeholder="객실타입" /></dd><dd><select name="breakfast[]" id="" class="input_type4"><option value="조식포함" >조식포함</option>	<option value="조식미포함" >조식미포함</option>		</select></dd></dl></li><li class="esti_ul5 esti_ul5_textarea1"><dl><dt></dt><dd><textarea name="require_text[]" id=""></textarea></dd></dl></li><li class="esti_ul6"><dl><dt></dt><dd><textarea name="require_text2[]" id=""></textarea></dd></dl></li></ul>');
			
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
	});

	function ask_recommend_hotel(proc)
	{
		var form = document.recommend_hotel_form;
//		var hotelprice = form.hotelprice.value;
//		var period = form.period.value;
//		var hotelprice_all = form.hotelprice_all.value;
//		var hotelname = form.hotelname.value;
//		var cityname = form.cityname.value;
//		var hotelurl = form.hotelurl.value;
		var trip_type_no = form.trip_type_no.value;


		if(proc == '' || proc == 'w'){
			var msg = "추천호텔을 작성하시겠습니까?";
		}
		else{
			var msg = "추천호텔을 수정하시겠습니까?";
		}
		
		if(trip_type_no == 0 || trip_type_no == "")
		{
			alert('타입을 선택하십시오.');
			return;
		}
//		else if(period =="")
//		{
//			alert('숙박 기간을 입력하십시오.');
//			form.period.focus();
//		}
//		else if(hotelprice_all =="")
//		{
//			alert('총 요금을 입력하십시오.');
//			form.hotelprice_all.focus();
//		}
//		else if(hotelname =="")
//		{
//			alert('호텔 이름을 입력하십시오.');
//			form.hotelname.focus();
//		}
//		else if(cityname =="")
//		{
//			alert('도시 이름을 입력하십시오.');
//			form.cityname.focus();
//		}
//		else if(hotelurl =="")
//		{
//			alert('호텔 위치(URL)을 입력하십시오.');
//			form.hotelurl.focus();
//		}
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
		<form method="post" name="recommend_hotel_form" action="eventadm/command/hm_trip_upload_data.php" id="esti_right2" class="esti_airChk">
			<input type="hidden" name="referer" value="recommend_hotel" />
			<input type="hidden" name="trip_tcode" value="<?php echo $tcode?>" />
			<input type="hidden" name="no" value="<?php echo $no?>" />
			<input type="hidden" name="proc" value="<?php echo $proc?>" />
			<input type="hidden" name="no_hotel" value="<?php echo $no_hotel?>" />
			<div class="esti_right2_head">
				<h3>추천호텔 작성하기</h3>
				<p>한미 출장 시스템에서는 추천호텔을 진열하는데 필요한 기본정보를 입력합니다.</p>
			</div>
			<!--
			<div class="esti_right2_body">
				
				<div class="esti_right2_body_in">
					<ul>
						<li>
							<div class="esti_right2_body_float">
								<div>
									<p class="esti_right2_body_p">단가</p>
									<div class="esti_right2_body_div">
										<input type="tel" name="hotelprice" value="<?php echo $data_arr['hotelprice']?>" maxlength="11" class="input_type1"/> KRW
									</div>
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">박수</p>
								<div class="esti_right2_body_div">
									<input type="text" name="period" value="<?php echo $data_arr['period']?>" class="input_type2" maxlength="3"/> 일
								</div>
							</div>
						</li>
						
						<li>
							<div class="esti_right2_body_float">
								<div>
									<p class="esti_right2_body_p">총요금</p>
									<div class="esti_right2_body_div">
										<input type="text" name="hotelprice_all" value="<?php echo $data_arr['hotelprice_all']?>" maxlength="11" class="input_type1"/> KRW
									</div>
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">호텔명</p>
								<div class="esti_right2_body_div">
									<input type="text" name="hotelname" value="<?php echo $data_arr['hotelname']?>" class="input_type1"/> 
								</div>
							</div>
						</li>
						<li>
							<div class="esti_right2_body_float">
								<div>
									<p class="esti_right2_body_p">도시명</p>
									<div class="esti_right2_body_div">
										<input type="text" name="cityname" value="<?php echo $data_arr['cityname']?>" class="input_type1"/>
									</div>
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">호텔위치</p>
								<div class="esti_right2_body_div">
									<input type="text" name="hotelurl" value="<?php echo $data_arr['hotelurl']?>" class="input_type1" placeholder="URL"/> 
								</div>
							</div>
						</li>
						<li class="esti_right_last_li">
							<div> 
								<p class="esti_right2_body_p">위치정보</p>
								<div class="esti_right2_body_di2">
									<p style="height:157px">
									<textarea name="require_text" id="" class="input_type3" style="width:72%;height:70%;margin-top:20px"><?php echo $data_arr['require_text']?></textarea></p>
								</div>
							</div>
						</li>
						<li class="esti_right_last_li">
							<div> 
								<p class="esti_right2_body_p">비고</p>
								<div class="esti_right2_body_di2">
									<p style="height:157px">
									<textarea name="require_text2" id="" class="input_type3" style="width:72%;height:70%;margin-top:20px"><?php echo $data_arr['require_text2']?></textarea></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			</div>
			-->
			<div class="bottom_area">
				<h4 class="small_title" style="margin-top:50px;display:inline-block">날짜별 호텔</h4>
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
								foreach($hotel_arr as $hotel){
									$recent_copy++;
							?>
								<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&no_hotel=<?php echo $hotel['no']?>&proc=c"><?php echo $recent_copy?>번 글</option>
							<?php
								} //Copy Board
							?>
						</select>
					</p>
					<p class="esti_part_members">
						<?php echo $cur_member_list?>
					</p>
				<div class="esti_right_body">
					<div class="esti_right_body_top">
<!-- 						<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a> -->
						<a href="#none" class="add_btn"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
					</div>
					<div class="esti_right_body_bott">
						<ul class="esti_right_table_bott0">
							<li class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></li>
							<li class="esti_ul1">번호</li>
							<li class="esti_ul2">도시 및 날짜</li>
							<li class="esti_ul3">요금</li>
							<li class="esti_ul4">객실정보</li>
							<li class="esti_ul5">호텔정보</li>
							<li class="esti_ul6">비고</li>
						</ul>
					<?php
					/*** 작성 모드***/
						if($proc == '' || $proc == 'w'){
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
								
										1
										
<!-- 										<input type="text" style="width:50%;border:1px solid #d6d6d6;text-indent:0;"/> -->

									</dd>
								</dl>
							</li>
							<li class="esti_ul2">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="cityname[]"  class="input_type4" placeholder="도시명" />
									</dd>
									<dd>
										<input type="text" name="city_sdate[]" class="input_type4 date_picker" placeholder="입실날짜"/>
									</dd>
									<dd>
										<input type="text" name="city_fdate[]" class="input_type4 date_picker" placeholder="퇴실날짜"/>
									</dd>
									<dd>
										<input type="text" name="period[]"  class="input_type4" placeholder="박수" />
									</dd>
									
								</dl>
							</li>
							<li class="esti_ul3">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="hotelprice_krw[]" class="input_type4" placeholder="단가(현지)" />
									</dd>
									<dd>
										<input type="text" type="tel" name="hotelprice[]" value="" maxlength="11"  class="input_type4" placeholder="단가(원화)" />
									</dd>
									<dd>
										<input type="text" name="hotelprice_all_krw[]" maxlength="11" class="input_type4" placeholder="총요금(현지)" />
									</dd>
									<dd>
										<input type="text" name="hotelprice_all[]" class="input_type4" placeholder="총요금(원화)" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul4">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="hotelname[]" value="" class="input_type4" placeholder="호텔명" />
									</dd>
									<dd>
										<input type="text" name="hotelurl[]" value="" class="input_type4" placeholder="URL" />
									</dd>
									<dd>
										<input type="text" name="room_type[]" class="input_type4" placeholder="객실타입" />
									</dd>
									<dd>
										<select name="breakfast[]" id="" class="input_type4">
											<option value="조식포함" value="조식포함" >조식포함</option>	
											<option value="조식미포함" value="조식미포함">조식미포함</option>		
										</select>
									</dd>
								</dl>
							</li>
							<li class="esti_ul5 esti_ul5_textarea1">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="require_text[]" id=""></textarea>
									</dd>
								</dl>
							</li>
							<li class="esti_ul6">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="require_text2[]" id=""></textarea>
									</dd>
								</dl>
							</li>
						</ul>

					<?php
								}//Write Mode Fin

					/*** 수정 모드***/
					/** 복사 모드 **/
						if(($proc == 'e' || $proc == 'c') && $tcode != ''){
						
						 $cityname_arr = json_decode($data_arr['cityname'],true);
						 $city_sdate_arr = json_decode($data_arr['city_sdate'],true);
						 $city_fdate_arr = json_decode($data_arr['city_fdate'],true);
						 $period_arr = json_decode($data_arr['period'],true);
						 
						 $hotelprice_krw_arr = json_decode($data_arr['hotelprice_krw'],true);
						 $hotelprice_arr = json_decode($data_arr['hotelprice'],true);
						 $hotelprice_all_krw_arr = json_decode($data_arr['hotelprice_all_krw'],true);
						 $hotelprice_all_arr = json_decode($data_arr['hotelprice_all'],true);
			
						 $hotelname_arr = json_decode($data_arr['hotelname'],true);
						 $hotelurl_arr = json_decode($data_arr['hotelurl'],true);
						 $room_type_arr = json_decode($data_arr['room_type'],true);
						 $breakfast_arr = json_decode($data_arr['breakfast'],true);

		
						 $require_text_arr = json_decode($data_arr['require_text'],true);
						 $require_text2_arr = json_decode($data_arr['require_text2'],true);
	
				
					
						//입력한 호텔 번호만큼 출력	
						for($i=0; $i< count($cityname_arr); $i++){
							if($cityname_arr[$i] != "" && $hotelname_arr[$i] != ""){
								$h = $i+1;
				
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
										
<!-- 										<input type="text" style="width:50%;border:1px solid #d6d6d6;text-indent:0;"/> -->

									</dd>
								</dl>
							</li>
							<li class="esti_ul2">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="cityname[]" value="<?php echo $cityname_arr[$i]?>" class="input_type4" placeholder="도시명" />
									</dd>
									<dd>
										<input type="text" name="city_sdate[]" value="<?php echo $city_sdate_arr[$i]?>" class="input_type4 date_picker" placeholder="입실날짜"/>
									</dd>
									<dd>
										<input type="text" name="city_fdate[]" value="<?php echo $city_fdate_arr[$i]?>" class="input_type4 date_picker" placeholder="퇴실날짜"/>
									</dd>
									<dd>
										<input type="text" name="period[]" value="<?php echo $period_arr[$i]?>"  class="input_type4" placeholder="박수" />
									</dd>
									
								</dl>
							</li>
							<li class="esti_ul3">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="hotelprice_krw[]" value="<?php echo $hotelprice_krw_arr[$i]?>" class="input_type4" placeholder="단가(현지)" />
									</dd>
									<dd>
										<input type="text" type="tel" name="hotelprice[]" value="<?php echo $hotelprice_arr[$i]?>" maxlength="11"  class="input_type4" placeholder="단가(원화)" />
									</dd>
									<dd>
										<input type="text" name="hotelprice_all_krw[]" value="<?php echo $hotelprice_all_krw_arr[$i]?>" maxlength="11" class="input_type4" placeholder="총요금(현지)" />
									</dd>
									<dd>
										<input type="text" name="hotelprice_all[]" value="<?php echo $hotelprice_all_arr[$i]?>" class="input_type4" placeholder="총요금(원화)" />
									</dd>
								</dl>
							</li>
							<li class="esti_ul4">
								<dl>
									<dt></dt>
									<dd>
										<input type="text" name="hotelname[]" value="<?php echo $hotelname_arr[$i]?>" value="" class="input_type4" placeholder="호텔명" />
									</dd>
									<dd>
										<input type="text" name="hotelurl[]" value="<?php echo $hotelurl_arr[$i]?>" value="" class="input_type4" placeholder="URL" />
									</dd>
									<dd>
										<input type="text" name="room_type[]" value="<?php echo $room_type_arr[$i]?>" class="input_type4" placeholder="객실타입" />
									</dd>
									<dd>
										<select name="breakfast[]" id="" class="input_type4">
											<option value="조식포함" value="조식포함" >조식포함</option>	
											<option value="조식미포함" value="조식미포함">조식미포함</option>		
										</select>
									</dd>
								</dl>
							</li>
							<li class="esti_ul5 esti_ul5_textarea1">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="require_text[]" id=""><?php echo $require_text_arr[$i]?></textarea>
									</dd>
								</dl>
							</li>
							<li class="esti_ul6">
								<dl>
									<dt></dt>
									<dd>
										<textarea name="require_text2[]" id=""><?php echo $require_text2_arr[$i]?></textarea>
									</dd>
								</dl>
							</li>
						</ul>
					<?php
								}//Null 값 검사 Fin
							}//작성한 번호 개수만큼 Fin
						}//IF Edit Mode Fin
					?>

					</div>
				</div>
			</div>
			<div class="btns">
				<a href="hm_estimate2.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>" style="margin-right:20px;"><img src="img/hm/apply_btn7.png" alt="apply_btn7" /></a>
	
				<a href="javascript:ask_recommend_hotel('<?php echo $proc?>');"><img src="img/hm/<?php echo $submit_img?>" alt="apply_btn8" /></a>
	
			</div>
		</div>
	</form>
<?php include "hm_foot.php"; ?>