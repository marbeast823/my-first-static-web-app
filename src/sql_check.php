<?php
// Anti-SQL Injection 
function check_inject() 
  { 
    $badchars = array(";","'","*","/"," \ ","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where", "-1", "-2", "-3","-4", "-5", "-6", "-7", "-8", "-9",); 
   
    foreach($_POST as $value) 
    { 
	$value = clean_variable($value);

	if(in_array($value, $badchars)) 
      { 
	require("config.php");
	mssql_query ("INSERT INTO RanUser.dbo.SqlInjectionLog (LastDate, SqlInject, HostIp)
	VALUES(getdate(),'$value','$_SERVER[REMOTE_ADDR]')");
        die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']); 
      } 
      else 
      { 
        $check = preg_split("//", $value, -1, PREG_SPLIT_OFFSET_CAPTURE); 
        foreach($check as $char) 
        { 
          if(in_array($char, $badchars)) 
          { 
		require("config.php");
		mssql_query ("INSERT INTO RanUser.dbo.SqlInjectionLog (LastDate, SqlInject, HostIp)
		VALUES(getdate(),'$value','$_SERVER[REMOTE_ADDR]')");
            die("SQL Injection Detected - Make sure only to use letters and numbers!\n<br />\nIP: ".$_SERVER['REMOTE_ADDR']); 
          } 
        } 
      } 
    } 
  } 
function clean_variable($var) 
	{ 
	$newvar = preg_replace('/[^a-zA-Z0-9\_\-]/', '', $var); 
	return $newvar; 
	}

?>