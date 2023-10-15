"use strict";function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(n){var o={};function i(e){var t;return(o[e]||(t=o[e]={i:e,l:!1,exports:{}},n[e].call(t.exports,t,t.exports,i),t.l=!0,t)).exports}i.m=n,i.c=o,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==_typeof(t)&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)i.d(n,o,function(e){return t[e]}.bind(null,o));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s=9)}([function(e,t,j){var a,c,l,i,n={frameRate:150,animationTime:400,stepSize:100,pulseAlgorithm:!0,pulseScale:4,pulseNormalize:1,accelerationDelta:50,accelerationMax:3,keyboardSupport:!0,arrowScroll:50,fixedBackground:!0,excluded:""},f=n,d=!1,o={x:0,y:0},s=!1,u=document.documentElement,r=[],P=/^Mac/.test(navigator.platform),R=37,O=38,z=39,Y=40,h=32,X=33,I=34,N=35,K=36,V={37:1,38:1,39:1,40:1};function m(){var e,t,n,o,i,r;!s&&document.body&&(s=!0,e=document.body,t=document.documentElement,n=window.innerHeight,r=e.scrollHeight,u=0<=document.compatMode.indexOf("CSS")?t:e,a=e,f.keyboardSupport&&S("keydown",F),top!=self?d=!0:se&&n<r&&(e.offsetHeight<=n||t.offsetHeight<=n)&&((i=document.createElement("div")).style.cssText="position:absolute; z-index:-10000; top:0; left:0; right:0; height:"+u.scrollHeight+"px",document.body.appendChild(i),l=function(){o=o||setTimeout(function(){i.style.height="0",i.style.height=u.scrollHeight+"px",o=null},500)},setTimeout(l,10),S("resize",l),(c=new ie(l)).observe(e,{attributes:!0,childList:!0,characterData:!1}),u.offsetHeight<=n)&&((r=document.createElement("div")).style.clear="both",e.appendChild(r)),f.fixedBackground||(e.style.backgroundAttachment="scroll",t.style.backgroundAttachment="scroll"))}var p=[],v=!1,g=Date.now();function w(d,u,h){var m,e=0<u?1:-1,t=0<h?1:-1;o.x===e&&o.y===t||(o.x=e,o.y=t,p=[],g=0),1!=f.accelerationMax&&((e=Date.now()-g)<f.accelerationDelta&&1<(t=(1+50/e)/2)&&(t=Math.min(t,f.accelerationMax),u*=t,h*=t),g=Date.now()),p.push({x:u,y:h,lastX:u<0?.99:-.99,lastY:h<0?.99:-.99,start:Date.now()}),v||(e=re(),m=d===e||d===document.body,null==d.$scrollBehavior&&(e=y(t=d),null==_[e]&&(t=getComputedStyle(t,"")["scroll-behavior"],_[e]="smooth"==t),_[e])&&(d.$scrollBehavior=d.style.scrollBehavior,d.style.scrollBehavior="auto"),oe(function e(t){for(var n=Date.now(),o=0,i=0,r=0;r<p.length;r++){var c=p[r],l=n-c.start,s=l>=f.animationTime,l=s?1:l/f.animationTime,a=(f.pulseAlgorithm&&(l=1<=(a=l)?1:a<=0?0:(1==f.pulseNormalize&&(f.pulseNormalize/=ce(1)),ce(a))),c.x*l-c.lastX>>0),l=c.y*l-c.lastY>>0;o+=a,i+=l,c.lastX+=a,c.lastY+=l,s&&(p.splice(r,1),r--)}m?window.scrollBy(o,i):(o&&(d.scrollLeft+=o),i&&(d.scrollTop+=i)),(p=u||h?p:[]).length?oe(e,d,1e3/f.frameRate+1):(v=!1,null!=d.$scrollBehavior&&(d.style.scrollBehavior=d.$scrollBehavior,d.$scrollBehavior=null))},d,0),v=!0)}function W(e){s||m();var t,n,o=e.target;return!(!e.defaultPrevented&&!e.ctrlKey&&!(L(a,"embed")||L(o,"embed")&&/\.pdf/i.test(o.src)||L(a,"object")||o.shadowRoot))||(t=-e.wheelDeltaX||e.deltaX||0,n=-e.wheelDeltaY||e.deltaY||0,P&&(e.wheelDeltaX&&x(e.wheelDeltaX,120)&&(t=e.wheelDeltaX/Math.abs(e.wheelDeltaX)*-120),e.wheelDeltaY)&&x(e.wheelDeltaY,120)&&(n=e.wheelDeltaY/Math.abs(e.wheelDeltaY)*-120),t||(n=n||(-e.wheelDelta||0)),1===e.deltaMode&&(t*=40,n*=40),(o=Z(o))?!!function(e){if(e)return r.length||(r=[e,e,e]),e=Math.abs(e),r.push(e),r.shift(),clearTimeout(i),i=setTimeout(function(){try{localStorage.SS_deltaBuffer=r.join(",")}catch(e){}},1e3),e=120<e&&E(e),!E(120)&&!E(100)&&!e}(n)||(1.2<Math.abs(t)&&(t*=f.stepSize/120),1.2<Math.abs(n)&&(n*=f.stepSize/120),w(o,t,n),e.preventDefault(),void J()):!d||!q||(Object.defineProperty(e,"target",{value:window.frameElement}),parent.wheel(e)))}function F(n){var e=n.target,t=n.ctrlKey||n.altKey||n.metaKey||n.shiftKey&&n.keyCode!==h,o=(document.body.contains(a)||(a=document.activeElement),/^(button|submit|radio|checkbox|file|color|image)$/i);if(n.defaultPrevented||/^(textarea|select|embed|object)$/i.test(e.nodeName)||L(e,"input")&&!o.test(e.type)||L(a,"video")||function(){var e=n.target,t=!1;if(-1!=document.URL.indexOf("www.youtube.com/watch"))do{if(t=e.classList&&e.classList.contains("html5-video-controls"))break}while(e=e.parentNode);return t}()||e.isContentEditable||t)return!0;if((L(e,"button")||L(e,"input")&&o.test(e.type))&&n.keyCode===h)return!0;if(L(e,"input")&&"radio"==e.type&&V[n.keyCode])return!0;var i=0,r=0,c=Z(a);if(!c)return!d||!q||parent.keydown(n);var l=c.clientHeight;switch(c==document.body&&(l=window.innerHeight),n.keyCode){case O:r=-f.arrowScroll;break;case Y:r=f.arrowScroll;break;case h:r=-(n.shiftKey?1:-1)*l*.9;break;case X:r=.9*-l;break;case I:r=.9*l;break;case K:r=-(c=c==document.body&&document.scrollingElement?document.scrollingElement:c).scrollTop;break;case N:var s=c.scrollHeight-c.scrollTop-l,r=0<s?10+s:0;break;case R:i=-f.arrowScroll;break;case z:i=f.arrowScroll;break;default:return!0}w(c,i,r),n.preventDefault(),J()}function Q(e){a=e.target}U=0;var U,G,y=function(e){return e.uniqueID||(e.uniqueID=U++)},b={},$={},_={};function J(){clearTimeout(G),G=setInterval(function(){b=$=_={}},1e3)}function C(e,t,n){for(var o=n?b:$,i=e.length;i--;)o[y(e[i])]=t;return t}function Z(e){var t=[],n=document.body,o=u.scrollHeight;do{var i=(!1?b:$)[y(e)];if(i)return C(t,i);if(t.push(e),o===e.scrollHeight){i=te(u)&&te(n)||ne(u);if(d&&ee(u)||!d&&i)return C(t,re())}else if(ee(e)&&ne(e))return C(t,e)}while(e=e.parentElement)}function ee(e){return e.clientHeight+10<e.scrollHeight}function te(e){return"hidden"!==getComputedStyle(e,"").getPropertyValue("overflow-y")}function ne(e){e=getComputedStyle(e,"").getPropertyValue("overflow-y");return"scroll"===e||"auto"===e}function S(e,t,n){window.addEventListener(e,t,n||!1)}function k(e,t,n){window.removeEventListener(e,t,n||!1)}function L(e,t){return e&&(e.nodeName||"").toLowerCase()===t.toLowerCase()}if(window.localStorage&&localStorage.SS_deltaBuffer)try{r=localStorage.SS_deltaBuffer.split(",")}catch(e){}function x(e,t){return Math.floor(e/t)==e/t}function E(e){return x(r[0],e)&&x(r[1],e)&&x(r[2],e)}var T,oe=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e,t,n){window.setTimeout(e,n||1e3/60)},ie=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,re=(T=document.scrollingElement,function(){var e,t;return T||((e=document.createElement("div")).style.cssText="height:10000px;width:1px;",document.body.appendChild(e),t=document.body.scrollTop,document.documentElement.scrollTop,window.scrollBy(0,3),T=document.body.scrollTop!=t?document.body:document.documentElement,window.scrollBy(0,-3),document.body.removeChild(e)),T});function ce(e){var t,e=(e*=f.pulseScale)<1?e-(1-Math.exp(-e)):(--e,(t=Math.exp(-1))+(1-Math.exp(-e))*(1-t));return e*f.pulseNormalize}var M=window.navigator.userAgent,D=/Edge/.test(M),q=/chrome/i.test(M)&&!D,D=/safari/i.test(M)&&!D,le=/mobile/i.test(M),B=/Windows NT 6.1/i.test(M)&&/rv:11/i.test(M),se=D&&(/Version\/8/i.test(M)||/Version\/9/i.test(M)),M=(q||D||B)&&!le,ae=!1;try{window.addEventListener("test",null,Object.defineProperty({},"passive",{get:function(){ae=!0}}))}catch(e){}var D=!!ae&&{passive:!1},H="onwheel"in document.createElement("div")?"wheel":"mousewheel";function A(e){for(var t in e)n.hasOwnProperty(t)&&(f[t]=e[t])}H&&M&&(S(H,W,D),S("mousedown",Q),S("load",m)),A.destroy=function(){c&&c.disconnect(),k(H,W),k("mousedown",Q),k("keydown",F),k("resize",l),k("load",m)},window.SmoothScrollOptions&&A(window.SmoothScrollOptions),void 0!==(B=function(){return A}.call(t,j,t,e))&&(e.exports=B)},function(e,t){var i;(i=jQuery).fn.niceSelect=function(e){function o(e){e.after(i("<div></div>").addClass("nice-select").addClass(e.attr("class")||"").addClass(e.attr("disabled")?"disabled":"").attr("tabindex",e.attr("disabled")?null:"0").html('<span class="current"></span><ul class="list"></ul>'));var o=e.next(),t=e.find("option"),e=e.find("option:selected");o.find(".current").html(e.data("display")||e.text()),t.each(function(e){var t=i(this),n=t.data("display");o.find("ul").append(i("<li></li>").attr("data-value",t.val()).attr("data-display",n||null).addClass("option"+(t.is(":selected")?" selected":"")+(t.is(":disabled")?" disabled":"")).html(t.text()))})}return"string"==typeof e?"update"==e?this.each(function(){var e=i(this),t=i(this).next(".nice-select"),n=t.hasClass("open");t.length&&(t.remove(),o(e),n)&&e.next().trigger("click")}):"destroy"==e?(this.each(function(){var e=i(this),t=i(this).next(".nice-select");t.length&&(t.remove(),e.css("display",""))}),0==i(".nice-select").length&&i(document).off(".nice_select")):console.log('Method "'+e+'" does not exist.'):(this.hide(),this.each(function(){var e=i(this);e.next().hasClass("nice-select")||o(e)}),i(document).off(".nice_select"),i(document).on("click.nice_select",".nice-select",function(e){var t=i(this);i(".nice-select").not(t).removeClass("open"),t.toggleClass("open"),t.hasClass("open")?(t.find(".option"),t.find(".focus").removeClass("focus"),t.find(".selected").addClass("focus")):t.focus()}),i(document).on("click.nice_select",function(e){0===i(e.target).closest(".nice-select").length&&i(".nice-select").removeClass("open").find(".option")}),i(document).on("click.nice_select",".nice-select .option:not(.disabled)",function(e){var t=i(this),n=t.closest(".nice-select"),o=(n.find(".selected").removeClass("selected"),t.addClass("selected"),t.data("display")||t.text());n.find(".current").text(o),n.prev("select").val(t.data("value")).trigger("change")}),i(document).on("keydown.nice_select",".nice-select",function(e){var t,n=i(this),o=i(n.find(".focus")||n.find(".list .option.selected"));if(32==e.keyCode||13==e.keyCode)return(n.hasClass("open")?o:n).trigger("click"),!1;if(40==e.keyCode)return n.hasClass("open")?0<(t=o.nextAll(".option:not(.disabled)").first()).length&&(n.find(".focus").removeClass("focus"),t.addClass("focus")):n.trigger("click"),!1;if(38==e.keyCode)return n.hasClass("open")?0<(t=o.prevAll(".option:not(.disabled)").first()).length&&(n.find(".focus").removeClass("focus"),t.addClass("focus")):n.trigger("click"),!1;if(27==e.keyCode)n.hasClass("open")&&n.trigger("click");else if(9==e.keyCode&&n.hasClass("open"))return!1}),(e=document.createElement("a").style).cssText="pointer-events:auto","auto"!==e.pointerEvents&&i("html").addClass("no-csspointerevents")),this}},function(e,t){document.documentElement,$(document).ready(function(){$("select").niceSelect(),$.getScript("https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.9/SmoothScroll.js",function(){SmoothScroll({keyboardSupport:!0,animationTime:1e3,stepSize:60})}),0<$(".animated_title").length&&$(".animated_title p").html(function(e,t){return"<span>"+$.trim(t).split("").join("</span><span>")+"</span>"}),0<$(".rating").length&&document.querySelectorAll(".rating").forEach(function(e){var t=e.querySelector(".group"),n=t.querySelectorAll("span")[1].innerHTML.replace(/[^0-9]/g,""),t=t.querySelectorAll("span")[0].innerHTML.replace(/[^0-9]/g,"")/n*100;e.querySelector(".line span").style="width: ".concat(t,"%")}),0<$("input, textarea").length&&document.querySelectorAll("input, textarea").forEach(function(e){e.addEventListener("focus",function(e){e.target.closest(".row").classList.add("focused")}),e.addEventListener("blur",function(e){0===e.target.value.length&&e.target.closest(".row").classList.remove("focused"),"radio"===e.target.getAttribute("type")&&e.target.closest(".row").classList.remove("focused")})}),$("input[type='tel']").on("focus click blur input",function(e){var t=e.target,n=0,o="___-___-____".replace(/\D/g,""),i=t.value.replace(/\D/g,"");o.length>=i.length&&(i=o),t.value="___-___-____".replace(/./g,function(e){return/[_\d]/.test(e)&&n<i.length?i.charAt(n++):n>=i.length?"":e}),"blur"===e.type?2===t.value.length&&(t.value=""):(o=t.value.length,(e=t).focus(),e.setSelectionRange?e.setSelectionRange(o,o):e.createTextRange&&((e=e.createTextRange()).collapse(!0),e.moveEnd("character",o),e.moveStart("character",o),e.select()))}),$(".faq .faq_item").on("click",function(){$(this).toggleClass("opened")}),0<$(".faq_item").length&&document.querySelectorAll(".faq_item").forEach(function(e){e.querySelector(".faq_content_cover").style.setProperty("--el-height",e.querySelector(".faq_content").getBoundingClientRect().height+"px")}),0<$(".goBack").length&&document.querySelector(".goBack").addEventListener("click",function(e){window.history.back()}),0<$(".blog-inner-page").length&&$(".overlay").toggleClass("opened"),$(".about-wrapper .item-general").on("click",function(){var e=$(this).attr("data-target");$("."+e).toggleClass("opened")}),$(".closePopup").on("click",function(){$(".overlay").removeClass("opened")})})},function(e,t){var n,d=0;function u(){document.querySelectorAll(".menu_content li ").forEach(function(e){e.classList.remove("visible")})}function h(){$(".menu_mobile")[0].style.setProperty("--index",d),0===d?$(".menu_current").addClass("hidden"):$(".menu_current").removeClass("hidden")}window.innerWidth<992&&($(".menu_content .first >li > a, .menu_content .second >li > a, .menu_content .third >li > a").on("click",function(e){e.preventDefault()}),n=[],$(".menu_content li ").on("click",function(e){event.stopPropagation(),n.push(e.target.innerHTML),$(this).parent()[0].classList,$(".menu_current")[0].innerHTML=n[d],d<3&&(d+=1),h()}),$(".menu_current").on("click",function(e){n.pop(),1<=d&&--d,h(),$(".menu_current")[0].innerHTML=n[d-1]}),h()),$(".menu_title, .menu_mobile .close").on("click",function(e){e.preventDefault(),e.stopPropagation(),$("header").toggleClass("opened"),$("header").removeClass("hide"),$("header").hasClass("opened")||(u(),d=0,h()),$(document).one("click",function e(t){0===$("header").has(t.target).length?$("header").removeClass("opened"):$(document).one("click",e)})}),$(".burger").on("click",function(){$("header").toggleClass("opened-top")}),$(".contacts_menu .label").on("click",function(){$(this).toggleClass("opened")}),$(".nav_mobile .close").on("click",function(){$("header").removeClass("opened-top")}),$(".menu_content li ").on("mouseenter click",function(e){e.stopPropagation();e=e.target.closest("ul").classList;e.contains("first")&&($(".menu_content").removeClass("all"),u()),e.contains("second")&&($(".menu_content").addClass("all"),$(".menu_content .second >li, .menu_content .third >li, .menu_content .fourth >li ").removeClass("visible")),e.contains("third")&&$(".menu_content .third >li, .menu_content .fourth >li ").removeClass("visible"),e.contains("fourth")&&$(".menu_content .fourth >li ").removeClass("visible"),$(this)[0].classList.add("visible")}),$(".account_links .search").on("click",function(e){e.preventDefault(),$(".search-block").toggleClass("opened"),$(document).one("click",function e(t){0===$(".account_links .search").has(t.target).length?$(".account_links .search").removeClass("opened"):$(document).one("click",e)})}),$(".search-block input").on("blur",function(e){$(".search-block").removeClass("opened")}),window.addEventListener("scroll",function(e){var t=$(this),n=$("header");120<t.scrollTop()?n.addClass("header_bg"):n.removeClass("header_bg");var o,i=document.documentElement,r=window,c=r.scrollY||i.scrollTop,l=0,s=0,a=document.querySelector("header");$("header").hasClass("opened")&&($("header").removeClass("opened"),u(),d=0,h()),$(".search-block").removeClass("opened"),window.addEventListener("scroll",function(){var e,t;o=r.scrollY||i.scrollTop,c<o?l=2:o<c&&(l=1),l!==s&&(t=o,2===(e=l)&&52<t?(a.classList.add("hide"),s=e):1===e&&(a.classList.remove("hide"),s=e)),c=o})})},function(e,t){var n=document.querySelector(".cursor"),o=document.querySelector(".cursor2"),i=document.querySelectorAll("a, select, button, .el-hover, .btn-primary, .btn-secondary, .btn-round");document.addEventListener("mousemove",function(e){e.clientX,e.clientY,n.style.transform="translate3d(calc(".concat(e.clientX,"px - 50%), calc(").concat(e.clientY,"px - 50%), 0)")}),document.addEventListener("mousemove",function(e){var t=e.clientX,e=e.clientY;o.style.left=t+"px",o.style.top=e+"px"}),document.addEventListener("mousedown",function(){n.classList.add("click"),o.classList.add("cursorinnerhover")}),document.addEventListener("mouseup",function(){n.classList.remove("click"),o.classList.remove("cursorinnerhover")}),i.forEach(function(e){e.addEventListener("mouseover",function(){n.classList.add("hover")}),e.addEventListener("mouseleave",function(){n.classList.remove("hover")})})},function(e,t){function o(e){return"wp-content/themes/rtbatteries/images/frames/PacAnim".concat(e.toString().padStart(4,"0"),".png")}var n,l=document.getElementById("banner-canvas"),s=(l.width=window.innerWidth,l.height=window.innerHeight,l.getContext("2d")),i=function(){for(var e=[],t=1;t<=150;t++){var n=new Image;n.src=o(t),e.push(n)}return e}(),r=!1,c=Date.now(),a=!1,d=!1;function u(e){var t,n,o,i=l.width/l.height,r=e.width/e.height;function c(){l.width=window.innerWidth,l.height=window.innerHeight}i=r<i?(t=l.width,n=l.width/r,o=0,(l.height-n)/2):(t=l.height*r,n=l.height,o=(l.width-t)/2,0),c(),window.addEventListener("resize",c),s.clearRect(0,0,l.width,l.height),s.drawImage(e,o,i,t,n)}function h(t){u(i[t]),t=(t+1)%250,requestAnimationFrame(function(){var e;r||a||(t<149&&!d?h(t):(r=!(a=!0),d&&(e=document.querySelector(".constructor"))&&e.scrollIntoView({behavior:"smooth"})))})}var m=new Image;m.src=o(1),m.onload=function(){u(m),setTimeout(function(){var e;r||a||(h(0),e=document.documentElement.scrollTop/(document.documentElement.scrollHeight-window.innerHeight),e=Math.min(249,Math.ceil(250*e)),1e3<=Date.now()-c&&(h(e+1),$("header").hasClass("opened")||(d=!0)))},5e3),window.addEventListener("scroll",function(){r=a=!0;var e=document.documentElement.scrollTop/(document.documentElement.scrollHeight-window.innerHeight),t=Math.min(249,Math.ceil(250*e));u(i[t+1]),c=Date.now(),clearTimeout(n),d=!0,n=setTimeout(function(){var e;1e3<=Date.now()-c&&!a&&(d&&(e=document.querySelector(".constructor"))&&e.scrollIntoView({behavior:"smooth"}),d=!1,h(t+1))},1e3)})}},function(e,t){0<$(".swiper").length&&$.getScript("https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.0/swiper-bundle.js",function(){$(".swiper").each(function(){var e=$(this),t=e.find(".swiper-container");e.hasClass("clients-slider")&&(swipes=new Swiper(t.prevObject[0],{speed:1e3,slidesPerView:5,spaceBetween:30,autoplay:!0,centeredSlides:!0,loop:!0,pagination:{el:$(this).find(".swiper-pagination")[0]}}))})})},function(e,t){var o;$(".constructor_slider li").on("click",function(){var e=$(this).parent()[0],t=$(e).children();t.each(function(e){console.log(t,e,"element"),t[e].classList.remove("active_i")}),$(this).addClass("active_i")}),o=1,$(".steps_nav .btn-secondary").on("click",function(){$(this)[0].classList.contains("next")&&(o<=4&&(o+=1),$(".constructor_slider")[0].classList.add("s_next"),$(".constructor_slider")[0].classList.remove("step-"+(o-1))),$(this)[0].classList.contains("prev")&&(2<=o&&--o,$(".constructor_slider")[0].classList.remove("s_next"),$(".constructor_slider")[0].classList.remove("step-"+(o+1)));var e=$(".constructor_slider .counter ul"),t=$(".constructor_slider .slider .wrapper"),n=$(".constructor_slider .counter li");$(n).each(function(e){$(n)[e].classList.remove("current")}),$(t).each(function(e){$(t)[e].classList.remove("active")}),$(t)[o-1].classList.add("active"),$(n)[o-1].classList.add("current"),$(".constructor_slider")[0].classList.add("step-"+o),$(e)[0].style.setProperty("--shift",o-1),1!==($(".constructor_slider .counter ul li.active")[0].innerHTML=o)?$(".constructor")[0].classList.add("full-width"):$(".constructor")[0].classList.remove("full-width")})},function(e,t){},function(e,t,n){n.r(t),n(0),n(1),n(2),n(3),window.addEventListener("scroll",function(e){for(var t=document.documentElement.querySelectorAll(".scroll-y"),n=0;n<t.length;n++){var o=0<window.document.documentElement.getBoundingClientRect().height-t[n].getBoundingClientRect().height,i=0<t[n].getBoundingClientRect().top&&window.innerHeight>Math.abs(t[n].getBoundingClientRect().top),r=0<t[n].getBoundingClientRect().bottom&&window.innerHeight>Math.abs(t[n].getBoundingClientRect().bottom),c=t[n].getBoundingClientRect().top-window.innerHeight+70<0,l=t[n].getBoundingClientRect().bottom-70<0;i||r?t[n].classList.add("enter"):t[n].classList.contains("once")||t[n].classList.remove("enter"),t[n].classList.contains("once")||(c?t[n].classList.add("hide-top"):t[n].classList.remove("hide-top"),l?t[n].classList.add("hide-bottom"):t[n].classList.remove("hide-bottom")),o?t[n].classList.remove("tall-item"):t[n].classList.add("tall-item")}}),n(4),n(5),n(6),n(7),n(8),window.addEventListener("load",function(){})}]);
//# sourceMappingURL=all.js.map