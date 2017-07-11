<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>
<?php
	//등록된 호텔 리스트
	$hotel_arr = listRecommendHotelData($conn,$tcode,$odr2,0);
		//타입 갯수
	$type_arr = getTripTypeDataOne($conn,$tcode);

?>
	<div id="esti_wrap">
		<?php include "hm_sideNav.php"?>
		<form id="esti_right_wrap" action="" method="post">
			<input type="hidden" id="chk_box_0" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_1" value="0" class="chk_box_esti"/>
			<input type="hidden" id="chk_box_2" value="0" class="chk_box_esti"/>
			<div class="esti_right_head">
				<h4>추천호텔</h4>
				<p class="esti_right_head0">ALL <span>(<?php echo count($hotel_arr)?>)</span></p>
				<p class="esti_right_head1">
				<select name="" id="" onchange="location = this.value;">
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=<?php echo $odr1?>&odr2=recent&typeno2=<?php echo $typeno2?>" <?php if($odr2=='recent'){ echo ' selected'; }?> >최신순으로 진열하기</option>
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=<?php echo $odr1?>&odr2=type&typeno2=<?php echo $typeno2?>" <?php if($odr2=='type'){ echo ' selected'; }?> >타입순으로 진열하기</option>
				</select>
				</p>
				<p class="esti_right_head1">

				</p>
			</div>
			<div class="esti_right_body estimate2Php estimate2Php2">
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
						<td class="esti_ul2">호텔명 / 타입(출장자)</td>
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
								<td class="esti_ul0" colspan="9">등록된 추천 호텔이 없습니다.</td>	
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
					<tr class="esti_right_table_bott1" data-index="<?php echo $a['no']?>"  data-recommendname="hotel">
						
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
								}/// 한 글 안에 호텔 개수

							$n++;
							}//////글의 개수 Foreach Fin 
						}///If
					?>
				</table>
				</div>
				
			</div>
		</form>
	</div>
<?php include "hm_foot.php"; ?>
