<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/command/hm_package_load.php" ?>
<?php include_once "eventadm/hm_dataheader.php"?>
<?php include_once "eventadm/ckSessionStand.php"?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery_1.114.js"></script>
  <script src="js/urgent.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <title>해외 패키지 마감 임박 상품</title>
   <link rel="stylesheet" href="/_innermall/css/urgent.css" />
  <script>
		
		var link = document.location.href;
		//alert(link)
		if(link=="http://twkmall.co.kr/_innermall/urgent.php"){
			location.href="http://twkmall.co.kr/_innermall/urgent.php?order=depart";
		}
  		var mobileKeyWords = new Array('iPhone', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'Windows CE;', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson', 'Mobile', 'Symbian', 'Opera Mobi', 'Opera Mini', 'IEmobile');
		for (var word in mobileKeyWords){ 
			if (navigator.userAgent.match(mobileKeyWords[word]) != null)
			{
				window.location.href = "/_innermall/urgent_m.php";
				break;
			}
		}
  </script>
 </head>
 <body>
	<div id="wrap">
		<div id="header">
			<h1>해외 패키지 마감 임박 상품</h1>
			
		</div>
		<div id="container_wrap">
			<div id="search_area">
				<div id="search_area_in">
					<div class="search_area_left">
						<div class="search_area_head">
<!-- 							<a href="#none">전체보기</a><span class="line">|</span><a href="#none">해외패키지(<span>459</span>)</a><span class="line">|</span><a href="#none">자유여행(<span>18</span>)</a> -->
						</div>
						<div class="search_area_body">
							<ul class="search_area_body_left">
								<li><a href="#none">전체보기</a></li>
							<?php
								$nationArr = listNation($conn);
								$cityArr = listCity($conn);
								foreach($nationArr as $n){
							?>
									<li><a href="#none"><?php echo $n['nation']?>(<span><?php echo $n['ncount']?></span>)</a></li>
							<?php
							}
							?>
					
							</ul>
							<div class="search_area_body_right">
								<ul>
									<li><a href="?page=1">전체보기</a></li>
							<?php								
								foreach($cityArr as $n){
							?>
									<li>
									<a href="?page=1&cityno=<?php echo $n['no']?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><?php echo $n['city']?>(<span><?php echo $n['ncount']?></span>)</a>
									</li>
							<?php
								}
							?>
								</ul>
							</div>
						</div>
					</div>
					<div class="serch_area_right">
					<form action="" method="get">
						<input type="hidden" name="page" value="1"/>
						<input type="hidden" name="cityno" value="<?php echo $cityno?>" />
						<input type="hidden" name="order" value="<?php echo $order?>" />
						<input type="hidden" name="dday" value="<?php echo $dday?>">
						<div class="serch_aserch_area_right0">
							
							출발일 <input type="text" id="depart" value="<?php echo $dday?>"/>
						</div>
						<div class="serch_aserch_area_right1">
							<div class="container" id="container">
							  <div class="curr-month"><b></b></div>
							  <div class="all-days">
								<ul></ul>
							  </div>
							  <div class="all-date">
								<ul></ul>
							  </div>
							</div>
						</div>
						<div class="serch_aserch_area_right2">
							여행사
							<select name="tourno" id="tour">
								<option value="0">전체</option>
								<?php
									$airComArr = listPackageCompany($conn);
									foreach($airComArr as $n){
								?>
										<option value="<?php echo $n['no']?>" <?php if($tourno == $n['no']){ echo "selected"; } ?>  >
											<?php echo $n['wcname']?>
										</option>
								<?php
									}
								?>
							</select>
							<input type="submit" class="search_area_submit" value="Search">
							<a href="?"><input type="button" class="search_area_reset" value="Reset"></a>
						</div>
					</form>
					</div>
				</div>	
			</div>
			<div class="search_area_title">
				<?php
					$city = getCity($conn,$cityno);
					$countall = getAllPackage($conn, $page,$cityno,$dday,$dday2,$tourno); 
				?>
				<h3><?php echo getCity($conn,$cityno)?> (<?php echo $countall?>개) </h3>
				<div class="search_area_title_right">
					<span><input type="radio" name="radio_btn" title="등록일순" onClick="window.location ='?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=reg&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>';" <?php if($order == '' || $order == 'reg'){ echo 'checked'; }?> /> 등록일순
					</span>
					<span><input type="radio" name="radio_btn" title="최저가순" onClick="window.location ='?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=price&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>';" <?php if($order == 'price'){ echo 'checked'; }?> /> 최저가순
					</span>
					<span class="start_btn"><input type="radio" name="radio_btn" title="출발일순" onClick="window.location ='?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=depart&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>';" <?php if($order == 'depart'){ echo 'checked'; }?> />출발일순
					</span>
				</div>
			</div>
		<!--
			<div class="search_area_content">
				<ul>
				
				<?php

					$packageArr = listPackage($conn,$page,$cityno,$order,$dday,$tourno);
					if(empty($packageArr)){
							?>
						<li>
						<div class="search_area_content_li_in">
							<div class="search_area_content_comm">
								<div class="search_area_content_comm0_in">
									<p><strong>등록된 패키지가 없습니다.</strong></p>
									
								</div>
							</div>
						
						</div>
						</li>
				<?php
					}else{
					foreach($packageArr as $n){
				?>
					<li>
						<div class="search_area_content_li_in">
							<div class="search_area_content_comm">
								<div class="search_area_content_comm0_in">
									<p><strong>[<?php echo $n['city']?>]</strong> <?php echo $n['wtitle']?> 
									<?php echo $n['period1']?>박<?php echo $n['period2']?>일</p>
									<p class="departure"><em>출발일 : <?php echo $n['departdate']?></em><span class="line2">|</span>
									<?php echo $n['tourname']?><span class="line2">|</span><span><?php echo $n['airname']?></span></p>
									<?php
										//관리자 로그인일 경우
										if($s_adlevel == 1 || ($s_adlevel == 3 && $n['rcode'] == $s_rcode)){
									?>
									<p class="modify">
										<span>
											<a href="#none" onclick="write_urgent(2,<?php echo $n['no']?>);">[수정]</a> | 
											<a href="#none" onclick="delete_urgent('<?php echo $n['no']?>' , '<?php echo $n['rcode']?>');">[삭제]</a>
										</span>
									</p>
									<?php
										}
									?>
								</div>
							</div>
							<div class="search_area_content_comm search_area_content_comm1">
								<?php echo number_format($n['price'])?>원 
							</div>
							<div class="search_area_content_comm">
								<a href="<?php echo $n['wlink']?>" target="_blank"><img src="img/hm/u_arrow_right.png" alt="u_arrow_right" /></a>
							</div>
						</div>
					</li>
				<?php
							}//foreach
						}//if not empty
				?>
				</ul>

			</div>
		-->
			<div class="table_new_wrap">
				<table style="text-align:center;" class="table_new">
					<tr>
						<th width="13%">
							출발일/도착일
						</th>
						<th width="8%">
							출발지
						</th>
						<th width="8%">
							목적지
						</th>
						<th width="10%">
							여행사
						</th>
						<th width="10%">
							항공사
						</th>
						<th width="7%"> 
							일정
						</th>
						<th width="28%">
							상품명
						</th>
						<th width="10%">
							요금
						</th>
						<th width="9%">
							상세보기
						</th>
					</tr>
				<?php
					$packageArr = listPackage($conn,$page,$cityno,$order,$dday,$dday2,$tourno);
					if(empty($packageArr)){
					}else{
						foreach($packageArr as $n){
							$n_departdate = substr($n['departdate'],2);
							$n_arrivedate = substr($n['arrivedate'],2);
							$dayname_arr = array("일","월","화","수","목","금","토");
							$depart_dayname = $dayname_arr[date('w', strtotime($n['departdate']))]; //출발 요일
							$arrive_dayname = $dayname_arr[date('w', strtotime($n['arrivedate']))]; //도착 요일
							$n_depart_m = sprintf("%02d",$n['depart_m']);
							$n_depart_h = sprintf("%02d",$n['depart_h']);	
							$n_arrive_m = sprintf("%02d",$n['arrive_m']);
							$n_arrive_h = sprintf("%02d",$n['arrive_h']);
							
							$n_wevent = '';
							if($n['wevent'] == '1'){
								$n_wevent = '<span class="icon_1">출발확정</span>';
							}
							else if($n['wevent'] == '2'){
								$n_wevent = '<span class="icon_2">시선집중</span>';
							}
							else if($n['wevent'] == '3'){
								$n_wevent = '<span class="icon_3">특급세일</span>';
							}
									
							
				?>
					<tr class="align_left">
						<td>
							<p class="orange_color"><?php echo $n_departdate?>(<?php echo $depart_dayname?>) <?php echo $n_depart_h?>:<?php echo $n_depart_m?></p>
							<p><?php echo $n_arrivedate?>(<?php echo $arrive_dayname?>) <?php echo $n_arrive_h?>:<?php echo $n_arrive_m?></p>
						</td>
						<td>
							<?php echo $n['fromcity']?>
						</td>
						<td>
							<p>[<?php echo $n['nation']?>]</p>
							<p><?php echo $n['city']?></p>
						</td>
						<td>
							<?php echo $n['tourname']?>
						</td>
						<td>
							<?php echo $n['airname']?>
						</td>
						<td>
							<?php echo $n['period1']?>박<?php echo $n['period2']?>일
						</td>
						<td style="text-align:left;t">
							<div style="width:95%;margin:0 auto">
								<?php echo $n_wevent?><?php echo $n['wtitle']?>
								<?php
											//관리자 로그인일 경우
								if($s_adlevel == 1 || ($s_adlevel == 3 && $n['rcode'] == $s_rcode)){
								?>
									<a href="#none" onclick="write_urgent(2,<?php echo $n['no']?>);" class="small0">[수정]</a> | 
									<a href="#none" onclick="delete_urgent('<?php echo $n['no']?>' , '<?php echo $n['rcode']?>');" class="small0">[삭제]</a>
									
								<?php
											}
								?>
							</div>
						</td>
						<td class="navy_color">
							<?php echo number_format($n['price'])?>원
						</td>
						<td>
							<a href="<?php echo $n['wlink']?>" target="_blank"><img src="img/hm/u_arrow_right.png" alt="u_arrow_right" /></a>
						</td>
					</tr>
				<?php
							
						}//for Fin
					}
				?>
				
					
				</table>
			</div>
			<div class="paging" style="position:relative;">
			<?php include_once "urgent_paging.php"?>
				
			</div>
			<div class="search_login" style="position:absolute;right:0;bottom:0;">
				<h5><?php echo $s_wcname?></h5>
				 <a href="<?php echo $a_link?>"><h3><?php echo $admin?></h3></a>
			</div>
		</div>
		
	</div>
 </body>
</html>

<?php include_once "eventadm/command/dbconn/exit_db.php" ?>