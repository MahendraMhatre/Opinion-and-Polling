/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#eContent').on("click", function () {
            $('#eContent').hide();
            $('#editMail').show();
            $("#editMail input").val($("#eContent span").text());
            $('#editMail input').select();
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if (f.target.id !== $("#editMail").attr('id') && !$("#editMail").has(f.target).length) {
                $('#eContent').show();
                $('#editMail').hide();
            }
        });
    });
    $(document).ready(function () {
        $("#editMail input").keypress(function (f) {
            if (f.keyCode === 13) {
                $("#eContent span").text($("input[name=eID]").val());
                $('#editMail').hide();
                $('#eContent').show();
                
            }
        });
    });
    $(document).ready(function () {
        $('#userContent').on("click", function () {
            $('#userContent').hide();
            $('#editUser').show();
            $("#editUser input").val($("#userContent span").text());
            $('#editUser input').select();
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if (f.target.id !== $("#editUser").attr('id') && !$("#editUser").has(f.target).length) {
                $('#userContent').show();
                $('#editUser').hide();
            }
        });
    });
    $(document).ready(function () {
        $("#editUser input").keypress(function (f) {
            if (f.keyCode === 13) {
                $("#dynamic_user").text($("input[name=eU]").val());
                $('#editUser').hide();
                $('#userContent').show();
                
            }
        });
    });
    $(document).ready(function () {
        $('#passwordContent').on("click", function () {
            if ($("#passwordContent").html() !== 'Password Changed Successfully. <img src="assets/success_icon.png" alt="Success">') {
                $('#passwordContent').hide();
                $('#editPassword').css("display", "inline-block");
                $('#editPassword').show();
            }
        });
    });
    $(document).ready(function () {
        $("body").mouseup(function (f) {
            if (f.target.id !== $("#editPassword").attr('id') && !$("#editPassword").has(f.target).length) {
                $('#passwordContent').show();
                $('#editPassword').hide();
            }
        });
    });
    $(document).ready(function () {
        $("#editPassword input").keypress(function (f) {
            if (f.keyCode === 13) {
                if (f.target.name === $('#editPassword input[name="eP"]').attr('name')) {
                    $('input[name="eP2]').focus();
                }
                if (f.target.name === $('#editPassword input[name="eP2"]').attr('name')) {
                    if ($('#editPassword input[name="eP"]').val() === $('#editPassword input[name="eP2"]').val()) {
                        $("#passwordContent").html('Password Changed Successfully. <img src="assets/success_icon.png" alt="Success">');
                        $('#editPassword').hide();
                        $('#passwordContent').show();
                    } else {
                        $('#editPassword input[name="eP2"]').css('border', '2px solid red');
                    }
                }
            }
        });
    });
    $(document).ready(function () {
        $('#editUser form').on('submit', function () {
            var y = $('#editUser input[type=text]').val();
            if (y.length > 0) {
                $.ajax({
                    url: 'Settings_ajax.php',
                    data: 'un=' + y,
                    success: function (recdData) {
                        $('$dynamic_user').html(recdData);
                    }
                });
            }
        });
    });
}(jQuery));