<?PHP 
if (eregi("includes/links_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$get_links = $db->Execute("SELECT name,description,date from muweb_events order by date desc");
$content ='<table cellpadding="1" width=353>';

for($i=0;$i < $get_links->numrows();++$i)
       {
$row = $get_links->fetchrow();
$rank = $i+1;

$content .="



  <tr>
    <td class='thead' align='left'>&nbsp;$row[0]</td>
  </tr>
  <tr>
    <td width='120' class=alt1 align='left'><font color='#CCCCCC'>Name: $row[0]<br>Description: $row[1]<br><br>Post Date $row[2]</font></td>
  </tr>
  <tr>
    <td class='alt2'></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>





";
        }
echo $content;
?>
</table>