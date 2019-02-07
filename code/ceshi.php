<?php
	include("../config.php");


	$outcome= mysql_query("SELECT * FROM book WHERE  title ='". $_GET['title'] . "'",$online);

	while($sql = mysql_fetch_array($outcome))
	{
		if(($sql['bno']==$_GET['bno'])&&($sql['title']==$_GET['title']));
			break;
	}
?>
<html>
<head>
	<title>图书查询</title>
	<meta charset="utf-8">
<style type="text/css">
.add_top
{ 
	margin-top: 100px;
}
td
{
	width: 90px;
	height: 30px;
	font-size: 18px;
}
body
{ 
	
}
input
{
	width: 200px;
}
</style>
</head>
<body>
	<table align="center" class="add_top">
	<form method="POST" action="show.php">
		<tr>
			<td>书名：</td>
			<td><input type="text" name="title" ></td>
		</tr>
		<tr>
			<td>作者：</td>
			<td><input type="text" name="author"></td>
		</tr>
		
		<tr>
			<td><input type="submit" style="width:50px;" value="提交" /></td>
			<td><input type="reset" style="width:50px;" value="重置" /></td>
		</tr>
		<tr>
			<td class='ree' colspan="2"><a href="index.php" >返回借阅界面</a></td>
		</tr>
	</form>
	</table>
</body>
</html>