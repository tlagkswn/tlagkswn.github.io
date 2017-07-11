<?php include "hm_head.php"; ?>

<?php
	// s_adlevel = 4 HM Account
	if(($s_adlevel == 1 || $s_adlevel == 4) && $s_wid != "" && $s_wid != null){
		echo "<script>location.href='hm_main.php';</script>";
	}
	//비로그인
	else
	{ 
		$hmCompanyArr = listHmCompanyCode($conn);
?>
		<div id="hm_log">
			<form action="eventadm/command/hm_login_proc.php" method="post">
				<input type="hidden" name="allianceCode" value="SBT">
				<input type="hidden" name="site" value="HM">
				<input type="hidden" id="user_mode" value="0"/>
				<input type="hidden" name="userId" value="<?php echo $userId?>" />
				<input type="hidden" name="companyCode" value="<?php echo $companyCode?>" />
				<h2><img src="img/hm/log_letter.png" alt="log_letter" /></h2>
				<div class="hm_log_inner">
					<div class="user_mode">
						<a href="#none" class="user_mode_0"><img src="img/hm/for_staff.png" alt="for_staff" /></a>
						<a href="#none" class="user_mode_1"><img src="img/hm/for_administrator.png" alt="for_administrator" /></a>
					</div>
			
					<div class="log_inputArea">
					
						<strong class="log_title">임직원 고객만 로그인 접속이 가능합니다.</strong>
						<span class="login_context">

						</span>

						<input type="image" src="img/hm/log_sub.jpg" alt="log_sub" />
<!-- 						<a href="/_innermall/hm_main.php" class="log_sub"><img src="img/hm/log_sub.jpg" alt="log_sub" /></a>	 -->
						
					</div>
					
				</div>
			</form>
		</div>

<?php include "hm_foot.php"; ?>

<?
}//else Closed
?>