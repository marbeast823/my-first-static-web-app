<? 
session_start();
header("Cache-control: private");
ob_start();
$timeStart=gettimeofday();
$timeStart_uS=$timeStart["usec"];
$timeStart_S=$timeStart["sec"]; 
require("config.php");
$login = stripslashes($_SESSION['user']);

require_once "sql_inject.php"; 
require_once "sql.class.php";
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
  $uid = sqlsrv_fetch_array(sqlsrv_query($connect_mssql,"SELECT ChaNum FROM RanGame1.dbo.ChaInfo WHERE ChaNum='".$character."'"),SQLSRV_FETCH_NUMERIC);
  return $uid[0];
}
include("includes/web_modules.php");
magic();
include("includes/clean_var.php");
include("includes/sql_check.php");
htmlspecialchars($_REQUEST);

function delayedrefresh($page) {
	echo "<meta http-equiv='refresh' content='3; URL={$page}'>";
}
function quickrefresh($page) {
	echo "<meta http-equiv='refresh' content='.0000000000000000001; URL={$page}'>";
}
if(isset($_SESSION['user'])) {clean_var($_SESSION['user']);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 

<!-- Mirrored from www.gamescampus.com/account/signup_tankace.asp?trackingcode=&trackingcodesub=&ref=http|3A|2F|2Ftankace|2Egamescampus|2Ecom|2F by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 05 Aug 2011 01:18:08 GMT -->
<head>
	<title><?php require("config.php"); echo($web['webtitle']); ?> - <?php if(!isset($_GET['op'])){echo("");} else{echo(ucfirst($_GET['op']));} ?> Registration , Game Account Sign Up</title>
	<meta name="description" content="Ran Online is the best free to play online MMO RPG game, 3D RPG genre, free to download." />
	<meta name="keywords"RAN ONLINE, EPX, EP6, EP9, EP12, EP4, PRIVATE SERVER, Private Server, MMROPG RAN PRIVATE SERVER, EPISODE 6, EPISODE 7, EPISODE 8, EPISODE 9, EPISODE 10, EPISODE X,BTG HIGH EXP, EXTREME CLASS,GUNNER CLASS, ASTRAL BIKE" /> 

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<script type="text/javascript" src="images/js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js2/common.js"></script>
	<script type="text/javascript" src="js2/account.js"></script>
	<script type="text/javascript" src="js2/jquery.validate.js"></script>
	<script type="text/javascript" src="images/js/jScrollPane-0.8.6.js"></script>
	<script type="text/javascript">
		var teaser = {
			featurelist: function () {
				$('#feature_list').jScrollPane({ scrollbarWidth: 14, scrollbarMargin: 10 });
			}
		};

		$(document).ready(function () {
			teaser.featurelist();
		});
	</script>	<link rel="stylesheet" type="text/css" href="signup_tankace/signup.css" />	<script type="text/javascript" src="signup_tankace/signup.js"></script></head> 
<body>
<div class="page">	<div class="main_logo">		<div class="logo_link"><a href="index.php" title="Tank Ace" target="_blank"></a></div>	</div>		<div class="main" >		<div class="container">			<!-- Left Wrap -->			

			<div class="left_wrap">				

					<div class="movie"><font size=2 color=red>
					<i>untuk menghindari hacking/hijack,jangan gunakan password yang sama dengan akun private server yang pernah kamu mainkan.</i>				</div>
				<div class="feature_wrap">
					<div class="feature_list">
						<ul id="feature_list">
							<li>
<div class="read_contents">
 </div>

							</li>	
						</ul>
					</div>
				</div>
			</div>			<!-- Left Wrap . End -->
			<!-- Contents Wrap -->			<div class="content_wrap">				<div class="sign">					<div><img src="images/tankace/signup/bg_top1.jpg" /></div>
					<div class="signup_content_wrap">
						<form name="frmRegister" id="frmRegister" method="post">
<?php
$result = sqlsrv_query($connect_mssql,"SELECT count(*) FROM GSUserInfo");
$accounts = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC);
$accounts = $accounts[0];

