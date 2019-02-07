<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta chatset="UTF-8" />
<style type="text/css">
td
{ 
	height: 25px;
}
.re
{ 
	font-size: 20px;
	margin: 10px 0px 0px 40px;
}
</style>
</head>
<body>
<?php
	include("../config.php");
           
	$result = mysql_query("SELECT * FROM book where title ='". $_POST['title'] . "'",$online);

	echo'<table align = "center" border = "1" width = "1000" style="text-align: center;">';
	echo "<caption><h1>查询信息</h1></caption>";
	echo"<tr>";
	echo"<th>书号</th>";
	echo"<th>书名</th>";
	echo"<th>作者</th>";
	echo"<th>剩余数量</th>";
	echo"</tr>";

	while($sql = mysql_fetch_array($result))
  	{
  		echo "<tr>";
  		echo "<td>" . $sql['bno'] . "</td>";
  		echo "<td>" . $sql['title'] . "</td>";
  		echo "<td>" . $sql['author'] . "</td>";
  		echo "<td>" . $sql['stock'] . "</td>";
  		echo "</tr>";
  	}

	mysql_close($online);
?>
</body>
</html>