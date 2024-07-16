var common = {
	popup: null,
	create_popup: function (title, width, height) {
		var pWidth = isNaN(width) ? 600 : width;
		var pHeight = isNaN(height) ? 600 : height;

		var popup_box = $('<div/>').attr({ id: 'common_popup' }).appendTo($(document.body));
		var popup_close = $('<div/>').addClass('close').appendTo(popup_box);
		var popup_title = $('<span/>').addClass('title').appendTo(popup_box).text(title);
		var popup_content = $('<div/>').addClass('content').appendTo(popup_box).css({ width: pWidth, height: pHeight });

		this.popup = popup_box;
		return { "container": popup_box, "title": popup_title, "content": popup_content, "close": popup_close };
	},

	close_popup: function () {
		this.popup = null;
	}


};


var account = {
	name: 'account',
	signout_url: 'http://www.gamescampus.com/account/meta/user_signout.asp',
	signin_url: 'http://www.gamescampus.com/account/meta/user_signin.asp',
	input_bg: null,
	disable_el: null,

	signout: function () {
		location.href = this.signout_url + '?rtnurl=' + encodeURIComponent(location.href);
	},

	signin: function () {
		var _frm = $("#frm_signin")
		var _uid = $('#uid').val();
		var _pwd = $('#pwd').val();
		var _rtnuri = $('#rtnurl').val();
		var _saveid = $('#saveid:checked').val();

		if (_uid.length <= 0 || $.trim(_uid) == '') {
			alert('Please enter your User ID.');
			$('#uid').focus();
			return false;
		}

		if (_pwd.length <= 0 || $.trim(_pwd) == '') {
			alert('Please enter your Password.');
			$('#pwd').focus();
			return false;
		}

		//alert('sign in');
		_frm.attr('action', this.signin_url);
		this.disable();
		return true;
	},

	signinbox: function () {
		var _frm = $("#frm_signin_box")
		var _uid = $('#uid_box').val();
		var _pwd = $('#pwd_box').val();
		var _rtnuri = $('#rtnurl_box').val();
		var _saveid = $('#saveid_box:checked').val();

		if (_uid.length <= 0 || $.trim(_uid) == '') {
			alert('Please enter your User ID.');
			$('#uid_box').focus();
			return false;
		}

		if (_pwd.length <= 0 || $.trim(_pwd) == '') {
			alert('Please enter your Password.');
			$('#pwd_box').focus();
			return false;
		}

		//alert('sign in');
		_frm.attr('action', this.signin_url);
		this.disable();
		return true;
	},

	signup: function () {
		$('#signup_Form').validate({
			rules: {
				userid: { required: true, minlength: 4, remote: '/account/meta/validate_uid.asp' },
				password: { required: true, minlength: 6 },
				repassword: { equalTo: '#password' },
				nickname: { required: true },
				email: { email: true }
			},
			message: {
				userid: { required: 'Enter your ID', minlength: jQuery.format('{0} to 16 in characters.'), remote: jQuery.format('{0} is already exists.') },
				password: { required: 'Enter your Password', minlength: jQuery.format('{0} to 16 in characters.') },
				nickname: { required: 'Enter your Nickname' },
				email: { required: 'Invalid e-mail address.' }
			},
			submitHandler: function (frm) {
				frm.submit();
			},
			success: function (e) {

			}
		});
	},

	findinfo: function () {
		$('#myCampus_Wrap').hide().load('error/404739e.html').show();
	},

	clrbg: function (ele) {
		this.input_bg = $(ele).css('background-image');
		$(ele).css('background-image', 'none');
	},

	resbg: function (ele) {
		if ($(ele).val() == '') {
			$(ele).css('background-image', this.input_bg);
		}
	},

	disable: function () {
		var styles = {
			"position": "absolute",
			"top": "0px",
			"left": "0px",
			"width": "100%",
			"height": "100%",
			"text-align": "center",
			"background-color": "#000000"
		};
		this.disable_el = $("<div/>").attr("id", "login_disalbe").css(styles).fadeTo(10, 0.5).appendTo($('div.gnb .body .sub .signin'));
		$("<img />").attr("src", "/images/global/gnb/waiting.gif").css({ "margin": "50px auto" }).appendTo(this.disable_el);
	},

	getSecurityQuestion: function (selectnum) {
		$('#securityquestionlist').load('account/meta/code_securityquestionb2c7.html?selectnum=' + selectnum);
	},
	getCountry: function (selectnum) {
		$('#countrylist').load('account/meta/code_countryb2c7.html?selectnum=' + selectnum);
	},
	getCountryState: function (selectnum, CountryNum) {
		$('#countrystatelist').load('account/meta/code_countrystateb2c7.html?selectnum=' + selectnum + '&countrynum=' + CountryNum);
	}
};

