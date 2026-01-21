class authService {
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

    async login(formElement) {
        const submitButton = $(formElement).find('button[type="submit"]');
        const originalText = submitButton.html();

        try {
            const formData = new FormData(formElement);

            loadingAllert('Autentikasi', 'Sedang memvalidasi kredensial...');
            submitButton.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Memproses...');

            const responseData = await this.ajaxRequest(`${appUrl}/thrif-id/login`, 'POST', formData);
            if (responseData.status === "success") {
                Swal.close();
                await successAlert();

                formElement.reset();
                setTimeout(() => {
                    const role = responseData.data.role;
                    if (role == 'super-admin' || role == 'penjual') {
                        window.location.href = '/dashboard';
                    } else if (role == 'pembeli') {
                        window.location.href = '/profile';
                    } else {
                        window.location.href = '/';
                    }
                }, 1000);
            }

        } catch (error) {
            Swal.close();
            submitButton.prop('disabled', false).html(originalText);

            if (error.status === 401) {
                warningAlert("Email atau Password salah!");
            } else if (error.status === 422) {
                const errors = error.responseJSON?.errors;
                const validator = $(formElement).validate();

                let errorList = {};
                $.each(errors, function (field, messages) {
                    errorList[field] = messages[0];
                });

                validator.showErrors(errorList);
                warningAlert("Mohon periksa kembali inputan Anda.");
            } else if (error.status === 404) {
                warningAlert("Akun tidak ditemukan.");
            } else {
                errorAlert("Terjadi kesalahan sistem, silakan coba lagi nanti.");
            }
            console.error("Login Error:", error);
        }
    }
}

export default authService;
