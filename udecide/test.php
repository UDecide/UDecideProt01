<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<script type="text/javascript">
var username="<?php echo $_POST['username']; ?>";
var passwd="<?php echo $_POST['passwd']; ?>";
if (username == "fred" && passwd == "123456") {
	window.location.href="login.php";
} else {
	window.location.href="index.html";
}
</script>
</body>
</html>