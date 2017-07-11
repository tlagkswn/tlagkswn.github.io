<?php	include_once "eventadm/ckSessionStand.php";?>
<?php	include_once "eventadm/command/dbconn/conn_db.php";?>
<?php	include_once "eventadm/command/hm_trip_load.php" ?>
<?php
	$scode = $_GET['scode']; //회사식별코드 indexOpen.js를 통해 받아옴.
	$type = $_GET['type']; //상품 카테고리 indexOpen.js를 통해 받아옴.
	$no = (int)$_GET['no']; //번호 indexOpen.js에는없음.. 아무데도없음.. 신경우선쓰지말기
	$proc = $_GET['proc']; // 글 상태(w: 쓰기 / e: 수정 / v:보기) indexOpen.js를 통해 받아옴.
	
	$findArr = array(); //수정시 사용하는 배열
	/*** 
	 최고관리자 : 글 작성 / 수정 / 삭제 / 조회
	 HM 임직원 : 글 조회
	***/
	if($s_adlevel ==1 || $s_adlevel == 4 ){ 
		//s_adlevel , s_scode 는 ckSession에서 정해준 $_SESSION 값임..
		
		$required = "";
		if($proc == "w" || $proc == "" || $proc == NULL) //글쓰기 상태
		{
			$proc = 'w';
	
		}

		
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
   <title>File Edit</title>
   <script src="js/jquery-1.12.4.min.js"></script>
   <script src="js/datepick/jquery-ui.js"></script>

  <script src="js/urgent_upload.js"></script>
 <script src="js/hm_notice.js"></script>
  <link rel="stylesheet" type="text/css" href="css/updatePage.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style type="text/css">
		.revise{font-size:13px;}
		.revise input[type=text],.revise input[type=tel],.revise select{width:70%;height:25px;border:1px solid #e6e6e6;font-size:13px;color:#777;}
		.revise input[type=submit]{width:130px;height:28px;border-radius:30px;}
		.revise textarea{width:70%; height:200px; resize:none;}
		.spacing{font-size:14px;padding:0 10px;color:#777;}
		
	</style>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
  } );
  </script>
 </head>
 <body>
 <?php
	//글 작성하기
   //최고관리자만 작성가능
	if(($proc == "" || $proc == "w") && $s_adlevel == 1 && $s_wid != null){
 ?>
	<form action="eventadm/command/hm_trip_upload_data.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="scode" value="<?php echo $s_scode?>">
	<input type="hidden" name="proc" value="w">
	<input type="hidden" name="no" value="<?php echo $no?>">
	<input type="hidden" name="referer" value="notice">
		<div class="revise">
			<h3>공지사항 등록 <br /></h3>
			<div style="padding:15px 0;">
		
				<div class="hm_citys"></div>
				<label for="wtitle">제목 </label>
				<input type="text" name="wtitle" required maxlength="30" value=""><br />

				<label for="price">분류 </label>
				<select name="wcate" class="hm_city">
					<option value="일반">일반</option>
					<option value="중요">중요</option>
					<option value="세미나">세미나</option>
					<option value="행사">행사</option>
				</select><br />
				
				<label for="contents"></label>
				<textarea name="wcontents" class="wtextarea" maxlength="1000"></textarea>
			</div>
			<div style="text-align:center;">
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>
 <?php
	}
	//글 조회하기
	else if($proc == "v"){
		$viewArr = getNoticeOne($conn,$no);
?>
		<div class="revise">
			<h3>공지사항<br /></h3>
			<div style="padding:15px 0;">
		
				<div class="hm_citys"></div>
				<label for="wtitle">번호 </label>
				<input type="text" readonly required maxlength="30" value="<?php echo $viewArr['no']?>"><br />
				<label for="wtitle">제목 </label>
				<input type="text" readonly required maxlength="30" value="<?php echo $viewArr['wtitle']?>"><br />
				<label for="wcate">분류 </label>
				<input type="text" readonly value="<?php echo $viewArr['wcate']?>">
				<label for="regdate">작성일 </label>
				<input type="text" readonly value="<?php echo $viewArr['regdate']?>">
				<br />
				
				<label for="contents"></label>
				<textarea name="wcontents" class="wtextarea" style="height:300px;" maxlength="1000" readonly><?php echo $viewArr['wcontents']?></textarea>
				<?php 
				//수정 및 삭제
					if($s_adlevel == 1){
				?>
				<div class="notice_select_edit">
					<a href="?no=<?php echo $viewArr['no']?>&proc=e">[Edit]</a> / 
					<a href="#none" onclick="deleteNotice(<?php echo $viewArr['no']?>)">[Delete]</a>
				</div>
				<?php
				}// 관리자 Fin
				?>
			</div>
		</div>
 <?php
	}
	//글 조회하기
	else if($proc == "e" && $s_adlevel == 1){
		$viewArr = getNoticeOne($conn,$no);
?>
	<form action="eventadm/command/hm_trip_upload_data.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="scode" value="<?php echo $s_scode?>">
	<input type="hidden" name="proc" value="e">
	<input type="hidden" name="no" value="<?php echo $no?>">
	<input type="hidden" name="referer" value="notice">
	<div class="revise">
			<h3>공지사항 수정<br /></h3>
			<div style="padding:15px 0;">
			<div class="hm_citys"></div>
				<label for="no">번호 </label>
				<input type="text" readonly required maxlength="30" value="<?php echo $viewArr['no']?>"><br />
				<label for="wtitle">제목 </label>
				<input type="text" name="wtitle" required maxlength="30" value="<?php echo $viewArr['wtitle']?>"><br />
				<label for="price">분류 </label>
				<select name="wcate" class="hm_city">
					<option value="일반" <?php if($viewArr['wcate'] == '일반'){ echo 'selected';}?> >일반</option>
					<option value="중요" <?php if($viewArr['wcate'] == '중요'){ echo 'selected';}?> >중요</option>
					<option value="세미나" <?php if($viewArr['wcate'] == '세미나'){ echo 'selected';}?> >세미나</option>
					<option value="행사" <?php if($viewArr['wcate'] == '행사'){ echo 'selected';}?> >행사</option>
				</select><br />
				
				<label for="contents"></label>
				<textarea name="wcontents" class="wtextarea" maxlength="1000"><?php echo $viewArr['wcontents']?></textarea>
			</div>
			<div style="text-align:center;">
				<input type="submit" value="Submit">
			</div>
		</div>
	</form>

<?php
	}//
?>
 </body>

</html>
<?php
	}//관리자 권한 정보 검증
	else
	{
		echo "<script>alert('No Authority'); self.close();</script>";
	}
?>