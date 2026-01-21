import userService from "../services/user.service.js";

$(document).ready(function () {
    const registrasi = new userService();

    window.togglePassword = function (id) {
        const input = document.getElementById(id);
        if (input) {
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    }
    $('#no_hp').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function validation() {
        $('#registerForm').validate({
            rules: {
                nama: { required: true, maxlength: 255 },
                email: { required: true, email: true },
                no_hp: { required: true, minlength: 10 },
                alamat: { required: true },
                role: { required: true },
                password: { required: true, minlength: 8 },
                password_confirmation: { required: true, equalTo: "#password" }
            },
            messages: {
                nama: { required: "Nama wajib diisi." },
                email: { required: "Email wajib diisi.", email: "Format email salah." },
                no_hp: { required: "Nomor HP wajib diisi." },
                alamat: { required: "Alamat wajib diisi." },
                role: { required: "Pilih salah satu." },
                password: { required: "Password wajib diisi.", minlength: "Minimal 8 karakter." },
                password_confirmation: { required: "Konfirmasi password wajib.", equalTo: "Password tidak sama." }
            },

            highlight: function (element) {
                $(element).addClass('border-red-500 focus:ring-red-500').removeClass('border-gray-300 border-green-500 focus:ring-green-700');

                const parent = $(element).parent();
                parent.find('.valid-icon, .error-icon').remove();

                if (element.type !== 'radio') {
                    // Jika textarea, taruh ikon di pojok kanan atas, jika input biasa di tengah (top-1/2)
                    const isTextArea = element.tagName === 'TEXTAREA';
                    const posClass = isTextArea ? 'right-3 top-3' : 'right-3 top-1/2 -translate-y-1/2';
                    const rightPos = (element.type === 'password') ? 'right-10 top-1/2 -translate-y-1/2' : posClass;

                    $(element).after(`
                    <span class="error-icon absolute ${rightPos} text-red-500 pointer-events-none">
                        <i class="fas fa-circle-xmark"></i>
                    </span>
                `);
                }
            },

            unhighlight: function (element) {
                $(element).addClass('border-green-500 focus:ring-green-500').removeClass('border-red-500 border-gray-300 focus:ring-red-500');

                const parent = $(element).parent();
                parent.find('.valid-icon, .error-icon').remove();

                if (element.type !== 'radio') {
                    const isTextArea = element.tagName === 'TEXTAREA';
                    const posClass = isTextArea ? 'right-3 top-3' : 'right-3 top-1/2 -translate-y-1/2';
                    const rightPos = (element.type === 'password') ? 'right-10 top-1/2 -translate-y-1/2' : posClass;

                    $(element).after(`
                    <span class="valid-icon absolute ${rightPos} text-green-600 pointer-events-none">
                        <i class="fas fa-circle-check"></i>
                    </span>
                `);
                }
            },

            errorElement: 'p',
            // Menghapus 'italic' dan menggunakan font-medium agar lebih rapi
            errorClass: 'text-red-500 text-xs mt-1 block w-full font-medium',

            errorPlacement: function (error, element) {
                if (element.attr("name") == "role") {
                    error.insertAfter(element.closest('.grid'));
                } else if (element.attr("id") == "password" || element.attr("id") == "password_confirmation") {
                    error.insertAfter(element.closest('.relative'));
                } else {
                    error.insertAfter(element);
                }
            },
        });
    }

    validation();

    $('#btnRegister').on('click', function (e) {
        e.preventDefault();
        if ($('#registerForm').valid()) {
            registrasi.registrasi($('#registerForm')[0]);
        }
    });
});
