<?php
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
	$result = sqlsrv_query($connect_mssql,"SELECT UserNum, Username, UserPass, UserPoint FROM RanUser.dbo.GSUserInfo WHERE UserName = '$postusername' ");
	$rows=sqlsrv_has_rows($result);

	if($rows>0) {
		$rows=sqlsrv_fetch_ARRAY($result,SQLSRV_FETCH_ASSOC); 
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


	$result = sqlsrv_query($connect_mssql,"SELECT CodeValue,Code FROM RanUser.dbo.TopUp WHERE Code = '$postanswer1'");
	$rows=sqlsrv_has_rows($result);

	if($rows>0) {
		$rows=sqlsrv_fetch_ARRAY($result,SQLSRV_FETCH_ASSOC); 
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
echo " <font color=yellow size=2><b><a href='index.php?op=donate'>back to homepage</a></b></font><br /><br /><br />
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
		
		<td width='1'><div align='center'>
			<BR>
			<input type=hidden name=lostpassword value='account'>
			<input type='image' src='images/tankace/main/btn_submit.gif'  name=Login value=' Submit  '>
		</div>
	</form>


";
}

if($error==2) {
echo "
<form name='lostpassword' action='' method='post' onsubmit='return checkform2()' autocomplete='off'>
	<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
	<tr>
		<td width=120 align=right><font color=yellow size=2 face='Times New Roman'><b>
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
		<input type='image' src='images/tankace/main/btn_submit.gif' name=Login value='   Submit   '>
	</div>
</form>
";
}

if($error==3) {

	$account = $postusername;
	$Code = ($Code);
	$Value = ($CodeValue);	
	echo '<br>';
	
	sqlsrv_query($connect_mssql,"UPDATE RanUser.dbo.GSUserInfo SET UserPoint = UserPoint + '$Value' WHERE Username = '$account' ");
	sqlsrv_query($connect_mssql,"DELETE FROM RanUser.dbo.TopUp where Code = '$Code' and CodeValue = '$Value'");
	echo "<center><td><div align=center><font size=3>You have succesfully top up your account!<br><br>
	<b><div align=left>Username</b>:$account<br><br>
	<b><div align=left>$Value</b> points has been added to your account!</font></td>";
	
	

}

echo '</center>';



?>
