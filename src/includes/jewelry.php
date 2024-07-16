<script LANGUAGE="JavaScript">
<!--
function confirmSubmit(name,prize)
{
var agree=confirm("Are you sure you want to buy this Item?\nItem:"+name+"\nPrize: "+prize+"");

if (agree)
	return true ;
else
	return false ;
}
// --> this category itemshop =2
</script>
<script type="text/javascript" src="facefiles/prototype.js"></script>
<script type="text/javascript" src="facefiles/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="facefiles/lightbox.js"></script>
<link rel="stylesheet" href="facefiles/lightbox.css" type="text/css" media="screen" />

<?php

	/*
		Place code to connect to your DB here.
	*/
	include('config.php');	// include your code to connect to DB.

	$tbl_name="RanShop.dbo.ShopItemMap";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 1;		
	$type=2;	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where Category = '$type'";
	$execute = sqlsrv_query($connect_mssql,$query);
	$total_pages = sqlsrv_fetch_array($execute,SQLSRV_FETCH_ASSOC);
	$total_pages = $total_pages[num];
	/* Setup vars for query. */
	$targetpage = "itemshop.php?op=jewelry"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 0) * $limit; 			//first item to display on this page
	else
		$start = 10;								//if no page var is given, set start to 0
	
	/* Get data. */
	$lastpage1 = ceil($total_pages/$limit);	
	$sobra=$total_pages/$limit;
	$sobra1 = (int)$sobra;
	$sobra2=$sobra1*$limit;
	$sobra3=$total_pages-$sobra2;
	
	if($page == $lastpage1)
			{
			If ($sobra3 == 0)
			$item_category = sqlsrv_query($connect_mssql,"SELECT * FROM (SELECT TOP $limit  * FROM (SELECT TOP $start * FROM $tbl_name WHERE Category =  $type ORDER BY ProductNum DESC) AS select_limit_rev ORDER BY ProductNum ASC ) AS select_limit WHERE Category =  $type ORDER BY ProductNum DESC");		
			else
						$item_category = sqlsrv_query($connect_mssql,"SELECT * FROM (SELECT TOP $sobra3  * FROM (SELECT TOP $start * FROM $tbl_name WHERE Category =  $type ORDER BY ProductNum DESC) AS select_limit_rev ORDER BY ProductNum ASC ) AS select_limit WHERE Category =  $type ORDER BY ProductNum DESC");		
			}
	else{
	$item_category = sqlsrv_query($connect_mssql,"SELECT * FROM (SELECT TOP $limit  * FROM (SELECT TOP $start * FROM $tbl_name WHERE Category =  $type ORDER BY ProductNum DESC) AS select_limit_rev ORDER BY ProductNum ASC ) AS select_limit WHERE Category =  $type ORDER BY ProductNum DESC");		
	}
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//Home button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=1\"> [Home] </a>";
		else
			$pagination.= "<span class=\"disabled\"> [Home] </span>";	
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage&page=$prev\">[Previous]</a>";
		else
			$pagination.= "<span class=\"disabled\">[Previous]</span>";	
		
		//pages	
		if ($lastpage < 1000 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\"><font color=orange> $counter of $lastpage </font></span>";
				else
					$pagination.= "<a href=\"$targetpage&page=$counter\"><font color=orange>  </font></a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\"> $counter </span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\"> $counter </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage&page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage&page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\"> $counter </span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\"> $counter </a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage&page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage&page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\"> $counter </span>";
					else
						$pagination.= "<a href=\"$targetpage&page=$counter\"> $counter </a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$next\">[Next]</a>";
		else
			$pagination.= "<span class=\"disabled\">[Next]</span>";
		$pagination.= "";		
		
		//Last button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage&page=$lastpage\"> [Last] </a>";
		else
			$pagination.= "<span class=\"disabled\"> [Last] </span>";
		$pagination.= "</div>\n";		
	}
?>
<?PHP 
require("config.php");
$error=1;
if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = (int)$_POST['ItemNum'];
	$ItemID = (int)$_POST['ItemId'];
	$ItemOpt = (int)$_POST['ItemOpt'];
	$Duration = (int)$_POST['Duration'];
	$Price = (int)$_POST['Price'];
	$PurPrice = ($PurPrice);
	$PurPrice = (int)$_POST['PurPrice'];
	$ItemStock = (int)$_POST['ItemStock'];

	$scode = stripslashes((int)$_POST['code']);



