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
while ($row = sqlsrv_fetch_array($result_online, SQLSRV_FETCH_ASSOC)) {
    $userOnline = $row["kiraonline"];
}
$result_cha = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirachar FROM RanGameS1.dbo.ChaInfo P");
while ($row1 = sqlsrv_fetch_array($result_cha, SQLSRV_FETCH_ASSOC)) {
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

<!-- Mirrored from tankace.gamescampus.com/news/noticedetail/1/3891 by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:59:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title>Open beta!</title>
	<meta name="description" content="Ran Online. Stylish Action RPG. The best free to play online MMORPG game, free to download." />
	<meta name="keywords"Ran Online" /> 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link type="text/css" rel="Stylesheet" href="css/boards.css"  />
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<!----- Page wrap ----->
	<div class="page">
		<div class="main_logo"><div class="logo_link"><a href="index.php" title="Home"><img src="images/RanLogo.png" /></a></div></div>
		
		<!----- Main contents wrap ----->
		<div class="main">
			<!----- Main Navigation Bar ----->
			<div class="mnb">
				<div id="mnb1"><a href="client.php"></a></div>
				<div id="mnb2"><a href="index.php"></a></div>
				<div id="mnb3"><a href="guide.php"></a></div>
				<div id="mnb4"><a href="itemshop.php"></a></div>
				<div id="mnb5"><a href="#"></a></div>
				<div id="mnb6"><a href="#"></a></div>
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
							<div class="lnb lnb_news"></div>
		<div class="contside">
			<ul class="lnb_menu">
				<li><div class="icons ico_lnb"></div><a href="news.php" title="Notice" class="selected">Notice</a></li>
				<li class="last"><div class="icons ico_lnb"></div><a href="news.php" title="Event" >Event</a></li>
			</ul>
		</div>

					<!--<div class="status title_status"></div></center>
					<div class="contside">
								<iframe name="inner2" width="230" allowTransparency="true" height="90" src="status.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
									</div>-->
					<!----- Facebook ----->
					<div class="titles title_facebook"><div class="btn_more"><a href="#" target="_top"></a></div></div>
					<div class="contside facebook">
           				<!--<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fhome.php%23%21%2Fpages%2FV-Ran-Online-EPX-Season-III%2F169770446408032&amp;width=230&amp;colorscheme=dark&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=264" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:230px; height:264px;" allowTransparency="true"></iframe>-->
						<iframe scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:253px; height:80px;" allowTransparency="true"></iframe>
					</div>

				</div>
                      
				
<div class="content_wrap_top"></div>
<div class="content_wrap">
	<div class="title"><img src="images/tankace/news/title_notice.gif" alt="News - Notice"/></div>
	<div class="content_general">
<?php
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$news_id = $_GET['news'];
//$resTop1 = sqlsrv_query($connect_mssql,"SELECT GuName from RanGameS1.dbo.GuildInfo Where GuNum = '$id' ");
$resTop1 = sqlsrv_query($connect_mssql,"SELECT news_title,news_autor,news_category,news_date,news_context from RanUser.Dbo.web_news where news_id = '$news_id' order by news_date desc");
while($result1 = sqlsrv_fetch_array( $resTop1,SQLSRV_FETCH_ASSOC )) {
			


?>
<table class="detail" summary="Notice">
			<caption>Notice</caption>
			<colgroup>
				<col width="75">
				<col width="117">
				<col width="42">
				<col width="54">
				<col width="48">
				<col width="386">
			</colgroup>
			<thead>
				<tr>
					<th><b class="indent">Subject</b></th>
					<th colspan="5">
						<h1><font color="RED"><?php echo $result1["news_title"]?></font></h1>
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style addthis">
						<a class="addthis_button_facebook"></a>
						<a class="addthis_button_twitter"></a>
						<a class="addthis_button_myspace"></a>
						<a class="addthis_button_digg"></a>
						<a class="addthis_button_compact"></a>
						</div>

						<!-- AddThis Button END -->
					</th>
				</tr>
				<tr>
					<td><b class="indent">Date</b></td>
					<td><font color="green"><?php echo $result1["news_date"]?></font></td>
					<td><b><!--By:--></b></td>
					<td><!--RanOnline--></td>
					<td></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
			<tr>
			<td colspan="6" class="content"><?php echo $result1["news_context"]?></td>
				</tr>
			</tbody>
		</table>		

<div class="clear"></div>
<div class="page_wrap">
	<ul class="paging">


<?php }?>
</ul>
<br><br><br>
<center></center>

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
				<a href="ToS&EULA.php">Term of Service (ToS) & End-User License Agreement (EULA)</a><p>
			</div>

		</div>

	</div>

</body>			


<!-- Mirrored from tankace.gamescampus.com/news/noticedetail/1/3891 by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:59:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>
