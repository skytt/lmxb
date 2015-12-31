<?php
header("ontent-Type: text/html; charset=utf-8");
			session_start(); 
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
if ($_FILES["file"]["error"] > 0)
      {
	  echo "<script>alert('错误代码".$_FILES["file"]["error"]."，请选择您要上传的图片！');location.href='my.php';</script>";
      }
else{

$filename = explode(".",$_FILES["file"]["name"]);

if($filename == "") {
echo "<script>alert('请选择您要上传的图片！');location.href='my.php';</script>";
}

$uplodetime = date("ymdHis");
$filename[0]=$uplodetime;
$giftpicname=implode(".",$filename);
$tmp_name = $_FILES['file']['tmp_name'];
$q= new SaeStorage();
$giftpicname = $_GET['uid']."_".$_GET['taskid']."_".$giftpicname;
$result=$q->upload("bzlm",$giftpicname, $tmp_name);

$giftpicurl=$q->getUrl("bzlm",$giftpicname);

$newtask = "no";

if(!$result) {
echo "<script>alert('很抱歉，上传失败，请重新尝试！如重试多次仍无法上传，请在页面最下方联系我们。');location.href='my.php';</script>";
}
if ($_POST['submit'] == "上传图片")
	{
		$newtask = "yes";
		echo "<script>alert('恭喜您，上传成功！完成了任务".$_GET['taskid']."，获得了".$_GET['addmoney']."枚金币！');location.href='my.php';</script>";
	}
 else 
	{				
		$oldfilename = $_GET['oldname'];		
		$r=$q->delete("bzlm", $oldfilename);
		$newtask = "no";
		echo "<script>alert('恭喜您，重新上传成功！完成了任务".$_GET['taskid']."，由于非首次完成，故金币数无变化！');location.href='my.php';</script>";		
		}

//添加数据库图片地址
		include 'info.php';    
		$con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_query("SET NAMES 'UTF8'");
		mysql_select_db($mysql_database, $con);
		$sql = "UPDATE  `app_bzlmxb`.`user` SET  `task".$_GET['taskid']."` =  '".$giftpicname."' WHERE  `user`.`uid` =".$_GET['uid'].";";
		$result = mysql_query($sql);
		//加金币
		if ($newtask == "yes")
		{
			$oldmoney = $_GET['money'];
			$moneyadd = $_GET['addmoney'];
			$newmoney = $oldmoney + $moneyadd ;
			unset($_SESSION['money']);
			$_SESSION['money'] = $newmoney;
			$sql = "UPDATE  `app_bzlmxb`.`user` SET  `money` =  '".$newmoney."' WHERE  `user`.`uid` =".$_GET['uid'].";";
			$result = mysql_query($sql);
			
		}
}
?> 