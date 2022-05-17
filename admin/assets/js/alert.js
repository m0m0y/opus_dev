function errorAlert() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false
    })
    
    Toast.fire({
        icon: 'error',
        title: 'Please double check the required fields!'
    })
}

function sucessAlert() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
    })
    
    Toast.fire({
        icon: 'success',
        title: 'Data Updated Successfully'
    })
}