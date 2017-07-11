<?php include_once "eventadm/command/dbconn/conn_db.php" ?>
<?php include_once "eventadm/ckSessionStand.php"?>
<?php include_once "eventadm/command/hm_filter.php" ?>
<?php include_once "eventadm/command/hm_trip_load.php" ?>
<?php include_once "eventadm/command/hm_staff_load.php" //임직원 api 로드 ?>
<?php include_once "eventadm/hm_dataheader.php"?>
<?php include_once "eventadm/command/hmload.php" ?>
<?php include_once "eventadm/hm_apply_header.php"?>
<!doctype html>
<html lang="kor">
 <head>
  <meta charset="UTF-8">
  <title>한미 출장 시스템</title>
 <link rel="stylesheet" href="css/jquery-ui.css">
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery_1.114.js"></script>
  <script src="js/hm_main2.js"></script>
  <script src="js/jquery.bxslider.js"></script>
  <link rel="stylesheet" href="css/hm_main2.css" />
  <link rel="stylesheet" type="text/css" href="css/bx_slider2.css">
 </head>
 <body>
	<div id="hm_wrap">
		<div id="header">
			<div id="header_in">
				<h1>한미 출장 시스템 </h1>
				<div>
				<!--
					<a href="#"><img src="img/hm/point.png" alt="point" /></a>	
					<span class="header_line"><img src="img/hm/line.png" alt="line" /></span>
					-->
				<?php
					//4 = HM Account
					
					if($s_adlevel == 1 || $s_adlevel == 4 && $s_wid != "" && $s_wid != null){ //로그인 여부
				?>
				<span class="who_am_i">
				<?php if($s_adlevel == 1){
					echo $s_wid;
				}
				else{
					echo base64_decode(urldecode($s_wid));
				}
				?>
				
				</span>
					<a href="eventadm/hm_logout.php"><img src="img/hm/log_out.png" alt="log_out" /></a>
				<?php
				} //
				?>
				</div>	
			</div>
		</div>