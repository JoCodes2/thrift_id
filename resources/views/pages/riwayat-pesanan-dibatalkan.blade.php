@extends('ui.base')

@section('content')
<div class="bg-gray-50 min-h-screen pb-12">
    @include('ui.profile-pembeli')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @include('ui.nav-profile')

            <div class="lg:col-span-2 space-y-6">
                @include('ui.nav-riwayat')

                <div id="riwayat-list-container" class="grid grid-cols-1 gap-6">
                    <div class="bg-white rounded-[2rem] p-20 text-center border border-gray-100 shadow-sm">
                        <div class="inline-block animate-spin rounded-full h-12 w-12 border-[6px] border-stone-100 border-t-green-700"></div>
                        <p class="text-[10px] font-black text-stone-400 uppercase mt-6 tracking-[0.3em] animate-pulse">
                            Mengambil Data Transaksi...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalInvoice" class="fixed inset-0 z-[100] hidden items-center justify-center p-2 sm:p-4">
    <div class="fixed inset-0 bg-stone-900/60 backdrop-blur-sm"></div>

    <div class="relative w-full max-w-2xl bg-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col max-h-[95vh] animate-in fade-in zoom-in duration-300">
        <div class="h-1.5 w-full bg-green-700 flex-shrink-0"></div>

        <button id="btnCloseModal" class="absolute top-4 right-4 z-10 text-stone-300 hover:text-red-500 transition-colors p-2 bg-white/80 backdrop-blur rounded-full">
            <i class="fa-solid fa-circle-xmark text-2xl md:text-3xl"></i>
        </button>

        <div class="overflow-y-auto p-6 md:p-12">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 border-b border-stone-100 pb-6 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-playfair font-black text-gray-900 italic leading-none">INVOICE</h2>
                    <p id="invoice-trx-id" class="text-[9px] md:text-[11px] font-black text-green-700 uppercase tracking-[0.2em] mt-2 italic">ID: #TRX-LOADING</p>
                </div>
                <div class="sm:text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic">Tgl. Pemesanan</p>
                    <p id="invoice-tgl" class="text-xs md:text-sm font-bold text-gray-900">-</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1 italic text-green-700">Tujuan:</p>
                    <p id="invoice-nama-pembeli" class="font-bold text-gray-900 text-sm md:text-base">-</p>
                    <p id="invoice-alamat-pembeli" class="text-[10px] md:text-xs text-gray-500 leading-tight italic">-</p>
                </div>
            </div>

            <div class="space-y-4 mb-8">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-2 italic">Daftar Barang Pesanan:</p>
                <div id="invoice-items-list" class="space-y-3">
                    </div>
            </div>

            <div class="pt-6 border-t-2 border-dashed border-stone-100 flex justify-between items-center mb-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic">Total Tagihan</p>
                <p id="invoice-total-tagihan" class="text-3xl md:text-4xl font-black text-green-700 tracking-tighter leading-none">Rp 0</p>
            </div>

            <div class="space-y-3">
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center mb-4 italic">Pilih Toko untuk Konfirmasi:</p>
                <div id="invoice-wa-buttons" class="space-y-3">
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/controllers/riwayat.controller.js') }}"></script>
@endsection
