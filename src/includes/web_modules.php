<?
if (eregi("includes/web_modules.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }



function modules(){
      if(isset($_GET['op'])){
        $op = $_GET['op'];
		$g = chr(92);
        $op = str_replace($g , "", $_GET['op']);
        $op = str_replace("/" , "", $op);
        $op = str_replace("%00" , "\0", $op);
        $op = str_replace("?" , "", $op);
        $op = htmlspecialchars($op);
      if (is_file("modules/".$op.".php")) {
      	    include("modules/".$op.".php");
	
      } else {	
                require("config.php");
		Echo ("<br>$warning_start Module $op Could Not Be Found By Web! $warning_end<br>");
      }
   }
}
function modules3(){
      if(isset($_GET['op'])){
        $op = $_GET['op'];
		$g = chr(92);
        $op = str_replace($g , "", $_GET['op']);
        $op = str_replace("/" , "", $op);
        $op = str_replace("%00" , "\0", $op);
        $op = str_replace("?" , "", $op);
        $op = htmlspecialchars($op);
      if (is_file("includes/".$op.".php")) {
      	    include("includes/".$op.".php");
	
      } else {	
                require("config.php");
		Echo ("<br>$warning_start Module $op Could Not Be Found By Web! $warning_end<br>");
      }
   }
}

function user_modules(){
      if($_GET['option']) {
        $option=$_GET['option'] ;
		$g = chr(92);
        $option = str_replace($g , "", $_GET['option']);
        $option = str_replace("/" , "", $option);
        $option = str_replace("%00" , "\0", $option);
        $option = str_replace("?" , "", $option);
        $option = htmlspecialchars($option);
         $adr='modules/user/'.$option.'.php';
      include($adr);
      }
    }


function show($value){Echo "$value";}
function show_error($value){  Echo "$value";}



function news_content($id)
   { 
     require("config.php");
	 $test = "SELECT news_title from Web_news where [news_id] = '".$id."'";
     $get_news_content = sqlsrv_query($connect_mssql,$test);
     $news_content = sqlsrv_fetch_array($get_news_content,SQLSRV_FETCH_ASSOC); 
     show("<a href=''>$news_content[0]</a>");
   }


function curent_module(){

if(isset($_GET['news'])){Echo("<a href='index.php'><font color=white>News</a> &gt; "); news_content($_GET['news']);} 
elseif(!isset($_GET['op'])){Echo("<a href='index.php'>News</a>"); }
else{echo("<font color=white><a href=index.php?op=".htmlspecialchars($_GET[op])."><font color=white>"); echo(ucfirst(htmlspecialchars($_GET['op']))); echo("</a>");}	
	
if(isset($_GET['option'])){		  
if($_GET['op'] == 'user' and !isset($_GET['option'])){Echo(" &gt; <a href='index.php?op=user&option=characters'><font color=white>Characters</a>"); }
else{echo(" <font color=white>&gt; <a href=index.php?op=user&option=$_GET[option]>"); echo(ucfirst($_GET['option'])); echo("</a>");}
}
}

function statisitcs(){
require("config.php");

$accounts = $web['accounts_reults'][0];
$online = $web['users_reults'][0];
$characters = $web['character_reults'][0];
$guilds = $web['guilds_reults'][0];

$query = "SELECT Name,experience,drops,gsport,ip,version,type from web_servers order by display_order asc";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$result = sqlsrv_query($connect_mssql,$query);
for($i=0;$i < sqlsrv_num_rows($result);++$i)
{
$row = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC);

$rank = $i+1;
if ($check=@fsockopen($row[4],$row[3],$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	$status_done = "<img src=images/online.gif width=6 height=6> <span class='status_online'>Online"; 
	}
else 
	{ 
	$status_done = "<img src=images/offline.gif width=6 height=6> <span class='status_offline'>Offline"; 
	} 

$content= "fader[2].message[0] = \"Total Accounts $accounts<br>Total Characters $characters</td></tr><br><tr><td align=left>Total Guilds </td> <td>$guilds</td></tr><br><tr><td align=left>Online Users </td> <td>$online</td></tr>\";";
$content.="fader[2].message[$rank] = \"$row[0]<br>Version $row[5]<br>Experience $row[1]<br>Drops $row[2]<br>$row[6]<br>$status_done\";";
echo("$content");

}
}

function magic() {
if (!get_magic_quotes_gpc()) {
ini_set("magic_quotes_gpc", "On");
}
}
?>