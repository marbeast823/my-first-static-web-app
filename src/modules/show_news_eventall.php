<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute("SELECT news_title,news_autor,news_category,news_date,news_context,news_id from web_news where news_category = 'Event' order by news_date desc");
echo "<div align=center><font size=3><img src='images/btn_update1.gif' ><img src='images/btn_update_event.gif' ><img src='images/btn_update_more.gif' ><br></div>";
$content = '<table cellpadding="0" width=401>';

for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);
$content .= "<tr><td align='left'><img src='images/icon_dot.jpg' >&nbsp;&nbsp;<font size=2 color=white><span class='link_menu'><a href='index.php?news=$row[5]'><font size=2 color=white>[$row[2]] $row[0] - $row[3]</a></span></font></td></tr>
             <tr><td class='alt2' height='1'></td></tr>";
      }
show($content);
?>
</table>