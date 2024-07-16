/***** Movies *****/
var movUrls = ['http://www.youtube.com/v/6ph_Lbi2uXU&hl=en&fs=0&rel=0', 'http://www.youtube.com/v/6ph_Lbi2uXU&amp;hl=en&amp;fs=0&amp;rel=0',
			   'http://www.youtube.com/v/6ph_Lbi2uXU&amp;hl=en&amp;fs=0&amp;rel=0', 'http://www.youtube.com/v/6ph_Lbi2uXU&hl=en&fs=0&rel=0'];
var movies = {
	prev: function () {
		var num = $('#movie_obj').attr('num');

		if (num == 0) {
			$('#movie_obj').html(movies.loadMov(movUrls.length - 1));
			$('#movie_obj').attr('num', movUrls.length - 1);
		}
		else {
			$('#movie_obj').html(movies.loadMov(num - 1));
			$('#movie_obj').attr('num', num - 1);
		}
	},
	next: function () {
		var num = $('#movie_obj').attr('num');
		
		if (num < movUrls.length - 1) {
			$('#movie_obj').html(movies.loadMov(parseInt(num, 10) + 1));
			$('#movie_obj').attr('num', parseInt(num, 10) + 1);
		}
		else {
			$('#movie_obj').html(movies.loadMov(0));
			$('#movie_obj').attr('num', '0');
		}
	},
	loadMov: function () {
		var num = arguments[0];
		var url = movUrls[num];
		var movStr =
		'<object>' +
		'<param name="movie" value="' + url + '" />' +
		'<param name="allowFullScreen" value="true" />' +
		'<param name="allowScriptAccess" value="always" />' +
		'<param name="bgcolor" value="#000000" />' +
		'<embed src="' + url + '" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="459" height="303" bgcolor="#000000" />' +
		'</object>';
		return movStr;
	}
};

/***** Game Features *****/
var featBgs = ['feat_1.jpg', 'feat_2.jpg', 'feat_3.jpg'];
var pathBg = 'http://image.gamescampus.com/shotonline/signup/';
var features = {
	timer: null,
	prev: function () {
		this.clearView();
		var num = $('#feat_bg').attr('num');

		if (num == 0) {
			$('#feat_bg').fadeTo(500, 0, function () {
				$('#feat_bg').css('background-image', 'url(' + pathBg + featBgs[featBgs.length - 1] + ')');
				$('#feat_bg').attr('num', featBgs.length - 1);
				$('#feat_bg').fadeTo(500, 100);
			});
		}
		else {
			$('#feat_bg').fadeTo(500, 0, function () {
				$('#feat_bg').css('background-image', 'url(' + pathBg + (featBgs[num - 1]) + ')');
				$('#feat_bg').attr('num', num - 1);
				$('#feat_bg').fadeTo(500, 100);
			});
		}
		this.nextView();
	},
	next: function () {
		this.clearView();
		var num = $('#feat_bg').attr('num');

		if (num < featBgs.length - 1) {
			$('#feat_bg').fadeTo(500, 0, function () {
				$('#feat_bg').css('background-image', 'url(' + pathBg + featBgs[parseInt(num, 10) + 1] + ')');
				$('#feat_bg').attr('num', parseInt(num, 10) + 1);
				$('#feat_bg').fadeTo(500, 100);
			});
		}
		else {
			$('#feat_bg').fadeTo(500, 0, function () {
				$('#feat_bg').css('background-image', 'url(' + pathBg + featBgs[0] + ')');
				$('#feat_bg').attr('num', 0);
				$('#feat_bg').fadeTo(500, 100);
			});
		}
		this.nextView();
	},
	nextView: function () {
		this.timer = setInterval('features.next()', 5000);
	},
	clearView: function () {
		try {
			if (Object(this.timer)) {
				clearInterval(this.timer);
			}
		}
		catch (e) {

		}
	}
};