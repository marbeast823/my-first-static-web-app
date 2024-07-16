					<?
require("config.php");
function getC ($class) {

	iif ($class == 2) { $char = "Swords (M)"; }
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
    if ($int == 0) { $char = "Secred Gate"; }
    if ($int == 1) { $char = "Mystic Peak"; }
    if ($int == 2) { $char = "Phoenix"; }

return $char;
}

function getB ($Online) {
    if ($Online == 0) { $char = "<img src='images/0.gif' >"; }
    if ($Online == 1) { $char = "<img src='images/1.gif' >"; }

return $char;
}


function getG ($int) {
    if ($int == "0") { $char = "NONE"; }
return $char;
}

echo "
        <th scope='col' style='white-space:nowrap;'>No.</th><th scope='col' style='white-space:nowrap;'>Character Name</th><th scope='col'>Level</th><th scope='col'>Rebirth</th><th scope='col'>Class</th><th scope='col'>School</th>



			<td align='center'>
 ";
$i=0;
$resTop = mssql_query("SELECT TOP 50 P.ChaName, P.ChaLevel, P.ChaClass, P.ChaSchool, P.GuNum, P.ChaNum FROM RanGameS1.dbo.ChaInfo P, RanUser.dbo.GSUserInfo U WHERE P.UserNum = U.UserNum AND U.UserType != 30 AND P.ChaDeleted != 1 AND P.chaSchool != 2 AND P.chaSchool != 1 ORDER BY P.ChaReborn DESC, P.ChaLevel DESC");
while($result = mssql_fetch_array( $resTop )) {
	$i++;

			$Name = $result["ChaName"];
			$lev = $result["ChaLevel"];
			$Reborn = $result["ChaReborn"];
			$school = $result["ChaSchool"];
			$class = $result["ChaClass"];
			$ChaExp = $result["ChaExp"];
			$Num = $result["ChaNum"];
			$Online = $result["ChaOnline"];
			$id = $result[" GuNum"];
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


			if($Online == 0) {
				$Online = getB($Online);
			}
			if($Online == 1) {
				$Online = getB($Online);
			}


$resTop1 = mssql_query("SELECT GuName from RanGameS1.dbo.GuildInfo Where GuNum = '$id' ");

while($result1 = mssql_fetch_array( $resTop1 )) {


			$GuildName = $result1["GuName"];


}






echo"

                         	<tr class='li01' height='25'>
							<td width='75' align='center' style='border-bottom:#CCCCCC 1px solid'>$i</td>
							<td width='138' style='border-bottom:#CCCCCC 1px solid' align='center'>$Name</td>
                           				<td width='80' align='center' style='border-bottom:#CCCCCC 1px solid'>$lev</td>
                            				<td width='95' align='center' style='border-bottom:#CCCCCC 1px solid'>$Reborn</td>
							<td width='148' align='center' style='border-bottom:#CCCCCC 1px solid'>$class</td>
							<td width='120' align='center' style='border-bottom:#CCCCCC 1px solid'>$school</td>


						</tr>




";


}

?>
