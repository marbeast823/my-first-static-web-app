<?
if(!isset($_GET['op'])){
require("../includes/denied.php");
denied('events');
}
?>
<?php require("config.php"); ?>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="164" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td><? include_once("includes/show_events.php"); ?></td>
  </tr>
</table>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
