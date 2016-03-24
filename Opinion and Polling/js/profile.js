/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    $(document).ready(function () {
        $('.profi').mouseenter(function () {
            $('.fa-upload').css('display', 'block');
        });
        $('.profi').mouseleave(function () {
            $('.fa-upload').hide();
        });
    });
    $(document).ready(function () {
        $('#edit_button').on('click', function () {
            $('.text_div').css('backgroundColor', '#AAAAAA');
            $('#gender').prop('disabled', false);
            $('#country').prop('disabled', false);
            $('#abe').show();
            $('#em').hide();
        });
    });
    $(document).ready(function () {
        $("input[type=date]").datepicker({
            dateFormat: 'yy-mm-dd',
            inline: true,
            showOtherMonths: true
        });
    });
    $(document).ready(function () {
        $('.profi i').on('click', function () {
            $('#fiUp').click();
        });
    });
    $(document).ready(function () {
        $('#fiUp').change(function () {
            $('.avatar form').submit();
        });
    });
    $(document).ready(function () {   // jQuery methods go here...
        $("#edit_button").click(function () {
            $('input:text').removeAttr("readonly");
            $("#phone").removeAttr("readonly");
            $("#submit_button").show();
            $("#edit_button").hide();
        });
        $(".icon-interests").click(function () {
            $("#interest_main").show();
            $("#personal_div").hide();
            $('#activity_div').hide();
            $('#activity_div1').hide();
            $("main").css("background-color", "red");
            $("main").css("height", "0px");
        });
        $(".icon-users").click(function () {
            $("#interest_main").hide();
            $("#personal_div").show();
            $('#activity_div').hide();
            $('#activity_div1').hide();
        });
        $("#music").click(function () {
            var interest1 = $("#music").clone();
            interest1.appendTo("#your_interest");
        });
        $("#music").click(function () {
            var interest2 = $("#music").clone();
            interest2.appendTo("#your_interest");
        });
    });
    $(document).ready(function () {
        $('.icon-dashboard').click(function () {
            $("#interest_main").hide();
            $("#personal_div").hide();
            $('#activity_div').show();
            $('#activity_div1').show();
            
        });
    });
}(jQuery));