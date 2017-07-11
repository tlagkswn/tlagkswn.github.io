<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/ckSessionStand.php"?>
<?php include_once "eventadm/command/hm_filter.php" ?>
<?php include_once "eventadm/command/hmload.php" ?>
<?php include_once "eventadm/hmapi/getMyHm.php" //자기 정보 hm api 가져오기?>
<?php include_once "eventadm/hm_apply_header.php"?>
<?php include "hm_head2.php"; ?>
<?php
//작성권한
if(($s_adlevel == 1 || $s_adlevel == 4) && $s_wid != null){ 
?>
<!-- //http://twkmall.co.kr/_innermall/eventadm/hmapi/hmuse_list.php -->
<script type="text/javascript"> 
function show_member_hm(idx)
{
	window.open('/_innermall/eventadm/hmapi/hmlist_apply.php?idx='+idx ,'Write Package','width=860, height=620, left=200, top=200');
}
</script>

<div id="estimate_form">
	<h4 class="hm_title">출장 견적서 요청서</h4>
	<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
	<form method="post" name="form_trip" action="eventadm/command/hm_trip_upload_data.php" class="estimate_form_wrap">
		<input type="hidden" name="proc" value="<?php echo $proc?>">
		<input type="hidden" name="referer" value="trip" />
 		<input type="hidden" id="chk_box_01" name="require_trans1" value="0"/> 
 		<input type="hidden" id="chk_box_02" name="require_trans2" value="0"/> 
		<input type="hidden" id="chk_box_03" name="require_trans3" value="0"/> 
 		<input type="hidden" id="chk_box_04" name="require_trans4" value="0"/> 
		<input type="hidden" id="chk_box_privacy" value="0"/>
		<input type="hidden" id="nation" name="nation" value="">

		<input type="hidden" id="expectedCost_hidden" value=""/>
		<div class="estimate_form_wrap_in">
			 <div class="estimate_applicant">
				<div class="estimate_applicant_head">
					<div>
						<p class="estimate_title_en">applicant</p>
						<p class="estimate_title_ko">신청자</p>
					</div>
				</div>
				<div class="estimate_applicant_body">
					<div class="estimate_applicant_body0 estimate_applicant_comm">
						<p><label for="user_name">한글명</label> <input type="text" name="wname" placeholder="성명" required id="user_name"/></p>
						<p><label for="user_email">이메일</label> <input type="email" name="wmail" maxlength="30" placeholder="E-mail" required id="user_email"/></p>
					</div>
					<div class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm2">
						<p><label for="user_name">영문명</label> <input type="text" name="wname_eng" placeholder="Name" required id="user_name"/></p>
						<p><label for="user_email">성별</label>
							<select name="wgender" id="">
								<option value="0">성별</option>
								<option value="남자">남자</option>
								<option value="여자">여자</option>
							</select>
						</p>
					</div>
					<div class="estimate_applicant_body1 estimate_applicant_comm">
						<label for="">휴대폰번호</label>
						<p class="estimate_celphone0">
							<select name="wphone1" id="">
								<option value="010">010</option>
								<option value="011">011</option>
								<option value="016">016</option>
							</select>
						</p class="estimate_celphone1">
						<p><input type="tel" name="wphone2" id="tel" maxlength="8" required placeholder="번호만 입력하세요." /></p>
					</div>
				</div>
			 </div>

			<div class="estimate_applicant">
				<div class="estimate_applicant_head estimate_country">
					<div>
						<p class="estimate_title_en">schedule</p>
						<p class="estimate_title_ko">스케줄</p>
					</div>
				</div>
				<div class="estimate_applicant_totall"><!--################################################################-->
					<div class="estimate_applicant_totall_in_W">
						<div class="estimate_applicant_totall_in">
							<div class="estimate_schedule_body_wrap0">
								<div>
									<p class="main_type_num">Type <span class="red_color">1</span></p>
									<p> 
										<select name="" class="types_for" onchange="type_change">
											<option value="0" title="0">카피할 type 선택</option> 
										</select> 
									</p>
									<a href="#none" class="del_she">삭제</a>
								</div>
							</div>
							
							<div class="estimate_schedule_body_wrap">
								<div class="estimate_applicant_body estimate_country_body estimate_schedule_body2">
									<div class="estimate_applicant_add_citis">
										<span>도시</span>
										<a href="#none" class="add_cities">+ 도시 추가하기</a>
									</div>
									<ul class="estimate_applicant_comm_wrap">
										<li class="estimate_applicant_body0 estimate_applicant_comm dl_0">
											<dl>
												<dd class="city_name estimate_applicant_comm0"><input type="text" name="city_name[]" required class="city_wname cityna_0" placeholder="도시명" readonly></dd>
												<dd class="estimate_applicant_comm1"><input type="text" required name="city_sdate[]" placeholder="도착일" class="date_picker cityna_1"/></dd>
												<dd class="estimate_applicant_comm2"><input type="text" required name="city_fdate[]" placeholder="도착시간대" class="cityna_2"/></dd>
												<dd class="estimate_applicant_comm3">
													<input type="text" required name="city_sdate[]" placeholder="출발일" class="date_picker cityna_1"/>	
												</dd>
												<dd class="estimate_applicant_comm4">
													<input type="text" name="city_name[]" required class="cityna_0" placeholder="ex) 12시경" >			
												</dd>
												<dd class="estimate_applicant_comm5"><a href="#none" class="x_circle"><img src="img/hm/x_circle.jpg" alt="x_circle" /></a></dd>
											</dl>
										</li>
									</ul>
								</div>
								<div class="estimate_applicant_body estimate_info_body">
									<div class="estimate_applicant_add_citis">
										<span>출장자</span>
										<a href="#none" class="add_person">+ 출장자 추가하기</a>
									</div>
									<ul class="estimate_applicant_add">
										<li class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm3">
											<dl>
												<dt>출장자 <span>1</span></dt>
												<dd class="estimate_applicant_comm0">
													<p><input type="text" name="member_company[]" placeholder="계열사"/></p>
													<p><input type="text" name="member_rank[]" placeholder="직급"/></p>
													<p>
														<select name="member_airrank[]" id="">
															<option value="0">항공등급</option>
															<option value="이코노미">이코노미</option>
															<option value="비즈니스">비즈니스</option>
															<option value="1등급">1등급</option>
														</select>
													</p>
												</dd>
												<dd class="estimate_applicant_comm1">
													<p><input type="text" name="member_depart[]" placeholder="부서"/></p>
													<p>
														<select name="member_wgender[]" id="">
															<option value="0">성별</option>
															<option value="남자">남자</option>
															<option value="여자">여자</option>
														</select>
													</p>
												</dd>
												<dd class="estimate_applicant_comm2">
													<p><input type="text" name="member_wname[]" placeholder="한글명"/></p>
													<p><input type="text" name="member_wname_eng[]" placeholder="영문명"/></p>
												</dd>
												<dd class="estimate_applicant_comm3">
													<p><input type="text" name="member_wphone[]" placeholder="핸드폰번호"/></p>
													<p><input type="text" name="member_wmail[]" placeholder="이메일"/></p>
												</dd>
												<dd style="height:85px;" class="estimate_applicant_comm4"><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
											</dl>
										</li>			
									</ul>
								</div>
							</div>
						</div>
					</div>	
					<div class="register_area">
						<a href="#none" class="add_sche2"><img src="img/mall/register_icon.png" alt="register_icon" /> 일정 추가 하기</a>
					</div>
					
				</div>	
			</div>
			

			<div class="estimate_applicant">
				<div class="estimate_applicant_head estimate_requirement">
					<div>
						<p class="estimate_title_en">requirement</p>
						<p class="estimate_title_ko">요청사항</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_requirement_body">
					<div class="estimate_requirement_select">
						<ul>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_01" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_01" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_01.jpg" alt="icon_01" />	
							</li>	
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_02" class='es_chk_box1 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_02" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_02.jpg" alt="icon_02" />	
							</li>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_03" class='es_chk_box2 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_03" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_03.jpg" alt="icon_03" />	
							</li>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_04" class='es_chk_box3 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_04" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_04.jpg" alt="icon_04" />	
							</li>
						</ul>
					</div>
					<!--
					<div class="ask_select">
						<ul>
							<li>
								<select name="" id="">
									<option value="0">항공사</option>
									<option value="">국적사</option>	
									<option value="">외항사</option>	
								</select>
							</li>
							<li>
								<select name="" id="">
									<option value="0">경유여부</option>
									<option value="">직항</option>	
									<option value="">경유</option>	
								</select>
							</li>
							<li>
								<select name="" id="">
									<option value="0">항공등급</option>
									<option value="">이코노미</option>	
									<option value="">비즈니스</option>
									<option value="">1등석</option>
								</select>
							</li>
							<li>
								<select name="" id="">
									<option value="0">식사</option>
									<option value="">조식포함</option>
									<option value="">불포함</option>
								</select>
							</li>
							<li>
								<select name="" id="">
									<option value="0">시간</option>
									<option value="">오전</option>
									<option value="">오후</option>
									<option value="">상관없음</option>
								</select>
							</li>
						</ul>
					</div>
					-->
					<div class="requirement_textarea">
						<div>
							<p>
								<textarea name="require_text" class="requirement_textarea">
									
								</textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="search_cities_wrap">
			<div class="search_cities">
				<h3>도시검색 <a href="#none"><img src="img/hm/x_box2.png" alt="x_box2" /></a></h3>
				<div class="search_cities_in">
					
					<div class="search_cities_searchArea">
						<p>도시검색</p>
						<p><input type="text" placeholder="도시를 입력하세요." /></p>
						<p><a href="#">검색</a></p>
					</div>
					<div class="search_cities_result">
						<ul class="search_cities_result_head">
							<li>
								도시(한글명)
							</li>
							<li>
								도시(영문명)
							</li>
							<li>
								국가명
							</li>
						</ul>
						<ul class="search_cities_result_body">
						</ul>
					</div>
					<div class="search_cities_chk">
						<h4>
							주요도시
							<div class="search_cities_chk_btn">
								<a href="#none" class="sun0">나라별</a>
								<a href="#none" class="sun1">도시별</a>
							</div>	
						</h4>
						<div class="search_cities_chk0">
							<ul>
							<?php
								$array = listContinent($conn);
								foreach($array as $n){
							?>
									<li><img src="img/hm/chk_box01.png" alt="city_chk_box01" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box01" class="city_chk_box_on"/> <?php echo $n['continent']?></li>
							<?php
							}
							?>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box01" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box01" class="city_chk_box_on"/> 직접입력</li>
							</ul>
						</div>
						<div class="search_cities_chk1">
							<img src="img/hm/right_arrow3.jpg" alt="right_arrow3" />
						</div>
						<div class="search_cities_chk2">
							<ul class="search_cities_chk2_in">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="privacy">
			<h3 class="hm_title">개인정보 수집 및 이용동의 (필수)</h3>
			<p class="privacy_explain" >한미 출장 시스템에서는 서비스 이용을 위한 최소한의 개인정보를 수집합니다.</p>
			<p class="privacy_textarea">
				<textarea name="" id="" readonly>
				
				</textarea>
			</p>
			<p class="privacy_chk">
				<img src="img/hm/chk_box.png" alt="chk_box_privacy" class="chk_box_privacy0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_privacy" class="chk_box_privacy1"/> 개인정보 수집, 이용에 동의합니다.
			</p>
			<p class="privacy_submit"><a href="javascript:is_upload();" class="btn_type1 ask_btn0">출장 견적서 요청하기</a>
			<a href="javascript:is_upload();" class="btn_type1 ask_btn1">출장 견적서 작성하기</a></p>
		</div>
		</form>
		<p class="clear_70"></p>

		<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
		
		<div id="estimate_add_wrap"> 
		<div class="acodianForTypes">
			<ul>
				<li>
					<div class="acodianForTypes_title">
						<div class="acodianForTypes_li0"><h4>김길동</h4> 외 출장자 : 홍길동1, 홍길동2, 홍길동3 <strong class="navy_color">(완료)</strong></div>
						<div class="acodianForTypes_li1"><p>Type: <span>1</span></p></div>
						<div class="acodianForTypes_li2"><a href="#none"><img src="img/hm/arrow_up.png" alt="" /></a></div>
					</div>
					<div class="esti_right_head_mainSwrap">
						<div class="esti_right_head_mainSwrap_in">
							<div class="infoOfEmployee">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">출장자 정보</h4>
								<table>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
								</table>
							</div>
							<div class="esti_right_head">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천항공권</h4>
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
									<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
									<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
								</div>
								<div class="esti_right_body_bott">
									<table class="estimate1Php">
										<tr class="esti_right_table_bott0">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">순서</td>
											<td class="esti_ul2">추천 항공</td>
											<td class="esti_ul3">항공 일정</td>
											<td class="esti_ul4">예상 요금</td>
											<td class="esti_ul5">수정</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="esti_right_head">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천호텔</h4>
								<p class="esti_right_head0">ALL <span>(4)</span></p>
								<p class="esti_right_head1"><select name="" id="">
									<option value="0">최신순으로 진열하기</option>
								</select></p>
							</div>
							<div class="esti_right_body estimate2Php">
								<div class="esti_right_body_top">
									<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
									<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
								</div>
								<div class="esti_right_body_bott">
									<table>
									<tr class="esti_right_table_bott0">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">순서</td>
										<td class="esti_ul2">호텔명</td>
										<td class="esti_ul3">상세사이트 이동</td>
										<td class="esti_ul4">박수</td>
										<td class="esti_ul5">금액</td>
										<td class="esti_ul6">수정</td>
										
									</tr>
									<tr class="esti_right_table_bott1">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">1</td>
										<td class="esti_ul2">
											<a href="#none">
												<div>
													<p class="type_of_name"><strong>Type1, Type2</strong></p>
													<p><strong>Hotel America</strong></p>
													<p class="name_of_city">(서울)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul3">
											<a href="#none">
												<div>
													<p class="navy_color">호텔정보 보러가기</p>
													<p class="name_of_city">(요금 조건에 따라 금액이 변동될 수 있습니다.)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul4">
											<a href="#none" >
												2일
											</a>
										</td>
										<td class="esti_ul5">
											<a href="#none" style="color:#f25884">
												￦4,875,808
											</a>
										</td>
										<td class="esti_ul6">
											<a href="#none" ><span class="select0">선택하기</span></a>
										</td>
									</tr>
									<tr class="esti_right_table_bott1">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">1</td>
										<td class="esti_ul2">
											<a href="#none">
												<div>
													<p class="type_of_name"><strong>Type1, Type2</strong></p>
													<p><strong>Hotel America</strong></p>
													<p class="name_of_city">(서울)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul3">
											<a href="#none">
												<div>
													<p class="navy_color">호텔정보 보러가기</p>
													<p class="name_of_city">(요금 조건에 따라 금액이 변동될 수 있습니다.)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul4">
											<a href="#none" >
												2일
											</a>
										</td>
										<td class="esti_ul5">
											<a href="#none" style="color:#f25884">
												￦4,875,808
											</a>
										</td>
										<td class="esti_ul6">
											<a href="#none" ><span class="select0">선택하기</span></a>
										</td>
									</tr>
								</table>
								</div>				
							</div>
						</div>
						<div class="expectedCost_result" >
							<ul>
								<li class="expectedCost_result_li0">
									<h4>선택 항공내역</h4>
									<div>
										<span class="rcom_comm">추천1</span>
										<p>
											Type 1. 대한항공 비즈니스 항공권   해당금액  <em>￦ 4,875,808</em>
										</p>
									</div>

									<p class="line_0"></p>
								</li>
								<li class="expectedCost_result_li1">
									<h4>선택 호텔내역</h4>
									<div>
										<span class="rcom_comm">추천1</span>
										<p>
											Type 1. Hotel America / 서울   해당금액  <em>￦ 4,875,808</em>
										</p>
									</div>
									<div>
										<span class="rcom_comm">추천1</span>
										<p>
											Type 1. Hotel America / 서울   해당금액  <em>￦ 4,875,808</em>
										</p>
									</div>
									<div>
										<span class="rcom_comm">추천1</span>
										<p>
											Type 1. Hotel America / 서울   해당금액  <em>￦ 4,875,808</em>
										</p>
									</div>
								</li>
								<li class="expectedCost_result_li2">
									<h4>총금액</h4>
									<em style="font-size:19px;">￦ 4,875,808</em>
								</li>
							</ul>
							<a href="#none">승인하기</a>
						</div>
					</div>
				</li>
				<li>
					<div class="acodianForTypes_title">
						<div class="acodianForTypes_li0"><h4>김길동</h4> 외 출장자 : 홍길동1, 홍길동2, 홍길동3 <strong class="red_color">(미완료)</strong></div>
						<div class="acodianForTypes_li1"><p>Type: <span>1</span></p></div>
						<div class="acodianForTypes_li2"><a href="#none"><img src="img/hm/arrow_up.png" alt="" /></a></div>
					</div>
					<div class="esti_right_head_mainSwrap">
						<div class="esti_right_head_mainSwrap_in">
							<div class="infoOfEmployee">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">출장자 정보</h4>
								<table>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
									<tr>
										<td style="width:15%">
											<strong>김길동</strong>
											<p>Kim Gill Dong</p>
										</td>
										<td style="width:20%">
											삼성카드 영업팅 부장
										</td>
										<td style="width:10%">
											여자
										</td>
										<td style="width:20%" class="infoOfEmployee_td3">
											항공등급 : <span>비즈니스</span>
										</td>
										<td style="width:35%">
											<strong>핸드폰번호 : 010-000-0000</strong>
											<p>이메일주소 : 0000@naver.com</p>
										</td>
									</tr>
								</table>
							</div>
							<div class="esti_right_head">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천항공권</h4>
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
									<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
									<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
								</div>
								<div class="esti_right_body_bott">
									<table class="estimate1Php">
										<tr class="esti_right_table_bott0">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">순서</td>
											<td class="esti_ul2">추천 항공</td>
											<td class="esti_ul3">항공 일정</td>
											<td class="esti_ul4">예상 요금</td>
											<td class="esti_ul5">수정</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
										<tr class="esti_right_table_bott1">
											<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
											<td class="esti_ul1">1</td>
											<td class="esti_ul2">
												<a href="#none">
													<div>
														<h4>Type1, Type2</h4>
														<p class="esti_ul2_center"><strong>아시아나 비즈니스 항공권</strong></p>
														<p class="charging_condition">(수화물은 10kg까지만 무료 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul3">
												<a href="#none">
													<div>
														<p><strong class="cities_color">인천 - 파리행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">파리 - 뉴욕행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
													<div>
														<p><strong class="cities_color">뉴욕 - 시드니행</strong> <span class="navy_color">(편명 AF5093)</span></p>
														<p><strong>출발</strong> : 2017-03-01 / 14:00 </p>
														<p><strong>도착</strong> : 2017-03-03 / 18:30</p>
														<p><strong>총소요시간</strong> : <strong class="red_color">15</strong> (대기시간포함)</p>
														<p class="note">(tax가 포함되지 않은 가격 입니다.)</p>
													</div>
												</a>
											</td>
											<td class="esti_ul4">
												￦4,875,808
											</td>
											<td class="esti_ul5">
												<a href="#none" ><span class="select0">선택하기</span></a>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div class="esti_right_head">
								<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천호텔</h4>
								<p class="esti_right_head0">ALL <span>(4)</span></p>
								<p class="esti_right_head1"><select name="" id="">
									<option value="0">최신순으로 진열하기</option>
								</select></p>
							</div>
							<div class="esti_right_body estimate2Php">
								<div class="esti_right_body_top">
									<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
									<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
								</div>
								<div class="esti_right_body_bott">
									<table>
									<tr class="esti_right_table_bott0">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">순서</td>
										<td class="esti_ul2">호텔명</td>
										<td class="esti_ul3">상세사이트 이동</td>
										<td class="esti_ul4">박수</td>
										<td class="esti_ul5">금액</td>
										<td class="esti_ul6">수정</td>
										
									</tr>
									<tr class="esti_right_table_bott1">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">1</td>
										<td class="esti_ul2">
											<a href="#none">
												<div>
													<p class="type_of_name"><strong>Type1, Type2</strong></p>
													<p><strong>Hotel America</strong></p>
													<p class="name_of_city">(서울)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul3">
											<a href="#none">
												<div>
													<p class="navy_color">호텔정보 보러가기</p>
													<p class="name_of_city">(요금 조건에 따라 금액이 변동될 수 있습니다.)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul4">
											<a href="#none" >
												2일
											</a>
										</td>
										<td class="esti_ul5">
											<a href="#none" style="color:#f25884">
												￦4,875,808
											</a>
										</td>
										<td class="esti_ul6">
											<a href="#none" ><span class="select0">선택하기</span></a>
										</td>
									</tr>
									<tr class="esti_right_table_bott1">
										<td class="esti_ul0"><a href="#none"><img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/></a></td>
										<td class="esti_ul1">1</td>
										<td class="esti_ul2">
											<a href="#none">
												<div>
													<p class="type_of_name"><strong>Type1, Type2</strong></p>
													<p><strong>Hotel America</strong></p>
													<p class="name_of_city">(서울)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul3">
											<a href="#none">
												<div>
													<p class="navy_color">호텔정보 보러가기</p>
													<p class="name_of_city">(요금 조건에 따라 금액이 변동될 수 있습니다.)</p>
												</div>
											</a>
										</td>
										<td class="esti_ul4">
											<a href="#none" >
												2일
											</a>
										</td>
										<td class="esti_ul5">
											<a href="#none" style="color:#f25884">
												￦4,875,808
											</a>
										</td>
										<td class="esti_ul6">
											<a href="#none" ><span class="select0">선택하기</span></a>
										</td>
									</tr>
								</table>
								</div>				
							</div>
						</div>
						<div class="expectedCost_result" >
							<ul>
								<li class="expectedCost_result_li0">
									<h4>선택 항공내역</h4>
									<div>
										<span class="rcom_comm"></span>
										<p>
											선택 항공 내역이 없습니다.<em></em>
										</p>
									</div>
									<p class="line_0"></p>
								</li>
								<li class="expectedCost_result_li1">
									<h4>선택 호텔내역</h4>
									<div>
										<span class="rcom_comm"></span>
										<p>
											선택 호텔 내역이 없습니다.<em></em>
										</p>
									</div>
								</li>
								<li class="expectedCost_result_li2">
									<h4>총금액</h4>
									<em style="font-size:19px;"></em>
								</li>
							</ul>
							<a href="#none">승인하기</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
		
			
			
			<div class="estimate" style="margin:80px 0">
				<div class="estimate_0">
					<div class="estimate_0_in">
						<ul class="estimate_0_head">
							<li>구분</li>
							<li>등록일자</li>
							<li>담당자명</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom1">
							<li><p>5차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom2">
							<li><p>4차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom3">
							<li><p>3차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom4">
							<li><p>2차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom5">
							<li><p>1차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>


					</div>
				</div>
				<div class="estimate_1">
					<textarea name="" id="">
  추가 요청란입니다. 이곳에 텍스트를 입력하시면 됩니다.
					</textarea>
					<p>추가요청</p>
				</div>
				<div class="estimate_2">
					<a href="/_innermall/hm_apply.php" style="margin-right:15px;"><img src="img/hm/apply_btn2.png" alt="apply_btn2" /></a>
					<a href="/_innermall/hm_apply.php"><img src="img/hm/apply_btn3.png" alt="apply_btn3" /></a>
				</div>	
			</div>
		</div>
</div>


<?php include "hm_foot.php"; ?>
<?php
}//작성권한 FIn
else{
	echo "<script>location.href='hm_index.php';</script>";
}
?>