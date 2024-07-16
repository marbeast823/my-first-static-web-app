<?
require("config.php");
$account_id = stripslashes($_SESSION['user']);
$account_id = clean_var($account_id);
if($account_id == NULL){ quickrefresh('myaccount.php'); Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Access Denied. Please LogIn to Proceed.</div></table></div></table></table>"); }

if (eregi("includes/show_vote_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
require('config.php');
$get_vote = $db->Execute("SELECT vote_link,vote_img,vote_unid,vote_date from RanUser.dbo.muweb_des_vote order by vote_date desc");

$content = '<table cellpadding="0" width=401>';

for($i=0;$i < $get_vote->numrows();++$i)
         {

          $row = $get_vote->fetchrow();


          $rank = $i+1;

$content .= "                    
					 <td style='border-bottom:#CCCCCC 1px dashed'><a href='user.php?op=user&option=govotee&id=$row[2]'><img src='$row[1]' />
          ";
      }
show($content);
?>
