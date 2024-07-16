<?
if (eregi("includes/show_news.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
include('config.php');
$get_news = $db->Execute("SELECT TOP 5 P.ChaName, P.ChaLevel, P.ChaClass, P.ChaSchool, P.ChaReborn, P.GuNum, P.ChaNum FROM RanGame1.dbo.ChaInfo P, RanUser.dbo.UserInfo U WHERE P.UserNum = U.UserNum AND U.UserType != 30 AND P.ChaDeleted != 1 ORDER BY P.ChaReborn DESC, P.ChaLevel DESC");




for($i=0;$i < $get_news->numrows();++$i)
         {
          $row = $get_news->fetchrow();

          $rank = $i+1;
          $news_id = $i+1;

$content .= "		  <TR>
                            	<li style='display:block; width:179px; height:20px;padding-left:15px;padding-right:15px;float:left;border-bottom:1px solid #AFE0FA;'>
                            <span style='display:block; float:left; padding-top:0px;text-decoration:none;color:#4191BB;font-weight:bold'>$rank</span>
                            <span style='display:block; float:right; padding-top:0px; text-decoration:none;'>$row[0]</span>

                          </TR>



	";
      }
show($content);
?>
