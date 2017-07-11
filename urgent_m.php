<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/command/hm_filter.php" ?>
<?php include_once "eventadm/command/hm_package_load.php" ?>
<?php include_once "eventadm/hm_dataheader.php"?>
<?php include_once "eventadm/ckSessionStand.php"?>
<!doctype html>
<html lang="kor">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery_1.114.js"></script>
  <script src="js/urgent.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <script type="text/javascript" src="js/hm_main.js"></script>
  <title>해외 패키지 마감 임박 상품</title>
  <link rel="stylesheet" href="css/urgent_m.css" />
  <script type="text/javascript">
	$(function(){
		$(window).load(function(){
			var height0 = $(".main_Area_in1_li").height();
			$(".main_Area_in1_btn").height(height0);
		})

		$(".main_Area_in0 a").click(function(){
			$(".main_Area_in0 a").css({"background-color":"#fff","color":"#666"})
			$(this).css({"background-color":"#bfbfbf","color":"#fff"})
		})
					
	})
  </script>
 </head>
 <body>
	<div>
		<div id="wrap_urgent_m">
			<div id="header">
				<h1>해외 패키지 마감 임박 상품</h1>
			</div>
			<div id="container">
				<div id="search_Area">
					<div>
					<form name="" action="" method="get" >
						<p class="search_Area0 search_Area_in">
							<select name="" id="search_nation_m" class="search_nation_m">
							
								<option value="0">나라 선택하기</option>
							<?php
								$nationArr = listNation($conn);
								$selectedCityOne = selectedCityOne($conn, $cityno); // 도시 정보
								$selectedCityArr = selectedCityList($conn, $cityno); //선택된 도시 목록 리스트
								
								$packageArr = listPackage($conn,$page,$cityno,$order,$dday,$dday2,$tourno);//작성된 글 리스트
								$countall = getAllPackage($conn, $page,$cityno,$dday,$dday2,$tourno); 
								
								foreach($nationArr as $n){
							?>
								<option value="<?php echo $n['nation']?>"  <?php if($n['nation'] == $selectedCityOne['nation']){ echo " selected "; }?> >
									<?php echo $n['nation']?>
								</option>
							<?php
								}
							?>
							</select>
<!-- 					-->
						</p>
						<p class="search_Area0 search_Area_in" style="margin-top:3%;">
							<select name="cityno" id="search_city_m" class="search_city_m">
							<?php
								//도시번호 존재
								if($cityno != 0){
									foreach($selectedCityArr as $n){
							?>
								<option value="<?php echo $n['no']?>" <?php if($n['no'] == $cityno){ echo " selected"; }?> >
									<?php echo $n['city']?> 
								</option>
							<?php
									} //foreach Fin
								}else{	 
							?>
								<option value="0">도시 선택하기</option>
							<?php } ?>
							</select>
						</p>
						<div class="search_Area1 search_Area_in">
							<p>
								<input type="text" value="<?php echo $dday?>" class="date_picker" name="dday" placeholder="출발일"/>
							</p>
							<p class="search_Area1_last">
								<input type="text" value="<?php echo $dday2?>"class="date_picker" name="dday2" placeholder="도착일"/>
							</p>
						</div>
						<p class="search_Area2 search_Area_in">
							<input type="submit" value="Search"/>
							<a href="?"><input type="button" value="Reset"></a>
						</p>
						</form>
					</div>
				</div>
				<div class="num_Area">
					<p>
						<span class="orange_color">총 <?php echo $countall?>개</span>의 항공편이 있습니다.
					</p>
				</div>
				<div class="main_Area">
					<div class="main_Area_in">
						<div class="main_Area_in0">
							<p></p>
							<div>	
								<a href="?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=reg&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>" <?php if($order=='reg' || $order == ''){ echo " class='active'"; }?> >등록일순</a>
								<a href="?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=price&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>" <?php if($order=='price'){ echo " class='active'"; }?> >최저가순</a>
								<a href="?page=<?php echo $page?>&cityno=<?php echo $cityno?>&order=depart&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>" <?php if($order=='depart'){ echo " class='active'"; }?> >출발일순</a>
							</div>
						</div>
						<div class="main_Area_in1">
							<ul>
							<?php
							
								if(empty($packageArr))
								{
								}
								else
								{
								foreach($packageArr as $n){
									$n_departdate = substr($n['departdate'],2);
									$n_arrivedate = substr($n['arrivedate'],5);
									$n_depart_m = sprintf("%02d",$n['depart_m']);
									$n_depart_h = sprintf("%02d",$n['depart_h']);
							
							?>
								<li>
									<div class="main_Area_in1_li">
										<div>
											<em class="color_orange_border"><?php echo $n_departdate?> 출발</em><span>|</span>
											<em><?php echo $n['fromcity']?></em><span>|</span>
											<em><?php echo $n['city']?> 도착</em>
										</div>
										<div class="main_Area_in1_center">
											<?php echo $n['wtitle']?>   
										
										</div>
										<div class="main_Area_in1_last">
											<em><?php echo $n['airname']?></em><span>|</span>
											<em><?php echo $n['tourname']?></em><span>|</span>
											<em><?php echo $n['period1']?>박<?php echo $n['period2']?>일</em>
										</div>
										<p class="color_navy"><?php echo number_format($n['price'])?>원</p>
									</div>
									<p class="main_Area_in1_btn">
										<a href="<?php echo $n['wlink']?>" target="_blank"><img src="img/mall/right_arrow.png" alt="" /></a>	
									</p>
								</li>
							<?php
								}//foreach
							}//if Fin
							?>
							</ul>
						</div>
					</div>
				</div>
			<!--  Paging-->
				<div class="paging">
				<?php include_once "urgent_paging.php"?>
				</div>
				
			
			<!-- Paging Fin -->
			</div>
		</div>
	</div>
 </body>
</html>
