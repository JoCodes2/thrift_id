<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ThriftVibe</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap');

        .font-playfair {
            font-family: 'Playfair Display', serif;
        }

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        let appUrl = '{{ env('APP_URL') }}';
    </script>
</head>
<body class="bg-gradient-to-br from-green-50 to-stone-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-playfair text-gray-900 mb-2">ThriftVibe</h1>
            <p class="text-gray-600">Sustainable Fashion Marketplace</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Buat Akun Baru</h2>

            <form id="registerForm" method="POST">
                @csrf
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div class="relative flex flex-col">
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap*</label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                            placeholder="John Doe">
                    </div>
                    <div class="relative flex flex-col">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">Nomor HP*</label>
                        <input
                            type="tel"
                            id="no_hp"
                            name="no_hp"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                            placeholder="08123456789">
                    </div>
                </div>

                <div class="mb-4 relative flex flex-col">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email*</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                        placeholder="nama@email.com">
                </div>

                <div class="mb-4 relative flex flex-col">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap*</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                        placeholder="Jl. Contoh No. 123..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Daftar Sebagai*</label>
                    <div class="grid grid-cols-2 gap-4" id="roleContainer">
                        <label class="relative flex cursor-pointer">
                            <input type="radio" id="rolePembeli" name="role" value="pembeli" class="peer sr-only" checked>
                            <div class="w-full p-3 text-center border rounded-lg transition-all peer-checked:border-green-700 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-50">
                                <span class="block text-sm font-semibold">Pembeli</span>
                                <span class="text-xs text-gray-500">Cari & beli barang</span>
                            </div>
                        </label>

                        <label class="relative flex cursor-pointer">
                            <input type="radio" id="rolePenjual" name="role" value="penjual" class="peer sr-only">
                            <div class="w-full p-3 text-center border rounded-lg transition-all peer-checked:border-green-700 peer-checked:bg-green-50 peer-checked:text-green-700 hover:bg-gray-50">
                                <span class="block text-sm font-semibold">Penjual</span>
                                <span class="text-xs text-gray-500">Buka toko & jualan</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password*</label>
                        <div class="relative" id="passwordWrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password*</label>
                        <div class="relative" id="confirmWrapper">
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" id="btnRegister" class="w-full bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors mb-4 flex items-center justify-center gap-2">
                    Daftar Sekarang
                </button>

                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ url('/login') }}" class="text-green-700 hover:text-green-800 font-medium">Masuk di sini</a>
                </p>
            </form>
        </div>

        <p class="text-center text-sm text-gray-500 mt-8">
            © 2026 ThriftVibe by JoCodes. All rights reserved.
        </p>
    </div>
         <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('helpers/alert-ui.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="{{ asset('js/controllers/user.controller.js') }}"></script>
</body>
</html>
