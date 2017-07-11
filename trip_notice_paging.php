<div class="paging_in">
<?php
	$page_arr = array();
	//$npage : 공지사항 전용 페이지 변수

	$npageData = pageNoticeData($conn,$npage);

?>
		<div class="left_area">
			<a href="?npage=1#npagelink"><img src="img/hm/left_arrow2.jpg" alt="left_arrow" /></a>
			<a href="?npage=<?php echo $npageData['prevpage']?>#npagelink"><img src="img/hm/left_arrow.jpg" alt="left_arrow" /></a>	
		</div>
			<div class="page_area">
			<?php
			
			for($i = $npageData['firstpage']; $i <= $npageData['lastpage']; $i++){
				if($i == $npage)
				{
					$npageColor = "<span style='font-weight:bold; color:#888;'>".$i."</span>";
				}
				else
				{
					$npageColor = $i;
				}
			?>
				<a href="?npage=<?php echo $i?>#npagelink"><?php echo $npageColor?></a>
			<?php
			} // For Fin
			?>
		</div>
		<div class="right_area">
			<a href="?npage=<?php echo $npageData['lastpage']?>#npagelink"><img src="img/hm/right_arrow.jpg" alt="left_arrow" /></a>
			<a href="?npage=<?php echo $npageData['finalpage']?>#npagelink"><img src="img/hm/right_arrow2.jpg" alt="left_arrow" /></a>
		</div>
</div>

