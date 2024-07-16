<?PHP 
if (eregi("includes/news_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require('config.php');
$query = "SELECT news_title,news_autor,news_category,news_date,news_context,news_id from web_news order by news_date desc";
$result = $db->Execute($query);
echo '<br><table class="sort-table" id="table-1" height=0 border="0" cellpadding="0" cellspacing="0" width=465>                
<thead><tr>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">#</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Title</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Author</td>
<td aling=left style="background: #0099CC; font: 11px verdana, sans-serif; color:#eee;">Category</td>
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
    <td width='85'><form action='' method='post' name='edit_news' id='edit_news'>
      <input name='news_id' type='hidden' id='news_id' value=$row[5]>
      <input name='edit_news' type='hidden' id='edit_news' value=$row[5]>
      <input name='Edit' type='submit' id='Edit' value='Edit' class='button'>
    </form></td>
  </tr>
</table>
";
$news_table_delete = "<table width='60' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='85'><form action='' method='post' name='delete_news' id='delete_news'>
      <input name='news_id' type='hidden' id='news_id' value=$row[5]>
      <input name='delete_news' type='hidden' id='delete_news' value=$row[5]>
      <input name='news_title' type='hidden' id='news_title' value=$row[0]>
      <input name='Delete' type='submit' id='Delete' value='Delete' class='button'>
    </form></td>
  </tr>
</table>
";
$row[0] = substr($row[0],0,6);
echo "<tbody><tr>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'><font size=2 color=black>$rank.</font></td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'><font size=2 color=black>$row[0]...</font></td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'><font size=2 color=black>$row[1]</font></td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'><font size=2 color=black>$row[2]</font></td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'><font size=2 color=black>$row[3]</font></td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'>$news_table_edit</td>
<td align=left class=text_statistics style='border-bottom:#CCCCCC 1px dashed'>$news_table_delete</td>
</tr></tbody>";
}
?>
</table></fieldset>