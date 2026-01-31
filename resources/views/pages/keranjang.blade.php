@extends('ui.base')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <nav class="flex text-xs font-bold uppercase tracking-widest text-gray-400 mb-4">
                <a href="/" class="hover:text-green-700">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-600">Keranjang Belanja</span>
            </nav>
            <h1 class="text-3xl font-playfair font-bold text-gray-900">Keranjang Belanja</h1>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8" id="container-keranjang">
                <div class="animate-pulse space-y-4">
                    <div class="h-4 bg-gray-200 rounded w-1/4"></div>
                    <div class="h-40 bg-white rounded-[2rem]"></div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-stone-200/50 sticky top-24 border border-stone-100">
                    <h2 class="font-playfair font-bold text-2xl text-gray-900 mb-8 flex items-center">
                        <span class="w-1.5 h-6 bg-green-700 rounded-full mr-3"></span>
                        Ringkasan Belanja
                    </h2>

                    <div class="space-y-5 mb-10">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Total Produk</span>
                            <span class="font-bold text-gray-900" id="text-total-produk">Rp 0</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Biaya Layanan</span>
                            <span class="text-[10px] font-black text-green-700 uppercase tracking-widest bg-green-50 px-3 py-1 rounded-full border border-green-100">Gratis</span>
                        </div>

                        <div class="pt-6 border-t border-dashed border-stone-200">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Estimasi Total Bayar</p>
                            <p class="text-3xl font-black text-green-700 tracking-tighter" id="text-total-akhir">Rp 0</p>
                            <p class="text-[10px] text-gray-400 italic mt-2 leading-tight">* Belum termasuk ongkos kirim dari masing-masing toko</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button id="btn-checkout" class="w-full bg-green-700 hover:bg-green-800 text-white py-5 rounded-[1.5rem] font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-3 group disabled:bg-gray-300 disabled:shadow-none" disabled>
                            <span>Lanjut ke Checkout</span>
                            <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </button>

                        <a href="/produk" class="w-full bg-stone-50 hover:bg-stone-100 text-stone-500 hover:text-stone-700 py-4 rounded-[1.5rem] font-bold text-[10px] uppercase tracking-widest transition-all text-center block border border-stone-100">
                            Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20" id="section-rekomendasi" style="display: none;">
            <div class="flex items-center gap-4 mb-8">
                <h2 class="text-2xl font-playfair font-bold text-gray-900">Mungkin Anda Suka</h2>
                <div class="h-px bg-stone-200 flex-1"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6" id="container-rekomendasi">
                </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/controllers/keranjang.controller.js') }}"></script>
@endsection
