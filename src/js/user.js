$(document).ready(function () {
    getUserTable();
})

function getUserTable() {
    $.ajax({
        url: 'api/home/getUserTable.php',
        dataType: 'json',
        type: 'post',
        cache: false,
        success: function (response) {
            let appendData = ``;
            let sno = 1;
            $.each(response, function (key, value) {
                appendData += `<tr>
                <td>${sno}</td>
                <td>${value.name}</td>
                <td>${value.email}</td>
                <td>${value.mobile}</td>
                <td>${value.role}</td>
                <td>${value.action}</td>
                </tr>`;
                sno++;
                if (value.insertAccess == false) {
                    $('#add_user').hide();
                }
            })
            $('#usersTable tbody').empty().html(appendData);
        },
        error: function (response) {
            alert("Error Found!");
        }
    }).then(function () {
        callUserOnclickEvents();
    })
}
function approveUser(user_id) {
    $.ajax({
        url: 'api/home/approveUser.php',
        data: { user_id },
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.includes('Successfully')) {
                swalSuccess('Success', response);
                getUserTable();
            } else {
                swalError('Error', response)
            }
        }
    })
}
function rejectUser(user_id) {
    $.ajax({
        url: 'api/home/rejectUser.php',
        data: { user_id },
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.includes('Successfully')) {
                swalSuccess('Success', response);
                getUserTable();
            } else {
                swalError('Error', response)
            }
        }
    })
}
function deleteUser(user_id) {
    $.ajax({
        url: 'api/home/deleteUser.php',
        data: { user_id },
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response.includes('Successfully')) {
                swalSuccess('Success', response);
                getUserTable();
            } else {
                swalError('Error', response)
            }
        }
    })
}

function callUserOnclickEvents() {

    $('.approve_user').off().on('click', function () {
        let user_id = $(this).data('id');
        swalConfirm('Are you sure?', 'Do you want to Approve this!', 'Approve', function (response) {
            if (response) {
                approveUser(user_id);
            }
        })
    })
    $('.reject_user').off().on('click', function () {
        let user_id = $(this).data('id');
        swalConfirm('Are you sure?', 'Do you want to Reject this!', 'Reject', function (response) {
            if (response) {
                rejectUser(user_id);
            }
        })
    })
    $('.delete_user').off().on('click', function () {
        let user_id = $(this).data('id');
        swalConfirm('Are you sure?', 'Do you want to Delete this!', 'Delete', function (response) {
            if (response) {
                deleteUser(user_id);
            }
        })
    })
    $('.edit_user').off().on('click', function () {
        let user_id = $(this).data('id');
        $('#user_id').val(user_id);
        $('#user_div').hide()
        $('#add_user_div').show()
        getUserData(user_id);
    })
    $('#add_user').off().on('click', function () {
        $('#user_div').hide()
        $('#add_user_div').show()
    })
    $('#user_list').off().on('click', function () {
        $('#user_div').show()
        $('#add_user_form input,#add_user_form select,#user_id').not("[type=submit]").val('')
        $('#add_user_div').hide()
        getUserTable();
    })
    $('#add_user_form').off().on('submit', function (event) {
        event.preventDefault();
        if (validate()) {
            submitUser();
        } else {
            swalError('Error', 'Please Fill Mandatory Fields!');
        }
    })
}
function validate() {
    let formData = $('#add_user_form').serializeArray();

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
function submitUser() {
    var formData = new FormData($('#add_user_form')[0]);
    formData.append('user_id', $('#user_id').val())
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
                $('#user_list').trigger('click');
            } else {
                swalError('Error', response)
            }
        }
    })
}
function getUserData(user_id) {
    $.ajax({
        url: 'api/home/getUserData.php',
        data: { user_id: user_id },
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response, textStatus) {
            if (textStatus == 'success') {
                $('#role').val(response.role);
                $('#name').val(response.name);
                $('#password').val(response.password);
                $('#mobile').val(response.mobile);
                $('#email').val(response.email);
                $('#address').val(response.address);
                $('#gender').val(response.gender);
                $('#dob').val(response.dob);
            } else {
                swalError('Error', 'Error While fetchin User data!')
            }
        }
    })
}