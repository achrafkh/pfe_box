!function(e){e.fn.extend({slimScroll:function(i){var o={width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},s=e.extend(o,i);return this.each(function(){function o(t){if(h){var t=t||window.event,i=0;t.wheelDelta&&(i=-t.wheelDelta/120),t.detail&&(i=t.detail/3);var o=t.target||t.srcTarget||t.srcElement;e(o).closest("."+s.wrapperClass).is(x.parent())&&r(i,!0),t.preventDefault&&!y&&t.preventDefault(),y||(t.returnValue=!1)}}function r(e,t,i){y=!1;var o=e,r=x.outerHeight()-R.outerHeight();if(t&&(o=parseInt(R.css("top"))+e*parseInt(s.wheelStep)/100*R.outerHeight(),o=Math.min(Math.max(o,0),r),o=e>0?Math.ceil(o):Math.floor(o),R.css({top:o+"px"})),v=parseInt(R.css("top"))/(x.outerHeight()-R.outerHeight()),o=v*(x[0].scrollHeight-x.outerHeight()),i){o=e;var a=o/x[0].scrollHeight*x.outerHeight();a=Math.min(Math.max(a,0),r),R.css({top:a+"px"})}x.scrollTop(o),x.trigger("slimscrolling",~~o),n(),c()}function a(e){window.addEventListener?(e.addEventListener("DOMMouseScroll",o,!1),e.addEventListener("mousewheel",o,!1)):document.attachEvent("onmousewheel",o)}function l(){f=Math.max(x.outerHeight()/x[0].scrollHeight*x.outerHeight(),m),R.css({height:f+"px"});var e=f==x.outerHeight()?"none":"block";R.css({display:e})}function n(){if(l(),clearTimeout(p),v==~~v){if(y=s.allowPageScroll,b!=v){var e=0==~~v?"top":"bottom";x.trigger("slimscroll",e)}}else y=!1;return b=v,f>=x.outerHeight()?void(y=!0):(R.stop(!0,!0).fadeIn("fast"),void(s.railVisible&&E.stop(!0,!0).fadeIn("fast")))}function c(){s.alwaysVisible||(p=setTimeout(function(){s.disableFadeOut&&h||u||d||(R.fadeOut("slow"),E.fadeOut("slow"))},1e3))}var h,u,d,p,g,f,v,b,w="<div></div>",m=30,y=!1,x=e(this);if(x.parent().hasClass(s.wrapperClass)){var C=x.scrollTop();if(R=x.closest("."+s.barClass),E=x.closest("."+s.railClass),l(),e.isPlainObject(i)){if("height"in i&&"auto"==i.height){x.parent().css("height","auto"),x.css("height","auto");var H=x.parent().parent().height();x.parent().css("height",H),x.css("height",H)}if("scrollTo"in i)C=parseInt(s.scrollTo);else if("scrollBy"in i)C+=parseInt(s.scrollBy);else if("destroy"in i)return R.remove(),E.remove(),void x.unwrap();r(C,!1,!0)}}else if(!(e.isPlainObject(i)&&"destroy"in i)){s.height="auto"==s.height?x.parent().height():s.height;var S=e(w).addClass(s.wrapperClass).css({position:"relative",overflow:"hidden",width:s.width,height:s.height});x.css({overflow:"hidden",width:s.width,height:s.height});var E=e(w).addClass(s.railClass).css({width:s.size,height:"100%",position:"absolute",top:0,display:s.alwaysVisible&&s.railVisible?"block":"none","border-radius":s.railBorderRadius,background:s.railColor,opacity:s.railOpacity,zIndex:90}),R=e(w).addClass(s.barClass).css({background:s.color,width:s.size,position:"absolute",top:0,opacity:s.opacity,display:s.alwaysVisible?"block":"none","border-radius":s.borderRadius,BorderRadius:s.borderRadius,MozBorderRadius:s.borderRadius,WebkitBorderRadius:s.borderRadius,zIndex:99}),D="right"==s.position?{right:s.distance}:{left:s.distance};E.css(D),R.css(D),x.wrap(S),x.parent().append(R),x.parent().append(E),s.railDraggable&&R.bind("mousedown",function(i){var o=e(document);return d=!0,t=parseFloat(R.css("top")),pageY=i.pageY,o.bind("mousemove.slimscroll",function(e){currTop=t+e.pageY-pageY,R.css("top",currTop),r(0,R.position().top,!1)}),o.bind("mouseup.slimscroll",function(e){d=!1,c(),o.unbind(".slimscroll")}),!1}).bind("selectstart.slimscroll",function(e){return e.stopPropagation(),e.preventDefault(),!1}),E.hover(function(){n()},function(){c()}),R.hover(function(){u=!0},function(){u=!1}),x.hover(function(){h=!0,n(),c()},function(){h=!1,c()}),x.bind("touchstart",function(e,t){e.originalEvent.touches.length&&(g=e.originalEvent.touches[0].pageY)}),x.bind("touchmove",function(e){if(y||e.originalEvent.preventDefault(),e.originalEvent.touches.length){var t=(g-e.originalEvent.touches[0].pageY)/s.touchScrollStep;r(t,!0),g=e.originalEvent.touches[0].pageY}}),l(),"bottom"===s.start?(R.css({top:x.outerHeight()-R.outerHeight()}),r(0,!0)):"top"!==s.start&&(r(e(s.start).position().top,null,!0),s.alwaysVisible||R.hide()),a(this)}}),this}}),e.fn.extend({slimscroll:e.fn.slimScroll})}(jQuery);
!function(t){"use strict";function e(t){return null!==t&&t===t.window}function n(t){return e(t)?t:9===t.nodeType&&t.defaultView}function a(t){var e,a,i={top:0,left:0},o=t&&t.ownerDocument;return e=o.documentElement,"undefined"!=typeof t.getBoundingClientRect&&(i=t.getBoundingClientRect()),a=n(o),{top:i.top+a.pageYOffset-e.clientTop,left:i.left+a.pageXOffset-e.clientLeft}}function i(t){var e="";for(var n in t)t.hasOwnProperty(n)&&(e+=n+":"+t[n]+";");return e}function o(t){if(d.allowEvent(t)===!1)return null;for(var e=null,n=t.target||t.srcElement;null!==n.parentElement;){if(!(n instanceof SVGElement||-1===n.className.indexOf("waves-effect"))){e=n;break}if(n.classList.contains("waves-effect")){e=n;break}n=n.parentElement}return e}function r(e){var n=o(e);null!==n&&(c.show(e,n),"ontouchstart"in t&&(n.addEventListener("touchend",c.hide,!1),n.addEventListener("touchcancel",c.hide,!1)),n.addEventListener("mouseup",c.hide,!1),n.addEventListener("mouseleave",c.hide,!1))}var s=s||{},u=document.querySelectorAll.bind(document),c={duration:750,show:function(t,e){if(2===t.button)return!1;var n=e||this,o=document.createElement("div");o.className="waves-ripple",n.appendChild(o);var r=a(n),s=t.pageY-r.top,u=t.pageX-r.left,d="scale("+n.clientWidth/100*10+")";"touches"in t&&(s=t.touches[0].pageY-r.top,u=t.touches[0].pageX-r.left),o.setAttribute("data-hold",Date.now()),o.setAttribute("data-scale",d),o.setAttribute("data-x",u),o.setAttribute("data-y",s);var l={top:s+"px",left:u+"px"};o.className=o.className+" waves-notransition",o.setAttribute("style",i(l)),o.className=o.className.replace("waves-notransition",""),l["-webkit-transform"]=d,l["-moz-transform"]=d,l["-ms-transform"]=d,l["-o-transform"]=d,l.transform=d,l.opacity="1",l["-webkit-transition-duration"]=c.duration+"ms",l["-moz-transition-duration"]=c.duration+"ms",l["-o-transition-duration"]=c.duration+"ms",l["transition-duration"]=c.duration+"ms",l["-webkit-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",l["-moz-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",l["-o-transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",l["transition-timing-function"]="cubic-bezier(0.250, 0.460, 0.450, 0.940)",o.setAttribute("style",i(l))},hide:function(t){d.touchup(t);var e=this,n=(1.4*e.clientWidth,null),a=e.getElementsByClassName("waves-ripple");if(!(a.length>0))return!1;n=a[a.length-1];var o=n.getAttribute("data-x"),r=n.getAttribute("data-y"),s=n.getAttribute("data-scale"),u=Date.now()-Number(n.getAttribute("data-hold")),l=350-u;0>l&&(l=0),setTimeout(function(){var t={top:r+"px",left:o+"px",opacity:"0","-webkit-transition-duration":c.duration+"ms","-moz-transition-duration":c.duration+"ms","-o-transition-duration":c.duration+"ms","transition-duration":c.duration+"ms","-webkit-transform":s,"-moz-transform":s,"-ms-transform":s,"-o-transform":s,transform:s};n.setAttribute("style",i(t)),setTimeout(function(){try{e.removeChild(n)}catch(t){return!1}},c.duration)},l)},wrapInput:function(t){for(var e=0;e<t.length;e++){var n=t[e];if("input"===n.tagName.toLowerCase()){var a=n.parentNode;if("i"===a.tagName.toLowerCase()&&-1!==a.className.indexOf("waves-effect"))continue;var i=document.createElement("i");i.className=n.className+" waves-input-wrapper";var o=n.getAttribute("style");o||(o=""),i.setAttribute("style",o),n.className="waves-button-input",n.removeAttribute("style"),a.replaceChild(i,n),i.appendChild(n)}}}},d={touches:0,allowEvent:function(t){var e=!0;return"touchstart"===t.type?d.touches+=1:"touchend"===t.type||"touchcancel"===t.type?setTimeout(function(){d.touches>0&&(d.touches-=1)},500):"mousedown"===t.type&&d.touches>0&&(e=!1),e},touchup:function(t){d.allowEvent(t)}};s.displayEffect=function(e){e=e||{},"duration"in e&&(c.duration=e.duration),c.wrapInput(u(".waves-effect")),"ontouchstart"in t&&document.body.addEventListener("touchstart",r,!1),document.body.addEventListener("mousedown",r,!1)},s.attach=function(e){"input"===e.tagName.toLowerCase()&&(c.wrapInput([e]),e=e.parentElement),"ontouchstart"in t&&e.addEventListener("touchstart",r,!1),e.addEventListener("mousedown",r,!1)},t.Waves=s,document.addEventListener("DOMContentLoaded",function(){s.displayEffect()},!1)}(window);
"function" != typeof Object.create && (Object.create = function (t) {
		function o() {}
		return o.prototype = t, new o
	}),
	function (t, o) {
		"use strict";
		var i = {
			_positionClasses: ["bottom-left", "bottom-right", "top-right", "top-left", "bottom-center", "top-center", "mid-center"],
			_defaultIcons: ["success", "error", "info", "warning"],
			init: function (o) {
				this.prepareOptions(o, t.toast.options), this.process()
			},
			prepareOptions: function (o, i) {
				var s = {};
				"string" == typeof o || o instanceof Array ? s.text = o : s = o, this.options = t.extend({}, i, s)
			},
			process: function () {
				this.setup(), this.addToDom(), this.position(), this.bindToast(), this.animate()
			},
			setup: function () {
				var o = "";
				if (this._toastEl = this._toastEl || t("<div></div>", {
						"class": "jq-toast-single"
					}), o += '<span class="jq-toast-loader"></span>', this.options.allowToastClose && (o += '<span class="close-jq-toast-single">&times;</span>'), this.options.text instanceof Array) {
					this.options.heading && (o += '<h2 class="jq-toast-heading">' + this.options.heading + "</h2>"), o += '<ul class="jq-toast-ul">';
					for (var i = 0; i < this.options.text.length; i++) o += '<li class="jq-toast-li" id="jq-toast-item-' + i + '">' + this.options.text[i] + "</li>";
					o += "</ul>"
				} else this.options.heading && (o += '<h2 class="jq-toast-heading">' + this.options.heading + "</h2>"), o += this.options.text;
				this._toastEl.html(o), this.options.bgColor !== !1 && this._toastEl.css("background-color", this.options.bgColor), this.options.textColor !== !1 && this._toastEl.css("color", this.options.textColor), this.options.textAlign && this._toastEl.css("text-align", this.options.textAlign), this.options.icon !== !1 && (this._toastEl.addClass("jq-has-icon"), -1 !== t.inArray(this.options.icon, this._defaultIcons) && this._toastEl.addClass("jq-icon-" + this.options.icon))
			},
			position: function () {
				"string" == typeof this.options.position && -1 !== t.inArray(this.options.position, this._positionClasses) ? "bottom-center" === this.options.position ? this._container.css({
					left: t(o).outerWidth() / 2 - this._container.outerWidth() / 2,
					bottom: 20
				}) : "top-center" === this.options.position ? this._container.css({
					left: t(o).outerWidth() / 2 - this._container.outerWidth() / 2,
					top: 20
				}) : "mid-center" === this.options.position ? this._container.css({
					left: t(o).outerWidth() / 2 - this._container.outerWidth() / 2,
					top: t(o).outerHeight() / 2 - this._container.outerHeight() / 2
				}) : this._container.addClass(this.options.position) : "object" == typeof this.options.position ? this._container.css({
					top: this.options.position.top ? this.options.position.top : "auto",
					bottom: this.options.position.bottom ? this.options.position.bottom : "auto",
					left: this.options.position.left ? this.options.position.left : "auto",
					right: this.options.position.right ? this.options.position.right : "auto"
				}) : this._container.addClass("bottom-left")
			},
			bindToast: function () {
				var t = this;
				this._toastEl.on("afterShown", function () {
					t.processLoader()
				}), this._toastEl.find(".close-jq-toast-single").on("click", function (o) {
					o.preventDefault(), "fade" === t.options.showHideTransition ? (t._toastEl.trigger("beforeHide"), t._toastEl.fadeOut(function () {
						t._toastEl.trigger("afterHidden")
					})) : "slide" === t.options.showHideTransition ? (t._toastEl.trigger("beforeHide"), t._toastEl.slideUp(function () {
						t._toastEl.trigger("afterHidden")
					})) : (t._toastEl.trigger("beforeHide"), t._toastEl.hide(function () {
						t._toastEl.trigger("afterHidden")
					}))
				}), "function" == typeof this.options.beforeShow && this._toastEl.on("beforeShow", function () {
					t.options.beforeShow()
				}), "function" == typeof this.options.afterShown && this._toastEl.on("afterShown", function () {
					t.options.afterShown()
				}), "function" == typeof this.options.beforeHide && this._toastEl.on("beforeHide", function () {
					t.options.beforeHide()
				}), "function" == typeof this.options.afterHidden && this._toastEl.on("afterHidden", function () {
					t.options.afterHidden()
				})
			},
			addToDom: function () {
				var o = t(".jq-toast-wrap");
				if (0 === o.length ? (o = t("<div></div>", {
						"class": "jq-toast-wrap"
					}), t("body").append(o)) : (!this.options.stack || isNaN(parseInt(this.options.stack, 10))) && o.empty(), o.find(".jq-toast-single:hidden").remove(), o.append(this._toastEl), this.options.stack && !isNaN(parseInt(this.options.stack), 10)) {
					var i = o.find(".jq-toast-single").length,
						s = i - this.options.stack;
					s > 0 && t(".jq-toast-wrap").find(".jq-toast-single").slice(0, s).remove()
				}
				this._container = o
			},
			canAutoHide: function () {
				return this.options.hideAfter !== !1 && !isNaN(parseInt(this.options.hideAfter, 10))
			},
			processLoader: function () {
				if (!this.canAutoHide() || this.options.loader === !1) return !1;
				var t = this._toastEl.find(".jq-toast-loader"),
					o = (this.options.hideAfter - 400) / 1e3 + "s",
					i = this.options.loaderBg,
					s = t.attr("style") || "";
				s = s.substring(0, s.indexOf("-webkit-transition")), s += "-webkit-transition: width " + o + " ease-in;                       -o-transition: width " + o + " ease-in;                       transition: width " + o + " ease-in;                       background-color: " + i + ";", t.attr("style", s).addClass("jq-toast-loaded")
			},
			animate: function () {
				var t = this;
				if (this._toastEl.hide(), this._toastEl.trigger("beforeShow"), "fade" === this.options.showHideTransition.toLowerCase() ? this._toastEl.fadeIn(function () {
						t._toastEl.trigger("afterShown")
					}) : "slide" === this.options.showHideTransition.toLowerCase() ? this._toastEl.slideDown(function () {
						t._toastEl.trigger("afterShown")
					}) : this._toastEl.show(function () {
						t._toastEl.trigger("afterShown")
					}), this.canAutoHide()) {
					var t = this;
					o.setTimeout(function () {
						"fade" === t.options.showHideTransition.toLowerCase() ? (t._toastEl.trigger("beforeHide"), t._toastEl.fadeOut(function () {
							t._toastEl.trigger("afterHidden")
						})) : "slide" === t.options.showHideTransition.toLowerCase() ? (t._toastEl.trigger("beforeHide"), t._toastEl.slideUp(function () {
							t._toastEl.trigger("afterHidden")
						})) : (t._toastEl.trigger("beforeHide"), t._toastEl.hide(function () {
							t._toastEl.trigger("afterHidden")
						}))
					}, this.options.hideAfter)
				}
			},
			reset: function (o) {
				"all" === o ? t(".jq-toast-wrap").remove() : this._toastEl.remove()
			},
			update: function (t) {
				this.prepareOptions(t, this.options), this.setup(), this.bindToast()
			}
		};
		t.toast = function (t) {
			var o = Object.create(i);
			return o.init(t, this), {
				reset: function (t) {
					o.reset(t)
				},
				update: function (t) {
					o.update(t)
				}
			}
		}, t.toast.options = {
			text: "",
			heading: "",
			showHideTransition: "fade",
			allowToastClose: !0,
			hideAfter: 3e3,
			loader: !0,
			loaderBg: "#9EC600",
			stack: 5,
			position: "bottom-left",
			bgColor: !1,
			textColor: !1,
			textAlign: "left",
			icon: !1,
			beforeShow: function () {},
			afterShown: function () {},
			beforeHide: function () {},
			afterHidden: function () {}
		}
	}(jQuery, window, document);
$(document).ready(function(){$(function(){$(".preloader").fadeOut(),$("body").trigger("resize")}),$(function(){$(window).bind("load resize",function(){topOffset=60,height=(this.window.innerHeight>0?this.window.innerHeight:this.screen.height)-1,height-=topOffset,height<1&&(height=1),height>topOffset&&$("#page-wrapper").css("min-height",height+"px")})}),function(e,i,s){var t='[data-perform="panel-collapse"]';e(t).each(function(){var i=e(this),s=i.closest(".panel"),t=s.find(".panel-wrapper"),l={toggle:!1};t.length||(t=s.children(".panel-heading").nextAll().wrapAll("<div/>").parent().addClass("panel-wrapper"),l={}),t.collapse(l).on("hide.bs.collapse",function(){i.children("i").removeClass("ti-minus").addClass("ti-plus")}).on("show.bs.collapse",function(){i.children("i").removeClass("ti-plus").addClass("ti-minus")})}),e(s).on("click",t,function(i){i.preventDefault();var s=e(this).closest(".panel"),t=s.find(".panel-wrapper");t.collapse("toggle")})}(jQuery,window,document),function(e,i,s){var t='[data-perform="panel-dismiss"]';e(s).on("click",t,function(i){function t(){var i=s.parent();s.remove(),i.filter(function(){var i=e(this);return i.is('[class*="col-"]')&&0===i.children("*").length}).remove()}i.preventDefault();var s=e(this).closest(".panel");t()})}(jQuery,window,document),$(function(){$('[data-toggle="tooltip"]').tooltip()}),$(function(){$('[data-toggle="popover"]').popover()}),$(".list-task li label").click(function(){$(this).toggleClass("task-done")}),$(".settings_box a").click(function(){$("ul.theme_color").toggleClass("theme_block")})}),$(".collapseble").click(function(){$(".collapseblebox").fadeToggle(350)}),$(".slimscrollright").slimScroll({height:"100%",position:"right",size:"5px",color:"#dcdcdc"}),$(".mini-nav, .sidebar-menu").slimScroll({height:"100%",position:"right",size:"5px",color:"#dcdcdc"}),$(".scrollable-right").slimScroll({height:"100%",position:"right",size:"5px",color:"#dcdcdc"}),$(".chat-list").slimScroll({height:"100%",position:"right",size:"5px",color:"#dcdcdc"}),$("body").trigger("resize"),$(".visited li a").click(function(e){$(".visited li").removeClass("active");var i=$(this).parent();i.hasClass("active")||i.addClass("active"),e.preventDefault()}),$("#to-recover").click(function(){$("#loginform").slideUp(),$("#recoverform").fadeIn()}),$(function(){$(window).load(function(){$(".chat-left-inner").css({height:$(window).height()-240+"px"})}),$(window).resize(function(){$(".chat-left-inner").css({height:$(window).height()-240+"px"})})}),$(".open-panel").click(function(){$(".chat-left-aside").toggleClass("open-pnl"),$(".open-panel i").toggleClass("ti-angle-left")}),$(function(){$(window).bind("load resize",function(){width=this.window.innerWidth>0?this.window.innerWidth:this.screen.width,width<1270?($("body").addClass("content-wrapper"),$(".mini-nav > li.selected").addClass("cnt-none"),$("#togglebtn").hide()):($("body").removeClass("content-wrapper"),$("#togglebtn").show(),$(".mini-nav > li.selected").removeClass("cnt-none"))})}),$(".mini-nav > li, #togglebtn").on("click",function(){$("body").hasClass("rmv-sidebarmenu")?($("body").trigger("resize"),$("#togglebtn").hide()):($("body").trigger("resize"),$("#togglebtn").show())}),$(".mini-nav > li, #togglebtn").on("click",function(){$("body").hasClass("content-wrapper")&&($(".mini-nav > li.selected").removeClass("cnt-none"),$("#togglebtn").show())}),$(".mini-nav").css("overflow","hidden").parent().css("overflow","visible"),$("#togglebtn").click(function(){$("#togglebtn").hide(),$(".mini-nav > li.selected").addClass("cnt-none")}),$(".mini-nav > li").click(function(){$("#togglebtn").show(),$(".mini-nav > li.selected").removeClass("cnt-none"),$("body").removeClass("rmv-sidebarmenu")}),$(".mini-nav > li").on("click",function(){$(".mini-nav > li.selected").removeClass("selected"),$(this).addClass("selected")}),$("#togglebtn").on("click",function(){$("body").removeClass("content-wrapper"),$("body").addClass("content-wrapper")}),$(function(){var e=window.location,i=$("ul.sidebar-menu a").filter(function(){return this.href==e||0==e.href.indexOf(this.href)}).addClass("active").parent().parent().addClass("in").parent();i.is("li")&&i.addClass("active")}),$.sidemenu=function(e){var i=300;$(e).on("click","li a",function(e){if($(this).next().is(".sub-menu")&&$(this).next().is(":visible"))$(this).next().slideUp(i,function(){$(this).next().removeClass("menu-open")}),$(this).next().parent("li").removeClass("active");else if($(this).next().is(".sub-menu")&&!$(this).next().is(":visible")){var s=$(this).parents("ul").first();s.find("ul:visible").slideUp(i).removeClass("menu-open"),$(this).next().slideDown(i,function(){$(this).next().addClass("menu-open"),s.find("li.active").removeClass("active"),$(this).parent("li").addClass("active")})}})},$.sidemenu($(".sidebar-menu")),$(function(){$(window).bind("load resize",function(){width=this.window.innerWidth>0?this.window.innerWidth:this.screen.width,width<1549?($("body").addClass("rmv-right-panel"),$(".right-side-toggle i").addClass("ti-arrow-left")):($("body").removeClass("rmv-right-panel"),$(".right-side-toggle i").removeClass("ti-arrow-left"))})}),$(".right-side-toggle").on("click",function(){$("body").toggleClass("rmv-right-panel"),$(".right-side-toggle i").toggleClass("ti-arrow-left")});