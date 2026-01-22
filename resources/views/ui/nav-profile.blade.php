<div class="lg:col-span-1 space-y-4">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <nav class="space-y-2">
            <a href="{{ url('/profile') }}"
               class="flex items-center space-x-3 p-3 rounded-xl transition-all font-semibold {{ Request::is('profile') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fa-solid fa-user-gear"></i>
                <span>Biodata Diri</span>
            </a>
            <a href="{{ url('/riwayat-pesanan') }}"
               class="flex items-center space-x-3 p-3 rounded-xl transition-all font-semibold {{ Request::is('riwayat-pesanan*') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Riwayat Pesanan</span>
            </a>
            <hr class="my-4 border-gray-100">
            <button id="logoutPembeli" class="w-full flex items-center space-x-3 p-3 text-red-500 hover:bg-red-50 rounded-xl transition-all font-semibold">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar dari Akun</span>
            </button>
        </nav>
    </div>
</div>
