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
$ip = $_SERVER['REMOTE_ADDR']; 
$time = date("l dS of F Y h:i:s A"); 
$script = $_SERVER[PATH_TRANSLATED]; 
$fp = fopen ("[WEB]SQL_Injection.txt", "a+"); 
$sql_inject_1 = array(";","'","%",'"'); #Whoth need replace 
$sql_inject_2 = array("", "","","&quot;"); #To wont replace 
$GET_KEY = array_keys($_GET); #array keys from $_GET 
$POST_KEY = array_keys($_POST); #array keys from $_POST 
$COOKIE_KEY = array_keys($_COOKIE); #array keys from $_COOKIE 
/*begin clear $_GET */ 
for($i=0;$i<count($GET_KEY);$i++) 
{ 
$real_get[$i] = $_GET[$GET_KEY[$i]]; 
$_GET[$GET_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_GET[$GET_KEY[$i]])); 
if($real_get[$i] != $_GET[$GET_KEY[$i]]) 
{ 
fwrite ($fp, "IP: $ip\r\n"); 
fwrite ($fp, "Method: GET\r\n"); 
fwrite ($fp, "Value: $real_get[$i]\r\n"); 
fwrite ($fp, "Script: $script\r\n"); 
fwrite ($fp, "Time: $time\r\n"); 
fwrite ($fp, "==================================\r\n"); 
} 
} 
/*end clear $_GET */ 
/*begin clear $_POST */ 
for($i=0;$i<count($POST_KEY);$i++) 
{ 
$real_post[$i] = $_POST[$POST_KEY[$i]]; 
$_POST[$POST_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_POST[$POST_KEY[$i]])); 
if($real_post[$i] != $_POST[$POST_KEY[$i]]) 
{ 
fwrite ($fp, "IP: $ip\r\n"); 
fwrite ($fp, "Method: POST\r\n"); 
fwrite ($fp, "Value: $real_post[$i]\r\n"); 
fwrite ($fp, "Script: $script\r\n"); 
fwrite ($fp, "Time: $time\r\n"); 
fwrite ($fp, "==================================\r\n"); 
} 
} 
/*end clear $_POST */ 
/*begin clear $_COOKIE */ 
for($i=0;$i<count($COOKIE_KEY);$i++) 
{ 
$real_cookie[$i] = $_COOKIE[$COOKIE_KEY[$i]]; 
$_COOKIE[$COOKIE_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_COOKIE[$COOKIE_KEY[$i]])); 
if($real_cookie[$i] != $_COOKIE[$COOKIE_KEY[$i]]) 
{ 
fwrite ($fp, "IP: $ip\r\n"); 
fwrite ($fp, "Method: COOKIE\r\n"); 
fwrite ($fp, "Value: $real_cookie[$i]\r\n"); 
fwrite ($fp, "Script: $script\r\n"); 
fwrite ($fp, "Time: $time\r\n"); 
fwrite ($fp, "==================================\r\n"); 
} 
} 

/*end clear $_COOKIE */ 
fclose ($fp);
?>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" href="css/login.css" />
<link rel="stylesheet" href="creativestyle/Layout.css" />
<script type="text/javascript" src="creativestyle/main.js"></script>
<script type="text/javascript" src="creativestyle/menu.js"></script>
	
<script>
 var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
 	var myevent = (isNS) ? e : event;
 	var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }
 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
  </script>



<script type="text/javascript">

