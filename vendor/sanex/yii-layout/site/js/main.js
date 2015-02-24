window.Modernizr=function(e,t,n){function r(e){b.cssText=e}function o(e,t){return r(E.join(e+";")+(t||""))}function i(e,t){return typeof e===t}function a(e,t){return!!~(""+e).indexOf(t)}function c(e,t){for(var r in e){var o=e[r];if(!a(o,"-")&&b[o]!==n)return"pfx"==t?o:!0}return!1}function s(e,t,r){for(var o in e){var a=t[e[o]];if(a!==n)return r===!1?e[o]:i(a,"function")?a.bind(r||t):a}return!1}function l(e,t,n){var r=e.charAt(0).toUpperCase()+e.slice(1),o=(e+" "+S.join(r+" ")+r).split(" ");return i(t,"string")||i(t,"undefined")?c(o,t):(o=(e+" "+$.join(r+" ")+r).split(" "),s(o,t,n))}function u(){m.input=function(n){for(var r=0,o=n.length;o>r;r++)N[n[r]]=!!(n[r]in x);return N.list&&(N.list=!(!t.createElement("datalist")||!e.HTMLDataListElement)),N}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),m.inputtypes=function(e){for(var r,o,i,a=0,c=e.length;c>a;a++)x.setAttribute("type",o=e[a]),r="text"!==x.type,r&&(x.value=w,x.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(o)&&x.style.WebkitAppearance!==n?(g.appendChild(x),i=t.defaultView,r=i.getComputedStyle&&"textfield"!==i.getComputedStyle(x,null).WebkitAppearance&&0!==x.offsetHeight,g.removeChild(x)):/^(search|tel)$/.test(o)||(r=/^(url|email)$/.test(o)?x.checkValidity&&x.checkValidity()===!1:x.value!=w)),j[e[a]]=!!r;return j}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d,f,p="2.8.3",m={},h=!0,g=t.documentElement,v="modernizr",y=t.createElement(v),b=y.style,x=t.createElement("input"),w=":)",C={}.toString,E=" -webkit- -moz- -o- -ms- ".split(" "),k="Webkit Moz O ms",S=k.split(" "),$=k.toLowerCase().split(" "),T={svg:"http://www.w3.org/2000/svg"},P={},j={},N={},M=[],D=M.slice,F=function(e,n,r,o){var i,a,c,s,l=t.createElement("div"),u=t.body,d=u||t.createElement("body");if(parseInt(r,10))for(;r--;)c=t.createElement("div"),c.id=o?o[r]:v+(r+1),l.appendChild(c);return i=["&#173;",'<style id="s',v,'">',e,"</style>"].join(""),l.id=v,(u?l:d).innerHTML+=i,d.appendChild(l),u||(d.style.background="",d.style.overflow="hidden",s=g.style.overflow,g.style.overflow="hidden",g.appendChild(d)),a=n(l,e),u?l.parentNode.removeChild(l):(d.parentNode.removeChild(d),g.style.overflow=s),!!a},A=function(t){var n=e.matchMedia||e.msMatchMedia;if(n)return n(t)&&n(t).matches||!1;var r;return F("@media "+t+" { #"+v+" { position: absolute; } }",function(t){r="absolute"==(e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).position}),r},z=function(){function e(e,o){o=o||t.createElement(r[e]||"div"),e="on"+e;var a=e in o;return a||(o.setAttribute||(o=t.createElement("div")),o.setAttribute&&o.removeAttribute&&(o.setAttribute(e,""),a=i(o[e],"function"),i(o[e],"undefined")||(o[e]=n),o.removeAttribute(e))),o=null,a}var r={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return e}(),I={}.hasOwnProperty;f=i(I,"undefined")||i(I.call,"undefined")?function(e,t){return t in e&&i(e.constructor.prototype[t],"undefined")}:function(e,t){return I.call(e,t)},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if("function"!=typeof t)throw new TypeError;var n=D.call(arguments,1),r=function(){if(this instanceof r){var o=function(){};o.prototype=t.prototype;var i=new o,a=t.apply(i,n.concat(D.call(arguments)));return Object(a)===a?a:i}return t.apply(e,n.concat(D.call(arguments)))};return r}),P.flexbox=function(){return l("flexWrap")},P.flexboxlegacy=function(){return l("boxDirection")},P.canvas=function(){var e=t.createElement("canvas");return!(!e.getContext||!e.getContext("2d"))},P.canvastext=function(){return!(!m.canvas||!i(t.createElement("canvas").getContext("2d").fillText,"function"))},P.webgl=function(){return!!e.WebGLRenderingContext},P.touch=function(){var n;return"ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch?n=!0:F(["@media (",E.join("touch-enabled),("),v,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(e){n=9===e.offsetTop}),n},P.geolocation=function(){return"geolocation"in navigator},P.postmessage=function(){return!!e.postMessage},P.websqldatabase=function(){return!!e.openDatabase},P.indexedDB=function(){return!!l("indexedDB",e)},P.hashchange=function(){return z("hashchange",e)&&(t.documentMode===n||t.documentMode>7)},P.history=function(){return!(!e.history||!history.pushState)},P.draganddrop=function(){var e=t.createElement("div");return"draggable"in e||"ondragstart"in e&&"ondrop"in e},P.websockets=function(){return"WebSocket"in e||"MozWebSocket"in e},P.rgba=function(){return r("background-color:rgba(150,255,150,.5)"),a(b.backgroundColor,"rgba")},P.hsla=function(){return r("background-color:hsla(120,40%,100%,.5)"),a(b.backgroundColor,"rgba")||a(b.backgroundColor,"hsla")},P.multiplebgs=function(){return r("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(b.background)},P.backgroundsize=function(){return l("backgroundSize")},P.borderimage=function(){return l("borderImage")},P.borderradius=function(){return l("borderRadius")},P.boxshadow=function(){return l("boxShadow")},P.textshadow=function(){return""===t.createElement("div").style.textShadow},P.opacity=function(){return o("opacity:.55"),/^0.55$/.test(b.opacity)},P.cssanimations=function(){return l("animationName")},P.csscolumns=function(){return l("columnCount")},P.cssgradients=function(){var e="background-image:",t="gradient(linear,left top,right bottom,from(#9f9),to(white));",n="linear-gradient(left top,#9f9, white);";return r((e+"-webkit- ".split(" ").join(t+e)+E.join(n+e)).slice(0,-e.length)),a(b.backgroundImage,"gradient")},P.cssreflections=function(){return l("boxReflect")},P.csstransforms=function(){return!!l("transform")},P.csstransforms3d=function(){var e=!!l("perspective");return e&&"webkitPerspective"in g.style&&F("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(t){e=9===t.offsetLeft&&3===t.offsetHeight}),e},P.csstransitions=function(){return l("transition")},P.fontface=function(){var e;return F('@font-face {font-family:"font";src:url("https://")}',function(n,r){var o=t.getElementById("smodernizr"),i=o.sheet||o.styleSheet,a=i?i.cssRules&&i.cssRules[0]?i.cssRules[0].cssText:i.cssText||"":"";e=/src/i.test(a)&&0===a.indexOf(r.split(" ")[0])}),e},P.generatedcontent=function(){var e;return F(["#",v,"{font:0/0 a}#",v,':after{content:"',w,'";visibility:hidden;font:3px/1 a}'].join(""),function(t){e=t.offsetHeight>=3}),e},P.video=function(){var e=t.createElement("video"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),n.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),n.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""))}catch(r){}return n},P.audio=function(){var e=t.createElement("audio"),n=!1;try{(n=!!e.canPlayType)&&(n=new Boolean(n),n.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),n.mp3=e.canPlayType("audio/mpeg;").replace(/^no$/,""),n.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),n.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(r){}return n},P.localstorage=function(){try{return localStorage.setItem(v,v),localStorage.removeItem(v),!0}catch(e){return!1}},P.sessionstorage=function(){try{return sessionStorage.setItem(v,v),sessionStorage.removeItem(v),!0}catch(e){return!1}},P.webworkers=function(){return!!e.Worker},P.applicationcache=function(){return!!e.applicationCache},P.svg=function(){return!!t.createElementNS&&!!t.createElementNS(T.svg,"svg").createSVGRect},P.inlinesvg=function(){var e=t.createElement("div");return e.innerHTML="<svg/>",(e.firstChild&&e.firstChild.namespaceURI)==T.svg},P.smil=function(){return!!t.createElementNS&&/SVGAnimate/.test(C.call(t.createElementNS(T.svg,"animate")))},P.svgclippaths=function(){return!!t.createElementNS&&/SVGClipPath/.test(C.call(t.createElementNS(T.svg,"clipPath")))};for(var L in P)f(P,L)&&(d=L.toLowerCase(),m[d]=P[L](),M.push((m[d]?"":"no-")+d));return m.input||u(),m.addTest=function(e,t){if("object"==typeof e)for(var r in e)f(e,r)&&m.addTest(r,e[r]);else{if(e=e.toLowerCase(),m[e]!==n)return m;t="function"==typeof t?t():t,"undefined"!=typeof h&&h&&(g.className+=" "+(t?"":"no-")+e),m[e]=t}return m},r(""),y=x=null,function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=y.elements;return"string"==typeof e?e.split(" "):e}function o(e){var t=v[e[h]];return t||(t={},g++,e[h]=g,v[g]=t),t}function i(e,n,r){if(n||(n=t),u)return n.createElement(e);r||(r=o(n));var i;return i=r.cache[e]?r.cache[e].cloneNode():m.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!i.canHaveChildren||p.test(e)||i.tagUrn?i:r.frag.appendChild(i)}function a(e,n){if(e||(e=t),u)return e.createDocumentFragment();n=n||o(e);for(var i=n.frag.cloneNode(),a=0,c=r(),s=c.length;s>a;a++)i.createElement(c[a]);return i}function c(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return y.shivMethods?i(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(y,t.frag)}function s(e){e||(e=t);var r=o(e);return!y.shivCSS||l||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),u||c(e,r),e}var l,u,d="3.7.0",f=e.html5||{},p=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,m=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,h="_html5shiv",g=0,v={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",l="hidden"in e,u=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){l=!0,u=!0}}();var y={elements:f.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:d,shivCSS:f.shivCSS!==!1,supportsUnknownElements:u,shivMethods:f.shivMethods!==!1,type:"default",shivDocument:s,createElement:i,createDocumentFragment:a};e.html5=y,s(t)}(this,t),m._version=p,m._prefixes=E,m._domPrefixes=$,m._cssomPrefixes=S,m.mq=A,m.hasEvent=z,m.testProp=function(e){return c([e])},m.testAllProps=l,m.testStyles=F,m.prefixed=function(e,t,n){return t?l(e,t,n):l(e,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(h?" js "+M.join(" "):""),m}(this,this.document),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof exports?require("jquery"):jQuery)}(function(e){function t(e){return c.raw?e:encodeURIComponent(e)}function n(e){return c.raw?e:decodeURIComponent(e)}function r(e){return t(c.json?JSON.stringify(e):String(e))}function o(e){0===e.indexOf('"')&&(e=e.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return e=decodeURIComponent(e.replace(a," ")),c.json?JSON.parse(e):e}catch(t){}}function i(t,n){var r=c.raw?t:o(t);return e.isFunction(n)?n(r):r}var a=/\+/g,c=e.cookie=function(o,a,s){if(void 0!==a&&!e.isFunction(a)){if(s=e.extend({},c.defaults,s),"number"==typeof s.expires){var l=s.expires,u=s.expires=new Date;u.setTime(+u+864e5*l)}return document.cookie=[t(o),"=",r(a),s.expires?"; expires="+s.expires.toUTCString():"",s.path?"; path="+s.path:"",s.domain?"; domain="+s.domain:"",s.secure?"; secure":""].join("")}for(var d=o?void 0:{},f=document.cookie?document.cookie.split("; "):[],p=0,m=f.length;m>p;p++){var h=f[p].split("="),g=n(h.shift()),v=h.join("=");if(o&&o===g){d=i(v,a);break}o||void 0===(v=i(v))||(d[g]=v)}return d};c.defaults={},e.removeCookie=function(t,n){return void 0===e.cookie(t)?!1:(e.cookie(t,"",e.extend({},n,{expires:-1})),!e.cookie(t))}}),function(){for(var e,t=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],r=n.length,o=window.console=window.console||{};r--;)e=n[r],o[e]||(o[e]=t)}(),$(document).ready(function(){function e(){s=1,t()}function t(){var e="/get-images/";$.ajax({url:e,type:"POST",data:{_csrf:yii.getCsrfToken(),path:AssetsPath+"/img/hexal"},dataType:"json",success:function(e){l=e.files,u=l.length,n(),c()}})}function n(){o($(".hexagon-row"),1,4,!0),o($(".hexagon-row"),2,5,!1),o($(".hexagon-row"),3,4,!0)}function r(t){t.children().remove(),e()}function o(e,t,n,r){var o=e.eq(t-1);for(1==r&&a(o),i=0;i<n;i++){o.append('<div class="hexagon-wrapper" id="hexagon-wrapper-'+s+'"><div class="hexagon" id="hexagon-'+s+'"></div></div>');var c=Math.floor(Math.random()*l.length);d=l[c],l.splice(c,1),$("#hexagon-"+s).css("background-image","url("+AssetsPath+"/img/hexal/"+d+")"),$("#hexagon-wrapper-"+s).delay(i+"10").animate({opacity:1}),s++}}function a(e){e.append('<div class="hexagon-border-l"></div>'),e.append('<div class="hexagon-border-r"></div>'),$(".hexagon-border-l").animate({opacity:1}),$(".hexagon-border-r").delay("300").animate({opacity:1})}function c(){var e=Math.floor(u/13);if(e>1&&0==$(".slider-control").length){for(i=0;i<e;i++)$(".slider-controls>ul").append('<li class="slider-control"></li>');$(".slider-control").eq(0).addClass("slider-control-active")}}var s,l,u,d;e(),$(".slider-controls").on("click",".slider-control",function(){{var e=$(this);e.index()}$(".slider-control.slider-control-active").removeClass("slider-control-active"),$(this).addClass("slider-control-active"),r($(".hexagon-row"))}),$(".filters-wrapper").find("input:checkbox").each(function(e){var t=$(this).attr("name"),n=t+"-gid-"+e;$(this).attr("id",n),$(this).next("label").attr("for",n)}),$(".createNewPostButton").click(function(){$("#modalCreateNewPost").modal("show").find("#modalCreateNewPostContent").load($(this).attr("value"))}),$(".updatePostButton").click(function(){$("#modalUpdatePost").modal("show").find("#modalUpdatePostContent").load($(this).attr("value"))})});