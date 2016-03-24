/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#notifElement img').on('click', function () {
            $('#notif_submenu').toggle();
            $('#prof_submenu').hide();
        });
    });
    $(document).ready(function () {
        $('#profElement img').on('click', function () {
            $('#prof_submenu').toggle();
            $('#notif_submenu').hide();
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if (f.target.id !== $("notif_submenu").attr('id') && !$("#notif_submenu").has(f.target).length && f.target.id !== $("#notifElement img").attr('id') && f.target.id !== $("#profElement img").attr('id')) {
                $("#notif_submenu").hide();
            }
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if (f.target.id !== $("prof_submenu").attr('id') && !$("#prof_submenu").has(f.target).length && f.target.id !== $("#notifElement img").attr('id') && f.target.id !== $("#profElement img").attr('id')) {
                $("#prof_submenu").hide();
            }
        });
    });
    $(document).ready(function () {
        $("button[id='search_submit']").on('click', function () {
            $("input[id='search']").focus();
            $('#lightbox').show();
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if ($("#lightbox").is(":visible") && !$("#wrap").has(f.target).length) {
                $("#lightbox").hide();
                $("input[id='search']").val("");
                $('.searchResults').hide();
            }
        });
    });
    $(document).ready(function () {
        $('button[name="cancelAns"]').on('click', function () {
            $(this).closest('.answerClass').slideToggle();
        });
    });
    $(document).ready(function () {
        $('.AnsButton').on('click', function () {
            $(this).next('.answerClass').slideToggle();
        });
    });
}(jQuery));