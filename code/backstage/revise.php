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
	<title>信息修改</title>
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
	<form method="POST" action="into_again.php?title=<?php echo $sql['title']; ?>&&bno=<?php echo $sql['bno']; ?>">
		<tr>
			<td>书号：</td>
			<td><input type="text" name="bno"  value="<?php echo $sql['bno'];  ?>"/></td>
		</tr>
		<tr>
			<td>书名：</td>
			<td><input type="text" name="title"  value="<?php echo $sql['title'];  ?>"/></td>
		</tr>
		<tr>
			<td>作者：</td>
			<td><input type="text" name="author" value="<?php echo $sql['author'];  ?>" /></td>
		</tr>
		<tr>
			<td>出版社：</td>
			<td><input type="text" name="press" value="<?php echo $sql['press'];  ?>" /></td>
		</tr>
		<tr>
			<td>出版时间：</td>
			<td><input type="text" name="year" value="<?php echo $sql['year'];  ?>" /></td>
		</tr>
		<tr>
			<td>类型：</td>
			<td>
			<select name="category" >
			<option value="程序语言" <?php if($sql['category']=="程序语言") echo 'selected="selected"'; ?> >程序语言</option>
			<option value="HTML系列" <?php if($sql['category']=="HTML系列") echo 'selected="selected"'; ?> >HTML系列</option>
			<option value="网站构建" <?php if($sql['category']=="网站构建") echo 'selected="selected"'; ?> >网站构建</option>
			<option value="计算机结构基础" <?php if($sql['category']=="计算机结构基础") echo 'selected="selected"'; ?> >计算机结构基础</option>
			<option value="其它" <?php if($sql['category']=="其它") echo 'selected="selected"'; ?> >其它</option>
			</select>
			</td>
		</tr>
		
		<tr>
			<td>单价：</td>
			<td><input type="text" name="price" value="<?php echo $sql['price'];  ?>"/></td>
		</tr>
		<tr>
			<td>库存：</td>
			<td><input type="text" name="stock" value="<?php echo $sql['stock']; ?>"/></td>
		</tr>
		<tr>
			<td>总数：</td>
			<td><input type="text" name="total" value="<?php echo $sql['total'];  mysql_close($online); ?>"/></td>
		</tr>
		<tr>
			<td><input type="submit" style="width:50px;" value="提交" /></td>
			<td><input type="reset" style="width:50px;" value="重置" /></td>
		</tr>
		<tr>
			<td class='ree' colspan="2"><a href="manage.php" >返回主管理界面</a></td>
		</tr>
	</form>
	</table>
</body>
</html>