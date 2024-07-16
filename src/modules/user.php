<?
if(!isset($_GET['op'])){
require("../includes/denied.php");
denied('user');
}
?>
<?php require("config.php"); ?>
<?
$account_id = stripslashes($_SESSION['user']);
$account_id = clean_var($account_id);
if($account_id == NULL){Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Access Denied!</div></table></div></table></table>");}
$sql_accountid_check = $db->Execute("select accountid from Web_mail where accountid='$account_id'");
$sql_accountid_check_execute = $sql_accountid_check->numrows();
if($sql_accountid_check_execute <= 0){$sql_insert_account = $db->Execute("INSERT INTO Web_mail (accountid) VALUES ('$account_id')");
$sql_insert_account2 = $db->Execute("INSERT INTO Web_mail_store (accountid,store_inbox,store_sent) VALUES ('$account_id','0','0')");}
$sql_inbox_msg_check_script = $db->Execute("select read_msg from Web_mail where accountid='$account_id' and inbox='inbox' and read_msg='0'"); 
$sql_inbox_msg_check = $sql_inbox_msg_check_script->numrows();
?>
<script language=javascript>
function CheckLen(Target)
 {
  MaxLength = <? echo($web['msg_length']); ?>;
  if (Target.value.length > MaxLength)
    document.new_mail.new_msg.value =
      document.new_mail.new_msg.value.substr(0,MaxLength);
 }
///////////////////////////////////////////////////////////////
function ask_stats()
{
var detStatus=confirm("Are You Sure You Want To Add Those Stats?");
if (detStatus)
document.stats_normal.submit();
else
return false;
}
/////////////////////////////////////////////////////////////////
function ask_stats_dl()
{
var detStatus=confirm("Are You Sure You Want To Add Those Stats");
if (detStatus)
document.stats_dl_normal.submit();
else
return false;
}
/////////////////////////////////////////////////////////////////
function check_password_form()
{
if ( document.change_password.newpassword.value == "")
{
alert("Please enter New Password.");
return false;
}
if ( document.change_password.renewpassword.value == "")
{
alert("Please retype New Password.");
return false;
}
//return false;
document.change_password.submit();
}
</script>
<script type="text/javascript" src="includes/js/tabpane.js"></script>
<style type="text/css">
<!--
.style1 {color: #CCCCCC}
-->
</style>


<? echo '<table width=1>
<tr><td  style="text-align:justify" background=images/content_title_news2.jpg height=28></td></tr>
             <tr><td background=images/content_title_bg.jpg width=520 >

<table width="20" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="450" align="center">'; echo"<script type='text/javascript'>

/***********************************************
* Scrollable Menu Links- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

//configure path for left and right arrows
var goleftimage='images/leftAlt3.png'
var gorightimage='images/rightAlt3.png'
//configure menu width (in px):
var menuwidth=300
//configure menu height (in px):
var menuheight=25
//Specify scroll buttons directions ("normal" or "reverse"):
var scrolldir="normal"
//configure scroll speed (1-10), where larger is faster
var scrollspeed=10
//specify menu content
var menucontents='<nobr><a href="user.php?op=user&option=characters"><font size=2>Characters</a> | <a href="user.php?op=user&option=mixclass"><font size=2>MixClass</a> | <a href="user.php?op=user&amp;option=changepassword">Change Password</a> | <a href="user.php?op=user&option=donate">Donate</a> | <a href="user.php?op=user&option=topup">Top Up</a> | <a href="user.php?op=user&option=accountinfo">Account Info</a> | <a href="user.php?op=user&option=nation">Nation</a> | <a href="user.php?op=user&option=eptransfer">CP Transfer</a> | <a href="user.php?op=user&option=transaction">Transaction Log</a> | <a href="user.php?op=user&option=reborn">Reborn</a></nobr>'


////NO NEED TO EDIT BELOW THIS LINE////////////

var iedom=document.all||document.getElementById
var leftdircode='onMouseover="moveleft()" onMouseout="clearTimeout(lefttime)"'
var rightdircode='onMouseover="moveright()" onMouseout="clearTimeout(righttime)"'
if (scrolldir=="reverse"){
var tempswap=leftdircode
leftdircode=rightdircode
rightdircode=tempswap
}
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100;left:-5000">'+menucontents+'</span>')
var actualwidth=''
var cross_scroll, ns_scroll
var loadedyes=0
function fillup(){
if (iedom){
cross_scroll=document.getElementById? document.getElementById("test2") : document.all.test2
cross_scroll.innerHTML=menucontents
actualwidth=document.all? cross_scroll.offsetWidth : document.getElementById("temp").offsetWidth
}
else if (document.layers){
ns_scroll=document.ns_scrollmenu.document.ns_scrollmenu2
ns_scroll.document.write(menucontents)
ns_scroll.document.close()
actualwidth=ns_scroll.document.width
}
loadedyes=1
}
window.onload=fillup

function moveleft(){
if (loadedyes){
if (iedom&&parseInt(cross_scroll.style.left)>(menuwidth-actualwidth)){
cross_scroll.style.left=parseInt(cross_scroll.style.left)-scrollspeed+"px"
}
else if (document.layers&&ns_scroll.left>(menuwidth-actualwidth))
ns_scroll.left-=scrollspeed
}
lefttime=setTimeout("moveleft()",50)
}

function moveright(){
if (loadedyes){
if (iedom&&parseInt(cross_scroll.style.left)<0)
cross_scroll.style.left=parseInt(cross_scroll.style.left)+scrollspeed+"px"
else if (document.layers&&ns_scroll.left<0)
ns_scroll.left+=scrollspeed
}
righttime=setTimeout("moveright()",50)
}


if (iedom||document.layers){
with (document){
write('<table border="0" cellspacing="0" cellpadding="2" align=center>')
write('<td valign="middle"><a href="#" '+leftdircode+'><img src="'+goleftimage+'"border=0></a> </td>')
write('<td width="'+menuwidth+'px" valign="top">')
if (iedom){
write('<div style="position:relative;width:'+menuwidth+'px;height:'+menuheight+'px;overflow:hidden;">')
write('<div id="test2" style="position:absolute;left:0;top:0">')
write('</div></div>')
}
else if (document.layers){
write('<ilayer width='+menuwidth+' height='+menuheight+' name="ns_scrollmenu">')
write('<layer name="ns_scrollmenu2" left=0 top=0></layer></ilayer>')
}
write('</td>')
write('<td valign="middle"> <a href="#" '+rightdircode+'>')
write('<img src="'+gorightimage+'"border=0></a>')
write('</td></table>')
}
}

</script>"; echo' </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">';?>
        <? if(!isset($_GET['option'])){include("modules/user/characters.php"); } else{user_modules();} ?>
   <? echo ' </div></td>
  </tr><TD><IMG height=12 src=images/content_title_bottom.jpg width=518></TD>
                            </TR>
</td></tr></table>';?>
