
function useSwf(swfUrl,swfW,swfH,wmode,id)
{
	document.writeln(getFlash(swfUrl,swfW,swfH,wmode,id))
}

function getFlash(swfUrl,swfW,swfH,wmode,id)
{
	var result = "";
	if(id==''||id===undefined){idStr='id=House'}else{idStr='id='+id}
	if(wmode){
		wmodeStr1='<param name="wmode" value="transparent" />'
		wmodeStr2='wmode=transparent'
	} else {
		wmodeStr1='<param name="wmode" value="opaque" />';
		wmodeStr2='wmode=opaque';
	}
	result += ('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" '+idStr+' width='+swfW+' height='+swfH+'>')
	result += ('<param name="movie" value="'+swfUrl+'" />')
	result += ('<param name="menu" value="false" />')
	result += ('<param name="allowScriptAccess" value="always" />')
	result += ('<param name="quality" value="best" />')
	result += (wmodeStr1)
	result += ('<embed src="'+swfUrl+'" width='+swfW+' height='+swfH+' '+idStr+' '+wmodeStr2+' menu=false allowScriptAccess=always quality=best type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />')
	result += ('</object>')

	return result;
}

function setPng24(obj) { 
	obj.width=obj.height=1; 
	obj.className=obj.className.replace(/\bpng24\b/i,''); 
	obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');" 
	obj.src='';  
	return ''; 
} 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// General Functions
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var UA = navigator.appName;
var UAver = navigator.appVersion; 
//var userAgent = navigator.userAgent.toLowerCase();

function setPng24(obj) { 
	obj.width=obj.height=1; 
	obj.className=obj.className.replace(/\bpng24\b/i,''); 
	obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ obj.src +"',sizingMethod='image');" 
	obj.src='';  
	return ''; 
} 



//로그인 
function LoginNexon()
{
    var formName = document.forms[0].name;
    var nexonID = document.getElementById('txtLocalID');
    var nexonPW = document.getElementById('txtPassword');

	if (nexonID.value == "") {
	    alert('아이디를 입력해 주세요.');
	    nexonID.focus();
	    return;
	}
	if (nexonPW.value == "") {
	    alert('비밀번호를 입력해 주세요.');
	    nexonPW.focus();
	    return;
	}
    var strPassword = GnxMKDPlus.GetText(formName, nexonPW.name);
	NgbLogin.Login(nexonID.value, strPassword);
}


//자동 창닫기 하자
function autoclose()
{
	var UAversion = parseInt(UAver.split(";")[1].split(" ")[2]) 
	if (UAversion < 7)
	{
		self.opener=self;self.close();
	}
	else
	{
		window.open('about:blank','_self').close(); 
	}
}

// JS_trim :: trim 함수
function JS_trim(data)
{
	for(var i = 0; i < data.length; i++)
	{
		var digit = data.charAt(i)
		if(digit == " ")
			continue; 
		else
			return 1;
	}
	return -1;
}

function jarijari(jaristr)
{
	if (jaristr.length == 1)
	  {
	   var jaristrstr = "0"+jaristr
	   return jaristrstr;
	  }
	else
	  {
		return jaristr;
	  }
}

// getCookie :: 쿠키를 읽어온다.
function getCookie(name)
{
	var nameOfCookie = name + "=";
	var x = 0;
	while (x <= document.cookie.length)
	{
		var y = (x+nameOfCookie.length);
		if (document.cookie.substring( x, y ) == nameOfCookie)
		{
			if ((endOfCookie=document.cookie.indexOf(";",y)) == -1)
			{
				endOfCookie = document.cookie.length;
			}
			return unescape(document.cookie.substring(y,endOfCookie));
		}

		x = document.cookie.indexOf(" ",x) + 1;
		if (x == 0)
		{
			break;
		}
	}
	return "";
}


function setCookieForToday(name, value){
var dtToday = new Date();
dtToday.setDate(dtToday.getDate() + 2);
document.cookie = name + "=" + escape(value) + "; path=/; expires=" + dtToday.toGMTString() + ";";
}


function SetCookie2(name, value) {

	var dtToday = new Date();
	dtToday.setDate(dtToday.getDate() + 7);

  var argv = SetCookie2.arguments;
  var argc = SetCookie2.arguments.length;
  var expires = (2 < argc) ? argv[2] : null;
  var path = (3 < argc) ? argv[3] : null;
  var domain = (4 < argc) ? argv[4] : null;
  var secure = (5 < argc) ? argv[5] : false;
  document.cookie = name + "=" + escape (value) +
      ((expires == null) ? "" : 
        ("; expires=" + dtToday.toGMTString())) +
      ((path == null) ? "" : ("; path=" + path)) +
      ((domain == null) ? "" : ("; domain=" + domain)) +
      ((secure == true) ? "; secure" : "");
} 


