<?php
//
require_once "security.php";
require("config.php");
$error = 1;

echo '

';



echo '';

if($_POST['lostpassword']=='account') {

	$result = mssql_query ("SELECT UserName FROM GSUserInfo WHERE UserName = '$postusername'");
	$rows=mssql_num_rows($result);
	

	$postusername = $_POST['account'];
	


	$result = mssql_query ("SELECT UserName FROM GSUserInfo WHERE UserName = '$postusername'");

	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		$error = 2;

if ($postusername == null) {
		{

	quickrefresh("findidpassword.php"); 

Die ('<script language="JavaScript">
		alert("Please put your current Username!");
		</script>'); }
		$error = 1;
	}
	} else {
		echo "<center><b>$warning_start <font color=red>Invalid <font color=green>UserName</font>. Please Try Again. $warning_end </font></B>";
		$error = 1;
	}
		
}

if($_POST['lostpassword']=='email') {

	$error = 3;

	 $postusername = $_POST['account'];

	 $postanswer2 = $_POST['answer2'];
	

	
	$result = mssql_query ("SELECT UserName, UserPass, UserEmail, UserNum, UserPoint FROM GSUserInfo WHERE UserName = '$postusername'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);


		$usermail = ($UserEmail);






	if($usermail!=$postanswer2) {
			echo "<center><b>$warning_start <font color=red><font color=green>E-Mail Address</font> you type is Incorrect. $warning_end</B></font></font>";
			$error = 2;
		}
	} else {
		echo "Account doesn't exist!<p>";
		$error = 1;
	}

}

if($error==1) {
echo "
<Script Language='Javascript'>
<!--
document.write(unescape('%3C%73%63%72%69%70%74%3E%0A%66%75%6E%63%74%69%6F%6E%20%69%73%41%6C%70%68%61%4E%75%6D%65%72%69%63%28%76%61%6C%75%65%29%20%7B%0A%09%69%66%20%28%76%61%6C%75%65%2E%6D%61%74%63%68%28%2F%5E%5B%61%2D%7A%41%2D%5A%30%2D%39%5D%2B%24%2F%29%29%20%7B%0A%09%09%72%65%74%75%72%6E%20%74%72%75%65%3B%0A%09%7D%20%65%6C%73%65%20%7B%0A%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%0A%09%7D%09%0A%7D%0A%66%75%6E%63%74%69%6F%6E%20%63%68%65%63%6B%66%6F%72%6D%31%28%29%20%7B%0A%09%69%66%28%6C%6F%73%74%70%61%73%73%77%6F%72%64%2E%61%63%63%6F%75%6E%74%2E%76%61%6C%75%65%3D%3D%22%22%29%20%7B%20%0A%09%09%61%6C%65%72%74%28%22%54%79%70%65%20%59%6F%75%72%20%55%73%65%72%4E%61%6D%65%22%29%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%20%0A%09%7D%0A%09%69%66%20%28%21%69%73%41%6C%70%68%61%4E%75%6D%65%72%69%63%28%6C%6F%73%74%70%61%73%73%77%6F%72%64%2E%61%63%63%6F%75%6E%74%2E%76%61%6C%75%65%29%29%20%7B%0A%09%09%61%6C%65%72%74%28%22%55%73%65%72%4E%61%6D%65%20%4D%75%73%74%20%41%6C%70%68%61%62%65%74%21%22%29%3B%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%0A%09%7D%0A%72%65%74%75%72%6E%20%74%72%75%65%3B%0A%7D%0A%0A%0A%66%75%6E%63%74%69%6F%6E%20%63%68%65%63%6B%66%6F%72%6D%32%28%29%20%7B%0A%09%69%66%28%6C%6F%73%74%70%61%73%73%77%6F%72%64%2E%61%6E%73%77%65%72%31%2E%76%61%6C%75%65%3D%3D%22%22%29%20%7B%20%0A%09%09%61%6C%65%72%74%28%22%54%79%70%65%20%79%6F%75%72%20%50%69%6E%43%6F%64%65%2E%22%29%20%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%20%0A%09%7D%0A%09%69%66%20%28%21%69%73%41%6C%70%68%61%4E%75%6D%65%72%69%63%28%6C%6F%73%74%70%61%73%73%77%6F%72%64%2E%61%6E%73%77%65%72%31%2E%76%61%6C%75%65%29%29%20%7B%0A%09%09%61%6C%65%72%74%28%22%50%69%6E%43%6F%64%65%20%4D%75%73%74%20%41%6C%70%68%61%62%65%74%21%22%29%3B%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%0A%09%7D%0A%09%69%66%28%6C%6F%73%74%70%61%73%73%77%6F%72%64%2E%61%6E%73%77%65%72%32%2E%76%61%6C%75%65%3D%3D%22%22%29%20%7B%20%0A%09%09%61%6C%65%72%74%28%22%54%79%70%65%20%59%6F%75%72%20%45%20%4D%61%69%6C%20%41%64%64%72%65%73%73%22%29%20%0A%09%09%72%65%74%75%72%6E%20%66%61%6C%73%65%3B%20%0A%09%7D%0A%09%0A%72%65%74%75%72%6E%20%74%72%75%65%3B%0A%7D%0A%3C%2F%73%63%72%69%70%74%3E'));
//-->
</Script>
<form name='lostpassword' action='' method='post' onsubmit='return checkform1()' autocomplete='off'>
	<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
			 <div><tr>
                    <div>
                        <p class='left'><div align='center'>
                          Please put your current username.
                        </p>
                        <p class='right'>                    
                           <input type=text maxlength=16 name=account id='newpassword2' tabindex='4' class='form_pay' style='width:120px;' /> <tr id='status' ></tr>
                        </p>                    
                    </div>
			</tr>
		 <td width='1'><div align='center'>
			<input type=hidden name=lostpassword value='account'>
			<input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'>
		</div></td>
					</div>
				</td>
			</tr>

	</form>
";
}

if($error==2) {
echo "

<form name='lostpassword' action='' method='post' onsubmit='return checkform2()' autocomplete='off'>
<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
                    <div>
                        <p class='left'><div align='center'>
                            Current Email Address.
                        </p>
                        <p class='right'>                    
                            <input type=text maxlength=40 name=answer2 tabindex='4' class='txt225' />
                        </p>
                    </div>
		 <td width='1'><div align='center'>   	
		<input type=hidden name=lostpassword value='email'>
		<input type=hidden name=account value='{$postusername}'>
		<input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'>
		</div></td>
					</div>
				</td>
			</tr>
		</table>
<br>
		<center>

	
</form>
";
}

if($error==3) {
	$randpassword = mt_rand(1000000,9999999);
	$newpassword =  strtolower($randpassword);
	$account = $postusername;
	echo '<br>';

	
	 mssql_query ("UPDATE RanUser.dbo.GSUserInfo SET UserPass = '$newpassword' WHERE Username = '$postusername'");
 
                                 

	if($setting['email']==0) {
		echo "<center> $ok_start Your Password has randomly change to : <font color=red ><b>{$randpassword}$ok_end </b></font><br> Please change your password immediately for your security.";
		
}
}

echo '';


?>
