
<?
require_once("config.php");

$CONFIG['dbaddress'] = $web['dbhost'];//DB IP
$CONFIG['dbuser'] = "sa";//DB ID
$CONFIG['dbpass'] =  $web['dbpassword'];//DB PASS
$CONFIG['dbdbname2'] = "RanGame1";
function connectdb($db, $dbaddress, $dbuser, $dbpass) {
	$dbconnect = mssql_connect ($dbaddress, $dbuser, $dbpass); 
	mssql_select_db ($db, $dbconnect) or die (mysql_error());
}


connectdb($CONFIG['dbdbname2'], $CONFIG['dbaddress'], $CONFIG['dbuser'], $CONFIG['dbpass']);
						  $query = "SELECT TOP 10 sum(ChaInfo.ChaLevel) AS Reput, GuildInfo.GuName AS Reput2, GuildInfo.GuNotice AS Reput3, GuildInfo.ChaNum AS Reput4, Count(*) AS Reput5 FROM RanGame1.dbo.ChaInfo, RanGame1.dbo.GuildInfo WHERE GuildInfo.GuNum = ChaInfo.GuNum GROUP BY GuildInfo.GuNum, GuildInfo.GuName, GuildInfo.ChaNum, GuildInfo.GuNotice ORDER by Reput DESC";
							$result = mssql_query($query);
							$place2 = "0";
							$style = "0";
							while($r=mssql_fetch_array($result)) {
							$GuildName = $r[1];
						  	$GuildURL = $r[4];
							$GuildNotice = $r[2];
							$GuildRepute = $r[0];
							$GuildLeader = $r[3];
							$GuildNotice = stripslashes($GuildNotice);
							$GuildNotice = addslashes($GuildNotice);
							$place2 = $place2+1;
							//$Repute = $r[6];
							
							echo "<tr><td class='style".$style."'  style='border-bottom:#CCCCCC 1px dashed'><div align='center'>".$place2."</div></td>";
							if ($GuildURL == NULL) {
							echo "<td class='style".$style."'  style='border-bottom:#CCCCCC 1px dashed'><div align='center'><b>".$GuildName."</b></div></td>";
							} else {
							echo "<td class='style".$style."' style='border-bottom:#CCCCCC 1px dashed'><div align='center'><b>".$GuildName."</b></div></td>";
							}
							if($GuildNotice == NULL) { 
							echo "<td class='style".$style."' style='border-bottom:#CCCCCC 1px dashed'><div align='center'>NONE</div></td>";
							} else {
							echo "<td class='style".$style."' style='border-bottom:#CCCCCC 1px dashed'><div align='center'><code>".$GuildNotice."</code></div></td>";
							}
							$query2 = "SELECT TOP 20 ChaName,ChaDeleted FROM RanGame1.dbo.ChaInfo WHERE ChaNum = '$GuildLeader'";
							$result2 = mssql_query($query2);
							while($r2=mssql_fetch_array($result2)) {
							$GuildL = $r2['ChaName'];
							$ChaDeleted = $r3['ChaDeleted'];
							
							echo "<td class='style".$style."' width=120 height=50 style='border-bottom:#CCCCCC 1px dashed'><div align='center'>".$GuildL." ".$ChaDeleted."</div></td>"; }
							$GuAverage = $GuildRepute / $GuildURL;	
							$GuA = round($GuAverage);
								
							echo "<td class='style".$style."' width=60 style='border-bottom:#CCCCCC 1px dashed'><div align='center'>".$GuildRepute."</div></td></tr>";
							$style++;
							if ($style == "2") { $style = "0"; }
							}




?>
