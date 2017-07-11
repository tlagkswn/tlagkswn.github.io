<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/command/hm_filter.php" ?>
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
   <style type="text/css">
	.quick{position:absolute;right:-200px;top:0;width:150px;font-size:14px;text-align:center;}
	.quick li p{margin-top:10px;}
	.quick li{float:none;width:100%;margin-top:30px;}
	.quick li img{width:75%;}
	.quick .small_img img{width:50%;}

	.back{background-color:rgba(0,0,0,0.8);width:100%;position:fixed;left:0;top:0;z-index:100000;width:100%}
	.back{display:none;}
	.back p{width:100%;height:100%;position:relative;}
	.back p img{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)}
   </style>
  <script>
		$(function(){
			$(".back").height($(window).height());
			$(".back").click(function(){
				$(this).css({"display":"none"})
			})


			var height0 = $("#header").height();
			var height1 = $(".visual").height();
			var height2 = height0+height1;
			$(window).scroll(function(){
			
				var scroll0 = $(window).scrollTop();
				
				
				if(scroll0>height2){
					$(".quick").css({"top":scroll0-height2})
				}else{
					$(".quick").css({"position":"static","left":"auto"})
					$(".quick").css({"position":"absolute","right":"-200px","top":"0"})
				}

			})

			$(".kako_quick").click(function(){
				$(".back").css({"display":"block"})
			})
		})

		var link = document.location.href;
		//alert(link)
		if(link=="http://twkmall.co.kr/_innermall/urgent_dev.php"){
			location.href="http://twkmall.co.kr/_innermall/urgent.php?page=1&cityno=&order=price&dday=&tourno=";
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
				<div id="search_area_in" style="position:relative;">
					<div class="search_area_left">
						<div class="search_area_head">
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
									$airComArr = listPackageCompanyUrgent($conn);
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
					<div class="quick">
						<ul>
						<!--
							<li class="small_img">
								<a href="http://samsungfiretw.modetour.co.kr/event/timesale/timesale.aspx?mloc=07&eidx=6203&eidx=6203" target="_blank">
									<img src="/_innermall/eventadm/command/fileup/hmright_ad/170526145335.png" alt="" />	
								</a>
								<p>
									<span class="color_orange">TODAY’s TIME SALE</span><br/>
									선착순 한정판매!
								</p>
							</li>
							-->
							<li class="small_img kako_quick">
								<a href="#none">
									<img src="/_innermall/eventadm/command/fileup/hmright_ad/170526145320s.png" alt="" />	
								</a>
								<p>
									<strong>카카오톡 친구신청</strong><br/>
									친구맺고 혜택받자!
								</p>
							</li>
							<span class="i_post" onclick="hm_post('hmright_ad',1);"><?php echo $i_edit?></span>
						</ul>
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
								$n_wevent = '<span class="icon_1">HOT세일</span>';
							}
							else if($n['wevent'] == '2'){
								$n_wevent = '<span class="icon_2">긴급특가</span>';
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
						<td style="text-align:left;">
							<div style="width:95%;margin:0 auto;">
								<div class="height_for0" style="display:inline-block;width:33%;float:left;position:relative;"><p style="width:100%;position:absolute;left:0;top:53%;transform:translate(0,-50%)"><?php echo $n_wevent?></p></div>
								<p style="display:inline-block;width:67%;float:left" class="height_for"><?php echo $n['wtitle']?></p>
								<?php
											//관리자 로그인일 경우
								if($s_adlevel == 1 || ($s_adlevel == 3 && $n['rcode'] == $s_rcode)){
								?>
								<div align="right">
									<a href="#none" onclick="write_urgent(2,<?php echo $n['no']?>);" class="small0">[수정]</a> | 
									<a href="#none" onclick="delete_urgent('<?php echo $n['no']?>' , '<?php echo $n['rcode']?>');" class="small0">[삭제]</a>
								</div>
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
	<div class="back">
		<p><img src="/_innermall/eventadm/command/fileup/hmright_ad/170526145320ss.jpg" alt="kakao_qu" /></p>
	</div>
 </body>
</html>

<?php include_once "eventadm/command/dbconn/exit_db.php" ?>
<script type="text/javascript">
	$(".height_for0").height($(".height_for").height())
</script>