<?PHP 
if (eregi("includes/links_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$get_links = $db->Execute("SELECT link_name,link_address,link_description,link_date from web_links order by link_date desc");
$content ='<table cellpadding="1" width=450>';

for($i=0;$i < $get_links->numrows();++$i)
       {
$row = $get_links->fetchrow();
$rank = $i+1;

$content .="<tr><td align='left' width='180'><font color='#CCCCCC'><strong>$row[0]</strong></font></td></tr>
	   <td width='200' rowspan='2' class=alt1 align='center'><div align='center'><a href='$row[1]' target='_blank'><img src='images/download.jpg'class="postlink" target="_blank border=0></a></div></td>
           <tr><td align='left' width='200'><span class='normal_text'><br>Download $row[0] From <span class='link_menu'><a href='$row[1]' target='_blank'><font color=green><u>Link Here</u></font></a></span><br><br>Description: $row[2]</span></td></tr>
           <tr><td class=alt2></td></tr>
           <tr><td align='center'><span>Date $row[3]</span></td></tr>";
        }
$content .="</table>";
show($content);
?>
