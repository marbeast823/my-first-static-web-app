<?PHP 
if (eregi("includes/server_manager.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require_once('config.php');
$query = "SELECT Name,experience,drops,gsport,ip,version,display_order,type from web_servers order by display_order asc";
$result = $db->Execute($query);
echo '
<br><fieldset><legend>Links List</legend><table class="sort-table" id="table-1" height=0 border="0" cellpadding="0" cellspacing="0">                
<thead><tr>
<td aling=left>#</td>
<td aling=left>Name</td>
<td aling=left>Version</td>
<td aling=left>Experience</td>
<td aling=left>Drops</td>
<td aling=left>Type</td>
<td aling=left>Status</td>
<td aling=left>Edit?</td>
<td aling=left>Delete?</td>
</tr></thead>

';
for($i=0;$i < $result->numrows();++$i)
{
$row = $result->fetchrow();
$rank = $i+1;
if ($check=@fsockopen($row[4],$row[3],$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	$status_done = "<span class=status_online><b>Online</b></span>"; 
	}
else 
	{ 
	$status_done = "<span class=status_offline><b>Offline</b></span>"; 
	} 
//$server_table_edit = "<table width=90 border=0 cellspacing=2 cellpadding=0><tr><th width=90 scope=row><form action=\'\' method=post name=edit_server id=edit_server><table width=90 border=0 cellspacing=0 cellpadding=0><tr><td width=36 scope=row class=text_administrator>Edit:</td><td width=94 scope=row><div align=center><input name=server_name_edit type=hidden id=server_name_edit value=$row[0]><a href=#><img src=images/submit_button.png onclick=edit_server.submit()></a></div></td></tr></table></form></th></tr></table>";
//$server_table_delete = "<table width=120 border=0 cellspacing=2 cellpadding=0><tr><th width=120 scope=row><form action=\'\' method=post name=delete_server id=delete_server><table width=120 border=0 cellspacing=0 cellpadding=0><tr><td width=36 scope=row class=text_administrator>Delete: </td><td width=94 scope=row><div align=center><input name=server_name_delete type=hidden id=server_name_delete value=$row[0]><a href=#><img src=images/submit_button.png onclick=delete_server.submit()></a></div></td></tr></table></form></th></tr></table>";


$server_table_edit = "<table width='40' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='edit_server' id='edit_server'>
      <input name='Edit' type='submit' id='Edit' value='Edit' class='button'>
<input name=server_name_edit type=hidden id=server_name_edit value='$row[0]'>
    </form></td>
  </tr></table>";



$server_table_delete = "<table width='40' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='delete_server' id='delete_server'>
      <input name='Delete' type='submit' id='Delete' value='Delete' class='button' onclick='return ask_delete_server()'>
<input name=server_name_delete type=hidden id=server_name_delete value='$row[0]'>
    </form></td>
  </tr></table>";

echo "<tbody><tr>
<td align=left class=text_statistics>$row[6]</td>
<td align=left class=text_statistics>$row[0]</td>
<td align=left class=text_statistics>$row[5]</td>
<td align=left class=text_statistics>$row[1]</td>
<td align=left class=text_statistics>$row[2]</td>
<td align=left class=text_statistics>$row[7]</td>
<td align=left class=text_statistics>$status_done</td>
<td align=left class=text_statistics>$server_table_edit</td>
<td align=left class=text_statistics>$server_table_delete</td>
</tr></tbody>";
}
?>
</table></fieldset>