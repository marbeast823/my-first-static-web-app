<?php
include_once('sql_check.php');
check_inject();

require_once "sql_inject.php"; 
require_once "sql.class.php";
$bDestroy_session = TRUE; 
$url_redirect = 'error.php';
 
$sqlinject = new sql_inject('sqlinject/log_file_sql.log',$bDestroy_session,$url_redirect)  ;

$account_id =  stripslashes(set_sec_see($_SESSION['user']));

if($account_id == NULL){ quickrefresh('index.php'); Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Please Log In to Continue...!</div></table></div></table></table>"); }
$action = $_GET["action"];
$vid =  stripslashes(set_sec_see($_POST['vid']));
$tm = time();
//////process code ko dito
$tm = time();
 if($vid=='1')
  {
$url ="http://www.xtremetop100.com/in.php?site=";
}
else if($vid=='2')
{
$url ="http://www.gtop100.com/in.php?site=";
}
else if($vid=='3')
{
$url ="http://www.jagtoplist.com/in.php?site=";
}
else if($vid=='3')
{
$url ="http://www.gamesites100.net/in.php?site=";
}
else if($vid=='4')
{
$url ="http://www.gamesites100.net/in.php?site=";
}
else if($vid=='5')
{
$url ="http://www.mmorpgtop200.com/in.php?site=10290";
}

 $lastpm = mssql_fetch_array(mssql_query("SELECT TOP 1 MAX(votetime) FROM Ranuser.dbo.Vote WHERE username='".$account_id."' AND link='".$vid."'"));
 $pmfl = $lastpm[0]+43200;

  if($pmfl<$tm)
  {
$tm = time();
mssql_query ("INSERT INTO Ranuser.dbo.Vote (votetime, username, link)
	VALUES('$tm','$account_id','$vid')");
echo "<center><font color=red>Voted Successfuly!<br/></font></center>";
 mssql_query ("UPDATE Ranuser.dbo.GSUserinfo SET UserPoint = UserPoint + '2' WHERE UserName = '$account_id'");

header("Location: " . $url);
exit();
}else{
echo "<center><font color=red>Wait 12 hours to vote again!<br/></font></center>";
quickrefresh('index.omg');
}

?>