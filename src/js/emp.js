$(document).ready(function () {
    getEmployeeTable();
})
function getEmployeeTable() {
    $.ajax({
        url: 'api/home/getEmployeeTable.php',
        dataType: 'json',
        type: 'post',
        cache: false,
        success: function (response) {
            let appendData = ``;
            let sno = 1;
            $.each(response, function (key, value) {
                appendData += `<tr>
                <td>${sno}</td>
                <td>${value.emp_name}</td>
                <td>${value.designation}</td>
                <td>${value.dob}</td>
                <td>${value.doj}</td>
                <td>${value.mobile}</td>
                <td>${value.email}</td>
                <td>${value.blood_group}</td>
                <td><a href='uploads/${value.proof}' target='_blank' >View</a></td>
                <td>${value.action}</td>
                </tr>`;
                sno++;
                if (value.insertAccess == false) {
                    $('#add_emp').hide();
                }
            })
            $('#employeeTable tbody').empty().html(appendData);
        },
        error: function () {
            alert("Error Found!");
        }
    }).then(function () {
        callEmpOnclickEvents();
    })
}

function callEmpOnclickEvents() {

    $('.edit_emp').off().on('click', function () {
        let emp_id = $(this).data('id');
        $('#emp_id').val(emp_id);
        $('#emp_div').hide()
        $('#add_emp_div').show()
        getEmployeeData(emp_id);
    })
    $('#add_emp').off().on('click', function () {
        $('#emp_div').hide()
        $('#add_emp_div').show();
    })
    $('#emp_list').off().on('click', function () {
        $('#emp_div').show()
        $('#add_emp_form input,#emp_id,#old_proof').not("[type=submit]").val('');//clear all data
        $('#add_emp_div').hide()
        getEmployeeTable();
    })
    $('#add_emp_form').off().on('submit', function () {
        event.preventDefault();
        if (validate()) {
            submitEmployee();
        } else {
            swalError('Error', 'Please Fill Mandatory Fields!');
        }
    })
}

function validate() {
    let formData = $('#add_emp_form').serializeArray();

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
function submitEmployee() {
    var formData = new FormData($('#add_emp_form')[0]);
    formData.append('emp_id', $('#emp_id').val())
    formData.append('old_proof', $('#old_proof').val())

    $.ajax({
        url: 'api/home/submitEmployee.php',
        data: formData,
        processData: false,
        contentType: false,
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response) {
            if (response == 'Success') {
                if ($('#emp_id').val() == '') {
                    swalSuccess('Success', 'Employee Added Successfully!');
                } else {
                    swalSuccess('Success', 'Employee Updated Successfully!');
                }
                $('#emp_list').trigger('click');
            } else {
                swalError('Error', response)
            }
        }
    })
}
function getEmployeeData(emp_id) {
    $.ajax({
        url: 'api/home/getEmployeeData.php',
        data: { emp_id: emp_id },
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function (response, textStatus) {
            if (textStatus == 'success') {
                $('#emp_name').val(response.emp_name);
                $('#designation').val(response.designation);
                $('#dob').val(response.dob);
                $('#doj').val(response.doj);
                $('#blood_group').val(response.blood_group);
                $('#mobile').val(response.mobile);
                $('#address').val(response.address);
                $('#email').val(response.email);
                $('#old_proof').val(response.proof);
            } else {
                swalError('Error', 'Error While fetchin User data!')
            }
        }
    })
}