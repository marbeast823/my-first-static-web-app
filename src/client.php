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
$result_online = sqlsrv_query($connect_mssql,"SELECT SUM(P.ChaOnline) AS kiraonline FROM RanGame1.dbo.ChaInfo P");
while ($row = sqlsrv_fetch_array($result_online)) {
    $userOnline = $row["kiraonline"];
}
$result_cha = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirachar FROM RanGame1.dbo.ChaInfo P");
while ($row1 = sqlsrv_fetch_array($result_cha,sqlsrv_fetch_ASSOC)) {
    $chaCount = $row1["kirachar"];
}
$result_user = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirauser FROM RanUser.dbo.UserInfo U");
while ($row2 = sqlsrv_fetch_array($result_user,SQLSRV_FETCH_ASSOC)) {
    $userCount = $row2["kirauser"];
}

$result_Block = sqlsrv_query($connect_mssql,"SELECT COUNT(*) AS kirauser FROM RanUser.dbo.UserInfo U where u.userblock=1");
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

<!-- Mirrored from tankace.gamescampus.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:52:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title>Ran Online -  Download Client Installer</title>
	<meta name="description" content="Ran Online. Stylish Action RPG. The best free to play online MMORPG game, free to download." />
	<meta name="keywords"Ran Online" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link type="text/css" rel="Stylesheet" href="css/download.css"  />

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '582187648597779');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=582187648597779&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

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
				<div id="mnb2"><a href="index.php"></a></div>
				<div id="mnb3"><a href="guide.php"></a></div>
				<div id="mnb4"><a href="itemshop.php"></a></div>
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
							<div class="lnb lnb_download"></div>
		<div class="contside">
			<ul class="lnb_menu">
				<li><div class="icons ico_lnb"></div><a href="client.php" title="Client Download" class="selected">Full Client Download</a></li>
				<li class="last"><div class="icons ico_lnb"></div><a href="#" title="Manual Patch" >Manual Patch</a></li>
			</ul>
		</div>


					<!----- Mate Ticker ----->

					<!--<div class="status title_status"></div></center>
					<div class="contside">
								<iframe name="inner2" width="230" allowTransparency="true" height="90" src="status.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
									</div>-->

					<!----- Facebook ----->
					<div class="titles title_facebook"><div class="btn_more"><a href="#" target="_top"></a></div></div>
					<div class="contside facebook">
           				<!--<iframe src="cancel&amp;send=false&amp;layout=standard&amp;width=253&amp;show_faces=true&amp;action=like&amp;colorscheme=dark&amp;font=lucida+grande&amp;height=8 " scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:253px; height:80px;" allowTransparency="true"></iframe>-->
						<iframe scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:253px; height:80px;" allowTransparency="true"></iframe>
					</div>

				</div>

								<div class="content_wrap">
					<div class="title"><img src="images/tankace/download/title_download.gif" alt="Download - Game Client"/></div>
					<div class="content_download">

						<div class="sub_title">
							<div class="ico"></div><p>Download Full Client</p>
						</div>

<table borderColor=#cccccc cellPadding=2  border="0" width="710">
	
	<tr><hr><div style='height:1.4em;visibility:hidden;'>Spacing</div>
<!--<B>FULL INSTALLER OF Ran Online</b>-->
	<b><font color=pink size=4>Full_Client_Ran_Online.exe</font> </b><br><center><i>(Size: 2.0 Gb)</i></center>
	<center><a class="mirror_client" href="https://drive.google.com/uc?id=1554kP_u7DV1JhBqWyo7eqvq_nS0Z0ybsZQ" target="_blank"><em>Google Drive</em></a>
	</tr>
</table>

			<!--<div style='height:1.4em;visibility:hidden;'>Spacing</div>
			<div style='height:1.4em;visibility:hidden;'>Spacing</div>-->

<table class="Requirement" cellspacing="0" border="0" width="660"></tr>
                         
	</tr>
</table>
   
<!--<b>MANUAL PATCH OF Ran Online</b>-->
<table borderColor=#cccccc cellPadding=2  border="0" width="710"></tr>

		</td>
	</tr>
