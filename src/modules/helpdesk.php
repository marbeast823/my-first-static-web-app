<?
if(!isset($_GET['op'])){
require("../includes/denied.php");
denied('webshop');
}
?>
<?php require("config.php"); $account_id = stripslashes($_SESSION['user']);
$account_id = clean_var($account_id);
if($account_id == NULL){ quickrefresh('index.php?op=myaccount'); Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Access Denied! Login Please!</div></table></div></table></table>"); }
?>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="164" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td><? include_once("includes/helpdesk/fileticket.php"); ?></td>
  </tr>
</table>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
