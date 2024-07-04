$(document).ready(function () {
    $('#register').click(function () {
        $('.login_page').hide();
        $('#login_form input').not("[type=submit]").val('');
        $('.register_page').show();
    })
    $('#login').click(function () {
        $('.login_page').show();
        $('.register_page').hide();
        $('#register_form input,#register_form select').not("[type=submit]").val('');
    })
    $('#login_form').on('submit', function (event) {
        event.preventDefault();

        let username = $('#lusername').val();
        let password = $('#lpassword').val();
        if (username === '' || password === '') {
            swalError('Error', 'Please fill all fields!');
        } else {
            let formData = $('#login_form').serializeArray();
            $.ajax({
                url: 'api/index/login.php',
                data: formData,
                type: 'post',
                dataType: 'json',
                cache: false,
                success: function (response) {
                    if (response == 'Success') {
                        swalSuccess('Welcome Back', 'Successfully Logged In!');
                    } else if (response == 'Invalid') {
                        swalError('Error', 'Invalid Credentials!');
                    }
                },
                error: function (response) {
                    alert('Error Found!')
                }
            })

        }
    })
})
function logout() {
    $.get('api/index/logout.php', function () {
        swalSuccess('Success', 'Logged out Successfully!');
    })
}