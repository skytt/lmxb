<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>退出 - 管理后台</title>
</head>

<body topmargin="0" leftmargin="00" rightmargin="0" bottommargin="0">

<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#4DB9E0" height="130">
	<tr>
		<td width="150" align="center">
		<img border="0" src="img/logo.png" width="100" height="100"></td>
		<td><font size="7" face="微软雅黑" color="#FFFFFF">管理后台</font></td>
		<td>
		<p align="right"></td>
	</tr>
</table>
<div align="center">
&nbsp;<p>&nbsp;</p>
<p>&nbsp;</p>

<?php
include 'info.php';
setcookie("ydht", time(), time()-180);
?>

<p>
<font face="微软雅黑" size="5">退出成功！</font></p>
<p>
<font face="微软雅黑" size="5">3秒后返回登录页面</font></p>
<?php
     include 'info.php';
	header("refresh:3;url=".$domain_main."/admin/login.php");
?>


</div>

</body>

</html>