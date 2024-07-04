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
            })
            $('#usersTable tbody').empty().html(appendData);
        },
        error: function (response) {
            alert("Error Found!");
        }
    }).then(function () {
        $(document).on('click', '.approve_user', function () {
            let user_id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to approve this!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Approve"
            }).then((result) => {
                if (result.isConfirmed) {
                    approveUser(user_id);
                }
            });
        })
        $(document).on('click', '.delete_user', function () {
            let user_id = $(this).data('id');
            console.log("🚀 ~ user_id:", user_id)
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete"
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUser(user_id);
                }
            });
        })
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