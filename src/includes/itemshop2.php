<?PHP 
$account_id = stripslashes($_SESSION['user']);
$account_id = clean_var($account_id);
if($account_id == NULL){ quickrefresh('index.php'); Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Access Denied! Login Please!</div></table></div></table></table>"); }

$error=1;
function getD ($int) {
    if ($int == 1) { $char = "1 Hour"; }
    if ($int == 2) { $char = "2 Hour"; }
    if ($int == 3) { $char = "5 Hour"; }
    if ($int == 4) { $char = "10 Hour"; }
    if ($int == 5) { $char = "1 Day"; }
    if ($int == 6) { $char = "3 Days"; }
    if ($int == 7) { $char = "5 Days"; }
    if ($int == 8) { $char = "7 Days"; }
    if ($int == 9) { $char = "10 Days"; }
    if ($int == 10) { $char = "15 Days"; }
    if ($int == 11) { $char = "30 Days"; }
    if ($int == 12) { $char = "60 Days"; }
    if ($int == 13) { $char = "90 Days"; }
    if ($int == 14) { $char = "100 Days"; }
    if ($int == 15) { $char = "120 Days"; }
    if ($int == 16) { $char = "345 Days"; }
    if ($int == 31) { $char = "Permanent"; }
return $char;
}
if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = $_POST['ItemNum'];
	$ItemId = $_POST['ItemID'];
	$ItemOpt = $_POST['ItemOpt'];
	$Duration = $_POST['Duration'];
	$Price = $_POST['Price'];
	$ItemStock = $_POST['ItemStock'];

	$result = mssql_query ("SELECT Username, UserPoint, UserNum FROM Ranuser.dbo.GSUserinfo Where Username = '$account_id'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		
		$UserPoint = ($UserPoint);
		$ID = ($Username);
		$Usernum = ($UserNum);
	if($UserPoint<$Price) {
			echo "<font color=red size=2><center>Sorry you dont have enough points!<p>";
			$error = 1; delayedrefresh('webshop.php');
		}

	$result1=mssql_query("SELECT ItemStock FROM Ranshop.dbo.ShopItemMap Where ProductNum = '$ItemNum'");
	$rows1=mssql_num_rows($result1);
	if ($rows1>0) {
	$rows1=mssql_fetch_assoc($result1); 
	extract($rows1);

	$ItemStock = ($ItemStock);

		if($ItemStock<=0) {
			echo "<font size=2 color=red><center><strong>Sorry out of Stock!</strong></font><p>";
			$error = 1; delayedrefresh('webshop.php');
		}

	} else {
		echo "Account does not exist!<p>";
		$error = 1;
	}
		}
}
if($error==1) {

}
if($error==2) {
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = $_POST['ItemNum'];
	$ItemId = $_POST['ItemMain'];
	$ItemOpt = $_POST['ItemSub'];
	$Duration = $_POST['Duration'];
	$Price = $_POST['ItemMoney'];
	$ItemStock = $_POST['ItemStock'];
	$ItemImage = $_POST['ItemImage'];
	$Usernum = ($UserNum);
	$UserPoint = ($UserPoint);
	$pur = mt_rand(10000000,99999999);
	mssql_query ("UPDATE Ranuser.dbo.GSUserinfo SET UserPoint = UserPoint - '$Price' WHERE Username = '$account_id'");
	mssql_query ("UPDATE Ranshop.dbo.ShopItemMap SET ItemStock = ItemStock - 1 WHERE ProductNum = '$ItemNum' ");
	mssql_query ("INSERT INTO ShopPurchase (UserUID, ProductNum, PurPrice, PurKey)
	VALUES('$account_id','$ItemNum','$Price','$pur')");
	mssql_query ("INSERT INTO Ranuser.dbo.Donation (Date, Item, Quantity, Duration, Usernum)
	VALUES(getdate(),'$ItemImage',1,'$Duration','$Usernum')");
	$result = mssql_query ("SELECT Username, UserPoint, UserNum FROM Ranuser.dbo.Userinfo Where Username = '$account_id'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		
		$UserPoint = ($UserPoint);
	}
	echo "<font size=3 color=green><center>Item Bought Succesfully</font><br><br><font size=2 color=white>Your Account have:</font> <font color=white size=2><b>$UserPoint</font></b><font size=2 color=white> Left</font>";
	delayedrefresh('webshop.php?op=accessory');
}
?>