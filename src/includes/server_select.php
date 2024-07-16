<?PHP 
if (eregi("includes/server_select.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require_once('config.php');
$query = "SELECT Name,experience,drops,gsport,ip,version,type from web_servers order by display_order asc";
$result = $db->Execute($query);
echo '
<table border="0" cellpadding="2" cellspacing="0">                
<tr>
<td></td>
<td></td>
</tr>

';
for($i=0;$i < $result->numrows();++$i)
{
$row = $result->fetchrow();
$rank = $i+1;
if ($check=@fsockopen($row[4],$row[3],$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	$status_done = "<span class=online><b>Online</b></span>"; 
	}
else 
	{ 
	$status_done = "<span class=offline><b>Offline</b></span>"; 
	} 

echo "<tr>
<td align=left title='$row[0]'><a class=helpLink href=info onclick=\"showHelpTip(event, '<table width=130><tr><td class=text_statistics>Version: $row[5]</td></tr><tr><td class=text_statistics>Name: $row[0]</td></tr><tr><td class=text_statistics>Experience: $row[1]</td></tr><tr><td class=text_statistics>Drops: $row[2]</td></tr><tr><td class=text_statistics>Type: $row[6]</td></tr></table>' ,false); return false\">$row[0] : </a></td>
<td align=left>$status_done</td>
</tr>";
}
?>
</TABLE>