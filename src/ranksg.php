<?
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
include("includes/web_modules.php");
magic();
include("includes/clean_var.php");
include("includes/sql_check.php");
htmlspecialchars($_REQUEST);
include("includes/login.class.php");
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
$result_online = mssql_query("SELECT SUM(P.ChaOnline) AS kiraonline FROM RanGame1.dbo.ChaInfo P");
while ($row = mssql_fetch_array($result_online)) {
    $userOnline = $row["kiraonline"];
}
$result_cha = mssql_query("SELECT COUNT(*) AS kirachar FROM RanGame1.dbo.ChaInfo P");
while ($row1 = mssql_fetch_array($result_cha)) {
    $chaCount = $row1["kirachar"];
}
$result_user = mssql_query("SELECT COUNT(*) AS kirauser FROM RanUser.dbo.UserInfo U");
while ($row2 = mssql_fetch_array($result_user)) {
    $userCount = $row2["kirauser"];
}

$result_Block = mssql_query("SELECT COUNT(*) AS kirauser FROM RanUser.dbo.UserInfo U where u.userblock=1");
while ($row3 = mssql_fetch_array($result_Block)) {
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
<!DOCTYPE html>
<html>

<!-- Mirrored from tankace.gamescampus.com/ItemShop/List by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 12:01:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title><?php require("config.php"); echo($web['webtitle']); ?> - <?php if(!isset($_GET['op'])){echo("");} else{echo(ucfirst($_GET['op']));} ?> Hybrid Sacred Gate Rankings</title>
	<meta name="description" content="Ran Online is the best free to play online MMO RPG game, 3D RPG genre, free to download." />
	<meta name="keywords"RAN ONLINE, EPX, EP6, EP9, EP12, EP4, PRIVATE SERVER, Private Server, MMROPG RAN PRIVATE SERVER, EPISODE 6, EPISODE 7, EPISODE 8, EPISODE 9, EPISODE 10, EPISODE X,BTG HIGH EXP, EXTREME CLASS,GUNNER CLASS, ASTRAL BIKE" /> 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" />  
	<link type="text/css" rel="Stylesheet" href="css/itemshop.css"  />

</head>

<body>



	<!----- Page wrap ----->
	<div class="page">
		<div class="main_logo"><div class="logo_link"><a href="index.php" title="Home"><img src="images/RanLogo.png" /></a></div></div>
		
		<!----- Main contents wrap ----->
		<div class="main">
			<!----- Main Navigation Bar ----->
			<div class="mnb">
				<div id="mnb2"><a href="shownews.php"></a></div>
				<div id="mnb3"><a href="guide.php"></a></div>
				<div id="mnb4"><a href="itemshop.php"</a></div>

			</div>

			<!----- Contents container ----->
			<div class="container">
				<div class="left_wrap">
															<div class="sign_wrap">
							<div class="title sign_off"></div>
							<form id="frmSignin" method="post" action="" target="_top" onsubmit="return validate_form(this)">
								<fieldset>
									<div class="signin">
								<iframe name="inner2" width="210" allowTransparency="true" height="120" src="ilogin.php" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
									</div>
									<ul></ul>
								</fieldset>
							</form>
							<div class="signup"><a href="register.php" target="_top"><img src="images/tankace/common/signup_btn.gif" alt="Sign Up" /></a></div>				
					</div>
							
		<div class="contside">
			<ul class="lnb_menu">
				<li><div class="icons ico_lnb"></div><a href="rank.php" title="Hot Items">All Players hybrid</a></li>
				<li><div class="icons ico_lnb"></div><a href="ranksg.php" title="Hot Items" class="selected">Sacred Gate Rank</a></li>
				<li><div class="icons ico_lnb"></div><a href="rankmp.php" title="Hot Items" >Mystic Peak Rank</a></li>
				<li><div class="icons ico_lnb"></div><a href="rankpnx.php" title="Hot Items" >Phoenix Rank</a></li>
				<li><div class="icons ico_lnb"></div><a href="killer.php" title="Hot Items" >Top Player Kill</a></li>	
			</ul>
		</div>


					<!----- Mate Ticker ----->

					<div class="status title_status"></div></center>
					<div class="contside">
								<iframe name="inner2" width="230" allowTransparency="true" height="90" src="status.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
									</div>

					</div>
				
<div class="content_wrap_top"></div>
<div class="content_wrap">
<div style="padding:10px 0;"><center><a href="http://ranindonesia.com/c3-premium-items"><img src="images/premium_title.png" /></a></center></div>


        
                  <table><? include_once("modules/sg.php"); ?></table>
</div>
		<div class="header" align="center"></div>




		<div class="clear"></div>
		<div class="page_wrap">
			<ul class="paging">


</ul>


		</div>
	</div>
</div>
<div class="content_wrap_bottom"></div>

				
				<div class="seo">
</div>
			</div>
		</div>


		<!----- Footer wrap ----->
		<div class="footer">
						<div class="info">
				<a href="index.php">Corporate Info</a>|<a href="index.php">Privacy Policy</a>|<a href="index.php">Terms of Use</a>|<a href="index.php">Contact Us</a>
			</div>

		</div>

	</div>

</body>					
<!----- Scripts ----->




<!-- Mirrored from tankace.gamescampus.com/ItemShop/List by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 12:01:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>
