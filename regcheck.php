<?php
	if(isset($_POST["submit"]))
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		$card = $_POST["card"];
		$psw_confirm = $_POST["confirm"];
		if($user == "" || $psw == "" || $psw_confirm == "" || $card == "")
		{
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				include 'info.php';
				$con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
				if (!$con){
					die('Could not connect: ' . mysql_error());
				}
				
				mysql_query("SET NAMES 'UTF8'");
				mysql_select_db($mysql_database, $con);
	            //检测用户名及密码是否正确
				
				$sql = "SELECT * FROM  `user` WHERE username = ".$user;	//SQL语句
				$result = mysql_query($sql);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('用户名已存在，请更换！'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{
					$sql_insert = "INSERT INTO user(`uid`, `username`, `password`, `card`, `money`, `finished`) VALUES (NULL, '".$user."', '".$psw."', '".$card."', 0, 0);";
					$res_insert = mysql_query($sql_insert);	
					if($res_insert)
					{
						echo "<script>alert('注册成功！'); location.href='login.php';</script>";
					}
					else
					{
						echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('密码与确认密码不一致！'); history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}
?>