<?
if(!isset($_GET['op'])){
require("../includes/denied.php");
denied('search');
}
?>
<?php require("config.php"); ?>
<script language="Javascript" type="text/javascript">
function search_form()
{
if ( document.search_.character_search.value == "")
{
alert("Please enter some words.");
return false;
}

//return false;
document.search_.submit();
}
</script>
<form action="" method="post" name="search_" id="search_">
<table width="210" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="218" height="159"><fieldset>
      <legend>Search Form </legend>
      <table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="103"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
            <tr>
              <td height="30" colspan="2" align="center"><span class="normal_text_white">Search</span> Name
                <input name="character_search" type="text" id="character_search" size="15" maxlength="10" />
              </td>
            </tr>
            <tr>
              <td width="80" align="right" valign="middle"><span class="normal_text_white">Search Metod </span></td>
              <td width="108" align="left"><label>
                <input type="radio" name="search_type" value="1" checked="checked" />
                <span class="normal_text_white">Exact Match</span></label>
                  <br />
                  <label>
                  <input type="radio" name="search_type" value="0" />
                  <span class="normal_text_white">Partial Match</span></label>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="normal_text_white">Search Type</td>
              <td width="108"><p align="left">
                  <input type="radio" name="search_type_2" value="character" checked="checked" />
                  <span class="normal_text_white">Characters</span> <br />
                  <input type="radio" name="search_type_2" value="guilds" />
                  <span class="normal_text_white">Guilds</span> <br />
              </p></td>
            </tr>
            <tr>
              <td height="40" colspan="2" align="center" valign="middle" class="normal_text_white"><input type="submit" name="Submit" value="Submit New Search" onclick="return search_form();" class="button" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </fieldset></td>
  </tr>
</table></form>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td scope="row"><div align="center"></div>
        <div align="center">
          <? 	if (isset($_POST["character_search"]))
	
{
if($_POST['search_type_2'] == 'character'){
include("modules/rankings/search.php"); }
elseif($_POST['search_type_2'] == 'guilds'){
include("modules/rankings/search_guild.php");
}



}
?>
      </div></td>
  </tr>
</table>
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
