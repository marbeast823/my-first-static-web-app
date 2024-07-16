var marquee_obj = null;
var marquee_txt = '';

$(function () {

	var isIE = false;
	jQuery.each(jQuery.browser, function (i) {
		if ($.browser.msie) {
			isIE = true;
		}
	});

	$(".news_ticker").jCarouselLite({
		vertical: true,
		hoverPause: true,
		mouseWheel: true,
		visible: 3,
		auto: 3000,
		speed: 1000,
		beforeStart: function (obj) {
			ele = obj[1];
			child = $('div', ele); //ele.firstChild;  

			$(ele).animate({ opacity: 0.7 }, 800, function () {
				$(ele).css({ background: 'url(http://image.gamescampus.com/tankace/common/bg_newsticker_off.gif) no-repeat', opacity: 1 })
			});

			$(child).css({ 'font-weight': 'normal' }).animate({ opacity: 1 }, 700, function () { FadeUp(child, '5d5d5d', 100); });
		},
		afterEnd: function (obj) {
			ele = obj[1];
			child = $('div', ele); //ele.firstChild;

			$(ele).css({ opacity: 0.25, background: 'url(http://image.gamescampus.com/tankace/common/bg_newsticker_on.gif) no-repeat' }).animate({ opacity: 1 }, 1000);
			if (isIE) {
				$(child).css({ color: '#9e561c' }).animate({ opacity: 1 }, 1000, function () { FadeUp(child, '9e561c', 100); });
			}
			else {
				$(child).css({ color: '#9e561c', 'font-weight': 'bold' }).animate({ opacity: 1 }, 1000, function () { FadeUp(child, '9e561c', 100); });
			}
		},
		onLoad: function (obj) {
			ele = obj[1];
			child = $('div', ele); //ele.firstChild;

			$(ele).css({ opacity: 0.25, background: 'url(http://image.gamescampus.com/tankace/common/bg_newsticker_off.gif) no-repeat' }).animate({ opacity: 1 }, 1000);
			if (isIE) {
				$(child).css({ color: '#9e561c' }).animate({ opacity: 1 }, 1000, function () { FadeUp(child, '9e561c', 100); });
			}
			else {
				$(child).css({ color: '#9e561c', 'font-weight': 'bold' }).animate({ opacity: 1 }, 1000, function () { FadeUp(child, '9e561c', 100); });
			}
		}
	});

	var isMarquee = false;
	var oriHtml = '';

	$("div", ".news_ticker").hover(
		function () {

			if (!isMarquee) {
				oriHtml = this.innerHTML;
				$(this).html('<marquee behavior="scroll" scrollamount="5" direction="left" >' + this.innerHTML + '</marquee>');
			}
		},
		function () {
			$(this).html(oriHtml);
		}
	);
});


