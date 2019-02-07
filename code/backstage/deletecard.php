<?php
	
	include("../config.php");

	$mysql1="SELECT * FROM borrow WHERE cno = '". $_GET['cno'] ."'";
	$rows=mysql_query($mysql1);
		
	if (mysql_num_rows($rows) > 0)
	{
		while($arr = mysql_fetch_array($rows))
		{
			if(empty($arr["return_date"])){
				$flag=1;
				echo '<script type="text/javascript"> alert("该借书证还有未还书籍，不能删除！"); window.location='.'\''.'card.php'.'\''.'</script>';
			}
		}
		if($flag==0)
		{
			$mysql="DELETE FROM card WHERE cno = '". $_GET['cno'] ."'";

		mysql_query($mysql,$online);
		mysql_select_db("card", $online);

		$mysql="DELETE FROM borrow WHERE cno = ".$_GET['cno'];

		mysql_query($mysql,$online);
		}
	}
	else
	{
		$mysql="DELETE FROM card WHERE cno = '". $_GET['cno'] ."'";

		mysql_query($mysql,$online);
		mysql_select_db("card", $online);

		$mysql="DELETE FROM borrow WHERE cno = ".$_GET['cno'];

		mysql_query($mysql,$online);
	}

	mysql_close($online);

	echo '<script type="text/javascript"> alert("删除成功"); window.location='.'\''.'manage.php'.'\''.'</script>';

?>