<div class="paging_in">
<?php
	$pageData = pageData($conn,$page, $cityno,$dday,$dday2,$tourno);

?>
		<div class="left_area">
			<a href="?page=1&cityno=<?php echo $cityno?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><img src="img/hm/left_arrow2.jpg" alt="left_arrow" /></a>
			<a href="?page=<?php echo $pageData['prevpage']?>&cityno=<?php echo $cityno?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><img src="img/hm/left_arrow.jpg" alt="left_arrow" /></a>	
		</div>
			<div class="page_area">
			<?php
			
			for($i = $pageData['firstpage']; $i <= $pageData['lastpage']; $i++){
			?>
				<a href="?page=<?php echo $i?>&cityno=<?php echo $cityno?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><?php echo $i?></a>
			<?php
			}
			?>
		</div>
		<div class="right_area">
			<a href="?page=<?php echo $pageData['lastpage']?>&cityno=<?php echo $cityno?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><img src="img/hm/right_arrow.jpg" alt="left_arrow" /></a>
			<a href="?page=<?php echo $pageData['finalpage']?>&cityno=<?php echo $cityno?>&order=<?php echo $order?>&dday=<?php echo $dday?>&tourno=<?php echo $tourno?>"><img src="img/hm/right_arrow2.jpg" alt="left_arrow" /></a>
		</div>
		<?php
			if(($s_adlevel == 1 || $s_adlevel == 3) && !$check_mobile){
		?>
		<div class="write_area">
			<input type="button" class="write_urgent_button" value="Write" onclick="write_urgent(1,0);">
		</div>
		<?php
			}
		?>
	</div>



