<?
function jump($location)
{
 header('Location: '.$location.'');
}


function login()
{
     if (isset($_POST["account_login"]))
           {
                require("config.php");
		
                $accountid = stripslashes($_POST['login']);
		$_POST['pass'] = strtoupper(substr(md5($_POST['pass']),0,19));
                $passwordid = stripslashes($_POST['pass']);
                $accountid = clean_var($accountid);
                $passwordid = clean_var($passwordid);
                if (($accountid == NULL) || ($passwordid == NULL)) {}
                if($muweb['md5'] == 0){
                $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass = ?",array($accountid,$passwordid,$accountid)); }
                elseif ($muweb['md5'] == 0){
                $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass =?",array($accountid,$passwordid)); }
                $login_result = $login_check->numrows();
                    if ($login_result == 0) {}
                    if ($login_result > 0) 
                         {
                             $_SESSION['user'] = $accountid;
                             $_SESSION['pass'] = $passwordid;
                             jump('continue.php');
                          }



           }
                    
                           if (isset($_POST["logoutaccount"]))
                                  { 
                                        unset($_SESSION['user']);
                                        unset($_SESSION['pass']);
                                        jump('index.php');
                                   }



            



}
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
                $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass = ?",array($accountid,$passwordid,$accountid)); }
                elseif ($mweb['md5'] == 0){
                $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass =?",array($accountid,$passwordid)); }
                $login_result = $login_check->numrows();
                    if ($login_result == 0) {}
                    if ($login_result > 0) 
                         {
                             $_SESSION['user'] = $accountid;
                             $_SESSION['pass'] = $passwordid;
                             jump('continue.php');
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
                                  $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username = ? AND   UserPass = ?",array($login,$pass,$login));}
                                  elseif($mweb['md5'] == 0){
                                  $login_check = $db->Execute("SELECT * FROM   GSUserInfo WHERE  Username =? AND   UserPass =?",array($login,$pass));}
                                  $login_result = $login_check->numrows();
                                  if ($login_result == 0)
                                       {
                                            unset($_SESSION['user']);
                                            unset($_SESSION['pass']);
                                            jump('continue.php');
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
                 jump('continue.php');

            }

}
?>