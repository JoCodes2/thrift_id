import authService from "../services/auth.service.js";

$(document).ready(function () {
    const auth = new authService();

    // Setup CSRF untuk JQuery AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fungsi toggle password
    window.togglePassword = function (id = 'password') {
        const input = document.getElementById(id);
        if (input) {
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    }

    function validation() {
        $('#loginForm').validate({
            rules: {
                email: { required: true, email: true },
                password: { required: true, minlength: 8 }
            },
            messages: {
                email: {
                    required: "Email tidak boleh kosong.",
                    email: "Masukkan format email yang benar."
                },
                password: {
                    required: "Password wajib diisi.",
                    minlength: "Password minimal 8 karakter."
                }
            },

            highlight: function (element) {
                $(element).addClass('border-red-500 focus:ring-red-500').removeClass('border-gray-300 border-green-500 focus:ring-green-700');
                const parent = $(element).parent();
                parent.find('.valid-icon, .error-icon').remove();

                // Tambahkan Ikon Silang (FontAwesome)
                const rightPos = (element.type === 'password') ? 'right-10' : 'right-3';
                $(element).after(`
                    <span class="error-icon absolute ${rightPos} top-1/2 -translate-y-1/2 text-red-500 pointer-events-none">
                        <i class="fas fa-circle-xmark"></i>
                    </span>
                `);
            },

            unhighlight: function (element) {
                $(element).addClass('border-green-500 focus:ring-green-500').removeClass('border-red-500 border-gray-300 focus:ring-red-500');
                const parent = $(element).parent();
                parent.find('.valid-icon, .error-icon').remove();

                // Tambahkan Ikon Centang (FontAwesome)
                const rightPos = (element.type === 'password') ? 'right-10' : 'right-3';
                $(element).after(`
                    <span class="valid-icon absolute ${rightPos} top-1/2 -translate-y-1/2 text-green-600 pointer-events-none">
                        <i class="fas fa-circle-check"></i>
                    </span>
                `);
            },

            errorElement: 'p',
            errorClass: 'text-red-500 text-xs mt-1 block w-full font-medium', // Tegak (tanpa italic)

            errorPlacement: function (error, element) {
                if (element.parent('.relative').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
        });
    }

    validation();

    // Handle Login Submit
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            auth.login(this);
        }
    });
});
