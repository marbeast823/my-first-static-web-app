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
$result_cha = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirachar FROM RanGameS1.dbo.ChaInfo P");
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

    
</head>
</head>
<body>
<span class="styleUser">
<?php
$resTop1 = sqlsrv_query($connect_mssql,"SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 1");
while($result1 = sqlsrv_fetch_array( $resTop1,SQLSRV_FETCH_ASSOC )) {
$sg = $result1['GuNum'];
}
$resTop2 = sqlsrv_query($connect_mssql,"SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$sg'");
while($result2 = sqlsrv_fetch_array( $resTop2,SQLSRV_FETCH_ASSOC )) {
$sg2 = $result2['GuName'];			
}

$resTop3 = sqlsrv_query($connect_mssql,"SELECT RegionTax FROM RanGameS1.dbo.GuildRegion where RegionId = 1");
while($result3 = sqlsrv_fetch_array( $resTop3,SQLSRV_FETCH_ASSOC )) {
$tax3 = $result3['RegionTax'];	

echo"
	<li style='display:block; width:200px; height:20px;padding-left:12px;padding-right:18px;float:center;border-bottom:1px solid #444444;'>
		<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$sg2</span>

		<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:white;font-weight:bold'>SG($tax3%)</span>
	</li>";
}

$resTop4 = sqlsrv_query($connect_mssql,"SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 2");
while($result4 = sqlsrv_fetch_array( $resTop4,SQLSRV_FETCH_ASSOC )) {
$mp = $result4['GuNum'];

}
$resTop5 = sqlsrv_query($connect_mssql,"SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$mp'");
while($result5 = sqlsrv_fetch_array( $resTop5,SQLSRV_FETCH_ASSOC )) {
$mp2 = $result5['GuName'];			
}

$resTop6 = sqlsrv_query($connect_mssql,"SELECT RegionTax FROM RanGameS1.dbo.GuildRegion where RegionId = 2");
while($result6 = sqlsrv_fetch_array( $resTop6,SQLSRV_FETCH_ASSOC )) {
$tax3 = $result6['RegionTax'];	

echo"
	<li style='display:block; width:200px; height:20px;padding-left:12px;padding-right:18px;float:center;border-bottom:1px solid #444444;'>
		<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$mp2</span>
		<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:white;font-weight:bold'>MP($tax3%)</span>
	</li>
";
}

$resTop7 = sqlsrv_query($connect_mssql,"SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 3");
while($result7 = sqlsrv_fetch_array( $resTop7,SQLSRV_FETCH_ASSOC )) {
$phx = $result7['GuNum'];
}
$resTop8 = sqlsrv_query($connect_mssql,"SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$phx'");
while($result8 = sqlsrv_fetch_array( $resTop8,SQLSRV_FETCH_ASSOC )) {
$phx2 = $result8['GuName'];			
}

$resTop9 = sqlsrv_query($connect_mssql,"SELECT RegionTax FROM RanGameS1.dbo.GuildRegion where RegionId = 3");
while($result9 = sqlsrv_fetch_array( $resTop9,SQLSRV_FETCH_ASSOC )) {
$tax4 = $result9['RegionTax'];	

echo"
	<li style='display:block; width:200px; height:20px;padding-left:12px;padding-right:18px;float:center;border-bottom:1px solid #444444;'>
		<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$phx2</span>
		<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:white;font-weight:bold'>Phx($tax4%)</span>
	</li>";
}

$resTop10 = sqlsrv_query($connect_mssql,"SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 4");
while($result10 = sqlsrv_fetch_array( $resTop10,SQLSRV_FETCH_ASSOC )) {
$th = $result10['GuNum'];
}
$resTop11 = sqlsrv_query($connect_mssql,"SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$th'");
while($result11 = sqlsrv_fetch_array( $resTop11,SQLSRV_FETCH_ASSOC )) {
$th2 = $result11['GuName'];
}

$resTop12 = sqlsrv_query($connect_mssql,"SELECT RegionTax FROM RanGameS1.dbo.GuildRegion where RegionId = 4");
while($result12 = sqlsrv_fetch_array( $resTop12,SQLSRV_FETCH_ASSOC )) {
$tax10 = $result12['RegionTax'];			

echo"

	<li style='display:block; width:200px; height:20px;padding-left:12px;padding-right:18px;float:center;border-bottom:1px solid #444444;'>
		<span style='display:block; float:right; padding-top:0px;color:yellow; text-decoration:none;'>$th2</span>

		<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:white;font-weight:bold'>Trading($tax10%)</span>
	</li>

</ul>
";
}
         

        
   


?>
</span>
                </
           
</body>
</html>
