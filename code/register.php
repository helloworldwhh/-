<?php
	$nameErr = $accountErr = $departmentErr = "";
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		    if (empty($_POST["cno"])) 
		    	$accountErr = "卡号是必填的";

		    if (empty($_POST["name"])) 
		    	$nameErr = "姓名是必填的";
		    if(empty($_POST["department"]))
		    	$departmentErr = "部门是必填的";
	    }
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		if (!empty($_POST["cno"]))
			if(!empty($_POST["department"]))
				{					
					$type = 0;
					include("config.php");

					$sql="INSERT INTO card (type,cno,name,department)
					VALUES ('$type','$_POST[cno]','$_POST[name]','$_POST[department]')";
							
					mysql_query($sql,$online);

					mysql_close($online);

					echo '<script type="text/javascript"> alert("普通用户创建成功"); window.location='.'\''.'land.php'.'\''.'</script>';
				}
?>
<html>
<head>
<meta charset="UTF-8"/>
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
	width: 150px;
}
</style>
</head>
<body>
	<table align="center" class="add_top">
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<tr>
			<td>卡号：</td><?php echo $nameErr; ?>
			<td><input type="text" name="cno" /></td>
			<td><?php echo $accountErr; ?></td>
		</tr>
		<tr>
			<td>系：</td>
			<td><input type="text" name="department"/></td>
			<td><?php echo $departmentErr; ?></td>
		</tr>
		<tr>
			<td>名字：</td>
			<td><input type="text" name="name" /></td>
			<td><?php echo $nameErr; ?></td>
		</tr>
		<input type="hidden" value="0" name="type">
		<tr>
			<td><input style="width:50px;" type="submit" value="提交" /></td>
			<td><input style="width:50px;" type="reset" value="重置" /></td>
		</tr>
		<tr>
			<td class='ree' colspan="2"><a href="land.php" >返回登陆界面</a></td>
		</tr>
	</form>
	</table>
</body>
</html>