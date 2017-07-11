<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/ckSessionStand.php"?>
<?php include_once "eventadm/command/hm_filter.php" ?>
<?php include_once "eventadm/command/hmload.php" ?>
<?php include_once "eventadm/hmapi/getMyHm.php" //자기 정보 hm api 가져오기?>
<?php include_once "eventadm/hm_apply_header.php"?>
<?php include "hm_head.php"; ?>
<?php
//작성권한
if(($s_adlevel ==  1 || $s_adlevel == 4) && $s_wid != null){ 

?>

<!-- //http://twkmall.co.kr/_innermall/eventadm/hmapi/hmuse_list.php -->

<style type="text/css">
	input[type=button]{text-indent:0;cursor:pointer;}
	
</style>
<div id="estimate_form">
	<h4 class="hm_title">출장 견적서 요청서</h4>
	<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
	<form method="post" name="form_trip" action="eventadm/command/hm_trip_upload_data.php" class="estimate_form_wrap">
		<input type="hidden" name="proc" value="w">
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
						<p><label for="user_name">한글명</label> <input type="text" name="wname" value="<?php echo $s_hm_name?>" placeholder="성명" required id="user_name"/></p>
						<p><label for="user_email">이메일</label> <input type="email" name="wmail" value="<?php echo $s_hm_mail?>" maxlength="30" placeholder="E-mail" required id="user_email"/></p>
					</div>
					<!--
					<div class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm2">
						<p><label for="user_name">영문명</label> <input type="text" name="wname_eng" value="<?php echo $s_hm_name_eng?>" placeholder="Name" required id="user_name"/></p>
						<p><label for="user_email">성별</label>
							<select name="wgender" id="">
								<option value="0"  >성별</option>
								<option value="남자" <?php if($s_hm_gender == "1" || $s_hm_gender == "3" || $s_hm_gender == "5" || $s_hm_gender == "7")
								{ echo ' selected '; }?> >남자</option>
								<option value="여자" <?php if($s_hm_gender == "2" || $s_hm_gender == "4" || $s_hm_gender == "6" || $s_hm_gender == "8")
								{ echo ' selected '; }?> >여자</option>
							</select>
						</p>
					</div>
					-->
					<div class="estimate_applicant_body1 estimate_applicant_comm">
						<label for="">휴대폰번호</label>
						
						<?php	if($s_hm_phone != null && $s_hm_phone != ""){ ?>
							<p><input type="tel" name="wphone" id="tel" maxlength="8" value="<?php echo $s_hm_phone?>" required placeholder="번호만 입력하세요." /></p>
						<?php	}else{ ?>
							<p class="estimate_celphone0">
								<select name="wphone1" id="">
									<option value="010">010</option>
									<option value="011">011</option>
									<option value="016">016</option>
								</select>
							</p class="estimate_celphone1">
							<p><input type="tel" name="wphone2" id="tel" maxlength="8" required placeholder="번호만 입력하세요." /></p>
						<?php
							}
						?>
					</div>
					<div class="estimate_applicant_comm estimate_es_chk_box estimate_requirement_select">
						<label for="" class="label_requi">요청사항</label>
						<div class="requ_wrap">
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
							<div class="requirement_textarea">
								<div>
									<p>
										<textarea name="require_text" class="requirement_textarea"></textarea>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			 </div>

			<div class="estimate_applicant estimate_applicant_estimate_country">
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
									<a href="#none" class="del_she">삭제</a>
								</div>
							</div>
							
							<div class="estimate_schedule_body_wrap">
								<div class="estimate_applicant_body estimate_country_body estimate_schedule_body2">
									<div class="estimate_applicant_add_citis">
										<span>도시</span>
										<p class="copy_system"> 
											<select name="" class="types_for" onchange="type_change">
												<option value="0" title="0">카피할 type 선택</option> 
											</select> 
										</p>
										<a href="#none" class="add_cities">+ 도시 추가하기</a>
										
									</div>
									<ul class="estimate_applicant_comm_wrap">
										<li class="estimate_applicant_body0 estimate_applicant_comm dl_0">
											<dl>
												<dd class="city_name estimate_applicant_comm0">
													<input type="text" name="city_name1[]" required class="city_wname cityna_0" placeholder="도시명" readonly>
												</dd>
												<dd class="estimate_applicant_comm1"><input type="text" required name="city_fdate1[]" placeholder="현지도착일" class="date_picker cityna_1"/></dd>
												<dd class="estimate_applicant_comm2"><input type="text" required name="city_ftime1[]" placeholder="도착시간대" class="cityna_2"/></dd>
												<dd class="estimate_applicant_comm3">
													<input type="text" required name="city_sdate1[]" placeholder="현지출발일" class="date_picker cityna_1"/>	
												</dd>
												<dd class="estimate_applicant_comm4">
													<input type="text" name="city_etc1[]" required class="cityna_0" placeholder="출발시간대" >			
												</dd>
												<dd class="estimate_applicant_comm5"><a href="#none" class="x_circle"><img src="img/hm/x_circle.jpg" alt="x_circle" /></a></dd>
											</dl>
										</li>
									</ul>
								</div>
								<div class="estimate_applicant_body estimate_info_body">
									<div class="estimate_applicant_add_citis">
										<span>출장자</span>
										<p class="copy_system"> 
											<select name="member_airrank1" id="">
												<option value="0">항공등급</option>
												<option value="이코노미">이코노미</option>
												<option value="비즈니스">비즈니스</option>
												<option value="1등급">1등급</option>
											</select>
										</p>
										<b style="font-size:12px;color:#777;padding-left:10px">* 등급이다른 출장자는 Type을 추가 해 주세요</b>
										<a href="#none" class="add_person">+ 출장자 추가하기</a>
									</div>
									<ul class="estimate_applicant_add">
										<li class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm3">
											<dl>
												<dt>출장자 <span>1</span></dt>
												<dd class="estimate_applicant_comm0">
													<div style="overflow:hidden;">
														<p><input type="text" name="member_wname1[]" placeholder="한글명" class="inputs_back" style=""/></p>
														<p><input type="button" value="Search" class="show_member_wind inputs_back"/></p>
													</div>
													<div style="overflow:hidden;">
														<p><input type="text" name="member_company1[]" placeholder="계열사" class="inputs_back"/></p>
														<p><input type="text" name="member_depart1[]" placeholder="부서" class="inputs_back"/></p>
														<p><input type="text" name="member_rank1[]" placeholder="직급" class="inputs_back"/></p>
														<p>
															<select name="member_wgender1[]" id="" class="inputs_back">
																<option value="0">성별</option>
																<option value="남자">남자</option>
																<option value="여자">여자</option>
															</select>
														</p>
													</div>
													<div class="div_line"></div>
													<div style="overflow:hidden;" class="en_nameAndOthers">
														<p><input type="text" name="member_wname_eng1[]" placeholder="영문명"/></p>
														<p><input type="text" name="member_wphone1[]" placeholder="핸드폰번호"/></p>
														<p><input type="text" name="member_wmail1[]" placeholder="이메일"/></p>
													</div>
												</dd>
												<dd style="height:85px;position:relative;top:22px" class="estimate_applicant_comm4"><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
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
			
			<!--
			<div class="estimate_applicant">
				<div class="estimate_applicant_head estimate_requirement">
					<div>
						<p class="estimate_title_en">requirement</p>
						<p class="estimate_title_ko">요청사항</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_requirement_body">
					<div class="requirement_textarea">
						<div>
							<p>
								<textarea name="require_text" class="requirement_textarea"></textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
			-->
		</div>
		<div class="search_cities_wrap">
			<div class="search_cities">

				<h3>도시검색 <a href="#none"><img src="img/hm/x_box2.png" alt="x_box2" /></a></h3>
				<div class="search_cities_in">
					<!--
					<div class="search_cities_searchArea">
						<p>도시검색</p>
						<p><input type="text" placeholder="도시를 입력하세요." /></p>
						<p><a href="#none">검색</a></p>
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
					-->
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
							<li><img src="img/hm/chk_box01.png" alt="city_chk_box01" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box01" class="city_chk_box_on"/> 직접입력</li>
							<?php
								$array = listContinent($conn);
								foreach($array as $n){
							?>
									<li><img src="img/hm/chk_box01.png" alt="city_chk_box01" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box01" class="city_chk_box_on"/> <?php echo $n['continent']?></li>
							<?php
							}
							?>
								
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

	[개인정보의 수집 및 이용 목적]

	- 서비스 이용에 따른 본인식별, 가입의사 확인, 연령제한 서비스 이용
	- 고지사항 전달, 불만처리 의사소통 경로 확보, 물품배송 시 정확한 배송지 정보 확보
	- 신규 서비스 등 최신정보 안내 및 개인맞춤서비스 제공을 위한 자료
	- 불량 회원 부정이용 방지 및 비인가 사용 방지
	- 기타 월활한 양질의 서비스 제공 등

	[수집하는 개인정보의 항목]

	- 기본 수집정보 : 성명, 아이디, 비밀번호, 생년월일, 성별, 이메일주소, 주소, 전화번호, 접속IP 정보 등과 
	   서비스 이용과정이나 사업 처리 과정에서 아래와 같은 정보들이 생성되어 수집될 수 있습니다.
	- 수집정보 : 최근접속일, 접속 IP 정보, 쿠키, 구매로그

	[개인정보의 보유 및 이용기간]

	- '한미출장 시스템'은 개인정보 수집 및 이용목적이 달성된 후에는 예외 없이 해당 정보를 지체 없이 파기합니다. 
	
				</textarea>
			</p>
			<p class="privacy_chk">
				<img src="img/hm/chk_box.png" alt="chk_box_privacy" class="chk_box_privacy0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_privacy" class="chk_box_privacy1"/> 개인정보 수집, 이용에 동의합니다.
			</p>
			<p class="privacy_submit"><a href="javascript:is_upload();" class="btn_type1 ask_btn0">출장 견적서 요청하기</a>
			<a href="hm_main.php" class="btn_type1 ask_btn0">돌아가기</a>
			<a href="javascript:is_upload();" class="btn_type1 ask_btn1">출장 견적서 작성하기</a></p>
		</div>
		</form>
		<p class="clear_70"></p>

		<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
<!-- 현재 작성 페이지에서는 보여주지 않음 -->
		<div class="test_none" style="display:none">
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
			<div id="eisti_forms">
				<div class="eisti_form0">
					<div class="eisti_form_head">
						<h4>견적서</h4>
						<a href="#none"><img src="/_innermall/img/hm/print.png" alt="print" /></a>
					</div>
					<div class="eisti_form_body">
						<div class="eisti_form_body_in">
							<div class="eisti_form_body_in0">
								<h3>출장지 : <span><input type="text" value="[삼성자산운용] AI운용본부 정소영님 _ 6월 뮌헨 출장 " readonly/></span></h3>
							</div>
							<table class="eisti_form_body_in1">
								<tr>
									<td class="eisti_form_body_table0">출장기간</td>
									<td class="eisti_form_body_table1"><span class="navy_color">2017-06-07~09</span></td>
									<td class="eisti_form_body_table2">제안업체</td>
									<td class="eisti_form_body_table3">티더블유코리아</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">출장인원</td>
									<td class="eisti_form_body_table1">1명</td>
									<td class="eisti_form_body_table2">사업자번호</td>
									<td class="eisti_form_body_table3">670-86-00462</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">지역</td>
									<td class="eisti_form_body_table1">뮌헨</td>
									<td class="eisti_form_body_table2">주소</td>
									<td class="eisti_form_body_table3">서울시 강남구 도산대로 157 12층</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">발행일</td>
									<td class="eisti_form_body_table1">2017-05-19</td>
									<td class="eisti_form_body_table2">대표자</td>
									<td class="eisti_form_body_table3">심승현</td>
								</tr>
							</table>
							<div class="eisti_form_body_in2">
								<h3>견적</h3>
								<table>
									<thead>
										<tr>
											<th>구분</th>
											<th>구분</th>
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
										<tr>
											<td><span class="navy_color">1.항공비</span></td>
											<td>루프트한자 이코노미</td>
											<td>￦ 2,578,600</td>
											<td><span class="sky2_color">1인</span></td>
											<td>20170709 ~ 20170710</td>
											<td>￦2,578,600</td>
											<td><strong>￦2,578,600</strong></td>
										</tr>
										<tr class="colspan_tr">
											<td colspan="3"><strong>소계</strong></td>
											<td><span class="sky2_color">1인</span></td>
											<td></td>
											<td>￦2,578,600</td>
											<td><strong>￦2,578,600</strong></td>
										</tr>
										<tr>
											<td><span class="navy_color">2. 호텔비</span></td>
											<td>루프트한자 호텔</td>
											<td>￦ 2,578,600</td>
											<td><span class="sky2_color">1실</span></td>
											<td>2박</td>
											<td>￦2,578,600</td>
											<td><strong>￦2,578,600</strong></td>
										</tr>
										<tr class="colspan_tr">
											<td colspan="3"><strong>소계</strong></td>
											<td><span class="sky2_color">1실</span></td>
											<td></td>
											<td>￦2,578,600</td>
											<td><strong>￦2,578,600</strong></td>
										</tr>
									</tbody>
								</table>
								<div class="esti_total">
									<p><strong>총계</strong></p>
									<p><strong class="red_color">￦2,961,820</strong></p>
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
												</tr>
												<tr>
													<td>DEPART</td>
													<td>시너지사업 본부</td>
												</tr>
												<tr>
													<td>TEL</td>
													<td>02-511-5457</td>
												</tr>
												<tr>
													<td>PH</td>
													<td>010-6235-0393</td>
												</tr>
												<tr>
													<td>E-mail</td>
													<td>shgmuse@twkorea.net</td>
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
				<div class="eisti_form0">
					<div class="eisti_form_head">
						<h4>호텔 견적서</h4>
						<a href="#none"><img src="/_innermall/img/hm/print.png" alt="print" /></a>
					</div>
					<div class="eisti_form_body">
						<div class="eisti_form_body_in">
							<div class="eisti_form_body_in0">
								<h3>단체명 : <span><input type="text" value="[삼성자산운용] AI운용본부 정소영님 _ 6월 뮌헨 출장 " readonly/></span></h3>
							</div>
							<table class="eisti_form_body_in1">
								<tr>
									<td class="eisti_form_body_table0">행사기간</td>
									<td class="eisti_form_body_table1"><span class="navy_color">2017-06-07~09</span></td>
									<td class="eisti_form_body_table2">제안업체</td>
									<td class="eisti_form_body_table3">티더블유코리아</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">행사인원</td>
									<td class="eisti_form_body_table1">1명</td>
									<td class="eisti_form_body_table2">사업자번호</td>
									<td class="eisti_form_body_table3">670-86-00462</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">지역</td>
									<td class="eisti_form_body_table1">뮌헨</td>
									<td class="eisti_form_body_table2">주소</td>
									<td class="eisti_form_body_table3">서울시 강남구 도산대로 157 12층</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">담당</td>
									<td class="eisti_form_body_table1">석혜지 (02-511-5457)</td>
									<td class="eisti_form_body_table2">발행일</td>
									<td class="eisti_form_body_table3">2017-05-19</td>
								</tr>
							</table>
							<div class="eisti_form_body_in0_1">
								<h3>예약자 정보</h3>
							</div>
							<table class="eisti_form_body_in1">
								<tr>
									<td class="eisti_form_body_table0">인원</td>
									<td class="eisti_form_body_table1"><span class="navy_color">1명</span></td>
									<td class="eisti_form_body_table2">이름</td>
									<td class="eisti_form_body_table3">홍길동</td>
								</tr>
							</table>
							<div class="eisti_form_body_in2 eisti_form_body_in2_1 eisti_form_body_in2_color">
								<h3>견적</h3>
								<table>
									<thead>
										<tr>
											<th width="3%">순서</th>
											<th width="6%">성명</th>
											<th width="10%">날짜</th>
											<th width="10%">지역</th>
											<th width="10%">호텔명</th>
											<th width="12%">객실타입</th>
											<th width="9%">1박요금</th>
											<th width="5%">객실수</th>
											<th width="5%">숙박일</th>
											<th width="11%">합계</th>
											<th width="11%">합계(원화)</th>
											<th width="">진행상황</th>
										</tr>
									</thead>
									<tr>
										<td style="height:20px;border-top:none;padding:0;background-color:#fff;border:none"></td>
									</tr>
									<tbody>
										<tr>
											<td rowspan="4" class="no_backs"><strong>1</strong></td>
											<td rowspan="4" class="no_backs">석혜지</td>
											<td rowspan="4" class="no_backs">2017-06-07~09</td>
											<td rowspan="4" class="no_backs">바르셀로나</td>
											<td><strong>Eden Wolff Hotel</strong></td>
											<td>Superior Single Room(1 full bed request) <p class="bob_include">조식포함</p></td>
											<td>€ 151.00</td>
											<td>1</td>
											<td>2</td>
											<td>€ 302.00</td>
											<td>￦ 383,220</td>
											<td><a href="#none"	class="bob_include navy_color">예약미진행</a></td>
										</tr>
										<tr>
											<td><strong>URL</strong></td>
											<td colspan="7" class="text_align_left"><div class="paddings">http://me2.do/xYipPVUp</div></td>
										</tr>
										<tr>
											<td><strong>위치정보</strong></td>
											<td colspan="7" class="text_align_left">
												<div class="paddings">뮌헨 중앙역(Munchen Hbf) 맞은편에 위치한 호텔로 약 1km 거리에 마리엔플라츠(Marienplatz)와 프라우엔 교회(Frauenkirche)가 있으며 차량 이동 시, 전시장(Messe Muenchen)까지 약 15분 정도 소요된다.
												</div>
											</td>
										</tr>
										<tr>
											<td><strong>비고</strong></td>
											<td colspan="7" class="text_align_left"><div class="paddings">무료취소기한 : 2017년 06월 01일까지</div></td>
										</tr>
									</tbody>
								</table>
								<div class="esti_total">
									<p><strong>총계</strong></p>
									<p><strong class="red_color">￦2,961,820</strong></p>
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
				<div class="eisti_form0">
					<div class="eisti_form_head">
						<h4>항공 견적서</h4>
						<a href="#none"><img src="/_innermall/img/hm/print.png" alt="print" /></a>
					</div>
					<div class="eisti_form_body">
						<div class="eisti_form_body_in">
							<div class="eisti_form_body_in0">
								<h3>단체명 : <span><input type="text" value="[삼성자산운용] AI운용본부 정소영님 _ 6월 뮌헨 출장 " readonly/></span></h3>
							</div>
							<table class="eisti_form_body_in1">
								<tr>
									<td class="eisti_form_body_table0">행사기간</td>
									<td class="eisti_form_body_table1"><span class="navy_color">2017-06-07~09</span></td>
									<td class="eisti_form_body_table2">제안업체</td>
									<td class="eisti_form_body_table3">티더블유코리아</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">행사인원</td>
									<td class="eisti_form_body_table1">1명</td>
									<td class="eisti_form_body_table2">사업자번호</td>
									<td class="eisti_form_body_table3">670-86-00462</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">지역</td>
									<td class="eisti_form_body_table1">뮌헨</td>
									<td class="eisti_form_body_table2">주소</td>
									<td class="eisti_form_body_table3">서울시 강남구 도산대로 157 12층</td>
								</tr>
								<tr>
									<td class="eisti_form_body_table0">담당</td>
									<td class="eisti_form_body_table1">석혜지 (02-511-5457)</td>
									<td class="eisti_form_body_table2">발행일</td>
									<td class="eisti_form_body_table3">2017-05-19</td>
								</tr>
							</table>
							<div class="eisti_form_body_in0_1">
								<h3>예약자 정보</h3>
							</div>
							<table class="eisti_form_body_in1">
								<tr>
									<td class="eisti_form_body_table0">인원</td>
									<td class="eisti_form_body_table1"><span class="navy_color">1명</span></td>
									<td class="eisti_form_body_table2">이름</td>
									<td class="eisti_form_body_table3">홍길동</td>
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
										<tr>
											<td rowspan="2" class="no_backs"><strong>루프트한자</strong></td>
											<td class="no_backs">06월 07일</td>
											<td><strong class="navy_color">LH 719</strong></td>
											<td>인천</td>
											<td>뮌헨</td>
											<td>12:15</td>
											<td>16:45</td>
											<td>15시간</td>
											<td></td>
										</tr>
										<tr>
											<td class="no_backs">06월 07일</td>
											<td><strong class="navy_color">LH 719</strong></td>
											<td>인천</td>
											<td>뮌헨</td>
											<td>12:15</td>
											<td>16:45</td>
											<td>15시간</td>
											<td></td>
										</tr>
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
										<tr>
											<td>루프트한자</td>
											<td>이코노미</td>
											<td>￦1,940,000</td>
											<td>￦580,400</td>
											<td>￦58,200</td>
											<td>￦2,578,600</td>
											<td>1명</td>
											<td>￦2,578,600</td>
											<td>￦2,578,600</td>
											<td></td>
										</tr>
										<tr class="eisti_form_body_in2_2_color">
											<td colspan="2"><strong>루프한자 요금조건</strong></td>
											<td colspan="8"></td>
										</tr>
									</tbody>
								</table>
								<div class="esti_total">
									<p><strong>총계</strong></p>
									<p><strong class="red_color">￦2,961,820</strong></p>
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
