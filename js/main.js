var _gaq=[['_setAccount','UA-18390714-6'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
$(document).ready(function(){ 
$(".sortable").tablesorter({
});
});

(function() {
var method;
var noop = function () {};
var methods = [
'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
'timeStamp', 'trace', 'warn'
];
var length = methods.length;
var console = (window.console = window.console || {});

while (length--) {
method = methods[length];

// Only stub undefined methods.
if (!console[method]) {
console[method] = noop;
}
}
}());

$('.navbar a, .subnav a').smoothScroll();


(function ($) {

$(function(){

// fix sub nav on scroll
var $win = $(window),
$body = $('body'),
$nav = $('.subnav'),
navHeight = $('.navbar').first().height(),
subnavHeight = $('.subnav').first().height(),
subnavTop = $('.subnav').length && $('.subnav').offset().top - navHeight,
marginTop = parseInt($body.css('margin-top'), 10);
isFixed = 0;

processScroll();

$win.on('scroll', processScroll);

function processScroll() {
var i, scrollTop = $win.scrollTop();

if (scrollTop >= subnavTop && !isFixed) {
isFixed = 1;
$nav.addClass('subnav-fixed');
$body.css('margin-top', marginTop + subnavHeight + 'px');
} else if (scrollTop <= subnavTop && isFixed) {
isFixed = 0;
$nav.removeClass('subnav-fixed');
$body.css('margin-top', marginTop + 'px');
}
}

});

})(window.jQuery);

$('a[data-type=popover]').popover({
  html: true,
  trigger: 'hover',
  placement: 'right',
  content: function(){return '<img src="'+$(this).data('img') + '" />';}
});