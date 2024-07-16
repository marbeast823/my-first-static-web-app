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
						  $query = "SELECT TOP 20 sum(ChaInfo.ChaLevel) AS Reput, GuildInfo.GuName AS Reput2, GuildInfo.GuNotice AS Reput3, GuildInfo.ChaNum AS Reput4, Count(*) AS Reput5 FROM RanGame1.dbo.ChaInfo, RanGame1.dbo.GuildInfo WHERE GuildInfo.GuNum = ChaInfo.GuNum GROUP BY GuildInfo.GuNum, GuildInfo.GuName, GuildInfo.ChaNum, GuildInfo.GuNotice ORDER by Reput DESC";
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

							echo "<tr><td class='style".$style."'   '><spam style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>".$place2."</span></td>";
                                                      	if ($GuildURL == NULL) {
							echo "<td class='style".$style."'   '><span style='display:block; float:left; padding-top:0px;text-decoration:none;color:white;font-weight:bold'>".$GuildName."</span></td>";
							} else {

							}

							}




?>
