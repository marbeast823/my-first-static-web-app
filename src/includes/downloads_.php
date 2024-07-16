<?PHP
require("config.php");
if (eregi("includes/links_list.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
$get_links = $db->Execute("SELECT link_name,link_address,link_description,link_date from web_links order by link_date desc");


for($i=0;$i < $get_links->numrows();++$i)
       {
$row = $get_links->fetchrow();
$rank = $i+1;

echo"
                       <TR vAlign=left align=left bgColor=#e5e5e5>
                       <TD bgColor=#c8eafd width=300><FONT color=#003366 size=2><STRONG>File Name</STRONG></FONT></TD>
                       <TD bgColor=#c8eafd width=100><STRONG><FONT color=#003366 size=2>Date</FONT></STRONG></TD>
                       <TD bgColor=#c8eafd width=162><STRONG><FONT color=#003366 size=2>Link Download</FONT></STRONG></TD>

                       </TR>

                       <TR vAlign=left align=left>
                       <TD width=106><FONT color=#003366 size=2>$row[0]</FONT></TD>
                       <TD width=214><FONT color=#003366 size=2>$row[3]</FONT></TD>

                       <TD width=162><STRONG><FONT size=2><A href='$row[1]'>Click Here</A></FONT></STRONG></TD>
";
        }


?>
