if (typeof (jsload) != 'object') {
	//setTimeOut("jsload.load('ui.scroll','ui.selectbox')", 1000);
}
else {
	//jsload.load('ui.scroll', 'ui.selectbox')
}

var movie = {
	clsName: 'movie_dialog',
	instance: null,
	dialog: null,
	trailer: function () {
		var url = '/home/movietrailer';
		this.open(url);
	},

	open: function () {
		if (this.dialog != null) this.destroy();

		var $el = $('<div></div>').appendTo(document.body)
			.addClass('disable_wrap').css({
				height: this.height() + 'px',
				opacity: 0.3,
				backgroundColor: '#000'
			});

		var url = arguments[0];
		var $dialog_wrap = $('<div></div>').appendTo(document.body).addClass(this.clsName)
		var $dialog = $('<div></div>').load(url).appendTo($dialog_wrap).addClass('dialog_wrap');
		this.instance = $el;
		this.dialog = $dialog_wrap;
	},

	close: function () {
		this.destroy();
	},

	destroy: function () {
		$([document, window]).unbind('.disable_wrap');
		$([document, window]).unbind('.movie_dialog');
		this.instance.remove();
		this.dialog.remove();
	},

	height: function () {
		// handle IE 6
		if ($.browser.msie && $.browser.version < 7) {
			var scrollHeight = Math.max(
				document.documentElement.scrollHeight,
				document.body.scrollHeight
			);
			var offsetHeight = Math.max(
				document.documentElement.offsetHeight,
				document.body.offsetHeight
			);

			if (scrollHeight < offsetHeight) {
				return $(window).height();
			} else {
				return scrollHeight;
			}
			// handle "good" browsers
		} else {
			return $(document).height();
		}
	},

	width: function () {
		// handle IE 6
		if ($.browser.msie && $.browser.version < 7) {
			var scrollWidth = Math.max(
				document.documentElement.scrollWidth,
				document.body.scrollWidth
			);
			var offsetWidth = Math.max(
				document.documentElement.offsetWidth,
				document.body.offsetWidth
			);

			if (scrollWidth < offsetWidth) {
				return $(window).width();
			} else {
				return scrollWidth;
			}
			// handle "good" browsers
		} else {
			return $(document).width();
		}
	}
};

var live = {
	input_bg: null,

	list: function () {
		$('#live_wrap').load('/home/livecomment');
	},

	submit: function () {
		var isLogin = arguments[0];
		var frm = document.getElementById('frmComment');
		var comment = frm.comment.value;
		var nickname = frm.nickname.value;

		if (isLogin != 1) {
			alert('To post a message, you need to login or create nickname first.');
			return false;
		}

		if (comment == "") {
			alert('Comment field cannot be left blank.');
			$('#comment').focus();
			return false;
		}
		$.post("/home/livecommentwrite",
            $("#frmComment").serialize(),
            function (data) {
            	alert(data.message);
            	if (data.result) {
            		live.list();
            		$('#comment').val("");
            	}
            },
            "json");

		return false;
	},

	clrbg: function (ele) {
		this.input_bg = $(ele).css('background-image');
		$(ele).css('background-image', 'none');
	},

	resbg: function (ele) {
		if ($(ele).val() == '') {
			$(ele).css('background-image', this.input_bg);
		}
	}
};

$(document).ready(function () {
	$('#comment').focus(function () { live.clrbg(this); }).blur(function () { live.resbg(this); });
	live.list();
});