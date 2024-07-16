<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);


$web['connection'] = 'mssql';

$web['localhost'] = 'localhost';


$web['dbhost'] = 'myRanVM\SQLEXPRESS';


$web['database'] = 'RanUser';

$web['dbuser'] = 'sa';


$web['dbpassword'] = 'marpogi23@';
require("includes/web.php");


extract($CONFIG, EXTR_PREFIX_ALL, "CONFIG");
extract($_GET, EXTR_PREFIX_ALL, "GET");

extract($_POST, EXTR_PREFIX_ALL, "POST");
extract($_SERVER, EXTR_PREFIX_ALL, "SERVER");

define('VOTE_TIME', 12 );

define('VOTE_LINK', serialize( array(
                                        1 => 'http://www.xtremetop100.com/in.php?site=1132244520',
                                        2 => 'http://www.gtop100.com/in.php?site=82347',
                                        3 => 'http://top100ragezone.com/index.php?do=votes&id=3016',
                                       

                            ))
        );

?>