<?php
include 'testconfig.php';
$serverName = "DESKTOP-9FUBEFT\JUVERSOURCE"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>$web['database'],"UID"=>$web['dbuser'],"PWD"=>$web['dbpassword']);
$connect_mssql = sqlsrv_connect( $serverName, $connectionInfo);

if( $connect_mssql ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>