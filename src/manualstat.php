<? 
session_start();
header("Cache-control: private");
ob_start();
$timeStart=gettimeofday();
$timeStart_uS=$timeStart["usec"];
$timeStart_S=$timeStart["sec"]; 
require("config.php");
$login = stripslashes($_SESSION['user']);
include("includes/web_modules.php");
magic();
include("includes/clean_var.php");
htmlspecialchars($_REQUEST);

function delayedrefresh($page) {
	echo "<meta http-equiv='refresh' content='3; URL={$page}'>";
}
function quickrefresh($page) {
	echo "<meta http-equiv='refresh' content='.0000000000000000001; URL={$page}'>";
}
if(isset($_SESSION['user'])) {clean_var($_SESSION['user']);}
?>

<!DOCTYPE html>
<html>

<!-- Mirrored from tankace.gamescampus.com/ItemShop/List by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 12:01:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title><?php require("config.php"); echo($web['webtitle']); ?> - <?php if(!isset($_GET['op'])){echo("");} else{echo(ucfirst($_GET['op']));} ?> Web Manual Stats Adder</title>
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
		<div class="main_logo"><div class="logo_link"><a href="index.php" title="Home"></a></div></div>
		
		<!----- Main contents wrap ----->
		<div class="main">
			<!----- Main Navigation Bar ----->
			<div class="mnb">
				<div id="mnb1"><a href="client.php"></a></div>
				<div id="mnb2"><a href="news.php"></a></div>
				<div id="mnb3"><a href="guide.php" onclick="alert('Coming Soon!'); return false;"></a></div>
				<div id="mnb4"><a href=""></a></div>
				<div id="mnb5"><a href="itemshop.php"></a></div>
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
							<div class="signup"><a href="register.php" target="_top"><img src="images/tankace/common/signup_btn.gif" alt="Sign Up" /></a></div>				
					</div>
							




					<!----- Mate Ticker ----->

			<div class="contside">
			<ul class="lnb_menu">
			<br><li></li>
								
			<br><br></ul><li></li>
			</div>
				

					<div class="lnb lnb_support"></div>
			<div class="contside">
				<ul class="lnb_menu">
				<li><div class="icons ico_lnb"></div><a href="http://forum.vran.info" title="FAQ" class="selected">Frequent Ask</a></li>
				<li class="last"><div class="icons ico_lnb"></div><a href="" title="DQA" >Forum Board</a></li>
				</ul>
			</div>


				</div>

				<script type="text/javascript" src="images/js/jcarousellite-1.0.1.min.js"></script>
<div class="content_wrap_top"></div>
<div class="content_wrap">
<div style="padding:10px 0;"><center><a href="http://ranindonesia.com/c3-premium-items"><img src="images/premium_title.png" /></a></center></div>

        
                    <table class="board" border="0" cellpadding="0" cellspacing="1" summary="SupportList">
                <caption class="displayNone">SupportList</caption></a>
                <colgroup>
                    <col width="30" />
                    <col width="234" />
                    <col width="100" />
                    <col width="100" />
                    <col width="100" />                
                </colgroup>

                <tbody>
        
                <tr class="trStyle1">
                    <tr align="left">
<?php
// 
require("config.php");
$account_id = stripslashes($_SESSION['user']);
$account_id = clean_var($account_id);
if($account_id == NULL){ quickrefresh('index.php'); Die ("<img src=\"images/Warning.png\" alt=\"Access Denied\"> Access Denied. Please LogIn to Proceed.</div></table></div></table></table>"); }
$login = stripslashes($_SESSION['user']);
include_once('sql_check.php');
check_inject();

require_once "sql_inject2.php"; 
require_once "sql.class2.php";
$bDestroy_session = TRUE; 
$url_redirect = 'error.php';
 
$sqlinject = new sql_inject('sqlinject/log_file_sql.log',$bDestroy_session,$url_redirect)  ;
function valid($word)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  for($i=0;$i<strlen($word);$i++)
  {
    $ch = substr($word,$i,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }
  }
  return false;
}
function getchar($character)
{
  $uid = mssql_fetch_array(mssql_query("SELECT ChaNum FROM RanGameS1.dbo.ChaInfo WHERE ChaNum='".$character."'"));
  return $uid[0];
}

