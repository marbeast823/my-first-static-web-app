<?

if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$news_id = "$_GET[news]";
$get_news = $db->Execute("SELECT news_title,news_autor,news_category,news_date,news_context from web_news where news_id=? order by news_date desc",array($news_id));



for($i=0;$i < $get_news->numrows();++$i)
         {

          $row = $get_news->fetchrow();


          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);

$content5 .= "       <tr>

                              	<div class='read_top'>
	                             <div class='read_top_title' style='float:left;padding-left:10px;'>[ Notice ] &nbsp;$row[0]</div>
                                <div class='read_top_name' style='float:right;padding-right:10px;color:#fff;'>$row[3]</div>
                                	</div>



                                           	<div class='read_contents'>$row[4]








                                </table>
";
      }
$content5 .="";
show($content5);
?>
