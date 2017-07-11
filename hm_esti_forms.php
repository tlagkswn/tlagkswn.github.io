<?php include "hm_head2.php"; ?>
<?php
//작성권한
if(($s_adlevel ==  1 || $s_adlevel == 4) && $s_wid != null){ 
	$tcode = $_REQUEST['tcode']; //식별코드
	$no = $_REQUEST['no']; //번호
	$getArr = getTripDataOne($conn, $no,$tcode);
	//게시글 검사
	if(empty($getArr))
	{
		echo "<script>alert('삭제되었거나 없는 게시물입니다. '); location.href='hm_main.php';</script>";
	}
	else if($getArr['rstatus'] == '' || $getArr['rstatus'] != 4) ///확정 상태가 아닌 견적서
	{
		echo "<script>alert('승인이 되어있지 않은 견적서입니다.'); location.href='hm_main.php';</script>";
	}
?>
<style type="text/css">
	#eisti_forms{width:960px;margin:50px auto;}
	#header{margin-bottom:30px;}
	.eisti_form_head{margin-top:20px}
</style>
<!-- //http://twkmall.co.kr/_innermall/eventadm/hmapi/hmuse_list.php -->
<div id="eisti_forms" >
<h3 style="margin-bottom:20px"><a href="hm_main.php">목록으로</a></h3>

<?php

	function printJsonList($word) {
		$word = str_replace("[","",$word);
		$word = str_replace("]","",$word);
		$word = str_replace("\"","",$word);
		return $word;
	}
	//listRecommendAirData($conn,$tcode,$odr,$t['no']);
	//listRecommendHotelData($conn,$tcode,$odr,$t['no']);
	
	//타입별로 정렬
	$type_list = getTripTypeDataOne($conn,$tcode);

	$type_i = 0;

	//타입별로 글 개수 정렬시키기
	foreach($type_list as $t){
		$type_i++;
		
		///JSON DECODE///
		$member_wname = json_decode($t['member_wname']);
		$city_fdate = json_decode($t['city_fdate']);
		$city_sdate = json_decode($t['city_sdate']);
		$city_name = json_decode($t['city_name']);
		/////////////////

		//리스트 (특수 문자 제거)

		$member_wname_list = printJsonList($t['member_wname']); //출장 인원 이름
		$city_name_list = printJsonList($t['city_name']); //출장 지역
	

		//선택한 항공 정보 찾기
		$airList = getRecommendAirDataOne($conn, $tcode,$t['sel_airno']);
		//선택한 호텔 정보 찾기
		$hotelList = getRecommendHotelDataOne($conn, $tcode,$t['sel_hotelno']);
		
		//출장 기간 변수 //
		$trip_first_day = $city_fdate[0];
		$trip_last_day = $city_sdate[count($city_sdate) - 1];

		/*** AIR INFORM***/
		//JSON DECODE
		$airname = json_decode($airList['airname'],true);
		$aircost = json_decode($airList['aircost'],true);
		$airtax = json_decode($airList['airtax'],true);
		$agencyfee = json_decode($airList['agencyfee'],true);
		//$require_text = json_decode($airList['require_text'],true);
		$air_sdate = json_decode($airList['air_sdate'],true);
		$air_fdate = json_decode($airList['air_fdate'],true);
		$air_stime = json_decode($airList['air_stime'],true);
		$air_ftime = json_decode($airList['air_ftime'],true);
		$air_dtime = json_decode($airList['air_dtime'],true);
		$air_sname = json_decode($airList['air_sname'],true);
		$air_scity = json_decode($airList['air_scity'],true);
		$air_fcity = json_decode($airList['air_fcity'],true);
		$air_require_text = json_decode($airList['air_require_text'],true);
		$air_rank = json_decode($airList['air_rank'],true);
		
		///JSON LIST
		$airname_list = printJsonList($airList['airname']);
		$air_scity_list = printJsonList($airList['air_scity']);
		$air_fcity_list = printJsonList($airList['air_fcity']);
		///

		/*** HOTEL INFORM***/
		//JSON DECODE
		$hotelname = json_decode($hotelList['hotelname'],true);
		$cityname = json_decode($hotelList['cityname'],true);
		$city_sdate = json_decode($hotelList['city_sdate'],true);
		$city_fdate = json_decode($hotelList['city_fdate'],true);
		$room_type = json_decode($hotelList['room_type'],true);
		$breakfast = json_decode($hotelList['breakfast'],true);
		$hotelurl = json_decode($hotelList['hotelurl'],true);
		$hotelprice = json_decode($hotelList['hotelprice'],true);
		$hotelprice_all = json_decode($hotelList['hotelprice_all'],true);
		$hotelprice_krw = json_decode($hotelList['hotelprice_krw'],true);
		$hotelprice_all_krw = json_decode($hotelList['hotelprice_all_krw'],true);
		$period = json_decode($hotelList['period'],true);

		$require_text_h1 = json_decode($hotelList['require_text'],true);
		$require_text_h2 = json_decode($hotelList['require_text2'],true);
			
	
		///JSON LIST
		$hotelname_list = printJsonList($hotelList['hotelname']);
//		$air_scity_list = printJsonList($hotelList['air_scity']);
//		$air_fcity_list = printJsonList($hotelList['air_fcity']);
		///
?>
<style type="text/css">
	.eisti_form_head h4{margin-bottom:15px}
</style>
	<div class="eisti_forms_in" >
		<div class="acodianForTypes_title">
			<div class="acodianForTypes_li0"> <h4><?php echo $member_wname[0]?></h4> 외 출장자 :
			<?php
			//멤버 리스트
				for($m = 1; $m < count($member_wname); $m++){
					echo $member_wname[$m];
					if(count($member_wname) - $m != 1){
						echo ",";
					}
				}//멤버 리스트 Fin
			?>
			<strong class="navy_color"> 총 <?php echo count($member_wname)?>명</strong></div>
			<div class="acodianForTypes_li1"><p>Type: <span><?php echo $type_i?></span></p></div>
			<div class="acodianForTypes_li2"><a href="#none"><img src="img/hm/arrow_up.png" alt="" /></a></div>
		</div>
		<div class="acodianForTypes_title_sibling">
			<div class="eisti_form0">
				<div class="eisti_form_head">
				
					<h4>견적서</h4>
					<!--
					<a href="#none"><img src="/_innermall/img/hm/print.png" alt="print" /></a>
					-->
				</div>
				<div class="eisti_form_body">
					<div class="eisti_form_body_in">
						<div class="eisti_form_body_in0">
							<h3>출장자 : <span><input type="text" value="<?php echo $member_wname_list?>" readonly/></span></h3>
						</div>
						<table class="eisti_form_body_in1">
							<tr>
								<td class="eisti_form_body_table0">출장기간</td>
								<td class="eisti_form_body_table1">
								<span class="navy_color"><?php echo $city_fdate[0]?> ~ <?php echo $city_sdate[count($city_sdate) - 1]?></span></td>
								<td class="eisti_form_body_table2">출장인원</td>
								<td class="eisti_form_body_table3"><?php echo count($member_wname)?>명</td>
							</tr>
							<tr>
								<td class="eisti_form_body_table0">지역</td>
								<td class="eisti_form_body_table1"><?php echo $city_name_list?></td>
								<td class="eisti_form_body_table2">발행일</td>
								<td class="eisti_form_body_table3"><?php echo Date("Y-m-d")?></td>
							</tr>
						</table>
						<div class="eisti_form_body_in2">
							<h3>견적</h3>
							<table>
								<thead>
									<tr>
										<th>구분</th>
										<th>항공명/호텔명</th>
										<th>단가</th>
										<th>수량</th>
										<th>기간</th>
										<th>합계</th>
										<th>합계(원화)</th>
									</tr>
								</thead>
								<tr>
									<td style="height:20px;border-top:none;padding:0;background-color:#fff;border:none"></td>
								</tr>
								<tbody>

								<?php	
									$p1_no = 0;
									$air_all_fee = 0; //총계
									for($p1 = 0; $p1 < count($airname); $p1++){
										if($p1 == 0){
											$p1_title = "1.항공비";
										}
										else{
											$p1_title = "";
										}
								?>
									<tr>
										<td><span class="navy_color"><?php echo $p1_title?></span></td>
										<td><?php echo $airname[$p1]?></td>
										<td>￦<?php echo number_format($aircost[$p1] + $airtax[$p1] + $agencyfee[$p1])?></td>
										<td><span class="sky2_color"><?php echo count($member_wname)?>인</span></td>
										<td><?php echo $air_sdate[$p1]?> ~ <?php echo $air_fdate[$p1]?></td>
										<td>￦<?php echo number_format(count($member_wname) * ($aircost[$p1] + $airtax[$p1] + $agencyfee[$p1])) ?></td>
										<td>
										<strong>
										￦<?php echo number_format(count($member_wname) * ($aircost[$p1] + $airtax[$p1] + $agencyfee[$p1])) ?>
										</strong></td>					
									</tr>
									
							<?php
									$air_all_fee  +=  count($member_wname) * ($aircost[$p1] + $airtax[$p1] + $agencyfee[$p1]);
								}//p1 Fin
							//항공 소계
							?>
								<tr class="colspan_tr">
										<td colspan="3"><strong>소계</strong></td>
										<td><span class="sky2_color"><?php echo count($member_wname)?>인</span></td>
										<td></td>
										<td>￦<?php echo number_format($air_all_fee)?></td>
										<td><strong>￦<?php echo number_format($air_all_fee)?></strong></td>
								</tr>
							<?php
							//호텔 리스트
								$hotel_all_fee = 0;
								for($p2 =0; $p2 < count($hotelname); $p2++){
										if($p2 == 0){
											$p2_title = "2. 호텔비";
										}
										else{
											$p2_title = "";
										}
							?>

									<tr>
										<td><span class="navy_color"><?php echo $p2_title?></span></td>
										<td><?php echo $hotelname[$p2]?></td>
										<td>￦ <?php echo number_format($hotelprice_all[$p2])?></td>
										<td><span class="sky2_color"><?php echo count($member_wname)?>실</span></td>
										<td><?php echo $city_sdate[$p2]?> ~ <?php echo $city_fdate[$p2]?></td>
										<td>￦<?php echo $hotelprice_all[$p2]?></td>
										<td><strong>￦<?php echo number_format($hotelprice_all[$p2])?></strong></td>
									</tr>
									
								<?php
									$hotel_all_fee += $hotelprice_all[$p2];
								}///p2 Fin
								?>
								<tr class="colspan_tr">
										<td colspan="3"><strong>소계</strong></td>
										<td><span class="sky2_color"><?php echo count($member_wname)?>실</span></td>
										<td></td>
										<td>￦<?php echo number_format($hotel_all_fee)?></td>
										<td><strong>￦<?php echo number_format($hotel_all_fee)?></strong></td>
								</tr>
								</tbody>
							</table>
							<div class="esti_total">
								<p><strong>총계</strong></p>
								<p><strong class="red_color">￦<?php echo number_format($air_all_fee+$hotel_all_fee)?></strong></p>
							</div>
							<div class="esti_cua">
								<div class="esti_cua0">
									<h3>주의사항</h3>
									<div>
										<strong>※ 상기견적은 여행사 알선수수료 부분에 대하여 VAT 포함입니다.</strong><br/>
										(부가가치세는 국세청 부가가치세법 기본통칙17-0-10 [여행업의 매입세액 공제 범위]에 의해 알선수수료에 대해서만 부과한다.)<br/>
										<strong>※ 요금은 발행일 실시간 조회 가격으로, 예약 확정 날짜에 따라 변경됩니다.</strong><br/>
										※ 환율은 발행일 기준으로서, 예약 확정 및 결제일 기준에 따라 변경됩니다.
									</div>
								</div>
								<div class="esti_cua1">
									<div class="esti_cua1_0">
										<h3>TW코리아 담당자</h3>
										<table>
											<tr>
												<td>NAME</td>
												<td>석혜지 대리</td>
												<td class="back_color_gray">E-mail</td>
												<td>shgmuse@twkorea.net</td>
												<!--
												<td class="back_color_gray">DEPART</td>
												<td>시너지사업 본부</td>
												-->
											</tr>
											<tr>
												<td>TEL</td>
												<td>02-511-5457</td>
												<td class="back_color_gray">PH</td>
												<td>010-6235-0393</td>
											</tr>

										</table>
									</div>
								</div>
							</div>
						</div>
						<h2 class="TW_logo">
							(주) TW KOREA
						</h2>
					</div>
					
				</div>
			</div>
<!-- 		1. 항공 견적서	 -->

			<div class="eisti_form0">
				<div class="eisti_form_head">
					<h4>항공 견적서</h4>
				</div>
		
				<div class="eisti_form_body">
					<div class="eisti_form_body_in">
						<div class="eisti_form_body_in0">
							<h3>항공 정보 : <span><input type="text" value="<?php echo $airname_list?>" readonly/></span></h3>
						</div>
						<table class="eisti_form_body_in1">
							<tr>
								<td class="eisti_form_body_table0">출장기간</td>
								<td class="eisti_form_body_table1"><span class="navy_color"><?php echo $trip_first_day?>~<?php echo $trip_last_day?></span></td>
								<td class="eisti_form_body_table2">출장인원</td>
								<td class="eisti_form_body_table3"><?php echo count($member_wname)?>명</td>
							</tr>
							<tr>
								<td class="eisti_form_body_table0">지역</td>
								<td class="eisti_form_body_table1"><?php echo $city_name_list?></td>
								<td class="eisti_form_body_table2">발행일</td>
								<td class="eisti_form_body_table3"><?php echo Date("Y-m-d")?></td>
							</tr>
							<!--
							<tr>
								<td class="eisti_form_body_table0">지역</td>
								<td class="eisti_form_body_table1"><?php echo $air_fcity_arr[0]?></td>
								<td class="eisti_form_body_table2">주소</td>
								<td class="eisti_form_body_table3">서울시 강남구 도산대로 157 12층</td>
							</tr>
							<tr>
								<td class="eisti_form_body_table0">담당</td>
								<td class="eisti_form_body_table1">석혜지 (02-511-5457)</td>
								<td class="eisti_form_body_table2">발행일</td>
								<td class="eisti_form_body_table3"><?php echo Date("Y-m-d")?></td>
							</tr>
							-->
						</table>
						<div class="eisti_form_body_in0_1">
							<h3>예약자 정보</h3>
						</div>
						<table class="eisti_form_body_in1">
							<tr>
								<td class="eisti_form_body_table0">인원</td>
								<td class="eisti_form_body_table1"><span class="navy_color"><?php echo count($member_wname)?>명</span></td>
								<td class="eisti_form_body_table2">이름</td>
								<td class="eisti_form_body_table3"><?php echo $member_wname_list?></td>
							</tr>
						</table>
						<div class="eisti_form_body_in2 eisti_form_body_in2_1">
							<h3>견적</h3>
							<table>
								<thead>
									<tr>
										<th width="10%">항공사</th>
										<th width="10%">날짜</th>
										<th width="10%">항공편명</th>
										<th width="10%">출국공항</th>
										<th width="10%">도착공항</th>
										<th width="10%">출국시간</th>
										<th width="10%">도착시간</th>
										<th width="10%">소요시간</th>
										<th>비고</th>
									</tr>
								</thead>
								<tr>
									<td style="height:20px;border-top:none;padding:0;background-color:#fff;border:none"></td>
								</tr>
								<tbody>
								<?php
									for($k = 0; $k < count($airname); $k++){	
								?>
									<tr>
										<td class="no_backs"><strong><?php echo $airname[$k]?></strong></td>
										<td class="no_backs"><?php echo $air_sdate[$k]?></td>
										<td><strong class="navy_color"><?php echo $air_sname[$k]?></strong></td>
										<td><?php echo $air_scity[$k]?></td>
										<td><?php echo $air_fcity[$k]?></td>
										<td><?php echo $airname[$k]?></td>
										<td><?php echo $air_stime[$k]?></td>
										<td><?php echo $air_ftime[$k]?></td>
										<td><?php echo $air_require_text[$k]?></td>
										
									</tr>
								<?php
							}//airname Fin	
								?>
								</tbody>
							</table>
						</div>
						<div class="eisti_form_body_in2 eisti_form_body_in2_1">
							<table>
								<thead>
									<tr>
										<th width="10%">항공사</th>
										<th width="10%">좌석등급</th>
										<th width="11%">항공요금</th>
										<th width="11%">TAX</th>
										<th width="11%">발권대행<br/>수수료</th>
										<th width="11%">1인요금</th>
										<th width="5%">인원</th>
										<th width="11%">합계</th>
										<th width="11%">소계</th>
										<th>비고</th>	
									</tr>
								</thead>
								<tr>
									<td style="height:20px;border-top:none;padding:0;background-color:#fff;border:none"></td>
								</tr>
								<tbody>
								<?php
									$sum_air_cost = 0;
									for($k = 0; $k < count($airname); $k++){	
										if($airname[$k] != "" && $airname[$k] != null){
//											$aircost = json_decode($airList['aircost'],true);
//		$airtax = json_decode($airList['airtax'],true);
//		$agencyfee = json_decode($airList['agencyfee'],true);
								?>
									<tr>
										<td class="no_backs"><strong><?php echo $airname[$k]?></strong></td>
										<td><?php echo $air_rank[$k]?></td>
										<td>￦<?php echo number_format($aircost[$k])?></td>
										<td>￦<?php echo number_format($airtax[$k])?></td>
										<td>￦<?php echo number_format($agencyfee[$k])?></td>
										<td>￦<?php echo number_format($aircost[$k] + $airtax[$k] + $agencyfee[$k])?></td>
										<td><?php echo count($member_wname)?>명</td>
										<td>￦<?php echo number_format(count($member_wname) * ($aircost[$k] + $airtax[$k] + $agencyfee[$k]))?></td>
										<td>￦<?php echo number_format(count($member_wname) * ($aircost[$k] + $airtax[$k] + $agencyfee[$k]))?></td>
										<td></td>
									</tr>
								<?php
										//총계 연산
											$sum_air_cost += count($member_wname) * ($aircost[$k] + $airtax[$k] + $agencyfee[$k]);
											}//If Not null
										}//airname Fin	
								?>
									<tr class="eisti_form_body_in2_2_color">
										<td colspan="2"><strong><?php echo $a['airname']?> 요금조건</strong></td>
										<td colspan="8"><?php echo $airList['require_text']?></td>
									</tr>
								</tbody>
							</table>
							<div class="esti_total">
								<p><strong>총계</strong></p>
								<p><strong class="red_color">￦<?php echo number_format($sum_air_cost)?></strong></p>
							</div>
							<div class="esti_cua">
								<div class="esti_cua0">
									<h3>주의사항</h3>
									<div>
										<strong>※ 상기견적은 여행사 알선수수료 부분에 대하여 VAT 포함입니다.</strong><br/>
										(부가가치세는 국세청 부가가치세법 기본통칙17-0-10 [여행업의 매입세액 공제 범위]에 의해 알선수수료에 대해서만 부과한다.)<br/>
										<strong>※ 요금은 발행일 실시간 조회 가격으로, 예약 확정 날짜에 따라 변경됩니다.</strong><br/>
										※ 환율은 발행일 기준으로서, 예약 확정 및 결제일 기준에 따라 변경됩니다.
									</div>
								</div>
							</div>
						</div>
						<h2 class="TW_logo">
							(주) TW KOREA
						</h2>
					</div>
					
				</div>
	
			</div>
<!--  1.항공견적서 종료 -->
<!--  2.호텔견적서 시작  -->

			<div class="eisti_form0">
				<div class="eisti_form_head">
					<h4>호텔 견적서</h4>
					<!--
					<a href="#none"><img src="/_innermall/img/hm/print.png" alt="print" /></a>
					-->
				</div>

				<div class="eisti_form_body">
					<div class="eisti_form_body_in">
						<div class="eisti_form_body_in0">
							<h3>호텔명 : <span><input type="text" value="<?php echo $hotelname_list?> " readonly/></span></h3>
						</div>
						<table class="eisti_form_body_in1">
							<tr>
								<td class="eisti_form_body_table0">출장기간</td>
								<td class="eisti_form_body_table1"><span class="navy_color"><?php echo $trip_first_day?>~<?php echo $trip_last_day?></span></td>
								<td class="eisti_form_body_table2">출장인원</td>
								<td class="eisti_form_body_table3"><?php echo count($member_wname)?>명</td>
							</tr>
							<tr>
								<td class="eisti_form_body_table0">지역</td>
								<td class="eisti_form_body_table1"><?php echo $city_name_list?></td>
								<td class="eisti_form_body_table2">발행일</td>
								<td class="eisti_form_body_table3"><?php echo Date("Y-m-d")?></td>
							</tr>
							<!--
							<tr>
								<td class="eisti_form_body_table0">지역</td>
								<td class="eisti_form_body_table1"><?php echo $air_fcity_arr[0]?></td>
								<td class="eisti_form_body_table2">주소</td>
								<td class="eisti_form_body_table3">서울시 강남구 도산대로 157 12층</td>
							</tr>
							<tr>
								<td class="eisti_form_body_table0">담당</td>
								<td class="eisti_form_body_table1">석혜지 (02-511-5457)</td>
								<td class="eisti_form_body_table2">발행일</td>
								<td class="eisti_form_body_table3"><?php echo Date("Y-m-d")?></td>
							</tr>
							-->
						</table>
						<div class="eisti_form_body_in0_1">
							<h3>예약자 정보</h3>
						</div>
						<table class="eisti_form_body_in1">
							<tr>
								<td class="eisti_form_body_table0">인원</td>
								<td class="eisti_form_body_table1"><span class="navy_color"><?php echo count($member_wname)?>명</span></td>
								<td class="eisti_form_body_table2">이름</td>
								<td class="eisti_form_body_table3"><?php echo $member_wname_list?></td>
							</tr>
						</table>
						<div class="eisti_form_body_in2 eisti_form_body_in2_1 eisti_form_body_in2_color">
							<h3>견적</h3>
							<table>
								<thead>
									<tr>
										<th width="3%">순서</th>
<!-- 										<th width="6%">성명</th> -->
										<th width="10%">날짜</th>
										<th width="10%">지역</th>
										<th width="10%">호텔명</th>
										<th width="12%">객실타입</th>
										<th width="9%">1박요금</th>
										<th width="5%">숙박일</th>
										<th width="11%">합계</th>
										<th width="11%">합계(원화)</th>
									</tr>
								</thead>
								<tr>
									<td style="height:20px;border-top:none;padding:0;background-color:#fff;border:none"></td>
								</tr>
								<tbody>
								<?php
									////호텔 조회하기
									$sum_hotel_cost = 0;
									for($h = 0; $h < count($hotelname); $h++){
										$h_add = $h+1;

//												$hotelname = json_decode($hotelList['hotelname'],true);
//		$cityname = json_decode($hotelList['cityname'],true);
//		$city_sdate = json_decode($hotelList['city_sdate'],true);
//		$city_fdate = json_decode($hotelList['city_fdate'],true);
//		$room_type = json_decode($hotelList['room_type'],true);
//		$breakfast = json_decode($hotelList['breakfast'],true);
//		$hotelurl = json_decode($hotelList['hotelurl'],true);
//		$hotelprice = json_decode($hotelList['hotelprice'],true);
//		$hotelprice_all = json_decode($hotelList['hotelprice_all'],true);
//		$hotelprice_krw = json_decode($hotelList['hotelprice_krw'],true);
//		$hotelprice_all_krw = json_decode($hotelList['hotelprice_all_krw'],true);
//		$period = json_decode($hotelList['period'],true);
								?>
									<tr>
							
										<td rowspan="4" class="no_backs"><strong><?php echo $h_add?></strong></td>
<!-- 										<td rowspan="4" class="no_backs"><?php echo $member_wname_list?> </td> -->
										<td rowspan="4" class="no_backs"><?php echo $city_sdate[$h]?><br/>~<br/><?php echo $city_fdate[$h]?></td>
										<td rowspan="4" class="no_backs"><?php echo $cityname[$h]?></td>
								
										<td><strong><?php echo $hotelname[$h]?></strong></td>
										<td><?php echo $room_type[$h]?> <p class="bob_include"><?php echo $breakfast[$h]?></p></td>
										<td><?php echo $hotelprice_krw[$h]?></td>
										<td><?php echo $period[$h]?></td>
										<td><?php echo $hotelprice_all_krw[$h]?></td>
										<td>￦ <?php echo number_format($hotelprice_all[$h])?></td>
	
									</tr>
									<tr>
										<td><strong>URL</strong></td>
										<td colspan="5" class="text_align_left"><div class="paddings paddings0" style="font-size:12px;display:inline-block;"><?php echo $hotelurl[$h]?></div></td>
									</tr>
									<tr>
										<td><strong>호텔정보</strong></td>
										<td colspan="7" class="text_align_left">
											<div class="paddings"><?php echo $require_text_h2[$h]?>
											</div>
										</td>
									</tr>
									<tr>
										<td><strong>비고</strong></td>
										<td colspan="7" class="text_align_left"><div class="paddings"><?php echo $require_text_h1[$h]?></div></td>
									</tr>
								<?php
									$sum_hotel_cost += $hotelprice_all[$h];
						}//호텔 조회 리스트
								?>
								</tbody>
							</table>
							<div class="esti_total">
								<p><strong>총계</strong></p>
								<p><strong class="red_color">￦ <?php echo number_format($sum_hotel_cost)?></strong></p>
							</div>
							<div class="esti_cua">
								<div class="esti_cua0">
									<h3>주의사항</h3>
									<div>
										<strong>※ 상기견적은 여행사 알선수수료 부분에 대하여 VAT 포함입니다.</strong><br/>
										(부가가치세는 국세청 부가가치세법 기본통칙17-0-10 [여행업의 매입세액 공제 범위]에 의해 알선수수료에 대해서만 부과한다.)<br/>
										<strong>※ 요금은 발행일 실시간 조회 가격으로, 예약 확정 날짜에 따라 변경됩니다.</strong><br/>
										※ 환율은 발행일 기준으로서, 예약 확정 및 결제일 기준에 따라 변경됩니다.
									</div>
								</div>
							</div>
						</div>
						<h2 class="TW_logo">
							(주) TW KOREA
						</h2>
					</div>
					
				</div>

			</div>
<!-- 2.호텔 견적서 종료  -->
		</div>
		
	</div>
<?
	}//Type 개수 Fin
?>
	<div>
	</div>
</div>
<?php include "hm_foot.php"; ?>
<?php
}//작성권한 FIn
else{
	echo "<script>location.href='hm_index.php';</script>";
}
?>
<script type="text/javascript">
	$(function(){
		$(".acodianForTypes_title_sibling").hide();

	})
</script>