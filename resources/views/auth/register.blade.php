<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - ThriftVibe</title>
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
    <script>
        let appUrl = '{{ env('APP_URL') }}';
    </script>
</head>
<body class="bg-gradient-to-br from-green-50 to-stone-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-playfair text-gray-900 mb-2">ThriftVibe</h1>
            <p class="text-gray-600">Sustainable Fashion Marketplace</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Buat Akun Baru</h2>

            <!-- Error Message -->
            <div id="errorMessage" class="hidden mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-red-700" id="errorText"></p>
                </div>
            </div>

            <form id="registerForm" onsubmit="handleRegister(event)">
                <!-- Role Selection -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Daftar Sebagai*</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex items-center justify-center p-4 border-2 border-green-700 bg-green-50 rounded-lg cursor-pointer">
                            <input type="radio" name="role" value="pembeli" checked onchange="toggleSellerFields()" class="sr-only">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-green-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-semibold text-gray-900">Pembeli</span>
                            </div>
                        </label>
                        <label class="relative flex items-center justify-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-700 hover:bg-green-50 transition-colors">
                            <input type="radio" name="role" value="penjual" onchange="toggleSellerFields()" class="sr-only">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-semibold text-gray-900">Penjual</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Personal Info -->
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap*</label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                            placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP*</label>
                        <input
                            type="tel"
                            id="no_hp"
                            name="no_hp"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                            placeholder="08123456789">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email*</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        placeholder="nama@email.com">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap*</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        required
                        rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        placeholder="Jl. Contoh No. 123, RT/RW 01/02, Kelurahan, Kecamatan, Kota, Provinsi"></textarea>
                </div>

                <!-- Seller Fields (Hidden by default) -->
                <div id="sellerFields" class="hidden mb-4">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-sm text-green-700">Sebagai penjual, kamu bisa menjual produk thrift-mu di ThriftVibe!</p>
                        </div>
                    </div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Toko*</label>
                    <input
                        type="text"
                        id="nama_toko"
                        name="nama_toko"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        placeholder="Nama toko kamu">
                </div>

                <!-- Password -->
                <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password*</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password*</label>
                        <div class="relative">
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
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

                <!-- Terms -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" required class="w-4 h-4 text-green-700 border-gray-300 rounded focus:ring-green-700 mt-1">
                        <span class="ml-2 text-sm text-gray-600">
                            Saya setuju dengan <a href="#" class="text-green-700 hover:text-green-800 font-medium">Syarat & Ketentuan</a> dan <a href="#" class="text-green-700 hover:text-green-800 font-medium">Kebijakan Privasi</a>
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors mb-4">
                    Daftar Sekarang
                </button>

                <!-- Login Link -->
                <p class="text-center text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="{{ url('/login') }}"  class="text-green-700 hover:text-green-800 font-medium">Masuk di sini</a>
                </p>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center text-sm text-gray-500 mt-8">
            © 2024 ThriftVibe. All rights reserved.
        </p>
    </div>
         <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
