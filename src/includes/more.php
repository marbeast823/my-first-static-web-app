<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute('SELECT Top 10 news_title,news_autor,news_category,news_date,news_context,news_id from web_news order by news_date desc');



for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;

$content8 .= "                            <tr height='25px'>
                              <td width='13%' align='center' style='border-bottom:#e3e6f0 1px dashed'><strong>$rank</strong></td>
                              <td width='53%' style='border-bottom:#e3e6f0 1px dashed;'>[$row[2]]&nbsp;<a href='index.php?news=$row[5]' class='t_11'>$row[0]</a></td>
                              <td width='17%' align='center' style='border-bottom:#e3e6f0 1px dashed'>$row[1]</td>

                              <td width='17%' style='border-bottom:#e3e6f0 1px dashed'>$row[3]</td>
                            </tr>



";
      }
$content8 .="";
show($content8);
?>
