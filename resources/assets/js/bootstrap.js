
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

//magnetic scroll
// window.jQuery.fn.reverse=[].reverse,function(t){t.magneticScroll=function(o){var e={selector:".magnetic",easing:"swing",speed:500,timeout:200,beforeScroll:t.noop,afterScroll:t.noop},a=t.extend(e,o),r={animateScroll:function(o,e,r){a.beforeScroll(),t("html, body").stop().animate({scrollTop:e+"px"},a.speed,a.easing,function(){setTimeout(function(){t("html,body").stop().removeClass("scrolling"),a.afterScroll(o,r)},a.timeout)})}};t(document).ready(function(){t(a.selector).each(function(){t(this).attr("data-offset",t(this).offset().top)});var o=/Firefox/i.test(navigator.userAgent)?"DOMMouseScroll":"mousewheel";t("body:not(.scrolling)").bind(o,function(o){if(o.preventDefault(),t(this).hasClass("scrolling"))o.preventDefault();else{t(this).addClass("scrolling");var e=t(window).scrollTop(),s=window.event||o;s=s.originalEvent?s.originalEvent:s;var l=s.detail?-40*s.detail:s.wheelDelta;if(l>0)t(window).scrollTop()>0?t(a.selector).reverse().each(function(){var o=0;return Math.round(t(this).attr("data-offset"))<Math.round(e)?(r.animateScroll(t(this),t(this).attr("data-offset"),"up"),o=1,!1):void(0===o&&r.animateScroll(t(this),0,"up"))}):t("html,body").stop().removeClass("scrolling");else{var n=!0;t(a.selector).each(function(){return Math.round(t(this).attr("data-offset"))>Math.round(e)?(n=!1,r.animateScroll(t(this),t(this).attr("data-offset"),"down"),!1):void 0}),n&&t("html,body").stop().removeClass("scrolling")}}o.stopPropagation()})}).keydown(function(o){var e=t(window).scrollTop(),s=o.which;if(38==s)o.preventDefault(),t("body").hasClass("scrolling")||(t("body").addClass("scrolling"),t(a.selector).reverse().each(function(){return Math.round(t(this).attr("data-offset"))<Math.round(e)?(r.animateScroll(t(this),t(this).attr("data-offset"),"up"),!1):void 0}));else if(40==s&&(o.preventDefault(),!t("body").hasClass("scrolling"))){t("body").addClass("scrolling");var l=!0;t(a.selector).each(function(){return Math.round(t(this).attr("data-offset"))>Math.round(e)?(l=!1,r.animateScroll(t(this),t(this).attr("data-offset"),"down"),!1):void 0}),l&&t("html,body").stop().removeClass("scrolling")}})}}(jQuery);

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');
require('vue-resource');
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
