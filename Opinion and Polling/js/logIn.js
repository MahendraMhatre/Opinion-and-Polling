/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    $(document).ready(function () {
        $("input[name=dob]").datepicker({
            dateFormat: 'yy-mm-dd',
            inline: true,
            showOtherMonths: true
        });
    });
    $(document).ready(function () {
        $("input[name='rep_password']").focusout(function () {
            var p1 = $('input[name="password"]').val(), p2 = $('input[name="rep_password"]').val();
            if (p1 !== p2) {
                $('#passDM').show(300);
            } else if (p1 === "") {
                $('#passDM').show(300);
            } else {
                $('#passDM').hide(300);
            }
        });
    });
    $(document).ready(function () {
        $("input[name=password]").focusin(function () {
            $('#passDM').hide(300);
        });
        $("input[name=rep_password]").focusin(function () {
            $('#passDM').hide(300);
        });
    });
}(jQuery));