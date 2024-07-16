var rootPath = '/';


function IsLoginUser() {
    return (UI_LOGIN == true);
}
function IsTester() {
    return (UI_TESTER == true);
}
function IsIssueOpen() {
    return (ISSUE_OPEN == true);
}

function menu(menuId) {
    switch(menuId) {
    	
		case 4:     // game store
		    location.href = 'choose.php';
		    break;
		case 5:     // game store
		    location.href = 'mailto:rivalran2@yahoo.com';
		    break;
        case 0:     
            location.href = rootPath;
            break;
        case 901:     
            location.href = rootPath + 'agent/?id=19';
            break;
        case 902:     
            window.open('/show.aspx?articleid=101',"_blank");
            break;
        case 903:     
            location.href = rootPath + 'ranking.php';
            break;
        case 101:
            window.open('http://forum.rivalran.net/index.php?board=21.0',"_blank");
            break;
        case 1001:     
            location.href = rootPath + 'register.php';
            break;
        case 1002:     
            location.href =rootPath + 'lostpw.php';
            break;
        case 1005:     
            location.href =rootPath + 'lostpw.php';
            break;
        case 1006:     
            location.href =rootPath + 'logout.php';
            break;
        case 1007:     
            location.href =rootPath + 'logout.php';
            break;
        case 1123:     
            top.location.href =rootPath + 'manage.php';
            break;
        case 1:    
            location.href = rootPath + 'index.php';
		    break;
		case 11:     // ????
		    location.href = rootPath + 'more.php';
		    break;
	
		    
		case 20:     // ????
		    location.href = rootPath + '';
		    break;
		case 21:     // ???
		    location.href = rootPath + 'ranking.php';
		    break;

		case 22:     // ??
		    location.href = rootPath + 'register.php';
		    break;
		case 23:     // ?????
		    location.href = rootPath + 'register.php';
		    break;			
		case 24:     // ????
		    location.href = rootPath + 'lostpw.php';
		    break;
		case 25:     // ??
		    location.href = rootPath + 'exit.php';
		    break;
		    
		case 30:	
		case 31:	//????
		    location.href = 'reborn.php';
		    break;
		case 32: 	//????
		    location.href = rootPath + 'votereward.php';
		    break;
		case 33: 	//????
		    location.href = rootPath + 'resetstats.php';
		    break;
		case 34: 	//??
		    location.href = rootPath + 'addstats.php';
		    break;
		case 35:	//????
		    location.href = rootPath + 'webxb.php';
		    break;

		case 36: 	//??
		    location.href = rootPath + 'logs.php';
		    break;
		case 37: 	//??
		    location.href = rootPath + 'webpd.php';
		    break;
    		case 38: 	//??
		    location.href = rootPath + 'addstats.php';
		    break;
		case 40:     // ????
		    location.href = rootPath + 'download.php';
		    break;
		case 41:     // ????
		    location.href = rootPath + 'download.php';
		    break;
		case 42:     // ????
		    location.href = rootPath + 'download.php';
		    break;
		case 43:     // ??
		    alert('????!'); //location.href = rootPath + 'wallpaper.aspx';
		    break;
		case 44:     // ????
		    location.href = rootPath + 'addstats.php';
		    break;
		case 45:     // ????
		    location.href = rootPath + 'controlpanel.php?secure=resetpk';
		    break;
		case 50: 
		    location.href = rootPath + 'controlpanel.php';
		    break;
		case 51:     // ??
		    location.href = rootPath + 'changeschool.php';
		    break;
		case 512:     // ??
		    location.href = 'choose.php';
		    break;
		case 52:     // ??
		    location.href = rootPath + 'controlpanel.php';
		    break;
		case 53:     // ??
		    location.href = rootPath + 'controlpanel.php';
		    break;
		case 54:     // ??
		    location.href = rootPath + 'controlpanel.php';
		    break;
		case 55:     // ??
		    location.href = rootPath + 'controlpanel.php';
		    break;
		    
		case 60:      // ????
		    location.href = rootPath + 'donation.php';
		    break;
		case 61:      // ????
		    window.open('http://forum.rivalran.net/index.php?topic=240.0',"_blank");
		    break;
		case 62:      // ????
		    window.open('http://forum.rivalran.net/index.php?topic=240.0',"_blank");
		    break;
		case 63:      // ????
		    location.href = rootPath + 'agent.php?secure=agent2';
		    break;
		case 64:      // ????
		    location.href = rootPath + 'donation.php?secure=donationlist';
		    break;
		case 65:      // ????
		    location.href = rootPath + 'donation.php';
		    break;
	        case 66:     // ??
		    location.href = rootPath + 'controlpanel.php?option=changeschool';
		    break;
 		 case 67:     // ??
		    location.href = rootPath + 'controlpanel.php?option=changeclass';
		    break;
		case 2010:	//????
		    location.href = 'changepass.php';
		    break;
		case 1000:      
		    alert('');
		    break;
		    
		default:
		    location.href = rootPath +'';
		    break;
    }
}


function doNothing() { }
