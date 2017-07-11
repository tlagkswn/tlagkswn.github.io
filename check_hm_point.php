<html>
<head>
<meta charset="UTF-8">
<title>포인트 조회
</title>
</head>
<body>
<!--  -->
<?php

	//데이터 처리
	$allianceCode = $_POST['allianceCode'];
	$userId = urlencode(base64_encode($_POST['userId']));
	$companyCode = $_POST['companyCode'];
	$site = $_POST['site']; //사이트코드

	if($allianceCode != null && $userId != null && $site != null) {
		if (function_exists('curl_init')) {
			echo "<meta charset='UTF-8'>";
		   // curl 리소스를 초기화
		   $ch = curl_init(); 

		   // url을 설정
		   curl_setopt($ch, CURLOPT_URL, 'http://devapi.wapleshop.com/api/asset/balance.hm?allianceCode='.$allianceCode.'&userId='.$userId.'&companyCode='.$companyCode.'&site='.$site); 

		   // 헤더는 제외하고 content 만 받음
		   curl_setopt($ch, CURLOPT_HEADER, 0); 

		   // 응답 값을 브라우저에 표시하지 말고 값을 리턴
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		   // 브라우저처럼 보이기 위해 user agent 사용
		   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0'); 

		   $content = curl_exec($ch); 
		  // echo "Result : ".$content."<br/><br/>";

		   /*
			$content_arr = array();
			parse_str($content,$content_arr);
			echo $content_arr;
			print_r($content_arr)."<br/>";
		   */
			
			//JSON Decode
		   $content_decode = json_decode($content);
		   //사용자 인증
		   if($content_decode->status->responseCode == "00"){
			   echo $content;

		   }
		   //사용자 인증 실패
		   else{
				echo "<script>alert('사용자 정보가 없습니다.'); history.back();</script>";
		   }

	   // 리소스 해제를 위해 세션 연결 닫음
	   curl_close($ch);
	} else {
		echo "<script>alert('Server Internal Error');history.back();</script>";
	   // curl 라이브러리가 설치 되지 않음. 다른 방법 알아볼 것
	}
}//data exist If Fin
?>


<?php
	//빈 페이지
	if($allianceCode == null && $userId == null && $site == null){
?>
<!--  -->
	<form method="post" action="">
	<input type="hidden" name="type" value="login" />
	<span>*HM포인트 조회 페이지입니다.<br/></span>
	<table>
	<tr>
		<td>제휴사 코드 (3자리 문자열)</td><td> <input type="text" name="allianceCode" value="SCT" maxlength="3"></td>
	</tr>
	<tr>
		<td>사이트</td><td> <input type="text" name="site" value="HM"></td>
	<tr/>
	<tr>
		<td>아이디</td><td><input type="text" value="" name="userId"></td>
	</tr>
	<tr>
		<td>회원사코드</td><td> <input type="text" name="companyCode"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Submit" /></td>
	</tr>
	</form>
	</body>
	</html>
<?php
}//If closed
?>