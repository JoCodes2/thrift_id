<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThriftVibe - Sustainable Fashion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap');

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script>
        let appUrl = '{{ env('APP_URL') }}';
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @include('ui.navbar')

    <!-- Hero Section -->
    @yield('content')


    <!-- Footer -->
    @include('ui.footer')


     <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('helpers/alert-ui.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // --- MOBILE MENU ---
            $('#mobile-menu-btn').on('click', function() {
                $('#mobile-menu').toggleClass('hidden');
            });

            // --- PROFILE DROPDOWN STABLE HANDLER ---
            const profileContainer = $('#profileDropdownContainer');
            const profileMenu = $('#profileMenu');

            // Hover Effect (Desktop)
            profileContainer.hover(
                function() { profileMenu.removeClass('hidden'); },
                function() { profileMenu.addClass('hidden'); }
            );

            // Click Effect (Mobile/Touch)
            $('#profileDropdownBtn').on('click', function(e) {
                e.stopPropagation();
                profileMenu.toggleClass('hidden');
            });

            // Close on Click Outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#profileDropdownContainer').length) {
                    profileMenu.addClass('hidden');
                }
            });
        });
    </script>
    <script>
     const urlLogout = `${appUrl}/thrif-id/logout`
     $(document).ready(function() {
         $('#logoutPembeli').click(function(e) {
             Swal.fire({
                title: '<span class="font-playfair text-xl">Konfirmasi!</span>',
                text: "Apakah anda yakin untuk keluar",
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
                 if (result.isConfirmed) {
                     e.preventDefault();
                     $.ajax({
                         url: urlLogout,
                         method: 'POST',
                         dataType: 'json',
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                         success: function(response) {
                             console.log(response);
                             window.location.href = '/login';
                         },
                         error: function(xhr, status, error) {
                             alert('Error: Gagal logout. Silakan coba lagi.');
                         }
                     });
                 }
             });

         });
     });
 </script>
    @section('scripts')
</body>
</html>
