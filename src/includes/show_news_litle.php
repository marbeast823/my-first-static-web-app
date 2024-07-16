<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute('SELECT top 7 news_title,news_autor,news_category,news_date,news_context,news_id from web_news order by news_date desc');



for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);

$content18 .= "<li style='display:block; width:440px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>
			   <img src='img/index/news.gif'>
			   <A href='shownews.php?news=$row[5]'class='contentlinks01'>
			   <font size = 2>$row[0]</font></td></tr><td>




";
      }
$content18 .="";
show($content18);
?>