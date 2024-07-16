<? 
session_start();
header("Cache-control: private");
ob_start();
$timeStart=gettimeofday();
$timeStart_uS=$timeStart["usec"];
$timeStart_S=$timeStart["sec"]; 
require("config.php");
$login = stripslashes($_SESSION['user']);

require_once "sql_inject.php"; 
require_once "sql.class.php";
$bDestroy_session = TRUE; 
$url_redirect = 'error.php';
 
$sqlinject = new sql_inject('sqlinject/log_file_sql.log',$bDestroy_session,$url_redirect)  ;
function valid($word)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  for($i=0;$i<strlen($word);$i++)
  {
    $ch = substr($word,$i,1);
  $nol = substr_count($chars,$ch);
  if($nol==0)
  {
    return true;
  }
  }
  return false;
}
function getchar($character)
{
  $uid = mssql_fetch_array(mssql_query("SELECT ChaNum FROM RanGame1.dbo.ChaInfo WHERE ChaNum='".$character."'"));
  return $uid[0];
}
include("includes/web_modules.php");
magic();
include("includes/clean_var.php");
include("includes/sql_check.php");
htmlspecialchars($_REQUEST);

function delayedrefresh($page) {
	echo "<meta http-equiv='refresh' content='3; URL={$page}'>";
}
function quickrefresh($page) {
	echo "<meta http-equiv='refresh' content='.0000000000000000001; URL={$page}'>";
}
if(isset($_SESSION['user'])) {clean_var($_SESSION['user']);}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="ctl00_Head1"><title>
V-RAN Online EPX Season III
</title><link rel="stylesheet" href="Common/CSS/StyleSheet2.css" type="text/css" media="all" />
    <script type="text/javascript" src="Common/JS/Common.js"></script>
    <script type="text/javascript" src="Common/JS/jQuery/jquery-1.4.1.js"></script>
    <script type="text/javascript" src="Common/JS/jQuery/jquery.jclock.js"></script>
    <script type="text/javascript" src="Common/JS/jQuery/jquery.simplemodal-1.3.3.min.js"></script>    
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#menu-support").show();

            var $Category = $("#support1");
            var imgsrc = $Category.attr("src");
            $Category.attr("src", imgsrc.replace("off", "on"));
            $Category.removeClass("subMenuTitle");

            //$("#support1_bg").addClass("leftMenuRoll").removeClass("leftMenuTitle");

            var cate = "1";
            if (cate == 1) {
                $("#pathStr").text("SUPPORT > IN GAME SUPPORT");
            } else if (cate == 2) {
                $("#pathStr").text("SUPPORT > TECHNICAL SUPPORT");
            } else if (cate == 3) {
                $("#pathStr").text("SUPPORT > BUG REPORT");
            } else if (cate == 4) {
                $("#pathStr").text("SUPPORT > ETC");
            }

            $("#selSearchFlag").val("0");
            $("#txtSearchString").val("");

            $("#btnWrite").click(function() {
                location.href = "SupportWrite.aspx?SupportCategory=1";
            });

            $("#btnSearch").click(function() {
                location.href = "SupportList.aspx?PageNum=2&SupportCategory=1&SearchFlag=" + $("#selSearchFlag").val() + "&SearchString=" + $("#txtSearchString").val();
            });
        });

        function goSupportView(num) {
            location.href = "SupportView.aspx?PageNum=2&SupportCategory=1&SupportNum=" + num + "&SearchFlag=" + $("#selSearchFlag").val() + "&SearchString=" + $("#txtSearchString").val();
        }

        function goPaging(pagenum) {
            $("#hdnPageNum").val(pagenum);
            $("#form1").attr("action", "SupportList.aspx").submit();
        }
    </script>

    <script type="text/javascript">
    //<!CDATA[
        $(document).ready(function() {
            var UserID = "";

            //???? top ???
            var currentPosition = parseInt($("#quick_menu_div").css("top"));

            $(window).scroll(function() {
                var position = $(window).scrollTop(); // ?? ????? ???? ?????.                
                $("#quick_menu_div").stop().animate({ "top": position + currentPosition + "px" }, 500);
            });

            $("#txtUserID").focus();

            $("#logo").click(function() {
                location.href = "index.html";
            });

            $("#txtUserID").keyup(function() {                
                if (window.event.keyCode == "13") {
                    LoginCheck();
                }
            });

            $("#txtUserPassword").keyup(function() {
                if (window.event.keyCode == "13") {
                    LoginCheck();
                }
            });

            $("#ctl00_btnLogin").click(function() {
                var bool = LoginCheck();

                if (bool.toString() == "false") {
                    return false;
                }

            });

            $("#btnMyAccount").click(function() {
                location.href = "/Member/MyAccount.aspx";
            });

            $("#Keyworld").keyup(function() {
                if (window.event.keyCode == "13") {
                    if ($("#Keyworld").val().replace(/\s/g, "").length == 0) {
                        alert("Please input your keyworld.");
                        return false;
                    }
                    location.href = "/SearchAll.aspx?Keyworld=" + $("#Keyworld").val();
                }
            });

            $("#btnAllSearch").click(function() {
                if ($("#Keyworld").val().replace(/\s/g, "").length == 0) {
                    alert("Please input your keyworld.");
                    return false;
                }
                location.href = "/SearchAll.aspx?Keyworld=" + $("#Keyworld").val();
            });

            $("#btnLogOut").click(function() {
                location.href = "/Login/LogoutProcess.aspx";
            });

            function Logout() {
                $.ajax({
                    type: "POST",
                    url: "/WebService/UserWebService.asmx/UserLogout",
                    data: "{}",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function(data) {
                        $("#login-off").show();
                        $("#login-on").hide();
                    },
                    error: function(data) {
                        alert(data.status + " : " + data.statusText);
                    }
                });
            }

            $(".NavMenu").hover(
                function() {
                    $(this).attr("src", $(this).attr("src").replace("_on", "_off"));
                },
                function() {
                    $(this).attr("src", $(this).attr("src").replace("_off", "_on"));
                }
            ).click(function() {
                location.href = $(this).attr("link");
            });

            $(".subMenu").hover(
                function() {
                    $(this).addClass("leftMenuRoll pointer").removeClass("leftMenuTitle");
                },
                function() {
                    $(this).addClass("leftMenuTitle pointer").removeClass("leftMenuRoll");
                }
            ).click(function() {
                var link = $(this).attr("link");

                location.href = link;
            });

            $(".user-info").click(function(ev) {
                var UserID = $(this).attr("UserID");
                $.ajax({
                    type: "POST",
                    url: "/WebService/UserWebService.asmx/GetUserInfo",
                    data: "{'UserID' : '" + UserID + "'}",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function(data) {
                        var result = data.d;
                        var userimg = result.UserImg;
                        var userlevel = result.UserPoint;
                        var userlevelimg = "";

                        if (userimg == "") {
                            userumg = "Images/sample/sample_user.gif";
                        }

                        if (userlevel > 2999) {
                            userlevelimg = "05";
                        }
                        else if (userlevel > 999) {
                            userlevelimg = "04";
                        }
                        else if (userlevel > 299) {
                            userlevelimg = "03";
                        }
                        else if (userlevel > 99) {
                            userlevelimg = "02";
                        }
                        else if (userlevel > 9) {
                            userlevelimg = "01";
                        }
                        else {
                            userlevelimg = "";
                        }

                        var gender = "";
                        if (result.UserGender == 1) {
                            gender = "Male";
                        } else {
                            gender = "Female";
                        }

                        $("#dvLayerInfo #user-id").text(result.UserID);
                        $("#dvLayerInfo #user-img").attr("src", userimg);
                        $("#dvLayerInfo #user-level").attr("src", "/Images/forum/forum_level" + userlevelimg + ".gif");
                        $("#dvLayerInfo #user-join").text(result.InsertDate);
                        $("#dvLayerInfo #user-infoid").text(result.UserID);
                        $("#dvLayerInfo #user-firstname").text(result.UserFirstName);
                        $("#dvLayerInfo #user-lastname").text(result.UserName);
                        $("#dvLayerInfo #user-country").text(result.UserCountry);
                        $("#dvLayerInfo #user-gender").text(gender);
                        $("#dvLayerInfo #user-forumlevel").text(result.UserID);
                        $("#dvLayerInfo #user-occ").text(result.UserOccupation);
                        $("#dvLayerInfo #user-inter").text(result.UserInterests);
                    },
                    error: function(data) {
                        alert(data.status + " : " + data.statusText);
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/WebService/UserWebService.asmx/UserPostCount",
                    data: "{'UserID' : '" + UserID + "'}",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    success: function(data) {
                        var result = data.d;
                        $("#dvLayerInfo #user-postcount").text("Posts " + result);
                    },
                    error: function(data) {
                        alert(data.status + " : " + data.statusText);
                    }
                });

                // ??? ??
                var $ev_x = ev.pageX;
                var $ev_y = ev.pageY;

                // ?? ??
                var $tt_x = $("#dvLayerInfo").outerWidth();
                var $tt_y = $("#dvLayerInfo").outerHeight();

                // ?? ??
                var $bd_x = $('body').outerWidth();
                var $bd_y = $('body').outerHeight();

                $("#dvLayerInfo").css({
                    'top': $ev_y + $tt_y > $bd_y ? $ev_y - $tt_y : $ev_y,
                    'left': $ev_x + $tt_x > $bd_x ? $ev_x - $tt_x : $ev_x
                });

                $("#dvLayerInfo").show();
            });

            $("#user-close").click(function() {
                $("#dvLayerInfo").hide();
            });

            $(".agrees").click(function() {
                Common.OpenCenterWindow(670, 700, $(this).attr("file"), "agree", true);
            });

            $("#pathStr").css("color", "#FFFFFF");
            $("#pathStr").css("font-weight", "bold");
            $("#pathStr").css("font-size", "12px");

            UserWebService.GetRanTime(Completed, Failed);
        });

        function LoginCheck() {
            if ($("#txtUserID").val().replace(/\s/g, "").length == 0) {
                alert("Please put your ID");
                $("#txtUserID").focus();
                return false;
            }

            /*
            if (!Common.CheckEngNum($("#txtUserID").val())) {
                alert("ID should be made of either English or number");
                $("#txtUserID").focus();
                return false;
            }
            */

            if ($("#txtUserPassword").val().replace(/\s/g, "").length == 0) {
                alert("Please put your password");
                $("#txtUserPassword").focus();
                return false;
            }

            if (!Common.CheckEngNum($("#txtUserPassword").val())) {
                alert("Password should be made of either English or number");
                $("#txtUserPassword").focus();
                return false;
            }

            return true;

            //$("#aspnetForm").attr("action", "http://newran.ran-world.com/Login/LoginProcess.aspx").submit();
        }
        
        //???? ??? href? ??? ???? ????? ??? ???.
        //href? #? ???? ??? ???? ??? ????? ???? ???.
        //??? ???? ?? ? ??? ?? ??? ??? ??? ???? jQuery? ?????.
        function AgreeNone() {
        }

        //??? ran-world?? ???? jQuery plug-in? jclock? ?????? ?????? ??? ?? ???? ??? ????.
        //??? ???? ?????? ???? ??? ??? ???? ?? ???? ??? ???? 1? ???? ????.
        function RanTime() {
            UserWebService.GetRanTime(Completed, Failed);
        }

        function Completed(results, context, methodName) {
            $("#rantime").text(results);
        }

        function Failed(results, context, methodName) {
            //alert(results.get_message());
        }

        //??? ??
        setInterval("RanTime();", 60000)
    //]]>
    </script>

<body>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJNzM4MjE5ODkzZBgBBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAgUOY3RsMDAkYnRuTG9naW4FI2N0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkYnRuU3VibWl0" />
<input type="hidden" name="__PREVIOUSPAGE" id="__PREVIOUSPAGE" value="QJw47_-lHZqbUH7F7jKC2aqrtBPYqlunp9z7MHcswbib5aAp9lO8WOaRX6WZMUfbiBu4IJFNI63HXdb_C4MO-RsnHZ81" />
<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWAwKRsbqSCALnrI+ZDwL40JWiCg==" />

<div id="wrapper" class="wrapper">
    <div class="mainAll">    
        <div class="header">            
            <div class="logo">
                <div class="rantime">                

                </div>
                <div class="logoImg" style="z-index:1;">
                    <!--<img src="/Images/main/logo2.png" id="logo" class="pointer" alt="" />-->
                        <a href="index.php"><img src="/Images/header.png" alt="" /></a>
                </div>
                <div class="top-search" style="z-index:2;">
                    <input type="text" id="Keyworld" name="Keyworld" class="searchTxt" /><img src="/Images/main/search_btn.gif" id="btnAllSearch" class="pl5 pt70 pointer" alt="SEARCH" />
                </div>
            </div>
            <div class="nav">
                <script type="text/javascript">
                    Common.GetFlash("/Images/flash/MainBanner_101207.swf", 960, 320);
                </script>
            </div>
        </div>
        <div class="main">
                <div class="subNav">
        <div class="login">
            <div class="loginTop"></div>
            <div class="loginForm">
                <div id="login-off">                    
                    <div class="left pt12 pl16">
<iframe name="inner2" width="190" allowTransparency="true" height="80" src="ilogin.php" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>
                    </div>                  
                </div>
            
            </div>
        </div>
                <div class="clear"><span></span></div>

                <div id="sub-nav">
                    <ul id="menu-support" class="leftMenu">
                        <li class="leftMenuTop"><img src="Images/submenu/member/manage_top_title.png" alt="" /></li>
			<li class="leftMenuBlank">&nbsp;</li>
                        <li id="" class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=characters"><img id="support2" class="subMenuTitle pointer" src="Images/submenu/member/mem_char_off.png" alt="" /></a></li>                    
			<li class="leftMenuBlank">&nbsp;</li>
                        <li id="" class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=accountinfo"><img id="support2" class="subMenuTitle pointer" src="Images/submenu/member/mem_myacc_off.png" alt="" /></a></li>
                        <li class="leftMenuBlank">&nbsp;</li>
                        <li id="" class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=changepassword"><img id="support3" class="subMenuTitle pointer" src="Images/submenu/member/mem_chapwd_off.png" alt="" /></a></li>
                        <li class="leftMenuBlank">&nbsp;</li>
                        <li id="" class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=reborn"><img id="support4" class="subMenuTitle pointer" src="Images/submenu/member/mem_rebirth_off.png" alt="" /></a></li>
                        <li class="leftMenuBlank">&nbsp;</li>
                        <li id=""  class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=stat"><img id="faq" class="subMenuTitle pointer" src="Images/submenu/member/mem_resetstat_off.png" alt="" /></a></li>
			<li class="leftMenuBlank">&nbsp;</li>
                        <li id=""  class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=school"><img id="faq" class="subMenuTitle pointer" src="Images/submenu/member/mem_chasch_off.png" alt="" /></a></li>
			<li class="leftMenuBlank">&nbsp;</li>
                        <li id=""  class="leftMenuTitle subMenu"><a href="/manage.php?op=user&option=earnpoint"><img id="faq" class="subMenuTitle pointer" src="Images/submenu/member/mem_earn_off.png" alt="" /></a></li>
			<li class="leftMenuBlank">&nbsp;</li>
                        <li id=""  class="leftMenuTitle subMenu"><a href="/voting.php"><img id="faq" class="subMenuTitle pointer" src="Images/submenu/member/mem_vtvp_off.png" alt="" /></a></li>
                        <li class="leftMenuBottom"></li>
                    </ul>
                </div>
            </div>
            <div class="contentZone">
                    
    <div class="content">
        <div class="contentTop">
            <div class="left"><img src="Images/content/content_top_item_3.png" alt="" /></div>
            <div class="right pt5">
                <span id="pathStr"></span>
            </div>
        </div>
        <div class="contentMiddle">
            <div class="contentBox">

                <h1><img src="Images/board/support_title2.png" alt="" /></h1>
                <table class="board" border="0" cellpadding="0" cellspacing="1" summary="SupportList">
                <caption class="displayNone">SupportList</caption></a>
                <colgroup>
                    <col width="30" />
                    <col width="234" />
                    <col width="100" />
                    <col width="100" />
                    <col width="100" />                
                </colgroup>

                <tbody>
        
                <tr class="trStyle1">
                    <tr align="center">
<?php include_once("includes/tw_vote.php"); ?>
    </tr> 
        
                </tbody>
                </table>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>      
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>
			<div style="height:1.4em;visibility:hidden;">Spacing</div>           
                <div class="search">              


                </div>
            </div>
        </div>
        <div class="contentBottom"></div>
    </div>    

            </div>        
        </div>   
        <div class="clear"><span></span></div>
        <div class="footer">
    	    <div class="pb10">
            <img src="Images/main/footer.png" border="0" usemap="#FooterMap" alt="" />
            </div>
            <div class="pb30">       
            </div>
        </div>
    </div>

    <div class="clear"><span></span></div>
</div>


<script type="text/javascript">
//<![CDATA[
Sys.Application.initialize();
//]]>
</script>
</form>
</body>

<!-- Mirrored from www.ran-world.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 09 Dec 2010 19:49:25 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>
