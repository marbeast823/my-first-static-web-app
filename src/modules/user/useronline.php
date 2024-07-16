<?php
require("config.php");

function getC ($class) {
if ($class == 2) { $char = "Swordsman"; }
  	if ($class == 1) { $char = "Brawler"; }
	if ($class == 4) { $char = "Archer"; }
	if ($class == 8) { $char = "Shaman"; }
 	if ($class == 16) { $char = "NewClassMale"; }
	if ($class == 32) { $char = "NewClassFemale"; }
return $char;
}

function getN ($int) {
    if ($int == 0) { $char = "SG"; }
    if ($int == 1) { $char = "MP"; }
    if ($int == 2) { $char = "PHX"; }
 
return $char;
}

$error=1;
if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$query = "SELECT header from RanUser.dbo.Web";
	$result = $db->Execute($query);
	$row = $result->fetchrow();
	$idcode = (int)$_POST['idcode'];
	$row = $result->fetchrow();
	$Cost = 0;
	$result = mssql_query ("SELECT UserPoint FROM RanUser.dbo.UserInfo Where Username = '$account_id'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		$lev = ($ChaLevel);
		$Gold = ($ChaMoney);
		$ChaOnline = ($ChaOnline);
		if($UserPoint<$Cost) {
					echo '<script language="JavaScript">
		alert("Your Account Dont Have Enough RE-Points to Change. Vote or Donate to Have RE-Points.");
		</script>';
		$error = 1; 
		}
	
	
	$result = mssql_query ("SELECT ChaMoney,ChaLevel,ChaReborn,ChaOnline,ChaSchool FROM RanGame1.dbo.Chainfo Where ChaNum = '$idcode'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		$reborn2 = ($ChaReborn);
		$type = ($ChaOnline);
		$lev = ($ChaLevel);
		$Gold = ($ChaMoney);
		$ChaSchool = ($ChaSchool);
		$nation = ($Nation);
		$ChaReborn = ($ChaReborn);

	
			if($idcode == NULL) {
					echo '<script language="JavaScript">
		alert("No Character Selected. Please Create First and Try Again.");
		</script>';
		$error = 1; 
			}
		
} else {
					echo '<script language="JavaScript">
		alert("No Character Selected. Please Create First and Try Again.");
		</script>';
		$error = 1; 
	}
		}


	
}
if($error==1) {
	$query = "SELECT resetmoney,resetlevel,resetslimit,reset_skill,reset_quest,reset_stat,clean_skills from RanUser.dbo.Web";
	$result = $db->Execute($query);
	$row = $result->fetchrow();
$login = stripslashes($_SESSION['user']);
$comanda1="SELECT UserNum from RanUser.dbo.UserInfo where Username = '$login' ";
$rezultat2=mssql_query($comanda1) or die("Can`t be executed");
while($r2=mssql_fetch_array($rezultat2)){
$Usernum = $r2["UserNum"];
}
  			
				;
				
echo "<div style='height:1.4em;visibility:hidden;'>
           <div align=center>

<div align=center>

<table align=center>
<tr><td><div style='width:632px; margin:0 0 0 0px; padding:5px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:18px'>
    

    If you have User account being connected problem, Resolve it here.<br>
    </div>
<font size=2 color=black>
</div></table><div style='height:1.4em;visibility:hidden;'>Spacing</div>
		<table 'width='650' cellspacing='0' cellpadding='0' align='center' rules='cols' bordercolor='#C1C1C1' border='1' id='ctl00_ContentPlaceHolder_main_rank_GridView1' bgcolor='White''>				

";



$rezultat4=mssql_query("SELECT * from RanGame1.dbo.Chainfo where Usernum = '$Usernum' AND ChaDeleted ='0' ") or die("Cant");	
while($r3=mssql_fetch_array($rezultat4))

{
			$GuildName = $result1["GuName"];
			$Name = $r3['ChaName'];
			$lev = $r3['ChaLevel'];
			$Reborn = $r3['ChaReborn'];
			$school = $r3['ChaSchool'];
			$class = $r3['ChaClass'];
			$bright = $r3['ChaBright'];
			$life = $r3['ChaLiving'];
			$Num = $r3['ChaNum'];
			$id = $r3['GuNum'];
			$GuildName = $result1["GuName"];

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
				
			echo"  								
							



</tr>
";
}



echo "<form name='lostpassword' action='' method='post' onsubmit='return checkform1()' autocomplete='off'>

				<table width='640' border='0' cellspacing='4' cellpadding='0' align='center'>
			<tr>
				<td><div align='center'><br>
				<font style='font: 12px tahoma, sans-serif; color:#CCCCCC;'>Select the character you want to repair.
				
		<table width='640'align='center' border='0' cellspacing='4' cellpadding='0'>
			<tr>
				<td><div align='center'><br>
				<select name=idcode style='background: gray; font: 12px verdana, sans-serif; color:#eee;'>
<option Value=NULL>Select Character</option>


	
";

$i=0;
$rezultat4=mssql_query("SELECT * from RanGame1.dbo.Chainfo where Usernum = '$Usernum' AND ChaDeleted ='0' ") or die("Cant");
while($r3=mssql_fetch_array($rezultat4))
{
$r4 = $r3['ChaName'];
$ChaNum = $r3['ChaNum'];
$r1 = $r4;
$r2++;	

	echo('
			<option value='.$ChaNum.'>'.$r4.'</option>
		');

}

echo "</select> 
				</td>
			</tr>

		
		
			
			<tr align=center><input type=hidden name=lostpassword value='Buy'>
			<input type=hidden name=Nation value='$r2'>
			</td></tr><tr>                        <table width='640' border='0' cellspacing='4' cellpadding='0'>
                          <tr>
                             <td width='1'><div align='center'><br>
                             <input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'>
                            </div></td>

                          </tr>
                        </table>
</tr></td>
		
	</form>  

";
}
if($error==2) {
	$account_id = stripslashes($_SESSION['user']);
	$query = "SELECT header from RanUser.dbo.Web";
	$result = $db->Execute($query);
	$row = $result->fetchrow();
	$idcode = (int)$_POST['idcode'];
	$Cost = 30;

	/* Check Valid Character in Account Start */

	$accountinfo = $db->Execute("Select Usernum from userinfo where username=?",array($account_id));
 	$accountinfo = $accountinfo ->fetchrow();
	$UserNum = $accountinfo[0];
	$resTop = mssql_query("SELECT * from RanGame1.dbo.Chainfo where Usernum = '$UserNum' ");
	$i=0;
	while($r = mssql_fetch_array( $resTop )) 



if($r[ChaNum] == $idcode)
{

/* Game Function Start */

$scode = mt_rand(1000000,9999999);
require("config.php");
mssql_query("INSERT INTO TransactionLogs (TransactionID, UserName, FunctionRecord, DateRecord, PointsCost, PointsAdd)
VALUES ('$scode','$account_id','Reset PK',getdate(),'$Cost','0')") or die("Register Failed try to register again");



	mssql_query("UPDATE Userinfo SET UserLoginState = 0                WHERE Username = '$account_id' ");
	

	
	echo '<script language="JavaScript">
		alert("Character Updated Offline.");
		</script>';
		$error = 1; quickrefresh('manage.php?op=user&option=useronline');

/* Game Function End */



}else{
echo "";quickrefresh('manage.php?op=user&option=useronline');
}
}
/* Check Valid Character in Account End */
?>