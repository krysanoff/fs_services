// require jQuery normally
var $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;

$(function () {
    'use strict';

    var $menu = $('.menu'),
        $hamburger = $('.header__menu'),
        $close_button = $('.menu__close');

    // EVENTS
    // Menu clicks
    $hamburger.on('click', function () {
        $menu.css('display', 'block');
    });

    $close_button.on('click', function () {
        $menu.css('display', 'none');
    });
});