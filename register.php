<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid']))
{}else
{
    header("Location:my.php");
    exit();
}

?>

<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /><meta name="MobileOptimized" content="320" />
        <title>印象于心，六名随行 - 校园寻宝——六名北中支线任务</title>
		<meta charset="utf-8">   
		<link rel="stylesheet" href="./css/login.css">        
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

		<h2></h2>

		<form action="regcheck.php" method="post">

			<fieldset>
			<p>
（打*号项为必填）
</p>
				<p><label for="username">*用户名：</label>
				<input type="text" name="username" value="" onBlur="if(this.value=='')this.value='请输入用户名'" onFocus="if(this.value=='请输入用户名')this.value=''">
				</p> 
				
				<p><label for="password">*密码：</label>
				<input type="password" name="password" />
				</p> 
				
				<p><label for="confirm">*确认密码：</label>
				<input type="password" name="confirm" />
				</p> 
				
				<p><label for="card">*校卡号（非常重要！）：</label>
				<input type="text" name="card" />
				</br>（我们将在艺术节领奖当天，通过学号确认您的真实身份。所以请务必保证学号准确无误！如果您不是学生，请填写您的真实姓名，感谢配合！）
				</p> 
				</br>
				</br>

				<p><input type="submit" name="submit" value="注册" /></p>
	


			</fieldset>

		</form>
		
    
</form>

	</div> <!-- end main -->


<div class="footer">
  <h3>
    <a href="http://weibo.com/u/5584333918">官方微博</a> ｜  
	<a href="./feedback.php">意见反馈</a> 
  </h3>
  <p>
Optimized by Sky[<script>var d = new Date(); document.write(('0' + (d.getMonth() + 1)).substr(-2) + '-' + ('0' + d.getDate()).substr(-2) + ' ' + ('0' + d.getHours()).substr(-2) + ':' + ('0' + d.getMinutes()).substr(-2))
</script>]</p>
</div>
</section>
    </body>
</html>
