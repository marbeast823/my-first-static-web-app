<?PHP 
require("config.php");
if (eregi("includes/links_patch.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$get_links = $db->Execute("SELECT link_name,link_address,link_description,link_date from web_patch order by link_date desc");


for($i=0;$i < $get_links->numrows();++$i)
       {
$row = $get_links->fetchrow();
$rank = $i+1;

echo"   
                   <tr class='li01' height='25'>
							<TD align=left width=116 style='border-bottom:#4d4c4c 1px solid'><FONT color=#fec516 size=1 >$row[0]</b></td>
							<TD align=center width=84 style='border-bottom:#4d4c4c 1px solid'><FONT color=#fec516 size=1>$row[2]</b></td>
							<TD align=center width=115 style='border-bottom:#4d4c4c 1px solid'><STRONG><a href='$row[1]' TARGET='_blank' style='text-decoration:none'><FONT color=#fbfe16 size=2>Download</strong></a></td>

						</tr>
	
			   </tr>";

        }



?>
