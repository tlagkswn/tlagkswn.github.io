<?php include "hm_head2.php"; ?>
<?php
//작성권한
if(($s_adlevel == 1 || $s_adlevel == 4) && $s_wid != null){ 
	//번호 불러오기
	$no = $_GET['no'];
	$tcode = $_GET['tcode'];
	$getArr = getTripDataOne($conn, $no,$tcode);
	////배열이 없는 경우
	if(empty($getArr)){   echo "<script>alert('삭제되거나 없는 게시물입니다.');location.href='hm_main.php';</script>";    }
	$trip_tcode = $getArr['trip_tcode'];
	$rstatus = $getArr['rstatus']; //게시물 상태

	//타입 개수
	$getTypeArr = getTripTypeDataOne($conn, $tcode);

	$checkMine = checkMyTripData($conn, $no, $tcode, $s_adlevel,$s_wid);
	//자신의 영역글이 아닌 경우
	if($checkMine == 0){	echo "<script>alert('권한이 없습니다');location.href='hm_main.php';</script>";	}
	//확정된 상태인 경우
	if($rstatus == 4){		echo "<script>location.href='/_innermall/hm_esti_forms.php?no=".$no."&tcode=".$trip_tcode."';</script> "; }
?>

<!-- //http://twkmall.co.kr/_innermall/eventadm/hmapi/hmuse_list.php -->
<style type="text/css">
	input[type=radio]{cursor:pointer}
</style>
<script type="text/javascript"> 
	$(function(){

		$(document).on("click",".esti_ul0 input",function(){
			//alert(11)
			

			var rowSpanNum = $(this).parents("tr").find(".esti_ul0").attr("rowspan");
			rowSpanNum = parseInt(rowSpanNum);
		//	alert(rowSpanNum)
			
			var index0 = $(this).parents("tr").index();
			
			//alert(index0);

			//var next0 = .next()
			
			if(!$(this).hasClass("active")){
				if(rowSpanNum>1){

					$(this).parents("table").find("tr").css({"background-color":"#fff"});
				
					for(var i=0;i<rowSpanNum; i++)
					{					
						
						$(this).parents("table").find("tr:eq("+(index0+i)+")").css({"background-color":"#f6f6f6"});
			
					}
					

				}else{

					$(this).parents("table").find("tr").css({"background-color":"#fff"});
					$(this).parents("tr").css({"background-color":"#f6f6f6"});
			 
				}

				$(this).parents("table").find(".esti_ul0 input").removeClass("active"); 
				$(this).addClass("active");

			}else{ 

					
				$(this).removeClass("active");

			}

			
		
		})

		$(document).on("click",".select0",function(){
			$(this).parents(".esti_right_table_bott1").find(".esti_ul0 input").click();

		})

	})

</script>

<div id="estimate_form">
	<h4 class="hm_title">출장 견적서 요청서 </h4>
	<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
	<form method="post" name="form_trip" action="eventadm/command/hm_trip_upload_data.php" class="estimate_form_wrap">
	<!-- View && Edit Mode  -->
		<input type="hidden" name="proc" value="e">
		<input type="hidden" name="referer" value="trip" />
 		<input type="hidden" id="chk_box_01" name="require_trans1" value="<?php echo $getArr['require_trans1']?>"/> 
 		<input type="hidden" id="chk_box_02" name="require_trans2" value="<?php echo $getArr['require_trans2']?>"/> 
		<input type="hidden" id="chk_box_03" name="require_trans3" value="<?php echo $getArr['require_trans3']?>"/> 
 		<input type="hidden" id="chk_box_04" name="require_trans4" value="<?php echo $getArr['require_trans4']?>"/> 
		<input type="hidden" id="chk_box_privacy" value="0"/>
		<input type="hidden" id="nation" name="nation" value="">
		<input type="hidden" name="no" value="<?php echo $no?>">
		<input type="hidden" name="trip_tcode" value="<?php echo $tcode?>">


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
						<p><label for="user_name">한글명</label> <input type="text" name="wname" value="<?php echo $getArr['wname']?>" placeholder="성명" required id="user_name"/></p>
						<p><label for="user_email">이메일</label> <input type="email" name="wmail" value="<?php echo $getArr['wmail']?>" maxlength="30" placeholder="E-mail" required id="user_email"/></p>
					</div>
					<div class="estimate_applicant_body1 estimate_applicant_comm">
						<label for="">휴대폰번호</label>
						<p>
						<input type="tel" name="wphone" id="tel" maxlength="12" value="<?php echo $getArr['wphone']?>" required placeholder="번호만 입력하세요." />
						</p>
				
					</div>
					<div class="estimate_applicant_comm estimate_es_chk_box estimate_requirement_select">
						<label for="" class="label_requi">요청사항</label>
						
						<div class="requ_wrap">
							<ul>
								<li <?php echo $getArr['require_trans_class'][1]?> >
									<img src="img/hm/chk_box.png" alt="chk_box_01" class='es_chk_box0 es_chk_box chk_box0' 
									<?php echo $getArr['require_trans_check0'][1] ?>/>
									<img src="img/hm/chk_box_on.jpg" alt="chk_box_01" class='es_chk_box01 es_chk_box chk_box1'
									<?php echo $getArr['require_trans_check1'][1] ?>/>
									<img src="img/hm/icon_01.jpg" alt="icon_01" />	
								</li>	
								<li <?php echo $getArr['require_trans_class'][2]?> >
									<img src="img/hm/chk_box.png" alt="chk_box_02" class='es_chk_box1 es_chk_box chk_box0'
									<?php echo $getArr['require_trans_check0'][2] ?>/>
									<img src="img/hm/chk_box_on.jpg" alt="chk_box_02" class='es_chk_box01 es_chk_box chk_box1'
									<?php echo $getArr['require_trans_check1'][2] ?>/>
									<img src="img/hm/icon_02.jpg" alt="icon_02" />	
								</li>
								<li <?php echo $getArr['require_trans_class'][3]?> >
									<img src="img/hm/chk_box.png" alt="chk_box_03" class='es_chk_box2 es_chk_box chk_box0'
									<?php echo $getArr['require_trans_check0'][3] ?>/>
									<img src="img/hm/chk_box_on.jpg" alt="chk_box_03" class='es_chk_box01 es_chk_box chk_box1'
									<?php echo $getArr['require_trans_check1'][3] ?>/>
									<img src="img/hm/icon_03.jpg" alt="icon_03" />	
								</li>
								<li <?php echo $getArr['require_trans_class'][4]?> > 
									<img src="img/hm/chk_box.png" alt="chk_box_04" class='es_chk_box3 es_chk_box chk_box0'
									<?php echo $getArr['require_trans_check0'][4] ?>/>
									<img src="img/hm/chk_box_on.jpg" alt="chk_box_04" class='es_chk_box01 es_chk_box chk_box1'
									<?php echo $getArr['require_trans_check1'][4] ?>/>
									<img src="img/hm/icon_04.jpg" alt="icon_04" />	
								</li>
							</ul>
							<div class="requirement_textarea">
								<div>
									<p>
										<textarea name="require_text" class="requirement_textarea"><?php echo $getArr['require_text']?></textarea>
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
					<?php
				for($i = 0; $i<count($getTypeArr); $i++){

				   $getType_city_name[$i] =  json_decode($getTypeArr[$i]['city_name'],true);
				   $getType_city_fdate[$i] =  json_decode($getTypeArr[$i]['city_fdate'],true);
				   $getType_city_ftime[$i] =  json_decode($getTypeArr[$i]['city_ftime'],true);
				   $getType_city_sdate[$i] =  json_decode($getTypeArr[$i]['city_sdate'],true);
				   $getType_city_etc[$i] =  json_decode($getTypeArr[$i]['city_etc'],true);
				   $getType_member_company[$i] =  json_decode($getTypeArr[$i]['member_company'],true);
				   $getType_member_depart[$i] =  json_decode($getTypeArr[$i]['member_depart'],true);
				   $getType_member_wname[$i] =  json_decode($getTypeArr[$i]['member_wname'],true);
				   $getType_member_wphone[$i] =  json_decode($getTypeArr[$i]['member_wphone'],true);
				   $getType_member_rank[$i] =  json_decode($getTypeArr[$i]['member_rank'],true);
				   $getType_member_wgender[$i] =  json_decode($getTypeArr[$i]['member_wgender'],true);
				   $getType_member_wname_eng[$i] =  json_decode($getTypeArr[$i]['member_wname_eng'],true);
				   $getType_member_wmail[$i] =  json_decode($getTypeArr[$i]['member_wmail'],true);
				   $getType_member_airrank[$i] =  $getTypeArr[$i]['member_airrank'];
				   

					$k = $i+1;
					
			?>
						<div class="estimate_applicant_totall_in">
							<div class="estimate_schedule_body_wrap0">
								<div>
									<p class="main_type_num">Type <span class="red_color"><?php echo $k?></span></p>
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
									<?php
										for($j=0; $j<count($getType_city_name[$i]); $j++){
										$l= $j + 1;
									?>
										<li class="estimate_applicant_body0 estimate_applicant_comm dl_0">
											<dl>
												<dd class="city_name estimate_applicant_comm0">
												<input type="text" name="city_name<?php echo $k?>[]" required class="city_wname cityna_0" placeholder="도시명" readonly value="<?php echo $getType_city_name[$i][$j]?>"></dd>
												<dd class="estimate_applicant_comm1"><input type="text" required name="city_fdate<?php echo $k?>[]" placeholder="현지도착일" class="date_picker cityna_1" value="<?php echo $getType_city_fdate[$i][$j]?>"/></dd>
												<dd class="estimate_applicant_comm2">
												<input type="text" required name="city_ftime<?php echo $k?>[]" value="<?php echo $getType_city_ftime[$i][$j]?>" placeholder="도착시간대" class="cityna_2"/></dd>
												<dd class="estimate_applicant_comm3">
													<input type="text" required name="city_sdate<?php echo $k?>[]" 
													value="<?php echo $getType_city_sdate[$i][$j]?>" placeholder="현지출발일" class="date_picker cityna_1"/>	
												</dd>
												<dd class="estimate_applicant_comm4">
													<input type="text" name="city_etc<?php echo $k?>[]" value="<?php echo $getType_city_etc[$i][$j]?>" required class="cityna_0" placeholder="ex) 12시경" >			
												</dd>
										
											</dl>

										</li>
									<?php
									}//
									?>
									</ul>
								</div>

								<div class="estimate_applicant_body estimate_info_body">
									<div class="estimate_applicant_add_citis">
										<span>출장자</span>
										<p class="copy_system"> 
											<select name="member_airrank1[]" id="">
												<option value="0" <?php if($getType_member_airrank[$i] =="0"){ echo 'selected';}?> >항공등급</option>
												<option value="이코노미" <?php if($getType_member_airrank[$i] =="이코노미"){ echo 'selected';}?> >이코노미</option>
												<option value="비즈니스" <?php if($getType_member_airrank[$i] =="비즈니스"){ echo 'selected';}?> >비즈니스</option>
												<option value="1등급" <?php if($getType_member_airrank[$i] =="1등급"){ echo 'selected';}?> >1등급</option>
											</select>
										</p>
										<a href="#none" class="add_person">+ 출장자 추가하기</a>
									</div>
									<ul class="estimate_applicant_add">
									<?php
										for($j=0; $j<count($getType_member_wname[$i]); $j++){
										$l= $j + 1;
									?>
									<!--
										<li class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm3">
											<dl>
												<dt>출장자  <span><?php echo $l?></span></dt>
												<dd class="estimate_applicant_comm0">
													<p><input type="text" value="<?php echo $getType_member_company[$j]?>" name="member_company<?php echo $k?>[]" placeholder="계열사"/></p>
													<p><input type="text" value="<?php echo $getType_member_rank[$j]?>" name="member_rank<?php echo $k?>[]" placeholder="직급"/></p>
													<p>
														<select name="member_airrank1[]" id="">
															<option value="0">항공등급</option>
															<option value="이코노미" <?php if($getType_member_airrank[$j]=='이코노미'){ echo 'selected'; }?> >이코노미</option>
															<option value="비즈니스" <?php if($getType_member_airrank[$j]=='비즈니스'){ echo 'selected'; }?> >비즈니스</option>
															<option value="1등급" <?php if($getType_member_airrank[$j]=='1등급'){ echo 'selected'; }?> >1등급</option>
														</select>
													</p>
													
												</dd>
												<dd class="estimate_applicant_comm1">
													<p><input type="text" value="<?php echo $getType_member_depart[$j]?>" name="member_depart<?php echo $k?>[]" placeholder="부서"/></p>
													<p>
														<select name="member_wgender<?php echo $k?>[]" id="">
															<option value="0">성별</option>
															<option value="남자" <?php if($getType_member_wgender[$j]=='남자'){ echo 'selected'; }?> >
															남자</option>
															<option value="여자" <?php if($getType_member_wgender[$j]=='여자'){ echo 'selected'; }?> >여자</option>
														</select>
													</p>
										 			<p><input type="button" value="Search" onclick="show_member_hm(1,1);"/></p> 
												</dd>
												<dd class="estimate_applicant_comm2">
													<p><input type="text" value="<?php echo $getType_member_wname[$j]?>" name="member_wname<?php echo $k?>[]" placeholder="한글명"/></p>
													<p><input type="text" value="<?php echo $getType_member_wname_eng[$j]?>"name="member_wname_eng<?php echo $k?>[]" placeholder="영문명"/></p>
												</dd>
												<dd class="estimate_applicant_comm3">
													<p><input type="text" value="<?php echo $getType_member_wphone[$j]?>" name="member_wphone<?php echo $k?>[]" placeholder="핸드폰번호"/></p>
													<p><input type="text" value="<?php echo $getType_member_wmail[$j]?>" name="member_wmail<?php echo $k?>[]" placeholder="이메일"/></p>
												</dd>
											 	<dd style="height:85px;" class="estimate_applicant_comm4"><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd> 
											</dl>
										</li>
										-->
										<li class="estimate_applicant_body0 estimate_applicant_comm estimate_applicant_comm3">
											<dl>
												<dt>출장자 <span><?php echo $l?></span></dt>
												<dd class="estimate_applicant_comm0">
													<div style="overflow:hidden;">
														<p><input type="text" value="<?php echo $getType_member_wname[$i][$j]?>" name="member_wname<?php echo $k?>[]" placeholder="한글명" class="inputs_back" style=""/></p>
														<p><input type="button" value="Search" class="show_member_wind inputs_back"/></p>
													</div>
													<div style="overflow:hidden;">
														<p><input type="text" name="member_company<?php echo $k?>[]" value="<?php echo $getType_member_company[$i][$j]?>" placeholder="계열사" class="inputs_back"/></p>
														<p><input type="text" value="<?php echo $getType_member_depart[$i][$j]?>" name="member_depart<?php echo $k?>[]" placeholder="부서" class="inputs_back"/></p>
														<p><input type="text"  value="<?php echo $getType_member_rank[$i][$j]?>" name="member_rank<?php echo $k?>[]" placeholder="직급" class="inputs_back"/></p>
														<p>
															<select name="member_wgender<?php echo $k?>[]" id="" class="inputs_back">
																<option value="0">성별</option>
																<option value="남자" <?php if($getType_member_wgender[$i][$j]=='남자'){ echo 'selected'; }?> >남자</option>
																<option value="여자" <?php if($getType_member_wgender[$i][$j]=='여자'){ echo 'selected'; }?> >여자</option>
															</select>
														</p>
													</div>
													<div class="div_line"></div>
													<div style="overflow:hidden;">
														<p><input type="text" value="<?php echo $getType_member_wname_eng[$i][$j]?>"name="member_wname_eng<?php echo $k?>[]" placeholder="영문명"/></p>
														<p><input type="text" value="<?php echo $getType_member_wphone[$i][$j]?>" name="member_wphone<?php echo $k?>[]" placeholder="핸드폰번호"/></p>
														<p><input type="text" value="<?php echo $getType_member_wmail[$i][$j]?>" name="member_wmail<?php echo $k?>[]" placeholder="이메일"/></p>
													</div>
												</dd>
												<dd style="height:85px;position:relative;top:22px" class="estimate_applicant_comm4"><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
											</dl>
										</li>	

										<?php
									}//
										?>
									</ul>
								</div>
							</div>
						</div>
					<?php
			}//
			?>
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
								<textarea name="require_text" class="requirement_textarea"><?php echo $getArr['require_text']?></textarea>
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
<!-- 			<h3 class="hm_title">개인정보 수집 및 이용동의 (필수)</h3> -->
<!-- 			<p class="privacy_explain" >한미 출장 시스템에서는 서비스 이용을 위한 최소한의 개인정보를 수집합니다.</p> -->
<!-- 			<p class="privacy_textarea"> -->
<!-- 				<textarea name="" id="" readonly></textarea> -->
<!-- 			</p> -->
<!-- 			<p class="privacy_chk"> -->
<!-- 				<img src="img/hm/chk_box.png" alt="chk_box_privacy" class="chk_box_privacy0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_privacy" class="chk_box_privacy1"/> 개인정보 수집, 이용에 동의합니다. -->
<!-- 			</p> -->
		<p class="privacy_submit">	
		<?php	if(($s_adlevel == 1 || $s_adlevel == 4) && $s_wid != null){ //최고관리자?>
			<a href="hm_main.php" class="btn_type1 ask_btn0">돌아가기</a>
		<?php  
			if($rstatus != 0 && $s_adlevel ==1){  
		?>
			<a href="javascript:is_edit(<?php echo $no?>);" class="btn_type1 ask_btn0">견적서 수정하기</a>
			<a href="javascript:is_cancel(<?php echo $no?>);" class="btn_type1 ask_btn0">견적서 취소하기</a>
		<?php
				}//확정된 상태는 수정 및 취소가 불가능하다
			else if($rstatus==0 && $s_adlevel == 1){
		?>
			<a href="javascript:is_recover(<?php echo $no?>,'<?php echo $tcode?>');" class="btn_type1 ask_btn0">견적서 복구하기</a>
		<?php
			}
		}///최고관리자 Fin 
		?>
		</p>
		</div>
		</form>
		<p class="clear_70"></p>

	<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
<!-- 현재 작성 페이지에서는 보여주지 않음 -->
			<form name="form_amend" action="eventadm/command/hm_trip_upload_data.php" method="post">
					<input type="hidden" name="trip_tcode" value="<?php echo $tcode?>">
					<input type="hidden" name="referer" value="trip_amend" />
					<input type="hidden" name="no" value="<?php echo $no?>" />
					<input type="hidden" name="confirm_air_no" value="" />
					<input type="hidden" name="confirm_hotel_no" value="" />
	
	<div class="test_none">
		<div id="estimate_add_wrap"> 
			
			
		<?php
		//추천 항공 View
		/*** 게시물 상태가 대기중(1)이거나 취소(0) 상태이면 보이지 않는다. ***/
		/////2: 검토중  4: 완료
			if($rstatus ==2 || $rstatus ==4 ){
		?>
			<div class="acodianForTypes">
				<ul>
				<?php
				
				//타입 크기만큼 리스트 출력
					for($i= 0; $i< count($getTypeArr); $i++){
						$type_no = $i + 1; 
						// 타입번호 : echo $getTypeArr[$i]['no'];
				?>	
					<li>
						<div class="acodianForTypes_title">
							<div class="acodianForTypes_li0"> <h4><?php echo $getType_member_wname[$i][0]?></h4> 외 출장자 : 
							<?php
							//출장자 리스트(가장 먼저 입력된 사람은 h4 태그에 등록)
								for($j=1; $j<count($getType_member_wname[$i]); $j++){ 
								 echo $getType_member_wname[$i][$j];
								 if(count($getType_member_wname[$i]) - $j != 1)
								{
									 echo " , ";
								}
							}
							?>
							
							<strong class="navy_color">총 <?php echo count($getType_member_wname[$i])?>명</strong></div>
							<div class="acodianForTypes_li1"><p>Type: <span><?php echo $type_no?></span></p></div>
							<div class="acodianForTypes_li2"><a href="#none"><img src="img/hm/arrow_up.png" alt="" /></a></div>
						</div>
						<div class="esti_right_head_mainSwrap">
							<div class="esti_right_head_mainSwrap_in">
								<div class="infoOfEmployee">
									<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">출장자 정보</h4>
									<table>
									<?php
										//출장자 리스트 반복)
										for($j=0; $j<count($getType_member_wname[$i]); $j++){ 
									?>
										<tr>
											<td style="width:15%">
												<strong><?php echo $getType_member_wname[$i][$j]?></strong>
												<p><?php echo $getType_member_wname_eng[$i][$j]?></p>
											</td>
											<td style="width:20%">
												<?php echo $getType_member_company[$i][$j]?> <?php echo $getType_member_rank[$i][$j]?>
											</td>
											<td style="width:10%">
												<?php echo $getType_member_wgender[$i][$j]?>
											</td>
											<td style="width:20%" class="infoOfEmployee_td3">
												항공등급 : <span><?php echo $getTypeArr[$i]['member_airrank']?></span>
											</td>
											<td style="width:35%">
												<strong>핸드폰번호 : <?php echo $getType_member_wphone[$i][$j]?></strong>
												<p>이메일주소 : <?php echo $getType_member_wmail[$i][$j]?></p>
											</td>
										</tr>
									<?php
										}//출장자 리스트 Fin
									?>

									</table>
								</div>
								<div class="esti_right_head">
									<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천항공권</h4>
									<p class="esti_right_head0">ALL <span>(4)</span></p>
								
								</div>
								<div class="esti_right_body">
									<div class="esti_right_body_top">
									<!--
										<a href="#none"><img src="img/hm/eni_icon0.png" alt="eni_icon" /></a>
										<a href="#none"><img src="img/hm/eni_icon1.png" alt="eni_icon" /></a>
										<a href="#none"><img src="img/hm/eni_icon2.png" alt="eni_icon" /></a>
										<a href="#none"><img src="img/hm/eni_icon3.png" alt="eni_icon" /></a>
									
										<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
									
										<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
										-->
									</div>
									<div class="esti_right_body_bott">
										<table class="estimate1Php">
											<tr class="esti_right_table_bott0">
												<td class="esti_ul0"><a href="#none">
<!-- 												<img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/> -->
<!-- 												<img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a> -->
												</td>
												<td class="esti_ul1">번호</td>
												<td class="esti_ul2">추천 항공</td>
												<td class="esti_ul3">항공 일정</td>
												<td class="esti_ul4">예상 요금(1인 기준)</td>
												<td class="esti_ul5">선택</td>
											</tr>
									<?php
								
									$air_arr = listRecommendAirData($conn,$tcode,$odr1,$getTypeArr[$i]['no']); //항공리스트
									$hotel_arr = listRecommendHotelData($conn,$tcode,$odr2,$getTypeArr[$i]['no']); // 호텔리스트
									/**  항공 리스트 **/
									$n = 1;
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
									<!--original -->
									<!--
											<tr class="esti_right_table_bott1">
												<td class="esti_ul0">
												<a href="#none">
												<img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/>
												<img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/>
												</a>
												</td>
												<td class="esti_ul1"><?php echo $n?></td>
												<td class="esti_ul2">
														<div class="esti_airno" data-airno="<?php echo $a['no']?>" data-airname="<?php echo $a['airname']?>" data-airprice="<?php echo $sum_tax_without?>">
															<h4>
															
																Type <?php echo $type_order_no?>
												
															</h4>
															<p class="esti_ul2_center"><strong><?php echo $a['airname']?></strong></p>
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
															<p class="charging_condition"></p>
														</div>
											
												</td>
												<td class="esti_ul3">

												<?php
													for($m=0; $m <count($air_sdate_arr); $m++){
														if($air_sdate_arr[$m] != "" && $air_scity_arr[$m] != ""){
												?>
														<div>
															<p><strong class="cities_color"><?php echo $air_scity_arr[$m]?> - <?php echo $air_fcity_arr[$m]?>행</strong> 
															<span class="navy_color">(편명 <?php echo $air_sname_arr[$m]?>)</span></p>
															<p><strong>출발</strong> : <?php echo $air_sdate_arr[$m]?> / <?php echo $air_stime_arr[$m]?> </p>
															<p><strong>도착</strong> : <?php echo $air_fdate_arr[$m]?> / <?php echo $air_ftime_arr[$m]?> </p>
															<p><strong>좌석</strong> : 이코노미 </p>
															<p><strong>소요시간</strong> : <strong class="red_color"><?php echo $air_dtime_arr[$m]?> </strong> 시간 소요
																	
															</p>
															<p class="note">( <?php echo $air_require_text_arr[$m]?>)</p>
														</div>

												<?php
														}///If Fin
													}///
												?>

												
												</td>
												<td class="esti_ul4">
													￦<?php echo $sum_tax?>
													<p>(<?php echo $a['require_text']?>)</p>
												</td>
												<td class="esti_ul5">
													<a href="#none" ><span class="select0">선택하기</span></a>
												</td>
											</tr>
									-->

									<!--#############################  NEW  ################################-->
											<tr class="esti_right_table_bott1">
												<td class="esti_ul0"><a href="#none">
													<input type="radio" name="choose_type_air_<?php echo $i?>" 
													value="<?php echo $getTypeArr[$i]['no']?>:<?php echo $a['no']?>">
<!-- 													<img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/> -->
<!-- 													<img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/> -->
												</a>
												</td>
												<td class="esti_ul1"><?php echo $n?></td>
													<td class="esti_ul2">
					
													
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
															<p>
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
													<a href="#none" ><span class="select0">선택</span></a>
												</td>
											</tr>



									<!--###############################################################-->
										<?php
											$n++;
										}//
										?>
										</table>
									</div>
								</div>
								<div class="esti_right_head">
									<h4 style="font-size:20px;color:#3a4083;padding:45px 0 15px">추천호텔</h4>
									<p class="esti_right_head0">ALL <span>(4)</span></p>
									<p class="esti_right_head1"><select name="" id="">
										<option value="0">최신순으로 진열하기</option>
										<option value="1">가격순으로 진열하기</option>
									</select></p>
								</div>
								<div class="esti_right_body estimate2Php estimate2Php2">
									<div class="esti_right_body_top">
									<!--
										<a href="#none" class="eni_icon6"><img src="img/hm/eni_icon6.png" alt="eni_icon" /></a>
										
										<a href="#none"><img src="img/hm/eni_icon5.png" alt="eni_icon" /></a>
									-->
									</div>
									<div class="esti_right_body_bott">
										<table>
										<tr class="esti_right_table_bott0">
											<td class="esti_ul0"><a href="#none">
											<!--<img src="img/hm/chk_box.png" alt="chk_box" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box" class='es_chk_box01 es_chk_box chk_box1'/></a>--></td>
											<td class="esti_ul1">순서</td>
											<td class="esti_ul2">호텔명</td>
											<td class="esti_ul3">상세사이트 이동</td>
											<td class="esti_ul4">박수</td>
											<td class="esti_ul8">객실타입</td>
											<td class="esti_ul5">비고</td>
											<td class="esti_ul6">금액</td>
											<td class="esti_ul7">선택</td>
											
										</tr>
									<?php
									/**  호텔 리스트 **/
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
										<td class="esti_ul0" rowspan="<?php echo count($cityname_arr)?>">
											<input type="radio" name="choose_type_hotel_<?php echo $i?>" value="<?php echo $getTypeArr[$i]['no']?>:<?php echo $a['no']?>">
<!-- 										<a href="#none"> -->
<!-- 										<img src="img/hm/chk_box.png" alt="chk_box_0" class='es_chk_box0 es_chk_box chk_box0'/> -->
<!-- 										<img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class='es_chk_box01 es_chk_box chk_box1'/> -->
<!-- 										</a> -->
										</td>
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
												<p class="navy_color"><?php echo $hotelname_arr[$c]?><a href="<?php echo $hotelurl_arr[$c]?>" target="_blank">호텔정보 보러가기</a></p>	
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
											<a href="#none"><span class="select0">선택</span></a>

										</td>
									<?php
										}////If first then check rowspan
									?>
									</tr>
									<?php
												}//한 글 안에 호텔 개수
											$n++;
											}//////Foreach Fin Fin
													
									
													?>
									</table>
									</div>				
								</div>
							</div>
					<!--  ***결산 금액 ***-->
					<!--
							<div class="expectedCost_result">
								<ul>
									<li class="expectedCost_result_li0">
										<h4>선택 항공내역</h4>
										<div class="expectedAir">

										</div>

										<p class="line_0"></p>
									</li>
									<li class="expectedCost_result_li1">
										<h4>선택 호텔내역</h4>
									
										<div class="expectedHotel">

									

										</div>

									</li>
									<li class="expectedCost_result_li2">
										<div class="expectedCostResult">
											<h4>총금액</h4>
											
										</div>
									</li>
								</ul>
								<a href="#none">승인하기</a>
							</div>
						-->
						</div>
					</li>
				<?php
					}//Li Fin
				?>
				</ul>
			</div>
			
			<?php
		}
		//추천 항공 View Fin
		/////
			//견적서 수정 리스트
	/***   취소된 견적서는 수정 요청이 불가능하다***/
		if($rstatus != 0){ 
				$amend_list = listTripAmend($conn, $tcode); 
			?>
			<div class="estimate" style="margin:80px 0">
				<div class="estimate_0">
					<div class="estimate_0_in">
						<ul class="estimate_0_head">
							<li>구분</li>
							<li>등록일자</li>
							<li>작성자</li>
						</ul>
					<?php
						$n = 0;
						foreach($amend_list as $a){
							$n++;
					?>
						<ul class="estimate_0_bottom estimate_0_bottom1">
							<li class="estimate_amend_history" data-item="<?php echo $a['no']?>"><a href="#none"><p><?php echo $n;?>차 견적</p></a></li>
							<li class="estimate_amend_history" data-item="<?php echo $a['no']?>"><a href="#none"><?php echo substr($a['regdate'],0,-3)?></a></li>
							<li><?php echo $a['wname']?></li>
						</ul>
					<?php
						}//Foreach Fin
					?>



					</div>
				</div>
		
				<div class="estimate_1">
					<textarea name="require_amend" id="require_amend" placeholder="추가 요청란입니다. 이곳에 텍스트를 입력하시면 됩니다." required>
					</textarea>
					<p>추가요청</p>
				</div>
				
				<div class="estimate_2">
					<a href="javascript:add_amend();" style="margin-right:15px;"><img src="img/hm/apply_btn2.png" alt="apply_btn2" /></a>
					<?php
					/// 검토 중일때 최종 승인 버튼 신청이 가능하다.
						if($rstatus == 2){
					?>
					<a href="#none" onclick="estimate_fsubmit();"><img src="img/hm/apply_btn3.png" alt="apply_btn3" /></a>
					<?php
						}// rstatus 2 Fin
					?>
				</div>
				
		
			</div>
			<?php
		}///if rstatus != 0 Fin
			?>
		</div>
	</div>
	</form>
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
		$(window).load(function(){
			var estimate_applicant_totall = $(".estimate_country").length;
			//alert(estimate_country_num)

			for(var i=0;i<estimate_country_num;i++){
				var estimate_schedule_body_wrap_hei = $(".estimate_applicant_totall_in:eq("+i+") .estimate_schedule_body_wrap").height()
				var estimate_applicant_estimate_country_hei = $(".estimate_applicant_estimate_country").height()
				//alert(estimate_applicant_estimate_country_hei)
				$(".estimate_applicant_totall_in:eq("+i+") .estimate_schedule_body_wrap0").css({"height":estimate_schedule_body_wrap_hei+"px"});
				
			}

			$(".estimate_country").css({"height":estimate_applicant_estimate_country_hei+"px"})
		})
	})
</script>