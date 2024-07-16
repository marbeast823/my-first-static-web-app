<?php
// Copyright (c) CiMed (cimed@yahoo.com)

// 
require_once "sql_inject.php"; 
$bDestroy_session = TRUE; 
$url_redirect = 'index.php'; 
$sqlinject = new sql_inject('./log_file_sql.log',$bDestroy_session,$url_redirect);  
//

$CONFIG['servername'] = "Ran Online";	//Web Name
$CONFIG['dbaddress'] = "OPREKIN-PC\SQLEXPRESS";		//DB IP
$CONFIG['dbuser'] = "sa";		//DB ID
$CONFIG['dbpass'] = "1234";		//DB PASS
$CONFIG['dbdbname'] = "RanUser";
$CONFIG['dbdbname1'] = "RanGameS1";
$CONFIG['dbdbname2'] = "RanShop";
$CONFIG['registration'] = "1";
$CONFIG['maxaccounts'] = "0";
$CONFIG['maxemail'] = "1";
$CONFIG['email'] = "0";
$CONFIG['emailaddress'] = "";
$CONFIG['emailsmtp'] = "";
$CONFIG['emailuser'] = "";
$CONFIG['emailpass'] = "";

?>
