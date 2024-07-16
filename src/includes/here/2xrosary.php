<?PHP 
echo'
<script language="JavaScript" type="text/JavaScript">
<!--
function showHelpTip(e, sHtml, bHideSelects) {

	// find anchor element
	var el = e.target || e.srcElement;
	while (el.tagName != "A")
		el = el.parentNode;
	
	// is there already a tooltip? If so, remove it
	if (el._helpTip) {
		helpTipHandler.hideHelpTip(el);
	}

	helpTipHandler.hideSelects = Boolean(bHideSelects);

	// create element and insert last into the body
	helpTipHandler.createHelpTip(el, sHtml);
	
	// position tooltip
	helpTipHandler.positionToolTip(e);

	// add a listener to the blur event.
	// When blurred remove tooltip and restore anchor
	el.onblur = helpTipHandler.anchorBlur;
	el.onkeydown = helpTipHandler.anchorKeyDown;
}

var helpTipHandler = {
	hideSelects:	false,
	
	helpTip:		null,
	
	showSelects:	function (bVisible) {
		if (!this.hideSelects) return;
		// only IE actually do something in here
		var selects = [];
		if (document.all)
			selects = document.all.tags("SELECT");
		var l = selects.length;
		for	(var i = 0; i < l; i++)
			selects[i].runtimeStyle.visibility = bVisible ? "" : "hidden";	
	},
	
	create:	function () {
		var d = document.createElement("DIV");
		d.className = "help-tooltip";
		d.onmousedown = this.helpTipMouseDown;
		d.onmouseup = this.helpTipMouseUp;
		document.body.appendChild(d);		
		this.helpTip = d;
	},
	
	createHelpTip:	function (el, sHtml) {
		if (this.helpTip == null) {
			this.create();
		}

		var d = this.helpTip;
		d.innerHTML = sHtml;
		d._boundAnchor = el;
		el._helpTip = d;
		return d;
	},
	
	// Allow clicks on A elements inside tooltip
	helpTipMouseDown:	function (e) {
		var d = this;
		var el = d._boundAnchor;
		if (!e) e = event;
		var t = e.target || e.srcElement;
		while (t.tagName != "A" && t != d)
			t = t.parentNode;
		if (t == d) return;
		
		el._onblur = el.onblur;
		el.onblur = null;
	},
	
	helpTipMouseUp:	function () {
		var d = this;
		var el = d._boundAnchor;
		el.onblur = el._onblur;
		el._onblur = null;
		el.focus();
	},	
	
	anchorBlur:	function (e) {
		var el = this;
		helpTipHandler.hideHelpTip(el);
	},
	
	anchorKeyDown:	function (e) {
		if (!e) e = window.event
		if (e.keyCode == 27) {	// ESC
			helpTipHandler.hideHelpTip(this);
		}
	},
	
	removeHelpTip:	function (d) {
		d._boundAnchor = null;
		d.style.filter = "none";
		d.innerHTML = "";
		d.onmousedown = null;
		d.onmouseup = null;
		d.parentNode.removeChild(d);
		//d.style.display = "none";
	},
	
	hideHelpTip:	function (el) {
		var d = el._helpTip;
		/*	Mozilla (1.2+) starts a selection session when moved
			and this destroys the mouse events until reloaded
		d.style.top = -el.offsetHeight - 100 + "px";
		*/		
		
		d.style.visibility = "hidden";
		//d._boundAnchor = null;

		el.onblur = null;
		el._onblur = null;
		el._helpTip = null;
		el.onkeydown = null;
		
		this.showSelects(true);
	},
	
	positionToolTip:	function (e) {
		this.showSelects(false);		
		var scroll = this.getScroll();
		var d = this.helpTip;
		
		// width
		if (d.offsetWidth >= scroll.width)
			d.style.width = scroll.width - 10 + "px";
		else
			d.style.width = "";
		
		// left
		if (e.clientX > scroll.width - d.offsetWidth)
			d.style.left = scroll.width - d.offsetWidth + scroll.left + "px";
		else
			d.style.left = e.clientX - 2 + scroll.left + "px";
		
		// top
		if (e.clientY + d.offsetHeight + 18 < scroll.height)
			d.style.top = e.clientY + 18 + scroll.top + "px";
		else if (e.clientY - d.offsetHeight > 0)
			d.style.top = e.clientY + scroll.top - d.offsetHeight + "px";
		else
			d.style.top = scroll.top + 5 + "px";
			
		d.style.visibility = "visible";
	},
	
	// returns the scroll left and top for the browser viewport.
	getScroll:	function () {
		if (document.all && typeof document.body.scrollTop != "undefined") {	// IE model
			var ieBox = document.compatMode != "CSS1Compat";
			var cont = ieBox ? document.body : document.documentElement;
			return {
				left:	cont.scrollLeft,
				top:	cont.scrollTop,
				width:	cont.clientWidth,
				height:	cont.clientHeight
			};
		}
		else {
			return {
				left:	window.pageXOffset,
				top:	window.pageYOffset,
				width:	window.innerWidth,
				height:	window.innerHeight
			};
		}
		
	}

};
//-->
</script>';

