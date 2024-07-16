<?php require("config.php"); ?>


<?
$total_characters2 = $db->Execute("SELECT count(*) FROM Rangame1.dbo.ChaInfo");
$total_characters_done2 = $total_characters2->fetchrow();
				$query = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '1';";
				$result = mssql_query($query);
				while($rows=mssql_fetch_array($result)) {
				$nbrcon1 = $rows[0];
				}
				$test1 = $nbrcon1/$total_characters_done2[0];
				$test11 = $test1*100;
				$query1 = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '2';";
				$result1 = mssql_query($query1);
				while($rows1=mssql_fetch_array($result1)) {
				$nbrcon2 = $rows1[0];
				}
				$test2 = $nbrcon2/$total_characters_done2[0];
				$test22 = $test2*100;
				$query2 = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '4';";
				$result2 = mssql_query($query2);
				while($rows2=mssql_fetch_array($result2)) {
				$nbrcon3 = $rows2[0];
				}
				$test3 = $nbrcon3/$total_characters_done2[0];
				$test33 = $test3*100;
				$query3 = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '8';";
				$result3 = mssql_query($query3);
				while($rows3=mssql_fetch_array($result3)) {
				$nbrcon6 = $rows3[0];
				}
				$test6 = $nbrcon6/$total_characters_done2[0];
				$test66 = $test6*100;
				$query4 = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '16';";
				$result4 = mssql_query($query4);
				while($rows4=mssql_fetch_array($result4)) {
				$nbrcon7 = $rows4[0];
				}
				$test7 = $nbrcon7/$total_characters_done2[0];
				$test77 = $test7*100;
				$query5 = "SELECT COUNT(*) FROM RanGameS1.dbo.Chainfo WHERE ChaClass = '32';";
				$result5 = mssql_query($query5);
				while($rows5=mssql_fetch_array($result5)) {
				$nbrcon8 = $rows5[0];
				}
				$test8 = $nbrcon8/$total_characters_done2[0];
				$test88 = $test8*100;
				if($test11 == 0) { $test11 = .5; }
				elseif($test22 == 0) { $test22 = .5; }
				elseif($test33 == 0) { $test33 = .5; }
				elseif($test66 == 0) { $test66 = .5; }
				elseif($test77 == 0) { $test77 = .5; }
				if($test88 == 0) { $test88 = .5; }
echo"<br /><br /><font size=2 color=black><b><center>Class Population</b></font>
<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=center width=300 height=18 style='border: 1px solid #99b3b4;' >

			<tr>
				<td align=left width=100  height=20  style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Brawler
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test11 title=$test1*100 name=$test1*100 />&nbsp;&nbsp;<font color=blue>$nbrcon1</font>
				</td>
			</tr>

			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Swordsman
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test22 title=$test2*100 name='$test2*100' />&nbsp;&nbsp;<font color=blue>$nbrcon2</font>
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Archer
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test33 title='$test3*100' name='$test3*100' />&nbsp;&nbsp;<font color=blue>$nbrcon3</font>
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Shaman
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test66 title='$test6*100' name='$test6*100' />&nbsp;&nbsp;<font color=blue>$nbrcon6</font>
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Mix-Class Boy
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test77 title='$test7*100' name='$test7*100' />&nbsp;&nbsp;<font color=blue>$nbrcon7</font>
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Mix-Class Girl
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<img src=stats.php?per=$test88 title='$test8*100' name='$test8*100' />&nbsp;&nbsp;<font color=blue>$nbrcon8</font>
				</td>
			</tr></table>
";



$total_characters = $db->Execute("SELECT count(*) FROM RanGameS1.dbo.ChaInfo");
$total_characters_done = $total_characters->fetchrow();
$total_accounts = $db->Execute("SELECT count(*) FROM GSUserinfo");
$total_accounts_done = $total_accounts->fetchrow();
$total_guild = $db->Execute("SELECT count(*) FROM RanGameS1.dbo.GuildInfo");
$total_guild_done = $total_guild->fetchrow();
$total_donator = $db->Execute("SELECT count(*) FROM Userinfo where Donated >=1");
$total_donator_done = $total_donator->fetchrow();
$total_ban = $db->Execute("SELECT count(*) FROM GSUserinfo where UserBlock = 1");
$total_ban_done = $total_ban->fetchrow();
$total_hack = $db->Execute("SELECT count(*) FROM RanLogS1.dbo.HackProgramList");
$total_hack_done = $total_hack->fetchrow();
$total_c = $db->Execute("SELECT count(*) FROM RanGameS1.dbo.ChaInfo where ChaSchool = 2");
$total_c_done = $total_c->fetchrow();
$total_p = $db->Execute("SELECT count(*) FROM RanGameS1.dbo.ChaInfo where ChaSchool = 1");
$total_p_done = $total_p->fetchrow();
$total_m = $db->Execute("SELECT count(*) FROM RanGameS1.dbo.ChaInfo where ChaSchool = 0");
$total_m_done = $total_m->fetchrow();

$resTop8 = mssql_query("SELECT TOP 1 Username from GSUserinfo order by Usernum DESC");
while($result8 = mssql_fetch_array( $resTop8 )) {

			$new = $result8["Username"];

}

 echo"<br /><br /><font size=2 color=black><b><center>Server DB Population</b></font>
<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=center width=300 height=18 style='border: 1px solid #99b3b4;' >

			<tr>
				<td align=left width=100  height=20  style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Account(s)
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_accounts_done[0]
				</td>
			</tr>

			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Character(s)
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_characters_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Guild(s)
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_guild_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Donator(s)
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_donator_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Banned
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_ban_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Hacker(s)?
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_hack_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Sacred Gate
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_m_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Mystic Peak
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_p_done[0]
				</td>
			</tr>
			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Phoenix
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$total_c_done[0]
				</td>
			</tr>

			<tr>
				<td align=left width=100  height=20 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2><b>Newest Member
				</td>
				<td height=18 width=100 style='border-bottom:#CCCCCC 1px dashed'>
					<font size=2>$new
				</td>
			</tr>


		";?>
<br /><br />
