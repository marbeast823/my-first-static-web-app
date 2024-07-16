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

<!-- Mirrored from tankace.gamescampus.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:52:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->

<head>

</style>
	<title><?php require("config.php"); echo($web['webtitle']); ?> - <?php if(!isset($_GET['op'])){echo("");} else{echo(ucfirst($_GET['op']));} ?>Ran Online Indonesia</title>
	<meta name="description" content="Ran Online is the best free to play online MMO RPG game, 3D RPG genre, free to download." />
	<meta name="keywords"RAN ONLINE, EPX, EP6, EP9, EP12, EP4, PRIVATE SERVER, Private Server, MMROPG RAN PRIVATE SERVER, EPISODE 6, EPISODE 7, EPISODE 8, EPISODE 9, EPISODE 10, EPISODE X,BTG HIGH EXP, EXTREME CLASS,GUNNER CLASS, ASTRAL BIKE" /> 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" />  
	<link type="text/css" rel="Stylesheet" href="css/home.css"  />
	<script src="snow.js" type="text/javascript">
</script> 

</head>


<body>
	<!----- Page wrap ----->
	<div class="page">
		<div class="main_logo"><div class="logo_link"><a href="index.php" title="Home"><img src="images/Logo.png" /></a></div></div>
		
		<!----- Main contents wrap ----->
		<div class="main">
			<!----- Main Navigation Bar ----->
			<div class="mnb">
				<div id="mnb1"><a href="client.php"></a></div>
				<div id="mnb2"><a href="news.php"></a></div>
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
					<!----- Mate Ticker ----->
					<a href="recharge.php"><img src="images/recharge_on.gif" /></a>
					<div class="status title_ranks"><div class="btn_more"><a href="rank.php"></a></div></div>
					<div class="contside">
					<div class="movie">
				</div>

								<div class="clear"><span></span></div>
								
<?php
require("config.php");
function getC ($class) {

	if ($class == 2) { $char = "Swords (M)"; }
  	if ($class == 1) { $char = "Brawler (M)"; }
	if ($class == 4) { $char = "Archer (F)"; }
	if ($class == 8) { $char = "Shaman (F)"; }
	if ($class == 16) { $char = "Extreme (M)"; }
  	if ($class == 32) { $char = "Extreme (F)"; }
	if ($class == 40) { $char = "Brawler (F)"; }
	if ($class == 80) { $char = "Swords (F)"; }
	if ($class == 100) { $char = "Archer (M)"; }
	if ($class == 200) { $char = "Shaman (M)"; }
	if ($class == 1024) { $char = "Scientist (M)"; }
	if ($class == 2048) { $char = "Scientist (F)"; }
	if ($class == 4096) { $char = "Assassins (M)"; }
	if ($class == 8192) { $char = "Assassins (F)"; }
	if ($class == 16348) { $char = "Magician (M)"; }
	if ($class == 32768) { $char = "Magician (F)"; }
	if ($class == 262144) { $char = "Shaper (M)"; }
	if ($class == 80000) { $char = "Shaper (F)"; }
return $char;
}

function getN ($int) {
    if ($int == 0) { $char = "<img src=\"sg.png\">"; }
    if ($int == 1) { $char = "<img src=\"mp.png\">"; }
    if ($int == 2) { $char = "<img src=\"ph.png\">"; }
 
return $char;
}

function getB ($Online) {
    if ($Online == 0) { $char = "<img src='images/offline.gif' >"; }
    if ($Online == 1) { $char = "<img src='images/online.gif' >"; }
   
return $char;
}


function getG ($int) {
    if ($int == "0") { $char = "NONE"; }
return $char;
}



