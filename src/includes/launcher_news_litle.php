<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute('SELECT top 8 news_title,news_autor,news_category,news_date,news_context,news_id from web_news order by news_date desc');



for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);

$content8 .= "<img src='img/news.gif' />
										

										<font class='contentlinks01'>
										

										<A href='shownews.php?news=$row[5]' class='contentlinks01' target='_blank'><font color=red size = 2>
											$row[0]                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
										</font>
									</td>
	</tr><tr>
		<td>




";
      }
$content8 .="";
show($content8);
?>