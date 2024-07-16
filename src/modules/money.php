<head><script type="text/javascript" src="disableSelect.js"></script></head><?
require("config.php");
function getC ($int) {
    if ($int == 1) { $char = "Fighter(M)"; }
    if ($int == 2) { $char = "Kendo(M)"; }
    if ($int == 4) { $char = "Archer(F)"; }
    if ($int == 8) { $char = "QiGong(F)"; }
    if ($int == 16) { $char = "Extreme(M)"; }
    if ($int == 32) { $char = "Extreme(F)"; }
    if ($int == 64) { $char = "Fighter(F)"; }
    if ($int == 128) { $char = "Kendo(F)"; }
    if ($int == 256) { $char = "Archer(M)"; }
    if ($int == 512) { $char = "Shaman(M)"; }
return $char;
}
function getG ($int) {
    if ($int == "0") { $char = "NONE"; }
return $char;
}


$i=0;
$resTop = mssql_query("SELECT TOP 50 P.ChaName, P.ChaLevel, P.ChaClass, P.ChaSchool, P.ChaMoney, P.GuNum, P.ChaNum FROM RanGame1.dbo.ChaInfo P, RanUser.dbo.UserInfo U WHERE P.UserNum = U.UserNum AND U.UserType != 30 AND P.ChaDeleted != 1 ORDER BY P.ChaMoney DESC, P.ChaLevel DESC");
while($result = mssql_fetch_array( $resTop )) {
	$i++;		

			$Name = $result["ChaName"];
			$lev = $result["ChaLevel"];
			$Reborn = $result["ChaMoney"];
			$class = $result["ChaClass"];
			$Num = $result["ChaNum"];
			$id = $result["GuNum"];
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
    			if($id == 0) {
				$GuildName = getG($id);
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


$resTop1 = mssql_query("SELECT GuName from RanGame1.dbo.GuildInfo Where GuNum = '$id' ");

while($result1 = mssql_fetch_array( $resTop1 )) {
			

			$GuildName = $result1["GuName"];


}

  			




echo"  						<tr class='li01' height='25'>
							<td width='112' align='center' style='border-bottom:#CCCCCC 1px dashed'>$i</td>
							<td width='158' style='border-bottom:#CCCCCC 1px dashed' align='center'>$Name</td>
							<td width='140' align='center' style='border-bottom:#CCCCCC 1px dashed'>$lev</td>
							<td width='98' align='center' style='border-bottom:#CCCCCC 1px dashed'>$class</td>
							<td width='100' align='center' style='border-bottom:#CCCCCC 1px dashed'>$GuildName</td>

							<td width='140' align='center' style='border-bottom:#CCCCCC 1px dashed'>$Reborn</td>
						</tr>




";


}

?>