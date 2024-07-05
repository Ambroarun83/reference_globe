$(document).ready(function () {
    $('#emp').click(function () {
        $(this).addClass('active');
        $('#users').removeClass('active');
        $('#main-container').empty().load('views/employeetable.php');
    })
    $('#users').click(function () {
        $(this).addClass('active')
        $('#emp').removeClass('active');
        $('#main-container').empty().load('views/usertable.php');
    })
    $('#logout').click(function () {
        swalConfirm('Are You Sure?', "Do you want to logout?", 'Logout', function (response) {
            if (response) logout();
        });
    })
    $('#users').trigger('click');

})

function logout() {
    $.get('api/index/logout.php', function () {
        swalSuccess('Success', 'Logged out Successfully!');
        setTimeout(() => {
            location.reload();
        }, 2000);
    })
}