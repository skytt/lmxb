<?php
	if(isset($_POST["submit"]))
	{
		$user = $_POST["username"];
		$psw = $_POST["password"];
		$card = $_POST["card"];
		$psw_confirm = $_POST["confirm"];
		if($user == "" || $psw == "" || $psw_confirm == "" || $card == "")
		{
			echo "<script>alert('��ȷ����Ϣ�����ԣ�'); history.go(-1);</script>";
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
	            //����û����������Ƿ���ȷ
				
				$sql = "SELECT * FROM  `user` WHERE username = ".$user;	//SQL���
				$result = mysql_query($sql);	//ִ��SQL���
				$num = mysql_num_rows($result);	//ͳ��ִ�н��Ӱ�������
				if($num)	//����Ѿ����ڸ��û�
				{
					echo "<script>alert('�û����Ѵ��ڣ��������'); history.go(-1);</script>";
				}
				else	//�����ڵ�ǰע���û�����
				{
					$sql_insert = "INSERT INTO user(`uid`, `username`, `password`, `card`, `money`, `finished`) VALUES (NULL, '".$user."', '".$psw."', '".$card."', 0, 0);";
					$res_insert = mysql_query($sql_insert);	
					if($res_insert)
					{
						echo "<script>alert('ע��ɹ���'); location.href='login.php';</script>";
					}
					else
					{
						echo "<script>alert('ϵͳ��æ�����Ժ�'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('������ȷ�����벻һ�£�'); history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('�ύδ�ɹ���'); history.go(-1);</script>";
	}
?>