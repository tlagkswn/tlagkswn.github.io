<?php	include_once ("eventadm/ckSession.php");?>
<?php	include_once ("eventadm/command/dbconn/conn_db.php");?>
<?php	include_once ("eventadm/command/wload.php");?>
<?php	include_once ("eventadm/command/hmload.php");?>
<?php
	$scode = $_GET['scode']; //회사식별코드 indexOpen.js를 통해 받아옴.
	$type = $_GET['type']; //상품 카테고리 indexOpen.js를 통해 받아옴.
	$no = $_GET['no']; //수정 번호
	$mall = $_GET['mall']; //mall 여부
	//mall 이 hm 이면 한미IT 몰로 간주

	$proc = $_GET['proc']; // 글 상태(w: 쓰기 / e: 수정) indexOpen.js를 통해 받아옴.
	if($s_adlevel ==1 || ($s_adlevel ==2 && $s_scode == $scode) || $s_adlevel == 3){ //관리자 권한 정보 검증
		//s_adlevel , s_scode 는 ckSession에서 정해준 $_SESSION 값임.
		
		$required = "";

		if($proc == "w" || $proc == "" || $proc == NULL) //글쓰기 상태
		{
			$proc = 'w';
			$required = " required "; //글 작성시 필요한 조건
		}
		//한미 Mall인 경우
		if($mall == "hm")
		{
			//$scode = "hm";
		}
	
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <script src="js/jquery-1.12.4.min.js"></script>
  <title>File Edit</title>
  <link rel="stylesheet" type="text/css" href="css/updatePage.css">
  <link rel="stylesheet" type="text/css" href="/css/font/notosans.css?v=1" media="screen" />
 </head>
 <body>
	<form action="eventadm/command/upload_data.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="type" value="<?php echo $type?>">
	<input type="hidden" name="scode" value="<?php echo $scode?>">
	<input type="hidden" name="proc" value="<?php echo $proc?>">
	<input type="hidden" name="no" value="<?php echo $no?>">
	<input type="hidden" name="mall" value="<?php echo $mall?>">
	<?php
	//HM MALL 이 아닌 삼성카드 몰은 1등급 2등급 관리자만 수정이 가능
	 
		if($type == "mainbig"){ //회사 배경 로고 Big 이미지 company
			$mainbigArr = findMainbigLogo($conn, $scode);
	?>
		<div class="revise">
			<h3>로고를 수정하실 수 있습니다. <br />
			<span class="small">(<span class="red">*Pixel (PC) : 1920 * 500 권장 (Mobile) : 1000 * 604 권장 )</span></h3>
			<div style="padding:15px 0;">
				<label for="logo1">PC용1번: </label>
				<input type="file" name="logo1" >
				<a href="<?php echo $mainbigArr['new_logo1']?>" target="_blank"><?php echo $mainbigArr['logo1']?></a><br />

				<label for="logo2">PC용2번: </label>
				<input type="file" name="logo2" >
				<a href="<?php echo $mainbigArr['new_logo2']?>" target="_blank"><?php echo $mainbigArr['logo2']?></a><br />

				<label for="logo3">PC용3번: </label>
				<input type="file" name="logo3" >
				<a href="<?php echo $mainbigArr['new_logo3']?>" target="_blank"><?php echo $mainbigArr['logo3']?></a><br />
				
				<label for="logo1">모바일1번: </label>
				<input type="file" name="mlogo1" >
				<a href="<?php echo $mainbigArr['new_mlogo1']?>" target="_blank"><?php echo $mainbigArr['mlogo1']?></a><br />

				<label for="logo2">모바일2번: </label>
				<input type="file" name="mlogo2" >
				<a href="<?php echo $mainbigArr['new_mlogo2']?>" target="_blank"><?php echo $mainbigArr['mlogo2']?></a><br />

				<label for="logo3">모바일3번: </label>
				<input type="file" name="mlogo3" >
				<a href="<?php echo $mainbigArr['new_mlogo3']?>" target="_blank"><?php echo $mainbigArr['mlogo3']?></a><br />

				<label for="logo1">1번 링크 : </label>
				<input type="text" name="wlink1" maxlength="200" value="<?php echo $mainbigArr['wlink1']?>" placeholder="http://"><br />

				<label for="logo2">2번 링크 : </label>
				<input type="text" name="wlink2" maxlength="200" value="<?php echo $mainbigArr['wlink2']?>" placeholder="http://"><br />

				<label for="logo3">3번 링크 : </label>
				<input type="text" name="wlink3" maxlength="200" value="<?php echo $mainbigArr['wlink3']?>" placeholder="http://"><br />
			</div>
			<input type="submit" value="Submit">
		</div>
	
	<?php
		}else if($type =="mainhead"){
			$mainheadArr = findMainheadLogo($conn, $scode);
	?>
		<div class="revise">
			<h3>로고를 수정하실 수 있습니다. <span class="small">(<span class="red"> *Pixel : 188 * 50</span> 권장 )</span></h3>
			<input type="file" name="logo1" <?php echo $required?> >
			<a href="<?php echo $mainheadArr['new_logo1']?>" target="_blank"><?php echo $mainheadArr['logo1']?></a><br />
			<input type="submit" value="Submit">
		</div>
	
	<?php
		}else if($type == "best"){ // best
			$bestArr = findBestOne($conn,$no, $scode);
	
	?>
		<div class="revise">
			<h3>베스트 상품 수정<span class="small">(<span class="red">*Pixel : 201 * 134</span> 권장)</span></h3>
			<input type="file" name="logo1" <?php echo $required?> ><br />
			<a href="eventadm/command/fileup/<?php echo $type?>/<?php echo $bestArr['new_logo1']?>" target="_blank"><?php echo $bestArr['logo1']?></a>
			<!--type 안에 best가 들어감 (값은 indexOpen.js에서 가져왔음..)-->
			<div style="padding:15px 0;">
				<label for="wtitle">제목 : </label>
				<input type="text" placeholder="20자 이내" maxlength="20" name="wtitle" value="<?php echo $bestArr['wtitle']?>" required><br />
				
				<label for="wcontents">내용 : </label>
				<input type="text" placeholder="25자 이내" maxlength="25" name="wcontents" value="<?php echo $bestArr['wcontents']?>"required "><br />
				
				<span class="small">*숫자만 입력하십시오.</span><br />
				<label for="wprice1">가격1 : </label>
				<input type="text" name="wprice1" value="<?php echo $bestArr['wprice1']?>" required maxlength="10"><span class="small">( '원' 생략 )</span><br />
				
				<label for="wprice2">가격2 : </label>
				<input type="text" name="wprice2" value="<?php echo $bestArr['wprice2']?>" maxlength="10"><span class="small">( 생략 가능 )</span><br />
				
				<label for="wlink">링크 : </label><input type="text" name="wlink" value="<?php echo $bestArr['wlink']?>" required "><br />
			</div>
			<input type="submit" value="Submit" ><br />
		</div>
	
	<?php
		}else if($type == "plan"){ // plan	
			$planArr = findPlanOne($conn,$no, $scode);
			echo "<script>console.log('$scode')</script>"
			

	?>
		<div class="revise">
			<h3>기획 상품 수정<span class="small">(<span class="red"> *Pixel : 201 * 134</span> 권장 )</span></h3>
			<input type="file" name="logo1" <?php echo $required?> ><br />
			<!--
				$planArr['logo1'] = 오리지널 이미지 이름.
				$planArr['new_logo1'] = 변형시켜 업로드한 이미지 이름.
			-->
			<a href="eventadm/command/fileup/<?php echo $type?>/<?php echo $planArr['new_logo1']?>" target="_blank"><?php echo $planArr['logo1']?></a>
			<div style="padding:15px 0;">
				<label for="wtitle">제목 : </label>
				<input type="text" placeholder="20자 이내" maxlength="20" name="wtitle" value="<?php echo $planArr['wtitle']?>" required><br />
				
				<label for="wcontents">내용 : </label>
				<input type="text" placeholder="25자 이내" maxlength="25" name="wcontents" value="<?php echo $planArr['wcontents']?>"required "><br />
				
				<span class="small">*숫자만 입력하십시오.</span><br />
				<label for="wprice1">가격1 : </label>
				<input type="text" name="wprice1" value="<?php echo $planArr['wprice1']?>" required maxlength="10"><span class="small">( '원' 생략 )</span><br />
				
				<label for="wprice2">가격2 : </label>
				<input type="text" name="wprice2" value="<?php echo $planArr['wprice2']?>" maxlength="10"><span class="small">( 생략 가능 )</span><br />
				
				<label for="wlink">링크 : </label><input type="text" name="wlink" value="<?php echo $planArr['wlink']?>" required "><br />
			</div>
			<input type="submit" value="Submit" ><br /> 
		</div>
	
	<?php
		}else if($type == "partner"){ // plan
		 $partnerArr = findPartnerOne($conn,$no, $scode);
	?>
		<div class="revise revise3">
			<h3>제휴사 특별 상품 수정</h3>
			
			<span class="small">로고 (<span class="red" style="font-size:13px;"> *Pixel : 600 * 342</span> 권장 )</span><br />
			<input type="file" name="logo1" <?php echo $required?> ><br />
			<a href="eventadm/command/fileup/<?php echo $type?>/<?php echo $partnerArr['new_logo1']?>" target="_blank"><?php echo $partnerArr['logo1']?></a>
			
			<span class="small">우측 이미지 (<span class="red"> *Pixel : 150 * 34</span> 권장 )<br/></span>
			<input type="file" name="logo2" <?php echo $required?> ><br />
			<a href="eventadm/command/fileup/<?php echo $type?>/<?php echo $partnerArr['new_logo2']?>" target="_blank"><?php echo $partnerArr['logo2']?></a>

			<div style="padding:15px 0;">
				<label for="wtitle">제목 : </label><input type="text" value="<?php echo $partnerArr['wtitle']?>" name="wtitle" maxlength="18" required style="width:250px;"><br />
				<label for="wcontents1">
				내용1 : </label><input type="text" value="<?php echo $partnerArr['wcontents1']?>" maxlength="30" name="wcontents1" required ><br />
				<label for="wcontents2">
				내용2 : </label><input type="text" value="<?php echo $partnerArr['wcontents2']?>" maxlength="30" name="wcontents2" ><br />
				<label for="wcontents3">
				내용3 : </label><input type="text" value="<?php echo $partnerArr['wcontents3']?>" maxlength="30" name="wcontents3" ><br />
				<label for="wcontents4">
				내용4 : </label><input type="text" value="<?php echo $partnerArr['wcontents4']?>" maxlength="30" name="wcontents4" ><br />
				<label for="wcontents5">
				내용5 : </label><input type="text" value="<?php echo $partnerArr['wcontents5']?>" maxlength="30" name="wcontents5" ><br />
				
				<label for="wtel">
				연락처 : </label><input type="text" value="<?php echo $partnerArr['wtel']?>" maxlength="30" name="wtel" ><br />

			

				<label for="wlink">링크 : </label><input type="text" value="<?php echo $partnerArr['wlink']?>" name="wlink" required ><br />
			</div>
			<input type="submit" value="Submit" ><br />
		</div>
	<?php
		}else if($type == "recommend"){ // Recommend
			
			$pos = (int)$_GET['pos'];
			$recommendArr = findRecommendOne($conn,$no,$scode);
	?>
		<div class="revise">
			<input type="hidden" name="pos" value="<?php echo $pos?>">
			<h3>추천 상품 수정</h3>
				<label for="logo1">제목 : </label>
				<input type="text" name="wtitle" value="<?php echo $recommendArr['wtitle']?>" required style="color:#aaa;font-size:12px;"><br />
				<span class="small">로고 &nbsp;&nbsp;( <span class="red">*Pixel : 270 * 238</span> 권장 )</span><br />
				<input type="file" name="logo1" <?php echo $required?> ><br />
				
				<a href="eventadm/command/fileup/<?php echo $type?>/<?php echo $recommendArr['new_logo1']?>" target="_blank">
				<?php echo $recommendArr['logo1']?></a>
				
				<div style="padding:15px 0;">
					<label for="logo1">장소명 : </label>
					<input type="text" value="<?php echo $recommendArr['wsubtitle']?>" name="wsubtitle" maxlength="10" required ><br />
					<label for="logo1">회사명 : </label>
					<input type="text" value="<?php echo $recommendArr['wtour']?>" name="wtour" maxlength="10" required ><br />
					<label for="logo1">연락처 : </label>
					<input type="tel" value="<?php echo $recommendArr['wtel']?>" name="wtel" placeholder = "- 포함해서 입력" required><br />
					<label for="logo1">링크 : </label>
					<input type="text" value="<?php echo $recommendArr['wlink']?>" name="wlink" required ><br />
				</div>
			<input type="submit" value="Submit" ><br />
		</div>
	
	<?php
		}else if($type == "sidebar"){ // Sidebar
			
			$sidebarArr = findSidebarLogo($conn, $scode);
	?>
		<div class="revise revise4">
			<h3>로고를 수정하실 수 있습니다. (<span class="red" style="font-size:13px;"> *Pixel : 100 * 70</span> 권장 )</h3>
			<div style="padding:15px 0;">
				<label for="logo1">이미지1 : </label><input type="file" name="logo1">
				<a href="<?php echo $sidebarArr['new_logo1']?>" target="_blank"><?php echo $sidebarArr['logo1']?></a><br />
				<label for="logo2">이미지2 : </label><input type="file" name="logo2">
				<a href="<?php echo $sidebarArr['new_logo2']?>" target="_blank"><?php echo $sidebarArr['logo2']?></a><br />
				<label for="exp1">이미지1 설명 : </label>
					<textarea name="exp1" required maxlength="40" class="help_text2" placeholder="30자 이내"><?php echo $sidebarArr['exp1']?></textarea><br />
				<label for="exp2">이미지2 설명 : </label>
					<textarea name="exp2" required maxlength="40" class="help_text2" placeholder="30자 이내"><?php echo $sidebarArr['exp2']?></textarea><br />
				<label for="wlink1">이미지1 링크 : </label><input type="text" value="<?php echo $sidebarArr['wlink1']?>" name="wlink1" required><br />
				<label for="wlink2">이미지2 링크 : </label><input type="text" value="<?php echo $sidebarArr['wlink2']?>" name="wlink2"><br />
			</div>
				<input type="submit" value="Submit">
			
		</div>
	
	<?php
		}else if($type == "special"){ // Special
			$pos = (int)$_GET['pos'];
			$specialArr = findSpecialLogo($conn, $scode , $pos);
	?>
		
			<input type="hidden" name="pos" value="<?php echo $pos?>">
		<div class="revise revise6">
			<h3>임직원 혜택 서비스를 수정하실 수 있습니다.</h3>
			
			<label for="logo1">서비스명 : </label><input type="text" name="wtitle" value="<?php echo $specialArr['wtitle']?>" maxlength="20"><br />
			<label for="logo1">연락처1 : </label><input type="text" name="wtel1" value="<?php echo $specialArr['wtel1']?>"  maxlength="20"><br />
			<label for="logo1">연락처2 : </label><input type="text" name="wtel2" value="<?php echo $specialArr['wtel2']?>"  maxlength="20"><br />
			<label for="logo1">연락처3 : </label><input type="text" name="wtel3" value="<?php echo $specialArr['wtel3']?>"  maxlength="20"><br />
			<label for="logo1">연락처4 : </label><input type="text" name="wtel4" value="<?php echo $specialArr['wtel4']?>"  maxlength="20"><br /><br />
			
			<span class="small">하단 이미지 목록 &nbsp;&nbsp;&nbsp;(<span class="red" style="font-size:13px;"> *Pixel : 100 * 100</span> 권장 )</span><br />
			
			<label for="logo1">이미지1 : </label><input type="file" name="logo1">
			<a href="<?php echo $specialArr['new_logo1']?>" target="_blank">
			<?php echo $specialArr['logo1']?></a><br />
			
			<label for="logo1">이미지2 : </label><input type="file" name="logo2">
			<a href="<?php echo $specialArr['new_logo2']?>" target="_blank">
			<?php echo $specialArr['logo2']?></a><br />
			
			<label for="logo1">이미지3 : </label><input type="file" name="logo3">
			<a href="<?php echo $specialArr['new_logo3']?>" target="_blank">
			<?php echo $specialArr['logo3']?></a><br />
			
			<label for="logo1">이미지4 : </label><input type="file" name="logo4">
			<a href="<?php echo $specialArr['new_logo4']?>" target="_blank">
			<?php echo $specialArr['logo4']?></a><br />
			<br />
			
			<label for="logo1">이미지1 링크 : </label><input type="text" value="<?php echo $specialArr['wlink1']?>" name="wlink1"><br />
			<label for="logo1">이미지2 링크 : </label><input type="text" value="<?php echo $specialArr['wlink2']?>" name="wlink2"><br />
			<label for="logo1">이미지3 링크 : </label><input type="text" value="<?php echo $specialArr['wlink3']?>" name="wlink3"><br />
			<label for="logo1">이미지4 링크 : </label><input type="text" value="<?php echo $specialArr['wlink4']?>" name="wlink4"><br />
			<input type="submit" value="Submit" style="margin-top:15px;">
		</div>
	
	<?php
		}else if($type =="help"){
		$helpArr = findHelpLogo($conn, $scode);
	?>
		<div class="revise">
			<h3>긴급연락처 정보를 수정하실 수 있습니다.</h3>
			<span class="small">이미지(<span class="red"> *Pixel : 100 * 70</span> 권장 ). </span><br />
			<input type="file" name="logo1"><br />
			<a href="<?php echo $helpArr['new_logo1']?>" target="_blank"><?php echo $helpArr['logo1']?></a>
			<div style="padding:15px 0;">
				<label for="wtitle" style="margin-top:-30px;">내용 : </label>
					<textarea name="wtitle" class="help_text" maxlength="60" required><?php echo $helpArr['wtitle']?></textarea><br />
				<label for="wtel">연락처 : </label>
					<input type="text" maxlength="30" value="<?php echo $helpArr['wtel']?>" name="wtel" required><br />
			</div>
			<input type="submit" value="Submit">
		</div>
	<?php
		}else if($type =="snsurl"){
			$snsurlArr = findSnsurlForm($conn, $scode);
	?>
		<div class="revise revise4">
			<h3>SNS 링크 정보를 수정하실 수 있습니다.</h3>
				<div style="padding-bottom:15px;">
					<label for="wtel">페이스북 (Link) : </label>
					<input type="text" value="<?php echo $snsurlArr['wlink_fb']?>" name="wlink_fb" maxlength="100" required><br />
					<label for="wtel">블로그 (Link) : </label>
					<input type="text" value="<?php echo $snsurlArr['wlink_bl']?>" name="wlink_bl" maxlength="100" required><br />
				</div>
			<input type="submit" value="Submit">
		</div>
	<?php 
		}else if($type == "sfooter"){ ///해외 패키지 상품 7%
		$sfooterArr = findSfooterForm($conn, $scode);
	?>
		<div class="revise revise4">
			<h3>하단 내용을 수정하실 수 있습니다.</h3>
				<div style="padding-bottom:15px;">
					<label for="wtitle">제목 : </label><input type="text" value="<?php echo $sfooterArr['wtitle']?>" name="wtitle" placeholder="50자 이내로 입력하십시오." maxlength="60"><br />
					<label for="wcontent">내용1 : </label><input type="text" value="<?php echo $sfooterArr['wcontent']?>" name="wcontent" placeholder="60자 이내로 입력하십시오." maxlength="60"><br />
					<label for="wcontent2">내용2 : </label><input type="text" value="<?php echo $sfooterArr['wcontent2']?>" name="wcontent2" placeholder="60자 이내로 입력하십시오." maxlength="60"><br />
					<label for="wcontent3">내용3 : </label><input type="text" value="<?php echo $sfooterArr['wcontent3']?>" name="wcontent3" placeholder="60자 이내로 입력하십시오." maxlength="60"><br />
					<label for="wcontent4">내용4 : </label><input type="text" value="<?php echo $sfooterArr['wcontent4']?>" name="wcontent4" placeholder="60자 이내로 입력하십시오." maxlength="60"><br />
					<label for="wcontent5">내용5 : </label><input type="text" value="<?php echo $sfooterArr['wcontent5']?>" name="wcontent5" placeholder="60자 이내로 입력하십시오." maxlength="60"><br />

				</div>
			<input type="submit" value="Submit">
		</div>
	<?php

		//HM MALL 
	}else if($type =="hmitembig"  && $mall =='hm'){
//		$hmbigArr = findHmMainbigLogo($conn);
		$hmbigArr = findHmbigLogo($conn);
	?>
		<div class="revise">
			<h3>로고를 수정하실 수 있습니다. <br />
			<span class="small">(<span class="red">*Pixel (PC) : 1920 * 500 권장 (Mobile) : 930 * 620 권장 )</span></h3>
			<div style="padding:15px 0;">
				<label for="wtitle">헤더 제목 : </label>
				<input type="text" name="wtitle" maxlength="25" value="<?php echo $hmbigArr['wtitle']?>" placeholder=""><br />

				<label for="logo1">PC용1번: </label>
				<input type="file" name="logo1" >
				<a href="<?php echo $hmbigArr['new_logo1']?>" target="_blank"><?php echo $hmbigArr['logo1']?></a><br />

				<label for="logo2">PC용2번: </label>
				<input type="file" name="logo2" >
				<a href="<?php echo $hmbigArr['new_logo2']?>" target="_blank"><?php echo $hmbigArr['logo2']?></a><br />

				<label for="logo3">PC용3번: </label>
				<input type="file" name="logo3" >
				<a href="<?php echo $hmbigArr['new_logo3']?>" target="_blank"><?php echo $hmbigArr['logo3']?></a><br />

				<label for="logo4">PC용4번: </label>
				<input type="file" name="logo4" >
				<a href="<?php echo $hmbigArr['new_logo4']?>" target="_blank"><?php echo $hmbigArr['logo3']?></a><br />

				<label for="logo5">PC용5번: </label>
				<input type="file" name="logo5" >
				<a href="<?php echo $hmbigArr['new_logo5']?>" target="_blank"><?php echo $hmbigArr['logo5']?></a><br />
				
				<label for="logo1">모바일1번: </label>
				<input type="file" name="mlogo1" >
				<a href="<?php echo $hmbigArr['new_mlogo1']?>" target="_blank"><?php echo $hmbigArr['mlogo1']?></a><br />

				<label for="logo2">모바일2번: </label>
				<input type="file" name="mlogo2" >
				<a href="<?php echo $hmbigArr['new_mlogo2']?>" target="_blank"><?php echo $hmbigArr['mlogo2']?></a><br />

				<label for="logo3">모바일3번: </label>
				<input type="file" name="mlogo3" >
				<a href="<?php echo $hmbigArr['new_mlogo3']?>" target="_blank"><?php echo $hmbigArr['mlogo3']?></a><br />

				<label for="logo3">모바일4번: </label>
				<input type="file" name="mlogo4" >
				<a href="<?php echo $hmbigArr['new_mlogo4']?>" target="_blank"><?php echo $hmbigArr['mlogo4']?></a><br />

				<label for="logo3">모바일5번: </label>
				<input type="file" name="mlogo5" >
				<a href="<?php echo $hmbigArr['new_mlogo5']?>" target="_blank"><?php echo $hmbigArr['mlogo5']?></a><br />

				<label for="logo1">1번 링크 : </label>
				<input type="text" name="wlink1" maxlength="200" value="<?php echo $hmbigArr['wlink1']?>" placeholder="http://"><br />

				<label for="logo2">2번 링크 : </label>
				<input type="text" name="wlink2" maxlength="200" value="<?php echo $hmbigArr['wlink2']?>" placeholder="http://"><br />

				<label for="logo3">3번 링크 : </label>
				<input type="text" name="wlink3" maxlength="200" value="<?php echo $hmbigArr['wlink3']?>" placeholder="http://"><br />

				<label for="logo3">4번 링크 : </label>
				<input type="text" name="wlink4" maxlength="200" value="<?php echo $hmbigArr['wlink4']?>" placeholder="http://"><br />

				<label for="logo3">5번 링크 : </label>
				<input type="text" name="wlink5" maxlength="200" value="<?php echo $hmbigArr['wlink5']?>" placeholder="http://"><br />
			</div>
			<input type="submit" value="Submit">
		</div>
	<?php
		//HM MALL 
	}else if($type =="hmitem" && $mall =='hm'){
		$airArr = listAirAdmin($conn);
		$pos = (int)$_GET['pos'];
		$findhmArr = findHmitem($conn, $no, $pos); //여행사 등록정보
		$eventArr = findEventList($conn);
	?>

	<input type="hidden" name="pos" value="<?php echo $pos?>">
		<div class="revise revise6">
			<h3>상품 내용을 수정하실 수 있습니다.</h3>
			<?php
				if($s_adlevel == 1){ //최고관리자가 수정하는 메뉴
			?>
			<label for="allow_tourno">여행사(관리자) : </label>
			<select name="allow_tourno">
			<?php
				foreach($airArr as $a){
			
			?>
				<option value="<?php echo $a['no']?>" <?php if($findhmArr['allow_tourno'] == $a['no']){ echo " selected "; }?> >
					<?php echo $a['wcname']?>
				</option>
			<?php
				}
			?>
			</select><br />

			<label for="tourno">여행사(작성) : </label>
			<select name="tourno">
			<?php
				foreach($airArr as $a){
			
			?>
				<option value="<?php echo $a['no']?>" <?php if($findhmArr['tourno'] == $a['no']){ echo " selected "; }?> >
					<?php echo $a['wcname']?>
				</option>
			<?php
					} // foreach Fin
			?>
			</select><br />
			<?php
				}//최고관리자 여부 IF Fin 
			
			if($s_adlevel || ($s_adlevel == 3 && ($findhmArr['tourno'] == $s_no))){ //여행사 관리자 여부
			?>
			<label for="eventname">이벤트</label>
			<select name="eventname">
			<?php 
				foreach($eventArr as $e){
			?>
				<option value="<?php echo $e['eventname']?>" <?php if($findhmArr['eventname'] == $e['eventname']){ echo " selected";} ?> >
					<?php echo $e['eventname']?>
				</option>
			<?php
			}//foreach Fin
			?>
			</select><br />

			<label for="logo1">제목 : </label><input type="text" name="wtitle" value="<?php echo $findhmArr['wtitle']?>" maxlength="40"><br />
			
			<span class="small">하단 이미지 목록 &nbsp;&nbsp;&nbsp;(<span class="red" style="font-size:13px;"> *Pixel : 270 * 200</span> 권장 )</span><br />
			
			<label for="logo1">이미지 : </label><input type="file" name="logo1">
			<a href="<?php echo $findhmArr['new_logo1']?>" target="_blank">
			<?php echo $findhmArr['logo1']?></a><br />
			<br />


			<label for="wprice1">가격 : </label>
			<input type="text" name="wprice" value="<?php echo $findhmArr['wprice']?>" maxlength="10">
			<span class="red" style="font-size:13px;"> (*원, 쉼표 생략)</span><br />
			
			<label for="wlink">링크 : </label>
			<input type="text" value="<?php echo $findhmArr['wlink']?>" name="wlink"><br />
			<input type="submit" value="Submit" style="margin-top:15px;">
			<?php
			} //여행사 관리자 여부 Fin	
			else
			{
				echo "<script>alert('권한이 없습니다.'); self.close();</script>";
			} 
			?>
		</div>
	<?php
	//메뉴 타이틀 수정
	}else if($type =="hmtitle" && $mall =='hm'){
		$pos = (int)$_GET['pos'];
		$titleArr = findMenutitle($conn,$pos);
	?>
	<input type="hidden" name="pos" value="<?php echo $pos?>">
		<div class="revise revise6">
		<h3><?php echo $pos?>번 메뉴 제목을 수정하실 수 있습니다.</h3>
			<label for="headertitle">상단메뉴 제목 : </label>
			<input type="text" value="<?php echo $titleArr['headertitle']?>" name="headertitle"><br />

			<?php
				if($pos != 1){ //1번은 제목이 없음
			?>
			<label for="maintitle">메뉴 제목 : </label>
			<input type="text" value="<?php echo $titleArr['maintitle']?>" name="maintitle"><br />
	
			
			<label for="subtitle">메뉴 부제목 : </label>
			<input type="text" value="<?php echo $titleArr['subtitle']?>" name="subtitle"><br />
			<?php
				}//pos != 1
			?>
			<input type="submit" value="Submit" style="margin-top:15px;">
		
		</div>
	<?php
	//Header Menu 소메뉴 포함
	}else if($type == "hmheaderline"){
		$pos = (int)$_GET['pos'];
		$headerArr = findHmheaderline($conn, $pos);
	?>	
	<input type="hidden" name="pos" value="<?php echo $pos?>">
		<div class="revise revise6">
		<h3>상단 메뉴 당 목록의 제목을 수정하실 수 있습니다. (<?php echo $pos?>번)</h3>
			<label for="headertitle">중메뉴 제목 : </label>
			<input type="text" required value="<?php echo $headerArr['menutitle']?>" name="menutitle"><br />
			<hr class="bound">
			
			<?php
				//JSON -> Array Convert
				$h_menu = json_decode($headerArr['menulist'],true);
				$h_link = json_decode($headerArr['linklist'],true);
				
				//Default 5
				for($i=0; $i<5; $i++){
					$k = $i+1;
			?>
			<label for="maintitle">소메뉴<?php echo $k?> 제목 : </label>
			<input type="text" value="<?php echo $h_menu[$i]?>" name="menulist[]"><br />
			<label for="wlink">링크<?php echo $k?> 제목 : </label>
			<input type="text" value="<?php echo $h_link[$i]?>" name="linklist[]"><br /><br />
			<?php
				} // For Fin
			?>
			<input type="submit" value="Submit" style="margin-top:15px;">
		</div>
	<?php
	//우측 카카오톡/광고 페이지
	}else if($type=="hmright_ad"){
		$rightAdArr =findHmRightAd($conn);
	?>
		<div class="revise revise6">
		<h3>우측 고정 페이지 메뉴를 수정할 수 있습니다.</h3>
			<label for="wtitle1">1번 제목 </label>
			<input type="text" required value="<?php echo $rightAdArr['wtitle1']?>" name="wtitle1"><br />
			<label for="wcontents1">1번 내용 </label>
			<input type="text" required value="<?php echo $rightAdArr['wcontents1']?>" name="wcontents1"><br />
			<label for="wlink1">1번 링크 </label>
			<input type="text" required value="<?php echo $rightAdArr['wlink1']?>" name="wlink1"><br />
			<label for="logo1">이미지  : </label><input type="file" name="logo1">
			<a href="<?php echo $rightAdArr['new_logo1']?>" target="_blank"><?php echo $rightAdArr['logo1']?></a><br/>
			<hr class="bound">

	
			<label for="wtitle2">2번 제목 </label>
			<input type="text" value="<?php echo $rightAdArr['wtitle2']?>" name="wtitle2"><br />
			<label for="wcontents2">2번 내용 </label>
			<input type="text" value="<?php echo $rightAdArr['wcontents2']?>" name="wcontents2"><br />
			<label for="logo2">이미지  : </label><input type="file" name="logo2">
			<a href="<?php echo $rightAdArr['new_logo2']?>" target="_blank"><?php echo $rightAdArr['logo2']?></a><br/>
			<label for="logo3">확대이미지  : </label><input type="file" name="logo3">
			<a href="<?php echo $rightAdArr['new_logo3']?>" target="_blank"><?php echo $rightAdArr['logo3']?></a><br/>
		
			<input type="submit" value="Submit" style="margin-top:15px;">
		</div>
	<?php
	}else if($type=="hmfooter_right"){
		$footerRightArr = findHmFooterRight($conn); //우측 정보 DB
	?>
		<div class="revise revise6">
		<h3>하단 우측 페이지를 수정할 수 있습니다.</h3>
			<label for="wtitle1">제목(좌) </label>
			<input type="text" required value="<?php echo $footerRightArr['wtitle1']?>" name="wtitle1"><br />
			<label for="wtitle2">제목(우) </label>
			<input type="text" required value="<?php echo $footerRightArr['wtitle2']?>" name="wtitle2"><br />
			<label for="wcontents">내용 </label>
			<textarea name="wcontents" class="help_text2"><?php echo $footerRightArr['wcontents']?></textarea><br />
			<label for="logo1">이미지   : </label><input type="file" name="logo1">
			<a href="<?php echo $footerRightArr['new_logo1']?>" target="_blank"><?php echo $footerRightArr['logo1']?></a><br/>
			<span class="red">(*Pixel : 623 * 94 권장)</span><br/>
			<label for="wlink">이미지링크 </label>
			<input type="text" required value="<?php echo $footerRightArr['wlink']?>" placeholder="http://" name="wlink"><br />
		
			<input type="submit" value="Submit" style="margin-top:15px;">
		</div>
	<?php
	}else{
		
	}
	?>
	</form>
 </body>
</html>
<?php
	}//관리자 권한 정보 검증
	else
	{
		echo "<script>alert('권한이 없습니다.'); self.close();</script>";
	}
?>