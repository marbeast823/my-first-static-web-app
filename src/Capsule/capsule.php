<?php
session_start();
include_once("include/config.php");
if(empty($_SESSION['account']) || empty($_SESSION['password']))
{
	$api->go("http://google.com");
}
$api->chklogin($_SESSION['account'],$_SESSION['password']);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Capsule Shop</title>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
<link href="style/Base.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
		#capsule_wrap { width:175px; height:140px; }
		#capsule_wrap li { position:absolute; width: 50px; height: 50px; }
		#capsule_wrap li.capsule1 { background: transparent url('Images/CapsuleShop/capsule1.png') no-repeat; } /* Blue1 */
		#capsule_wrap li.capsule2 { background: transparent url('Images/CapsuleShop/capsule2.png') no-repeat; } /* Blue2 */
		#capsule_wrap li.capsule3 { background: transparent url('Images/CapsuleShop/capsule3.png') no-repeat; } /* Green1 */
		#capsule_wrap li.capsule4 { background: transparent url('Images/CapsuleShop/capsule4.png') no-repeat; } /* Green2 */
		#capsule_wrap li.capsule5 { background: transparent url('Images/CapsuleShop/capsule5.png') no-repeat; } /* Purple1 */
		#capsule_wrap li.capsule6 { background: transparent url('Images/CapsuleShop/capsule6.png') no-repeat; } /* Purple2 */
		#capsule_wrap li.capsule7 { background: transparent url('Images/CapsuleShop/capsule7.png') no-repeat; } /* Red1 Lucky Capsule */
		#capsule_wrap li.capsule8 { background: transparent url('Images/CapsuleShop/capsule8.png') no-repeat; } /* Red2 Lucky Capsule */
		#capsule_wrap li.capsule9 { background: transparent url('Images/CapsuleShop/capsule9.png') no-repeat; } /* Shadow1 */
		#capsule_wrap li.capsule10 { background: transparent url('Images/CapsuleShop/capsule10.png') no-repeat; } /* Shadow2 */
	</style>
<!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body oncontextmenu="return false" onselectstart="return false" onselect="return false" ondragstart="return false">
<div id="wrap">

<header id="header">
<h1><a href="capsule.php"><img src="Images/CapsuleShop/title_shop.png" alt="Capsule Shop"></a></h1>
<aside class="header_btn">
<a onClick="document.getElementById('wrap_winners').style.display='';" id="btnWinner" class="btn_winners" title="Winners">Winners</a>
<a onClick="document.getElementById('wrap_guide').style.display='';" title="Guide" class="btn_guide">Guide</a>
</aside>
</header>


<section id="container">

<div id="div_top">

<div class="display">
<p id="last-winner" class="latest_winner">
<img src="Images/CapsuleShop/ajax-loader.gif" alt="loading..." />
</p>
</div>

</div>
<div id="div_left">

<div class="machine">
<div class="machine_light"></div>
<div class="capsule_animation">
<ul id="capsule_wrap">

<li class="capsule capsule9"></li> 
<li class="capsule capsule10"></li> 
<li class="capsule capsule9"></li> 
<li class="capsule capsule10"></li> 
<li class="capsule capsule9"></li> 
<li class="capsule capsule10"></li> 
<li class="capsule capsule9"></li> 
<li class="capsule capsule10"></li> 
<li class="capsule capsule1"></li> 
<li class="capsule capsule3"></li> 
<li class="capsule capsule5"></li> 
<li class="capsule capsule2"></li> 
<li class="capsule capsule4"></li> 
<li class="capsule capsule6"></li> 
<li class="capsule capsule1"></li> 
<li class="capsule capsule3"></li> 
<li class="capsule capsule5"></li> 
<li class="capsule capsule8"></li> 
<li class="capsule capsule2"></li> 
<li class="capsule capsule4"></li> 
<li class="capsule capsule6"></li> 
</ul>
</div> 
<div class="machine_glass"></div> 
</div>

</div>
<div id="div_right">

