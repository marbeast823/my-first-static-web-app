<?
echo '<table align=center>
<tr><td><div style="width:632px; margin:0 0 0 0px; padding:5px; border:1px solid #484848; background:#272727; color:#a3a3a3; text-align:center; line-height:18px">
    Account Information Overview.<br><br>

    Note: Please keep the important information of your account.<br>
    </div></table><br>';

function date_formats($stime, $etime, $format='short') {
		if (is_numeric($stime)) {
		$diff = $etime - $stime;
		} else {
		$diff = $etime - strtotime($stime);
		}
	
		$time = '';
		$seconds = 0;
		$hours   = 0;
		 $minutes = 0;

		 if($diff % 86400 <= 0)  //there are 86,400 seconds in a day
		    {
			$days = $diff / 86400;
			}

		 if($diff % 86400 > 0)   {   
			   $rest = ($diff % 86400);
		       $days = ($diff - $rest) / 86400;
			  
		       if( $rest % 3600 > 0 )
		       {   $rest1 = ($rest % 3600);
		           $hours = ($rest - $rest1) / 3600;
				  
		           if( $rest1 % 60 > 0 )
		           {   $rest2 = ($rest1 % 60);
		               $minutes = ($rest1 - $rest2) / 60;
		               $seconds = $rest2;
		           }else {
		               $minutes = $rest1 / 60;
					}
		       } else {
		           $hours = $rest / 3600; 
			   }
		}
	
		
		$times = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .'h ' :'' ). $minutes .'m '.$seconds.'s';
		if ($format =='long') 	$times = (($days > 0) ? $days .' Days ' : '' ). (($hours > 0 && $hours != 12) ? $hours .' Hours ' :'' ). $minutes .' Minutes ';//.$seconds.' seconds';
		return $times;
	}

function accountinfo($account){
   require("config.php");
   $test = "Select Usernum,Username,UserBlock,UserEmail,CreateDate,LastLoginDate,UserPoint from gsuserinfo where username = '".$account."'";
   $accountinfo = sqlsrv_query($connect_mssql,$test);
   $accountinfo = sqlsrv_fetch_array($accountinfo,SQLSRV_FETCH_ASSOC);

   $test2 = "select UserLoginState,UserAvailable from gsuserinfo where username = '".$account."'";
   $timeinfo = sqlsrv_query($connect_mssql,$test2);
   $timeinfo = sqlsrv_fetch_array($timeinfo,SQLSRV_FETCH_ASSOC);
 
   if($accountinfo[1] == 'male'){$accountinfo[1] = 'Male <img src="images/male.gif">'; }
      elseif($accountinfo[1] == 'female'){$accountinfo[1] = 'Female <img src="images/female.gif">'; }


$content='
            <form name="upload" id="upload" ENCTYPE="multipart/form-data" method="post">
                    <tr>
                      <td colspan="2" align="left">

 <table border="0" cellpadding="0" cellspacing="0">

                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left:15px">
							
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr align="left">
                                  <td width="130px" height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Username:</td>

                                  <td class="member"><font color=orange><b>'.$accountinfo[1].'</font></td>
                                </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Password:</td>
                                  <td>**Hide**</td>
                                </tr>
                                <tr align="left">

                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Confirm Password: </td>
                                 <td>**Hide**</td>
                                </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Pincode: </td>
                                 <td>**Hide**</td>

                                </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Email Address:</td>
                                  <td><font color=orange>'.$accountinfo[3].'</td>
                                </tr>

                                </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> User Point:</td>
                                  <td><font color=red>'.$accountinfo[7].'</font></td>
                                </tr>

                                </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Member Since:</td>
                                  <td><font color=white>'.$accountinfo[4].'</font></td>
                                </tr>
	                 </tr>
                                <tr align="left">
                                  <td height="25px" class="member"><img src="../images/member/yel_icon.gif" align="absmiddle"> Last Login:</td>
                                  <td><font color=white>'.$accountinfo[5].'</font></td>
                                      </tr>
                              </table>
						
';

if($timeinfo[1] >= '1'){
$content.='';}
elseif($timeinfo[1] == '0'){
$content.='
    <tr>
      <td align="right"><font size=2><b>Login Status : &nbsp;</td>
      <td align="left"><font size=2 color=red>Offline ['.date_formats($timeinfo[0],time()).']</font></td>
    </tr>
    <tr>
      <td align="right"><font size=2><b>Time Spent On Server : &nbsp;</td>
      <td align="left"><font size=2 color=red>'.$timeinfo[1].'</font></td>
    </tr>';}
else{
$content.='
    <tr>
      <td align="right"><font size=2><b>Login Status : &nbsp;</td>
      <td align="left"><font size=2><b>Not Joined</td>
    </tr>
    <tr>
      <td align="right"><font size=2><b>Time Spent On Server : &nbsp;</td>
      <td align="left"><font size=2><b>Not Joined</td>
    </tr>';}

$content.='</table></form>';


show_error("$content");

}

?>