if($CONFIG['maxaccounts']==0) {
	$maxaccounts = 0;
} elseif($accounts>=$CONFIG['maxaccounts']) {
	$maxaccounts = 1;
} else {
	$maxaccounts = 0;
}

if($maxaccounts==0) {


$error = 0;

echo '
<script>
function isEmailAddress(email) {
	if (email.match(/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/)) {
		return true;
	} else {
		return false;
	}	
}

function isAlphaNumeric(value) {
	if (value.match(/^[a-zA-Z0-9]+$/)) {
		return true;
	} else {
		return false;
	}	
}


	if(register.account.value=="") { 
		alert("Input UserName!") 
		return false; 
	}
	if (!isAlphaNumeric(register.account.value)) {
		alert("UserName Must Alphabet!");
		return false;
	}
	if(register.password.value=="") { 
		alert("Input Password!") 
		return false; 
	}
	if (!isAlphaNumeric(register.password.value)) {
		alert("Password Must AlphaNumeric!");
		return false;
	}
	if(register.password2.value=="") { 
		alert("Retype Password.") 
		return false; 
	}

	if(register.email.value=="") { 
		alert("Input Email!") 
		return false; 
	}
	if (!isEmailAddress(register.email.value)) {
		alert("Email Error!");
		return false;
	}
return true;
}
</script>
';


if($_POST['register']=='register') {

	$error = 2;

    $account = $_POST['account'];
    $sqlinject->test($account); 
    $password = $_POST['password'];
    $sqlinject->test($password); 
    $password2 = $_POST['password2'];
    $sqlinject->test($password2); 
    $sandi = $_POST['sandi'];
    $sqlinject->test($sandi); 
    $email = $_POST['email'];
    $sqlinject->test($email);    
    $security = $_POST['security'];

	echo "<center>";

    $result = sqlsrv_query($connect_mssql, (sprintf(CHECK_ACCOUNT, $account)));
    $rows=sqlsrv_has_rows($result);

    if ($rows>0) {
        echo "Account already exist.<br>";
        $error = 1;
    }

    if ((strlen($Account)<4 || strlen($Account)>13)&& $Account!="") {
        echo "Account length must be 4 to 12 characters long.<br>";
        $error = 1;
    }

    if ((strlen($password)<4 ||strlen($password)>12) && $password!="") {
        echo "Password length must be 4 to 12 characters long.<br>";
        $error = 1;
    }
    if ($password!=$password2) {
        echo "Retyped password is incorrect.<br>";
        $error = 1;
    }
    if ((strlen($sandi)<4 ||strlen($sandi)>13) && $sandi!="") {
	echo "Pincode is incorrect";
	$error = 1;
    }
    if ((strlen($email)<7 ||strlen($email)>100) && $email!="") {
	echo "$warning_start E-Mail length must be 7 to 100 characters long.$warning_end";
	$error = 1;
    }
    echo "</center>";




}




