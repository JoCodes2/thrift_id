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

                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4 border-b border-gray-50 pb-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-stone-50 rounded-xl flex items-center justify-center text-green-700 border border-stone-100">
                                        <i class="fa-solid fa-receipt"></i>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <h3 class="font-black text-gray-900 text-sm italic">TRX-2026-MULTI</h3>
                                            <span class="text-[10px] text-gray-400 font-bold uppercase italic">{{ date('d M Y') }}</span>
                                        </div>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-0.5">ThriftVibe, +1 Toko lainnya</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1.5 bg-blue-50 text-blue-600 text-[9px] font-black rounded-lg uppercase tracking-wider border border-blue-100 flex items-center">
                                        <span class="relative flex h-2 w-2 mr-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                        </span>
                                        Pesanan Dikirim
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-center gap-5">
                                <div class="relative flex-shrink-0">
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&q=80" class="w-full h-full object-cover">
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 bg-white px-2 py-1 rounded-lg shadow-sm border border-gray-50 text-[9px] font-black italic">+1</div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-800 text-sm truncate italic">Vintage Denim Jacket</h4>
                                    <p class="text-[10px] text-gray-400 mt-1 italic leading-tight">Paket telah diserahkan ke kurir (SiCepat)</p>
                                </div>
                                <div class="text-right hidden sm:block border-l border-gray-50 pl-6">
                                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest italic">Total Bayar</p>
                                    <p class="font-black text-green-700 text-lg tracking-tighter leading-none">Rp 505.000</p>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row items-center justify-between mt-8 pt-6 border-t border-gray-50 gap-4">
                                <p class="text-[10px] text-gray-400 italic">Pesanan otomatis selesai dalam <span class="text-orange-500 font-black tracking-tighter">2 Hari</span></p>
                                <div class="flex items-center gap-3 w-full sm:w-auto">
                                    <button class="btnShowInvoice flex-1 sm:flex-none px-6 py-3 text-[10px] font-black uppercase tracking-widest text-gray-500 hover:bg-stone-50 rounded-xl transition-all border border-stone-100">
                                        Detail Invoice
                                    </button>
                                    <button class="flex-1 sm:flex-none px-6 py-3 text-[10px] font-black uppercase tracking-widest bg-green-700 text-white rounded-xl hover:bg-green-800 transition-all shadow-lg shadow-green-100">
                                        Terima Pesanan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden opacity-70 hover:opacity-100 transition-all">
                        <div class="p-6 md:p-8">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs font-black text-gray-900 uppercase italic tracking-tighter">TRX-77210022</span>
                                    <span class="px-2 py-0.5 bg-stone-100 text-stone-500 text-[8px] font-black rounded-md uppercase tracking-widest">Selesai</span>
                                </div>
                                <span class="text-[10px] font-bold text-gray-400 uppercase italic">01 Jan 2026</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-50 rounded-xl overflow-hidden grayscale">
                                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=100&q=80" class="w-full h-full object-cover">
                                    </div>
                                    <p class="text-xs font-bold text-gray-500 italic">Vintage Gold Watch...</p>
                                </div>
                                <button class="btnShowInvoice text-[10px] font-black text-green-700 uppercase tracking-widest hover:underline">
                                    Detail Invoice
                                </button>
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
                    <p class="text-[9px] md:text-[11px] font-black text-green-700 uppercase tracking-[0.2em] mt-2 italic">ID: #TRX-2026-MULTI</p>
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
                    <p class="text-[10px] md:text-xs text-gray-500 leading-tight italic">Jl. Kenangan No. 45, Coblong, Bandung 40132</p>
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

                <div class="bg-stone-50 rounded-2xl p-4 flex justify-between items-center border border-stone-100">
                    <div>
                        <p class="font-bold text-gray-900 text-xs md:text-sm italic">Vintage Gold Watch</p>
                        <p class="text-[9px] text-stone-500 uppercase font-black">SecondBrand • 1 Unit</p>
                    </div>
                    <p class="font-black text-gray-900 text-xs md:text-sm tracking-tight">Rp 320.000</p>
                </div>
            </div>

            <div class="pt-6 border-t-2 border-dashed border-stone-100 flex justify-between items-center mb-10">
                <p class="text-[10px] font-black text-stone-400 uppercase tracking-widest italic">Total Tagihan</p>
                <p class="text-3xl md:text-4xl font-black text-green-700 tracking-tighter leading-none">Rp 505.000</p>
            </div>

            <div class="space-y-3">
                <p class="text-[9px] font-black text-stone-400 uppercase tracking-[0.2em] text-center mb-4 italic">Pilih Toko untuk Konfirmasi:</p>

                <a href="https://wa.me/628111111?text=Halo%20ThriftVibe,%20saya%20ingin%20konfirmasi%20untuk%20produk%20Denim%20#TRX-MULTI"
                   target="_blank"
                   class="flex items-center justify-between px-6 py-4 bg-white border-2 border-green-700/10 hover:border-green-700 rounded-2xl transition-all group shadow-sm">
                    <div class="flex items-center gap-4">
                        <i class="fa-brands fa-whatsapp text-2xl text-green-600"></i>
                        <div class="text-left leading-tight">
                            <p class="text-[9px] font-black text-green-700 uppercase tracking-tighter mb-0.5">Chat Admin Toko 1</p>
                            <p class="font-bold text-gray-900 text-sm italic">ThriftVibe Official</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-stone-300 group-hover:text-green-700 group-hover:translate-x-1 transition-all"></i>
                </a>

                <a href="https://wa.me/628222222?text=Halo%20SecondBrand,%20saya%20ingin%20konfirmasi%20untuk%20produk%20Watch%20#TRX-MULTI"
                   target="_blank"
                   class="flex items-center justify-between px-6 py-4 bg-white border-2 border-green-700/10 hover:border-green-700 rounded-2xl transition-all group shadow-sm">
                    <div class="flex items-center gap-4">
                        <i class="fa-brands fa-whatsapp text-2xl text-green-600"></i>
                        <div class="text-left leading-tight">
                            <p class="text-[9px] font-black text-green-700 uppercase tracking-tighter mb-0.5">Chat Admin Toko 2</p>
                            <p class="font-bold text-gray-900 text-sm italic">SecondBrand Jkt</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-stone-300 group-hover:text-green-700 group-hover:translate-x-1 transition-all"></i>
                </a>

                <button class="w-full flex items-center justify-center space-x-2 py-4 mt-6 border-2 border-stone-100 rounded-2xl hover:bg-stone-50 transition-all font-bold text-[10px] text-stone-400 uppercase tracking-widest">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>Download Detail Invoice</span>
                </button>
            </div>

            <p class="text-center text-[8px] text-stone-400 mt-8 uppercase tracking-widest italic">
                Invoice generated at: {{ date('H:i:s') }}
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Tampilkan Modal saat klik tombol Detail Invoice
        $('.btnShowInvoice').on('click', function() {
            $('#modalInvoice').removeClass('hidden').addClass('flex').hide().fadeIn(300);
            $('body').css('overflow', 'hidden');
        });

        // Tutup Modal
        $('#btnCloseModal').on('click', function() {
            $('#modalInvoice').fadeOut(200, function() {
                $(this).addClass('hidden').removeClass('flex');
                $('body').css('overflow', 'auto');
            });
        });

        // Klik Luar area modal untuk menutup
        $('#modalInvoice').on('click', function(e) {
            if (e.target === this) $('#btnCloseModal').click();
        });
    });
</script>
@endsection
