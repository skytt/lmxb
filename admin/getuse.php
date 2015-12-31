<?php
include 'info.php';
$yzxx =$_COOKIE["ydht"];
if ($yzxx == "")
{
header("location:".$domain_main."/admin/login.php?sc=getuse");
}
else{
setcookie("ydht", time(), time()+180);
};



$num = $_GET['num'];

$num = getuse($num);


header("location:".$domain_main."/admin/infcle.php?sc=use&num=".$num);
 
function getuse($num)
{ 
    include 'info.php';
	
    
    $con = mysql_connect($mysql_host.':'.$mysql_port, $mysql_user, $mysql_password);
    if (!$con){
	    die('Could not connect: ' . mysql_error());
    }
	
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($mysql_database, $con);
	
	
	$result = mysql_query("SELECT * FROM `code` WHERE `key`='".strtoupper($num)."' ORDER BY num ASC");
    $row = mysql_fetch_array($result);
	
	if ($row['num'] == "")
	{
	header("location:".$domain_main."/admin/search.php?num=".strtoupper($num));
	break;
	}
	
	$result = "UPDATE `code` SET `use`='yes' WHERE `num`=".$row['num'];
	mysql_query($result);
	mysql_close($con);
	return $row['num'];
}
?>