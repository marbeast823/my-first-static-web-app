<?
if (eregi("includes/admin_modules.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
function admin_modules(){
if ($_GET['op']) {
    $op=$_GET['op'] ;
    $adr='./administrator/'.$op.'.php' ;
   include($adr);
   }}
?>