////////////////////////Get user nick from session id



echo '
<table align=center>
<tr><td><div style="width:632px; margin:0 0 0 0px; padding:5px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:18px">
    Manual Add Stat Point System.<br><br>

    Note: This is free service, Make sure you put exact value.<br>
    </div></table>';
echo "
<table align=center width=\"630\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  
  <tr>
    <td><div align=\"center\"></div></td>
  </tr>
 
  <tr>
    <td><div align=\"center\">";

echo "<table align='center'><td><div align=\"center\"><form action=\"manualstat.php\" method=\"post\">";
echo " <table width=\"300\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
          <td width=\"300\"><div align=\"center\">
              
              
                <table width=\"300\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tr>
                  <td width=\"300\"><div align=\"center\">
                      
                        <table width=\"355\" border=\"0\" cellspacing=\"4\" cellpadding=\"0\">
                          <tr>";
$stm = mssql_fetch_array(mssql_query("SELECT UserNum FROM RanUser.dbo.GSUserInfo WHERE UserName='".$login."'"));
$tcats = mssql_query("SELECT ChaNum, ChaName FROM RanGameS1.dbo.ChaInfo WHERE UserNum='".$stm[0]."' AND ChaDeleted ='0' ORDER BY ChaNum DESC");
    echo "<td width=\"102\"><br><center><select name=\"character\" style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><option Value=NULL>Select Character</option>";
    while ($tcat=mssql_fetch_array($tcats))
    {

   echo "<option value=\"$tcat[0]\">$tcat[1]</option>";
  
   
}
 echo "</select><br/></td>";
 
    echo " </tr>
              <tr>
                <td align=\"center\"><font size=2>";
echo "<input type=\"hidden\" name=\"ok\" value=\"ok\"/></td>
</tr>
                        </table>
                        <table width=\"1\" border=\"0\" cellspacing=\"15\" cellpadding=\"0\">
                          <tr>
                            <td width=\"118\"><div align=\"right\">
";
echo "<br><input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'><br>
 </div></td>

                          </tr>
                        </table>
                      
                  </div></td>
                </tr>
              </table>
                </fieldset>
          </div></td>
        </tr>
      </table></form>
    </div></td>
 </tr></table>
  ";
    echo " <tr>
   <td height=\"10\" align=\"center\">"; 									
	$ok = $_POST["ok"];
if($ok==ok) 
{
 $number = $_POST["number"]; 
 $pin = $_POST["pin"]; 
 $character = $_POST["character"]; 
$number2=stripslashes(set_sec_see($number));
 $sqlinject->test($number2);
$pin2=stripslashes(set_sec_see($pin));
 $sqlinject->test($pin2);
$character2=stripslashes(set_sec_see($character));
 $sqlinject->test($character2);
echo "<center>";

 $whonick = getchar($character2);
if($whonick!="")
{
$item = mssql_fetch_array(mssql_query("SELECT ChaPower, ChaStrong, ChaStrength, ChaSpirit, ChaDex, ChaIntel, ChaNum, ChaStRemain FROM RanGame1.dbo.ChaInfo WHERE ChaNum='".$character2."'"));
echo "<table width=100% ><tr>
<td width=10% height=26 bgcolor=gray>&nbsp;<Font color='#FFFFFF'><strong>Pow</strong></font></td>
<td width=10% bgcolor=gray>&nbsp;<Font color='#FFFFFF'><strong>Dex</strong></font></td>
<td width=10% bgcolor=gray>&nbsp;<Font color='#FFFFFF'><strong>Int</strong></font></td>
<td width=10% bgcolor=gray>&nbsp;<Font color='#FFFFFF'><strong>Vit</strong></font></td>
<td width=10% bgcolor=gray>&nbsp;<Font color='#FFFFFF'><strong>Stm</strong></font></td>
</tr>
</tr><tr><td align=\"center\">$item[0]</td><td align=\"center\">$item[4]</td><td align=\"center\">$item[3]</td><td align=\"center\">$item[1]</td><td align=\"center\">$item[2]</td>
</tr></tr>
	</table>
";
 echo "<b>Remaining Points: $item[7]<br/><br/>";
 echo "<onevent type=\"onenterforward\">";
    echo "<refresh>
        <setvar name=\"pow\" value=\"0\"/>
  <setvar name=\"dex\" value=\"0\"/>
  <setvar name=\"int\" value=\"0\"/>
  <setvar name=\"vit\" value=\"0\"/>
  <setvar name=\"stm\" value=\"0\"/>
";
    echo "</refresh></onevent>";
 echo "<center><form action=\"manualstat.php\" method=\"post\">";
echo "<table width=\"344\" cellspacing=0 border=0 cellpadding=0 align=center>";
echo "<tr>";
echo "&nbsp;&nbsp; Pow: <input name=\"pow\" size=\"5\" maxlength=\"5\"/>";
echo "&nbsp;&nbsp; Dex: <input name=\"dex\" size=\"5\" maxlength=\"5\"/>";
echo "&nbsp;&nbsp; Int: <input name=\"int\" size=\"5\" maxlength=\"5\"/>";
echo "&nbsp;&nbsp; Vit: <input name=\"vit\" size=\"5\" maxlength=\"5\"/>";
echo "&nbsp;&nbsp; Stm: <input name=\"stm\" size=\"5\" maxlength=\"5\"/>";
echo "</table>";
echo "<input type=\"hidden\" name=\"character\" value=\"$item[6]\"/>";
echo "<input type=\"hidden\" name=\"ok2\" value=\"ok2\"/>";
  echo "<br><input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'></form></center>";
}else{
     echo "<strong>Character does not exist</strong><br/>";
   }

}

