<?
class option{

function register()
{
       $account = stripslashes($_POST['account']);
       $password = stripslashes($_POST['password']);
       $repassword = stripslashes($_POST['repassword']);
       $email = stripslashes($_POST['email']);
       $squestion = stripslashes($_POST['question']);
       $sanswer = stripslashes($_POST['answer']);
       $verifyinput2 = stripslashes($_POST['verifyinput2']);
       $country = stripslashes($_POST['country']);
       $gender = stripslashes($_POST['gender']);
       $idcode = stripslashes($_POST['idcode']);
       $date = date('m/d/Y');

                      require("config.php");
                      include("includes/validate.class.php");

                      $username_check = $db->Execute("SELECT ID FROM Account.dbo.cabal_auth_table WHERE ID=?",array($account));
                      $username_verify = $username_check->numrows();




                      $elems[] = array('name'=>'account','label'=>''.$warning_start.' Account ID Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text','uname'=>'true', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha');
                      $elems[] = array('name'=>'password', 'label'=>''.$warning_start.' Password Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha');
	              $elems[] = array('name'=>'repassword', 'label'=>''.$warning_start.' Passwords Did not Match '.$warning_end.'','type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha','equal'=> array('password'));
                      $elems[] = array('name'=>'idcode','label'=>''.$warning_start.' Personal ID Code Is Invalid (6 Numeric Characters) '.$warning_end.'', 'type'=>'text','uname'=>'true', 'required'=>true, 'len_min'=>6,'len_max'=>6, 'cont' =>'digit');


                 $f = new FormValidator($elems);
	             $err = $f->validate($_POST);

	                if ( $err === true ) {

	                	$valid = $f->getValidElems();

		                    foreach ( $valid as $k => $v ) {

			               if ( $valid[$k][0][1] == false ) {

				             if ( empty($valid[$k][0][2]) ) {

				                  show_error($valid[$k][0][2]);
						}else {
			                          show_error($valid[$k][0][2]);
				            }
			             }
		             }

                               } else {




                               if ($_SESSION['image_random_value'] != md5($verifyinput2)){
                                         $error= 1;
                                         show_error("$warning_start Please Go Back And Write Code Correctly! $warning_end");
                                                                                         }
                               if ($username_verify  > 0){
                                         $error= 1;
                                         show_error("$warning_start Account Is Already In Use, Please Choose Another! $warning_end");
                                                         }

                               if ($email_verify > 0){
                                         $error= 1;
                                         show_error("$warning_start E-Mail Is Already In Use, Please Choose Another! $warning_end");
                                                     }



                               if ($error!=1){



$password = substr(md5($password),0,32);
$query = "INSERT INTO Account.dbo.cabal_auth_table (ID,Password,AuthType,CreateDate,Login,Pincode)
VALUES ('$account', '$password', '1', '$date','0','$idcode')";

	 if(!$result5=mssql_query($query))
	   die('cant run query');

$account = stripslashes($_POST['account']);
$comanda1="SELECT UserNum from Account.dbo.cabal_auth_table where id = '$account' "; //query to get all affiliates

$rezultat2=mssql_query($comanda1) or die("Can`t be executed");
while($r2=mssql_fetch_array($rezultat2)){
$Usernum = $r2["UserNum"];
}

$query2 = "INSERT INTO Account.dbo.cabal_charge_auth (UserNum, Type, ExpireDate, Payminutes, ServiceKind)
VALUES ('$Usernum','1','10/31/2020 7:39:28 PM','9999','5' )";


	 if(!$result3=mssql_query($query2))
	   die('cant run query');

if ($result5 && $result3)
{

echo "<font color=green><b>You have succesfully register.</b></font>";
}
                               }

                       }

               }




function reset($charactername)
{
          if ((isset($_SESSION['pass'])) && (isset($_SESSION['user'])));
                     {
                           require("config.php");
                           $loginid = "$_SESSION[user]";

                           $character_check = $db->Execute("SELECT Name FROM Character WHERE Name=? and AccountID=?",array($charactername,$loginid));
                           $character_check_ = $character_check->numrows();
                           $online_check = $db->Execute("SELECT ConnectStat FROM MEMB_STAT WHERE memb___id=?",array($loginid));
                           $row2 = $online_check->fetchrow();

                           $result = $db->Execute("Select Clevel,Resets,Money,LevelUpPoint,class From Character where Name=?",array($charactername));
                           $row = $result->fetchrow();

                           $resetup=$row[1] + (1);
                           $resetmoeny=$row[2]-($web['resetmoney']);
                           $resetpt=$row[3] + ($web['resetpoints']);
                           $resetpt1=$web['resetpoints'] * ($row[1] + 1);

                            if (empty($charactername) || empty($loginid)){$error=1;
	                                 show_error("$warning_start Some Fields Were Left Blank! $warning_end");
                                                                         }
                            if ($character_check_ <= 0){$error=1;
                                         show_error("$warning_start Character $charactername Does Not Exist! $warning_end");
                                                           }

                            if ($row2[0] != 0){ $error=1;
                                         show_error("$warning_start Character $charactername Is Online, Must Be Logged Off! $warning_end");
                                                  }

                            if ($resetmoeny < 0){ $error=1;
                                         show_error("$warning_start $charactername Need $web[resetmoney] Zen To Reset! $warning_end");
                                                    }

                            if ($row[0] < $web['resetlevel']){ $error=1;
                                         show_error("$warning_start $charactername Need Level $web[resetlevel] To Reset! $warning_end");
                                                                   }

                            if ($row[1] > $web['resetslimit']){ $error=1;
                                         show_error("$warning_start Resets limit is set to $web[resetslimit]! $warning_end");
                                                                    }


                            if($error!=1){

                                    if(($web['resetmode']=='keep') AND ($web['levelupmode']=='normal')){
                                         $sql_reset_script="Update character set [clevel]='1',[experience]='0',[money]='$resetmoeny',[LevelUpPoint]='$resetpt',[resets]='$resetup' where name=?";}
                                    elseif(($web['resetmode']=='reset') AND ($web['levelupmode']=='extra')){
                                         $sql_reset_script="Update character set [strength]='25',[dexterity]='25',[vitality]='25',[energy]='25',[clevel]='1',[experience]='0',[money]='$resetmoeny',[LevelUpPoint]='$resetpt1',[resets]='$resetup' where name=?";}
                                    elseif(($web['resetmode']=='keep') AND ($web['levelupmode']=='extra')){
                                         $sql_reset_script="Update character set [clevel]='1',[experience]='0',[money]='$resetmoeny',[LevelUpPoint]='$resetpt1',[resets]='$resetup' where name=?";}
                                    elseif(($web['resetmode']=='reset') AND ($web['levelupmode']=='normal')){
                                         $sql_reset_script="Update character set [strength]='25',[dexterity]='25',[vitality]='25',[energy]='25',[clevel]='1',[experience]='0',[money]='$resetmoeny',[LevelUpPoint]='$resetpt',[resets]='$resetup' where name=?";}
                                    if($web['clean_inventory']=='yes' && $web['clean_skills']=='yes'){
                                         $sql_reset_script2="UPDATE character Set [inventory]=CONVERT(varbinary(1080), null),[magiclist]= CONVERT(varbinary(180), null) Where name=?";}
                                    elseif($web['clean_inventory']=='no' && $web['clean_skills']=='no'){
                                         $sql_reset_script2="Select name from character where name=?";}
                                    elseif($web['clean_inventory']=='yes' && $web['clean_skills']=='no'){
                                         $sql_reset_script2="UPDATE character Set [inventory]=CONVERT(varbinary(1080), null) Where name=?";}
                                    elseif($web['clean_inventory']=='no' && $web['clean_skills']=='yes'){
                                         $sql_reset_script2="UPDATE character Set [magiclist]= CONVERT(varbinary(180), null) Where name=?";}


                                    $sql_reset_exec = $db->Execute($sql_reset_script,array($charactername));
                                    $sql_reset_exec2 = $db->Execute($sql_reset_script2,array($charactername));

                                    show_error("$ok_start $charactername SuccessFully Reseted! $ok_end");

                                                    $logfile = 'logs/resets_logs.php';
                                                    $ip = $_SERVER['REMOTE_ADDR'];
                                                    $date = date('Y-m-d H:i');
                                                    $data = "Character $_POST[reset_character] Has Been <font color=#FF0000>Reseted</font>, Before Reset:$row[1](resets), After Reset:$resetup(resets), All Those On $date By ip:$ip \n";
                                                    $fp = fopen($logfile, 'a');
                                                    fputs($fp, $data);
                                                    fclose($fp);
                               }



                      }








}





function add_stats($name)
{
        if ((isset($_SESSION['pass'])) && (isset($_SESSION['user'])));
             {
                 require("config.php");
                 require("includes/validate.class.php");
                 $login = stripslashes($_SESSION['user']);
                 $vitality = stripslashes($_POST['vitality']);
                 $strength = stripslashes($_POST['strength']);
                 $energy = stripslashes($_POST['energy']);
                 $dexterity = stripslashes($_POST['agility']);

                 $sql_online_check = $db->Execute("SELECT ConnectStat FROM MEMB_STAT WHERE memb___id=?",array($login));
                 $row2 = $sql_online_check->fetchrow();

                 $result = $db->Execute("select Vitality,Strength,Energy,Dexterity,LevelUpPoint from Character WHERE Name=?",array($name));
                 $row = $result->fetchrow();

                 $result2 = $db->Execute("select LevelUpPoint from Character WHERE Name=?",array($name));
                 $points = $result2->fetchrow();

                 $new_vit = $row[0] + $vitality;
                 $new_str = $row[1] + $strength;
                 $new_eng = $row[2] + $energy;
                 $new_agi = $row[3] + $dexterity;
                 $row[4] = $row[4] - $vitality - $strength - $energy - $dexterity;


                 $elems[] = array('name'=>'vitality', 'label'=>''.$warning_start.' Vitality: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');
                 $elems[] = array('name'=>'energy', 'label'=>''.$warning_start.' Energy: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text', 'val_min'=> 0,  'val_max'=>32600, 'cont' =>'digit');
                 $elems[] = array('name'=>'agility', 'label'=>''.$warning_start.' Agility: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');
                 $elems[] = array('name'=>'strength', 'label'=>''.$warning_start.' Strength: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');

                 $f = new FormValidator($elems);
	             $err = $f->validate($_POST);

	                if ( $err === true ) {

	                	$valid = $f->getValidElems();

		                    foreach ( $valid as $k => $v ) {

			               if ( $valid[$k][0][1] == false ) {

				             if ( empty($valid[$k][0][2]) ) {

				                  show_error($valid[$k][0][2]);
						}else {
			                          show_error($valid[$k][0][2]);
				            }
			             }
		             }

                               } else {

                        if ($row2[0] != 0){$error = 1;
                                 show_error("$warning_start Character $name Is Online, Must Be Logged Off! $warning_end");
                        }

                        if ($row[4] < 0){$error = 1;
                                 show_error("$warning_start $name Don't Have Enough Points (Currently: $points[0])! $warning_end");
                        }



                         if($error!=1){
                                       $add_stats= $db->Execute("UPDATE Character SET [Vitality]='$new_vit',[Strength]='$new_str',[Energy]='$new_eng',[Dexterity]='$new_agi',[LevelUpPoint]='$row[4]' WHERE Name =?",array($name));
                                       show_error("$ok_start Stats SuccessFully Added!<br>Points Left To Add: $row[4]  $ok_end");


                                           $logfile = 'logs/stats_logs.php';
                                           $ip = $_SERVER['REMOTE_ADDR'];
                                           $date = date('Y-m-d H:i');
                                           $data = "Character $_POST[character] Has Been <font color=#FF0000>Updated</font> Stats with the next ->Strength:$new_str|Agiltiy:$new_agi|Vitality:$new_vit|Energy:$new_eng,Levelup Points Left:$row[4] All Those On $date By ip:$ip \n";

                                           $fp = fopen($logfile, 'a');
                                           fputs($fp, $data);
                                           fclose($fp);
                         }

                 }

         }

}






function add_stats_dl($name)
{
        if ((isset($_SESSION['pass'])) && (isset($_SESSION['user'])));
             {
                 require("config.php");
                 require("includes/validate.class.php");
                 $login = stripslashes($_SESSION['user']);
                 $vitality = stripslashes($_POST['vitality']);
                 $strength = stripslashes($_POST['strength']);
                 $energy = stripslashes($_POST['energy']);
                 $dexterity = stripslashes($_POST['agility']);
                 $command = stripslashes($_POST['command']);

                 $sql_online_check = $db->Execute("SELECT ConnectStat FROM MEMB_STAT WHERE memb___id=?",array($login));
                 $row2 = $sql_online_check->fetchrow();

                 $result = $db->Execute("select vitality,strength,energy,dexterity,levelupPoint,leadership from Character WHERE Name=?",array($name));
                 $row = $result->fetchrow();

                 $result2 = $db->Execute("select LevelUpPoint from Character WHERE Name=?",array($name));
                 $points = $result2->fetchrow();

                 $new_vit = $row[0] + $vitality;
                 $new_str = $row[1] + $strength;
                 $new_eng = $row[2] + $energy;
                 $new_agi = $row[3] + $dexterity;
                 $new_command = $row[5] + $command;
                 $row[4] = $row[4] - $vitality - $strength - $energy - $dexterity - $command;



                 $elems[] = array('name'=>'vitality', 'label'=>''.$warning_start.' Vitality: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');
                 $elems[] = array('name'=>'energy', 'label'=>''.$warning_start.' Energy: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text', 'val_min'=> 0,  'val_max'=>32600, 'cont' =>'digit');
                 $elems[] = array('name'=>'agility', 'label'=>''.$warning_start.' Agility: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');
                 $elems[] = array('name'=>'strength', 'label'=>''.$warning_start.' Strength: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');
                 $elems[] = array('name'=>'command', 'label'=>''.$warning_start.' Command: Digits Only Please dont go over 32500 '.$warning_end.'', 'type'=>'text',  'val_min'=> 0,  'val_max'=>32500, 'cont' =>'digit');

                 $f = new FormValidator($elems);
	             $err = $f->validate($_POST);

	                if ( $err === true ) {

	                	$valid = $f->getValidElems();

		                    foreach ( $valid as $k => $v ) {

			               if ( $valid[$k][0][1] == false ) {

				             if ( empty($valid[$k][0][2]) ) {

				                  show_error($valid[$k][0][2]);
						}else {
			                          show_error($valid[$k][0][2]);
				            }
			             }
		             }

                               } else {




                        if ($row2[0] != 0){$error = 1;
                                 show_error("$warning_start Character $name Is Online, Must Be Logged Off! $warning_end");
                        }


                        if ($row[4] < 0){$error = 1;
                                 show_error("$warning_start $name Don't Have Enough Points (Currently: $points[0])! $warning_end");
                        }



                        if($error!=1){
                                       $add_stats= $db->Execute("UPDATE Character SET [Vitality]='$new_vit',[Strength]='$new_str',[Energy]='$new_eng',[Dexterity]='$new_agi',[leadership]='$new_command',[LevelUpPoint]='$row[4]' WHERE Name =?",array($name));
                                       show_error("$ok_start Stats SuccessFully Added!<br>Points Left To Add: $row[4]  $ok_end");


                                           $logfile = 'logs/stats_logs.php';
                                           $ip = $_SERVER['REMOTE_ADDR'];
                                           $date = date('Y-m-d H:i');
                                           $data = "Character $_POST[character] Has Been <font color=#FF0000>Updated</font> Stats with the next ->Strength:$new_str|Agiltiy:$new_agi|Vitality:$new_vit|Energy:$new_eng|Command:$new_command,Levelup Points Left:$row[4] All Those On $date By ip:$ip \n";

                                           $fp = fopen($logfile, 'a');
                                           fputs($fp, $data);
                                           fclose($fp);
                      }

               }

       }

}











function clear_pk($name)
{
       if ((isset($_SESSION['pass'])) && (isset($_SESSION['user'])));

            {
                 require("config.php");
                 $name = stripslashes($_POST['clearpk_character']);
                 $loginid = stripslashes($_SESSION['user']);

                 $online_check = $db->Execute("SELECT ConnectStat FROM MEMB_STAT WHERE memb___id=?",array($loginid));
                 $row2 = $online_check->fetchrow();

                 $sql_PkLevel_check = $db->Execute("SELECT PkLevel FROM Character WHERE PkLevel > 3 and Name=?",array($name));
                 $sql_PkCount_check = $db->Execute("SELECT PkCount FROM Character WHERE PkLevel > 3 and Name=?",array($name));
                 $PkLevel_check = $sql_PkLevel_check->numrows();
                 $total_PkCount = $sql_PkCount_check->fetchrow();
                 $total_PkLevel = $sql_PkLevel_check->fetchrow();

                 $sql_money1_check = $db->Execute("SELECT Money FROM Character WHERE Name=?",array($name));
                 $total_money = $sql_money1_check->fetchrow();

                 $money1_check = $total_money[0] - ($web['pkmoney']);

                         if (empty($name) || empty($loginid)){$error = 1;
                                show_error("$warning_start Some Fields Were Left Blank! $warning_end");
                         }


                         if ($row2[0] != 0){$error = 1;
                                   show_error("$warning_start Character $name Is Online, Must Be Logged Off! $warning_end");
                         }

                         if ($PkLevel_check <= 0){$error = 1;
                                   show_error("$warning_start Character $name Is Not a Killer, 2nd Level Killer Or a Phono! $warning_end");
                         }

                         if ($money1_check < 0){$error = 1;
                                   show_error("$warning_start Character $name Need $web[pkmoney] Zen To Clear Pk! $warning_end");
                         }


                         if($error!=1){
                                           $clear_pk= $db->Execute("UPDATE Character SET [PkLevel]='3',[PkTime]='0',[Money]='$money1_check' where  Name=?",array($name));
                                           show_error("$ok_start $name Has Been SuccessFully Cleared! $ok_end");


                                           $logfile = 'logs/clearpk_logs.php';
                                           $ip = $_SERVER['REMOTE_ADDR'];
                                           $date = date('Y-m-d H:i');
                                           $data = "Character $_POST[clearpk_character] Has Been <font color=#FF0000>Cleaned</font> His Pk Status On $date By ip:$ip \n";

                                           $fp = fopen($logfile, 'a');
                                           fputs($fp, $data);
                                           fclose($fp);
                          }

             }


}







function changepassword()
{
     if ((isset($_SESSION['pass'])) && (isset($_SESSION['user'])));
           {

               require("config.php");
               require("includes/validate.class.php");
	       $_POST['oldpassword'] = substr(md5($_POST['oldpassword']),0,19);
               $login = stripslashes($_SESSION['user']);
               $oldpwd = stripslashes($_POST['oldpassword']);
               $newpwd = stripslashes($_POST['newpassword']);
               $renewpwd = stripslashes($_POST['renewpassword']);

               $online_check = $db->Execute("SELECT UserAvailable FROM userinfo WHERE username=?",array($login));
               $row2 = $online_check->fetchrow();

                  if($web['md5']==1){
                        $sql_pw_check = $db->Execute("SELECT * FROM userinfo WHERE  Username=? AND   Userpass = ?",array($login,$oldpwd));
                                      }
                  elseif($web['md5']==0){
                        $sql_pw_check = $db->Execute("SELECT * FROM userinfo WHERE  Username=? AND   Userpass=?",array($login,$oldpwd));
                                          }

                  $pw_check = $sql_pw_check->numrows();


	          $elems[] = array('name'=>'oldpassword', 'label'=>''.$warning_start.' Curent Password Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>32, 'cont' =>'alpha');
	          $elems[] = array('name'=>'newpassword', 'label'=>''.$warning_start. 'New Password Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>14, 'cont' =>'alpha');
	          $elems[] = array('name'=>'renewpassword', 'label'=>''.$warning_start.' Passwords Did not Match '.$warning_end.'','type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>14, 'cont' =>'alpha','equal'=> array('newpassword'));


                  $f = new FormValidator($elems);
	             $err = $f->validate($_POST);

	                if ( $err === true ) {

	                	$valid = $f->getValidElems();

		                    foreach ( $valid as $k => $v ) {

			               if ( $valid[$k][0][1] == false ) {

				             if ( empty($valid[$k][0][2]) ) {

				                  show_error($valid[$k][0][2]);
						}else {
			                          show_error($valid[$k][0][2]);
				            }
			             }
		             }

                               } else {


                  if ($row2[0] != 1){$error = 1;
                           show_error("$warning_start Account Is Online, Must Be Logged Off! $warning_end");
                  }

                  if ($oldpwd==$newpwd){$error = 1;
                           show_error("$warning_start The Current Password And The New One Are The Same! $warning_end");
                  }

                  if ($pw_check <= 0){$error = 1;
                           show_error("$warning_start Current Password Is Incorrect! $warning_end");
                  }


                  if($error!=1){
				 $newpwd = strtoupper(substr(md5($newpwd),0,19));
               			 $login = stripslashes($_SESSION['user']);
                                 mssql_query ("UPDATE userinfo SET userpass='$newpwd' WHERE username ='$login'");


                                           $_SESSION['pass'] = $newpwd;
                                               show_error("$ok_start Password SuccessFully Changed! $ok_end");
                  }

            }

      }

}








function lostpassword()
{
              require("config.php");
              require("includes/validate.class.php");
              $login = stripslashes($_POST['username']);
              $squestion = stripslashes($_POST['squestion']);
              $sanswer = stripslashes($_POST['sanswer']);
              $email = stripslashes($_POST['email']);


              $username_check = $db->Execute("SELECT memb___id FROM  WHERE memb___id=?",array($login));
              $username_check_ = $username_check->numrows();


              $sql_mail_check = $db->Execute("SELECT mail_addr FROM  WHERE mail_addr=? and memb___id=?",array($email,$login));
              $sql_pw_check = $db->Execute("SELECT memb__pwd2,fpas_ques FROM  WHERE fpas_ques=? and memb___id=? and fpas_answ=?",array($squestion,$login,$sanswer));

                    if($web['md5'] == 1){
                         $sql_pw_get = $db->Execute("SELECT memb__pwd2,fpas_ques FROM  WHERE memb___id=?",array($login));
                                          }
                    elseif($web['md5'] == 0){
                         $sql_pw_get = $db->Execute("SELECT memb__pwd,fpas_ques FROM  WHERE memb___id=?",array($login));
                                              }
                    $pw_check = $sql_pw_check->numrows();
                    $pw_retrieval = $sql_pw_get->fetchrow();
                    $mail_check = $sql_mail_check->numrows();


	          $elems[] = array('name'=>'username', 'label'=>''.$warning_start.' Username Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha');
	          $elems[] = array('name'=>'squestion', 'label'=>''.$warning_start. 'Secret Question Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha');
	          $elems[] = array('name'=>'sanswer', 'label'=>''.$warning_start. 'Secret Answer Is Invalid (4-10 Alpha-Numeric Characters) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>10, 'cont' =>'alpha');
	          $elems[] = array('name'=>'email', 'label'=>''.$warning_start.' Email Is Invalid (ex. sombody@yahoo.com MAX: 50) '.$warning_end.'', 'type'=>'text', 'required'=>true, 'len_max'=>50, 'cont' => 'email');


                  $f = new FormValidator($elems);
	             $err = $f->validate($_POST);

	                if ( $err === true ) {

	                	$valid = $f->getValidElems();

		                    foreach ( $valid as $k => $v ) {

			               if ( $valid[$k][0][1] == false ) {

				             if ( empty($valid[$k][0][2]) ) {

				                  show_error($valid[$k][0][2]);
						}else {
			                          show_error($valid[$k][0][2]);
				            }
			             }
		             }

                               } else {



                        if ($username_check <= 0){$error = 1;
                                      show_error("$warning_start Username $login Doesn't Exist! $warning_end");
	                }

                        if ($pw_check <= 0){$error = 1;
                                      show_error("$warning_start Secret Question Or Answer Is Incorrect! $warning_end");
	                }

                        if ($mail_check <= 0){$error = 1;
                                      show_error("$warning_start The E-Mail Address You Entered Is Incorect! $warning_end");
                        }

                        if($error!=1){
	                                show_error("$ok_start Your Password Is $pw_retrieval[0] , Change It As Fast As You Can!!! $ok_end");
	                }
}







}




function profile($account)
{

   require("config.php");
   $age = stripslashes($_POST['age']);
   $country = stripslashes($_POST['country']);
   $avatar = stripslashes($_POST['avatar']);
   $gender = stripslashes($_POST['gender']);
   $hide_profile = stripslashes($_POST['hide_profile']);
   $y = stripslashes($_POST['y']);
   $msn = stripslashes($_POST['msn']);
   $aim = stripslashes($_POST['aim']);
   $icq = stripslashes($_POST['icq']);
   $skype = stripslashes($_POST['skype']);

   $update_profile_sql=$db->Execute("Update  set [country]=?,[gender]=?,[age]=?,[avatar]=?,[hide_profile]=?,[y]=?,[msn]=?,[aim]=?,[icq]=?,[skype]=? where memb___id=?",array($country,$gender,$age,$avatar,$hide_profile,$y,$msn,$aim,$icq,$skype,$account));
   show_error("$ok_start Profile SuccessFully Edited! $ok_end");

}



function warp($name)
{
        require("config.php");

        $name = stripslashes($_POST['character_warp']);
        $map = stripslashes($_POST['map']);

        if($map == '0'){$x="125"; $y="125";}
               elseif($map == '3'){$x="175"; $y="112";}
                          elseif($map == '2'){$x="211"; $y="40";}
                                     elseif($map == '1'){$x="232"; $y="126";}
                                                elseif($map == '7'){$x="24"; $y="19";}
                                                           elseif($map == '4'){$x="209"; $y="71";}
                                                                      elseif($map == '8'){$x="187"; $y="58";}
                                                           elseif($map == '6'){$x="64"; $y="116";}
                                                elseif($map == '10'){$x="15"; $y="13";}
                                     elseif($map == '30'){$x="93"; $y="37";}
                          elseif($map == '33'){$x="82"; $y="8";}
               elseif($map == '34'){$x="120"; $y="8";}


                    $select_zen_sql=$db->Execute("Select money from character where name=?",array($name));
                    $select_zen=$select_zen_sql->fetchrow();
                    $warp_zen=$select_zen[0]-($web['warp_zen']);

                         if(empty($name)){
                             show_error("$warning_start Some Fields Where Left Blank! $warning_end");}
                                   elseif($warp_zen < 0 ){
                                           show_error("$warning_start $name Need $web[warp_zen] Zen To Warp! $warning_end"); }

                    else
                          {
                              $warp=$db->Execute("Update character set [mapnumber]=?,[mapposx]='$x',[mapposy]='$y',[money]='$warp_zen' where name=?",array($map,$name));
                                                   show_error("$ok_start $name SuccessFully Warped! $ok_end");
                          }

}







function upload_screen()
{
               require("config.php");
               $by=stripslashes($_POST['by_character']);
               $title=stripslashes($_POST['image_title']);

               $target_path = "modules/user_gallery/";
               $MAX_SIZE = 2000000;
               $FILE_MIMES = array('image/jpeg','image/jpg');
               $FILE_EXTS = array('.jpg');

               $target_path = $target_path . basename( $_FILES['userfile']['name']);
               $_FILES['userfile']['tmp_name'];


               $target_path = "modules/user_gallery/";
               $file_name = $_FILES['userfile']['name'];
               $filenamecheck = "modules/user_gallery/$file_name";

               $file_type = $_FILES['userfile']['type'];
               $file_name = $_FILES['userfile']['name'];

               $file_name= str_replace("'","",$file_name);
               $file_name= str_replace(";","",$file_name);

               $target_path = $target_path . basename( $_FILES['userfile']['name']);

                   if(empty($by) || empty($title) || empty($file_name)){
                       show_error("$warning_start Some Fields Where Left Blank! $warning_end");}

                         elseif (!in_array($file_type, $FILE_MIMES) && !in_array($file_ext, $FILE_EXTS)){
                                 show_error("$warning_start Only .jpg files are allowed! $warning_end");}

                             elseif(file_exists($filenamecheck)){
                                    show_error("$warning_start Image $file_name is already uploaded, please change file name! $warning_end");}

                                 elseif ( $_FILES['userfile']['size'] > $MAX_SIZE){
                                         show_error("$warning_start Image $file_name has more then 2MB! $warning_end");}

                else{
                       $logfile="modules/user_gallery/$file_name.php";
                       $ip = $_SERVER['REMOTE_ADDR'];
                       $date = date('Y-m-d H:i');
                       $data = "<?\n\$by=\"$_POST[by_character]\";\n\$title=\"$_POST[image_title]\";\n ?>";

                       $fp = fopen($logfile, 'w');
                       fputs($fp, $data);
                       fclose($fp);

                          if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
                              show_error("$ok_start Image $file_name SuccessFully Uploaded! $ok_end");}
                    }



}



}

?>
