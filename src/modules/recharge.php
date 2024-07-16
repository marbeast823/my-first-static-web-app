<?php
<html>

<!-- Mirrored from tankace.gamescampus.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 04 Aug 2011 11:52:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>
	<title>Ran Online -  Game Guide</title>
	<meta name="description" content="Ran Online. Stylish Action RPG. The best free to play online MMORPG game, free to download." />
	<meta name="keywords"Ran, Ran Online, Classic, Klasik, JS, Jaspace" />

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/> 
	<link rel="shortcut icon" href="favicon.ico" /> 
	<link type="text/css" rel="Stylesheet" href="css/download.css"  />
	<script type="text/javascript" src="images/js/script.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

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
					<!----- Mate Ticker ----->
					<a href="recharge.php"><img src="images/recharge_on.gif" />
					
				<div class="titles title_facebook"><div class="btn_more"><a href="https://www.facebook.com/gaming/RanWorld" target="_top"></a></div></div>
					<div class="contside facebook">
           				 <iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FRanWorld%2F&amp;width=740&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:740px; height:154px;" allowTransparency="true"></iframe>
					</div>

				</div>

	
                                        <div class="content_wrap">
$error = 1;

echo '
<script>
function checkform1() {
	if(lostpassword.account.value=="") { 
		alert("Input UserName!")
		return false; 
	}
return true;
}

function checkform2() {
	if(lostpassword.answer1.value=="") { 
		alert("Input TopUp Code.") 
		return false; 
	}
return true;
}
</script>
';


echo '<center>';

if($_POST['lostpassword']=='account') {

	

	$postusername = $_POST['account'];

	$result = mssql_query ("SELECT UserNum, Username, UserPass, UserPoint FROM RanUser.dbo.GSUserInfo WHERE Username = '$postusername' ");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		$error = 2;
	} else {
		echo "Account doesn't exist!<p>";
		$error = 1;
	}
		
}

if($_POST['lostpassword']=='email') {

	$error = 3;

	$postusername = $_POST['account'];
	$postanswer1 = $_POST['answer1'];

	

	$result = mssql_query ("SELECT CodeValue,Code FROM RanUser.dbo.TopUp WHERE Code = '$postanswer1'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);

		$Code = ($Code);
		$Value = ($CodeValue);		
	if($Code!=$postanswer1) {
			echo "Top up code is wrong!<p>";
			$error = 2;
		}

		
	} else {
		echo "Wrong Code!<p>";
		$error = 2;
	}

}

if($error==1) {
echo " <font color=yellow size=2><b><a href='index.php?op=donate'>Donate to Get Top Up Code And Night Cash (NP)</a></b></font><br /><br /><br />
<form name='lostpassword' action='' method='post' onsubmit='return checkform1()' autocomplete='off'>
		<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
			<tr>
				<td width=100 align=right><font color=white face='Times New Roman' size=3><b>
					Username :&nbsp;&nbsp;
				</td>
				<td>
					<div align=right>
						<input type=text size=16 maxlength=20 name=account>
					</div>
				</td>
			</tr>
		
		<div align=center>
			<BR>
			<input type=hidden name=lostpassword value='account'>
			<input type='submit'  name=Login value=' Submit  '>
		</div>
	</form>


";
}

if($error==2) {
echo "
<form name='lostpassword' action='' method='post' onsubmit='return checkform2()' autocomplete='off'>
	<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
	<tr>
		<td width=120 align=right><font color=white size=2 face='Times New Roman'><b>
			Top Up Code :&nbsp;&nbsp;
		</td>
		<td>
			<div align=right>
				<input type=text size=16 maxlength=25 name=answer1>
			</div>
		</td>
	</tr>
	<tr>
		<td width=100 align=right>
		
		</td>
		<td>
			<div align=right>
			
			</div>
		</td>
	</tr>
	</table>
	<div align=center>
		<BR>
		<input type=hidden name=lostpassword value='email'>
		<input type=hidden name=account value='{$postusername}'>
		<input type='image' src='images/submit.gif' name=Login value='   Submit   '>
	</div>
</form>
";
}

if($error==3) {

	$account = $postusername;
	$Code = ($Code);
	$Value = ($CodeValue);	
	echo '<br>';
	
	mssql_query("UPDATE RanUser.dbo.GSUserInfo SET UserPoint = UserPoint + '$Value' WHERE Username = '$account' ");
	mssql_query("DELETE FROM RanUser.dbo.TopUp where Code = '$Code' and CodeValue = '$Value'");
	echo "<center><td><div align=center><font size=3>You have succesfully top up your account!<br><br>
	<b><div align=left>Username</b>:$account<br><br>
	<b><div align=left>$Value</b> points has been added to your account!</font></td>";
	
	

}

echo '</center>';



?>
