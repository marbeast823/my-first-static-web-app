<?PHP 

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
return $char;
}

if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = $_POST['ItemNum'];
	$ItemId = $_POST['ItemId'];
	$ItemOpt = $_POST['ItemOpt'];
	$Duration = $_POST['Duration'];
	$Price = $_POST['Price'];
	$ItemStock = $_POST['ItemStock'];

	$result = mssql_query ("SELECT UserName, UserPoint, UserNum FROM UserInfo Where ID = '$account_id'");
	$rows=mssql_num_rows($result);

	if($rows>0) {
		$rows=mssql_fetch_assoc($result); 
		extract($rows);
		
		$UserPoint = ($UserPoint);
		$ID = ($ID);
		$Usernum = ($UserNum);
	if($UserPoint<$Price) {
			echo "<font color=red size=2>Sorry you dont have enough points!<p>";
			$error = 1;
		}

	$result1=mssql_query("SELECT ItemStock FROM RanShop.dbo.PointShop Where ItemNum = '$ItemNum'");
	$rows1=mssql_num_rows($result1);
	if ($rows1>0) {
	$rows1=mssql_fetch_assoc($result1); 
	extract($rows1);

	$ItemStock = ($ItemStock);

		if($ItemStock<=0) {
			echo "<font size=2 color=orange><center><strong>Sorry out of Stock!</strong></font><p>";
			$error = 1;
		}

	} else {
		echo "Account does not exist!<p>";
		$error = 1;
	}
		}
}
if($error==1) {
echo "<table width=300 CELLSPACING=2 BORDER=0 CELLPADDING=2 align=center>";
$perRow=2;
$r=0;
$resTop1 = mssql_query("SELECT ItemNum, ItemId, ItemOpt, Duration, ItemStock, Price, ItemImage,ItemName,Description FROM RanShop.dbo.PointShop where Category = 'ProductNum'");
while($result1 = mssql_fetch_array( $resTop1)) {
		$r++;	

			$ItemNum1 = $result1["ItemNum"];
			$ItemId1 = $result1["ItemId"];
			$ItemOpt1 = $result1["ItemOpt"];
			$Duration1 = $result1["Duration"];
			$ItemStock1 = $result1["ItemStock"];
			$ItemImage1 = $result1["ItemImage"];
			$ItemName1 = $result1["ItemName"];
			$Price1 = $result1["Price"];
			$Description1 = $result1["Description"]; 
    			if($Duration1 == 1) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 2) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 3) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 4) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 5) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 6) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 7) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 8) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 9) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 10) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 11) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 12) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 13) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 14) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 15) {
				$Duration1 = getD($Duration1);
			}
			if($Duration1 == 16) {
				$Duration1 = getD($Duration1);
			}


		
			    echo "
<td><td><br><div align='center'><img src='items/$result1[ItemImage]' alt='$result1[ItemImage]' width='90' height='90'></div></td>
            <td width='130' class=alt1 align='left'><font color='#CCCCCC'>Name: <b>$result1[ItemName]</b><br>Duration: $Duration1<br>Description: $result1[Description]<br><br>Stock: <b>$result1[ItemStock]</b><br>Price: <b>$result1[Price]</b></font><br><form name='buy' action='webshop.php?op=show2' method='post' onsubmit='return checkform()' autocomplete='off'>
				<input type=hidden name=lostpassword value='Buy'>
				<input type=hidden name=ItemStock value=$ItemStock1>
				<input type=hidden name=Price value=$Price1>
				<input type=hidden name=ItemOpt value=$ItemOpt1>
				<input type=hidden name=Duration value=$Duration1>
				<input type=hidden name=ItemId value=$ItemId1>
				<input type=hidden name=ItemNum value=$ItemNum1>
				<input type=hidden name=ItemImage value=$ItemImage1>
				<input type=hidden name=Description value=$Description1>
				<input type=image src='images/Item_buy4_btn1.gif' name=submit value=' Buy '>
			</form></td></td><td></div><td>";						

			    //modulus (%) $a % $b remainder of $a divided by $b 
			    if ($r%$perRow)
			    {
				echo "</td>";
			    }
			    else							
			    {
				echo "</td></tr><tr>";
			    }
		 	 }
		  
	
}
if($error==2) {
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = $_POST['ItemNum'];
	$ItemId = $_POST['ItemId'];
	$ItemOpt = $_POST['ItemOpt'];
	$Duration = $_POST['Duration'];
	$Price = $_POST['Price'];
	$ItemStock = $_POST['ItemStock'];
	$Usernum = ($UserNum);
	
	mssql_query ("UPDATE UserInfo SET UserPoint = UserPoint - '$Price' WHERE ID = '$account_id'");
	mssql_query ("UPDATE RanShop.dbo.PointShop SET ItemStock = ItemStock - 1 WHERE ItemNum = '$ItemNum' ");
	mssql_query ("INSERT INTO CabalCash.dbo.MyCashItem (UserNum, TranNo, ServerIdx, ItemKindIdx, ItemOpt, DurationIdx)
	VALUES('$Usernum',1,24,'$ItemId','$ItemOpt','$Duration')");
	
	echo "<font size=3 color=green>Item Bought Succesfully</font>";
}

?>