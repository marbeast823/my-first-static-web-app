<?
if (eregi("includes/web.php", $_SERVER['SCRIPT_NAME'])) { die ("Access Denied"); }
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include("includes/adodb/adodb.inc.php");

if($web['connection']=='odbc'){
$db = &ADONewConnection('odbc');
$connect_mssql = $db->Connect($web['database'],$web['dbuser'],$web['dbpassword']);
if (!$connect_mssql) die("<img src=../images/warning.gif> Connection with SQL Server With Odbc $web[odbc_link] failed!<br>Please check if odbc $web[database] exist or db user and password are okey.");
}

elseif($web['connection']=='mssql'){
//if (extension_loaded('gd'))
//	{echo("");}
//else{Die("<table><tr><td bgcolor='FF0000'><font color='#FFFFFF'>Error #122</font></td></tr></table>Loading php_gd2.dll Failed!<br>Please Enable php_gd2.dll In Your Php.ini");}
//if (extension_loaded('mssql'))
//	{echo("");}
//else{Die("<table><tr><td bgcolor='FF0000'><font color='#FFFFFF'>Error #123</font></td></tr></table>Loading php_mssql.dll Failed! <br>Please Enable php_mssql.dll In Your Php.ini");}


//$db = &ADONewConnection('mssql');
//$connect_mssql = $db->Connect($web['dbhost'],$web['dbuser'],$web['dbpassword'],$web['database']);
$connectionInfo = array( "Database"=>$web['database'],"UID"=>$web['dbuser'],"PWD"=>$web['dbpassword']);
$connect_mssql = sqlsrv_connect( $serverName, $connectionInfo);

/*if( $connect_mssql ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}*/
if (!$connect_mssql) die("<img src=images/warning.gif> Connection with SQL Server failed! Error #119");
}


$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$web['verify_code'] = substr(str_shuffle($alphanum), 0, 7);
$web['item_id'] = substr(str_shuffle($alphanum), 0, 7);
$web['event_id'] = substr(str_shuffle($alphanum), 0, 7);
//$web['verify_code'] = (rand()%999999);
$web['news_id'] = substr(str_shuffle($alphanum), 0, 7);
$web['link_id'] = substr(str_shuffle($alphanum), 0, 7);

$execute = "Select webtitle,resetmoney,pkmoney,resetlevel,servername,client,patch,launcher,serverwebsite,resetpoints,resetslimit,resetmode,levelupmode,announcements,forum,ads,clean_inventory,clean_skills,store_inbox,store_sent,msg_length,show_gm,template,warp_zen,music,header,reset_stat,reset_skill,reset_quest From Web";


$execute_results = sqlsrv_query($connect_mssql, $execute);
//if ($execute_results <= 0){echo "<img src=images/warning.gif> Web database loading failed! Error #118"; exit();}
$config = sqlsrv_fetch_array($execute_results,SQLSRV_FETCH_NUMERIC);
if ($users_connected === false) {
	die( print_r( sqlsrv_errors(), true));
}

$users_connected = sqlsrv_query($connect_mssql,"SELECT count(*) FROM RanGameS1.dbo.ChaInfo WHERE ChaOnline='1'");
$web['users_reults'] = sqlsrv_fetch( $users_connected );
$total_accounts = sqlsrv_query($connect_mssql,"SELECT count(*) FROM GSUserInfo");
$web['accounts_reults'] = sqlsrv_fetch( $total_accounts );
$total_characters  = sqlsrv_query($connect_mssql,"SELECT count(*) FROM RanGameS1.dbo.ChaInfo");
$web['character_reults'] = sqlsrv_fetch( $total_characters );
$total_guilds = sqlsrv_query($connect_mssql,"SELECT count(*) FROM RanGameS1.dbo.GuildInfo");
$web['guilds_reults'] = sqlsrv_fetch( $total_guilds );


