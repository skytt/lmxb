<?php
include 'info.php';
$yzxx =$_COOKIE["ydht"];

setcookie("ydht", time(), time()+180);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>列表 - 管理后台</title>
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
	<table border="1" width="1024" cellspacing="0" cellpadding="0" bordercolor="#C0C0C0">
		<tr>
			<td align="center" width="10%" height="45">序号</td>
			<td align="center" width="20%" height="45">地点</td>
			<td align="center" width="35%" height="45">内容</td>
			<td align="center" width="30%" height="45">条件</td>
			<td align="center" width="5%" height="45">奖励</td>
		</tr>
		<!--<tr>
			<td align="center" width="80" height="45">　</td>
			<td align="center" width="300" height="45">　</td>
			<td align="center" width="200" height="45">　</td>
			<td align="center" width="200" height="45">　</td>
			<td align="center" width="144" height="45">　</td>
			<td align="center" width="100" height="45">操作</td>
		</tr>
		<tr>
			<td align="center" width="80" height="45">　</td>
			<td align="center" width="300" height="45">　</td>
			<td align="center" width="200" height="45">　</td>
			<td align="center" width="200" height="45">　</td>
			<td align="center" width="144" height="45">　</td>
			<td align="center" width="100" height="45">操作</td>
		</tr>
		-->
	<?php
	include 'info.php';
	
    
    
    $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
    $result = mysql_query("SELECT * FROM tasklist ORDER BY id ASC");
    //$row = mysql_fetch_array($result);
	
	
	while($row = mysql_fetch_array($result))
      {
	    echo '<tr>';	   
		echo '<td align="center" width="10%" height="45">'.$row['id'].'</td>';
		echo '<td align="center" width="20%" height="45">'.$row['place'].'</td>';
		echo '<td align="center" width="40%" height="45">'.$row['content'].'</td>';
		echo '<td align="center" width="30%" height="45">'.$row['conditiona'].'</td>';		
		echo '<td align="center" width="30%" height="45">'.$row['paid'].'</td>';	
		echo '</tr>';
      }
?>
	</table>
	
</div>

</body>

</html>