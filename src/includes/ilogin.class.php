<?
function jump($location)
{
 header('Location: '.$location.'');
}

function valid($word)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  for($i=0;$i<strlen($word);$i++)
  {
    $ch = substr($word,$i,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }
  }
  return false;
}





function login()
{


$accountid = stripslashes($_POST['login']);
$passwordid = stripslashes($_POST['pass']);
if(valid($accountid))
{
                       echo('<script language="Javascript">alert("[UserName]Special Characters is Not Allowed"); </script>');

}else if(valid($passwordid))
{
                       echo('<script language="Javascript">alert("[Password]Special Characters is Not Allowed"); </script>');

}else

if(valid($accountid))
{
                       echo('<script language="Javascript">alert("[UserName]Special Characters is Not Allowed"); </script>');

}else if(valid($secu))
{
                       echo('<script language="Javascript">alert("[Security Code]Special Characters is Not Allowed"); </script>');

}else


if(strlen($accountid)>13)
{
                       echo('<script language="Javascript">alert("[UserName]Please Provide Only 13 Characters to Login"); </script>');

}else

if(strlen($passwordid)>15)
{
                       echo('<script language="Javascript">alert("[Password]Please Provide Only 15 Characters to Login"); </script>');

}else


{
                      







     if (isset($_POST["account_login"]))
           {
                require("config.php");
		
                $accountid = stripslashes($_POST['login']);
		$_POST['pass'] = strtolower($_POST['pass']);
                $passwordid = stripslashes($_POST['pass']);
                $accountid = clean_var($accountid);
                $passwordid = clean_var($passwordid);



if ($accountid == null) {
		{

	quickrefresh('ilogin.php'); 

Die ('<script language="JavaScript">
		alert("Please put your User ID and Password!");
		</script>'); }
		$error = 1;
	}






                if (($accountid == NULL) || ($passwordid == NULL)) {}
                if($muweb['md5'] == 0){
					$test = "SELECT * FROM   GSUserInfo WHERE  Username = '".$accountid."' AND   UserPass = '".$passwordid."'";
                $login_check = sqlsrv_query($connect_mssql,$test); }
                elseif ($muweb['md5'] == 0){
					$test = "SELECT * FROM   GSUserInfo WHERE  Username = '".$accountid."' AND   UserPass = '".$passwordid."'";
                $login_check = sqlsrv_query($connect_mssql,$test); }
                $login_result = sqlsrv_has_rows($login_check);


		if ($login_result === false) {
                       echo('<script language="Javascript">alert("UserName and Password is not Match. Please Try Again."); window.location = "ilogin.php"; </script>');}
                    if ($login_result === true) 
                          {
                       echo('<script language="Javascript">alert("Welcome '.$accountid.', have fun!."); top.location = "manage.php"; </script>');
                             $_SESSION['user'] = $accountid;
                             $_SESSION['pass'] = $passwordid; 
                                               
                          }



           }
                    
                           if (isset($_POST["logoutaccount"]))
                                  { 
                                        unset($_SESSION['user']);
                                        unset($_SESSION['pass']);
                                        jump('ilogin.php');
                                   }



            



}}

function login1()
{
     if (isset($_POST["account_login1"]))
           {
                require("config.php");
		
                $accountid = stripslashes($_POST['login']);
		$_POST['pass'] = strtolower($_POST['pass']);
                $passwordid = stripslashes($_POST['pass']);
                $accountid = clean_var($accountid);
                $passwordid = clean_var($passwordid);
                if (($accountid == NULL) || ($passwordid == NULL)) {}
                if($mweb['md5'] == 0){
                $login_check = sqlsrv_query($connect_mssql,"SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass = ?",array($accountid,$passwordid,$accountid)); }
                elseif ($mweb['md5'] == 0){
                $login_check = sqlsrv_query($connect_mssql,"SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass =?",array($accountid,$passwordid)); }
                $login_result = sqlsrv_has_rows($login_check);
                    if ($login_result === false) {}
                    if ($login_result === true) 
                         {
                             $_SESSION['user'] = $accountid;
                             $_SESSION['pass'] = $passwordid;
                             jump('index.php');
                          }



           }
                    
                           if (isset($_POST["logoutaccount1"]))
                                  { 
                                        unset($_SESSION['user']);
                                        unset($_SESSION['pass']);
                                        jump('webshop.php');
                                   }



            



}
                


function logincheck()
{
        if (isset($_SESSION['pass'])){$pass = stripslashes($_SESSION['pass']);}
           if (isset($_SESSION['user']))
                     {
                         $login = stripslashes($_SESSION['user']);
  
                             {
                                  $pass = clean_Var($pass);
                                  $login = clean_Var($login);
                                  require("config.php");
                                  if($mweb['md5'] == 0){
                                  $login_check = sqlsrv_query($connect_mssql,"SELECT * FROM   GSUserInfo WHERE  Username = ? AND   UserPass = ?",array($login,$pass,$login));}
                                  elseif($mweb['md5'] == 0){
                                  $login_check = sqlsrv_query($connect_mssql,"SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass =?",array($login,$pass));}
                                  $login_result = sqlsrv_has_rows($login_check);
                                  if ($login_result === false)
                                       {
                                            unset($_SESSION['user']);
                                            unset($_SESSION['pass']);
                                            jump('controlpanel.php');
                                       }


                              }



                      }



}



function check_user()
{
      if($_GET['op'] == "user" AND (!isset($_SESSION["user"])) || (!isset($_SESSION["pass"])))
            {
                 jump('index.php?op=myaccount');

            }

      if($_GET['op'] == "myaccount" AND (isset($_SESSION["user"])) || (isset($_SESSION["pass"])))
            {
                 jump('index.php');

            }

}
?>