$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$result = sqlsrv_query($connect_mssql,"SELECT ItemMain,ItemSub,ItemName,ItemMoney,ItemStock FROM Ranshop.dbo.ShopItemMap Where ProductNum = '$ItemNum'",$params,$options);
	
		$rows=sqlsrv_num_rows($result);
		if($rows === TRUE) {
		$rows=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC); 
		extract($rows);
		
		$UserPoint = ($UserPoint);
		$ID = ($UserName);
		$Usernum = ($UserNum);
		$Price = ($Price);
		$ItemID = ($ItemID);
		$ItemMoney = ($ItemMoney);
		$ItemName = ($ItemName);
		$ItemSub= ($ItemSub);
		$ItemMain = ($ItemMain);
		$ProductNum = ($ProductNum);
		$account_id = stripslashes($_SESSION['user']);
	
	

	
	if($ItemMoney <> $Price){
			echo "";
			echo $ItemMoney;
			$error = 1;
			}
	if($ItemStock == 0) {
			echo "<center>$warning_start Sorry <font color=green>$ItemName</font> is Out of Stock. $warning_end</center>";
			$error = 1; 
				} 





	$result1=sqlsrv_query($connect_mssql,"SELECT Username, UserPoint, UserNum FROM Ranuser.dbo.GSUserinfo Where Username = '$account_id'",$params,$options);
	
	$rows1=sqlsrv_num_rows($result1);
	if ($rows1 === TRUE) {
	$rows1=sqlsrv_fetch_array($result1,SQLSRV_FETCH_ASSOC); 
	extract($rows1);

	
  		$scode = ($scode);
		$UserPoint = ($UserPoint);
		$ID = ($Username);
		$Usernum = ($UserNum);
		$Price = $_POST['Price'];
	
	
		

		if($UserPoint<$Price) {
			echo "<center>$warning_start Not Enough E-Points to Buy Pcs of <font color=green>$ItemName</font>. $warning_end</center<";
			$error = 1;
		}

		


	if($account_id == NULL) {
			echo "<center>$warning_start Please LogIn to Buy <font color=green>$ItemName</font>.$warning_end</center>";
			$error = 1;
		}


	} else {
		echo "<center>$warning_start LogIn First to Buy this item. $warning_end</center>";
		$error = 1;
	}
		}
}

		if($error==1) {


{
	
$scode = mt_rand(1000000,9999999);
echo "<table width=500 CELLSPACING=2 BORDER=0 CELLPADDING=2 align=center>";						

			 
			    if ($r%$perRow)
			    {
				echo "</td>";
			    }
			    else							
			    {
				echo "</td></tr><tr>";
			    }
		 	 }
		  
	echo '</table>';
}
	   
