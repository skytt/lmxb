<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.php");
    exit();
}

?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /><meta name="MobileOptimized" content="320" />
        <title>印象于心，六名随行 - 校园寻宝——六名北中支线任务</title>
		<meta charset="utf-8"> 		
        <link rel="stylesheet" href="./css/my.css">
		<link rel="stylesheet" href="./css/geshi.css">
        <link rel="stylesheet" href="./css/normal.css">
     
    </head>
    

    <body>
	
	
    <section area="634" areaname="header" tplname="front-header" >
	<div class="front-header">
    <div class="header">
        <h1>
            <a href="./index.php"><img src="./images/logo.png"></a>							
			<div class="users">
				<a href="./my.php"> <img src="./images/user.png"></a>
			</div>
        </h1>
        
        <h2>
                           
        </h2>
    </div>
</div>
</section>



<div id="main">

		<h2>个人中心</h2>
<div id="main1">
		

			<fieldset>
			
				<!--问候-->
				<div style="font-size: 18px;text-align:left;">
				<b>
				<?php
				session_start(); 
					$h=date('G');
					if ($h<6) echo '夜深了，午夜好';
					else if ($h<11) echo '早上好';
					else if ($h<13) echo '中午好';
					else if ($h<17) echo '下午好';
					else echo '晚上好';
					echo "，".$_SESSION['username']."。";
				?>
				</b>
				</div>
				<!--信息开始--->
				<div style="font-size: 15px;text-align:left;">
				<?php
					echo "校卡号：".$_SESSION['card'];
					echo "</br>金币：".$_SESSION['money']."枚";
				?>
				</div>
				<!--信息结束--->
				<!--列表开始--->
				<h2 style="	height: 10px;line-height: 10px;margin:30px 15px;">任务列表</h2>
				<?php
					include 'info.php';
					
					
					
					$con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
					if (!$con){
						die('Could not connect: ' . mysql_error());
					}
					
					mysql_query("SET NAMES 'UTF8'");
					mysql_select_db($mysql_database, $con);
					
					$check_query = mysql_query("SELECT * FROM  `user` WHERE  `uid` =  '".$_SESSION['userid']."' ");
					$row1 = mysql_fetch_array($check_query);
					
					$result = mysql_query("SELECT * FROM tasklist ORDER BY id DESC");
					//$row = mysql_fetch_array($result);
					
					
					while($row = mysql_fetch_array($result))
					  {   
						echo '<h1 class="left">第'.$row['id'].'个任务</h1>';
						echo '<p class="left"><b>任务地点：</b>'.$row['place'].'<br/>';
						echo '<b>线索提示：</b>'.$row['content'].'<br/>';
						echo '<b>完成条件：</b>'.$row['conditiona'].'<br/>';
						echo '<b>任务奖励：</b>金币+'.$row['paid'].'</br>';
						echo '<b>任务状态：</b>';
						if ($row1['task'.$row['id']] == "")
							{//未开始
								echo '未完成[×]';
							}
							else
							{//已完成
								echo '已完成[√] [<a href="http://bzlmxb-bzlm.stor.sinaapp.com/'.$row1['task'.$row['id']].'">查看图片</a>]';
							}
						if ($row1['task'.$row['id']] == "")
						{
							$testa = "&money=".$_SESSION['money']."&addmoney=".$row['paid'];							
						}
						else {
							$testa = "&oldname=".$row1['task'.$row['id']];
						}
						echo '<form action="updata.php?taskid='.$row['id'].'&uid='.$_SESSION['userid'].$testa.'"  method="post" enctype="multipart/form-data">';
						echo '<input type="file"  name="file" />';
						if ($row1['task'.$row['id']] == "")
							{//第一次完成
								echo '<input type="submit" name="submit" value="上传图片">';
							}
							else
							{//重新完成
								echo ' <input type="submit" name="submit" value="重新上传">';
							}
						echo '</form>'.'</p>';
					  }
				?>
				<!--列表结束--->
			
			</fieldset>

		
		
    

</div>
	</div> <!-- end main -->



<div class="footer">
  <h3>
    <a href="http://weibo.com/u/5584333918">官方微博</a> ｜  
	<a href="./feedback.php">意见反馈</a>  ｜  
	<a href="logincheck.php?action=logout">注销</a>
  </h3>
  <p>
Optimized by Sky[<script>var d = new Date(); document.write(('0' + (d.getMonth() + 1)).substr(-2) + '-' + ('0' + d.getDate()).substr(-2) + ' ' + ('0' + d.getHours()).substr(-2) + ':' + ('0' + d.getMinutes()).substr(-2))
</script>]</p>
</div>
</section>
    </body>
</html>