if($error<2) {
$scode = mt_rand(1000000,9999999);


	echo "       
							<input type='hidden' name='gamenum' value='6' />
							<input type='hidden' name='refererdomain' value='http|3A|2F|2Ftankace|2Egamescampus|2Ecom|2F' />
							<input type='hidden' name='trackingcode' value='' />
							<input type='hidden' name='trackingcodesub' value='' />

							<input type='hidden' name='UserHashCode' value='' />
							<input type='hidden' name='InviteTrackingCode' value='' />
							<input type='hidden' name='newsyn' value='1' />
							<table>
								<tbody>
									<tr>
										<th><p>User ID</p></th>
										<td class='hsize'>
											<input type='text' name='account' id='txtJoinUserID' maxlength='20' />
											<div class='msg'>4 to 20 characters in length</div>
										</td>
									</tr>
									<tr>
										<th><p>Password</p></th>
										<td class='hsize'>
											<input type='password' name='password' id='txtJoinUserPassword' maxlength='20' />
											<div class='msg'>6 to 20 characters in length</div>
										</td>
									</tr>
									<tr>
										<th><p>Re-Type Password</p></th>
										<td class='hsize'>
											<input type='password' name='password2' id='txtJoinUserPasswordRe' maxlength='20' />
										</td>
									</tr>

									<tr>
										<th><p>E-mail</p></th>
										<td class='hsize2' valign='top'>
											<input type='text' name='email' id='txtUserEmail' maxlength='100' />
											<div class='msg' style='color:red;'>
												Please enter a valid email address. This email will be used to retrieve your lost ID or PW.
											</div>
										</td>
									</tr>
									<tr>
										<th class='last'><p>Verification</p></th>
										<td class='last'>
											<div class='vcode'>
 											<input type='text' name='security' id='txtValidateString' maxlength='7' class='verif' />&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color=green><b>$scode</b></font></div></div>
											<div class='vcode_msg'>* Please type the code below for verification purposes.</div>
										</td>
									</tr>
									</tr>

								</tbody>
							</table>
  <input type=hidden name=code value='{$scode}'><input type=hidden name=register value='register'>
							<div class='btns'>

<input type=hidden name=code value='{$scode}'><input type=hidden name=register value='register'>

                <td width='391'> <input type='image' src='images/gamescampus/accounts/btn_submit.gif' alt='Submit button'>
                                 <a href='index.php'> <onclick='return false;'><img src='images/gamescampus/accounts/btn_cancel.gif' alt='Cancel' /></a>
							</div>
</div>
					</div>  
				</div>";
}
if($error==2) {

	$UserName = stripslashes($_POST['UserName']);
	$password = stripslashes($_POST['password']);
	$password2 = stripslashes($_POST['password2']);
	$email = stripslashes($_POST['email']);
	$security = stripslashes((int)$_POST['security']);


$password = strtolower($password);

require("config.php");

sqlsrv_query($connect_mssql,"INSERT INTO GSUserInfo (UserName, UserID, UserPass, UserType, UserAvailable, CreateDate, ChaRemain, ChaTestRemain, UserEmail, UserPoint)
VALUES ('$account','$account','$password','1','3',getdate(),'2','10', '$email', '0')");
$password = strtolower($password);



echo "
<center>$ok_start Account has been Registered Successfully</font></b> $ok_end<br><br></center>
<div class='download_content_wrap'>
						<div class='message'>
							<h1>
								Congratulations!<br /><br />
								Your user ID is : <span>$account</span>
							</h1>
							<p class='main'>
								Thank you for signing up!<br />
								Service begins soon.<br />
								Please visit our <a href='http://cnnran.forumtl.com'>Forums</a> for exclusive news and updates!
							</p>
						</div>
						<div class='download'>
							<!--<a href='client.php'><img src='images/tankace/signup/btn_download.gif' /></a><br />
							<br />
							<div id='mirror_show'><a href='client.php' onclick='$('#mirror_show').hide(); $('#mirrors').show(); return false;'>Show different download mirrors</a></div>

							<div id='mirrors' style='display:none;'>
								<a href='#' target='_blank' alt='MMOSite - Download' /><img src='images/tankace/signup/btn_download_mmosite.html' /></a>
							</div>!-->
							<input type='button' onclick='go_home();' class='btn_bottom' value='Continue' />
						</div>
						<div class='link'><br>
							while you are downloading, please visit the 
							<a href='index.php'>Site</a> main page
							 or our <a href='index.php'>Installation</a> & 
							 <a href='index.php'>Game Guide</a>.
						


		";
	}
	
} else {
		
}
?>
						</form>
						<script type="text/javascript">
						function go_home() {
						location.href = "index.php";
						}
							account.getSecurityQuestion('1');
							var validator = account.validator();
							function after_signup() {
								location.href = "signup_tankace_complete12e7.html?trackingcode=";
							}
						</script>
					</div>				</div>			</div>		</div>    </div></div>
<!-- Footer Wrap --><!-- LOE Footer --><div class="footer">	<div class="logos">					</div></div>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-487178-46']);
_gaq.push(['_trackPageview']);
(function () {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

<!-- Footer Wrap .End --></body>
<!-- Mirrored from www.gamescampus.com/account/signup_tankace.asp?trackingcode=&trackingcodesub=&ref=http|3A|2F|2Ftankace|2Egamescampus|2Ecom|2F by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 05 Aug 2011 01:18:17 GMT -->
</html>
