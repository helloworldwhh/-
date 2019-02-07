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
			if ($sql['stock'] >= 1) 
			{
				$sql['total'] = $sql['total'];
				$number = $sql['stock']-1;
				$between_1="UPDATE book SET total = '". $sql['total'] ."' WHERE bno = '". $_GET['bno'] ."'AND title ='". $_GET['title'] . "'";
				mysql_query($between_1,$online);
				echo mysql_error();
				$between_2="UPDATE book SET stock = '". $number ."' WHERE bno = '". $_GET['bno'] ."'";
				mysql_query($between_2,$online);
				echo mysql_error();
				
				session_start();
				$ins="INSERT INTO borrow (cno,bno,borrow_date)
				VALUES ('$_SESSION[cno]','$_GET[bno]','$time')";
				mysql_query($ins,$online);
			}
			else
			{ 
				echo '<script type="text/javascript"> alert("该图书已借完"); window.location='.'\''.'index.php'.'\''.' </script>';
				exit();
			}
		}
	}
	mysql_close($online);
	echo '<script type="text/javascript"> alert("图书借阅成功"); window.location='.'\''.'index.php'.'\''.'</script>';
	exit();
?>
