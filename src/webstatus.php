<?php 
//You can use this to your launcher to display current status of your server.
//Change "your ip here" with your ip and port 5502 with your agent server's port.
function getStatusServer($server, $port, $name) {
$socket = "";
@$socket = fsockopen($server, $port, $errno, $errstr, 2);
if(!$socket) {
  $socket = print ("\n<br /><center><strong><font face=arial color=red font size=5>$name OFFLINE</font></strong>");
} else {
fclose($socket);
$socket = print("\n<br /><center><strong><font face=arial color=lime font size=5>$name ONLINE</font></strong>");
 } 
}
getStatusServer("192.168.100.11", 3003,"SERVER STATUS");

  
?>
</div>
<body bgcolor="#000000">
<p align="center"><font color="red" size="+1" face="Arial">NEWS & UPDATES</font></p>

</div>