<?PHP 
require("config.php");
if (eregi("includes/links_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$get_links = $db->Execute("SELECT link_name,link_address,link_description,link_date from web_links order by link_date desc");


for($i=0;$i < $get_links->numrows();++$i)
       {
$row = $get_links->fetchrow();
$rank = $i+1;

echo"   
                                      <tr class='li01' height='25'>
							<TD align=left width=156 ><FONT color=#fec516> $row[0]</font></td>
							<TD align=center width=185>Date - <FONT color=#fec516>$row[2]</td>
							<TD align=center width=55'><STRONG><a href='$row[1]' TARGET='_blank' style='text-decoration:none'><img src='here.png' alt='Sign Up' /></a></td>

						</tr>
	
			   </tr>";

        }



?>