/*	setCookie */
function setCookie(name,value,expiredays)
{
	var todayDate = new Date();
	todayDate.setDate(todayDate.getDate() + expiredays);
	document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

// 쿠키 저장 : Permanent Cookie --> 되도록이면 사용하지 마세요. 쿠키 꼬입니다... -_-;;; --> 보안솔루션 해당
function setCookie_Permanent(nameVal, value)
{
	document.cookie = nameVal + "=" + escape(value) + ";expires=Thu, 30 Aug 2030 10:02:13 UTC; path=/; domain=nexon.com;";
}

function openimg(img)
{
	foto1= new Image();  
	foto1.src=(img);
	// 도메인이 달라 resize가 안됨...
	if((foto1.width!=0)&&(foto1.height!=0)){
		imgW = foto1.width;
		if(imgW>screen.width){imgW=screen.width}
		imgH = foto1.height;
		if(imgH>screen.height){imgH=screen.height}
		stringA="width="+imgW+",height="+imgH+",resizable=1,scrollbars=0,left=0,top=0";  
		window.open(baseUrl + "Common/pop(viewimg).aspx?imgfile="+img,"",stringA);
	} else {
		funzione="openimg('"+img+"')";    
		intervallo=setTimeout(funzione,20);  
	}
}

function openimg2(img,w,h)
{
	foto1= new Image();  
	foto1.src=(img);
	if((w!=0)&&(h!=0)){
		imgW = w;
		if(imgW>screen.width){imgW=screen.width}
		imgH = h;
		if(imgH>screen.height){imgH=screen.height}
		stringA="width="+imgW+",height="+imgH+",resizable=1,scrollbars=0,left=0,top=0";  
		window.open(baseUrl + "Common/pop(viewimg).aspx?imgfile="+img,"",stringA);
	} else {
		funzione="openimg('"+img+"')";    
		intervallo=setTimeout(funzione,20);  
	}
}

function clipboard_copy(text2copy) {
    var copied = false;
    if (window.clipboardData) {
        copied = clipboardData.setData('Text', text2copy);
    }
    else {
        var flashcopier = 'flashcopier';
        if(!document.getElementById(flashcopier)) {
            var divholder = document.createElement('div');
            divholder.id = flashcopier;
            document.body.appendChild(divholder);
        }
        document.getElementById(flashcopier).innerHTML = '';
        var divinfo = '<embed src="'+ baseUrl +'Common/Flash/_clipboard.swf" FlashVars="clipboard='+escape(text2copy)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
        document.getElementById(flashcopier).innerHTML = divinfo;
        copied = true;
    }
    
    if (copied) 
        alert('URL複製成功');
} 


function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


function viewImagePop(imgCtl){
	var img = new Image();
	img.onload = function(){
		var param = "width="+this.width+",height="+this.height+",scrollbars=0";
		if (this.height>700)
		{
			param = "width="+(this.width+20)+",height="+(this.height+20)+",scrollbars=yes";
		}
		var imgViewer = window.open("","imgViewer",param);
		imgViewer.location.href="/cbt/common/ImageViewer.aspx?imgSRC="+escape(imgCtl.src);
	}
	img.src = imgCtl.src;
}

function viewImagePop2(imgSrc){
	var img = new Image();	
	
	img.onload = function(){
		var param = "width="+this.width+",height="+this.height+",scrollbars=0";
		if (this.height>700)
		{
			param = "width="+(this.width+20)+",height="+(this.height+20)+",scrollbars=yes";
		}
		var imgViewer = window.open("","imgViewer",param);
		imgViewer.location.href="/cbt/common/ImageViewer.aspx?imgSRC="+escape(this.src);
	}
	img.src = imgSrc;	
}


function viewImageResize(imgCtl){
	// 이미지 사이즈 조절
	var screenshotImage = new Image();	
	screenshotImage.onload = function(){
    	// 600보다 크면 600으로 세팅
    	if(screenshotImage.width>600){
    		screenshotImage.width = 600;
    	}
    	imgCtl.width = screenshotImage.width;
	}
	
	screenshotImage.src = imgCtl.src;
}