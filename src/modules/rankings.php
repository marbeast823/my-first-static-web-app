<tr class='li01' height='25'>
							<td width='52' align='center' style='border-bottom:#CCCCCC 0px solid'>Rank</td>
							<td width='158' style='border-bottom:#CCCCCC 0px solid' align='center'>Character Name</td>
							<td width='58' style='border-bottom:#CCCCCC 0px solid' align='center'>School</td>
							<td width='140' align='center' style='border-bottom:#CCCCCC 0px solid'>Level</td>
							<td width='140' align='center' style='border-bottom:#CCCCCC 0px solid'>Class</td>
							<td width='218' align='center' style='border-bottom:#CCCCCC 0px solid'>Guild</td>
							<td width='98' align='center' style='border-bottom:#CCCCCC 0px solid'>Reborn</td>
							<td width='56' align='center' style='border-bottom:#CCCCCC 0px solid'>Status</td>


						</tr>
<head><script type="text/javascript" src="disableSelect.js"></script></head><?
require("config.php");
function getC ($int) {
    if ($int == 1) { $char = "Fighter Male"; }
    if ($int == 2) { $char = "Swordie Male"; }
    if ($int == 4) { $char = "Archer Female"; }
    if ($int == 8) { $char = "QiGong Female"; }
    if ($int == 16) { $char = "Scientist Male"; }
    if ($int == 32) { $char = "Scientist Female"; }
    if ($int == 64) { $char = "Fighter Female"; }
    if ($int == 128) { $char = "Swordie Female"; }
    if ($int == 256) { $char = "Archer Male"; }
    if ($int == 512) { $char = "Shaman Male"; }
return $char;
}

function getN ($int) {
    if ($int == 0) { $char = "<img src=\"sg.jpg\">"; }
    if ($int == 1) { $char = "<img src=\"mp.jpg\">"; }
    if ($int == 2) { $char = "<img src=\"ph.jpg\">"; }

return $char;
}

function getO ($int) {
    if ($int == 0) { $char = "<img src='/images/offline.png'>"; }
    if ($int == 1) { $char = "<img src='/images/online.png'>"; }
return $char;
}
function getG ($int) {
    if ($int == "0") { $char = "NONE"; }
return $char;
}


$i=0;
$resTop = sqlsrv_query($connect_mssql,"SELECT TOP 50 P.ChaName, P.ChaLevel, P.ChaReborn, P.ChaClass, P.ChaSchool, P.ChaOnline, P.GuNum, P.ChaNum FROM RanGame1.dbo.ChaInfo P, RanUser.dbo.UserInfo U WHERE P.UserNum = U.UserNum AND U.UserType != 30 AND U.UserAvailable != 0 AND P.ChaDeleted != 1 ORDER BY  P.ChaReborn DESC, P.ChaLevel DESC");
while($result = sqlsrv_fetch_array( $resTop,SQLSRV_FETCH_ASSOC )) {
	$i++;		

			
			$Name = $result["ChaName"];
			$lev = $result["ChaLevel"];
			$ol = $result["ChaOnline"];
			$school = $result["ChaSchool"];
			$RB = $result["ChaReborn"];
			if($school == 0) {
				$school = getN($school);
			}
    			if($school == 1) {
				$school = getN($school);
			}
    			if($school == 2) {
				$school = getN($school);
			}
			if($ol == 0) {
				$ol = getO($ol);
			}
    			if($ol == 1) {
				$ol = getO($ol);
			}
			$class = $result["ChaClass"];
			if($class == 1) {
				$class = getC($class);
			}
    			if($class == 2) {
				$class = getC($class);
			}
    			if($class == 4) {
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
			$Num = $result["ChaNum"];
			$id = $result["GuNum"];
    			
    			if($id == 0) {
				$GuildName = getG($id);
			}
				


$resTop1 = sqlsrv_query($connect_mssql,"SELECT GuName from RanGame1.dbo.GuildInfo Where GuNum = '$id' ");

while($result1 = sqlsrv_fetch_array( $resTop1,SQLSRV_FETCH_ASSOC )) {
			

			$GuildName = $result1["GuName"];


}

  			




echo"  						<tr class='li01' height='25'>
							<td width='52' align='center' style='border-bottom:#CCCCCC 0px solid'>$i</td>
							<td width='158' style='border-bottom:#CCCCCC 0px solid' align='center'>$Name</td>
							<td width='58' style='border-bottom:#CCCCCC 0px solid' align='center'>$school</td>
							<td width='140' align='center' style='border-bottom:#CCCCCC 0px solid'>$lev</td>
							<td width='140' align='center' style='border-bottom:#CCCCCC 0px solid'>$class</td>
							<td width='218' align='center' style='border-bottom:#CCCCCC 0px solid'>$GuildName</td>
							<td width='98' align='center' style='border-bottom:#CCCCCC 0px solid'>$RB</td>
							<td width='56' align='center' style='border-bottom:#CCCCCC 0px solid'>$ol</td>


						</tr>




";


}

?>