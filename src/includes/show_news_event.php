<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute("SELECT Top 10 news_title,news_autor,news_category,news_date,news_context,news_id from web_news where news_category = 'News' order by news_date DESC");

$content = '<table cellpadding="0" width=440>';

for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);
$content .= "<tr><td  style='text-align:justify' background='images/title-notice.jpg' height='28'>
	     <div style='float:right'><font face='Verdana' size='2pt'><b>$row[0] - $row[3]</font></td></tr>
             <tr><td width='100%' style='text-align:justify' vertical-align: middle;>$row[4]<br><br><hr width='430'><center class='style2'><strong><font face='Verdana' size='1pt'>Posted On $row[3] By $row[1]<br><br></font></strong></center></td></tr>

";
      }
show($content);
?>
</table>