/*jslint browser: true*/
/*global $, jQuery, alert*/
(function ($) {
    "use strict";
    $(document).ready(function () {
        var i = 0;
        $('#search').on('keyup', function () {
            $('.searchResults').show();
            $('.searchResults').empty();
            var x = $('#search').val();
            if (x.length > 0) {
                $.ajax({
                    url: 'search.php',
                    data: 'se=' + x,
                    dataType: 'json',
                    success: function (recdData) {
                        for (i = 0; i < recdData.length; i += 4) {
                            if (recdData[i] === "profile.php?p=") {
                                $('.searchResults').append("<div><img src='users/profile_pics/" + recdData[i + 3] + "'><a href='" + recdData[i] + recdData[i + 1] + "'>" + recdData[i + 2] + "</a></div>");
                            } else {
                                $('.searchResults').append("<a href='" + recdData[i] + recdData[i + 1] + "'><div>" + recdData[i + 2] + "</div></a>");
                            }
                        }
                    }
                });
            } else {
                $('.searchResults').empty();
                $('.searchResults').hide();
                
            }
        });
    });
}(jQuery));