<?php include "hm_head2.php"; ?>
<?php include "eventadm/hm_estimate_author.php"; //관리자 세션 체크 ?>
<?php
	//등록된 추천항공 리스트
	$air_arr = listRecommendAirData($conn,$tcode,$odr1,0);
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
				<h4>추천항공권</h4>
				<p class="esti_right_head0">ALL <span>(<?php echo count($air_arr)?>)</span></p>
				<p class="esti_right_head1">
				<select name="" id="" onchange="location = this.value;">
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=recent&odr2=<?php echo $odr2?>&typeno1=<?php echo $typeno1?>" <?php if($odr1=='recent'){ echo ' selected'; }?> >최신순으로 진열하기</option>
					<option value="?no=<?php echo $no?>&tcode=<?php echo $tcode?>&odr1=type&odr2=<?php echo $odr2?>&typeno1=<?php echo $typeno1?>" <?php if($odr1=='type'){ echo ' selected'; }?> >타입순으로 진열하기</option>
				</select>
				</p>
				<p class="esti_right_head1">
				</p>

			</div>
			<div class="esti_right_body">
				<div class="esti_right_body_top">
				<!--
					<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
					<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
				-->
					<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
					<a href="/_innermall/hm_estimate1_1.php?no=<?php echo $no?>&tcode=<?php echo $tcode?>"><img src="img/hm/eni_icon4.png" alt="eni_icon" /></a>
				</div>
				<div class="esti_right_body_bott">
					<table class="estimate1Php">
						<tr class="esti_right_table_bott0">
							<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
							<td class="esti_ul1">번호</td>
							<td class="esti_ul2">타입(출장자)</td>
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
							  

							//////
					?>
		
						<tr class="esti_right_table_bott1" data-index="<?php echo $a['no']?>" data-recommendname="air">
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
							}//////Foreach Fin Fin
						}///If
						?>
						
					</table>
				</div>
			</div>
		</form>
	</div>
<?php include "hm_foot.php"; ?>
