function swalSuccess(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
    }).then(function () {
        // location.reload();
    });
}
function swalError(title, text) {
    Swal.fire({
        title: title,
        text: text,
        icon: "error",
    });
}
function swalConfirm(title, text, button, callback) {
    Swal.fire({
        title: title,
        text: text,
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: button
    }).then((result) => {
        if (result.isConfirmed) {
            callback(true);
        } else {
            callback(false);
        }
    });
}