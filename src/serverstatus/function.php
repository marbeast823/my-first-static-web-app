<?php
// 
function checkcookie($where, $cookieuser, $cookiepass, $dbname, $sqladdress, $sqluser, $sqlpass) {
	connectdb($dbname,$sqladdress, $sqluser, $sqlpass);
	if($where==0) {
		$result = mssql_query(sprintf(SELECT_USER_PASS, $cookieuser));
		$rows=mssql_num_rows($result);
		if ($rows>0) {
			$rows=mssql_fetch_assoc($result); 
			extract($rows);
			$password = ($UserPass);
			if ($password == $cookiepass) {
				quickrefresh('home.php');
			} else {
				resetcookies();
			}
		} else {
		resetcookies();
		}
	} elseif($where==1) {
		$result = mssql_query(sprintf(SELECT_USER_PASS, $cookieuser));
		$rows=mssql_num_rows($result);
		if ($rows>0) {
			$rows=mssql_fetch_assoc($result); 
			extract($rows);
			$password = ($UserPass);
			if($password != $cookiepass) {
				notloggedin();
			}
		} else {
			notloggedin();
		}
	}
}

function connectdb($db, $dbaddress, $dbuser, $dbpass) {
	$dbconnect = mssql_connect ($dbaddress, $dbuser, $dbpass); 
	mssql_select_db ($db, $dbconnect) or die (mysql_error());
}

function getmicrotime() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function delayedrefresh($page) {
	echo "<meta http-equiv='refresh' content='3; URL={$page}'>";
}

function echoindex($part) {
	if($part=='credits') {
	echo '
	<tr valign="top">
		<td width="20%" align="center">
			<table width="762" border="0" cellpadding="0">
    				<tr> 
					</td>
				</tr>
				<tr>
					<div style="margin:10px;"align="center">
					<td vAlign=top align=center background="img/copyrigh.jpg" height=83>
				</br>
					<font color="green"face="Papyrus"size="1"><b>_</div>
					<CENTER><font color="black" face="Papyrus" size="2">Copyright @ 2012 By Demi Ran Online.<br>
					<font color="black"face="Papyrus"size="2"><b>MMORPG EP4 RAN-ONLINE 2009-2010<br>
 				</TD></TR></TBODY></TABLE></TD></TR></TABLE>
					<CENTER><font color="cyan" face="Papyrus" size="2">Ragezone Developer<br>
					<CENTER><font color="orange" face="Papyrus" size="2">Demi Ran Online: [ADMIN] Amphion<br>
					</td>
    				</tr>
    				<tr> 
					</td>
    				</tr>
   			</table>
		</td>
	</tr>
	';
	} elseif($part=='end') {
	echo '
	</table>
	</body>
	';
	} elseif($part=='head') {
	echo '
	<table width="762" align="center" border="0" cellpadding="1">
	<tr vAlign=top>
            <tr>
		<td height="96">
			<center>
                          			<img src="img/title.gif" border="0">
			</center>
		</td>
	</tr>
	';
	} elseif($part=='space') {
	echo '
	<tr>
		<td class="normal">
			&nbsp;
		</td>
	</tr>
	';
	} elseif($part=='title') {
	echo "
	<title>
		ShadowRAN ONLINE
	</title>
	<link href='img/styles.css'rel='stylesheet' type='text/css'>
	<body bgcolor='#787878' background='img/bg.gif' topmargin='2' leftmargin='2' rightmargin='2'>
	<
	";
	}
}

function echopage($part, $title) {
	if($part=='footer') {
	echo "
					</div>
     					</td>
    				</tr>
    				<tr> 
     					<td background='img/footer.jpg' height='15'>
					</td>
    				</tr>
   			</table>
		</td>
	</tr>
	";
	} elseif($part=='header') {
	echo "
	<tr valign='top'>
	<td width='100%' align='center'>
		<table width='762' border='0' cellpadding='0'>
    			<tr> 
     				<td width='800' height='15' background='img/header.jpg' class='header'>
					<center>
						<font color='orange' font='3'><b> {$title} 
					</center>
				</td>
			</tr>
				<td background='img/mid.jpg' height='200' align='center'>
	";
	}
}

function nocache() {
	echo '
	<META HTTP-EQUIV="Pragma" CONTENT="No-Cache">
	<META HTTP-EQUIV="Cache-Control" CONTENT="No-Cache,Must-Revalidate,No-Store">
	<META HTTP-EQUIV="Expires" CONTENT="-1">
	<META HTTP-EQUIV="ImageToolbar" CONTENT="No">
	<META NAME="MSSmartTagsPreventParsing" CONTENT="True">
	';
}

function notloggedin() {
	resetcookies();
	echo '
		<script language="JavaScript">
		alert("Please Login Your Account.");
		</script>
	';
	quickrefresh('index.php');
}

