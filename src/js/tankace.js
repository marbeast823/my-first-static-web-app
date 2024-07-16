var mnb = {
	hover: function (num) {
		mnb.clr();
		mnb.set(num);
	},
	set: function (num) {
		$('#mnb' + num + 'sub').show().hover(function () { }, function () { mnb.clr(); });
	},
	clr: function () {
		$('#mnb1sub,#mnb2sub,#mnb3sub,#mnb4sub,#mnb5sub,#mnb6sub').hide();
	}
};

$(document).ready(function () {
	/* Mnb */
	$('div.mnb').hover(function () { }, function () { mnb.clr(); });

	/* Login box */
	$('#uid, #pwd').focus(function () { account.clrbg(this); }).blur(function () { account.resbg(this); });
	/* News Ticker */
	$('#news_ticker_cont').load('news/newsticker/index.html', function () {
		$.getScript('js/newsticker.js');
	});
	/* Mate Ticker */
	$('#mate_ticker_cont').load('community/mateticker/index.html', function () {
		$(".ticker_cont").easySlider({
			controlsBefore: '<p id="controls">',
			controlsAfter: '</p>',
			speed: 600,
			auto: true,
			continuous: true
		});
	});
});
