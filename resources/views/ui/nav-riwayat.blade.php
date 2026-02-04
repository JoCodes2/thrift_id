<div class="space-y-4">
    <div class="block md:hidden relative">
        <select onchange="location = this.value;"
            class="w-full bg-white border border-gray-100 rounded-2xl px-5 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-gray-900 shadow-sm appearance-none focus:ring-2 focus:ring-green-700/20 outline-none transition-all">

            <option value="/riwayat-pesanan/menunggu" {{ request()->is('riwayat-pesanan/menunggu') ? 'selected' : '' }}>
                ⏳ Filter: Menunggu Konfirmasi
            </option>
            <option value="/riwayat-pesanan/dikirim" {{ request()->is('riwayat-pesanan/dikirim') ? 'selected' : '' }}>
                🚚 Filter: Sedang Dikirim
            </option>
            <option value="/riwayat-pesanan/selesai" {{ request()->is('riwayat-pesanan/selesai') ? 'selected' : '' }}>
                ✅ Filter: Selesai
            </option>
              <option value="/riwayat-pesanan/dibatalkan" {{ request()->is('riwayat-pesanan/dibatalkan') ? 'selected' : '' }}>
                ✅ Filter: Dibatalkan
            </option>
        </select>
        <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
            <i class="fa-solid fa-chevron-down text-[10px]"></i>
        </div>
    </div>

    <div class="hidden md:flex bg-white rounded-2xl p-1.5 shadow-sm border border-gray-100 gap-1">

        <a href="/riwayat-pesanan/menunggu"
           class="flex-1 px-6 py-2.5 rounded-xl text-xs uppercase tracking-widest transition-all text-center
           {{ request()->is('riwayat-pesanan/menunggu') ? 'bg-green-700 text-white shadow-lg shadow-green-100 font-black' : 'text-gray-400 font-bold hover:bg-stone-50 hover:text-gray-600' }}">
            Menunggu
        </a>

        <a href="/riwayat-pesanan/dikirim"
           class="flex-1 px-6 py-2.5 rounded-xl text-xs uppercase tracking-widest transition-all text-center
           {{ request()->is('riwayat-pesanan/dikirim') ? 'bg-green-700 text-white shadow-lg shadow-green-100 font-black' : 'text-gray-400 font-bold hover:bg-stone-50 hover:text-gray-600' }}">
            Dikirim
        </a>

        <a href="/riwayat-pesanan/selesai"
           class="flex-1 px-6 py-2.5 rounded-xl text-xs uppercase tracking-widest transition-all text-center
           {{ request()->is('riwayat-pesanan/selesai') ? 'bg-green-700 text-white shadow-lg shadow-green-100 font-black' : 'text-gray-400 font-bold hover:bg-stone-50 hover:text-gray-600' }}">
            Selesai
        </a>
        <a href="/riwayat-pesanan/dibatalkan"
           class="flex-1 px-6 py-2.5 rounded-xl text-xs uppercase tracking-widest transition-all text-center
           {{ request()->is('riwayat-pesanan/dibatalkan') ? 'bg-green-700 text-white shadow-lg shadow-green-100 font-black' : 'text-gray-400 font-bold hover:bg-stone-50 hover:text-gray-600' }}">
            Dibatalkan
        </a>
    </div>
</div>
