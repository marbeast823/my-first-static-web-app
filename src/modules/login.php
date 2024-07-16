<?
if(!isset($_GET['op'])){
require("../includes/denied.php");
denied('myaccount');
}
?>
<title><?php require("config.php"); echo($web['webtitle']); ?>&nbsp;Lost Password</title>
<script language="Javascript">
function lostpassword_form()
{
if ( document.lostpassword.username.value == "")
{
alert("Please Enter Your Username.");
return false;
}
if ( document.lostpassword.email.value == "")
{
alert("Please Enter Your E-Mail Address.");
return false;
}
if ( document.lostpassword.squestion.value == "")
{
alert("Please Enter Your Secret Question.");
return false;
}
if ( document.lostpassword.sanswer.value == "")
{
alert("Please Enter Your Secret Answer.");
return false;
}
//return false;
document.search_.submit();
}
</script>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<form action='' method='post' name='login_account2' id='login_account2'>
<div align="center">
  <h3><font color="#CCCCCC">Account Login!</font></h3>
</div>
  <table width='90' border='0' align="center" cellpadding='0' cellspacing='0'>
    <tr>
      <td height='16' class='text_login' scope='row' align='left'><font color=white size=2>Username</font></td>
    </tr>
    <tr>
      <th height='16' scope='row'><div align='left'>
          <input name='login' type='text' class='login_field' id='login' title='Username' size='15' maxlength='10'>
          <input name='account_login1' type='hidden' id='account_login1' value='account_login1'>
      </div></th>
    </tr>
    <tr>
      <td height='16' class='text_login' scope='row' align='left'><font color=white size=2>Password</font></td>
    </tr>
    <tr>
      <th scope='row'><div align='left'>
          <input name='pass' type='password' class='login_field' id='pass' title='Password' size='15' maxlength='10'>
      </div></th>
    </tr>
    <tr>
      <th width='90' height='33' scope='row'><div align='left'>
          <input name='Submit' type='image' class='button' src='images/uni_login.gif' value='Login!' title='Login'>
      </div></th>
    </tr>
  </table>
  <table width="237" border="0" align="center" cellpadding="0" cellspacing="4">

  </table>
</form>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="320" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="395" height="17" background="images/img_mu_did-u-know.png"><div align="center">
        <table width="220" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left">MyAccount</td>
          </tr>
        </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
        <table width="220" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">Please Login to View more info About your Account and your Characters..</td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