if($error==2) {



$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

$check_id_valid = sqlsrv_query($connect_mssql,"SELECT ItemMain,ItemSub,ItemName,ItemMoney,ItemStock FROM Ranshop.dbo.ShopItemMap Where ProductNum = '$ItemNum'",$params,$options);
$full_id_check=sqlsrv_num_rows($check_id_valid);
if ($full_id_check <= 0)
{
jump('webshop.php'); Die ('<script language="JavaScript">alert();</script>'); 
}

	$result = sqlsrv_query($connect_mssql,"SELECT ItemMain,ItemSub,ItemName,ItemMoney,ItemStock FROM Ranshop.dbo.ShopItemMap Where ProductNum = '$ItemNum'",$params,$options);
	$rows=sqlsrv_has_rows($result);

	if($rows == true) {
		$rows=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
		extract($rows);
		$ItemMoney = ($ItemMoney);
	}
	sqlsrv_query($connect_mssql,"UPDATE Ranuser.dbo.GSUserinfo SET UserPoint = UserPoint - $ItemMoney WHERE Username = '$account_id'");
	sqlsrv_query($connect_mssql,"UPDATE RanShop.dbo.ShopItemMap SET ItemStock = ItemStock - 1 WHERE ProductNum = '$ItemNum' ");

	$pur = mt_rand(10000000,99999999);
	sqlsrv_query($connect_mssql,"INSERT INTO RanShop.dbo.ShopPurchase (UserUID, ProductNum, PurPrice,Purkey)
	VALUES('$account_id','$ItemNum','$ItemMoney','$pur')");



$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$result = sqlsrv_query($connect_mssql,"SELECT ItemMain,ItemSub,ItemName,ItemMoney,ItemStock FROM Ranshop.dbo.ShopItemMap Where ProductNum = '$ItemNum'",$params,$options);
	$rows=sqlsrv_has_rows($result);

	if($rows == true) {
		$rows=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
		extract($rows);
		$ProductNum = ($ProductNum);
		$UserPoint = ($UserPoint);
		$ItemName = ($ItemName);
		$ItemMoney = ($ItemMoney);
	}
	echo "<center>$ok_start <font color=green>$ItemName </font> has been Buy Successfully.</font>$ok_end</center>";
	
}
 {
echo"				<table>

                    <tr>
                      <td><span id='ctl00_ContentPlaceHolder_main_MartList_ctl00_wupinname' style='font-weight:bold;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      </td>
                    </tr></table>";
echo '<table width=610 CELLSPACING=0 BORDER=0 align=center><br>';						

$perRow=2;
$r=0;
$resTop1 = sqlsrv_query($connect_mssql,"SELECT ProductNum, ItemMain, ItemSub, Duration, ItemStock, ItemMoney, ItemImage,ItemName,ItemComment FROM RanShop.dbo.ShopItemMap where Category = '2'");
while($result1 = sqlsrv_fetch_array( $resTop1,SQLSRV_FETCH_ASSOC)) {
		$r++;	

			$ItemNum1 = $result1["ProductNum"];
			$ItemId1 = $result1["ItemMain"];
			$ItemOpt1 = $result1["ItemSub"];
			$Duration1 = $result1["Duration"];
			$ItemStock1 = $result1["ItemStock"];
			$ItemImage1 = $result1["ItemImage"];
			$ItemName1 = $result1["ItemName"];
			$Price1 = $result1["ItemMoney"];
			$Description1 = $result1["ItemComment"]; 

 echo "
<td style='height:100%;'>

            <table width='100%' border='0' >
              <tr>
                <td valign='top' width='90'><table>
                                        <tr>
                      <td style='border-bottom:none;'><img src='items/$ItemImage1'rel='facebox' style='height:100px;width:100px;border-width:0px;' />



                      
                      </td>
                    </tr>
                    <tr> <td style='border-bottom:none;'></td>
		

			<form name='buy' action='' method='post' autocomplete='off'>
				<input type=hidden name=lostpassword value='Buy'>
				<input type=hidden name=ItemStock value=$ItemStock1>
				<input type=hidden name=Price value=$Price1>
				<input type=hidden name=ItemOpt value=$ItemOpt1>
				<input type=hidden name=Duration value=$Duration1>
				<input type=hidden name=ItemId value=$ItemId1>
				<input type=hidden name=ItemNum value=$ItemNum1>
				<input type=hidden name=ItemName value=$ItemName1>
				<input type=hidden name=ItemImage value=$ItemImage1>
				<input type=hidden name=Description value=$Description1>


                    </tr>
                  </table></td>
                <td valign='top'><table width=100%>
                    <tr>
                      <td><font color=#CCCCCC><span id='ctl00_ContentPlaceHolder_main_MartList_ctl00_wupinname' style='font-weight:bold;'>$result1[ItemName]</span></td>
                    </tr>
			
                    <tr>
                      <td>Price: <font color=#CCCCCC><span id='ctl00_ContentPlaceHolder_main_MartList_ctl00_wupinpointold'>$result1[ItemMoney] E-Points</span></font></td>

                    </tr>
                    <tr>
                      <td>Limitation: <font color=#CCCCCC><span id='ctl00_ContentPlaceHolder_main_MartList_ctl00_wupinpointold'>$result1[Duration]</span></font></td>

                    </tr>
                    <tr>
                      <td valign='bottom' style='border-bottom:none;'>
    <table width='100%' cellpadding='0' border='0'>
       <td valign='center' style='border-bottom:none;'><tr><br>
<a href='items/$ItemImage1' rel='lightbox' title='$ItemName1'><img src='images/button/view_btn.gif' ></a></td>
";?>&nbsp;&nbsp;
<input type='image' onClick="return confirmSubmit('<?php echo ($ItemName1)?>','<?php echo ($Price1)?>');" src='images/button/buy_btn .gif'  alt='Submit button'> 
<?php echo "</td></div></div>
       </tr>
    </table>
                      </td>
                    </tr>

                  </table></td>
              </tr>
            </table>
          </td></form>

";					

			 
			    if ($r%$perRow)
			    {
				echo "</td>";
			    }
			    else							
			    {
				echo "</td></tr><tr>";
			    }
		 	 }
		  
echo '</table>';
}

?>
<br><br>
<center><?php echo $pagination?></center>