<div class="capsule_list">
<h2>Capsule list</h2>
<div id="list">
<ul id="capsule-list">
<?php
$capsule_sql = $sql->prepare("SELECT TOP 7 * FROM capsule_tb ORDER BY id DESC");
$capsule_sql->execute();
while($capsule = $capsule_sql->fetch(PDO::FETCH_ASSOC))
{
	echo '
<li>
<p class="capsule_img"><img src="'.$capsule['image_set'].'" width="40" height="40" alt="'.$capsule['name'].'" /></p>
<p class="capsule_name"><a href="purchase.php?id='.$capsule['id'].'">'.$capsule['name'].'</a></p>
<p class="capsule_num"><span class="num_level1">'.$capsule['open_count'].'</span>/'.$capsule['max_times'].'</p>
</li>';
}
?>

</ul>
</div>
</div>

</div>

</section>


<footer id="footer">

<div class="my_capsule">
<h2>Capsule number</h2>
<div class="open">
<p id="my-capsule" class="num"><?php echo number_format($api->capsule_count($username)); ?></p>
<?php
if(empty($api->capsule_count($username)))
{
	echo '<p class="btn_empty">Open</p>';
}
else
{
	echo '<p class="btn_empty"><a href="capsuleopen.php">Open</a></p>';
}
?>
</div>
</div>


<div class="my_cash">
<h2>Points</h2>
<ul>
<li class="rpoint"><span class="hidden">R-Point : </span><?php echo number_format($userpoint); ?></li>
<li class="rcoin"><span class="hidden">R-Coin : </span><?php echo number_format($onlinepoint); ?></li>
</ul>
</div>

</footer>

</div>

<div id="wrap_winners" style="display:none;">
<div class="blackout"></div>
<div class="lightbox">
<iframe src='about:blank' mce_src='about:blank' scrolling='no' frameborder='0'></iframe>
<div class="container">
<h1>Goodluck</h1>
<div class="contents">
<ul id="winner-list">
</ul>
</div>
<div class="btn">
<a onClick="document.getElementById('wrap_winners').style.display='none';" title="Open more" class="btn_open">Close</a>
</div>
</div>
</div>
</div>


<div id="wrap_guide" style="display:none;">
<div class="blackout"></div>
<div class="lightbox">
<iframe src="about:blank" mce_src="about:blank" scrolling="no" frameborder="0"></iframe>
<div class="container">
<h1>GUIDE</h1>
<div class="contents">
<?php
include("include/guide.php");
?>
</div>
<div class="btn">
<a onClick="document.getElementById('wrap_guide').style.display='none';" title="Open more" class="btn_open">Close</a>
</div>
</div>
</div>
</div>


<div id="item-info" style="display:none; position:absolute;">

</div>

<script type="text/javascript" src="style/jquery-1.7.1.js"></script>
<script type="text/javascript" src="style/jquery.cookie.js"></script>
<script type="text/javascript">        
        document.onkeydown = function(e) {
            key = (e) ? e.keyCode : event.keyCode;

            if (key == 8 || key == 116) {
                if (e) {   //표준         
                    e.preventDefault();
                }
                else { //익스용
                    event.keyCode = 0;
                    event.returnValue = false;
                }
            }
        }
        
        $(document).ready(function() {
            $('#btnWinner').click(function() {
                $('#winner-list').empty();
                $.post('Ajax/winnerlist.php', {}, function(data) {
                    if (data != '') {
                        var result = eval('(' + data + ')');

                        for (var i = 0; i < result.length; i++) {
                            //$('#winner-list').append('<li><span class="data">[' + result[i].InsertDate + ']</span> <span class="id">' + result[i].InsertUser + '</span>님이 <span class="item">' + result[i].ItemName + '</span>에 당첨되었습니다.</li>');
                            $('#winner-list').append('<li><span class="data">[' + result[i].InsertDate + ']</span> <span class="id">' + result[i].InsertUser + '</span> Get item <span class="item">' + result[i].ItemName + '.</span></li>');
                        }
                    }

                    $('#wrap_winners').show();
                });
                //}).error(function(data) { alert(data.responseText); });
            });
        });
    </script>
