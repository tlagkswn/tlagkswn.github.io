<?php	include_once "eventadm/ckSessionStand.php";?>
<?php	include_once "eventadm/command/dbconn/conn_db.php";?>
<?php include_once "eventadm/command/hm_filter.php" ?>
<?php	include_once "eventadm/command/hm_package_load.php" ?>
<?php
	$rcode = $_GET['rcode']; //회사식별코드 indexOpen.js를 통해 받아옴.
	$type = $_GET['type']; //상품 카테고리 indexOpen.js를 통해 받아옴.
	$no = (int)$_GET['no']; //번호 indexOpen.js에는없음.. 아무데도없음.. 신경우선쓰지말기
	
	$proc = $_GET['proc']; // 글 상태(w: 쓰기 / e: 수정) indexOpen.js를 통해 받아옴.
	
	$findArr = array(); //수정시 사용하는 배열	
	if($s_adlevel ==1 || $s_adlevel ==3 ){ //관리자 권한 정보 검증
		//s_adlevel , s_rcode 는 ckSession에서 정해준 $_SESSION 값임..
		
		$required = "";
		if($proc == "w" || $proc == "" || $proc == NULL) //글쓰기 상태
		{
			$proc = 'w';
			$required = " required "; //글 작성시 필요한 조건
			
		}
		else if($proc == "e" && $no != 0)
		{
			$findArr = findData($conn, $no);
		
			$cityno = $findArr['cityno']; //도시번호
			$selectedCityArr = selectedCityList($conn, $cityno); //선택된 도시 목록 리스트
			//$selCity =selectedCity($conn,);
		
			//해당 관리자의 수정권한 확인
			//각 관리자는 다른 게시물 수정이 불가능하다.
			if($s_rcode != $findArr['rcode']  && $s_rcode != 'admin'){
				echo "<script>alert('권한이 없습니다.'); window.close();</script>";
			}
		}
		if($s_adlevel == 1)
		{
			$rcode = 'admin';
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
 
  <link rel="stylesheet" type="text/css" href="css/updatePage.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<style type="text/css">
		.revise{font-size:13px;}
		.revise input[type=text],.revise input[type=tel],.revise select{width:70%;height:25px;border:1px solid #e6e6e6;font-size:13px;color:#777;}
		.revise input[type=submit]{width:130px;height:28px;border-radius:30px;}
		.spacing{font-size:14px;padding:0 10px;color:#777;}
		
	</style>
   <script>
  $( function() {
    $( ".datepicker" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
  } );
  </script>
 </head>
 <body>
	<form action="eventadm/command/hm_package_upload_data.php" method="post" enctype="multipart/form-data">

	<input type="hidden" name="rcode" value="<?php echo $s_rcode?>">
	<input type="hidden" name="proc" value="<?php echo $proc?>">
	<input type="hidden" name="no" value="<?php echo $no?>">

		<div class="revise">
			<h3>패키지 상품 등록 <br /></h3>
			<div style="padding:15px 0;">

				<label for="fromcity">출발지</label>
				<select name="fromcity" class="">
				<?php
					$fromcityArr = listFromCity($conn);
					foreach($fromcityArr as $n){
				?>
					<option value="<?php echo $n['city']?>" <?php if($n['city'] == $findArr['fromcity']){ echo " selected "; }?> >
					<?php echo $n['city']?>
					</option>
				<?php
					}
				?>

				</select><br />
		
				<label for="nation">국가명</label>
				<select name="nation" class="hm_nation">
					<option value="0">--선택--</option>
				<?php	
					$nationArr = listNation($conn);
					foreach($nationArr as $n){
				?>
					<option value="<?php echo $n['nation']?>" <?php if($n['nation'] == $findArr['nation']){ echo " selected "; }?> >
					<?php echo $n['nation']?>
					</option>
				<?php
					}
				?>
				</select><br />
				
			

				<label for="city">도시명 </label>
				<select name="cityno" class="hm_city">
				<?php
					if($proc == 'e'){ //수정
					foreach($selectedCityArr as $n){
				?>
						<option value="<?php echo $n['no']?>" <?php if($n['no'] == $cityno){ echo " selected"; }?> >
									<?php echo $n['city']?>
				<?php
					}//foreach Fin
				}else{ //작성 
				?>
					<option value="0">--선택--</option>
				<?php
				}
				?>
				</select><br />

		
				<label for="airname">항공명 </label>
				<input type="text" name="airname" id="" value="<?php echo $findArr['airname']?>" required maxlength="30" />
				<br /> 


				<label for="wevent">상품분류 </label>
				<select name="wevent">
					<option value="0" <?php if($findArr['wevent'] =='0'){ echo ' selected ';}?> >해당없음</option>
					<option value="1" <?php if($findArr['wevent'] =='1'){ echo ' selected ';}?> >HOT세일</option>
					<option value="2" <?php if($findArr['wevent'] =='2'){ echo ' selected ';}?> >긴급특가</option>	
					<option value="3" <?php if($findArr['wevent'] =='3'){ echo ' selected ';}?> >특급세일</option>
				
				</select>
		

				<label for="wtitle">제목 </label>
				<input type="text" name="wtitle" required maxlength="30" value="<?php echo $findArr['wtitle']?>"><br />

				<label for="price">가격 </label>
				<input type="tel" name="price" maxlength="12" placeholder="(기호 없이 입력)" value="<?php echo $findArr['price']?>" required><br />

				<label for="period1">기간 </label>
				<input type="tel" name="period1" placeholder="" style="width:40px;" value="<?php echo $findArr['period1']?>" required><span class="spacing">박</span>
				<input type="tel" name="period2" placeholder="" style="width:40px;" value="<?php echo $findArr['period2']?>" required><span class="spacing">일</span><br />

				<label for="departdate">출발일 </label>
				<input type="text" name="departdate" class="datepicker" readonly placeholder="" required value="<?php echo $findArr['departdate']?>"><br />

				<label for="departtime">출발시간 </label>
				<input type="tel" name="depart_h" placeholder="" style="width:40px;" value="<?php echo $findArr['depart_h']?>" required><span class="spacing">시</span>
				<input type="tel" name="depart_m" placeholder="" style="width:40px;" value="<?php echo $findArr['depart_m']?>" required><span class="spacing">분</span><br /> 

				<label for="arrivedate">도착일 </label>
				<input type="text" name="arrivedate" class="datepicker" readonly placeholder="" required value="<?php echo $findArr['arrivedate']?>"><br />
				<label for="departtime">도착시간 </label>
				<input type="tel" name="arrive_h" placeholder="" style="width:40px;" value="<?php echo $findArr['arrive_h']?>" required><span class="spacing">시</span>
				<input type="tel" name="arrive_m" placeholder="" style="width:40px;" value="<?php echo $findArr['arrive_m']?>" required><span class="spacing">분</span><br />
				
				<label for="wlink">페이지링크 : </label>
				<input type="text" name="wlink" maxlength="200" placeholder="http://" required value="<?php echo $findArr['wlink']?>"><br />
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
		echo "<script>alert('권한이 없습니다.'); self.close();</script>";
	}
?>