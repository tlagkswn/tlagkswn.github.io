<?php include "hm_head.php"; ?>

<div id="estimate_form">
	<h4 class="hm_title">출장 견적서 요청서</h4>
	<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
	<form method="" action="" class="estimate_form_wrap">
		<input type="hidden" id="chk_box_01" value="0"/>
		<input type="hidden" id="chk_box_02" value="0"/>
		<input type="hidden" id="chk_box_03" value="0"/>
		<input type="hidden" id="chk_box_04" value="0"/>
		<input type="hidden" id="chk_box_privacy" value="0"/>
		<input type="hidden" id="city_chk_box01" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box02" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box03" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box04" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box05" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box06" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box07" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box08" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box09" class="cities_chk_box" value="0" />
		<input type="hidden" id="city_chk_box010" class="cities_chk_box" value="0" />
		<input type="hidden" id="expectedCost_hidden" value=""/>
		<div class="estimate_form_wrap_in">
			 <div class="estimate_applicant">
				<div class="estimate_applicant_head">
					<div>
						<p class="estimate_title_en">applicant</p>
						<p class="estimate_title_ko">신청자</p>
					</div>
				</div>
				<div class="estimate_applicant_body">
					<div class="estimate_applicant_body0 estimate_applicant_comm">
						<p><label for="user_name">성명</label> <input type="text" placeholder="홍길동" id="user_name"/></p>
						<p><label for="user_email">이메일</label> <input type="email" placeholder="E-mail" id="user_email"/></p>
					</div>
					<div class="estimate_applicant_body1 estimate_applicant_comm">
						<label for="">휴대폰번호</label>
						<p class="estimate_celphone0">
							<select name="" id="">
								<option value="0">010</option>
								<option value="1">011</option>
								<option value="2">016</option>
							</select>
						</p class="estimate_celphone1">
						<p><input type="tel" id="tel" placeholder="번호만 입력하세요." /></p>
					</div>
				</div>
			 </div>
			 
			 <div class="estimate_applicant">
				 <div class="estimate_applicant_head estimate_info">
					<div>
						<p class="estimate_title_en">info</p>
						<p class="estimate_title_ko">출장자</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_info_body">
					<ul class="estimate_applicant_add">
						<li class="estimate_applicant_body0 estimate_applicant_comm">
							<dl>
								<dt>출장자 <span>1</span></dt>
								<dd><input type="text" placeholder="계열사"/></dd>
								<dd><input type="text" placeholder="부서"/></dd>
								<dd><input type="text" placeholder="성명"/></dd>
								<dd><input type="text" placeholder="직급"/></dd>
								<dd><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
							</dl>
						</li>
						<li class="estimate_applicant_body1 estimate_applicant_comm">
							<dl>
								<dt>출장자 <span>2</span></dt>
								<dd><input type="text" placeholder="계열사"/></dd>
								<dd><input type="text" placeholder="부서"/></dd>
								<dd><input type="text" placeholder="성명"/></dd>
								<dd><input type="text" placeholder="직급"/></dd>
								<dd><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
							</dl>
						</li>
						<li class="estimate_applicant_body2 estimate_applicant_comm">
							<dl>
								<dt>출장자 <span>3</span></dt>
								<dd><input type="text" placeholder="계열사"/></dd>
								<dd><input type="text" placeholder="부서"/></dd>
								<dd><input type="text" placeholder="성명"/></dd>
								<dd><input type="text" placeholder="직급"/></dd>
								<dd><a href="#none"><img src="img/hm/x_circle.jpg" alt="x_circle" class="x_circle0"/></a></dd>
							</dl>
						</li>
					</ul>
					<div class="fellow add_person">
						<a href="#none"><img src="img/hm/fellow.jpg" alt="fellow" /></a>
					</div>
				</div>
			</div>

			<div class="estimate_applicant">
				<div class="estimate_applicant_head estimate_schedule">
					<div>
						<p class="estimate_title_en">schedule</p>
						<p class="estimate_title_ko">출장일정</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_schedule_body">
					<div class="estimate_schedule_body_ul">
						<ul>
							<li>
								<p>출발일</p>
								<p><input type="text" id="departure" class="date_picker"/></p>
							</li>
							<li>
								<p>귀국일</p>
								<p><input type="text" id="return" class="date_picker"/></p>
							</li>
							<li>
								<p>출장일수</p>
								<p><input type="text" id="dayOfTrip"/></p>
							</li>
						</ul>
					</div>
					<p class="ko_time">*한국시간 기준</p>
				</div>
			</div>

			<div class="estimate_applicant">
				 <div class="estimate_applicant_head estimate_country">
					<div>
						<p class="estimate_title_en">country</p>
						<p class="estimate_title_ko">출장국가</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_country_body">
					<ul class="estimate_applicant_comm_wrap">
						<li class="estimate_applicant_body0 estimate_applicant_comm">
							<dl>
								<dt>도시 <span>1</span></dt>
								<dd class="city_name"><em>도시명</em><img src="img/hm/cross.jpg" alt="cross" style="margin-left:60px"/></dd>
								<dd><input type="text" placeholder="체크인" class="date_picker"/></dd>
								<dd><input type="text" placeholder="체크아웃" class="date_picker"/></dd>
								<dd>
									<select name="" id="" style="border:none;">
										<option value="0">이동방법</option>
										<option value="1">항공</option>
										<option value="2">렌트카</option>
										<option value="3">기타</option>
									</select>				
								</dd>
								<dd><a href="#none" class="x_circle"><img src="img/hm/x_circle.jpg" alt="x_circle" /></a></dd>
							</dl>
						</li>
						<li class="estimate_applicant_body1 estimate_applicant_comm">
							<dl>
								<dt>도시 <span>2</span></dt>
								<dd class="city_name"><em>도시명</em><img src="img/hm/cross.jpg" alt="cross" style="margin-left:60px"/></dd>
								<dd><input type="text" placeholder="체크인" class="date_picker"/></dd>
								<dd><input type="text" placeholder="체크아웃" class="date_picker"/></dd>
								<dd>
									<select name="" id="" style="border:none;">
										<option value="0">이동방법</option>
										<option value="1">이동방법</option>
										<option value="2">이동방법</option>
									</select>				
								</dd>
								<dd><a href="#none" class="x_circle"><img src="img/hm/x_circle.jpg" alt="x_circle" /></a></dd>
							</dl>
						</li>
						<li class="estimate_applicant_body2 estimate_applicant_comm">
							<dl>
								<dt>도시 <span>3</span></dt>
								<dd class="city_name"><em>도시명</em><img src="img/hm/cross.jpg" alt="cross" style="margin-left:60px"/></dd>
								<dd><input type="text" placeholder="체크인" class="date_picker"/></dd>
								<dd><input type="text" placeholder="체크아웃" class="date_picker"/></dd>
								<dd>
									<select name="" id="" style="border:none;">
										<option value="0">이동방법</option>
										<option value="1">이동방법</option>
										<option value="2">이동방법</option>
									</select>				
								</dd>
								<dd><a href="#none" class="x_circle"><img src="img/hm/x_circle.jpg" alt="x_circle" /></a></dd>
							</dl>
						</li>
					</ul>
					<div class="fellow add_cities">
						<a href="#none"><img src="img/hm/cities_add.jpg" alt="cities_add" /></a>
					</div>
				</div>
			</div>

			<div class="estimate_applicant">
				<div class="estimate_applicant_head estimate_requirement">
					<div>
						<p class="estimate_title_en">requirement</p>
						<p class="estimate_title_ko">요청사항</p>
					</div>
				</div>
				<div class="estimate_applicant_body estimate_requirement_body">
					<div class="estimate_requirement_select">
						<ul>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_01" class='es_chk_box0 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_01" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_01.jpg" alt="icon_01" />	
							</li>	
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_02" class='es_chk_box1 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_02" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_02.jpg" alt="icon_02" />	
							</li>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_03" class='es_chk_box2 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_03" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_03.jpg" alt="icon_03" />	
							</li>
							<li>
								<img src="img/hm/chk_box.png" alt="chk_box_04" class='es_chk_box3 es_chk_box chk_box0'/><img src="img/hm/chk_box_on.jpg" alt="chk_box_04" class='es_chk_box01 es_chk_box chk_box1'/><img src="img/hm/icon_04.jpg" alt="icon_04" />	
							</li>
						</ul>
					</div>
					<div class="requirement_textarea">
						<div>
							<p>
								<textarea name="" class="requirement_textarea">
									
								</textarea>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="search_cities_wrap">
			<div class="search_cities">
				<h3>도시검색 <a href="#none"><img src="img/hm/x_box2.png" alt="x_box2" /></a></h3>
				<div class="search_cities_in">
					
					<div class="search_cities_searchArea">
						<p>도시검색</p>
						<p><input type="text" placeholder="도시를 입력하세요." /></p>
						<p><a href="#">검색</a></p>
					</div>
					<div class="search_cities_result">
						<ul class="search_cities_result_head">
							<li>
								도시(한글명)
							</li>
							<li>
								도시(영문명)
							</li>
							<li>
								국가명
							</li>
						</ul>
						<ul class="search_cities_result_body">
							<li>서울</li>
							<li>Seoul</li>
							<li>한국</li>
						</ul>
					</div>
					<div class="search_cities_chk">
						<h4>주요도시</h4>
						<div class="search_cities_chk0">
							<ul>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box01" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box01" class="city_chk_box_on"/> 일본</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box02" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box02" class="city_chk_box_on"/> 중국</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box03" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box03" class="city_chk_box_on"/> 동남아시아</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box04" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box04" class="city_chk_box_on"/> 서남아시아</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box05" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box05" class="city_chk_box_on"/> 중앙아시아</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box06" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box06" class="city_chk_box_on"/> 러시아</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box07" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box07" class="city_chk_box_on"/> 미국</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box08" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box08" class="city_chk_box_on"/> 유럽</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box08" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box09" class="city_chk_box_on"/> 대양주</li>
								<li><img src="img/hm/chk_box01.png" alt="city_chk_box010" class="city_chk_box_off"/><img src="img/hm/chk_box02.png" alt="city_chk_box010" class="city_chk_box_on"/> 기타</li>
							</ul>
						</div>
						<div class="search_cities_chk1">
							<img src="img/hm/right_arrow3.jpg" alt="right_arrow3" />
						</div>
						<div class="search_cities_chk2">
							<ul class="search_cities_chk2_in">
								<li>
									<span>도쿄(나리타)</span><em>|</em><span>도쿄(하네다)</span><em>|</em><span>오사카/간사이</span><em>|</em><span>나고야</span><em>|</em><span>후쿠오카</span><em>|</em><span>오키나와</span><em>|</em><span>삿포로</span><em>|</em><span>센다이</span><em>|</em><span>미야자키</span><em>|</em><span>다카마쓰</span><em>|</em><span>도야마</span><em>|</em><span>시즈오카</span><em>|</em><span>요나고</span><em>|</em><span>히로시마</span><em>|</em><span>나가사키</span><em>|</em><span>우베</span>
								</li>
								<li>
									<span>베이징/서우두</span><em>|</em><span>상하이/푸동</span><em>|</em><span>상하이/홍차오</span><em>|</em><span>홍콩</span><em>|</em><span>광저우</span><em>|</em><span>구이린</span><em>|</em><span>난징</span><em>|</em><span>다롄</span><em>|</em><span>선양</span><em>|</em><span>선전</span><em>|</em><span>시안</span><em>|</em><span>옌지</span><em>|</em><span>옌청</span><em>|</em><span>옌타이</span><em>|</em><span>웨이하이</span><em>|</em><span>창사</span><em>|</em><span>창춘</span><em>|</em><span>청두</span><em>|</em><span>충칭</span><em>|</em><span>칭다오</span><em>|</em><span>톈진</span><em>|</em><span>하얼빈</span><em>|</em><span>항저우</span><em>|</em><span>황산</span>
								</li>		
								<li>
									<span>홍콩</span><em>|</em><span>마닐라</span><em>|</em><span>방콕</span><em>|</em><span>타이베이</span><em>|</em><span>싱가포르</span><em>|</em><span>호찌민</span><em>|</em><span>하노이</span><em>|</em><span>다낭</span><em>|</em><span>세부</span><em>|</em><span>푸껫</span><em>|</em><span>자카르타</span><em>|</em><span>클라크필드</span><em>|</em><span>프놈펜</span><em>|</em><span>코타키나발루</span><em>|</em><span>씨엠립</span><em>|</em><span>마카오</span>
								</li>
								<li>
									<span>델리</span><em>|</em><span>뭄바이</span><em>|</em><span>벵갈루루</span><em>|</em><span>첸나이</span><em>|</em><span>콜카타</span><em>|</em><span>하이데라바드</span>
								</li>
								<li>
									<span>알마티</span><em>|</em><span>아스타나</span><em>|</em><span>타슈켄트</span>
								</li>
								<li>
									<span>사할린</span><em>|</em><span>하바로프스크</span>
								</li>
								<li>
									<span>샌프란시스코</span><em>|</em><span>시애틀</span><em>|</em><span>호롤룰루/하와이</span><em>|</em><span>로스앤젤레스</span><em>|</em><span>뉴욕/케네디</span><em>|</em><span>시카고/오헤어</span><em>|</em><span>앵커리지</span><em>|</em><span>애틀란타</span><em>|</em><span>오스틴</span><em>|</em><span>내슈빌</span><em>|</em><span>보이시</span><em>|</em><span>보스턴</span><em>|</em><span>벌링턴</span><em>|</em><span>버팔로</span><em>|</em><span>볼티모어</span><em>|</em><span>클리블랜드</span><em>|</em><span>샬럿</span><em>|</em><span>콜럼버스</span><em>|</em><span>콜로라도스프링스</span><em>|</em><span>신시내티</span><em>|</em><span>덴버</span><em>|</em><span>댈러스</span><em>|</em><span>디트로이트</span><em>|</em><span>유진</span><em>|</em><span>프레즈노</span><em>|</em><span>포트로더데일</span><em>|</em><span>스포캔</span><em>|</em><span>워싱턴</span><em>|</em><span>휴스턴</span><em>|</em><span>인디애나폴리스</span><em>|</em><span>라스베이거스</span><em>|</em><span>캔자스시티</span><em>|</em><span>올랜도</span><em>|</em><span>멤피스</span><em>|</em><span>마이애미</span><em>|</em><span>미니애폴리스</span><em>|</em><span>뉴올리언스</span><em>|</em><span>오클라호마시티</span><em>|</em><span>포틀랜드(오리건주)</span><em>|</em><span>필라델피아</span><em>|</em><span>피닉스</span><em>|</em><span>피츠버그</span><em>|</em><span>포틀랜드(메인주)</span><em>|</em><span>롤리-더럼</span><em>|</em><span>로체스터</span><em>|</em><span>샌디에이고</span><em>|</em><span>샌안토니오</span><em>|</em><span>새너제이</span><em>|</em><span>솔트레이크시티</span><em>|</em><span>새크라멘토</span><em>|</em><span>산타아나</span><em>|</em><span>세인트루이스</span><em>|</em><span>시러큐스</span><em>|</em><span>탬파</span><em>|</em><span>투손</span><em>|</em><span>그린베이</span>
								</li>
								<li>
									<span>파리/드골</span><em>|</em><span>로마/다빈치</span><em>|</em><span>프랑크푸르트</span><em>|</em><span>이스탄불</span><em>|</em><span>런던/히드로</span><em>|</em><span>암스테르담</span><em>|</em><span>아테네</span><em>|</em><span>바르셀로나</span><em>|</em><span>베를린</span><em>|</em><span>브뤼셀</span><em>|</em><span>부다페스트</span><em>|</em><span>부쿠레슈티</span><em>|</em><span>뒤셀도르프</span><em>|</em><span>그라츠</span><em>|</em><span>제네바</span><em>|</em><span>하노버</span><em>|</em><span>함부르크</span><em>|</em><span>헬싱킹</span><em>|</em><span>밀라노/리나떼</span><em>|</em><span>리스본</span><em>|</em><span>마드리드</span><em>|</em><span>맨체스터</span><em>|</em><span>뮌헨</span><em>|</em><span>밀라노/말펜사</span><em>|</em><span>오슬로</span><em>|</em><span>프라하</span><em>|</em><span>스톡홀름</span><em>|</em><span>슈투트가르트</span><em>|</em><span>베니스</span><em>|</em><span>비엔나</span><em>|</em><span>바르샤바</span><em>|</em><span>자그레브</span><em>|</em><span>취리히</span>
								</li>
								<li>
									<span>사이판</span><em>|</em><span>팔라우</span><em>|</em><span>시드니</span><em>|</em><span>멜버른</span><em>|</em><span>브리즈번</span><em>|</em><span>오클랜드</span><em>|</em><span>웰링턴</span><em>|</em><span>크라이스트처치</span>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="privacy">
			<h3 class="hm_title">개인정보 수집 및 이용동의 (필수)</h3>
			<p class="privacy_explain">한미 출장 시스템에서는 서비스 이용을 위한 최소한의 개인정보를 수집합니다.</p>
			<p class="privacy_textarea">
				<textarea name="" id="" readonly>
				
				</textarea>
			</p>
			<p class="privacy_chk">
				<img src="img/hm/chk_box.png" alt="chk_box_privacy" class="chk_box_privacy0"/><img src="img/hm/chk_box_on.jpg" alt="chk_box_privacy" class="chk_box_privacy1"/> 개인정보 수집, 이용에 동의합니다.
			</p>
			<p class="privacy_submit"><a href="#none"><img src="img/hm/apply_btn.png" alt="apply_btn" /></a></p>
		</div>
		
		<p class="clear_70"></p>

		<p class="estimate_line"><img src="img/hm/dotted.jpg" alt="dotted" /></p>
		
		<div id="estimate_add_wrap"> 
			<div class="estimate">
				<div class="estimate_0">
					<div class="estimate_0_in">
						<ul class="estimate_0_head">
							<li>구분</li>
							<li>등록일자</li>
							<li>담당자명</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom1">
							<li><p>5차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom2">
							<li><p>4차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom3">
							<li><p>3차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom4">
							<li><p>2차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>
						<ul class="estimate_0_bottom estimate_0_bottom5">
							<li><p>1차 견적</p></li>
							<li>2017-5-10</li>
							<li>홍길동</li>
						</ul>

					</div>
				</div>
				<div class="estimate_1">
					<textarea name="" id="">
