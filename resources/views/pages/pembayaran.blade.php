@extends('ui.base')

@section('content')
<div class="bg-stone-50 min-h-screen pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-3xl font-playfair font-bold text-gray-900">Konfirmasi Pesanan</h1>
            <p class="text-sm text-gray-500 mt-1">Periksa kembali rincian pesanan Anda sebelum membuat invoice.</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-8">

                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-stone-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fa-solid fa-map-location-dot mr-3 text-green-700"></i>
                        Informasi Pengiriman
                    </h3>
                    <div id="container-alamat" class="p-6 border-2 border-stone-50 rounded-2xl bg-stone-50/50">
                        <div class="animate-pulse flex flex-col gap-2">
                            <div class="h-4 bg-stone-200 rounded w-1/4"></div>
                            <div class="h-3 bg-stone-200 rounded w-3/4"></div>
                            <div class="h-3 bg-stone-200 rounded w-1/2"></div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-gray-900 px-2 flex items-center">
                        <i class="fa-solid fa-shopping-bag mr-3 text-green-700"></i>
                        Ringkasan Barang
                    </h3>

                    <div id="container-ringkasan-barang" class="space-y-6">
                        <div class="bg-white p-8 rounded-[2.5rem] border border-dashed border-stone-200 text-center text-stone-400 italic text-sm">
                            Memuat daftar barang...
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-stone-200/50 border border-stone-100 sticky top-24">
                    <h3 class="text-xl font-playfair font-bold text-gray-900 mb-8">Total Pembayaran</h3>

                    <div class="space-y-4 mb-10">
                        <div class="flex justify-between text-sm">
                            <span id="text-label-subtotal" class="text-gray-500 font-medium">Subtotal</span>
                            <span id="text-subtotal" class="text-gray-900 font-bold tracking-tight">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 font-medium">Estimasi Ongkir</span>
                            <span class="text-gray-900 font-bold italic text-[10px] uppercase tracking-tighter">Dihitung Admin</span>
                        </div>
                        <div class="pt-6 border-t border-dashed border-stone-200">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 text-center">Total Tagihan Sementara</p>
                            <p id="text-total-tagihan" class="text-4xl font-black text-green-700 tracking-tighter text-center leading-none">Rp 0</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button id="btnBuatPesanan" class="w-full bg-green-700 hover:bg-green-800 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-3 group disabled:bg-stone-300 disabled:shadow-none" disabled>
                            <span>Buat Pesanan</span>
                            <i class="fa-solid fa-file-invoice group-hover:rotate-12 transition-transform"></i>
                        </button>

                        <a href="/keranjang" class="w-full bg-stone-50 hover:bg-stone-100 text-stone-500 py-4 rounded-2xl font-bold text-[10px] uppercase tracking-widest text-center block transition-all">
                            Kembali ke Keranjang
                        </a>
                    </div>

                    <div class="mt-8 p-4 bg-blue-50 rounded-2xl border border-blue-100">
                        <div class="flex gap-3">
                            <i class="fa-solid fa-circle-info text-blue-500 mt-0.5 text-xs"></i>
                            <p class="text-[10px] text-blue-700 leading-relaxed font-medium">
                                Konfirmasi pembayaran akan diarahkan langsung ke masing-masing admin toko melalui WhatsApp.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/controllers/pembayaran.controller.js') }}"></script>
@endsection