<script type="text/javascript" src="style/jquery.spritely-0.1.js"></script>
<script type="text/javascript">
        var fnGetCapsuleWinnerMain = function() {
            $.post('Ajax/GetCapsuleWinnerMain.php', {}, function(data) {
                var result = eval('(' + data + ')');
                var html = '';

                if (result.ItemNum == 0) {
                    $('#last-winner').html('Latest Lucky Player : ');
                } else {
                    html = recent players: <span class="id">' + result.InsertUser + '</span>receive items <span class="item">' + result.ItemName + '</span>!';
                    $('#last-winner').html(html);
                }
            });
            //}).error(function(data) { alert(data.responseText); });

            //setTimeout('fnGetCapsuleWinnerMain()', 1000);
        };

        var fnUpdateCapsuleList = function() {
            var scrollNow = $('#list').scrollTop();
            $('#list').load('/CapsuleShop/Ajax/GetCapsuleShopList.aspx');
            setTimeout('fnUpdateCapsuleList()', 1000);
            $('#list').scrollTop(scrollNow);
        };

        $.fn.bounce = function(options) {

            var settings = $.extend({
                speed: 10
            }, options);

            return $(this).each(function() {

                var $this = $(this),
                    $parent = $this.parent(),
                    height = $parent.height(),
                    width = $parent.width(),
                    top = Math.floor(Math.random() * (height / 2)) + height / 6,
                    left = Math.floor(Math.random() * (width / 2)) + width / 4,
                    vectorX = settings.speed * (Math.random() > 0.5 ? 1 : -1),
                    vectorY = settings.speed * (Math.random() > 0.5 ? 2 : -1);

                // place initialy in a random location
                $this.css({
                    'top': top,
                    'left': left
                }).data('vector', {
                    'x': vectorX,
                    'y': vectorY
                });

                var move = function($e) {
                    var offset = $e.position(),
                        width = $e.width(),
                        height = $e.height(),
                        vector = $e.data('vector'),
                        $parent = $e.parent();

                    if (offset.left <= 0 && vector.x < 0) {
                        vector.x = -1 * vector.x;
                    }
                    if ((offset.left + width) >= $parent.width()) {
                        vector.x = -1 * vector.x;
                    }
                    if (offset.top <= 0 && vector.y < 0) {
                        vector.y = -1 * vector.y;
                    }
                    if ((offset.top + height) >= $parent.height()) {
                        vector.y = -1 * vector.y;
                    }

                    $e.css({
                        'top': offset.top + vector.y + 'px',
                        'left': offset.left + vector.x + 'px'
                    }).data('vector', {
                        'x': vector.x,
                        'y': vector.y
                    });

                    setTimeout(function() {
                        move($e);
                    }, 50);

                };

                move($this);
            });
        };

        $(function() {
            $('#capsule_wrap li.capsule1, #capsule_wrap li.capsule2').bounce({
                'speed': 5
            });

            $('#capsule_wrap li.capsule3, #capsule_wrap li.capsule4').bounce({
                'speed': 5
            });

            $('#capsule_wrap li.capsule5, #capsule_wrap li.capsule6').bounce({
                'speed': 5
            });

            $('#capsule_wrap li.capsule7, #capsule_wrap li.capsule8').bounce({
                'speed': 5
            });

            $('#capsule_wrap li.capsule9, #capsule_wrap li.capsule10').bounce({
                'speed': 5
            });

            $('#capsule_wrap li.capsule11, #capsule_wrap li.capsule12').bounce({
                'speed': 5
            });
        });

        $(document).ready(function() {
            fnGetCapsuleWinnerMain();
            fnUpdateCapsuleList();

            /*
            $('#btnCapsuleOpen').click(function() {
            $('embed').remove();
            $('body').append('<embed src="/CapsuleShop/Sound/Fanfare3.wav" autostart="true" hidden="true" loop="false">');
            location.href = '/CapsuleShop/Open.aspx';
            });
            */

            $('.capsule').sprite({ fps: 24, no_of_frames: 24 })
        });
    </script>
</body>
</html>