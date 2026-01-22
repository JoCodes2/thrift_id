@extends('ui.base')

@section('content')
<div class="bg-gray-50 min-h-screen pb-12">
    @include('ui.profile-pembeli')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @include('ui.nav-profile')

            <div class="lg:col-span-2 space-y-6">

                @include('ui.nav-riwayat')
                <div class="grid grid-cols-1 gap-6">

                    <div class="bg-white rounded-[2rem] border-2 border-orange-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4 border-b border-gray-50 pb-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center text-orange-600 border border-orange-100">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h3 class="font-black text-gray-900 text-sm italic">TRX-2026-WAITING</h3>
                                            <span class="text-[10px] text-gray-400 font-bold uppercase italic">{{ date('d M Y') }}</span>
                                        </div>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5 italic">Menunggu Pembayaran / Konfirmasi</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1.5 bg-orange-50 text-orange-600 text-[9px] font-black rounded-lg uppercase tracking-wider border border-orange-100">
                                        Belum Bayar
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-5">
                                <div class="relative flex-shrink-0">
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&q=80" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-800 text-sm truncate italic">Vintage Denim Jacket</h4>
                                    <p class="text-[10px] text-gray-500 mt-1 italic leading-tight">Segera hubungi admin toko untuk detail pembayaran & ongkos kirim.</p>
                                </div>
                                <div class="text-right hidden sm:block border-l border-gray-50 pl-6">
                                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic text-orange-400">Tagihan</p>
                                    <p class="font-black text-gray-900 text-lg tracking-tighter leading-none">Rp 185.000</p>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center justify-between mt-8 pt-6 border-t border-gray-50 gap-4">
                                <div class="flex items-center gap-2 text-orange-600">
                                    <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                                    <p class="text-[10px] font-bold uppercase tracking-tighter">Konfirmasi sebelum stok habis</p>
                                </div>
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <button class="btnShowInvoice flex-1 sm:flex-none px-6 py-3 text-[10px] font-black uppercase tracking-widest text-gray-500 hover:bg-stone-50 rounded-xl transition-all border border-stone-100">
                                        Detail Invoice
                                    </button>
                                    <a href="https://wa.me/628111111?text=Halo%20Admin,%20saya%20ingin%20bayar%20pesanan%20#TRX-WAITING" target="_blank" class="flex-1 sm:flex-none px-6 py-3 text-[10px] font-black uppercase tracking-widest bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition-all shadow-lg shadow-orange-100 text-center">
                                        Bayar Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
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
                    <p class="text-[9px] md:text-[11px] font-black text-green-700 uppercase tracking-[0.2em] mt-2 italic">ID: #TRX-2026-WAITING</p>
                </div>
                <div class="sm:text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest italic">Tgl. Pemesanan</p>
                    <p class="text-xs md:text-sm font-bold text-gray-900">{{ date('d M Y') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <div>
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1 italic text-green-700">Tujuan:</p>
                    <p class="font-bold text-gray-900 text-sm md:text-base">Andi Budiman</p>
                    <p class="text-[10px] md:text-xs text-gray-500 leading-tight italic text-stone-400">Jl. Kenangan No. 45, Coblong, Bandung</p>
                </div>
                <div class="sm:text-right">
                    <p class="text-[9px] font-black text-stone-400 uppercase tracking-widest mb-1 italic text-green-700">Status:</p>
                    <span class="inline-block px-3 py-1 bg-orange-50 text-orange-600 rounded-lg text-[8px] md:text-[9px] font-black uppercase border border-orange-100">Menunggu Konfirmasi</span>
                </div>
            </div>

            <div class="space-y-4 mb-8">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest mb-2 italic">Daftar Barang Pesanan:</p>
                <div class="bg-stone-50 rounded-2xl p-4 flex justify-between items-center border border-stone-100">
                    <div>
                        <p class="font-bold text-gray-900 text-xs md:text-sm italic">Vintage Denim Jacket</p>
                        <p class="text-[9px] text-stone-500 uppercase font-black">ThriftVibe • 1 Unit</p>
                    </div>
                    <p class="font-black text-gray-900 text-xs md:text-sm tracking-tight">Rp 185.000</p>
                </div>
            </div>

            <div class="pt-6 border-t-2 border-dashed border-stone-100 flex justify-between items-center mb-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic text-stone-400">Total Tagihan</p>
                <p class="text-3xl md:text-4xl font-black text-green-700 tracking-tighter leading-none">Rp 185.000</p>
            </div>

            <div class="space-y-3">
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center mb-4 italic">Pilih Toko untuk Konfirmasi Pembayaran:</p>

                <a href="https://wa.me/628111111?text=Halo%20Admin,%20saya%20ingin%20konfirmasi%20pembayaran%20untuk%20#TRX-2026-WAITING"
                   target="_blank"
                   class="flex items-center justify-between px-6 py-4 bg-white border-2 border-green-700/10 hover:border-green-700 rounded-2xl transition-all group shadow-sm">
                    <div class="flex items-center gap-4">
                        <i class="fa-brands fa-whatsapp text-2xl text-green-600"></i>
                        <div class="text-left leading-tight">
                            <p class="text-[9px] font-black text-green-700 uppercase tracking-tighter mb-0.5">Chat Admin Toko</p>
                            <p class="font-bold text-gray-900 text-sm italic">ThriftVibe Official</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-stone-300 group-hover:text-green-700 group-hover:translate-x-1 transition-all"></i>
                </a>

                <button class="w-full flex items-center justify-center space-x-2 py-4 mt-6 border-2 border-stone-100 rounded-2xl hover:bg-stone-50 transition-all font-bold text-[10px] text-stone-400 uppercase tracking-widest">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>Download Detail Invoice</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.btnShowInvoice').on('click', function() {
            $('#modalInvoice').removeClass('hidden').addClass('flex').hide().fadeIn(300);
            $('body').css('overflow', 'hidden');
        });

        $('#btnCloseModal').on('click', function() {
            $('#modalInvoice').fadeOut(200, function() {
                $(this).addClass('hidden').removeClass('flex');
                $('body').css('overflow', 'auto');
            });
        });
    });
</script>
@endsection
