<?php
	
	include("../config.php");

	$mysql="DELETE FROM book WHERE bno = '". $_GET['bno'] ."'AND title ='". $_GET['title'] . "'";

	mysql_query($mysql,$online);

	mysql_select_db("book", $online);

	$mysql="DELETE FROM borrow WHERE bno = ".$_GET['bno'];

	mysql_query($mysql,$online);



	mysql_close($online);

echo '<script type="text/javascript"> alert("删除成功"); window.location='.'\''.'manage.php'.'\''.'</script>';

?>