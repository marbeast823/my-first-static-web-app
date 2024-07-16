<?
function getStatusServer($server, $port, $name) {
$socket = "";
@$socket = fsockopen($server, $port, $errno, $errstr, 2);
if(!$socket) {
  $socket = print('0');
} else {
fclose($socket);
$socket =   print('1');
 } 
}
?>
<?getStatusServer("192.168.100.11",3003, "");?>