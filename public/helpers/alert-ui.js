// reload browser
function realoadBrowser() {
    window.location.reload();
}
// alert success message - Tema Green-700 ThriftVibe
function successAlert(message) {
    return Swal.fire({
        title: '<span class="font-playfair text-2xl">Berhasil!</span>',
        text: message,
        icon: 'success',
        iconColor: '#15803d',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
            popup: 'rounded-2xl shadow-xl',
        }
    });
}

// alert confirm message - Tema Green-700 ThriftVibe
function confirmAlert(message, callback) {
    Swal.fire({
        title: '<span class="font-playfair text-xl">Konfirmasi!</span>',
        text: message,
        iconColor: '#15803d',
        showCancelButton: true,
        confirmButtonText: 'Ya, Lanjutkan',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        confirmButtonColor: '#15803d',
        cancelButtonColor: '#EFEFEF',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-lg px-6 py-2 font-medium',
            cancelButton: 'rounded-lg px-6 py-2 font-medium text-gray-700'
        }
    }).then((result) => {
        if (result.isConfirmed && typeof callback === "function") {
            callback();
        }
    });
}

// alert loading message
const loadingAllert = (title = 'Mohon Tunggu', text = 'Sedang memproses data...') => {
    return Swal.fire({
        title: `<span class="font-playfair text-xl">${title}</span>`,
        text: text,
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showConfirmButton: false,
        iconColor: '#15803d',
        didOpen: () => {
            Swal.showLoading();
        },
        customClass: {
            popup: 'rounded-2xl',
        }
    });
};

// alert warning message
function warningAlert(message) {
    return Swal.fire({
        title: '<span class="font-playfair text-xl">Peringatan!</span>',
        text: message,
        icon: 'warning',
        iconColor: '#FFAD46',
        timer: 5000,
        showConfirmButton: true,
        confirmButtonText: 'Ok',
        confirmButtonColor: '#FFAD46',
        customClass: {
            popup: 'rounded-2xl',
            confirmButton: 'rounded-lg px-8 py-2'
        }
    });
}

// alert error message
function errorAlert(message = 'Terjadi kesalahan!') {
    return Swal.fire({
        title: '<span class="font-playfair text-xl">Error</span>',
        text: message,
        icon: 'error',
        iconColor: '#ef4444',
        showConfirmButton: false,
        timer: 2000,
        customClass: {
            popup: 'rounded-2xl',
        }
    });
}