$web['webtitle'] = "$config[0]";
$web['resetmoney'] = "$config[1]";
$web['pkmoney'] = "$config[2]";
$web['resetlevel'] = "$config[3]";
$web['servername'] = "$config[4]";
$web['client_link'] = "$config[5]";
$web['patch_link']= "$config[6]";
$web['launcher_link'] = "$config[7]";
$web['serverwebsite'] = "$config[8]";
$web['resetpoints'] = "$config[9]";
$web['resetslimit'] = "$config[10]";
$web['resetmode'] = "$config[11]";
$web['levelupmode'] = "$config[12]";
$web['announcements'] = "$config[13]";
$web['forum_link'] = "$config[14]";
$web['ads'] = "$config[15]";
$web['clean_inventory'] = "$config[16]";
$web['clean_skills'] = "$config[17]";
$web['store_inbox'] = "$config[18]";
$web['store_sent'] = "$config[19]";
$web['msg_length'] = "$config[20]";
$web['md5'] = "$config[21]";
$web['gm'] = "$config[22]";
$web['template'] = "$config[23]";
$web['warp_zen'] = "$config[24]";
$web['music'] = "$config[25]";
$web['header'] = "$config[26]";
$web['reset_stat'] = "$config[27]";
$web['reset_skill'] = "$config[28]";
$web['reset_quest'] = "$config[29]";

if($web['header'] == Template1) { 
$header = "<option value='Template1' selected>Template1</option>"; 
$header2 = "<option value='Template2'>Template2</option>"; 
} 

if($web['header'] == Template2) {
$header = "<option value='Template2' selected>Template2</option>"; 
$header2 = "<option value='Template1'>Template1</option>";
}


					
if($web['md5']=='0'){$md5_encrypt = "<option value='0'>Yes</option><option value='0'>No</option>";}
elseif($web['md5']=='0'){$md5_encrypt = "<option value='0'>No</option><option value='0'>Yes</option>";}
if($web['resetmode']=='keep'){$reset_mode="<option value='keep'>Normal (Keep Stats)</option><option value='reset'>Reset (Reset Stats)</option>";}
elseif($web['resetmode']=='reset'){$reset_mode="<option value='reset'>Reset (Reset Stats)</option><option value='keep'>Normal (Keep Stats)</option>";}
if($web['levelupmode']=='normal'){$levelup_mode="<option value='normal'>Normal</option><option value='extra'>Bonus Points (* Resets)</option>";}
elseif($web['levelupmode']=='extra'){$levelup_mode="<option value='extra'>Bonus Points (* Resets)</option><option value='normal'>Normal</option>";}
if($web['clean_inventory']=='yes'){$clean_inv="<option value='yes'>Yes</option><option value='no'>No</option>";}
elseif($web['clean_inventory']=='no'){$clean_inv="<option value='no'>No</option><option value='yes'>Yes</option>";}
if($web['clean_skills']=='yes'){$clean_skills="<option value='yes'>Yes</option><option value='no'>No</option>";}
elseif($web['clean_skills']=='no'){$clean_skills="<option value='no'>No</option><option value='yes'>Yes</option>";}
if($web['gm']=='yes'){$gm_show="<option value='yes'>Yes</option><option value='yes'>No</option>";}
elseif($web['gm']=='no'){$gm_show="<option value='no'>No</option><option value='yes'>Yes</option>";}
if($web['music']=='1'){$music="<option value='1'>Yes</option><option value='1'>No</option>";}
elseif($web['music']=='0'){$music="<option value='0'>No</option><option value='1'>Yes</option>";}

if($web['template'] == 'default'){$template ="<option value='default'>Default</option>";}
elseif($web['template'] == 'default'){$template ="<option value='default'>Default</option>";}



					
if(!isset($_SESSION['theme']) AND $web['template']=='default'){$theme = "<option value='default'>Default</option>";}
elseif(!isset($_SESSION['theme']) AND $web['template']=='kanturu'){$theme = "<option value='default'>Default</option>";}

$ok_start = "<img src=images/ok.gif /> ";
$ok_end = "";


$warning_start = "<img src=images/warning.gif /> Error: ";
$warning_end = "<br>";
?>
