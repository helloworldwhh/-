<?php
	
	include("../config.php");

	$outcome="DELETE FROM book WHERE bno ='".$_GET['bno']."'";
	mysql_query($outcome,$online);

	$sql="INSERT INTO book (bno,title,author,press,year,category,price,total,stock)
	VALUES ('$_POST[bno]','$_POST[title]','$_POST[author]','$_POST[press]','$_POST[year]','$_POST[category]','$_POST[price]','$_POST[total]','$_POST[stock]')";

	mysql_query($sql,$online);

	echo '<script type="text/javascript"> alert("图书信息修改成功"); window.location=\'manage.php'.'\''.'</script>';
?>