$resTop = sqlsrv_query($connect_mssql,"SELECT TOP 10 P.ChaName, P.ChaLevel, P.ChaReborn, P.ChaClass, P.ChaSchool, P.ChaOnline, P.GuNum, P.ChaNum FROM RanGameS1.dbo.ChaInfo P, RanUser.dbo.GSUserInfo U WHERE P.UserNum = U.UserNum AND U.UserType != 30 AND U.UserAvailable != 0 AND P.ChaDeleted != 1 ORDER BY  P.ChaReborn DESC, P.ChaLevel DESC");
$i=0;
while($result = sqlsrv_fetch_array( $resTop,SQLSRV_FETCH_ASSOC )) {
	$i++;		

					$Name = $result["ChaName"];
			$lev = $result["ChaLevel"];
			$school = $result["ChaSchool"];
			$Reborn = $result["ChaReborn"];
			$class = $result["ChaClass"];
			$Num = $result["ChaNum"];
			$Online = $result["ChaOnline"];
			$id = $result["GuNum"];
    			if($school == 0) {
				$school = getN($school);
			}
    			if($school == 1) {
				$school = getN($school);
			}
    			if($school == 2) {
				$school = getN($school);
			}
    			if($class == 4) {
				$class = getC($class);
			}
	if($class == 1) {
				$class = getC($class);
			}

	if($class == 2) {
				$class = getC($class);
			}

	if($class == 8) {
				$class = getC($class);
			}
	if($class == 16) {
				$class = getC($class);
			}

	if($class == 32) {
				$class = getC($class);
			}

	if($class == 40) {
				$class = getC($class);
			}

	if($class == 80) {
				$class = getC($class);
			}
	if($class == 100) {
				$class = getC($class);
			}

	if($class == 200) {
				$class = getC($class);
			}
	if($class == 1024) {
				$class = getC($class);
			}
	if($class == 2048) {
				$class = getC($class);
			}
	if($class == 4096) {
				$class = getC($class);
			}
	if($class == 8192) {
				$class = getC($class);
			}
	if($class == 16348) {
				$class = getC($class);
			}
	if($class == 32768) {
				$class = getC($class);
			}
	if($class == 10000) {
				$class = getC($class);
			}
	if($class == 20000) {
				$class = getC($class);
			}
	if($class == 262144) {
				$class = getC($class);
			}
	if($class == 80000) {
				$class = getC($class);
			}


			if($Online == 0) {
				$Online = getB($Online);
			}
			if($Online == 1) {
				$Online = getB($Online);
			}



$resTop1 = sqlsrv_query($connect_mssql,"SELECT GuName from RanGameS1.dbo.GuildInfo Where GuNum = '$id' ");

while($result1 = sqlsrv_fetch_array( $resTop1,SQLSRV_FETCH_ASSOC )) {
			

			$GuildName = $result1["GuName"];


}

  			




echo"  								
	<li style='display:block; width:200px; height:20px;padding-left:12px;padding-right:18px;float:center;border-bottom:1px solid #444444;'>
		<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$Name</span>
		<td width='35' 12px;  style='border-bottom:#CCCCCC 0px solid' align='center'>$school</td>
		<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#CCCCCC;font-weight:'>$i .</span>
	</li>
						


";
}
echo "					
						
					";



?>
									</div>			

					<div class="status title_status"></div></center>			
					<div class="contside">
					<div class="rantime">
                    <div class="timer"></div>
                   </div>
					<iframe name="inner2" width="230" allowTransparency="true" height="90" src="status.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
					</div>
					<!----- Facebook ----->
					<div class="titles title_facebook"><div class="btn_more"><a href="https://www.facebook.com/gaming/RanWorld" target="_top"></a></div></div>
					<div class="contside facebook">
           				 <iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRanWorld%2F&amp;width=740&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:740px; height:154px;" allowTransparency="true"></iframe>
					</div>
				</div>
				
		
<div class="center_wrap">
	<!----- Main Banner ----->
	<video autoplay muted loop id="myVideo">
        <source src="audio/bg2.MP4"  align=middle type="video/mp4">
    </video>
	<div class="banner_main">
	
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="refresh" value="flash/image4.jpg" />
			<param name="quality" value="high" />
			<param name="wmode" value="transparent" />
			<param name="bgcolor" value="#190208" />
			<embed id="advFlash" src="flash/image4.jpg" wmode="transparent" quality="high" width="491" height="200" name="key_visual" bgcolor="#190208" align="middle" allowScriptAccess="sameDomain" />
		</object>
