
<html>
<head>
	<title>图书后台管理</title>
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
<table align = "center" border = "1" width = "960" style="text-align: center;">
	<tr>
		<td colspan="4">欢迎你，管理员</td>
	</tr>
	<tr>
		<td width = "320" ><a href="addbook.php">图书添加</a></td>
		<td width = "320" ><a href="card.php">查看借书证</a></td>
		<td width = "320" ><a href="b_borrow.php">查看图书借阅信息</a></td>
	</tr>
</table>
<?php
	include "page.cless.php";
	include("../config.php");
	$outcome= mysql_query("SELECT * FROM book",$online);
	$total = mysql_num_rows($outcome);
	$num = 10;
	$page = new Page($total,$num,"");
	$sql = "select * from book {$page->limit}";
	$outcome = mysql_query($sql);
	echo '<table align = "center" border = "1" width = "960"  style="text-align: center;">';
	echo "<caption><h1>图书管理</h1></caption>";
	echo "<tr>";
	echo "<td>"."ID"."</td>";
	echo "<td>"."书名"."</td>";
	echo "<td>"."作者"."</td>";
	echo "<td>"."入库时间"."</td>";
	echo "<td>"."类型"."</td>";
	echo "<td>"."单价"."</td>";
	echo "<td>"."图书总数"."</td>";
	echo "<td>"."总库存"."</td>";
	echo "<td>"."操作"."</td>";
	echo "</tr>";
	while($sql = mysql_fetch_array($outcome))
	{
		echo "<tr>";
		$bno = $sql['bno'];
		echo "<td>".$sql['bno']."</td>";
		echo "<td>".$sql['title']."</td>";
		echo "<td>".$sql['author']."</td>";
		echo "<td>".$sql['year']."</td>";
		echo "<td>".$sql['category']."</td>";
		echo "<td>".$sql['price']."元</td>";
		echo "<td>".$sql['total']."</td>";
		echo "<td>".$sql['stock']."</td>";
		echo "<td>"."<a href="."\""."delete_zj.php?bno=".$bno."& title=".$sql['title']."\"".">&nbsp;&nbsp;删除&nbsp;|&nbsp;</a>";
		echo "<a href="."\""."revise.php?bno=".$bno."& title=".$sql['title']."\"".">修改&nbsp;&nbsp;</a></td>";
		echo "</tr>";
	}
	echo "<tr><td colspan = \"9\" align = \"center\">".$page->fpage(array(3,4,5,8,6,7,2,0,))."</td></tr>";
	echo "<tr><td colspan = \"9\" align = \"center\"><a href=\"../index.php\">返回图书借阅界面</a></td></tr>";
	echo "</table>";
	mysql_close($online);
?>
</body>
</html>
