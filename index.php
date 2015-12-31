<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" /><meta name="MobileOptimized" content="320" />
        <title>印象于心，六名随行 - 校园寻宝——六名北中支线任务</title>
		<meta charset="utf-8">        
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





  <div class="main">
	  <div class="banner">
	  <img src="./images/banner.jpg">
	  </div>	  
	  
	  
	  <?php
	include 'info.php';
	
    
    
    $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
    $result = mysql_query("SELECT * FROM tasklist ORDER BY id DESC");
    //$row = mysql_fetch_array($result);
	
	
	while($row = mysql_fetch_array($result))
      {   
		echo '<h2 class="left">第'.$row['id'].'个任务</h2>';
		echo '<p class="left"><b>任务地点：</b>'.$row['place'].'<br/>';
		echo '<b>线索提示：</b>'.$row['content'].'<br/>';
		echo '<b>完成条件：</b>'.$row['conditiona'].'</br>';
		echo '<b>任务奖励：</b>金币+'.$row['paid'].'</p>';
      }
?>
	  
	  
	  
	  
	  


</div>


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