<div class="btn_movie"><a href="#" onclick="movie.trailer(); return false;"><img src="images/tankace/main/movie_btn.gif" alt="refresh" /></a></div>
	</div>
	<!----- News/Events ----->
	<div class="titles title_news"><div class="btn_more"><a href="news.php"></a></div></div>
	<div class="contmid">
		<ul class="newslist">
 <!-- <ul>
	
	<li style='height:35px;padding-bottom:2px'><br>
		&nbsp;&nbsp;<img src='images/ongoing.gif'> <a href='shownews.php?news=100' title='' style='height:12px;padding:3px 0 0px 2px;'>
			Open beta dimulai! </a>
	
</ul>
</li>!-->
<?php
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$get_news = sqlsrv_query($connect_mssql,'SELECT top 5 news_title,news_autor,news_category,news_date,news_context,news_id from RanUser.Dbo.web_news order by news_date desc',$params,$options);


for($i=0;$i < sqlsrv_num_rows($get_news);++$i)
         {
          $row = sqlsrv_fetch_array($get_news,SQLSRV_FETCH_NUMERIC);

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);

$content8 .= "         
<ul>
	
	<li style='height:35px;padding-bottom:2px'><br>
		&nbsp;&nbsp;<img src='images/notice.gif'> <a href='shownews.php?news=$row[5]' title='' style='height:12px;padding:3px 0 0px 2px;'>
			$row[0] </a> 
		<span class='date' style='padding-top:0px;height:18px;float: right;'>Date : $row[3]</span></font>

	
</ul>
";
      }
$content8 .="";
show($content8);
?>
			
		</ul>
	</div>
	<!----- Gallery Board ----->
	<div class="titles title_gallery"><div class="btn_more"><a href="itemshop.php"></a></div></div>
	<div class="contmid">
		<ul class="gallerylist">
			<li style='height:35px;padding-bottom:2px'><br>
		&nbsp;&nbsp;<img src='images/ItemShopNew/box1.gif'> <a href='itemshop.php?' title='' style='height:12px;padding:3px 0 0px 2px;'>
			
			<font color='orange'>Zodiac accessories (7D) </a>
			<li>
			<li style='height:35px;padding-bottom:2px'><br>
		&nbsp;&nbsp;<img src='images/ItemShopNew/box2.gif'> <a href='itemshop.php?' title='' style='height:12px;padding:3px 0 0px 2px;'>
			
			<font color='orange'>Rossary necklace 100% EXP(5D) </a>
			</li>
			<li class="sep"></li>
			<li>
				<dl>
				</dl>
			</li>
		</ul>
	</div>
</div>


<div class="right_wrap">
	<!----- Main Buttons ----->
	<img src="images/tankace/main/main_buttons.gif" alt="buttons" usemap="#buttons" />
	<map name="buttons">
		<area shape="rect" coords="221,46,11,96" href="recharge2.php" target="_self" />
		<area shape="rect" coords="221,118,11,168" href="client.php" target="_self" />
		<area shape="rect" coords="221,190,11,270" href="" target="_blank"/>
	</map>

	<div class="status title_rank2"></div></center>
	<div class="contside">
	<iframe name="inner2" width="230" allowTransparency="true" height="80" src="live.php" marginwidth="0" marginheight="0" border="1" frameborder="0" scrolling="no"></iframe>
	</div>

	<!----- Trailer ----->
	
<center><br><i><font color=yellow>Contact developer</i><a href = 'https://www.facebook.com/sygoodbay/'>
  <img src= "images/sub_character01.png" width="200" height="150" border=0></a>
	<!----- Ranking ----->
	<!--

	-->
</div>


<script type="text/javascript" src="images/js/jScrollPane-2.0beta.min.js"></script>

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
		
		<video autoplay muted loop id="myVideo2">
        <source src="audio/bg3.MP4"  align=middle type="video/mp4">
    </video>
		<!----- Footer wrap ----->
	</div>
<audio controls autoplay id="myaudio">
  <source src="audio/m3c.ogg" type="audio/ogg">
</audio>
</body>	
		
<!----- Scripts ----->
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/tankace.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<!----- News Ticker ----->
<script type="text/javascript" src="js/jcarousellite-1.0.1.min.patch.js"></script>
<!----- Mate Ticker ----->
<script type="text/javascript" src="js/easySlider-1.7.js"></script>
<!-- Google Analytics Tank Ace -->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>


<!-- Mirrored from tankace.gamescampus.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:53:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>
