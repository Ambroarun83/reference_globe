function swalSuccess(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    }).then(function () {
        location.reload();
    });
}
function swalError(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "error",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    });
}