$character = $_POST["character"]; 
$pow = $_POST["pow"]; 
$dex = $_POST["dex"]; 
$int = $_POST["int"]; 
$vit = $_POST["vit"]; 
$stm = $_POST["stm"]; 
$ok2 = $_POST["ok2"];
$character2=stripslashes(set_sec_see($character));
 $sqlinject->test($character2);
$pow2=stripslashes(set_sec_see($pow));
 $sqlinject->test($pow2);
$dex2=stripslashes(set_sec_see($dex));
 $sqlinject->test($dex2);
$int2=stripslashes(set_sec_see($int));
 $sqlinject->test($int2);
$vit2=stripslashes(set_sec_see($vit));
 $sqlinject->test($vit2);
$stm2=stripslashes(set_sec_see($stm));
 $sqlinject->test($stm2);
$much = $pow2+$dex2+$int2+$vit2+$stm2;
if($ok2==ok2) 
{
echo "<center>";



if(valid($pow2))
{
echo "<strong>Invalid entry for POW type in digit!</strong>";
}else{
if(valid($dex2))
{
echo "<strong>Invalid entry for DEX type in digit!</strong>";
}else{
if(valid($int2))
{
echo "<strong>Invalid entry for INT type in digit!</strong>";
}else{
if(valid($vit2))
{
echo "<strong>Invalid entry for VIT type in digit!</strong>";
}else{
if(valid($stm2))
{
echo "<strong>Invalid entry for STM type in digit!</strong>";
}else{
$gpst = mssql_fetch_array(mssql_query("SELECT ChaStRemain FROM RanGame1.dbo.ChaInfo WHERE ChaNum='".$character2."'"));
if($gpst[0]>=$much)
{

mssql_query("Update RanGameS1.dbo.ChaInfo set ChaStRemain =ChaStRemain-'".$much."', ChaPower=ChaPower+'".$pow2."',ChaStrong=ChaStrong+'".$vit2."',ChaStrength=ChaStrength+'".$stm2."',ChaSpirit=ChaSpirit+'".$int2."',ChaDex=ChaDex+'".$dex2."' where ChaNum= '".$character2."'");

echo "<div align=center><script language='javascript'text/javascript'>alert('Add Stat Success!')</script></div><p>";
$error = 1; quickrefresh('manualstat.php');}
}
}
}
}
}
}
echo "</td>
  </tr>
  ";
?>
    </tr>  
        
                </tbody>
                </table>
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

<!-- Mirrored from tankace.gamescampus.com/ItemShop/List by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 12:01:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>
