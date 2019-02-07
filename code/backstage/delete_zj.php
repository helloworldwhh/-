<html>
<head>
<script type="text/javascript">
function delete_yn()
{
var r=confirm("确认删除有关该图书的所有记录?删除后无法恢复！");
if (r==true)
  	<?php echo "window.location='delete.php?bno=".$_GET["bno"]."&title=".$_GET["title"]."';"; ?>
else
  window.location='manage.php';
}
</script>
</head>
<body onload="delete_yn()">
</body>
</html>
