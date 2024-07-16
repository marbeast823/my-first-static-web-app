<?php
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("l dS of F Y h:i:s A");
$script = $_SERVER[PATH_TRANSLATED];
$fp = fopen ("InjectionLogs.txt", "a+");
$sql_inject_1 = array(";","'","%",'"'); 
$sql_inject_2 = array("", "","","&quot;");
$GET_KEY = array_keys($_GET); 
$POST_KEY = array_keys($_POST);
$COOKIE_KEY = array_keys($_COOKIE); 
$REQUEST = array_keys($_REQUEST); 
for($i=0;$i<count($GET_KEY);$i++)
{
$real_get[$i] = $_GET[$GET_KEY[$i]];
$_GET[$GET_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_GET[$GET_KEY[$i]]));
if($real_get[$i] != $_GET[$GET_KEY[$i]])
{
fwrite ($fp, "IP: $ip\r\n");
fwrite ($fp, "Method: GET\r\n");
fwrite ($fp, "Value: $real_get[$i]\r\n");
fwrite ($fp, "Script: $script\r\n");
fwrite ($fp, "Time: $time\r\n");
fwrite ($fp, "==================================\r\n");
}
}
/*end clear $_GET */
/*begin clear $_POST */
for($i=0;$i<count($POST_KEY);$i++)
{
$real_post[$i] = $_POST[$POST_KEY[$i]];
$_POST[$POST_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_POST[$POST_KEY[$i]]));
if($real_post[$i] != $_POST[$POST_KEY[$i]])
{
fwrite ($fp, "IP: $ip\r\n");
fwrite ($fp, "Method: POST\r\n");
fwrite ($fp, "Value: $real_post[$i]\r\n");
fwrite ($fp, "Script: $script\r\n");
fwrite ($fp, "Time: $time\r\n");
fwrite ($fp, "==================================\r\n");
}
}
for($i=0;$i<count($COOKIE_KEY);$i++)
{
$real_cookie[$i] = $_COOKIE[$COOKIE_KEY[$i]];
$_COOKIE[$COOKIE_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_COOKIE[$COOKIE_KEY[$i]]));
if($real_cookie[$i] != $_COOKIE[$COOKIE_KEY[$i]])
{
fwrite ($fp, "IP: $ip\r\n");
fwrite ($fp, "Method: COOKIE\r\n");
fwrite ($fp, "Value: $real_cookie[$i]\r\n");
fwrite ($fp, "Script: $script\r\n");
fwrite ($fp, "Time: $time\r\n");
fwrite ($fp, "==================================\r\n");
}
}
for($i=0;$i<count($REQUEST);$i++)
{
$real_request[$i] = $_REQUEST[$REQUEST[$i]];
$_REQUEST[$REQUEST[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_REQUEST[$REQUEST[$i]]));
if($real_request[$i] != $_REQUEST[$REQUEST[$i]])
{
fwrite ($fp, "IP: $ip\r\n");
fwrite ($fp, "Method: COOKIE\r\n");
fwrite ($fp, "Value: $real_request[$i]\r\n");
fwrite ($fp, "Script: $script\r\n");
fwrite ($fp, "Time: $time\r\n");
fwrite ($fp, "==================================\r\n");
}
}
for($i=0;$i<count($SESSION);$i++)
{
$real_session[$i] = $_SESSION[$SESSION[$i]];
$_SESSION[$SESSION[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_SESSION[$SESSION[$i]]));
if($real_session[$i] != $_SESSION[$SESSION[$i]])
{
fwrite ($fp, "IP: $ip\r\n");
fwrite ($fp, "Method: session\r\n");
fwrite ($fp, "Value: $real_session[$i]\r\n");
fwrite ($fp, "Script: $script\r\n");
fwrite ($fp, "Time: $time\r\n");
fwrite ($fp, "==================================\r\n");
}
}
fclose ($fp);
?>