var cookies = {
	name: "cookies",
	set: function(name, value) {
		var argc = arguments.length;
		var argv = arguments;
		var expires = (argc > 2) ? argv[2] : null;
		var path = (argc > 3) ? argv[3] : null;
		var domain = (argc > 4) ? argv[4] : null;
		var secure = (argc > 5) ? argv[5] : false;
		var encode = (argc > 6) ? argv[6] : true;

		document.cookie = name + "=" + (encode ? escape(value) : value) +
				((expires == null) ? "" : ("; expires =" + expires.toGMTString())) +
				((path == null) ? "" : ("; path =" + path)) +
				((domain == null) ? "" : ("; domain =" + domain)) +
				((secure == true) ? "; secure" : "");
	},
	get: function(name) {
		var dcookie = document.cookie;
		var cname = name + "=";
		var clen = dcookie.length;
		var cbegin = 0;
		
		while (cbegin < clen) {
			var vbegin = cbegin + cname.length;
			if (dcookie.substring(cbegin, vbegin) == cname) {
				var vend = dcookie.indexOf(";", vbegin);
				if (vend == -1) vend = clen;
				return unescape(dcookie.substring(vbegin, vend));
			}
			cbegin = dcookie.indexOf(" ", cbegin) + 1;
			if (cbegin == 0) break;
		}
		return "";
	}
};

(function($) {
	$.fn.clearForm = function() {
		return this.each(function() {
			$(':input', this).each(function() {
				var type = this.type, tag = this.tagName.toLowerCase();
				if (type == 'text' || type == 'password' || tag == 'textarea')
					this.value = '';
				else if (type == 'checkbox' || type == 'radio')
					this.checked = false;
				else if (tag == 'select')
					this.selectedIndex = -1;
			});
		});
	};
});

var jsload = {
	loaded: [],
	load: function() {
		var sc = $('script[src *= /"js/common.js"]');

		var idx = arguments.length;
		while (idx-- > 0) {
			if ($.inArray(arguments[idx], this.loaded) == -1) {
				this.loaded.push(arguments[idx]);
				sc.after('<script type="text/javascript" src="/js/' + arguments[idx] + '.js"></script>');
			}
		}
	}
};

function parseURL(url) {
	var a = document.createElement('a');
	a.href = url;
	return {
		source: url,
		protocol: a.protocol.replace(':', ''),
		host: a.hostname,
		port: a.port,
		query: a.search,
		params: (function () {
			var ret = {},
	seg = a.search.replace(/^\?/, '').split('&'),
	len = seg.length, i = 0, s;
			for (; i < len; i++) {
				if (!seg[i]) { continue; }
				s = seg[i].split('=');
				ret[s[0]] = s[1];
			}
			return ret;
		})(),
		file: (a.pathname.match(/\/([^\/?#]+)$/i) || [, ''])[1],
		hash: a.hash.replace('#', ''),
		path: a.pathname.replace(/^([^\/])/, '/$1'),
		relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [, ''])[1],
		segments: a.pathname.replace(/^\//, '').split('/')
	};
}
