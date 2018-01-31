$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#sidebarCollapse').toggleClass('active');
        $('#hueco_sidebar').toggleClass('active');
    });

});
