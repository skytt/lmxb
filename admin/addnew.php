<?php
header("Content-Type: text/html; charset=utf-8");
		$place = $_POST["place"];
		$content = $_POST["content"];
		$conditiona = $_POST["conditiona"];
		$paid = $_POST["paid"];
		if($content == "" || $conditiona == "" || $place == ""|| $paid == "")
		{
			echo "<script>alert('请输入完整信息！'); history.go(-1);</script>";
		}
		else
		{
				include 'info.php';    
    $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
			
			
			$sql = "INSERT INTO tasklist(`id`, `place`, `content`, `conditiona`, `paid`) VALUES (NULL, '".$place."', '".$content."', '".$conditiona."', '".$paid."');";
			$result = mysql_query($sql);
			
			$result2 = mysql_query("SELECT * FROM tasklist ORDER BY id DESC");
			$row = mysql_fetch_array($result2);
			$newtaskid = $row['id'];
			
			$sql1 = "ALTER TABLE  `user` ADD  `task".$newtaskid."` VARCHAR( 30 ) NULL";
			$result1 = mysql_query($sql1);
			
			if($result)
					{
						echo "<script>alert('成功！'); history.go(-1);</script>";
					}
					else
					{
						echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
					}
		}


?>