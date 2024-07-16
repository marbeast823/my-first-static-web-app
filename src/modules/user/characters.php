<?php
require("config.php");
function getC ($class) {

	if ($class == 2) { $char = "Swords (M)"; }
  	if ($class == 1) { $char = "Brawler (M)"; }
	if ($class == 4) { $char = "Archer (F)"; }
	if ($class == 8) { $char = "Shaman (F)"; }
	if ($class == 16) { $char = "Extreme (M)"; }
  	if ($class == 32) { $char = "Extreme (F)"; }
	if ($class == 40) { $char = "Brawler (F)"; }
	if ($class == 80) { $char = "Swords (F)"; }
	if ($class == 100) { $char = "Archer (M)"; }
	if ($class == 200) { $char = "Shaman (M)"; }
	if ($class == 1024) { $char = "Scientist (M)"; }
	if ($class == 2048) { $char = "Scientist (F)"; }
	if ($class == 4096) { $char = "Assassins (M)"; }
	if ($class == 8192) { $char = "Assassins (F)"; }
	if ($class == 16348) { $char = "Magician (M)"; }
	if ($class == 32768) { $char = "Magician (F)"; }
	if ($class == 262144) { $char = "Shaper (M)"; }
	if ($class == 80000) { $char = "Shaper (F)"; }
 
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

echo "<div style='height:1.4em;visibility:hidden;'>
           <div align=center>

<table align=center>
<tr><td><div style='width:632px; margin:0 0 0 0px; padding:5px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:18px'>
    CHARACTER INFORMATION<br><br>
    This is only preview for your characters.<br>
    </div>
<font size=2 color=black><div style='height:1.4em;visibility:hidden;'>
</div></table><div style='height:1.4em;visibility:hidden;'>Spacing</div>
		<table 'width='650' cellspacing='0' cellpadding='0' align='center' rules='cols' bordercolor='#C1C1C1' border='1' id='ctl00_ContentPlaceHolder_main_rank_GridView1' bgcolor='White''>
							<tr height=19>
						<td align=center bgcolor=gray width=60 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif>ID</strong></font></td>
						<td align=center bgcolor=gray width=150 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif>Name</strong></font></td>
						<td align=center bgcolor=gray width=60 height=26 style='background: gray font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif>Level</strong></font></td>
						<td align=center bgcolor=gray width=120 height=26 style='background: gray font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif>Class</strong></font></td>
						<td align=center bgcolor=gray width=128 height=26 style='background: gray; font: 12px verdana, sans-serif; color:#eee;'><font size=-1 color=#fbffff face=Helvetica, Geneva, Arial, SunSans-Regular, sans-serif>School</strong></font></td>
					</tr>
";



$rezultat4=sqlsrv_query($connect_mssql,"SELECT * from RanGameS1.dbo.Chainfo where Usernum = '$Usernum' AND ChaDeleted ='0' ") or die("Cant");	
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

	if($class == 40) {
				$class = getC($class);
			}

	if($class == 80) {
				$class = getC($class);
			}
	if($class == 100) {
				$class = getC($class);
			}

	if($class == 200) {
				$class = getC($class);
			}
	if($class == 1024) {
				$class = getC($class);
			}
	if($class == 2048) {
				$class = getC($class);
			}
	if($class == 4096) {
				$class = getC($class);
			}
	if($class == 8192) {
				$class = getC($class);
			}
	if($class == 16348) {
				$class = getC($class);
			}
	if($class == 32768) {
				$class = getC($class);
			}
	if($class == 10000) {
				$class = getC($class);
			}
	if($class == 20000) {
				$class = getC($class);
			}
	if($class == 262144) {
				$class = getC($class);
			}
	if($class == 80000) {
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

