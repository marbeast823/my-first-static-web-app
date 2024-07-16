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
	$result = $db->Execute($query);
	$row = $result->fetchrow();
	$Cost = $row[0];
	$Class = ($ChaClass);
	$School = ($School);
	$result = mssql_query ("SELECT ChaName,ChaClass,ChaBright,ChaLiving,ChaSchool,ChaMoney,GuNum,ChaLevel,ChaReborn,ChaOnline FROM RanGame1.dbo.Chainfo Where ChaName = '$name'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
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
	$result = $db->Execute($query);
	$row = $result->fetchrow();
$login = stripslashes($_SESSION['user']);
$comanda1="SELECT UserNum from RanUser.dbo.UserInfo where Username = '$login' ";
$rezultat2=mssql_query($comanda1) or die("Can`t be executed");
while($r2=mssql_fetch_array($rezultat2)){
$Usernum = $r2["UserNum"];
}
  			
				;

echo "
           <div align=center>

<div style='width:446px; margin:0 0 0 10px; padding:10px; border:1px solid #484848; background:#0099CC; color:white; text-align:center; line-height:18px'>
	Character Information</div><br>
		</table>
		<table 'width='570' cellspacing='0' cellpadding='2' align='left' rules='cols' bordercolor='#C1C1C1' border='1' id='ctl00_ContentPlaceHolder_main_rank_GridView1' bgcolor='White''>
							<tr height=19>
						<td align=center bgcolor=gray width=50 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>ID</strong></font></td>
						<td align=left bgcolor=gray width=200 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>Name</strong></font></td>
						<td align=center bgcolor=gray width=200 height=26 style='background: gray font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>Level</strong></font></td>
						<td align=center bgcolor=gray width=200 height=26 style='background: gray font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>Class</strong></font></td>
						<td align=center bgcolor=gray width=200 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>School</strong></font></td>
						<td align=center bgcolor=gray width=30 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif><strong>Reborn</strong></font></td>
					</tr>
";



$rezultat4=mssql_query("SELECT * from RanGame1.dbo.Chainfo where Usernum = '$Usernum' ") or die("Cant");
	
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
							<td width='20' align='center' style='border-bottom:#CCCCCC 1px solid'><center>$Num</center></td>
							<td width='158' style='border-bottom:#CCCCCC 1px solid' align='center'><center>$Name</center></td>
							<td width='30' align='center' style='border-bottom:#CCCCCC 1px solid'><center>$lev</center></td>
							<td width='120' align='center' style='border-bottom:#CCCCCC 1px solid'><center>$class</center></td>
							<td width='128' align='center' style='border-bottom:#CCCCCC 1px solid'><center>$school</center></td>
							<td width='30' align='center' style='border-bottom:#CCCCCC 1px solid'><center>$Reborn</center></td>



</tr>
";
}
echo "					
				
					";
}

?>

