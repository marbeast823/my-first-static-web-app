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
<!DOCTYPE html>
<html>

<!-- Mirrored from tankace.gamescampus.com/ItemShop/List by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 12:01:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title><?php require("config.php"); echo($web['webtitle']); ?> - <?php if(!isset($_GET['op'])){echo("");} else{echo(ucfirst($_GET['op']));} ?> Itemshop , Market Shop</title>
	<meta name="description" content="Ran Onlineis the best free to play online MMO RPG game, 3D RPG genre, free to download." />
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
				<div id="mnb1"><a href="client.php"></a></div>
				<div id="mnb2"><a href="news.php"></a></div>
				<div id="mnb3"><a href="guide.php" </a></div>
				<div id="mnb4"><a href="itemshop.php"></a></div>
				<div id="mnb5"><a href=""></a></div>
				<div id="mnb6"><a href=""></a></div>
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
							<div class="signup"><a href="recharge.php"><img src="images/recharge_on.gif" height="40px" width="200px"></a></div>				
					</div>
							
		<div class="contside">
			<ul class="lnb_menu">
				<li><div class="icons ico_lnb"></div><a href="itemshop.php?op=All" title="Hot Items" class="selected">All</a></li>
				<li><div class="icons ico_lnb"></div><a href="itemshop.php?op=functional" title="Hot Items" class="selected">EXP Boost Items</a></li>
				<li><div class="icons ico_lnb"></div><a href="itemshop.php?op=jewelry" title="Hot Items" class="selected">Accesories</a></li>
				<li><div class="icons ico_lnb"></div><a href="itemshop.php?op=costumes" title="Hot Items" class="selected">Costumes</a></li>
				<li><div class="icons ico_lnb"></div><a href="itemshop.php?op=other" title="Hot Items" class="selected">Enhancements</a></li>
			</ul>
		</div>


					<!----- Mate Ticker ----->

					<div class="status title_status"></div></center>
					<div class="contside">
								<iframe name="inner2" width="230" allowTransparency="true" height="90" src="status.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
									</div>

										<!----- Facebook ----->
					<div class="titles title_facebook"><div class="btn_more"><a href="https://www.facebook.com/gaming/RanWorld" target="_top"></a></div></div>
					<div class="contside facebook">
           				<iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRanWorld%2F&amp;width=740&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:740px; height:154px;" allowTransparency="true"></iframe>
					</div>

				</div>

				
<div class="content_wrap_top2"></div>
<div class="content_wrap2">
<div style="padding:10px 0;"><center><a href="http://ranindonesia.com/c3-premium-items"><img src="images/premium_title.png" /></a></center></div>
<font color=gold ><center><br><b>
					Happy shoping ^_^</font></b></br>
					<br>
					

        
                   <?php  require("config.php");if(!isset($_GET['op'])){ include("includes/all.php"); } elseif(isset($_GET['op'])){ modules3();} ?>
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
