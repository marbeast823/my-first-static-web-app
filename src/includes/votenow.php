<?php
require("config.php");
$action = $_GET["action"];
$vid =  stripslashes($_POST['vid']);
$tm = time();
//////process code ko dito
$tm = time();
 if($vid=='1')
  {
$url ="http://www.xtremetop100.com/in.php?site=1132333380";
}
else if($vid=='2')
{
$url ="http://www.gamesites100.net/in.php?site=23752";
}
else if($vid=='3')
{
$url ="http://www.mmorpgtop200.com/in.php?site=10319";
}

 $lastpm = mssql_fetch_array(mssql_query("SELECT TOP 1 MAX(votetime) FROM Ranuser.dbo.Vote WHERE username='".$account_id."' AND link='".$vid."'"));
 $pmfl = $lastpm[0]+43200;

  if($pmfl<$tm)
  {
$tm = time();
mssql_query ("INSERT INTO Ranuser.dbo.Vote (votetime, username, link)
	VALUES('$tm','$account_id','$vid')");
echo "<center><font color=red>Voted Successfuly!<br/></font></center>";
 mssql_query ("UPDATE Ranuser.dbo.Userinfo SET UserPoint = UserPoint + '2' WHERE UserName = '$account_id'");
 mssql_query ("UPDATE Ranuser.dbo.Userinfo SET UserPoint2 = UserPoint2 + 1 WHERE UserName = '$account_id'");

header("Location: " . $url);
exit();
}else{
echo "";
quickrefresh('');
}

?>