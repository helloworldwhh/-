<?php
	//$fp = fopen("book_num.txt","r");
	//$num = fgets($fp,10);
	//$num++;
	//fclose($fp);
	//$fp = fopen("book_num.txt","w");
	//fputs($fp,$num);
	//fclose($fp);

	include("../config.php");

	$sql="INSERT INTO book (bno,title,author,press,year,category,price,total,stock)
	VALUES ('$_POST[bno]','$_POST[title]','$_POST[author]','$_POST[press]','$_POST[year]','$_POST[category]','$_POST[price]','$_POST[total]','$_POST[stock]')";
	mysql_query($sql,$online);

	echo '<script type="text/javascript"> alert("图书添加成功"); window.location='.'\''.'manage.php'.'\''.'</script>';
?>