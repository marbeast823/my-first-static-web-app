<?php 
include 'config.php';
include 'function.php';

connectdb($CONFIG['dbdbname1'], $CONFIG['dbaddress'], $CONFIG['dbuser'], $CONFIG['dbpass']);

$result_online = mssql_query("SELECT SUM(P.ChaOnline) AS kiraonline FROM RanGame1.dbo.ChaInfo P");
while ($row = mssql_fetch_array($result_online)) {
    $userOnline = $row["kiraonline"];
}
$result_online = mssql_query("SELECT COUNT(*) AS kiraonline FROM RanGame1.dbo.ChaInfo P");
while ($row = mssql_fetch_array($result_online)) {
    $ChaRebs = $row["kiraonline"];
}
$result_cha = mssql_query("SELECT COUNT(*) AS kirachar FROM RanGame1.dbo.ChaInfo P");
while ($row1 = mssql_fetch_array($result_cha)) {
    $chaCount = $row1["kirachar"];
}
$result_user = mssql_query("SELECT COUNT(*) AS kirauser FROM RanUser.dbo.UserInfo U");
while ($row2 = mssql_fetch_array($result_user)) {
    $userCount = $row2["kirauser"];
}
$result_userblock = mssql_query("SELECT SUM(P.UserBlock) AS kirauserblock FROM RanUser.dbo.UserInfo P");
while ($row3 = mssql_fetch_array($result_userblock)) {
    $userBlock = $row3["kirauserblock"];
}


function getClass ($str) {
    if ($str == 1) { $char = "M-Brawler"; }
    if ($str == 2) { $char = "M-Swordsman"; }
    if ($str == 4) { $char = "F-Archer"; }
    if ($str == 8) { $char = "F-Shaman"; }
    if ($str == 16) { $char = "M-Gunner"; }
    if ($str == 32) { $char = "F-Gunner"; }
    if ($str == 64) { $char = "F-Brawler"; }
    if ($str == 128) { $char = "F-Swordsman"; }
    if ($str == 256) { $char = "M-Archer"; }
    if ($str == 512) { $char = "M-Shaman"; }

return $char;
}
function getSchool ($int) {
    if ($int == 0) { $char = "Sacred Gate"; }
    if ($int == 1) { $char = "Mystic Peak"; }
    if ($int == 2) { $char = "Phoenix"; }
    if ($int == 4) { $char = "Trading Hole"; }
    
return $char;

}
function getRegion ($int) {
    if ($int == 0) { $char = "Sacred Gate"; }
    if ($int == 1) { $char = "Mystic Peak"; }
    if ($int == 2) { $char = "Phoenix"; }
    if ($int == 4) { $char = "Trading Hole"; }

}
function PetType ($int) {	
    if ($int == 0) { $char = "Siberian Husk"; }
    if ($int == 1) { $char = "Tiger"; }
    if ($int == 2) { $char = "Turtle"; }

    
return $char;

}

  
?>
<p align="center"><br>
<span class="style3"><font color="White">Character Online </font><font color=lime>(<?=$userOnline;?>)</font></span>  
<br>
<span class="style3"><font color="red">Ban Accounts (<?=$userBlock;?>)  </font></span></p>


<Announcement Start>

<body bgcolor="#000000" >
<p align="center">
<font color="Green" size="3" face="Arial">-------</font><br></p>

<p align="center"><font color="violet" size="3" face="Arial"><b>Online Players</b></font><br>

<p align="center"><font color="Green" size="3" face="Arial">-------</font><br>

<Announcement End>


<style type="text/css">
<!--
.style1 {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
}
body,td,th {
    color: #FFFFFF;
}
body {
    background-color: #000000;
}
.style2 {font-family: Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; }
.style3 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: #FFFF00;
    font-weight: bold;
}
.style4 {color: #FF0000}
.style5 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 14px;
    font-weight: bold;
}
.style6 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: #FF0000;
    font-weight: bold;
}
.style7 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 11px;
}
.style8 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-weight: bold;
}
.style9 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 12px;
    color: white;
    font-weight: bold;
}
-->
</style>
 <table width="400" border="0" cellpadding="1" cellspacing="1">
        
        <tr>
          <td height="23" colspan="6" background="sub.jpg"><span class="style1">
            
<div align="center"></div></td>
        </tr>
        <tr>
          <td height="23" background="gradient_thead.gif" class="style9">Name</td>
          <td height="23" background="gradient_thead.gif" class="style9"><div align="center">Level</div></td>
          <td height="23" background="gradient_thead.gif" class="style9"><div align="center">Class</div></td>
          <td height="23" background="gradient_thead.gif" class="style9"><div align="center">School</div></td>
          <td height="23" background="gradient_thead.gif" class="style9"><div align="center">Reborn</div></td>
        </tr>
        <? 
        //character online
        $resCo = mssql_query("SELECT P.ChaName, P.ChaLevel, P.ChaClass, P.ChaSchool, P.ChaReborn FROM RanGame1.dbo.ChaInfo P WHERE P.ChaOnline = 1 ORDER BY P.ChaReborn DESC, P.ChaLevel DESC");
        while ($rowCo = mssql_fetch_array($resCo)) {
            $chNameOn = $rowCo["ChaName"];
            $chLvlOn = $rowCo["ChaLevel"];
            $chClsOn = $rowCo["ChaClass"];
            $chScOn = $rowCo["ChaSchool"];
            $chRBon = $rowCo["ChaReborn"];
        
            
            ?>
        <tr>
          <td height="23" bgcolor="#666666" class="style1"><?=$chNameOn;?></td>
          <td bgcolor="#666666" class="style1"><div align="center">
            <?=$chLvlOn;?>
          </div></td>
          <td bgcolor="#666666" class="style1"><div align="center">
            <?=getClass($chClsOn);?>
          </div></td>
          <td bgcolor="#666666" class="style1"><div align="center">
            <?=getSchool($chScOn);?>
          </div></td>
          <td bgcolor="#666666" class="style1"><div align="center">
            <?=($chRBon);?>
          </div></td>
        </tr>
        <? } ?>
        <tr>
          <td height="23" colspan="6" background="bg_tile.gif">&nbsp;</td>
        </tr>
  </table>
  
<br />
</body>
<p>