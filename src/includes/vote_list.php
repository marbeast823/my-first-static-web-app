<?PHP 
if (eregi("includes/vote_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require('config.php');
$query = "SELECT vote_name,vote_link,vote_img,vote_date,vote_unid from RanUser.dbo.muweb_des_vote order by vote_date desc";
$result = $db->Execute($query);
echo '<br><fieldset><legend>Vote List</legend><table class="sort-table" id="table-1" height=0 border="0" cellpadding="0" cellspacing="0" width=565>                
<thead><tr>
<td aling=left>#</td>
<td aling=left>Name</td>
<td aling=left>Link</td>
<td aling=left>Image Link</td>
<td aling=left>Date</td>
<td aling=left>View</td>
<td aling=left>Delete?</td>
</tr></thead>

';
for($i=0;$i < $result->numrows();++$i)
{
$row = $result->fetchrow();
$rank = $i+1;
$vote_table_view = "<table width='60' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='administratorpanel.php?op=viewvote' method='post' name='view_vote' id='view_vote'>
      <input name='vote_id' type='hidden' id='vote_id' value=$row[4]>
      <input name='view_vote' type='hidden' id='view_vote' value=$row[4]>
      <input name='View' type='submit' id='View' value='View' class='button'>
    </form></td>
  </tr>
</table>
";
$vote_table_delete = "<table width='60' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='delete_vote' id='delete_vote'>
      <input name='vote_id' type='hidden' id='vote_id' value=$row[4]>
      <input name='delete_vote' type='hidden' id='delete_vote' value=$row[4]>
      <input name='Delete' type='submit' id='Delete' value='Delete' class='button'>
    </form></td>
  </tr>
</table>
";
$row[0] = substr($row[0],0,6);
$row[1] = substr($row[1],0,10);
$row[2] = substr($row[2],0,10);
echo "<tbody><tr>
<td align=left class=text_statistics>$rank.</td>
<td align=left class=text_statistics>$row[0]...</td>
<td align=left class=text_statistics>$row[1]</td>
<td align=left class=text_statistics>$row[2]</td>
<td align=left class=text_statistics>$row[3]</td>
<td align=left class=text_statistics>$vote_table_view</td>
<td align=left class=text_statistics>$vote_table_delete</td>
</tr></tbody>";
}
?>
</table></fieldset>