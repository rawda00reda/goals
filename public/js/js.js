/**
 * Created by hosamzewain on 8/11/15.
 */
/*global $, alert, window, document*/
(function () {
    "use strict";
    $(".open_close_menu").click(function () {
        $(".main_sidebar").toggleClass("right_sidebar");
        $(".main_container").toggleClass("main_menu_open");
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    function hideSideBar() {
        if ($(window).width() < 768) {
            $(".main_sidebar").addClass("right_sidebar");
        } else {
            $(".main_sidebar").removeClass("right_sidebar");
        }
    }
    $(window).resize(function () {
        hideSideBar();
    });
    hideSideBar();
    $(".main_sidebar_wrapper li a").click(function (e) {
        if ($(this).next("ul").hasClass("drop_main_menu")) {
            e.preventDefault();
            if ($(this).next("ul").hasClass("opened")) {
                $(this).next("ul").slideUp().removeClass("opened");
            } else {
                $(this).next("ul").slideDown().addClass("opened");
            }
        }
    });
}());