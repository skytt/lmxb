<?php
include 'info.php';
$yzxx =$_COOKIE["ydht"];

setcookie("ydht", time(), time()+180);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加 - 管理后台</title>
</head>

<body topmargin="0" leftmargin="00" rightmargin="0" bottommargin="0">

<table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#4DB9E0" height="130">
	<tr>
		<td width="150" align="center">
		<img border="0" src="img/logo.png" width="100" height="100"></td>
		<td width="700"><font size="7" face="微软雅黑" color="#FFFFFF">管理后台</font></td>
		<td>
		<font size="7" face="微软雅黑" color="#FFFFFF"><b>
		<a href="/admin/main.php"><font color="#FFFFFF">列表</font></a>
		<a href="/admin/search.php"><font color="#FFFFFF">添加</font></a>
		</b></font>
		</td>
		<td>
		<p align="right">		
		<a href="<?php include 'info.php';echo $domain_main;?>/admin/exit.php"><font color="#FFFFFF">退出</font></a></td>
	</tr>
</table>

</br>

<div align="center">


	
<form name="add" method="post" action="addnew.php" onSubmit="return InputCheck(this)">
<p>
<label for="place" class="label">地点:</label>
<input id="place" name="place" type="text" class="input" />
</p>
<p>
<label for="content" class="label">线索：</label>
<input id="content" name="content" type="text" class="input" />
</p>
<p>
<label for="conditiona" class="label">完成条件</label>
<input id="conditiona" name="conditiona" type="text" class="input" />
</p>
<p>
<label for="paid" class="label">奖励金币（个）</label>
<input id="paid" name="paid" type="text" class="input" />
</p>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
</p>
</form>
	

	
</div>

</body>

</html>