<!DOCTYPE html>
<html>
<head>
	<title>用户信息查看</title>
	<meta charset="UTF-8" />
<style type="text/css">
.kq
{ 
	margin: 0px 0px 0px 190px;
}
</style>
</head>
<body>
<?php

	include("config.php");

	session_start();

	$between="SELECT * FROM borrow WHERE cno='".$_SESSION['cno']."'";

	$outcome = mysql_query($between,$online);

	echo'<table align = "center" border = "1" width = "960" style="text-align: center;">';
	echo "<caption><h1>我借的书</h1></caption>";

	echo "<tr>";
	echo "<td>借书时间</td>";
	echo "<td>还书时间</td>";
	echo "<td>书名</td>";
	echo "<td>作者</td>";
	echo "<td>类型</td>";
	echo "<td>单价</td>";
	echo "</tr>";

	$var = 0;

	while($sql_w = mysql_fetch_array($outcome))
	{


		$between="SELECT * FROM book WHERE bno='".$sql_w["bno"]."' ";
		$outcome_t = mysql_query($between,$online);

		while($sql = mysql_fetch_array($outcome_t))
		{
			echo "<tr>";
			echo "<td>".$sql_w['borrow_date']."</td>";
			echo "<td>".$sql_w['return_date']."</td>";
			echo "<td>".$sql['title']."</td>";
			echo "<td>".$sql['author']."</td>";
			echo "<td>".$sql['category']."</td>";
			echo "<td>".$sql['price']."元</td>";
			if(isset($sql['category'])&&isset($sql_w['borrow_date']))
			$var++;
		}
		
	}

	if($var == 0)
		echo "<tr><td colspan='5'>暂无借阅图书</td></tr>";

	echo "</table>";

	echo "<div class='kq'><br />"."<a href=\"index.php\">返回主页</a></div>";
	mysql_close($online);
?>
</body>
</html>