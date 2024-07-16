<?
function denied($value){
if (eregi("modules/$value.php", $_SERVER['SCRIPT_NAME'])) { die ("<style type='text/css'>
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
        color: #FF0000;
}
.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 20px;
	font-weight: bold;
        color: #FF0000;
}
-->
</style>
<table width='503' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='215'><img src='../images/mu404_back.jpg' width='215' height='369'></td>
    <td width='288'><div align='center' class='style1'>Access Denied!</div><br><div align='center' class='style2'>$_SERVER[REMOTE_ADDR]</div></td>
  </tr>
</table>
"); }
}




function denied2($value){
if (eregi("modules/$value.php", $_SERVER['SCRIPT_NAME'])) { die ("<style type='text/css'>
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 36px;
	font-weight: bold;
        color: #FF0000;
}
.style2 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 20px;
	font-weight: bold;
        color: #FF0000;
}
-->
</style>
<table width='503' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='215'><img src='../../images/mu404_back.jpg' width='215' height='369'></td>
    <td width='288'><div align='center' class='style1'>Access Denied!</div><br><div align='center' class='style2'>$_SERVER[REMOTE_ADDR]</div></td>
  </tr>
</table>
"); }
}

?>