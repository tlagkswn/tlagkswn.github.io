<div class="paging_in">
<?php
	$page_arr = array();
	$pageData = pageTripData($conn,$page,$trip_search_condition);

?>
		<div class="left_area">
			<a href="?page=1&status1=<?php echo $status1?>&status2=<?php echo $status2?>&status3=<?php echo $status3?>&status4=<?php echo $status4?>&rt1=<?php echo $rt1?>&rt2=<?php echo $rt2?>&rt3=<?php echo $rt3?>&rt4=<?php echo $rt4?>&status0=<?php echo $status0?>&search_type=<?php echo $search_type?>&keyword=<?php echo $keyword?>&sdate=<?php echo $sdate?>&fdate=<?php echo $fdate?>"><img src="img/hm/left_arrow2.jpg" alt="left_arrow" /></a>
			<a href="?page=<?php echo $pageData['prevpage']?>&status1=<?php echo $status1?>&status2=<?php echo $status2?>&status3=<?php echo $status3?>&status4=<?php echo $status4?>&rt1=<?php echo $rt1?>&rt2=<?php echo $rt2?>&rt3=<?php echo $rt3?>&rt4=<?php echo $rt4?>&status0=<?php echo $status0?>&search_type=<?php echo $search_type?>&keyword=<?php echo $keyword?>&sdate=<?php echo $sdate?>&fdate=<?php echo $fdate?>"><img src="img/hm/left_arrow.jpg" alt="left_arrow" /></a>	
		</div>
			<div class="page_area">
			<?php
			
			for($i = $pageData['firstpage']; $i <= $pageData['lastpage']; $i++){
			?>
				<a href="?page=<?php echo $i?>&status1=<?php echo $status1?>&status2=<?php echo $status2?>&status3=<?php echo $status3?>&status4=<?php echo $status4?>&rt1=<?php echo $rt1?>&rt2=<?php echo $rt2?>&rt3=<?php echo $rt3?>&rt4=<?php echo $rt4?>&status0=<?php echo $status0?>&search_type=<?php echo $search_type?>&keyword=<?php echo $keyword?>&sdate=<?php echo $sdate?>&fdate=<?php echo $fdate?>"><?php echo $i?></a>
			<?php
			}
			?>
		</div>
		<div class="right_area">
			<a href="?page=<?php echo $pageData['lastpage']?>&status1=<?php echo $status1?>&status2=<?php echo $status2?>&status3=<?php echo $status3?>&status4=<?php echo $status4?>&rt1=<?php echo $rt1?>&rt2=<?php echo $rt2?>&rt3=<?php echo $rt3?>&rt4=<?php echo $rt4?>&status0=<?php echo $status0?>&search_type=<?php echo $search_type?>&keyword=<?php echo $keyword?>&sdate=<?php echo $sdate?>&fdate=<?php echo $fdate?>"><img src="img/hm/right_arrow.jpg" alt="left_arrow" /></a>
			<a href="?page=<?php echo $pageData['finalpage']?>&status1=<?php echo $status1?>&status2=<?php echo $status2?>&status3=<?php echo $status3?>&status4=<?php echo $status4?>&rt1=<?php echo $rt1?>&rt2=<?php echo $rt2?>&rt3=<?php echo $rt3?>&rt4=<?php echo $rt4?>&status0=<?php echo $status0?>&search_type=<?php echo $search_type?>&keyword=<?php echo $keyword?>&sdate=<?php echo $sdate?>&fdate=<?php echo $fdate?>"><img src="img/hm/right_arrow2.jpg" alt="left_arrow" /></a>
		</div>
	</div>