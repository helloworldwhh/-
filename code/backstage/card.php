
<html>
<head>
	<title>借书证管理</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="CSS.css">
<style type="text/css">
td
{ 
	 height:25px;
}
</style>
</head>
<body>
<?php
	include "page.cless.php";
	include("../config.php");
	$outcome= mysql_query("SELECT * FROM card",$online);
	$total = mysql_num_rows($outcome);
	$num = 10;
	$page = new Page($total,$num,"");
	$sql = "select * from card {$page->limit}";
	$outcome = mysql_query($sql);
	echo '<table align = "center" border = "1" width = "960"  style="text-align: center;">';
	echo "<caption><h1>借书证管理</h1></caption>";
	echo "<tr>";
	echo "<td>"."卡的类型"."</td>";
	echo "<td>"."卡号"."</td>";
	echo "<td>"."姓名"."</td>";
	echo "<td>"."部门"."</td>";
	echo "<td>"."操作"."</td>";
	echo "</tr>";
	while($sql = mysql_fetch_array($outcome))
	{
		echo "<tr>";
		$cno = $sql['cno'];
		echo "<td>".$sql['type']."</td>";
		echo "<td>".$sql['cno']."</td>";
		echo "<td>".$sql['name']."</td>";
		echo "<td>".$sql['department']."</td>";
		echo "<td>"."<a href="."\""."delete_card.php?cno=".$cno."& name=".$sql['name']."\"".">&nbsp;&nbsp;删除&nbsp;</a>";

		echo "</tr>";
	}
	echo "<tr><td colspan = \"9\" align = \"center\">".$page->fpage(array(3,4,5,8,6,7,2,0,))."</td></tr>";
	echo "<tr><td colspan = \"9\" align = \"center\"><a href=\"../index.php\">返回图书借阅界面</a></td></tr>";
	echo "</table>";
	mysql_close($online);
?>
</body>
</html>
