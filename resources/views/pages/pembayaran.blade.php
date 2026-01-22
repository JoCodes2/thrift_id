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
                    <div class="p-6 border-2 border-stone-50 rounded-2xl bg-stone-50/50">
                        <div class="flex justify-between items-start mb-4">
                            <p class="font-bold text-gray-900 text-sm md:text-base">Andi Budiman</p>
                            <span class="text-[9px] font-black text-gray-400 uppercase tracking-widest bg-white px-3 py-1 rounded-lg border border-stone-100">Utama</span>
                        </div>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed mb-4">Jl. Kenangan No. 45, Kecamatan Coblong, Kota Bandung, Jawa Barat, 40132</p>
                        <p class="text-[10px] md:text-xs font-bold text-gray-500 italic"><i class="fa-solid fa-phone mr-2 text-[10px]"></i>0812-3456-7890</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <h3 class="text-lg font-bold text-gray-900 px-2 flex items-center">
                        <i class="fa-solid fa-shopping-bag mr-3 text-green-700"></i>
                        Ringkasan Barang
                    </h3>

                    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-stone-100 transition-all hover:shadow-md">
                        <div class="bg-stone-50/50 px-8 py-4 border-b border-stone-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-store text-[10px] text-stone-400"></i>
                                <span class="text-[11px] font-black text-gray-900 italic uppercase tracking-wider">ThriftVibe Official</span>
                            </div>
                        </div>
                        <div class="p-6 md:p-8">
                            <div class="flex items-center gap-4 md:gap-6">
                                <div class="w-16 h-16 md:w-20 md:h-20 bg-stone-100 rounded-2xl overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&q=80" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xs md:text-sm italic">Vintage Denim Jacket</h4>
                                    <p class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 italic">Outerwear • Size L</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-[10px] font-bold text-stone-500">1 x Rp 185.000</p>
                                        <p class="text-sm font-black text-gray-900 tracking-tight">Rp 185.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-stone-100 transition-all hover:shadow-md">
                        <div class="bg-stone-50/50 px-8 py-4 border-b border-stone-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-store text-[10px] text-stone-400"></i>
                                <span class="text-[11px] font-black text-gray-900 italic uppercase tracking-wider">SecondBrand Jkt</span>
                            </div>
                        </div>
                        <div class="p-6 md:p-8">
                            <div class="flex items-center gap-4 md:gap-6">
                                <div class="w-16 h-16 md:w-20 md:h-20 bg-stone-100 rounded-2xl overflow-hidden flex-shrink-0">
                                    <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&q=80" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xs md:text-sm italic">Vintage Gold Watch</h4>
                                    <p class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 italic">Seiko • Gold</p>
                                    <div class="flex justify-between items-center mt-2">
                                        <p class="text-[10px] font-bold text-stone-500">1 x Rp 320.000</p>
                                        <p class="text-sm font-black text-gray-900 tracking-tight">Rp 320.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-xl shadow-stone-200/50 border border-stone-100 sticky top-24">
                    <h3 class="text-xl font-playfair font-bold text-gray-900 mb-8">Total Pembayaran</h3>

                    <div class="space-y-4 mb-10">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 font-medium">Subtotal (2 Toko)</span>
                            <span class="text-gray-900 font-bold tracking-tight">Rp 505.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 font-medium">Estimasi Ongkir</span>
                            <span class="text-gray-900 font-bold italic text-[10px] uppercase tracking-tighter">Dihitung Admin</span>
                        </div>
                        <div class="pt-6 border-t border-dashed border-stone-200">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1 text-center">Total Tagihan Sementara</p>
                            <p class="text-4xl font-black text-green-700 tracking-tighter text-center leading-none">Rp 505.000</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button id="btnBuatPesanan" class="w-full bg-green-700 hover:bg-green-800 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-[0.2em] transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-3 group">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Tampilkan Modal
        $('#btnBuatPesanan').on('click', function() {
            $('#modalInvoice').removeClass('hidden').addClass('flex').hide().fadeIn(400);
            $('body').css('overflow', 'hidden'); // Mencegah scroll background
        });

        // Tutup Modal
        $('#btnCloseModal').on('click', function() {
            $('#modalInvoice').fadeOut(300, function() {
                $(this).addClass('hidden').removeClass('flex');
                $('body').css('overflow', 'auto'); // Mengaktifkan scroll background
            });
        });

        // Tutup saat klik luar area (backdrop)
        $('#modalInvoice').on('click', function(e) {
            if (e.target === this) {
                $('#btnCloseModal').click();
            }
        });
    });
</script>
@endsection