/***********************************************
* Disable select-text script- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

//form tags to omit in NS6+:
var omitformtags=["input", "textarea", "select"]

omitformtags=omitformtags.join("|")

function disableselect(e){
if (omitformtags.indexOf(e.target.tagName.toLowerCase())==-1)
return false
}

function reEnable(){
return true
}

if (typeof document.onselectstart!="undefined")
document.onselectstart=new Function ("return false")
else{
document.onmousedown=disableselect
document.onmouseup=reEnable
}

</script>
<style>

#loginIDNPW {
    width:116px;
    _width:110px;
    float:left;
    text-align:left;
    margin:4 0 0 4px;
}
#loginIDNPW input 
{
    color:#fff; 
    font-weight:bold;
    font-size:9pt;
    height:20px; 
    width:100px; 
    padding:2px 0 0 0;
    margin:0 0 0 7px;
}
 #logolink
{
    display: normal;
    height: 15px;
    width: 35px;
    background-image: url(noise.png);
}

#loginIDNPW div.loginInputBack { background:url(creativestyle/images/bg_idpw.gif) no-repeat 0 0; margin-top:-0px; }
#loginIDNPW div.codeInputBack { background:url(creativestyle/images/bg_code.gif) no-repeat 0 0; margin-top:4px; }
#txtLocalID { background:url(creativestyle/images/id_txt.gif) no-repeat 2px 6px; }
#txtLocalID.clearBg { background-image:none; }

#ValidateCode { background:url(creativestyle/images/id_code.gif) no-repeat 2px 3px; }
#ValidateCode.clearBg { background-image:none; }
#txtPassword { background:url(creativestyle/images/pw_txt.gif) no-repeat 2px 6px; }
#txtPassword.clearBg { background-image:none; }
#loginButton { display:block; float:left; margin-top:2px}

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
#el01 {width:100%} /* Width */
#el02 { /* Text and background colour, blue on light gray */
color:#00f;
background:#ddd;
}
#el03 {background:url(/i/icon-info.gif) no-repeat 100% 50%} /* Background image */
#el04 {border-width:6px} /* Border width */
#el05 {border:2px dotted #00f} /* Border width, style and colour */
#el06 {border:none} /* No border */
#el07 {padding:1em} /* Increase padding */
#el08 { /* Change width and height */
width:4em;
height:4em;
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


<?
require("config.php");
$memb___id = $_SESSION['user'];
$comanda1="SELECT UserPoint,userpoint2 from GSUserInfo where UserName = '$memb___id' "; //query to get all affiliates
$rezultat2=sqlsrv_query($connect_mssql,$comanda1) or die("Can`t be executed");
while($r2=sqlsrv_fetch_array($rezultat2,SQLSRV_FETCH_ASSOC)){
$UserPoint = number_format($r2["UserPoint"]);
$userpoint2 = number_format($r2["userpoint2"]);
}if ((isset($_SESSION['pass'])) && (isset($_SESSION['user']))){?>

        <div >
	<div style="margin-left:10px;margin-top:-11px;color:#ffffff;text-align:left;line-height:16px;">
	<br>



<?echo '
<font color=gray>Welcome  <span id="ctl00_UserID" style="color:#2ed38f;">'.$_SESSION[user].',</span></strong><Br>
<br>E-Points: <span id="ctl00_GamePoint" style="color:#f6aa08;">'.$UserPoint.'</span></strong>
<Br>V-Points: <a href="" alt="Total Votes" target="_top" /><span id="ctl00_GamePoint" style="color:#f6aa08;">'.$userpoint2.'</a></span>

<br><br><center><a href="manage.php" target="_top" /><img src="Images/button/Manage_btn.gif" alt="" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="logout.php" alt="" />
<img src="Images/button/Logout_btn.gif" alt="" /></a>
</form>
</div>
	</div>

'; } else {

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

</div><div class="sign_wrap">
<fieldset>
<div class="title sign_off"></div>
<ul>

<li><div class="icons ico_sign"></div><a href="/findidpassword.php" target="_top"><font size=2 color=#ff3333>Forgot your Password?</a></li>
</ul>
</fieldset>
</div>
</div>
<input name="account_login" type="hidden" id="account_login" value="account_login"><input type="image" name="loginButton" id="loginButton" src="images/tankace/common/sign_btn.gif" />
</div>
 </form>
</form>
</td>
    </tr>
  </form>   '; } ?>