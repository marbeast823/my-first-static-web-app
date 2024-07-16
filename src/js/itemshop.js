$(document).ready(function (arg) {
	$('#itemtop_cont').load('/ItemShop/TopCategory');
	$('#itemgm_cont').load('/ItemShop/TopGM?ItemNumList=8|52|116|68');
})


var itemtop = {
	len: 0,
	hin: function () {
		var _num = arguments[0];
		var _img_path = 'http://image.gamescampus.com/tankace/itemshop/';
		$('#opt' + _num).attr('src', _img_path + 'opt' + _num + '_on.gif');
	},
	hout: function () {
		var _num = arguments[0];
		var _img_path = 'http://image.gamescampus.com/tankace/itemshop/';
		$('#opt' + _num).attr('src', _img_path + 'opt' + _num + '_off.gif');
	},
	show_items: function () {
		var _num = arguments[0];
		var _list = arguments[1];
		$('#itemtop_cont').load('/ItemShop/TopCategory?CategoryNum=' + _num + '&ItemNumList=' + _list);
	},
	back: function () {
		$('#itemtop_cont').load('/ItemShop/TopCategory');
	}
};
