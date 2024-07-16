<?
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);

$web['connection'] = 'mssql';

$web['localhost'] = 'localhost';

$web['dbhost'] = 'OPREKIN-PC\SQLEXPRESS';

$web['database'] = 'RanUser';

$web['dbuser'] = 'sa';

$web['dbpassword'] = '1234';


require("web.php");

?>