추가 요청란입니다. 이곳에 텍스트를 입력하시면 됩니다.
					</textarea>
					<p>추가요청</p>
				</div>
				<div class="estimate_2">
					<a href="#none" style="margin-right:15px;"><img src="img/hm/apply_btn2.png" alt="apply_btn2" /></a>
					<a href="#none"><img src="img/hm/apply_btn3.png" alt="apply_btn3" /></a>
				</div>	
			</div>

			<div class="estimate_add_nav estimate_add_nav0">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>

			<div class="expectedCost_Wrap">
				<div class="expectedCost expectedCost1">
					<div class="expectedCost_wrap">
						<h3>추천 1</h3>
						<p class="expectedCost_ex">국적사 항공권 + 추천호텔 이용 시</p>
						<div class="expectedCost_table">
							<ul class="expectedCost_table_head">
								<li>내역</li>
								<li>단가</li>
								<li>인원/박수</li>
								<li>총 요금</li>
								<li>비고</li>
								<li>상세</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>항공</h4>
										<p class="margin_top_buss">(비즈니스)</p>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										1인
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>유류할증료 + 제세공과금 포함</p>
										<p class="margin_top">TAX는 발권일에 의해 변동</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>호텔</h4>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										6박
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>추천 1 호텔 클래식 더블룸 기준</p>
										<p class="margin_top">할인율 미적용 단가 <span style="color:#3ea8d3">(7%할인 적용가능)</span></p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>

							<ul class="expectedCost_table_bott">
								<li><div><h4>예상비용</h4></div></li>
								<li></li>
								<li><div style="font-weigth:700">-</div></li>
								<li><div>￦4,215,700</div></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="expectedCost_explian">
							※ 에어프랑스 - 대한항공 코드쉐어 비즈니석 요금 적용시.
						</p>
						
						<div class="expectedCost_icon expectedCost_icon0">
							<a href="#none" style="margin-right:10px;"><img src="img/hm/expectedCost_icon1.png" alt="expectedCost_icon0" class="expectedCost_img"/></a>
							<a href="#none"><img src="img/hm/expectedCost_icon2.png" alt="expectedCost_icon22017-05-12" /></a>
						</div>

					</div>
				</div>

				<div class="expectedCost expectedCost2">
					<div class="expectedCost_wrap">
						<h3>추천 2</h3>
						<p class="expectedCost_ex">국적사 항공권 + 추천호텔 이용 시</p>
						<div class="expectedCost_table">
							<ul class="expectedCost_table_head">
								<li>내역</li>
								<li>단가</li>
								<li>인원/박수</li>
								<li>총 요금</li>
								<li>비고</li>
								<li>상세</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>항공</h4>
										<p class="margin_top_buss">(비즈니스)</p>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										1인
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>유류할증료 + 제세공과금 포함</p>
										<p class="margin_top">TAX는 발권일에 의해 변동</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>호텔</h4>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										6박
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>추천 1 호텔 클래식 더블룸 기준</p>
										<p class="margin_top">할인율 미적용 단가 <span style="color:#3ea8d3">(7%할인 적용가능)</span></p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>

							<ul class="expectedCost_table_bott">
								<li><div><h4>예상비용</h4></div></li>
								<li></li>
								<li><div style="font-weigth:700">-</div></li>
								<li><div>￦4,215,700</div></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="expectedCost_explian">
							※ 에어프랑스 - 대한항공 코드쉐어 비즈니석 요금 적용시.
						</p>
						
						<div class="expectedCost_icon expectedCost_icon0">
							<a href="#none" style="margin-right:10px;"><img src="img/hm/expectedCost_icon1.png" alt="expectedCost_icon1" class="expectedCost_img"/></a>
							<a href="#none"><img src="img/hm/expectedCost_icon2.png" alt="expectedCost_icon22017-05-12" /></a>
						</div>

					</div>
				</div>

				<div class="expectedCost expectedCost3">
					<div class="expectedCost_wrap">
						<h3>추천 3</h3>
						<p class="expectedCost_ex">국적사 항공권 + 추천호텔 이용 시</p>
						<div class="expectedCost_table">
							<ul class="expectedCost_table_head">
								<li>내역</li>
								<li>단가</li>
								<li>인원/박수</li>
								<li>총 요금</li>
								<li>비고</li>
								<li>상세</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>항공</h4>
										<p class="margin_top_buss">(비즈니스)</p>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										1인
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>유류할증료 + 제세공과금 포함</p>
										<p class="margin_top">TAX는 발권일에 의해 변동</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>호텔</h4>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										6박
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>추천 1 호텔 클래식 더블룸 기준</p>
										<p class="margin_top">할인율 미적용 단가 <span style="color:#3ea8d3">(7%할인 적용가능)</span></p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>

							<ul class="expectedCost_table_bott">
								<li><div><h4>예상비용</h4></div></li>
								<li></li>
								<li><div style="font-weigth:700">-</div></li>
								<li><div>￦4,215,700</div></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="expectedCost_explian">
							※ 에어프랑스 - 대한항공 코드쉐어 비즈니석 요금 적용시.
						</p>
						
						<div class="expectedCost_icon expectedCost_icon0">
							<a href="#none" style="margin-right:10px;"><img src="img/hm/expectedCost_icon1.png" alt="expectedCost_icon2" class="expectedCost_img"/></a>
							<a href="#none"><img src="img/hm/expectedCost_icon2.png" alt="expectedCost_icon22017-05-12" /></a>
						</div>

					</div>
				</div>

				<div class="expectedCost expectedCost4">
					<div class="expectedCost_wrap">
						<h3>추천 4</h3>
						<p class="expectedCost_ex">국적사 항공권 + 추천호텔 이용 시</p>
						<div class="expectedCost_table">
							<ul class="expectedCost_table_head">
								<li>내역</li>
								<li>단가</li>
								<li>인원/박수</li>
								<li>총 요금</li>
								<li>비고</li>
								<li>상세</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>항공</h4>
										<p class="margin_top_buss">(비즈니스)</p>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										1인
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>유류할증료 + 제세공과금 포함</p>
										<p class="margin_top">TAX는 발권일에 의해 변동</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										<h4>호텔</h4>
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										6박
									</div>
								</li>
								<li>
									<div>
										￦4,215,700
									</div>
								</li>
								<li>
									<div>
										<p>추천 1 호텔 클래식 더블룸 기준</p>
										<p class="margin_top">할인율 미적용 단가 <span style="color:#3ea8d3">(7%할인 적용가능)</span></p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none"><img src="img/hm/detail_btn.jpg" alt="detail_btn" /></a>
									</div>
								</li>
							</ul>

							<ul class="expectedCost_table_bott">
								<li><div><h4>예상비용</h4></div></li>
								<li></li>
								<li><div style="font-weigth:700">-</div></li>
								<li><div>￦4,215,700</div></li>
								<li></li>
								<li></li>
							</ul>
						</div>
						<p class="expectedCost_explian">
							※ 에어프랑스 - 대한항공 코드쉐어 비즈니석 요금 적용시.
						</p>
						
						<div class="expectedCost_icon expectedCost_icon0">
							<a href="#none" style="margin-right:10px;"><img src="img/hm/expectedCost_icon1.png" alt="expectedCost_icon3" class="expectedCost_img"/></a>
							<a href="#none"><img src="img/hm/expectedCost_icon2.png" alt="expectedCost_icon22017-05-12" /></a>
						</div>

					</div>
				</div>
			</div>

			<div class="expectedCost_result">
				<div class="expectedCost_result_in">
					<div class="expectedCost_result0">
						<strong>선택 내역</strong>
						<span>추천 1 : 국적사 항공권 + 추천호텔 이용 시 / 1인 비용 ￦ 4,875,808</span>
					</div>
					<div class="expectedCost_result1">
						<strong>총 합계금액</strong>
						<span class="red_color">￦ 14,627,424</span>
						<a href="#none"><img src="img/hm/apply_btn4.png" alt="apply_btn4" /></a>
					</div>
				</div>
			</div>
			
			<div class="estimate_add_nav estimate_add_nav1">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>
			
			<div class="expectedAir_Wrap">
				<div class="expectedCost expectedAir">
					<div class="expectedCost_wrap">
						<h3>추천 1) 국적사 - 비즈니스</h3>
						<p class="expectedCost_ex">대한항공 코드쉐어로 국제선 실제 탑승은 대한항공</p>
						<div class="expectedCost_table">
							<ul class="expectedCost_table_head">
								<li>날짜</li>
								<li>편명</li>
								<li>출발도시</li>
								<li>도착도시</li>
								<li>출도착 시간</li>
								<li>비고</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										2017.3.01
									</div>
								</li>
								<li>
									<div>
										<h4>AF5093</h4>
									</div>
								</li>
								<li>
									<div>
										인천
									</div>
								</li>
								<li>
									<div>
										파리
									</div>
								</li>				
								<li>
									<div>
										<p>출발 : 14:00</p>
										<p class="margin_top">도착 : 18:30</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none">실제 탑승 대한항공</a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										2017.3.01
									</div>
								</li>
								<li>
									<div>
										<h4>AF5093</h4>
									</div>
								</li>
								<li>
									<div>
										인천
									</div>
								</li>
								<li>
									<div>
										파리
									</div>
								</li>				
								<li>
									<div>
										<p>출발 : 14:00</p>
										<p class="margin_top">도착 : 18:30</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none">실제 탑승 대한항공</a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										2017.3.01
									</div>
								</li>
								<li>
									<div>
										<h4>AF5093</h4>
									</div>
								</li>
								<li>
									<div>
										인천
									</div>
								</li>
								<li>
									<div>
										파리
									</div>
								</li>				
								<li>
									<div>
										<p>출발 : 14:00</p>
										<p class="margin_top">도착 : 18:30</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none">실제 탑승 대한항공</a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										2017.3.01
									</div>
								</li>
								<li>
									<div>
										<h4>AF5093</h4>
									</div>
								</li>
								<li>
									<div>
										인천
									</div>
								</li>
								<li>
									<div>
										파리
									</div>
								</li>				
								<li>
									<div>
										<p>출발 : 14:00</p>
										<p class="margin_top">도착 : 18:30</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none">실제 탑승 대한항공</a>
									</div>
								</li>
							</ul>
							<ul class="expectedCost_table_body">
								<li>
									<div>
										2017.3.01
									</div>
								</li>
								<li>
									<div>
										<h4>AF5093</h4>
									</div>
								</li>
								<li>
									<div>
										인천
									</div>
								</li>
								<li>
									<div>
										파리
									</div>
								</li>				
								<li>
									<div>
										<p>출발 : 14:00</p>
										<p class="margin_top">도착 : 18:30</p>	
									</div>
								</li>
								<li>
									<div>
										<a href="#none">실제 탑승 대한항공</a>
									</div>
								</li>
							</ul>

							<div class="expectedAir_table_bott">
								<div class="expectedAir_table_bott0 expectedAir_table_bott_comm">
									<div class="expectedAir_absolute">
										<p>요금</p>
										<p>(1인 기준)</p>
									</div>
								</div>
								<div class="expectedAir_table_bott1 expectedAir_table_bott_comm">
									<p class="expectedAir_absolute">￦ 1,225,000 + TAX ￦ 612,900 +취급수수료 ￦ 42,700 = ￦ 1,464,000</p>
								</div>
							</div>
							<div class="expectedAir_table_bott">
								<div class="expectedAir_table_bott0 expectedAir_table_bott_comm">
									<p class="expectedAir_absolute">요금조건</p>
								</div>
								<div class="expectedAir_table_bott1 expectedAir_table_bott_comm">
									<p class="expectedAir_absolute">
									</p>
								</div>
							</div>
						</div>
						<!--
						<div class="expectedCost_icon expectedCost_icon1">
							<a href="#none" style="margin-right:10px;"><img src="img/hm/expectedCost_icon1.png" alt="expectedCost_icon1" /></a>
							<a href="#none"><img src="img/hm/expectedCost_icon2.png" alt="expectedCost_icon" /></a>
						</div>
						-->
					</div>
				</div>
			</div>

			<div class="estimate_add_nav estimate_add_nav2">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>

			<div class="hotel_recommand">
				<div class="hotel_recommand_in">
					<div class="hotel_recommand_title">
						<div class="hotel_recommand_photo"><img src="img/hm/hotel_photo.jpg" alt="hotel_photo" /></div>
						<div class="hotel_recommand_content1">
							<div class="hotel_recommand_content_in">
								<h4>Hotel America</h4>
								<p class="hotel_recommand_content_little_title">16 Rue Notre Dame, 칸느 도심, 06400 칸느, 프랑스</p>
								<div class="hotel_recommand_content_in0">
									<p>추천</p>
									<p><img src="img/hm/star_4.5.jpg" alt="star_4.5" style="position:relative;top:2px;"/></p>
									<p>
										<strong>익스피디아 평점 4.5/5</strong>
									</p>
								</div>
								<div class="hotel_recommand_content_in1">
									<strong>출장지</strong> <span>Hotel Gray D’Albion</span><em> 와 도보 75m</em>
								</div>
								<a href="#none"><img src="img/hm/map_icon.jpg" alt="map_icon" /></a>
							</div>
						</div>
					</div>
					<div class="hotel_recommand_content">
						<p>
							- 이 숙소는 해변에서 도보로 4분 거리에 있습니다. Set in an Art Deco-style building, Best Western Mondial is located on the famous shopping street of <br/>
								Rue d'Antibes, just 250 metres from Boulevard de la Croisette beaches.The soundproofed guest rooms include air conditioning, free Wi-Fi and a <br/>
								flat-screen TV with satellite channels. Some rooms have a balcony with views of Rue d'Antibes or the Mediterranean Sea.The Mondial provides a <br/>
								daily buffet breakfast offering cooked and continental choices. It can be taken in the hotel lounge or in the guest room upon request.<br/>
								Best Western Mondial is a 5-minute walk from the Palais des Festivals, 450 metres from Cannes Train Station and Nice-Cote d’Azur Airport is <br/>
								27 km away. <br/><br/>

								-이용날짜: 체크인 2017년 3월 1일 / 체크아웃 3월 7일 (총 6박)<br/>
								-객실타입 (호텔 객실수 49)<br/>
								슈페리어룸(21㎡)  1박 약 \132,274 (세금 포함), 조식별도 : 인당 EUR20<br/><br/>

								-불포함 사항 : 시에서 부과하는 세금 (인당 1박 기준 EUR 1.6)<br/>
								-취소규정: 무료취소 기한 2017년  2월  27일 07:00(서유럽 일광 절약 시간제) 이전 <br/>
						</p>
					</div>
				</div>
			</div>
			
			<div class="estimate_add_nav estimate_add_nav3">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>
			
			<div class="traffic_info">
				<div class="traffic_info_in">
					<div class="traffic_info_title">
						<h4>출장지역 대중교통 및 택시</h4>
					</div>
					<div class="traffic_info_content">
						-니스 코트다쥐르 공항에서 칸느까지 택시를 탑승한다면, 40분거리이나 한화 약 11~15만원의 요금이 나옵니다. 프랑스의 택시비는 비쌉니다.<br/>

						-택시외에  버스 탑승과 기차탑승 두가지의 방법으로 이동이 가능합니다.  공항버스 이동을 추천합니다.<br/>
						1. 버스 : 니스공항에서 칸느까지 가는 공항버스 탑승(210번)<br/>
						 가격 싱글요금  약20유로,리턴까지 하면 30유로 (공항 밖 버스티켓 판매)    

					</div>
				</div>
			</div>

			<div class="estimate_add_nav estimate_add_nav4">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>
			
			<div class="traffic_info">
				<div class="traffic_info_in">
					<div class="traffic_info_title">
						<h4>출장지역 정보</h4>
					</div>
					<div class="traffic_info_content">
						-니스 코트다쥐르 공항에서 칸느까지 택시를 탑승한다면, 40분거리이나 한화 약 11~15만원의 요금이 나옵니다. 프랑스의 택시비는 비쌉니다.<br/>

						-택시외에  버스 탑승과 기차탑승 두가지의 방법으로 이동이 가능합니다.  공항버스 이동을 추천합니다.<br/>
						1. 버스 : 니스공항에서 칸느까지 가는 공항버스 탑승(210번)<br/>
						 가격 싱글요금  약20유로,리턴까지 하면 30유로 (공항 밖 버스티켓 판매)    
					</div>
				</div>
			</div>
			
			<div class="estimate_add_nav estimate_add_nav5">
				<ul>
					<li><a href="#none">예상 경비</a></li>
					<li><a href="#none">추천 항공권</a></li>
					<li><a href="#none">추천 호텔</a></li>
					<li><a href="#none">교통 정보</a></li>
					<li><a href="#none">지역 정보</a></li>
					<li><a href="#none">추천 일정</a></li>
				</ul>	
			</div>
			
			<div class="schedule_area_wrap">
				<div class="schedule_area">
					<div class="schedule_area_in">
						<div class="schedule_area_head">
							<p>
								<img src="img/hm/apply_btn5.png" alt="" /><strong>1일차</strong><span>2017-05-10 (수)</span>	
							</p>
						</div>
						<div class="schedule_area_body">
							<div class="schedule_area_body_in">
								내용 입력
							</div>
						</div>
					</div>
				</div>
				<div class="schedule_area">
					<div class="schedule_area_in">
						<div class="schedule_area_head">
							<p>
								<img src="img/hm/apply_btn5.png" alt="" /><strong>2일차</strong><span>2017-05-10 (수)</span>	
							</p>
						</div>
						<div class="schedule_area_body">
							<div class="schedule_area_body_in">
								내용 입력
							</div>
						</div>
					</div>
				</div>
				<div class="schedule_area">
					<div class="schedule_area_in">
						<div class="schedule_area_head">
							<p>
								<img src="img/hm/apply_btn5.png" alt="" /><strong>3일차</strong><span>2017-05-10 (수)</span>	
							</p>
						</div>
						<div class="schedule_area_body">
							<div class="schedule_area_body_in">
								내용 입력
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</form>
</div>


<?php include "hm_foot.php"; ?> 