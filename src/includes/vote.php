<?PHP 
include_once('sql_check.php');
check_inject();

require_once "sql_inject.php"; 
require_once "sql.class.php";
$bDestroy_session = TRUE; 
$url_redirect = 'error.php';
 
$sqlinject = new sql_inject('sqlinject/log_file_sql.log',$bDestroy_session,$url_redirect)  ;
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
$account_id =  stripslashes(set_sec_see($_SESSION['user']));
$account_id = clean_var($account_id);
if($account_id == NULL){ quickrefresh('index.php'); Die ("<img src=\"images/warning.gif\" alt=\"Access Denied\"> Please Log In to Continue...!</div></table></div></table></table>"); }
$op = $_GET["op"];
$vid =  stripslashes(set_sec_see($_POST['vid']));
 if($vid=='1')
  {
$url ="http://www.xtremetop100.com/in.php?site=";
}
else if($vid=='2')
{
$url ="http://www.gtop100.com/in.php?site=";
}
else if($vid=='3')
{
$url ="http://www.jagtoplist.com/in.php?site=";
}
else if($vid=='3')
{
$url ="http://www.gtop100.com/in.php?site=";
}
else if($vid=='4')
{
$url ="http://www.gtop100.com/in.php?site=";
}
else if($vid=='5')
{
$url ="http://www.mmorpgtoplist.com/in.php?site=";
}
if($op=="votenow")
{
$tm = time();
 $lastpm = mssql_fetch_array(mssql_query("SELECT TOP 1 MAX(votetime) FROM Ranuser.dbo.Vote WHERE username='".$account_id."' AND link='".$vid."'"));
 $pmfl = $lastpm[0]+43200;

  if($pmfl<$tm)
  {
if(($vid=="1")||($vid=="2")||($vid=="3")||($vid=="4")||($vid=="5"))
{
include_once("includes/votenow.php");

}else{
echo "<center><font color=red>Dont cheat you bad cheetah!!<br/></font></center>";
}
}else{
echo "<center><font color=red>Wait 12 hours to vote again!<br/></font></center>";
quickrefresh('vote.php');
}
}else{

echo "<center><form action=\"vote.php?op=votenow\" method=\"post\">";
echo "<input type=\"hidden\" name=\"vid\" value=\"1\"/>";
echo "<input type=\"image\" name=\"submit\" src=\"http://www.xtremeTop100.com/votenew.jpg\" name=\"send\" Value=\"Vote Now!\"/></form>";
///next
echo "<form action=\"vote.php?op=votenow\" method=\"post\">";
echo "<input type=\"hidden\" name=\"vid\" value=\"2\"/>";
echo "<input type=\"image\" name=\"submit\" src=\"http://www.gtop100.com/images/votebutton.jpg\" name=\"send\" Value=\"Vote Now!\"/></form>";
///next
echo "<form action=\"vote.php?op=votenow\" method=\"post\">";
echo "<input type=\"hidden\" name=\"vid\" value=\"3\"/>";
echo "<input type=\"image\" name=\"submit\" src=\"http://www.jagtoplist.com/images/vbtn88x55.jpg\" name=\"send\" Value=\"Vote Now!\"/></form>";
///next
echo "<form action=\"vote.php?op=votenow\" method=\"post\">";
echo "<input type=\"hidden\" name=\"vid\" value=\"4\"/>";
echo "<input type=\"image\" name=\"submit\" src=\"http://www.gtop100.com/images/votebutton.jpg\" name=\"send\" Value=\"Vote Now!\"/></form>";
///next
echo "<form action=\"vote.php?op=votenow\" method=\"post\">";
echo "<input type=\"hidden\" name=\"vid\" value=\"5\"/>";
echo "<input type=\"image\" name=\"submit\" src=\"http://www.mmorpgtoplist.com/vote.jpg\" name=\"send\" Value=\"Vote Now!\"/></form></center>";
}

?>
