class userService {
    ajaxRequest(url, method, data = null) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url,
                method,
                data,
                processData: data instanceof FormData ? false : true,
                contentType: data instanceof FormData ? false : 'application/x-www-form-urlencoded',
                success: (response) => resolve(response),
                error: (error) => reject(error),
            });
        });
    }

    async registrasi(formElement) {
        const submitButton = $(formElement).find('button[type="submit"]');
        const originalText = submitButton.html();

        // 1. Tambahkan Konfirmasi Sebelum Submit
        confirmAlert("Apakah Anda yakin data yang dimasukkan sudah benar?", async () => {
            try {
                const formData = new FormData(formElement);

                // Menampilkan loading setelah konfirmasi disetujui
                loadingAllert('Pendaftaran', 'Sedang memproses akun Anda...');
                submitButton.attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memproses...');

                const responseData = await this.ajaxRequest(`${appUrl}/thrif-id/user/create`, 'POST', formData);
                console.log(responseData);

                Swal.close();
                await successAlert();

                window.location.href = '/login';

            } catch (error) {
                Swal.close();
                submitButton.attr('disabled', false).html(originalText);

                if (error.status === 422) {
                    const errors = error.responseJSON?.data ?? error.responseJSON?.errors;
                    const validator = $(formElement).validate();

                    const errorList = {};
                    $.each(errors, function (field, messages) {
                        errorList[field] = messages[0];
                    });

                    validator.showErrors(errorList);
                    warningAlert("Mohon periksa kembali data yang Anda masukkan.");
                    return;
                }

                console.error("Detail Error:", error);
                errorAlert("Terjadi kesalahan sistem, silakan coba lagi nanti.");
            }
        });
    }
}

export default userService;
