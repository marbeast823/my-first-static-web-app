<?php
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$news_id = $_GET['news'];
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$get_news = sqlsrv_query($connect_mssql,'SELECT news_title,news_autor,news_category,news_date,news_context from RanUser.Dbo.web_news where news_id = '".$news_id."' order by news_date desc',$params,$options);


for($i=0;$i < sqlsrv_num_rows($get_news);++$i)
         {
          $row = sqlsrv_fetch_array($get_news,SQLSRV_FETCH_NUMERIC);

          $rank = $i+1;
          $news_id = $i+1;
$row[3] = substr($row[3],0,10);

$content8 .= "         
<ul>
	
	<li style='height:35px;padding-bottom:2px'><br>
		&nbsp;&nbsp;<img src='images/notice.gif'> <a href='shownews.php?news=$row[5]' title='' style='height:12px;padding:3px 0 0px 2px;'>
			$row[0] </a> 
		<span class='date' style='padding-top:0px;height:18px;float: right;'>Date : $row[3]</span></font>

	
</ul>
";
      }
$content8 .="";
show($content8);
?>