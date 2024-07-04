$(document).ready(function () {
    $('#emp').click(function () {
        $(this).addClass('active');
        $('#users').removeClass('active');
        $('#main-container').load('views/employeetable.php')
    })
    $('#users').click(function () {
        $(this).addClass('active')
        $('#emp').removeClass('active');
        $('#main-container').load('views/usertable.php')
    })
})