</table><p><br><!--<b>NOTE:</b> <font color=red>Please be sure that your client is update. If not, download and install Manual Patch.</font>-->
<table>
						<div class="note">
							<b><font size=2 color=redyellow>PETUNJUK INSTALASI:</font></b><br />
							<font color=silver>1. Download Full_Client_Ran_Online.exe, kemudian install dan pilih lokasi game folder yang kamu ingin terapkan.<br>
							2. Jalankan Ran Launcher pada desktop kamu, game sudah dapat dimainkan.
							<br>
							<!--<font size=2 color=cyan>- Download Manual Patch Terakhir (-): <a href='mPatch/#'><b>Klik disini</b></a>.</font></b><br />
							<font color=red>Peringatan:<br>
							- Manual Patch ini tidak wajib. Kamu bisa menggunakan Manual Patch jika memiliki masalah dengan auto patch di launchermu atau jika membutuhkan.<br>
							- Manual Patch ini HANYA untuk GAME CLIENT - Ran Online. JANGAN digunakan untuk EVENT CLIENT - Ran Battle Royale.</font>
						</div>
						<br><br>
						<b><font color=aquablue size=4>► DOWNLOAD EVENT CLIENT - Ran Battle Royale</font></b><br><center><i>(Size: 201 MB)</i></center>
						<center><a class="mirror_client" href="download/RanOnline%20-%20Battle%20Royale_1110.exe" target="_blank"><em>						Local</em></a></center><br>
						<br>
						<b><font size=2 color=red>CATATAN PENTING:</font></b><br />
						1. <font color=greenyellow>GAME CLIENT</font> adalah WAJIB untuk didownload. Ini adalah client utama untuk bermain game.<br>
						2. <font color=aquablue>EVENT CLIENT</font> tidak wajib, namun sangat disarankan untuk didownload juga. Ini adalah client yg diperlukan apabila kamu ingin mengikuti event Battle Royale.-->
                    
						<p class="sep"></p>
						<div class="sub_title">
							<div class="ico"></div><p>System Requirements</p>
						</div>
                     
						<p class="desc">
						If the system doesn't meet the requirements of the game, the game will either not run at all or give a less-than<br />
						desirable performance. To ensure a smooth gaming experience, we recommend that you meet the following settings:
						</p>
    				
						<table class="system" summary="System Requirement">
							<colgroup>
								<col width="120" />
								<col width="302" />
								<col width="302" />
							</colgroup>
							<thead>
								<tr>
									<th scope="col" class="sys">System</th>
									<th scope="col">Minimum Requirements</th>
									<th scope="col">Recommended System</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>OS</th>
									<td>Windows XP / Vista / 7</td>
									<td>Windows XP / Vista / 7</td>
								</tr>
								<tr>
									<th>CPU</th>
									<td>Pentium 4 1.8 GHz or above</td>
									<td>Pentium 4 2.8 GHz or above</td>
								</tr>
								<tr>
									<th>RAM</th>
									<td>512MB or above</td>
									<td>1GB or above</td>
								</tr>
								<tr>
									<th>Graphics Card</th>
									<td>Nvidia - GeForce 6600 GS or<br />ATI - Radeon 9600 SE or above</td>
									<td>Nvidia - GeForce 6600 GT or<br />ATI - Radeon 9600 Pro or above</td>
								</tr>
								<tr>
									<th>HDD</th>
									<td>1.7GB</td>
									<td>2GB</td>
								</tr>
								<tr>
									<th>Direct X</th>
									<td>DirectX 9.0c or above</td>
									<td>DirectX 9.0c or above</td>
								</tr>
							</tbody>
						</table>

						<!--<p class="sep"></p>
						<div class="sub_title">
							<div class="ico"></div><p>Driver Updates</p>
						</div>
						<p class="desc">
						Download the most current version of the most current driver for your graphics card. 
						Keep in mind there may be different versions of the driver depending on your OS.
						</p>
                    
						<ul class="driver">
							<li class="cl">
								<img src="images/tankace/download/driver_directx.gif" />
								<p>Microsoft DirectX 9.0C <br /><a href="http://www.microsoft.com/downloads/details.aspx?familyid=2DA43D38-DB71-4C1B-BC6A-9B6652CD92A3&amp;displaylang=en" target="_blank">Go to Direct X download</a></p>
							</li>
							<li>
								<img src="images/tankace/download/driver_ati.gif" />
								<p>ATI <br /><a href="http://ati.amd.com/support/driver.html" target="_blank">Go to Graphics card download</a></p>
							</li>
							<li class="cl">
								<img src="images/tankace/download/driver_nvidia.gif" />
								<p>NVidia <br /><a href="http://www.nvidia.com/page/home.html" target="_blank">Go to Graphics card download</a></p>
							</li>
						</ul>-->
                
					</div> 
				</div>

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


<!-- Mirrored from tankace.gamescampus.com/download/client by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:55:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>

