<?php
//
securitycheck($securitycheck);
function getSt ($int) {
    if ($int == 0) { $char = "PENDING"; }
    if ($int == 1) { $char = "CLOSED"; }
return $char;
}
function getSev ($int) {
    if ($int == 1) { $char = "LOW"; }
    if ($int == 2) { $char = "MEDIUM"; }
    if ($int == 3) { $char = "HIGH"; }
return $char;
}

echopage('header', 'Action');

echo '<center>';

if($_POST['show']=='view') { 
$error=2;


}
if($_POST['show']=='reply') { 
$error=3;


}


if($_POST['lostpassword']=='email') {

$Ticket = $_POST['ticketnum'];
$Message = $_POST['problem'];
mssql_query(sprintf(TICKET_REPLY, $Message, $Ticket));
mssql_query(sprintf(TICKET_CLOSE, $Ticket));

echo "<div align=center><font color=black size=2><b>You have replied to ticket# <strong>$Ticket</strong>!<br>
	This Case has been closed and responses will be shown on who ever file the ticket.";

}

if($error==2) {
$db = connectdb($CONFIG['dbdbname'], $CONFIG['dbaddress'], $CONFIG['dbuser'], $CONFIG['dbpass']);

$Ticket = $_POST['ticketnum'];

$resTop = mssql_query(sprintf(VIEW_TICKET, $Ticket));
while($result = mssql_fetch_array( $resTop )) {
			

			$Ticket = $result["TicketNum"];
			$Subject = $result["Subject"];
			$Date = $result["Date"];
			$Status = $result["CaseStatus"];
			$Problem = $result["Problem"];
			$UName = $result["UserName"];
			$Severity = $result["Severity"];
			if($Status == 0) {
				$Status = getSt($Status);
			}
			if($Status == 1) {
				$Status = getSt($Status);
			}
			if($Severity == 1) {
				$Severity = getSev($Severity);
			}
			if($Severity == 2) {
				$Severity = getSev($Severity);
			}

			if($Severity == 3) {
				$Severity = getSev($Severity);
			}

echo"
<div align=center><font color=black size=2><b>Ticket # <strong>$Ticket</strong>!
<form name='show' action='index.php?page=showticket' method='post' onsubmit='return checkform()' autocomplete='off'>
				<input type=hidden name=show value='reply'>
				<input type=hidden name=ticketnum value=$Ticket>
				<input type=submit name=submit value='Reply'>
</form>
<table CELLSPACING=2 BORDER=0 CELLPADDING=1 align=CENTER>
			<tr>
		<td width=150 align=right>
			<font color=black size=2><b>Subject :</font>&nbsp;&nbsp;
		</td>
		<td>
			<div align=left>
				<font color=black size=2>$Subject</font>
			</div>
		</td>
	</tr>
<tr>
		<td width=150 align=right>
			<font color=black size=2><b>Name :</font>&nbsp;&nbsp;
		</td>
		<td>
			<div align=left>
				<font color=black size=2>$UName</font>
			</div>
		</td>
	</tr>
<tr>
		<td width=150 align=right>
			<font color=black size=2><b>Severity :</font>&nbsp;&nbsp;
		</td>
		<td>
			<div align=left>
				<font color=black size=2>$Severity</font>
			</div>
		</td>
	</tr>
<tr>
		<td width=150 align=right>
			<font color=black size=2><b>Problem Description :</font>&nbsp;&nbsp;
		</td>
		<td>
			<div align=left>
				<font color=black size=2>$Problem</font>
			</div>
		</td>
	</tr>
	</table>";

	}
}


if($error==3) {
$db = connectdb($CONFIG['dbdbname'], $CONFIG['dbaddress'], $CONFIG['dbuser'], $CONFIG['dbpass']);

$Ticket = $_POST['ticketnum'];
echo "
<div align=center><font color=black size=2><b>Ticket # <strong> $Ticket</strong>!
<form name='lostpassword' action='index.php?page=showticket' method='post' onsubmit='return checkform2()' autocomplete='off'>
	<table CELLSPACING=0 BORDER=0 CELLPADDING=0 align=CENTER>
	<tr>
		<td width=150 align=right>
			<font color=black size=2>Message :&nbsp;&nbsp;
		</td>
		<td>
			<div align=right>
				<textarea name=problem rows=8 cols=40></textarea>
			</div>
		</td>
	</tr>
	</table>
	<div align=center>
		<BR>
		<input type=hidden name=lostpassword value='email'>
		<input type=hidden name=ticketnum value='{$Ticket}'>
		<input type=submit name=Login value='   Reply   '>
	</div>
</form>
";
}

echo '</center>';

echopage('footer', '');

?>
