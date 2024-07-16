<?PHP 

$resTop3 = mssql_query("SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 1");
while($result3 = mssql_fetch_array( $resTop3 )) {
$sg = $result3['GuNum'];
}
$resTop4 = mssql_query("SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$sg'");
while($result4 = mssql_fetch_array( $resTop4 )) {
$sg2 = $result4['GuName'];			

echo"
<TR>
<li style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>

<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#4191BB;font-weight:bold'>SG </span>
<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$sg2</span> ";




}
$resTop = mssql_query("SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 2");
while($result = mssql_fetch_array( $resTop )) {
$mp = $result['GuNum'];
}
$resTop2 = mssql_query("SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$mp'");
while($result2 = mssql_fetch_array( $resTop2 )) {
$mp2 = $result2['GuName'];	

		

echo"
<TR>
<li style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>

<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#4191BB;font-weight:bold'>MP $tax</span>
<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$mp2</span> ";





}
$resTop5 = mssql_query("SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 3");
while($result5 = mssql_fetch_array( $resTop5 )) {
$phx = $result5['GuNum'];
}
$resTop6 = mssql_query("SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$phx'");
while($result6 = mssql_fetch_array( $resTop6 )) {
$phx2 = $result6['GuName'];			

echo"
<TR>
<li style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>

<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#4191BB;font-weight:bold'>Phoenix </span>
<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$phx2</span> ";




}
$resTop7 = mssql_query("SELECT GuNum FROM RanGameS1.dbo.GuildRegion where RegionId = 4");
while($result7 = mssql_fetch_array( $resTop7 )) {
$th = $result7['GuNum'];
}
$resTop8 = mssql_query("SELECT GuName FROM RanGameS1.dbo.GuildInfo where GuNum = '$th'");
while($result8 = mssql_fetch_array( $resTop8 )) {
$th2 = $result8['GuName'];
			
echo"
<TR>
<li style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>

<span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#4191BB;font-weight:bold'>Trading </span>
<span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$th2</span> ";
}
         

        
   


?>