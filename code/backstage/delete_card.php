<html>
<head>
<script type="text/javascript">
function delete_n()
{
var r=confirm("确认删除有关该卡的所有记录?删除后无法恢复！");
if (r==true)
  	<?php echo "window.location='deletecard.php?cno=".$_GET["cno"]."&name=".$_GET["name"]."';"; ?>
else
 	window.location='manage.php';
}
</script>
</head>
<body onload="delete_n()">
</body>
</html>