$error=1;


if($_POST['lostpassword']=='Buy') {
	
	$error = 2;
	$account_id = stripslashes($_SESSION['user']);
	$ItemNum = $_POST['ItemNum'];
	$ItemId = $_POST['ItemId'];
	$ItemOpt = $_POST['ItemOpt'];
	$Duration = $_POST['Duration'];
	$Price = $_POST['Price'];
	$ItemStock = $_POST['ItemStock'];

	$result = mssql_query ("SELECT ID, UserPoint, UserNum FROM Account.dbo.cabal_auth_table Where ID = '$account_id'");
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

	$result1=mssql_query("SELECT ItemStock FROM RanShop.dbo.WebShop Where ItemNum = '$ItemNum'");
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
echo "<table width=500 CELLSPACING=2 BORDER=1 CELLPADDING=2 align=center>";
$perRow=2;
$r=0;
$resTop1 = mssql_query("SELECT ProductNum, ItemMain, ItemSub, Duration, ItemStock, ItemMoney, ItemImage,ItemName,ItemComment FROM RanShop.dbo.ShopItemMap where Category = '5'");
while($result1 = mssql_fetch_array( $resTop1)) {
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
<td><td><br><div align='center'><img src='items/$result1[ItemImage]' alt='$result1[ItemImage]' width='100' height='100'></div></td>
            <td width='130' class=alt1 align='left'><font color='black' size=1>Name : <b>$result1[ItemName]</b>
<br>Duration : $Duration1<br>Description :<br> $result1[ItemComment]<br><br>Stock : <b>$result1[ItemStock]</b><br><br><b>Price : <font size=2 color=red> <b>$result1[ItemMoney]</font> CR-Points</b></font><br><form name='buy' action='itemshop.php?op=show2' method='post' autocomplete='off'>
				<input type=hidden name=lostpassword value='Buy'>
				<input type=hidden name=ItemStock value=$ItemStock1>
				<input type=hidden name=Price value=$Price1>
				<input type=hidden name=ItemOpt value=$ItemOpt1>
				<input type=hidden name=Duration value=$Duration1>
				<input type=hidden name=ItemId value=$ItemId1>
				<input type=hidden name=ItemNum value=$ItemNum1>
				<input type=hidden name=ItemImage value=$ItemImage1>
				<input type=hidden name=Description value=$Description1>
				<input type=submit name=submit value=' Detail & Buy '>
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
		  
	echo '</table>';
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
	
	mssql_query ("UPDATE Account.dbo.cabal_auth_table SET UserPoint = UserPoint - '$Price' WHERE ID = '$account_id'");
	mssql_query ("UPDATE RanShop.dbo.WebShop SET ItemStock = ItemStock - 1 WHERE ItemNum = '$ItemNum' ");
	mssql_query ("INSERT INTO RanShop.dbo.MyCashItem (UserNum, TranNo, ServerIdx, ItemKindIdx, ItemOpt, DurationIdx)
	VALUES('$Usernum',1,24,'$ItemId','$ItemOpt','$Duration')");
	
	echo "<font size=3 color=green>Item Bought Succesfully</font>";
}

?>