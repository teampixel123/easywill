// Active Menu...
$(document).ready(function() {
    var url = window.location.href;
    var activePage = url;
    $('.sidebar-link').removeClass('active');
    // alert(activePage);
    $('.sidebar a').each(function () {
        var linkPage = this.href;
        if (activePage == linkPage) {
            $(this).closest(".sidebar-link").addClass("active");
        }
    });
});
