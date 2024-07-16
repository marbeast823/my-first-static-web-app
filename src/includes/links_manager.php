<?PHP 
if (eregi("includes/links_manager.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require_once('config.php');
$query = "SELECT link_name,link_address,link_description,link_id,link_date from web_links order by link_date desc";
$result = $db->Execute($query);
echo '
<br><table class="sort-table" id="table-1" border="0" cellpadding="0" cellspacing="0" width=465>  
<thead>
<tr>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">#</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Name</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Address</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Description</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Date</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Edit?</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Delete?</td>
</tr></thead>

';
for($i=0;$i < $result->numrows();++$i)
{
$row = $result->fetchrow();
$rank = $i+1;
$news_table_edit = "<table width='40' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='edit_link' id='edit_link'>
      <input name='Edit' type='submit' id='Edit' value='Edit' class='button'>
      <input name='link_id' type='hidden' id='link_id' value=$row[3]>
      <input name='edit_link' type='hidden' id='edit_link' value=$row[3]>
    </form></td>
  </tr>
</table>
";
$news_table_delete = "<table width='60' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='delete_link' id='delete_link'>
      <input name='Delete' type='submit' id='Delete' value='Delete' class='button'>
      <input name='link_id' type='hidden' id='link_id' value=$row[3]>
      <input name='link_name' type='hidden' id='link_name' value='$row[0]'>
      <input name='delete_link' type='hidden' id='delete_link' value=$row[3]>
    </form></td>
  </tr>
</table>
";
$row[2] = substr($row[2],0,10);
$row[1] = substr($row[1],0,4);
$row[0] = substr($row[0],0,4);
echo "<tbody><tr>
<td align=left class=text_statistics>$rank.</td>
<td align=left class=text_statistics>$row[0]...</td>
<td align=left class=text_statistics>$row[1]...</td>
<td align=left class=text_statistics>$row[2]...</td>
<td align=left class=text_statistics>$row[4]</td>
<td align=left class=text_statistics>$news_table_edit</td>
<td align=left class=text_statistics>$news_table_delete</td>
</tr></tbody>";
}
?>
</table>