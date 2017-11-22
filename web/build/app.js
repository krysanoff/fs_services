/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/build/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/main.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/*! dynamic exports provided */
/*! all exports used */
/***/ (function(module, exports) {

/*
 * SlimScroll Plugin required for sidenav to function properly
 */
(function (e) {
	e.fn.extend({ slimScroll: function slimScroll(g) {
			var a = e.extend({ width: "auto", height: "250px", size: "7px", color: "#000", position: "right", distance: "1px", start: "top", opacity: .4, alwaysVisible: !1, disableFadeOut: !1, railVisible: !1, railColor: "#333", railOpacity: .2, railDraggable: !0, railClass: "slimScrollRail", barClass: "slimScrollBar", wrapperClass: "slimScrollDiv", allowPageScroll: !1, wheelStep: 20, touchScrollStep: 200, borderRadius: "7px", railBorderRadius: "7px" }, g);this.each(function () {
				function v(d) {
					if (r) {
						d = d || window.event;
						var c = 0;d.wheelDelta && (c = -d.wheelDelta / 120);d.detail && (c = d.detail / 3);e(d.target || d.srcTarget || d.srcElement).closest("." + a.wrapperClass).is(b.parent()) && m(c, !0);d.preventDefault && !k && d.preventDefault();k || (d.returnValue = !1);
					}
				}function m(d, e, g) {
					k = !1;var f = d,
					    h = b.outerHeight() - c.outerHeight();e && (f = parseInt(c.css("top")) + d * parseInt(a.wheelStep) / 100 * c.outerHeight(), f = Math.min(Math.max(f, 0), h), f = 0 < d ? Math.ceil(f) : Math.floor(f), c.css({ top: f + "px" }));l = parseInt(c.css("top")) / (b.outerHeight() - c.outerHeight());
					f = l * (b[0].scrollHeight - b.outerHeight());g && (f = d, d = f / b[0].scrollHeight * b.outerHeight(), d = Math.min(Math.max(d, 0), h), c.css({ top: d + "px" }));b.scrollTop(f);b.trigger("slimscrolling", ~~f);w();p();
				}function x() {
					u = Math.max(b.outerHeight() / b[0].scrollHeight * b.outerHeight(), 30);c.css({ height: u + "px" });var a = u == b.outerHeight() ? "none" : "block";c.css({ display: a });
				}function w() {
					x();clearTimeout(B);l == ~~l ? (k = a.allowPageScroll, C != l && b.trigger("slimscroll", 0 == ~~l ? "top" : "bottom")) : k = !1;C = l;u >= b.outerHeight() ? k = !0 : (c.stop(!0, !0).fadeIn("fast"), a.railVisible && h.stop(!0, !0).fadeIn("fast"));
				}function p() {
					a.alwaysVisible || (B = setTimeout(function () {
						a.disableFadeOut && r || y || z || (c.fadeOut("slow"), h.fadeOut("slow"));
					}, 1E3));
				}var r,
				    y,
				    z,
				    B,
				    A,
				    u,
				    l,
				    C,
				    k = !1,
				    b = e(this);if (b.parent().hasClass(a.wrapperClass)) {
					var n = b.scrollTop(),
					    c = b.closest("." + a.barClass),
					    h = b.closest("." + a.railClass);x();if (e.isPlainObject(g)) {
						if ("height" in g && "auto" == g.height) {
							b.parent().css("height", "auto");b.css("height", "auto");var q = b.parent().parent().height();b.parent().css("height", q);b.css("height", q);
						}if ("scrollTo" in g) n = parseInt(a.scrollTo);else if ("scrollBy" in g) n += parseInt(a.scrollBy);else if ("destroy" in g) {
							c.remove();h.remove();b.unwrap();return;
						}m(n, !1, !0);
					}
				} else if (!(e.isPlainObject(g) && "destroy" in g)) {
					a.height = "auto" == a.height ? b.parent().height() : a.height;n = e("<div></div>").addClass(a.wrapperClass).css({ position: "relative", overflow: "hidden", width: a.width, height: a.height });b.css({ overflow: "hidden", width: a.width, height: a.height });var h = e("<div></div>").addClass(a.railClass).css({ width: a.size,
						height: "100%", position: "absolute", top: 0, display: a.alwaysVisible && a.railVisible ? "block" : "none", "border-radius": a.railBorderRadius, background: a.railColor, opacity: a.railOpacity, zIndex: 90 }),
					    c = e("<div></div>").addClass(a.barClass).css({ background: a.color, width: a.size, position: "absolute", top: 0, opacity: a.opacity, display: a.alwaysVisible ? "block" : "none", "border-radius": a.borderRadius, BorderRadius: a.borderRadius, MozBorderRadius: a.borderRadius, WebkitBorderRadius: a.borderRadius, zIndex: 99 }),
					    q = "right" == a.position ? { right: a.distance } : { left: a.distance };h.css(q);c.css(q);b.wrap(n);b.parent().append(c);b.parent().append(h);a.railDraggable && c.bind("mousedown", function (a) {
						var b = e(document);z = !0;t = parseFloat(c.css("top"));pageY = a.pageY;b.bind("mousemove.slimscroll", function (a) {
							currTop = t + a.pageY - pageY;c.css("top", currTop);m(0, c.position().top, !1);
						});b.bind("mouseup.slimscroll", function (a) {
							z = !1;p();b.unbind(".slimscroll");
						});return !1;
					}).bind("selectstart.slimscroll", function (a) {
						a.stopPropagation();a.preventDefault();return !1;
					});
					h.hover(function () {
						w();
					}, function () {
						p();
					});c.hover(function () {
						y = !0;
					}, function () {
						y = !1;
					});b.hover(function () {
						r = !0;w();p();
					}, function () {
						r = !1;p();
					});b.bind("touchstart", function (a, b) {
						a.originalEvent.touches.length && (A = a.originalEvent.touches[0].pageY);
					});b.bind("touchmove", function (b) {
						k || b.originalEvent.preventDefault();b.originalEvent.touches.length && (m((A - b.originalEvent.touches[0].pageY) / a.touchScrollStep, !0), A = b.originalEvent.touches[0].pageY);
					});x();"bottom" === a.start ? (c.css({ top: b.outerHeight() - c.outerHeight() }), m(0, !0)) : "top" !== a.start && (m(e(a.start).position().top, null, !0), a.alwaysVisible || c.hide());window.addEventListener ? (this.addEventListener("DOMMouseScroll", v, !1), this.addEventListener("mousewheel", v, !1)) : document.attachEvent("onmousewheel", v);
				}
			});return this;
		} });e.fn.extend({ slimscroll: e.fn.slimScroll });
})(jQuery);

$(function () {
	"use strict";

	// Sidenav toggle

	$.pushMenu = {
		activate: function activate(toggleBtn) {

			//Enable sidebar toggle
			$(toggleBtn).on('click', function (e) {
				e.preventDefault();

				//Enable sidebar push menu
				if ($(window).width() > 767) {
					if ($("body").hasClass('sidebar-collapse')) {
						$("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
					} else {
						$("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
					}
				}
				//Handle sidebar push menu for small screens
				else {
						if ($("body").hasClass('sidebar-open')) {
							$("body").removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
						} else {
							$("body").addClass('sidebar-open').trigger('expanded.pushMenu');
						}
					}
				if ($('body').hasClass('fixed') && $('body').hasClass('sidebar-mini') && $('body').hasClass('sidebar-collapse')) {
					$('.sidebar').css("overflow", "visible");
					$('.main-sidebar').find(".slimScrollDiv").css("overflow", "visible");
				}
				if ($('body').hasClass('only-sidebar')) {
					$('.sidebar').css("overflow", "visible");
					$('.main-sidebar').find(".slimScrollDiv").css("overflow", "visible");
				};
			});

			$(".content-wrapper").click(function () {
				//Enable hide menu when clicking on the content-wrapper on small screens
				if ($(window).width() <= 767 && $("body").hasClass("sidebar-open")) {
					$("body").removeClass('sidebar-open');
				}
			});
		}
	};

	// Sidebar treemenu prototype
	$.tree = function (menu) {
		var _this = this;
		var animationSpeed = 200;
		$(document).on('click', menu + ' li a', function (e) {
			//Get the clicked link and the next element
			var $this = $(this);
			var checkElement = $this.next();

			//Check if the next element is a menu and is visible
			if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
				//Close the menu
				checkElement.slideUp(animationSpeed, function () {
					checkElement.removeClass('menu-open');
					//Fix the layout in case the sidebar stretches over the height of the window
					//_this.layout.fix();
				});
				checkElement.parent("li").removeClass("active");
			}
			//If the menu is not visible
			else if (checkElement.is('.treeview-menu') && !checkElement.is(':visible')) {
					//Get the parent menu
					var parent = $this.parents('ul').first();
					//Close all open menus within the parent
					var ul = parent.find('ul:visible').slideUp(animationSpeed);
					//Remove the menu-open class from the parent
					ul.removeClass('menu-open');
					//Get the parent li
					var parent_li = $this.parent("li");

					//Open the target menu and add the menu-open class
					checkElement.slideDown(animationSpeed, function () {
						//Add the class active to the parent li
						checkElement.addClass('menu-open');
						parent.find('li.active').removeClass('active');
						parent_li.addClass('active');
					});
				}
			//if this isn't a link, prevent the page from being redirected
			if (checkElement.is('.treeview-menu')) {
				e.preventDefault();
			}
		});

		//open parent menus when child item is active
		$(document).ready(function () {
			$(menu).find('.treeview-menu li.active').parents('.treeview').addClass('active');
		});
	};

	// Activate sidenav treemenu
	$.tree('.sidebar');

	// Activate sidenav toggle
	$.pushMenu.activate("[data-toggle='offcanvas']");

	//Activate bootstrip tooltips
	//$("[data-toggle='tooltip']").tooltip();

	// Login Page Flipbox control
	$('.login-content [data-toggle="flip"]').click(function () {
		$('.login-box').toggleClass('flipped');
		return false;
	});

	// Using slimscroll for sidebar
	$('.sidebar').slimScroll({
		height: $(window).height() - $(".main-header").height() + "px",
		color: "rgba(0,0,0,0.8)",
		size: "3px"
	});

	if ($('body').hasClass('fixed') && $('body').hasClass('sidebar-mini') && $('body').hasClass('sidebar-collapse')) {
		$('.sidebar').css("overflow", "visible");
		$('.main-sidebar').find(".slimScrollDiv").css("overflow", "visible");
	}

	// Show upload image
	$('#image').on('change', function (e) {
		var input = e.originalEvent.srcElement;
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#upload_image').attr('src', e.target.result).width(150);
			};

			reader.readAsDataURL(input.files[0]);
		}
	});
});

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgOGQ2ZDdjMDI2NjYwYTRjYmMxYWEiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL21haW4uanMiXSwibmFtZXMiOlsiZSIsImZuIiwiZXh0ZW5kIiwic2xpbVNjcm9sbCIsImciLCJhIiwid2lkdGgiLCJoZWlnaHQiLCJzaXplIiwiY29sb3IiLCJwb3NpdGlvbiIsImRpc3RhbmNlIiwic3RhcnQiLCJvcGFjaXR5IiwiYWx3YXlzVmlzaWJsZSIsImRpc2FibGVGYWRlT3V0IiwicmFpbFZpc2libGUiLCJyYWlsQ29sb3IiLCJyYWlsT3BhY2l0eSIsInJhaWxEcmFnZ2FibGUiLCJyYWlsQ2xhc3MiLCJiYXJDbGFzcyIsIndyYXBwZXJDbGFzcyIsImFsbG93UGFnZVNjcm9sbCIsIndoZWVsU3RlcCIsInRvdWNoU2Nyb2xsU3RlcCIsImJvcmRlclJhZGl1cyIsInJhaWxCb3JkZXJSYWRpdXMiLCJlYWNoIiwidiIsImQiLCJyIiwid2luZG93IiwiZXZlbnQiLCJjIiwid2hlZWxEZWx0YSIsImRldGFpbCIsInRhcmdldCIsInNyY1RhcmdldCIsInNyY0VsZW1lbnQiLCJjbG9zZXN0IiwiaXMiLCJiIiwicGFyZW50IiwibSIsInByZXZlbnREZWZhdWx0IiwiayIsInJldHVyblZhbHVlIiwiZiIsImgiLCJvdXRlckhlaWdodCIsInBhcnNlSW50IiwiY3NzIiwiTWF0aCIsIm1pbiIsIm1heCIsImNlaWwiLCJmbG9vciIsInRvcCIsImwiLCJzY3JvbGxIZWlnaHQiLCJzY3JvbGxUb3AiLCJ0cmlnZ2VyIiwidyIsInAiLCJ4IiwidSIsImRpc3BsYXkiLCJjbGVhclRpbWVvdXQiLCJCIiwiQyIsInN0b3AiLCJmYWRlSW4iLCJzZXRUaW1lb3V0IiwieSIsInoiLCJmYWRlT3V0IiwiQSIsImhhc0NsYXNzIiwibiIsImlzUGxhaW5PYmplY3QiLCJxIiwic2Nyb2xsVG8iLCJzY3JvbGxCeSIsInJlbW92ZSIsInVud3JhcCIsImFkZENsYXNzIiwib3ZlcmZsb3ciLCJiYWNrZ3JvdW5kIiwiekluZGV4IiwiQm9yZGVyUmFkaXVzIiwiTW96Qm9yZGVyUmFkaXVzIiwiV2Via2l0Qm9yZGVyUmFkaXVzIiwicmlnaHQiLCJsZWZ0Iiwid3JhcCIsImFwcGVuZCIsImJpbmQiLCJkb2N1bWVudCIsInQiLCJwYXJzZUZsb2F0IiwicGFnZVkiLCJjdXJyVG9wIiwidW5iaW5kIiwic3RvcFByb3BhZ2F0aW9uIiwiaG92ZXIiLCJvcmlnaW5hbEV2ZW50IiwidG91Y2hlcyIsImxlbmd0aCIsImhpZGUiLCJhZGRFdmVudExpc3RlbmVyIiwiYXR0YWNoRXZlbnQiLCJzbGltc2Nyb2xsIiwialF1ZXJ5IiwiJCIsInB1c2hNZW51IiwiYWN0aXZhdGUiLCJ0b2dnbGVCdG4iLCJvbiIsInJlbW92ZUNsYXNzIiwiZmluZCIsImNsaWNrIiwidHJlZSIsIm1lbnUiLCJfdGhpcyIsImFuaW1hdGlvblNwZWVkIiwiJHRoaXMiLCJjaGVja0VsZW1lbnQiLCJuZXh0Iiwic2xpZGVVcCIsInBhcmVudHMiLCJmaXJzdCIsInVsIiwicGFyZW50X2xpIiwic2xpZGVEb3duIiwicmVhZHkiLCJ0b2dnbGVDbGFzcyIsImlucHV0IiwiZmlsZXMiLCJyZWFkZXIiLCJGaWxlUmVhZGVyIiwib25sb2FkIiwiYXR0ciIsInJlc3VsdCIsInJlYWRBc0RhdGFVUkwiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhE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OiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvYnVpbGQvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gXCIuL2Fzc2V0cy9qcy9tYWluLmpzXCIpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDhkNmQ3YzAyNjY2MGE0Y2JjMWFhIiwiLypcbiAqIFNsaW1TY3JvbGwgUGx1Z2luIHJlcXVpcmVkIGZvciBzaWRlbmF2IHRvIGZ1bmN0aW9uIHByb3Blcmx5XG4gKi9cbihmdW5jdGlvbihlKXtlLmZuLmV4dGVuZCh7c2xpbVNjcm9sbDpmdW5jdGlvbihnKXt2YXIgYT1lLmV4dGVuZCh7d2lkdGg6XCJhdXRvXCIsaGVpZ2h0OlwiMjUwcHhcIixzaXplOlwiN3B4XCIsY29sb3I6XCIjMDAwXCIscG9zaXRpb246XCJyaWdodFwiLGRpc3RhbmNlOlwiMXB4XCIsc3RhcnQ6XCJ0b3BcIixvcGFjaXR5Oi40LGFsd2F5c1Zpc2libGU6ITEsZGlzYWJsZUZhZGVPdXQ6ITEscmFpbFZpc2libGU6ITEscmFpbENvbG9yOlwiIzMzM1wiLHJhaWxPcGFjaXR5Oi4yLHJhaWxEcmFnZ2FibGU6ITAscmFpbENsYXNzOlwic2xpbVNjcm9sbFJhaWxcIixiYXJDbGFzczpcInNsaW1TY3JvbGxCYXJcIix3cmFwcGVyQ2xhc3M6XCJzbGltU2Nyb2xsRGl2XCIsYWxsb3dQYWdlU2Nyb2xsOiExLHdoZWVsU3RlcDoyMCx0b3VjaFNjcm9sbFN0ZXA6MjAwLGJvcmRlclJhZGl1czpcIjdweFwiLHJhaWxCb3JkZXJSYWRpdXM6XCI3cHhcIn0sZyk7dGhpcy5lYWNoKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gdihkKXtpZihyKXtkPWR8fHdpbmRvdy5ldmVudDtcbnZhciBjPTA7ZC53aGVlbERlbHRhJiYoYz0tZC53aGVlbERlbHRhLzEyMCk7ZC5kZXRhaWwmJihjPWQuZGV0YWlsLzMpO2UoZC50YXJnZXR8fGQuc3JjVGFyZ2V0fHxkLnNyY0VsZW1lbnQpLmNsb3Nlc3QoXCIuXCIrYS53cmFwcGVyQ2xhc3MpLmlzKGIucGFyZW50KCkpJiZtKGMsITApO2QucHJldmVudERlZmF1bHQmJiFrJiZkLnByZXZlbnREZWZhdWx0KCk7a3x8KGQucmV0dXJuVmFsdWU9ITEpfX1mdW5jdGlvbiBtKGQsZSxnKXtrPSExO3ZhciBmPWQsaD1iLm91dGVySGVpZ2h0KCktYy5vdXRlckhlaWdodCgpO2UmJihmPXBhcnNlSW50KGMuY3NzKFwidG9wXCIpKStkKnBhcnNlSW50KGEud2hlZWxTdGVwKS8xMDAqYy5vdXRlckhlaWdodCgpLGY9TWF0aC5taW4oTWF0aC5tYXgoZiwwKSxoKSxmPTA8ZD9NYXRoLmNlaWwoZik6TWF0aC5mbG9vcihmKSxjLmNzcyh7dG9wOmYrXCJweFwifSkpO2w9cGFyc2VJbnQoYy5jc3MoXCJ0b3BcIikpLyhiLm91dGVySGVpZ2h0KCktYy5vdXRlckhlaWdodCgpKTtcbmY9bCooYlswXS5zY3JvbGxIZWlnaHQtYi5vdXRlckhlaWdodCgpKTtnJiYoZj1kLGQ9Zi9iWzBdLnNjcm9sbEhlaWdodCpiLm91dGVySGVpZ2h0KCksZD1NYXRoLm1pbihNYXRoLm1heChkLDApLGgpLGMuY3NzKHt0b3A6ZCtcInB4XCJ9KSk7Yi5zY3JvbGxUb3AoZik7Yi50cmlnZ2VyKFwic2xpbXNjcm9sbGluZ1wiLH5+Zik7dygpO3AoKX1mdW5jdGlvbiB4KCl7dT1NYXRoLm1heChiLm91dGVySGVpZ2h0KCkvYlswXS5zY3JvbGxIZWlnaHQqYi5vdXRlckhlaWdodCgpLDMwKTtjLmNzcyh7aGVpZ2h0OnUrXCJweFwifSk7dmFyIGE9dT09Yi5vdXRlckhlaWdodCgpP1wibm9uZVwiOlwiYmxvY2tcIjtjLmNzcyh7ZGlzcGxheTphfSl9ZnVuY3Rpb24gdygpe3goKTtjbGVhclRpbWVvdXQoQik7bD09fn5sPyhrPWEuYWxsb3dQYWdlU2Nyb2xsLEMhPWwmJmIudHJpZ2dlcihcInNsaW1zY3JvbGxcIiwwPT1+fmw/XCJ0b3BcIjpcImJvdHRvbVwiKSk6az0hMTtDPWw7dT49Yi5vdXRlckhlaWdodCgpP2s9ITA6KGMuc3RvcCghMCxcbiEwKS5mYWRlSW4oXCJmYXN0XCIpLGEucmFpbFZpc2libGUmJmguc3RvcCghMCwhMCkuZmFkZUluKFwiZmFzdFwiKSl9ZnVuY3Rpb24gcCgpe2EuYWx3YXlzVmlzaWJsZXx8KEI9c2V0VGltZW91dChmdW5jdGlvbigpe2EuZGlzYWJsZUZhZGVPdXQmJnJ8fHl8fHp8fChjLmZhZGVPdXQoXCJzbG93XCIpLGguZmFkZU91dChcInNsb3dcIikpfSwxRTMpKX12YXIgcix5LHosQixBLHUsbCxDLGs9ITEsYj1lKHRoaXMpO2lmKGIucGFyZW50KCkuaGFzQ2xhc3MoYS53cmFwcGVyQ2xhc3MpKXt2YXIgbj1iLnNjcm9sbFRvcCgpLGM9Yi5jbG9zZXN0KFwiLlwiK2EuYmFyQ2xhc3MpLGg9Yi5jbG9zZXN0KFwiLlwiK2EucmFpbENsYXNzKTt4KCk7aWYoZS5pc1BsYWluT2JqZWN0KGcpKXtpZihcImhlaWdodFwiaW4gZyYmXCJhdXRvXCI9PWcuaGVpZ2h0KXtiLnBhcmVudCgpLmNzcyhcImhlaWdodFwiLFwiYXV0b1wiKTtiLmNzcyhcImhlaWdodFwiLFwiYXV0b1wiKTt2YXIgcT1iLnBhcmVudCgpLnBhcmVudCgpLmhlaWdodCgpO2IucGFyZW50KCkuY3NzKFwiaGVpZ2h0XCIsXG5xKTtiLmNzcyhcImhlaWdodFwiLHEpfWlmKFwic2Nyb2xsVG9cImluIGcpbj1wYXJzZUludChhLnNjcm9sbFRvKTtlbHNlIGlmKFwic2Nyb2xsQnlcImluIGcpbis9cGFyc2VJbnQoYS5zY3JvbGxCeSk7ZWxzZSBpZihcImRlc3Ryb3lcImluIGcpe2MucmVtb3ZlKCk7aC5yZW1vdmUoKTtiLnVud3JhcCgpO3JldHVybn1tKG4sITEsITApfX1lbHNlIGlmKCEoZS5pc1BsYWluT2JqZWN0KGcpJiZcImRlc3Ryb3lcImluIGcpKXthLmhlaWdodD1cImF1dG9cIj09YS5oZWlnaHQ/Yi5wYXJlbnQoKS5oZWlnaHQoKTphLmhlaWdodDtuPWUoXCI8ZGl2PjwvZGl2PlwiKS5hZGRDbGFzcyhhLndyYXBwZXJDbGFzcykuY3NzKHtwb3NpdGlvbjpcInJlbGF0aXZlXCIsb3ZlcmZsb3c6XCJoaWRkZW5cIix3aWR0aDphLndpZHRoLGhlaWdodDphLmhlaWdodH0pO2IuY3NzKHtvdmVyZmxvdzpcImhpZGRlblwiLHdpZHRoOmEud2lkdGgsaGVpZ2h0OmEuaGVpZ2h0fSk7dmFyIGg9ZShcIjxkaXY+PC9kaXY+XCIpLmFkZENsYXNzKGEucmFpbENsYXNzKS5jc3Moe3dpZHRoOmEuc2l6ZSxcbmhlaWdodDpcIjEwMCVcIixwb3NpdGlvbjpcImFic29sdXRlXCIsdG9wOjAsZGlzcGxheTphLmFsd2F5c1Zpc2libGUmJmEucmFpbFZpc2libGU/XCJibG9ja1wiOlwibm9uZVwiLFwiYm9yZGVyLXJhZGl1c1wiOmEucmFpbEJvcmRlclJhZGl1cyxiYWNrZ3JvdW5kOmEucmFpbENvbG9yLG9wYWNpdHk6YS5yYWlsT3BhY2l0eSx6SW5kZXg6OTB9KSxjPWUoXCI8ZGl2PjwvZGl2PlwiKS5hZGRDbGFzcyhhLmJhckNsYXNzKS5jc3Moe2JhY2tncm91bmQ6YS5jb2xvcix3aWR0aDphLnNpemUscG9zaXRpb246XCJhYnNvbHV0ZVwiLHRvcDowLG9wYWNpdHk6YS5vcGFjaXR5LGRpc3BsYXk6YS5hbHdheXNWaXNpYmxlP1wiYmxvY2tcIjpcIm5vbmVcIixcImJvcmRlci1yYWRpdXNcIjphLmJvcmRlclJhZGl1cyxCb3JkZXJSYWRpdXM6YS5ib3JkZXJSYWRpdXMsTW96Qm9yZGVyUmFkaXVzOmEuYm9yZGVyUmFkaXVzLFdlYmtpdEJvcmRlclJhZGl1czphLmJvcmRlclJhZGl1cyx6SW5kZXg6OTl9KSxxPVwicmlnaHRcIj09YS5wb3NpdGlvbj9cbntyaWdodDphLmRpc3RhbmNlfTp7bGVmdDphLmRpc3RhbmNlfTtoLmNzcyhxKTtjLmNzcyhxKTtiLndyYXAobik7Yi5wYXJlbnQoKS5hcHBlbmQoYyk7Yi5wYXJlbnQoKS5hcHBlbmQoaCk7YS5yYWlsRHJhZ2dhYmxlJiZjLmJpbmQoXCJtb3VzZWRvd25cIixmdW5jdGlvbihhKXt2YXIgYj1lKGRvY3VtZW50KTt6PSEwO3Q9cGFyc2VGbG9hdChjLmNzcyhcInRvcFwiKSk7cGFnZVk9YS5wYWdlWTtiLmJpbmQoXCJtb3VzZW1vdmUuc2xpbXNjcm9sbFwiLGZ1bmN0aW9uKGEpe2N1cnJUb3A9dCthLnBhZ2VZLXBhZ2VZO2MuY3NzKFwidG9wXCIsY3VyclRvcCk7bSgwLGMucG9zaXRpb24oKS50b3AsITEpfSk7Yi5iaW5kKFwibW91c2V1cC5zbGltc2Nyb2xsXCIsZnVuY3Rpb24oYSl7ej0hMTtwKCk7Yi51bmJpbmQoXCIuc2xpbXNjcm9sbFwiKX0pO3JldHVybiExfSkuYmluZChcInNlbGVjdHN0YXJ0LnNsaW1zY3JvbGxcIixmdW5jdGlvbihhKXthLnN0b3BQcm9wYWdhdGlvbigpO2EucHJldmVudERlZmF1bHQoKTtyZXR1cm4hMX0pO1xuaC5ob3ZlcihmdW5jdGlvbigpe3coKX0sZnVuY3Rpb24oKXtwKCl9KTtjLmhvdmVyKGZ1bmN0aW9uKCl7eT0hMH0sZnVuY3Rpb24oKXt5PSExfSk7Yi5ob3ZlcihmdW5jdGlvbigpe3I9ITA7dygpO3AoKX0sZnVuY3Rpb24oKXtyPSExO3AoKX0pO2IuYmluZChcInRvdWNoc3RhcnRcIixmdW5jdGlvbihhLGIpe2Eub3JpZ2luYWxFdmVudC50b3VjaGVzLmxlbmd0aCYmKEE9YS5vcmlnaW5hbEV2ZW50LnRvdWNoZXNbMF0ucGFnZVkpfSk7Yi5iaW5kKFwidG91Y2htb3ZlXCIsZnVuY3Rpb24oYil7a3x8Yi5vcmlnaW5hbEV2ZW50LnByZXZlbnREZWZhdWx0KCk7Yi5vcmlnaW5hbEV2ZW50LnRvdWNoZXMubGVuZ3RoJiYobSgoQS1iLm9yaWdpbmFsRXZlbnQudG91Y2hlc1swXS5wYWdlWSkvYS50b3VjaFNjcm9sbFN0ZXAsITApLEE9Yi5vcmlnaW5hbEV2ZW50LnRvdWNoZXNbMF0ucGFnZVkpfSk7eCgpO1wiYm90dG9tXCI9PT1hLnN0YXJ0PyhjLmNzcyh7dG9wOmIub3V0ZXJIZWlnaHQoKS1jLm91dGVySGVpZ2h0KCl9KSxcbm0oMCwhMCkpOlwidG9wXCIhPT1hLnN0YXJ0JiYobShlKGEuc3RhcnQpLnBvc2l0aW9uKCkudG9wLG51bGwsITApLGEuYWx3YXlzVmlzaWJsZXx8Yy5oaWRlKCkpO3dpbmRvdy5hZGRFdmVudExpc3RlbmVyPyh0aGlzLmFkZEV2ZW50TGlzdGVuZXIoXCJET01Nb3VzZVNjcm9sbFwiLHYsITEpLHRoaXMuYWRkRXZlbnRMaXN0ZW5lcihcIm1vdXNld2hlZWxcIix2LCExKSk6ZG9jdW1lbnQuYXR0YWNoRXZlbnQoXCJvbm1vdXNld2hlZWxcIix2KX19KTtyZXR1cm4gdGhpc319KTtlLmZuLmV4dGVuZCh7c2xpbXNjcm9sbDplLmZuLnNsaW1TY3JvbGx9KX0pKGpRdWVyeSk7XG5cbiQoZnVuY3Rpb24gKCkge1xuXHRcInVzZSBzdHJpY3RcIjtcblxuXHQvLyBTaWRlbmF2IHRvZ2dsZVxuXHQkLnB1c2hNZW51ID0ge1xuXHRcdGFjdGl2YXRlOiBmdW5jdGlvbiAodG9nZ2xlQnRuKSB7XG5cblx0XHRcdC8vRW5hYmxlIHNpZGViYXIgdG9nZ2xlXG5cdFx0XHQkKHRvZ2dsZUJ0bikub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcblx0XHRcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG5cdFx0XHRcdC8vRW5hYmxlIHNpZGViYXIgcHVzaCBtZW51XG5cdFx0XHRcdGlmICgkKHdpbmRvdykud2lkdGgoKSA+ICg3NjcpKSB7XG5cdFx0XHRcdFx0aWYgKCQoXCJib2R5XCIpLmhhc0NsYXNzKCdzaWRlYmFyLWNvbGxhcHNlJykpIHtcblx0XHRcdFx0XHRcdCQoXCJib2R5XCIpLnJlbW92ZUNsYXNzKCdzaWRlYmFyLWNvbGxhcHNlJykudHJpZ2dlcignZXhwYW5kZWQucHVzaE1lbnUnKTtcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0JChcImJvZHlcIikuYWRkQ2xhc3MoJ3NpZGViYXItY29sbGFwc2UnKS50cmlnZ2VyKCdjb2xsYXBzZWQucHVzaE1lbnUnKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH1cblx0XHRcdFx0Ly9IYW5kbGUgc2lkZWJhciBwdXNoIG1lbnUgZm9yIHNtYWxsIHNjcmVlbnNcblx0XHRcdFx0ZWxzZSB7XG5cdFx0XHRcdFx0aWYgKCQoXCJib2R5XCIpLmhhc0NsYXNzKCdzaWRlYmFyLW9wZW4nKSkge1xuXHRcdFx0XHRcdFx0JChcImJvZHlcIikucmVtb3ZlQ2xhc3MoJ3NpZGViYXItb3BlbicpLnJlbW92ZUNsYXNzKCdzaWRlYmFyLWNvbGxhcHNlJykudHJpZ2dlcignY29sbGFwc2VkLnB1c2hNZW51Jyk7XG5cdFx0XHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0XHRcdCQoXCJib2R5XCIpLmFkZENsYXNzKCdzaWRlYmFyLW9wZW4nKS50cmlnZ2VyKCdleHBhbmRlZC5wdXNoTWVudScpO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0fVxuXHRcdFx0XHRpZiAoICQoJ2JvZHknKS5oYXNDbGFzcygnZml4ZWQnKSAmJiAkKCdib2R5JykuaGFzQ2xhc3MoJ3NpZGViYXItbWluaScpICYmICQoJ2JvZHknKS5oYXNDbGFzcygnc2lkZWJhci1jb2xsYXBzZScpKSB7XG5cdFx0XHRcdFx0JCgnLnNpZGViYXInKS5jc3MoXCJvdmVyZmxvd1wiLFwidmlzaWJsZVwiKTtcblx0XHRcdFx0XHQkKCcubWFpbi1zaWRlYmFyJykuZmluZChcIi5zbGltU2Nyb2xsRGl2XCIpLmNzcyhcIm92ZXJmbG93XCIsXCJ2aXNpYmxlXCIpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdGlmICgkKCdib2R5JykuaGFzQ2xhc3MoJ29ubHktc2lkZWJhcicpKSB7XG5cdFx0XHRcdFx0JCgnLnNpZGViYXInKS5jc3MoXCJvdmVyZmxvd1wiLFwidmlzaWJsZVwiKTtcblx0XHRcdFx0XHQkKCcubWFpbi1zaWRlYmFyJykuZmluZChcIi5zbGltU2Nyb2xsRGl2XCIpLmNzcyhcIm92ZXJmbG93XCIsXCJ2aXNpYmxlXCIpO1xuXHRcdFx0XHR9O1xuXHRcdFx0fSk7XG5cblx0XHRcdCQoXCIuY29udGVudC13cmFwcGVyXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0Ly9FbmFibGUgaGlkZSBtZW51IHdoZW4gY2xpY2tpbmcgb24gdGhlIGNvbnRlbnQtd3JhcHBlciBvbiBzbWFsbCBzY3JlZW5zXG5cdFx0XHRcdGlmICgkKHdpbmRvdykud2lkdGgoKSA8PSAoNzY3KSAmJiAkKFwiYm9keVwiKS5oYXNDbGFzcyhcInNpZGViYXItb3BlblwiKSkge1xuXHRcdFx0XHRcdCQoXCJib2R5XCIpLnJlbW92ZUNsYXNzKCdzaWRlYmFyLW9wZW4nKTtcblx0XHRcdFx0fVxuXHRcdFx0fSk7XG5cdFx0fVxuXHR9O1xuXG5cdC8vIFNpZGViYXIgdHJlZW1lbnUgcHJvdG90eXBlXG5cdCQudHJlZSA9IGZ1bmN0aW9uIChtZW51KSB7XG5cdFx0dmFyIF90aGlzID0gdGhpcztcblx0XHR2YXIgYW5pbWF0aW9uU3BlZWQgPSAyMDA7XG5cdFx0JChkb2N1bWVudCkub24oJ2NsaWNrJywgbWVudSArICcgbGkgYScsIGZ1bmN0aW9uIChlKSB7XG5cdFx0XHQvL0dldCB0aGUgY2xpY2tlZCBsaW5rIGFuZCB0aGUgbmV4dCBlbGVtZW50XG5cdFx0XHR2YXIgJHRoaXMgPSAkKHRoaXMpO1xuXHRcdFx0dmFyIGNoZWNrRWxlbWVudCA9ICR0aGlzLm5leHQoKTtcblxuXHRcdFx0Ly9DaGVjayBpZiB0aGUgbmV4dCBlbGVtZW50IGlzIGEgbWVudSBhbmQgaXMgdmlzaWJsZVxuXHRcdFx0aWYgKChjaGVja0VsZW1lbnQuaXMoJy50cmVldmlldy1tZW51JykpICYmIChjaGVja0VsZW1lbnQuaXMoJzp2aXNpYmxlJykpKSB7XG5cdFx0XHRcdC8vQ2xvc2UgdGhlIG1lbnVcblx0XHRcdFx0Y2hlY2tFbGVtZW50LnNsaWRlVXAoYW5pbWF0aW9uU3BlZWQsIGZ1bmN0aW9uICgpIHtcblx0XHRcdFx0XHRcdGNoZWNrRWxlbWVudC5yZW1vdmVDbGFzcygnbWVudS1vcGVuJyk7XG5cdFx0XHRcdFx0Ly9GaXggdGhlIGxheW91dCBpbiBjYXNlIHRoZSBzaWRlYmFyIHN0cmV0Y2hlcyBvdmVyIHRoZSBoZWlnaHQgb2YgdGhlIHdpbmRvd1xuXHRcdFx0XHRcdC8vX3RoaXMubGF5b3V0LmZpeCgpO1xuXHRcdFx0XHR9KTtcblx0XHRcdFx0Y2hlY2tFbGVtZW50LnBhcmVudChcImxpXCIpLnJlbW92ZUNsYXNzKFwiYWN0aXZlXCIpO1xuXHRcdFx0fVxuXHRcdFx0Ly9JZiB0aGUgbWVudSBpcyBub3QgdmlzaWJsZVxuXHRcdFx0ZWxzZSBpZiAoKGNoZWNrRWxlbWVudC5pcygnLnRyZWV2aWV3LW1lbnUnKSkgJiYgKCFjaGVja0VsZW1lbnQuaXMoJzp2aXNpYmxlJykpKSB7XG5cdFx0XHRcdC8vR2V0IHRoZSBwYXJlbnQgbWVudVxuXHRcdFx0XHR2YXIgcGFyZW50ID0gJHRoaXMucGFyZW50cygndWwnKS5maXJzdCgpO1xuXHRcdFx0XHQvL0Nsb3NlIGFsbCBvcGVuIG1lbnVzIHdpdGhpbiB0aGUgcGFyZW50XG5cdFx0XHRcdHZhciB1bCA9IHBhcmVudC5maW5kKCd1bDp2aXNpYmxlJykuc2xpZGVVcChhbmltYXRpb25TcGVlZCk7XG5cdFx0XHRcdC8vUmVtb3ZlIHRoZSBtZW51LW9wZW4gY2xhc3MgZnJvbSB0aGUgcGFyZW50XG5cdFx0XHRcdHVsLnJlbW92ZUNsYXNzKCdtZW51LW9wZW4nKTtcblx0XHRcdFx0Ly9HZXQgdGhlIHBhcmVudCBsaVxuXHRcdFx0XHR2YXIgcGFyZW50X2xpID0gJHRoaXMucGFyZW50KFwibGlcIik7XG5cblx0XHRcdFx0Ly9PcGVuIHRoZSB0YXJnZXQgbWVudSBhbmQgYWRkIHRoZSBtZW51LW9wZW4gY2xhc3Ncblx0XHRcdFx0Y2hlY2tFbGVtZW50LnNsaWRlRG93bihhbmltYXRpb25TcGVlZCwgZnVuY3Rpb24gKCkge1xuXHRcdFx0XHRcdC8vQWRkIHRoZSBjbGFzcyBhY3RpdmUgdG8gdGhlIHBhcmVudCBsaVxuXHRcdFx0XHRcdGNoZWNrRWxlbWVudC5hZGRDbGFzcygnbWVudS1vcGVuJyk7XG5cdFx0XHRcdFx0cGFyZW50LmZpbmQoJ2xpLmFjdGl2ZScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblx0XHRcdFx0XHRwYXJlbnRfbGkuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuXHRcdFx0XHR9KTtcblx0XHRcdH1cblx0XHRcdC8vaWYgdGhpcyBpc24ndCBhIGxpbmssIHByZXZlbnQgdGhlIHBhZ2UgZnJvbSBiZWluZyByZWRpcmVjdGVkXG5cdFx0XHRpZiAoY2hlY2tFbGVtZW50LmlzKCcudHJlZXZpZXctbWVudScpKSB7XG5cdFx0XHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHRcdH1cblx0XHR9KTtcblxuXHRcdC8vb3BlbiBwYXJlbnQgbWVudXMgd2hlbiBjaGlsZCBpdGVtIGlzIGFjdGl2ZVxuXHRcdCQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcblx0XHRcdCQobWVudSkuZmluZCgnLnRyZWV2aWV3LW1lbnUgbGkuYWN0aXZlJykucGFyZW50cygnLnRyZWV2aWV3JykuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgIFx0XHQgfSk7XG5cdH07XG5cblx0Ly8gQWN0aXZhdGUgc2lkZW5hdiB0cmVlbWVudVxuXHQkLnRyZWUoJy5zaWRlYmFyJyk7XG5cblx0Ly8gQWN0aXZhdGUgc2lkZW5hdiB0b2dnbGVcblx0JC5wdXNoTWVudS5hY3RpdmF0ZShcIltkYXRhLXRvZ2dsZT0nb2ZmY2FudmFzJ11cIik7XG5cblx0Ly9BY3RpdmF0ZSBib290c3RyaXAgdG9vbHRpcHNcblx0Ly8kKFwiW2RhdGEtdG9nZ2xlPSd0b29sdGlwJ11cIikudG9vbHRpcCgpO1xuXG5cdC8vIExvZ2luIFBhZ2UgRmxpcGJveCBjb250cm9sXG5cdCQoJy5sb2dpbi1jb250ZW50IFtkYXRhLXRvZ2dsZT1cImZsaXBcIl0nKS5jbGljayhmdW5jdGlvbigpIHtcblx0XHQkKCcubG9naW4tYm94JykudG9nZ2xlQ2xhc3MoJ2ZsaXBwZWQnKTtcblx0XHRyZXR1cm4gZmFsc2U7XG5cdH0pO1xuXG5cdC8vIFVzaW5nIHNsaW1zY3JvbGwgZm9yIHNpZGViYXJcblx0JCgnLnNpZGViYXInKS5zbGltU2Nyb2xsKHtcblx0XHRoZWlnaHQ6ICgkKHdpbmRvdykuaGVpZ2h0KCkgLSAkKFwiLm1haW4taGVhZGVyXCIpLmhlaWdodCgpKSArIFwicHhcIixcblx0XHRjb2xvcjogXCJyZ2JhKDAsMCwwLDAuOClcIixcblx0XHRzaXplOiBcIjNweFwiXG5cdH0pO1xuXG5cdGlmICggJCgnYm9keScpLmhhc0NsYXNzKCdmaXhlZCcpICYmICQoJ2JvZHknKS5oYXNDbGFzcygnc2lkZWJhci1taW5pJykgJiYgJCgnYm9keScpLmhhc0NsYXNzKCdzaWRlYmFyLWNvbGxhcHNlJykpIHtcblx0XHQkKCcuc2lkZWJhcicpLmNzcyhcIm92ZXJmbG93XCIsXCJ2aXNpYmxlXCIpO1xuXHRcdCQoJy5tYWluLXNpZGViYXInKS5maW5kKFwiLnNsaW1TY3JvbGxEaXZcIikuY3NzKFwib3ZlcmZsb3dcIixcInZpc2libGVcIik7XG5cdH1cblxuICAgIC8vIFNob3cgdXBsb2FkIGltYWdlXG4gICAgJCgnI2ltYWdlJykub24oJ2NoYW5nZScsIGZ1bmN0aW9uIChlKSB7XG4gICAgXHR2YXIgaW5wdXQgPSBlLm9yaWdpbmFsRXZlbnQuc3JjRWxlbWVudDtcbiAgICAgICAgaWYgKGlucHV0LmZpbGVzICYmIGlucHV0LmZpbGVzWzBdKSB7XG4gICAgICAgICAgICB2YXIgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcblxuICAgICAgICAgICAgcmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICAgICAgJCgnI3VwbG9hZF9pbWFnZScpXG4gICAgICAgICAgICAgICAgICAgIC5hdHRyKCdzcmMnLCBlLnRhcmdldC5yZXN1bHQpXG4gICAgICAgICAgICAgICAgICAgIC53aWR0aCgxNTApO1xuICAgICAgICAgICAgfTtcblxuICAgICAgICAgICAgcmVhZGVyLnJlYWRBc0RhdGFVUkwoaW5wdXQuZmlsZXNbMF0pO1xuICAgICAgICB9XG4gICAgfSk7XG5cbn0pO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL2Fzc2V0cy9qcy9tYWluLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==