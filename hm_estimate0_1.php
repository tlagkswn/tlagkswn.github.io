<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>

	<script type="text/javascript">
		$(function(){
			

		})

		function recommend_add_status(no,tcode,rstatus)
		{
			//대기중 , 수정중일떄는 검토중으로 변경 (1,3)=>(2)
			if(rstatus == 1 || rstatus == 3){
				var msg = "견적서 상태가 검토중으로 변경되며 추천정보가 게시됩니다.\n등록하시겠습니까?";
			}
			else if(rstatus == 2){ //검토중 
				var msg = "견적서 상태가 대기중으로 변경되며\n추천정보가 원본글에 첨부되지 않습니다.\n취소하시겠습니까?";
			}
			if(confirm(msg))
			{
				location.href='/_innermall/eventadm/command/hm_trip_status_estimate.php?no='+no+'&tcode='+tcode+'&rstatus='+rstatus;
			//	alert('등록이 완료되었습니다. 작성 페이지로 이동합니다.');
			}
			else
			{
				return false;
			}
		}
	</script>
<?php
	$air_arr = listRecommendAirData($conn,$tcode,$odr1,0); //항공리스트
	$hotel_arr = listRecommendHotelData($conn,$tcode,$odr2,0); // 호텔리스트
		
	$type_arr = getTripTypeDataOne($conn,$tcode);//타입 갯수
