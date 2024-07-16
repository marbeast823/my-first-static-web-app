<?
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
    if ($int == 0) { $char = "<img src='images/sg.gif' >"; }
    if ($int == 1) { $char = "<img src='images/mp.gif' >"; }
    if ($int == 2) { $char = "<img src='images/pnx.gif' >"; }
 
return $char;
}


function getG ($int) {
    if ($int == "0") { $char = "NONE"; }
return $char;
}

echo "



";



$resTop = mssql_query("SELECT TOP 10 P.ChaName, P.ChaLevel, P.ChaClass, P.ChaSchool, P.ChaExp, P.ChaReborn, P.GuNum, P.ChaNum FROM RanGameS1.dbo.ChaInfo P, RanUser.dbo.GSUserInfo U WHERE P.UserNum = U.UserNum AND U.UserType !> 18 AND P.ChaDeleted != 1 ORDER BY P.ChaReborn DESC, P.ChaLevel DESC, P.ChaExp DESC");
$i=0;
while($result = mssql_fetch_array( $resTop )) {
	$i++;		

			$Name = $result["ChaName"];
			$lev = $result["ChaLevel"];
			$Reborn = $result["ChaReborn"];
			$school = $result["ChaSchool"];
			$class = $result["ChaClass"];
			$Num = $result["ChaNum"];
			$id = $result["GuNum"];
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








$resTop1 = mssql_query("SELECT GuName from RanGameS1.dbo.GuildInfo Where GuNum = '$id' ");

while($result1 = mssql_fetch_array( $resTop1 )) {
			

			$GuildName = $result1["GuName"];


}

  			




echo"  								
							<td width='112'  height='1' align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$i</center></td>
							<td width='158' height='1' style='border-bottom:#CCCCCC 1px dashed' align='center'><center>$Name</center></td>
							<td width='98' height='1' align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$class</center></td>
							<td width='140' height='1'  align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$lev</center></td>
							<td width='98' height='1' align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$school</center></td>
							<td width='100' height='1' align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$GuildName</center></td>
							<td width='130' height='1' align='center' style='border-bottom:#CCCCCC 1px dashed'><center>$Reborn</center></td>

</tr>
";
}
echo "					
						
					";



?>
