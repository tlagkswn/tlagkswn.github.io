<?php include "hm_head2.php"; ?>
<?php include_once "eventadm/hmapi/getMyHm.php";?>
<?php 
	//최고관리자만 접근 가능
	if(($s_adlevel == 1 || $s_adlevel == 4) && $s_wid != null){ 
	
?>
<!--
	<div id="main_sliderArea">
		<div id="main_sliderArea_in">
			<h3>
				<span class="sky_color">Only **사 임직원</span> 위한 여행상품 

			</h3>	
			<!--
			<ul class="bx_slider">
				<li>
					<a href="#none">
						<div class="slider_div">
							<img src="img/hm/slide_img.png" alt="slide_img" />
						</div>
						<div class="slider_textArea slider_div">
							<div>
								<h4>하노이+하롱베이+닌빈 4/5일</h4>
								<p class="sky2_color">상품코드: AVP601</p>
								<p class="red_color">383,800원~1,486,200원</p>
							</div>
						</div>
					</a>	
				</li>
				<li>
					<a href="#none">
						<div class="slider_div">
							<img src="img/hm/slide_img.png" alt="slide_img" />
						</div>
						<div class="slider_textArea slider_div">
							<div>
								<h4>하노이+하롱베이+닌빈 4/5일</h4>
								<p class="sky2_color">상품코드: AVP601</p>
								<p class="red_color">383,800원~1,486,200원</p>
							</div>
						</div>
					</a>	
				</li>
				<li>
					<a href="#none">
						<div class="slider_div">
							<img src="img/hm/slide_img.png" alt="slide_img" />
						</div>
						<div class="slider_textArea slider_div">
							<div>
								<h4>하노이+하롱베이+닌빈 4/5일</h4>
								<p class="sky2_color">상품코드: AVP601</p>
								<p class="red_color">383,800원~1,486,200원</p>
							</div>
						</div>
					</a>	
				</li>
				<li>
					<a href="#none">
						<div class="slider_div">
							<img src="img/hm/slide_img.png" alt="slide_img" />
						</div>
						<div class="slider_textArea slider_div">
							<div>
								<h4>하노이+하롱베이+닌빈 4/5일</h4>
								<p class="sky2_color">상품코드: AVP601</p>
								<p class="red_color">383,800원~1,486,200원</p>
							</div>
						</div>
					</a>	
				</li>
			</ul>
			

			<div>
			
				<ul>
				<?php 
				///
				    $headerLogoArr = listHeaderLogo($conn);
					foreach($headerLogoArr as $h){
				?>
					<li>
							<div class="img_area">
							<a href="<?php echo $h['wlink']?>" target="_blank">
								<p><img src="eventadm/command/fileup/hmheaderlogo/<?php echo $h['new_logo1']?>" alt="main_visu0" /></p>
							</div>
							<div class="text_area">
								<h4><?php echo $h['wtitle']?></h4>
								<p>상품코드: <?php echo $h['product_code']?></p>
								<strong><?php echo number_format($h['wprice1'])?>원~<?php echo number_format($h['wprice2'])?>원</strong></a>
							</div>
							<?php if($s_adlevel=='1'){
							?>
								<a href="#none" onclick="edit_headerlogo_write(<?php echo $h['no']?>);">[Edit]</a>
							<?
								}//IF EDIT Fin
							?>
						
					</li>
				<?php
				}//i
				?>
				</ul>
			</div>
		</div>
	</div>
-->
	<form action="" method="" id="application" name="search_form">
		<input type="hidden" id="chk_box_0" name="status1" value="<?php echo $status1?>"/>
		<input type="hidden" id="chk_box_1" name="status2" value="<?php echo $status2?>"/>
		<input type="hidden" id="chk_box_2" name="status3" value="<?php echo $status3?>"/>
		<input type="hidden" id="chk_box_3" name="status4" value="<?php echo $status4?>"/>
		<!-- require trans 체크박스 -->
		<input type="hidden" id="chk_box_4" name="rt1" value="<?php echo $rt1?>"/>
		<input type="hidden" id="chk_box_5" name="rt2" value="<?php echo $rt2?>"/>
		<input type="hidden" id="chk_box_6" name="rt3" value="<?php echo $rt3?>"/>
		<input type="hidden" id="chk_box_7" name="rt4" value="<?php echo $rt4?>"/>
		<!-- 취소된 견적서 -->
		<input type="hidden" id="chk_box_8" value="<?php echo $status0?>" name="status0"/>
		<h4 class="hm_title" id="pagelink">출장 견적 시스템</h4>
		<?php if($keyword !='' && $keyword !=null): ?>
		<h5>( *검색키워드 : <?php echo $keyword?> <a href="hm_main.php">[초기화]</a> )</h5>
		<?php endif; ?>
		<div class="application_search">
			<div class="app_search">
				<div class="app_search_in">
					<p>
						<select name="search_type" id="">
							<option value="1" <?php if($search_type ==1){  echo ' selected'; } ?> >요청자</option>
							<option value="2" <?php if($search_type ==2){  echo ' selected'; } ?> >출장국가+도시</option>
							<option value="3" <?php if($search_type ==3){  echo ' selected'; } ?> >요청자+출장국가+도시</option>
						</select>
					</p>
					<p class="app_btn">
			
						<input type="text" name="keyword" value="<?php echo $keyword?>" />
						<a href="javascript:document.search_form.submit();"><img src="img/hm/search.jpg" alt="search"/></a>
					
					</p>
				</div>
			</div>
			<div class="app_ask">
				<a href="/_innermall/hm_apply.php"><img src="img/hm/apply_btn.png" alt="apply_btn" /></a>
			</div>
		</div>

		<div id="smart_search">
			<div id="smart_search_in">
				<p class="smart_search0">
					<input type="text" value="" readonly/>
				</p>	
				<p class="smart_search1"> 
					<label for="">출장기간별</label><input type="text" readonly name="sdate" value="<?php echo $sdate?>" id="datepicker"/> ~ <input type="text" name="fdate" id="datepicker1" value="<?php echo $fdate?>" readonly />
				</p>
				<div class="progress">
					<dl>
						<dt>진행상태</dt>
						<dd <?php echo $status1_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_0" class="chk_box0" <?php echo $status1_box1 ?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_0" class="chk_box1" <?php echo $status1_box2 ?>/> 대기중
						</dd>
						<dd <?php echo $status2_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_1" class="chk_box0" <?php echo $status2_box1 ?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_1" class="chk_box1" <?php echo $status2_box2 ?>/> 검토중
						</dd>
						<dd <?php echo $status3_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_2" class="chk_box0" <?php echo $status3_box1 ?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_2" class="chk_box1" <?php echo $status3_box2 ?>/> 수정중
						</dd>
						<dd <?php echo $status4_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_3" class="chk_box0" <?php echo $status4_box1 ?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_3" class="chk_box1" <?php echo $status4_box2 ?>/> 확정
						</dd>
					</dl>
				</div>
				<div>
					<dl>
						<dt>요청사항</dt>
						<dd <?php echo $rt1_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_4" class="chk_box0" <?php echo $rt1_box1?> />
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_4" class="chk_box1" <?php echo $rt1_box2?> /> 항공
						</dd>
						
						<dd <?php echo $rt2_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_5" class="chk_box0" <?php echo $rt2_box1?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_5" class="chk_box1" <?php echo $rt2_box2?>/> 호텔
						</dd>
						<dd <?php echo $rt3_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_6" class="chk_box0" <?php echo $rt3_box1?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_6" class="chk_box1" <?php echo $rt3_box2?>/> 렌터카
						</dd>
						<dd <?php echo $rt4_active?> >
							<img src="img/hm/chk_box.png" alt="chk_box_7" class="chk_box0" <?php echo $rt4_box1?>/>
							<img src="img/hm/chk_box_on.jpg" alt="chk_box_7" class="chk_box1" <?php echo $rt4_box2?>/> 기타
						</dd>
					</dl>
				</div>
				<dl class="cencel_only">
					<dd <?php echo $status0_active?> style="font-weight:600;"><img src="img/hm/chk_box.png" alt="chk_box_8" class="chk_box0" <?php echo $status0_box1 ?>/><img src="img/hm/chk_box_on.jpg" alt="chk_box_8" class="chk_box1" <?php echo $status0_box2 ?>/> 취소된 견적서만 보기</dd>
				</dl>
				<a href="javascript:document.search_form.submit();" class="option_search">조건검색</a>
	
			</div>
		</div>

		<div id="scheduleView">
			<ul class="scheduleView_head">
				<li class="scheduleView_li0">요청자</li>
				<li class="scheduleView_li1">출장국가(지역)</li>
				<li class="scheduleView_li2">출장일정</li>
				<li class="scheduleView_li3">요청사항</li>
				<?php
				//최고관리자만 설정
				if($s_adlevel == 1 && $s_wid != null){
				?>
				<li class="scheduleView_li4">견적서</li>
				<li class="scheduleView_li5">진행</li>
				<?php
					}else
				?>
					<li class="scheduleView_li5" style="width:18.5%">진행</li>
				<?php
					//if Fin
				?>
		
			</ul>
			<div class="scheduleView_content">
			<?php
				$data_arr = array();
				$list_arr = listTrip($conn, $page , $trip_search_condition);
				foreach($list_arr as $n){
					$this_no = $n['no'];
					$this_tcode = $n['trip_tcode'];
					$member_wname_arr = json_decode($n['member_wname']);
					$member_rank_arr = json_decode($n['member_rank']);
					$member_depart_arr = json_decode($n['member_depart']);
					$city_name_arr = json_decode($n['city_name']);
					$require_trans1 = $n['require_trans1'];
					$require_trans2 = $n['require_trans2'];
					$require_trans3 = $n['require_trans3'];
					$require_trans4 = $n['require_trans4'];
					$member_count = count($member_wname_arr);
					//기본 JSON 포맷의 크기가 3
					//비어있는 값이 존재하면 차감
					
					for($i=0; $i< count($member_wname_arr); $i++)
					{
						if($member_wname_arr[$i] == "" || $member_wname_arr[$i] == null)
						{
								$member_count--;
						}
					}
					
					//본인 제외한 인원수
					
					//요청사항 아이콘
					$require_icon1 = "";
					$require_icon2 = "";
					$require_icon3 = "";
					$require_icon4 = "";
					if($require_trans1 == "1"){
						$require_icon1 = '<img src="img/hm/request_icon0.png" alt="request_icon0" />';
					}
					if($require_trans2 == "1"){
						$require_icon2 = '<img src="img/hm/request_icon1.png" alt="request_icon1" />';
					}
					if($require_trans3 == "1"){
						$require_icon3 = '<img src="img/hm/request_icon2.png" alt="request_icon2" />';
					}
					if($require_trans4 == "1"){
						$require_icon4 = '<img src="img/hm/request_icon3.png" alt="request_icon3" />';
					}
					//echo count($member_rank_arr);
					////type 정보 불러오기
					$getTypeArr = getTripTypeDataOne($conn, $this_tcode);
				
					$first_city_name =  json_decode($getTypeArr[0]['city_name'],true);
					$first_city_fdate = json_decode($getTypeArr[0]['city_fdate'],true);
					$first_city_sdate = json_decode($getTypeArr[0]['city_sdate'],true);
					$first_member_wname = json_decode($getTypeArr[0]['member_wname'],true);
				
					////
			?>
				<ul>
					<li class="scheduleView_li0">
						<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>">
							<div>
								<p class="scheduleView_name"><?php echo $n['wname']?></p>
								<p class="scheduleView_with"><?php echo $member_depart_arr[0]?> <?php echo $member_rank_arr[0]?> (총 <?php echo count($first_member_wname)?>명)</p>
							</div>
						</a>
					</li>
					<li class="scheduleView_li1">
						<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>">
							<div>
								<p class="scheduleView_con"><?php echo $first_city_name[0]?></p>
								<p class="scheduleView_city"></p>
							</div>
						</a>
					</li>
					<li class="scheduleView_li2">
						<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>">
							<div>
								<p><?php echo substr($first_city_fdate[0],2)?> ~ <?php echo substr($first_city_sdate[0],2)?></p>
							</div>
						</a>
					</li>
					<li class="scheduleView_li3">
						<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>">
							<div>
								<?php echo $require_icon1?><?php echo $require_icon2?><?php echo $require_icon3?><?php echo $require_icon4?>
							</div>
						</a>
					</li>
					<?php
						//최고관리자만 설정
						if($s_adlevel == 1 && $s_wid != null && $s_authority == 'super'){
					?>
					<li class="scheduleView_li4">
						<div>
							<a href="/_innermall/hm_estimate1.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>">등록&amp취소</a>
						</div>
					</li>
					<li class="scheduleView_li5">
						<div>
							<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>"><?php echo $n['rstatus']?></a>
						</div>
					</li>
					<?php
						}else{
					?>
					<li class="scheduleView_li5" style="width:18.5%">
						<div>
							<a href="/_innermall/hm_apply_view.php?no=<?php echo $n['no']?>&tcode=<?php echo $n['trip_tcode']?>" style="margin-left:3px"><?php echo $n['rstatus']?></a>
						</div>
					</li>
						
					<?php 
						}//if Fin
					?>
					
				</ul>
			<?php
		}//foreach Fin
			?>

			</div>
			<div class="paging">
				<?php include_once "trip_paging.php"?>
<!-- 				<div class="paging_in"> -->
<!-- 					<div class="left_area"> -->
<!-- 						<a href="#none"><img src="img/hm/left_arrow2.jpg" alt="left_arrow" /></a> -->
<!-- 						<a href="#none"><img src="img/hm/left_arrow.jpg" alt="left_arrow" /></a>	 -->
<!-- 					</div> -->
<!-- 					<div class="page_area"> -->
<!-- 						<a href="#none">1</a> -->
<!-- 						<a href="#none">2</a> -->
<!-- 						<a href="#none">3</a> -->
<!-- 						<a href="#none">4</a> -->
<!-- 					</div> -->
<!-- 					<div class="right_area"> -->
<!-- 						<a href="#none"><img src="img/hm/right_arrow.jpg" alt="left_arrow" /></a> -->
<!-- 						<a href="#none"><img src="img/hm/right_arrow2.jpg" alt="left_arrow" /></a> -->
<!-- 					</div> -->
<!-- 				</div> -->
			</div>
		</div>

	</form>
		<div id="schedule_area">
		<div class="calendar_wrap">
			<div class="container" id="container">
			  <div class="curr-month"><b></b></div>
			  <div class="all-days">
				<ul></ul>
			  </div>
			  <div class="all-date">
				<ul></ul>
			  </div>
			</div>
			<div class="calendar_bott">
				<div class="calendar_bott_in">
					<p><span style="background-color:#8e82e3"></span>공지</p>
					<p><span style="background-color:#f25884"></span>세미나</p>
					<p><span style="background-color:#59d1a0"></span>행사</p>
				</div>
			</div>
		</div>
		<?php
			$ncount = getAllNoticeData($conn);
		?>
		<div class="board">
			<div class="board_head">
				<h4 class="hm_title" id="npagelink">공지사항 <span style="font-size:15px;">총 <em class="sky2_color"><?php echo $ncount;?></em>건</span></h4>
				<?php if($s_adlevel == '1'){?>
					<span class="hm_notice_write"><a href="#none"><img src="img/hm/write.jpg" alt="write" /></a></span>
				<?php }?>
			</div>
			<ul class="board_title">
				<li class="board_li_1">번호</li>
				<li class="board_li_2">카테고리</li>
				<li class="board_li_3">제목</li>
				<li class="board_li_4">등록일</li>
			</ul>
			<div class="board_content_wrap">

			<?php
				$noticeFixArr = listNoticeFix($conn);
				$noticeArr = listNotice($conn, $npage);
				foreach($noticeFixArr as $n){
			?>
			<!--
				<ul class="board_content">
					<li class="board_li_1"><span class="important1">중요</span></li>
					<li class="board_li_2"><a href="#none"><?php echo $n['wtitle']?></a></li>
					<li class="board_li_3"><?php echo substr($n['regdate'],2,8)?></li>
				</ul>
			-->
			<?php
				}
				foreach($noticeArr as $n){
			?>
				<ul class="board_content">
					<li class="board_li_1"><?php echo $n['no']?></li>
					<li class="board_li_2"><?php echo $n['wcate']?></li>
					<li class="board_li_3"><a href="#none" onclick="viewNotice('<?php echo $n['no']?>')"><?php echo $n['wtitle']?></a></li>
					<li class="board_li_4"><?php echo substr($n['regdate'],2,8)?></li>
				</ul>
			<?php
				}
			?>

<!-- 				<ul class="board_content"> -->
<!-- 					<li class="board_li_1"><span class="important1">중요</span></li> -->
<!-- 					<li class="board_li_2"><a href="#none">공지사항 타이틀 입니다.</a></li> -->
<!-- 					<li class="board_li_3">2017.05.01</li> -->
<!-- 				</ul> -->
<!-- 				<ul class="board_content"> -->
<!-- 					<li class="board_li_1">3</li> -->
<!-- 					<li class="board_li_2"><a href="#none">공지사항 타이틀 입니다.</a></li> -->
<!-- 					<li class="board_li_3">2017.05.01</li> -->
<!-- 				</ul> -->
<!-- 				<ul class="board_content"> -->
<!-- 					<li class="board_li_1">2</li> -->
<!-- 					<li class="board_li_2"><a href="#none">공지사항 타이틀 입니다.</a></li> -->
<!-- 					<li class="board_li_3">2017.05.01</li> -->
<!-- 				</ul> -->
<!-- 				<ul class="board_content"> -->
<!-- 					<li class="board_li_1">1</li> -->
<!-- 					<li class="board_li_2"><a href="#none">공지사항 타이틀 입니다.</a></li> -->
<!-- 					<li class="board_li_3">2017.05.01</li> -->
<!-- 				</ul> -->
		

			</div>
			<div class="paging">
				<?php include_once "trip_notice_paging.php"?>
			</div>
		</div>
	</div>

<?php include "hm_foot.php"; ?> <script type="text/javascript"> $(function(){ $(".prev").attr("href","#none"); $(".next").attr("href","#none"); }) </script>

<?php
	}//최고관리자 권한 종료
	else{
		
		echo "<script>alert('로그인하십시오');location.href='hm_index.php';</script>";
	}
?>