?>
	<div id="esti_wrap">
		<?php include "hm_sideNav.php"?>
		<form method="post" action="" id="esti_right2">
			<input type="hidden" id="chk_box_0" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_1" value="0" class="chk_box_esti"/>
			<div class="esti_right2_head">
				<h3>예상경비 작성하기</h3>
				<p>한미 출장 시스템에서는 경비를 진열하는데 필요한 기본정보를 입력합니다.</p>
			</div>
		
			<div class="esti_right_head">
				<h4 style="font-size:20px;color:#3a4083;padding:20px 0 15px">추천항공권</h4>
				<p class="esti_right_head0">ALL <span>(<?php echo count($air_arr)?>)</span></p>
				<p class="esti_right_head1">
				<select name="" id="" onchange="location = this.value;">
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=recent&odr2=<?php echo $odr2?>" <?php if($odr1=='recent'){ echo ' selected'; }?> >최신순으로 진열하기</option>
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=type&odr2=<?php echo $odr2?>" <?php if($odr1=='type'){ echo ' selected'; }?> >타입순으로 진열하기</option>
				</select></p>
			</div>
			<div class="esti_right_body">
				<div class="esti_right_body_top">
					<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="/_innermall/hm_estimate1_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
				</div>
				<div class="esti_right_body_bott">
					<table class="estimate1Php">
						<tr class="esti_right_table_bott0">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">번호</td>
							<td class="esti_ul2">추천 항공</td>
							<td class="esti_ul3">항공 일정</td>
							<td class="esti_ul4">예상 요금(1인 기준)</td>
							<td class="esti_ul5">수정</td>
						</tr>
					<?php
						//등록된 항공정보 리스트
						$n = 1;
						if(empty($air_arr)){
						?>
							<tr class="esti_right_table_bott1">
								<td class="esti_ul0" colspan="6">등록된 추천항공권이 없습니다.</td>	
							</tr>
					<?php
						}
						else{
						foreach($air_arr as $a){
							// $sum_tax = number_format($a['aircost'] + $a['airtax'] + $a['agencyfee']);
							//JSON_DECODING
							 $air_sdate_arr = json_decode($a['air_sdate'],true);
							 $air_fdate_arr = json_decode($a['air_fdate'],true);
							 $air_stime_arr = json_decode($a['air_stime'],true);
							 $air_ftime_arr = json_decode($a['air_ftime'],true);
							 $air_dtime_arr = json_decode($a['air_dtime'],true);
							 $air_sname_arr = json_decode($a['air_sname'],true);
							 $air_scity_arr = json_decode($a['air_scity'],true);
							 $air_fcity_arr = json_decode($a['air_fcity'],true);
							 $air_require_text_arr = json_decode($a['air_require_text'],true);
							 
							 $aircost_arr = json_decode($a['aircost'],true);
							 $airtax_arr = json_decode($a['airtax'],true);
							 $agencyfee_arr = json_decode($a['agencyfee'],true);
							 $airname_arr = json_decode($a['airname'],true);


							 $member_each_wname_arr = json_decode($a['member_each_wname'],true);
							 $type_order_no = getTypeNoOrder($conn,$tcode,$a['trip_type_no']);
							 //////타입 별 멤버리스트
							 $getMember = getTripTypeEachMember($conn,$a['trip_type_no']);
							 
							 $getMember_filter = str_replace("[","",$getMember['member_wname']);
							 $getMember_filter = str_replace("]","",$getMember_filter);
							 $getMember_filter = str_replace("\"","",$getMember_filter);
					?>
						<tr class="esti_right_table_bott1">
							<td class="esti_ul0"><a href="#none">
							<img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1"><?php echo $n?></td>
							<td class="esti_ul2">
					
									<div>
										<h4>
								
											Type <?php echo $type_order_no?>
							
										</h4>
										<p class="esti_ul2_center"><strong><?php echo $getMember_filter?></strong></p>
										<!--
										<p>*출장자 :
										<?php
										//출장자 리스트
											foreach($member_each_wname_arr as $mw){
										?>
											<?php echo $mw?>
										<?php
										}///출장자 리스트 종료
										?>
										</p>
										-->
									
									</div>
						
							</td>
							<td class="esti_ul3">
							<?php
								for($m=0; $m <count($airname_arr); $m++){
										//날짜와 출발 도시명이 있으면 있는 걸로 간주
									if($air_sdate_arr[$m] != "" && $air_scity_arr[$m] != ""){
							?>
									<div>
									
										<p><strong>항공명</strong> :<?php echo $airname_arr[$m]?> / <strong class="cities_color"><?php echo $air_scity_arr[$m]?> - <?php echo $air_fcity_arr[$m]?>행</strong>
										<span class="navy_color">(편명 <?php echo $air_sname_arr[$m]?>)</span></p>
										<p><strong>출발</strong> : <?php echo $air_sdate_arr[$m]?> / <?php echo $air_stime_arr[$m]?> / <strong>도착</strong> : <?php echo $air_fdate_arr[$m]?> / <?php echo $air_ftime_arr[$m]?> </p>
										<p></p>
										<p><strong>좌석</strong> : 이코노미 / <strong>소요시간</strong> : <strong class="red_color"><?php echo $air_dtime_arr[$m]?> </strong> 시간 소요</p>
<!-- 										(대기시간포함) -->
										</p>
										<p class="note">( <?php echo $air_require_text_arr[$m]?>)</p>
									</div>

							<?php
								$sum_tax += $aircost_arr[$m] + $airtax_arr[$m] + $agencyfee_arr[$m];
										} /// If Fin
						}///
							?>
							</td>
							<td class="esti_ul4">
								￦<?php echo number_format($sum_tax)?>
								<p class="charging_condition">(<?php echo $a['require_text']?>)</p>
							</td>
							<td class="esti_ul5">
								<a href="/_innermall/hm_estimate1_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>&no_air=<?php echo $a['no']?>&proc=e"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>
							</td>
						</tr>
						<?php
						$n++;
							}//Foreach Fin
						}//if Fin
						?>
					</table>
				</div>
			</div>

			<!--
			<div class="esti_right2_body">
				<h4 class="small_title">호텔</h4>
				<div class="esti_right2_body_in">
					<ul>
						<li>
							<div class="esti_right2_body_float">
								<div>
									<p class="esti_right2_body_p">단가</p>
									<div class="esti_right2_body_div">
										<input type="text" value="" class="input_type1"/> KRW
									</div>
								</div>
							</div>
							<div class="esti_right2_body_float">
								<p class="esti_right2_body_p">박수</p>
								<div class="esti_right2_body_div">
									<input type="text" value="" class="input_type2"/> 일
								</div>
							</div>
						</li>
						
						<li>
							<div>
								<p class="esti_right2_body_p">총요금</p>
								<div class="esti_right2_body_div">
									<input type="text" value="" class="input_type1"/> KRW
								</div>
							</div>
						</li>
						<li class="esti_right_last_li">
							<div> 
								<p class="esti_right2_body_p">비고</p>
								<div class="esti_right2_body_di2">
									<p>상세비고1 : <input type="text" class="input_type3"/></p>
									<p>상세비고2 : <input type="text" class="input_type3"/></p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			-->
			<div class="esti_right_head">
				<h4 style="font-size:20px;color:#3a4083;padding:20px 0 15px">추천호텔</h4>
				<p class="esti_right_head0">ALL <span>(<?php echo count($hotel_arr)?>)</span></p>
				<p class="esti_right_head1">
				<select name="" id="" onchange="location = this.value;">
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=<?php echo $odr1?>&odr2=recent" <?php if($odr2=='recent'){ echo ' selected'; }?> >최신순으로 진열하기</option>
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=<?php echo $odr1?>&odr2=type" <?php if($odr2=='type'){ echo ' selected'; }?> >타입순으로 진열하기</option>
				</select></p>
			</div>
			<div class="esti_right_body estimate2Php">
				<div class="esti_right_body_top">
				<!--
					<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
				-->
					<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="/_innermall/hm_estimate2_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