function quickrefresh($page) {
	echo "<meta http-equiv='refresh' content='0; URL={$page}'>";
	exit();
}

function resetcookies() {
	setcookie ("user", "", time()-60000);
	setcookie ("pass", "", time()-60000);
}

function securitycheck($securitycheck) {
	if($securitycheck!=1) {
		quickrefresh('index.php');
		exit();
	}
}

function sendemail($emailsmtp, $emailuser, $emailpass, $selfemail, $servername, $subject, $email, $username, $password, $ssn, $success) {
	require("phpmailer/class.phpmailer.php");

	$mail = new PHPMailer();

	$mail->IsSMTP();
	$mail->Host     = $emailsmtp;
	$mail->SMTPAuth = true;
	$mail->Username = $emailuser;
	$mail->Password = $emailpass;

	$mail->From     = $selfemail;
	$mail->FromName = $servername;
	$mail->AddAddress($email,$username); 

	$mail->Subject  =  $servername . " " . $subject;
	$mail->Body     =  "Your account information has been listed below...

Username: {$username}
Password: {$password}
SSN: {$ssn}

-----------------------------------------------------------------------------
{$servername} Admin";

	if(!$mail->Send()) {
		echo "Email has not been sent due to an error.<br>";
		echo "<br><br>";
	} else {
		echo $success . "<br><br>";
	}

}

function execute_query($input_query, $page_source = 'none.php', $limit = 0, $offset = 0, $skip_log = false) {
	global $debug_message, $queries, $link, $CONFIG_log_select, $CONFIG_log_insert,
	$CONFIG_log_update, $CONFIG_log_delete, $CONFIG_debug, $CONFIG_passphrase,
	$total_execution, $STORED_login;

	$start_time = getmicrotime();
	$analyze_query = strtolower(htmlspecialchars($input_query)); // analyzes the query for illegal inputs
	// disables the use of UNION SELECT
	$banned_combos = array(
	"UNION SELECT" => "union",
	"xp_stored procedure" => "xp_",
	"comment" => "--"
	);
	foreach ($banned_combos as $index => $value) {
		if (strstr($analyze_query, $value) == true) {
			add_exploit_entry("Attempted to inject a $index into a query!");
			redir("index.php", "Invalid query to be executed!");
		}
	}
	$queries++;
	$debug_message .= "\n\t<tr class=mycell>\n\t\t<td><b>$queries</b></td>\n\t\t<td>";
	if (!$skip_log) {
		if (strstr($analyze_query, 'select') !== false && $CONFIG_log_select) {
			$debug_message .= "Logging: ";
			$log_query = true;
		}
		if (strstr($analyze_query, 'insert') !== false && $CONFIG_log_insert) {
			$debug_message .= "Logging: ";
			$log_query = true;
		}
		elseif (strstr($analyze_query, 'update') !== false && $CONFIG_log_update) {
			$debug_message .= "Logging: ";
			$log_query = true;
		}
		elseif (strstr($analyze_query, 'delete') !== false && $CONFIG_log_delete) {
			$debug_message .= "Logging: ";
			$log_query = true;
		}
		else {
			$debug_message .= "Executing: ";
			$log_query = false;
		}
	}
	else {
		$debug_message .= "Executing: ";
		$log_query = false;
	}
	if ($limit == 0 && $offset == 0) {
		$result = $link->Execute($input_query) or die("Query (<b>$input_query</b>) failed: " . $link->ErrorMsg());
	}
	else {
		$result = $link->SelectLimit($input_query, $limit, $offset) or die("Query (<b>$input_query</b>) failed: " . $link->ErrorMsg());
	}

	// Displays each query (SELECT, INSERT, UPDATE, DELETE)
	$debug_message .= "</td>\n\t\t<td>";
	$execute_time = (getmicrotime() - $start_time);
	$total_execution += $execute_time;

	if ($CONFIG_debug) {
		$rows = $result->RowCount();
		$debug_message .= "$page_source</td>\n\t\t<td width=50%>";
		$debug_message .= "$input_query</td>\n\t\t<td>$execute_time</td>\n\t\t</tr>";
	}

	if ($log_query) {
		// replaces each line break with a space
		$input_query = str_replace("\r\n", " ", $input_query);
		add_query_entry($page_source, $input_query);
	}
	return $result;
}

function GetUserCount() {
	$input_query = GET_ONLINE;
	$result = execute_query($input_query, "function.php");
	return $result->fields[0];
}

function determine_class ($ChaClass_index) {
	$class_name = explode("\r\n", file_get_contents("class.def"));
	return $class_name[$ChaClass_index];
}

function determine_school ($ChaSchool_index) {
	$school_name = explode("\r\n", file_get_contents("school.def"));
	return $school_name[$ChaSchool_index];
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}

?>