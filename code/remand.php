<?php

	header("Content-Type:text/html;charset=utf-8");

	date_default_timezone_set("Asia/shanghai");
	$time = date("Y-m-d") . " " . date("h:i:sa");

	include("config.php");

	$sel="SELECT * FROM book WHERE bno=".$_GET['bno'];

	$outcome= mysql_query($sel,$online);
	while($sql = mysql_fetch_array($outcome))
	{
		if ($sql['bno'] == $_GET['bno']) 
		{
			$sql['total'] = $sql['total'];
			$number = $sql['stock']+1;
			$between_1="UPDATE book SET total = '". $sql['total'] ."' WHERE bno = '". $_GET['bno'] ."'AND title ='". $_GET['title'] . "'";
				mysql_query($between_1,$online);
				echo mysql_error();

			$between_2="UPDATE book SET stock = '". $number ."' WHERE bno = '". $_GET['bno'] ."'AND title ='". $_GET['title'] . "'";
			mysql_query($between_2,$online);
			echo mysql_error();
			
			session_start();

			$mysql="UPDATE borrow SET return_date = '".$time."' WHERE bno = '".$_GET['bno']."'";

			mysql_query($mysql,$online);

		}
	}
	mysql_close($online);
	echo '<script type="text/javascript"> alert("图书归还成功"); window.location='.'\''.'index.php'.'\''.'</script>';
	exit();
?>
