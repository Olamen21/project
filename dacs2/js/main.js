(function ($) {
    "use strict";

    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });

    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });
})(jQuery);

