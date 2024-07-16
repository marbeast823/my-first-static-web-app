Common = function() { }

Common.CheckEngNum = function(str) {
    var checkRe = /^[a-zA-Z0-9]+$/;
    return checkRe.test(str);
}

Common.PasswordCheck = function(password) {
    var permit = /^[a-zA-Z0-9]{4,20}$/;

    if (!permit.test(password)) {
        return false;
    }
    else {
        return true;
    }
}

Common.PasswordCheckLetter = function(password) {
    var permit = /(.)\1{3,}/;

    if (permit.test(password)) {
        return false;
    }
    else {
        return true;
    }
}

Common.IsEmail = function(Email) {
    return Email.search(/^\s*[\w\~\-\.]+\@[\w\~\-]+(\.[\w\~\-]+)+\s*$/g) >= 0;
}

Common.CheckOnlyNumber = function (value) {
    var checkRe = /^[0-9]+$/;
    return checkRe.test(value);
}

Common.escapeHTML = function(str) {
    str = str.replace(/&/g, "&amp;");
    str = str.replace(/</g, "&lt;");
    str = str.replace(/>/g, "&gt;");

    return str;
}

// Windows Popup
Common.OpenCenterWindow = function(winW, winH, sURL, winName, blnScrollbar) {
    var strScrolbar = "no";

    if (blnScrollbar) {
        strScrolbar = "yes";
    }

    var winL = (screen.width - winW) / 2;
    var winT = (screen.height - winH) / 2;

    var win = window.open(sURL, winName, "width=" + winW + ",height=" + winH + ",scrollbars=" + strScrolbar + ",resizable=no,top=" + winT + ", left=" + winL);

    //win.focus();
}


// ImageUpload
Common.CallImgUpload = function(strUrl) {
    Common.OpenCenterWindow(440, 240, strUrl, "RanWorldImgUpload", false);
}

Common.Loding = function(message) {
    $("#modal").modal({
        close: false,
        position: ["45%", "45%"],
        overlayId: 'modalBackground',
        containerId: 'modalContainer',
        onShow: function(dialog) {
            dialog.data.find('#message').append(message);
            dialog.data.find('#close').click(function() {
                $.modal.close();
            });
        }
    });
}

// flash //
Common.GetFlash = function(src, width, height) {
    var src, width, height;
    document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="' + width + '" height="' + height + '">');
    document.write('<param name="allowScriptAccess" value="always" />');
    document.write('<param name="movie" value="' + src + '">');
    document.write('<param name="quality" value="autohigh">');
    document.write('<param name="menu" value="false">');
    document.write('<param name="wmode" value="transparent">');
    document.write('<embed src="' + src + '"quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash type=application/x-shockwave-flash" width="' + width + '" height="' + height + '">');
    document.write('</embed>');
    document.write('</object>');
}

// flash //
Common.flashObject = function(file_name, flashVar, width, height) {
    document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="' + width + '" height="' + height + '">');
    document.write('<param name="movie" value="' + file_name + '">');
    document.write('<param name=FlashVars value="' + flashVar + '">');
    document.write('<param name="quality" value="high">');
    document.write('<param name="bgcolor" value="#ffffff">');
    document.write('<param name="menu" value="false">');
    document.write('<param name="wmode" value="transparent">');
    document.write('<param name="allowScriptAccess" value="always">');
    document.write('<param name="base" value=".">');
    document.write('<embed src="' + file_name + '" FlashVars="' + flashVar + '" width="' + width + '" height="' + height + '" quality="high" bgcolor="#ffffff" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowScriptAccess="always" allowNetworking="all" base="."></embed>');
    document.write('</object>');
}

Common.GoMenu = function(url) {
    location.href = url;
}

Common.WebAdminRecord = function(Category) {
    $.post(
        "/WebAdminRecord/Record.aspx",
        { "Category": Category },
        function(data) {
        }
    );
}

/* Number add Comma */
Common.Comma = function(n) {
    var reg = /(^[+-]?\d+)(\d{3})/;   // ???
    n += '';                          // ??? ???? ??

    while (reg.test(n))
        n = n.replace(reg, '$1' + ',' + '$2');

    return n;
}

function fn_checkEnter(event) {
    if (event.keyCode == '13') {
        LoginCheck();
    }
}