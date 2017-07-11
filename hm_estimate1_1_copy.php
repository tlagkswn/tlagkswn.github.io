<?php include "hm_head2.php"; ?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="js/jquery-1.12.4.js"></script>
<style type="text/css">
	.wrapper{width:960px;margin:0 auto;}
</style>

<body data-ng-app="">

<div  class="wrapper">

	<h2>Cost Calculator</h2>
<?php 
	$q = "quantity";
	$p = "price";
	for($i = 1; $i<10; $i++){
?>

	<p class="quantity">Quantity: <input type="number" ng-model="quantity<?php echo $i?>"></p>
	<p class="Price:">Price: <input type="number" ng-model="price<?php echo $i?>"></p>
<?php

	}
	?>

	<p><b>Total in dollar:</b> 
		
			{{
				<?php	
					for($z = 1; $z<10; $z++){
					if($z == 9){
						
						$pp = $p.$z;
					}else{

						$pp = $p.$z."+";
					}
					$qq = $q.$z."+";
				?>
					<?php echo $qq; ?><?php echo $pp; ?>

				<?php
					}

				?>
			}}
	
	</p>
	<p><input type="button" class="aa"/></p>
</div>

</body>
</html>