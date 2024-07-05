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
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
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
    $('#user_register').click(function (event) {
        event.preventDefault();
        if (validate()) {
            registerUser();
        } else {
            swalError('Error', 'Please fill all fields');
        }
    })
})

function validate() {
    let formData = $('#register_form').serializeArray();

    var response = true;

    $.each(formData, function (index, val) {//will loop thru all the input fields in form
        response = validateField(val.value);
        if (response === false) {
            return false;
        }
    })
    return response;

    function validateField(value) {
        if (value === '') {
            event.preventDefault;
            return false;
        }
        return true;
    }
}

function registerUser() {
    var formData = new FormData($('#register_form')[0]);
    $.ajax({
        url: 'api/home/submitUser.php',
        data: formData,
        processData: false,
        contentType: false,
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response == 'Success') {
                if ($('#user_id').val() == '') {
                    swalSuccess('Success', 'User Added Successfully!');
                } else {
                    swalSuccess('Success', 'User Updated Successfully!');
                }
                $('#login').trigger('click');
            } else {
                swalError('Error', response)
            }
        }
    })
}