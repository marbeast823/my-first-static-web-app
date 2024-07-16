<?php

echo "



<table width=400 border=0 cellspacing=2 cellpadding=1 align=center>
";
$ItemNum = $_POST['ItemNum'];
$resTop1 = mssql_query("SELECT ProductNum, ItemMain, ItemSub, Duration, ItemStock, ItemMoney, ItemImage,ItemName,ItemComment FROM RanShop.dbo.ShopItemMap where ProductNum = '$ItemNum'");
while($result1 = mssql_fetch_array( $resTop1 )) {
			

			$ItemNum = $result1["ProductNum"];
			$ItemId = $result1["ItemMain"];
			$ItemOpt = $result1["ItemSub"];
			$Duration = $result1["Duration"];
			$ItemStock = $result1["ItemStock"];
			$ItemImage = $result1["ItemImage"];
			$ItemName = $result1["ItemName"];
			$Price = $result1["ItemMoney"];
			$Description = $result1["ItemComment"]; 



$content .="<tr>
            <td class='thead'>$row[0]</td>
            
            </tr>
            <tr>
            <td width='1' rowspan='2' class=alt1 align='center'><div align='center'><img src='items/$result1[ItemImage]' alt='$result1[ItemImage]' width='100' height='100'></div></td>
            <td width='130' class=alt1 align='left'><font color='black' size=1>Name: <b>$ItemName</b><br>Duration: $Duration<br>Description: $Description<br><br>Stock: <b>$ItemStock</b><br>Price: <b>$Price</b></font><br><form name='buy' action='itemshop.php?op=itemshop2' method='post' autocomplete='off'>
				<input type=hidden name=lostpassword value='Buy'>
				<input type=hidden name=ItemStock value=$ItemStock>
				<input type=hidden name=Price value=$Price>
				<input type=hidden name=ItemOpt value=$ItemOpt>
				<input type=hidden name=Duration value=$Duration>
				<input type=hidden name=ItemId value=$ItemId>
				<input type=hidden name=ItemNum value=$ItemNum>
				<input type=hidden name=ItemImage value=$ItemImage>
				<input type=hidden name=ItemName value=$ItemName>
				<input type=submit name=submit value='   Buy   '><a href=\"javascript:history.back()\" ><input type=submit value='   Cancel   ' Item_Purchase_061.gif border=0></a>
			</form>";
	}
        
$content .="</table>";
show($content);


?><br><br><br>