(function($) {                                          // Compliant with jquery.noConflict()
    $.fn.jCarouselLite = function(o) {
        o = $.extend({
            btnPrev: null,
            btnNext: null,
            btnGo: null,
            mouseWheel: false,
            auto: null,
            hoverPause: false,

            speed: 200,
            easing: null,

            vertical: false,
            circular: true,
            visible: 3,
            start: -2,
            scroll: 1,

            beforeStart: null,
            afterEnd: null,
            onLoad: null
        }, o || {});

        return this.each(function() {                           // Returns the element collection. Chainable.

            var running = false, animCss = o.vertical ? "top" : "left", sizeCss = o.vertical ? "height" : "width";
            var div = $(this), ul = $("ul", div), tLi = $("li", ul), tl = tLi.size(), v = o.visible;

            if (o.circular) {
                ul.prepend(tLi.slice(tl - v + 1).clone()).append(tLi.slice(0, o.scroll).clone());
                o.start += v - 1;
            }

            var li = $("li", ul), itemLength = li.size(), curr = o.start;
            //div.css("visibility", "visible");

            //li.css({overflow: "hidden", float: o.vertical ? "none" : "left"});
            //ul.css({margin: "0", padding: "0", position: "relative", "list-style-type": "none", "z-index": "1"});
            ul.css({ "position": "relative", "list-style-type": "none", "z-index": "1" });
            //div.css({overflow: "hidden", position: "relative", "z-index": "2", left: "0px"});
            div.css({ "overflow": "hidden", "position": "relative", "z-index": "2", "left": "0px" });

            var liSize = o.vertical ? height(li) : width(li);   // Full li size(incl margin)-Used for animation
            var ulSize = liSize * itemLength;                   // size of full ul(total length, not just for the visible items)
            var divSize = liSize * v;                           // size of entire div(total length for just the visible items)


            //li.css({width: li.width(), height: li.height()});
            ul.css(sizeCss, ulSize + "px").css(animCss, -(curr * liSize));
            //ul.css(animCss, -(curr*liSize));
            //div.css(sizeCss, divSize+"px");                     // Width of the DIV. length of visible images

            if (o.btnPrev) {
                $(o.btnPrev).click(function() {
                    return go(curr - o.scroll);
                });
                if (o.hoverPause) {
                    $(o.btnPrev).hover(function() { stopAuto(); }, function() { startAuto(); });
                }
            }


            if (o.btnNext) {
                $(o.btnNext).click(function() {
                    return go(curr + o.scroll);
                });
                if (o.hoverPause) {
                    $(o.btnNext).hover(function() { stopAuto(); }, function() { startAuto(); });
                }
            }

            if (o.btnGo)
                $.each(o.btnGo, function(i, val) {
                    $(val).click(function() {
                        return go(o.circular ? o.visible + i : i);
                    });
                });

            if (o.mouseWheel && div.mousewheel)
                div.mousewheel(function(e, d) {
                    return d > 0 ? go(curr - o.scroll) : go(curr + o.scroll);
                });

            var autoInterval;

            function startAuto() {
                stopAuto();

                autoInterval = setInterval(function() {
                    go(curr + o.scroll);
                }, o.auto + o.speed);
            };

            function stopAuto() {
                clearInterval(autoInterval);
            };

            function startScroll(ele) {
                alert(typeof (ele));
            };

            function stopScroll() {
                alert(typeof (ele));
            };

            if (o.auto) {
                if (o.hoverPause) {
                    div.hover(function() { stopAuto(); }, function() { startAuto(); });
                }
                startAuto();
            };

            if (o.onLoad) {
                o.onLoad.call(this, vis());
            }

            function vis() {
                return li.slice(curr).slice(0, v);
            };

            function go(to) {

                if (!running) {
                    if (o.beforeStart) {
                        o.beforeStart.call(this, vis());
                    }

                    if (o.circular) {            // If circular we are in first or last, then goto the other end
                        if (to < 0) {           // If before range, then go around
                            ul.css(animCss, -((curr + tl) * liSize) + "px");
                            curr = to + tl;
                        } else if (to > itemLength - v) { // If beyond range, then come around
                            ul.css(animCss, -((curr - tl) * liSize) + "px");
                            curr = to - tl;
                        } else {
                            curr = to;
                        }
                    } else {                    // If non-circular and to points to first or last, we just return.
                        if (to < 0 || to > itemLength - v) return;
                        else curr = to;
                    }                           // If neither overrides it, the curr will still be "to" and we can proceed.

                    running = true;

                    ul.animate(
                    animCss == "left" ? { left: -(curr * liSize)} : { top: -(curr * liSize) }, o.speed, o.easing,
                    function() {
                        if (o.afterEnd)
                            o.afterEnd.call(this, vis());
                        running = false;
                    }
                );
                    // Disable buttons when the carousel reaches the last/first, and enable when not
                    if (!o.circular) {
                        $(o.btnPrev + "," + o.btnNext).removeClass("disabled");
                        $((curr - o.scroll < 0 && o.btnPrev)
                        ||
                       (curr + o.scroll > itemLength - v && o.btnNext)
                        ||
                       []
                     ).addClass("disabled");
                    }

                }
                return false;
            };

        });
    };

    function css(el, prop) {
        return parseInt($.css(el[0], prop)) || 0;
    };
    function width(el) {
        return el[0].offsetWidth + css(el, 'marginLeft') + css(el, 'marginRight');
    };
    function height(el) {
        return el[0].offsetHeight + css(el, 'marginTop') + css(el, 'marginBottom');
    };

})(jQuery);


function hex2dec(hex) { return (parseInt(hex, 16)); }
function dec2hex(dec) { return (dec < 16 ? "0" : "") + dec.toString(16); }
function getColor(start, end, percent) {
    var r1 = hex2dec(start.slice(0, 2));
    var g1 = hex2dec(start.slice(2, 4));
    var b1 = hex2dec(start.slice(4, 6));

    var r2 = hex2dec(end.slice(0, 2));
    var g2 = hex2dec(end.slice(2, 4));
    var b2 = hex2dec(end.slice(4, 6));

    var pc = percent / 100;

    var r = Math.floor(r1 + (pc * (r2 - r1)) + .5);
    var g = Math.floor(g1 + (pc * (g2 - g1)) + .5);
    var b = Math.floor(b1 + (pc * (b2 - b1)) + .5);

    return ("#" + dec2hex(r) + dec2hex(g) + dec2hex(b));
}

function getCurrentElementColor(color) {
    if (color.charAt(0) == "#")      //color is of type #rrggbb
        color = color.slice(1, 8);
    else if (color.charAt(0) == "r") //color is of type rgb(r, g, b)
    {
        var v1 = color.slice(color.indexOf("(") + 1, color.indexOf(")"));
        var v2 = v1.split(",");
        color = (dec2hex(parseInt(v2[0])) + dec2hex(parseInt(v2[1])) + dec2hex(parseInt(v2[2])));
    }

    return color;
}

function FadeUp(el, color, interval) {
    interval = interval ? interval : 1000;
    var step = interval / 100;
    var pre_color = getCurrentElementColor($(el).css('color'));

    for (i = 0; i < step; i++) {
        pc = ((i + 1) / step) * 100;
        gColor = getColor(pre_color, color, pc);
        $(el).css('color', gColor);
    }
}

