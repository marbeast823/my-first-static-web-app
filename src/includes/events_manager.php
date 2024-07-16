<?PHP 
if (eregi("includes/links_manager.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require('config.php');
$query = "SELECT name,date,event_id from Web_events order by date desc";
$result = $db->Execute($query);
echo '
<br><fieldset><legend>Event List</legend><table class="sort-table" id="table-1" border="0" cellpadding="0" cellspacing="0" width=380>  
<thead>
<tr>
<td aling=left>#</td>
<td aling=left>Event Name</td>
<td aling=left>Date</td>
<td aling=left>Edit?</td>
<td aling=left>Delete?</td>
</tr></thead>

';
for($i=0;$i < $result->numrows();++$i)
{
$row = $result->fetchrow();
$rank = $i+1;
$item_table_edit = "<table width='40' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='edit_event' id='edit_event'>
      <input name='Edit' type='submit' id='Edit' value='Edit' class='button'>
      <input name='event_id' type='hidden' id='event_id' value=$row[2]>
      <input name='edit_event' type='hidden' id='edit_event' value=$row[2]>
    </form></td>
  </tr>
</table>
";
$item_table_delete = "<table width='60' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='delete_event' id='delete_event'>
      <input name='Delete' type='submit' id='Delete' value='Delete' class='button'>
      <input name='event_name' type='hidden' id='event_name' value='$row[0]'>
      <input name='event_id' type='hidden' id='event_id' value=$row[2]>
      <input name='delete_event' type='hidden' id='delete_event' value=$row[2]>
    </form></td>
  </tr>
</table>
";
echo "<tbody><tr>
<td align=left class=text_statistics>$rank.</td>
<td align=left class=text_statistics>$row[0]</td>
<td align=left class=text_statistics>$row[1]</td>
<td align=left class=text_statistics>$item_table_edit</td>
<td align=left class=text_statistics>$item_table_delete</td>
</tr></tbody>";
}
?>
</table></fieldset>