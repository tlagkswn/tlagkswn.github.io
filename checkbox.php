<?php
	$a1 = $_POST['a1'];
	echo count($a1);
?>
<form action="" method="post">
<input type="checkbox" name="a1[]" id="" value="1" />1
<input type="checkbox" name="a1[]" id="" value="2"/>2
<input type="checkbox" name="a1[]" id="" value="3"/>3
<input type="checkbox" name="a1[]" id="" value="4"/>4
<input type="submit" value="sub" />
</form>