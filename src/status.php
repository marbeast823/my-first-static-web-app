<?php
session_start();
header("Cache-control: private");
ob_start();
require_once "security.php";
require_once "sql_inject.php";
$bDestroy_session = TRUE;
$url_redirect = 'index.php';
$sqlinject = new sql_inject('./log_file_sql.log',$bDestroy_session,$url_redirect); 
$timeStart=gettimeofday();
$timeStart_uS=$timeStart["usec"];
$timeStart_S=$timeStart["sec"]; 
require("config.php");
require("anti_dos.php");
include("includes/web_modules.php");
magic();
include("includes/clean_var.php");
include("includes/sql_check.php");
htmlspecialchars($_REQUEST);
include("includes/ilogin.class.php");
login();
check_inject();
logincheck();
check_user(); 
function delayedrefresh($page) {
	echo "<meta http-equiv='refresh' content='3; URL={$page}'>";
}
function quickrefresh($page) {
	echo "<meta http-equiv='refresh' content='.0000000000000000001; URL={$page}'>";
}
if(isset($_SESSION['user'])) {clean_var($_SESSION['user']);}
$result_online = sqlsrv_query($connect_mssql,"SELECT SUM(P.ChaOnline) AS kiraonline FROM RanGameS1.dbo.ChaInfo P");
while ($row = sqlsrv_fetch_array($result_online,SQLSRV_FETCH_ASSOC)) {
    $userOnline = $row["kiraonline"];
}
$result_cha = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirachar FROM RanGame1.dbo.ChaInfo P");
while ($row1 = sqlsrv_fetch_array($result_cha,SQLSRV_FETCH_ASSOC)) {
    $chaCount = $row1["kirachar"];
}
$result_user = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirauser FROM RanUser.dbo.GSUserInfo U");
while ($row2 = sqlsrv_fetch_array($result_user,SQLSRV_FETCH_ASSOC)) {
    $userCount = $row2["kirauser"];
}

$result_Block = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirauser FROM RanUser.dbo.GSUserInfo U where u.userblock=1");
while ($row3 = sqlsrv_fetch_array($result_Block,SQLSRV_FETCH_ASSOC)) {
    $userBlock = $row3["kirauser"];
}
function getStatusServer($server, $port, $name) {
$socket = "";
@$socket = fsockopen($server, $port, $errno, $errstr, 2);
if(!$socket) {
  $socket = print("<font color=\"red\">Offline</font>");
} else {
fclose($socket);
$socket = print("<font color=\"green\">Online</font>");
 } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1">
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="Common/CSS/StyleSheet3.css" type="text/css" media="all" />
<link rel="stylesheet" href="Common/CSS/jquery.countdown.css" type="text/css" media="all" /><link rel="stylesheet" href="Common/JS/jQuery/ui/base/jquery.ui.all.css" type="text/css" media="all" />

<script language="javascript" type="text/javascript">
setTimeout("location.reload();",5000);
</script>
    
</head>
</head>
<body>
<Br>
<span class="styleUser">
&nbsp;&nbsp;&nbsp;Server Status : <font color=\"green\">Online</font>
</span><br>
&nbsp;&nbsp;&nbsp;<span class="styleUser">User Online :</span><span class="style1b"> <?=$userOnline;?></span>
<br>
&nbsp;&nbsp;&nbsp;<span class="styleUser">User Count :</span><span class="style1b"> <?=$userCount;?></span>
<br>
&nbsp;&nbsp;&nbsp;<span class="styleUser">Block Count :</span><span class="style1b"> <?=$userBlock;?></span>
                </
           
</body>
</html>