<!-- 					<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a> -->
				</div>
				<div class="esti_right_body_bott">
					<table>
					<tr class="esti_right_table_bott0">
						<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
						<td class="esti_ul1">순서</td>
						<td class="esti_ul2">호텔명</td>
						<td class="esti_ul3">상세사이트 이동</td>
						<td class="esti_ul4">박수</td>
						<td class="esti_ul8">객실타입</td>
						<td class="esti_ul5">비고</td>
						<td class="esti_ul6">금액</td>
						<td class="esti_ul7">수정</td>
						
					</tr>
					<?php
						//등록된 항공정보 리스트
					
						$n = 1;
						if(empty($hotel_arr)){
						?>
							<tr class="esti_right_table_bott1">
								<td class="esti_ul0" colspan="8">등록된 추천 호텔이 없습니다.</td>	
							</tr>
					<?php
						}
						else{
						$n = 1;
						foreach($hotel_arr as $a){
							$type_order_no = getTypeNoOrder($conn,$tcode,$a['trip_type_no']);

							//JSON_DECODING
							 $period_arr = json_decode($a['period'],true);
							 $hotelprice_arr = json_decode($a['hotelprice'],true);
							 $hotelprice_all_arr = json_decode($a['hotelprice_all'],true);
							 $hotelprice_krw_arr = json_decode($a['hotelprice_krw'],true);
							 $hotelprice_all_krw_arr = json_decode($a['hotelprice_all_krw'],true);
							 $hotelname_arr = json_decode($a['hotelname'],true);
							 $cityname_arr = json_decode($a['cityname'],true);
							 $city_sdate_arr = json_decode($a['city_sdate'],true);
							 $city_fdate_arr = json_decode($a['city_fdate'],true);
							 
							 $room_type_arr = json_decode($a['room_type'],true);
							 $breakfast_arr = json_decode($a['breakfast'],true);
							 $hotelurl_arr = json_decode($a['hotelurl'],true);
							 $require_text_arr = json_decode($a['require_text'],true);
							 $require_text2_arr = json_decode($a['require_text2'],true);


							 //////타입 별 멤버리스트
							 $getMember = getTripTypeEachMember($conn,$a['trip_type_no']);
							 
							 $getMember_filter = str_replace("[","",$getMember['member_wname']);
							 $getMember_filter = str_replace("]","",$getMember_filter);						
							 $getMember_filter = str_replace("\"","",$getMember_filter);

							 ///타입 별 호텔리스트
							 
							 $getHotel_filter = str_replace("[","",$a['hotelname']);
							 $getHotel_filter = str_replace("]","",$getHotel_filter);						
							 $getHotel_filter = str_replace("\"","",$getHotel_filter);
						
						///한 글 안에 등록된 호텔 개수만큼 불러온다 
						for($c = 0; $c < count($cityname_arr); $c++){
					?>
						<tr class="esti_right_table_bott1">
						
					<?php
					//If first then check rowspan
						if($c == 0){
					?>
						<td class="esti_ul0" rowspan="<?php echo count($cityname_arr)?>"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
						<td class="esti_ul1" rowspan="<?php echo count($cityname_arr)?>"><?php echo $n?></td>
						<td class="esti_ul2" rowspan="<?php echo count($cityname_arr)?>">
					
						
										
									<p class="type_of_name">
							
									<strong>

											Type <?php echo $type_order_no?>
									
									</strong>
						
									</p>
									<p><strong><?php echo $getMember_filter?></strong></p>
									
									
						
									<!--
									<p>
									*출장자 :
										<?php
										//출장자 리스트
											foreach($member_each_wname_arr as $mw){
										?>
											<?php echo $mw?>
										<?php
										}///출장자 리스트 종료
										?>
									</p>
									-->
				
					
						</td>
						<?php
					} //Rowspan Fin
						?>
						<td class="esti_ul3">		
							<div>
								
								<p class="navy_color">
									<?php echo $hotelname_arr[$c]?>
								<a href="<?php echo $hotelurl_arr[$c]?>" target="_blank">호텔정보 보러가기</a>
								</p>	
							</div>
						</td>
						
						<td class="esti_ul4" style="font-size:14px">
								<?php echo $period_arr[$c]?>
						</td>
						<td class="esti_ul8">
								<p><?php echo $room_type_arr[$c]?></p>
								<strong><?php echo $breakfast_arr[$c]?></strong>
						</td>
						<td class="esti_ul5">
							<p><?php echo nl2br($require_text2_arr[$c])?></p>
						</td>
						<td class="esti_ul6">
							<span style="color:#f25884">
								￦<?php echo number_format($hotelprice_all_arr[$c])?>
								<p class="name_of_city">(<?php echo nl2br($require_text_arr[$c])?>)</p>
							</span>
						</td>
					<?php
					//If first then check rowspan
						if($c == 0){
					?>
						<td class="esti_ul7" rowspan="<?php echo count($cityname_arr)?>">
							<a href="#none" ><a href="/_innermall/hm_estimate2_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>&no_hotel=<?php echo $a['no']?>&proc=e"><img src="img/hm/esti_edit.jpg" alt="esti_edit" /></a>

						</td>
					<?php
						}////If first then check rowspan
					?>
					</tr>
					<?php
								}//한 글 안에 호텔 개수
							$n++;
							}//////Foreach Fin Fin
						}///If
					?>
				</table>
				</div>
				
			</div>


			<div class="btns">
			<p class="btns_quote" style="font-size:14px;">

			 본 출장 견적서의 상태는 <span class="navy_color"><?php echo $rstatus_quote?></span> 단계 입니다.<br />
			 추천항공권과 호텔 정보 등록은 검토 단계와 확정 단계에서 볼 수 있습니다.
			</p>
			<br />
			<?php
				// 1: 대기중 , 2 : 검토중
				if($rstatus ==1 || $rstatus ==2 || $rstatus ==3 ){
			?>
				<a href="#none" onclick="recommend_add_status('<?php echo $no?>', '<?php echo $tcode?>','<?php echo $rstatus?>');"><img src="<?php echo $change_status_submit?>" alt="apply_btn8"/>
			<?php
				}
			//0 : 취소
			else if($rstatus ==0){
			?>
				본 견적서는 취소 상태라 등록을 할 수 없습니다.
			<?php
			}///
			// 4: 완료 상태
			else if($rstatus == 4){
			?>
				이미 승인이 완료된 견적서입니다.
			<?php
			}/// 
			?>
			
				</a>
			</div>
		</div>
	</form>
<?php include "hm_foot.php"; ?>
