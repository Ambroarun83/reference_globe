$(document).ready(function () {
    $('#emp').click(function () {
        $(this).addClass('active');
        $('#users').removeClass('active');
        // $('#emp_div').show();
        // $('#user_div').hide();
        $('#main-container').load('views/employeetable.php');
    })
    $('#users').click(function () {
        $(this).addClass('active')
        $('#emp').removeClass('active');
        // $('#user_div').show();
        // $('#emp_div').hide();
        $('#main-container').load('views/usertable.php');

    })
})