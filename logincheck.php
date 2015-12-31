<?php
session_start();

//注销登录
if($_GET['action'] == "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo "<script>alert('注销成功！');location.href='index.php';</script>";
    exit;
}

//登录
if(!isset($_POST['submit'])){
	echo "<script>alert('非法访问!'); history.go(-1);</script>";
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

//包含数据库连接文件
	include 'info.php';
	 $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
//检测用户名及密码是否正确

$check_query = mysql_query("SELECT * FROM  `user` WHERE  `username` =  '".$username."' AND  `password` =  '".$password."'");
$row = mysql_fetch_array($check_query);
			$num = mysql_num_rows($check_query);
if($num){
    //登录成功
   	$_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['uid'];
	$_SESSION['money'] = $row['money'];
	$_SESSION['card'] = $row['card'];
	echo "<script>alert('登录成功，".$username."，欢迎进入用户中心！');location.href='my.php';</script>";
    exit;
} else {
	echo "<script>alert('用户名或密码错误');history.back(-1);</script>";
}
?>
