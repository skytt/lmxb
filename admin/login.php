<?php
include 'info.php';
$yzxx =$_COOKIE["ydht"];

setcookie("ydht", time(), time()+180);

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录 - 管理后台</title>
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
<p>
<?php
include 'info.php';
 if ($_POST['wenben'] == "")
 {
    if ($_GET['sc'] != "")
	{
	echo '<font face="微软雅黑" size="5">登陆超时，请重新登录</font></br>';
	}else
    { 
	echo '<font face="微软雅黑" size="5">欢迎您！请先登录</font></br>';	
	}
	
	}else
 if ($_POST['wenben'] == $info_password)
    {  
    setcookie("ydht", time(), time()+180);
	if ($_GET['sc'] == ""||$_GET['sc'] == "main")
	{
	header("location:".$domain_main."/admin/main.php");
	}
	else{
	header("location:".$domain_main."/admin/".$_GET['sc'].".php?num=".$_GET['s']);
	}
	}
 else{
    echo '<font face="微软雅黑" size="5">抱歉，密码错误！</font></br>';
    };
?>


</p>



	<form method="post" action="">
	<font face="微软雅黑" size="5">密码：</font><font size="4" face="微软雅黑"><input type="password" name="wenben" value="" size="43" /></font><font face="微软雅黑" size="5">
	</br>
	</br>
	</font><font size="4" face="微软雅黑"><font size="5">
	<input type="submit" value="  登录  "/></font><font face="微软雅黑" size="5">
	</font></font>
	</form>
		
</div>

</body>

</html>