<div style='height:1.4em;visibility:hidden;'><table align=center>
<tr><td><div style="width:624px; margin:0 0 0 0px; padding:10px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:18px">
    Note: REMINDER FOR CHANGING PASSWORD!<br><br>
    1. Please double check your new create Password.<br>
    2. Check your computer if there's any keylogger on the process.<br>
    3. We recommend you to use Virtual Keyboard for your safety.
    
    </div>
<font size=2 color=black>
</div></table>
<table width="485" border="0" align="center" cellpadding="0" cellspacing="0">

  
  <tr>
    <td><div align="center"></div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><form action="" method="post" name="change_password" id="change_password">
      <table width="310" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="310"><div align="center">
              
                    
                <table width="310" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="310"><div align="center">
                      
                        <table width="355" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <td width="141" align="right"><font size=2>Curent Password &nbsp;</td>
                            <td width="102"><input name="oldpassword" type="password" id="oldpassword" size="17" maxlength="12" /></td>
                          </tr>
                          <tr>
                            <td align="right"><font size=2>New Password &nbsp;</td>
                            <td><input name="newpassword" type="password" id="newpassword" size="17" maxlength="12" /></td>
                          </tr>
                          <tr>
                            <td align="right" width=100><font size=2>Retype New Password &nbsp;</td>
                            <td><input name="renewpassword" type="password" id="renewpassword" size="17" maxlength="12" /></td>
                          </tr>
                        </table>
                        <table width="600" border="0" cellspacing="4" cellpadding="0">
                          <tr>
                            <td width="1"><div align="center"><br>
                             <input type='image' src='images/tankace/main/btn_submit.gif' alt='Submit button'>
                            </div></td>

                          </tr>
                        </table>
                      
                  </div></td>
                </tr>
              </table>
                </fieldset>
          </div></td>
        </tr>
      </table></form>
    </div></td>
  </tr>
  <tr>
    <td height="35" align="center"><? 									if (isset($_POST["newpassword"]))
	{
          require("includes/character.class.php");
          option::changepassword();
        } ?></td>
  </tr>

