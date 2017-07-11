<?php	include_once "eventadm/ckSessionStand.php";?>
<?php	include_once "eventadm/command/dbconn/conn_db.php";?>
<?php	include_once "eventadm/command/hm_trip_load.php" ?>
<?php
	$proc = $_GET['proc']; // 글 상태(w: 쓰기 / e: 수정) 
	$findArr = array(); //수정시 사용하는 배열	
	if($s_adlevel ==1 ){ //최고 관리자만 작성 가능
		//s_adlevel , s_scode 는 ckSession에서 정해준 $_SESSION 값임..
		if($proc == "w" || $proc == "" || $proc == NULL) //글쓰기 상태
		{
			$proc = 'w';
			$required = " required "; //글 작성시 필요한 조건
		}
		$no = $_GET['no']; //수정할 번호
		$findArr = getHeaderLogoOne($conn,$no);
		
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
   <title>File Edit</title>
   <script src="js/jquery-1.12.4.min.js"></script>
   <script src="js/datepick/jquery-ui.js"></script>

  <script src="js/urgent_upload.js"></script>
 
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
	<form action="eventadm/command/hm_trip_upload_data.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="scode" value="<?php echo $s_scode?>">
	<input type="hidden" name="proc" value="<?php echo $proc?>">
	<input type="hidden" name="referer" value="headerlogo">
	<input type="hidden" name="type" value="hmheaderlogo">
	<input type="hidden" name="no" value="<?php echo $no?>" />
		<div class="revise">
			<h3>공지사항 등록 <br /></h3>
			<div style="padding:15px 0;">
		
				<label for="wtitle">제목 </label>
				<input type="text" name="wtitle" required maxlength="40" value="<?php echo $findArr['wtitle']?>"><br />
				<label for="product_code">상품코드 </label>
				<input type="text" name="product_code" required maxlength="50" value="<?php echo $findArr['product_code']?>"><br />
				<label for="wprice1">가격1 </label>
				<input type="text" name="wprice1" placeholder="숫자 데이터" maxlength="30" value="<?php echo $findArr['wprice1']?>"><br />
				<label for="wprice2">가격2 </label>
				<input type="text" name="wprice2" placeholder="숫자 데이터" maxlength="30" value="<?php echo $findArr['wprice2']?>"><br />
				<label for="wlink">링크 </label>
				<input type="text" name="wlink" placeholder="http://" value="<?php echo $findArr['wlink']?>"><br />
				<label for="wprice2">이미지 파일 </label>
				<input type="file" name="logo1">
				<a href="/_innermall/eventadm/command/fileup/hmheaderlogo/<?php echo $findArr['new_logo1']?>" target="_blank"><?php echo $findArr['logo1']?></a>
				<br />
			</div>
			<div style="text-align:center;">
				<input type="submit" value="Submit">
			</div>
		</div>

	</form>
 </body>
</html>
<?php
	}//관리자 권한 정보 검증
	else
	{
		echo "<script>alert('No Authority'); self.close();</script>";
	}
?>