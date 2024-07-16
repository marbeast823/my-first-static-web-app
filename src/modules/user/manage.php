<?php
require("config.php");
function getC ($class) {

	if ($class == 2) { $char = "Swordsman"; }
  	if ($class == 1) { $char = "Brawler"; }
	if ($class == 4) { $char = "Archer"; }
	if ($class == 8) { $char = "Shaman"; }
	if ($class == 16) { $char = "NewMan"; }
  	if ($class == 32) { $char = "NewWoman"; }
	if ($class == 64) { $char = "Fight Woman"; }
	if ($class == 128) { $char = "Sword Woman"; }
	if ($class == 256) { $char = "Archer Man"; }
	if ($class == 512) { $char = "Shaman Man"; }
 
return $char;
}

function getN ($int) {
    if ($int == 0) { $char = "Secred Gate"; }
    if ($int == 1) { $char = "Mystic Peak"; }
    if ($int == 2) { $char = "Phoenix"; }
 
return $char;
}


$error=1;
if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$Nation = stripslashes($_POST['nation']);
	$name = stripslashes($_POST['name']);
	$ChaOnline = stripslashes($_POST['ChaOnline']);
	$query = "SELECT resetmoney,resetlevel,resetslimit,reset_skill,reset_quest,reset_stat,clean_skills from RanUser.dbo.Web";
	$result = sqlsrv_query($connect_mssql,$query);
	$row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
	$Cost = $row[0];
	$Class = ($ChaClass);
	$School = ($School);
	$result = sqlsrv_query($connect_mssql,"SELECT ChaName,ChaClass,ChaBright,ChaLiving,ChaSchool,ChaMoney,GuNum,ChaLevel,ChaReborn,ChaOnline FROM RanGameS1.dbo.Chainfo Where ChaName = '$name'");
	$rows=sqlsrv_has_rows($result);

	if($rows === true) {
		$rows=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC); 
		extract($rows);
		$reborn2 = ($ChaReborn);
		$type = ($ChaOnline);
		$lev = ($ChaLevel);
		$Gold = ($ChaMoney);
		$Class = ($ChaClass);


	$School = ($School);
	if($Gold<$Cost) {
			echo "<font color=red><b>$warning_start <font color=green>$name</font> Dont Have <font color=green>$row[0]<font color=red> to reborn. $warning_end</font>";
			$error = 1;
		}
	if($lev<$row[1]) {
			echo "<font color=red><b>$warning_start <font color=green>$name</font> is not Level <font color=green>$row[1]<font color=red> to be reborn. $warning_end</font>";
			$error = 1;
		}
	if($reborn2>=$row[2]) {
			echo "<font color=red><b>$warning_start <font color=green>$name</font> has been Reach <font color=green>$row[2]</font> Max Reborn $warning_end</font>";
			$error = 1;
		}

		if($type>=1) {
			echo "<font color=red><b>$warning_start <font color=green>$name</font> is Online. Please Log out First and Try Again. $warning_end</font>";
			$error = 1;
			}
	}
}
if($error==1) {
	$query = "SELECT resetmoney,resetlevel,resetslimit,reset_skill,reset_quest,reset_stat,clean_skills from RanUser.dbo.Web";
	$result = sqlsrv_query($connect_mssql,$query);
	$row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
$login = stripslashes($_SESSION['user']);
$comanda1="SELECT UserNum from RanUser.dbo.GSUserInfo where Username = '$login' ";
$rezultat2=sqlsrv_query($connect_mssql,$comanda1) or die("Can`t be executed");
while($r2=sqlsrv_fetch_array($rezultat2,SQLSRV_FETCH_ASSOC)){
$Usernum = $r2["UserNum"];
}
  			
				;

echo "
           <div align=center>

<table align=center>
<tr><td><div style='width:633px; margin:0 0 0 0px; padding:5px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:15px'>
    Manage your Account and Character<br><br>
    Please double check before applying changes.<br>
    </div>
<font size=2 color=black>
</div></table>
<table style='border-collapse: collapse; width: 485px; height: 97px; text-align: left; margin-left: 1px; margin-right: auto;'>
  <tbody>
    <tr>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h4-character'target='_top'><b>Character Information</a><br />
        </td>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h5-rebirth'target='_top'><b>Character Rebirth</a><br />
        </td>
    </tr>
    <tr>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h6-changepassword'target='_top'><b>Change Password</a><br />
        </td>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h7-changeschool'target='_top'><b>Change Character School</a><br />
        </td>
    </tr>
    <tr>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h8-resetstat'target='_top'><b>Reset Character Stat</a><br />
        </td>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h9-addstat'target='_top'><b>Manual Input Stat</a><br />
        </td>
    </tr>
    <tr>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h10-earnpoint'target='_top'><b>Earn V-Points</a><br />
        </td>
      <td><img src='Images/point_b.gif' alt='' />&nbsp;<a href='http://v-ran.activebb.net/h11-account'target='_top'><b>Account Overview</a><br />
        </td>
    </tr>
  </tbody>
</table>
<div style='text-align: left;'><br />
  </div>
";



$rezultat4=sqlsrv_query($connect_mssql,"SELECT * from RanGameS1.dbo.Chainfo where Usernum = '$Usernum' ") or die("Cant");
	
while($r3=sqlsrv_fetch_array($rezultat4,SQLSRV_FETCH_ASSOC))

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

	if($class == 64) {
				$class = getC($class);
			}

	if($class == 128) {
				$class = getC($class);
			}
	if($class == 256) {
				$class = getC($class);
			}

	if($class == 512) {
				$class = getC($class);
			}




echo"  								



</tr>
";
}
echo "					
				
					";
}

?>

