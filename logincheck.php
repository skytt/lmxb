<?php
session_start();

//ע����¼
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo "<script>alert('ע���ɹ���');location.href='index.php';</script>";
    exit;
}

//��¼
if(!isset($_POST['submit'])){
	echo "<script>alert('�Ƿ�����!'); history.go(-1);</script>";
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

//�������ݿ������ļ�
	include 'info.php';
	 $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
//����û����������Ƿ���ȷ

$check_query = mysql_query("SELECT * FROM  `user` WHERE  `username` =  '".$username."' AND  `password` =  '".$password."'");
$row = mysql_fetch_array($check_query);
			$num = mysql_num_rows($check_query);
if($num){
    //��¼�ɹ�
   	$_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['uid'];
	$_SESSION['money'] = $row['money'];
	$_SESSION['card'] = $row['card'];
	echo "<script>alert('��¼�ɹ���".$username."����ӭ�����û����ģ�');location.href='my.php';</script>";
    exit;
} else {
	echo "<script>alert('�û������������');history.back(-1);</script>";
}
?>
