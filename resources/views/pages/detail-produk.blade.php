@extends('ui.base')

@section('content')
<div class="bg-white min-h-screen pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex text-xs text-gray-400 space-x-2 mb-8 uppercase tracking-widest font-bold">
            <a href="/" class="hover:text-green-700 transition-colors">Beranda</a>
            <span>/</span>
            <a href="/produk" class="hover:text-green-700 transition-colors">Katalog</a>
            <span>/</span>
            <span class="text-gray-600">Detail Produk</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <div class="relative group">
                <div class="absolute top-6 left-6 z-10">
                    <span class="px-4 py-2 bg-green-700 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-xl">
                        Tersedia
                    </span>
                </div>

                <div class="aspect-square bg-stone-100 rounded-[3rem] overflow-hidden border border-gray-100 shadow-sm transition-transform duration-500 hover:scale-[1.01]">
                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=800&q=80"
                         alt="Product Image"
                         class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex flex-col">
                <div class="mb-6">
                    <span class="px-4 py-1.5 bg-green-50 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-100">
                        Outerwear
                    </span>
                    <h1 class="text-4xl font-playfair font-bold text-gray-900 mt-4 leading-tight">Vintage Denim Jacket</h1>

                    <div class="flex items-center mt-4 space-x-4">
                        <div class="flex items-center text-orange-400 font-bold">
                            <i class="fa-solid fa-star mr-1"></i>
                            <span class="text-gray-900 text-sm">4.8 <span class="text-gray-400 font-medium ml-1">(24 Ulasan)</span></span>
                        </div>
                        <span class="text-gray-200">|</span>
                        <span class="text-sm text-gray-500 font-bold uppercase tracking-tighter">Terjual 12 Produk</span>
                    </div>
                </div>

                <div class="bg-stone-50 rounded-[2rem] p-8 mb-8 border border-stone-100 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-100/30 rounded-full blur-2xl"></div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Harga Koleksi</p>
                    <p class="text-4xl font-black text-gray-900 tracking-tighter">Rp 185.000</p>
                </div>

                <div class="flex items-center p-6 border-2 border-gray-50 rounded-3xl mb-8 group hover:border-green-700/10 transition-all duration-300">
                    <div class="w-14 h-14 rounded-2xl overflow-hidden bg-stone-100 flex-shrink-0 border border-gray-100">
                        <img src="https://via.placeholder.com/150" alt="Logo Toko" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4 flex-1">
                        <h4 class="font-bold text-gray-900 leading-tight group-hover:text-green-700 transition-colors">ThriftVibe Official</h4>
                        <p class="text-[11px] text-gray-400 font-medium mt-1 uppercase tracking-wider">
                            <i class="fa-solid fa-location-dot mr-1"></i> Kab. Bandung, Jawa Barat
                        </p>
                    </div>
                    <a href="#" class="text-[10px] font-black text-green-700 hover:text-white hover:bg-green-700 uppercase px-5 py-2.5 bg-green-50 rounded-xl transition-all">Toko</a>
                </div>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <button class="py-4 bg-stone-100 text-gray-700 font-bold rounded-2xl hover:bg-stone-200 transition-all flex items-center justify-center space-x-3 group">
                            <i class="fa-solid fa-cart-plus text-lg group-hover:scale-110 transition-transform"></i>
                            <span>Keranjang</span>
                        </button>
                      <a href="{{ url('/pembayaran') }}" class="py-4 bg-green-700 text-white font-bold rounded-2xl shadow-xl shadow-green-100 hover:bg-green-800 transition-all transform active:scale-95 text-center block">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 pt-16 border-t border-gray-100">
            <div class="lg:col-span-2 space-y-12">
                <div>
                    <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-6 flex items-center">
                        <span class="w-1.5 h-8 bg-green-700 rounded-full mr-3"></span>
                        Detail Produk
                    </h3>
                    <div class="prose prose-stone max-w-none text-gray-600 leading-relaxed font-medium">
                        <p>Jaket denim vintage dengan kualitas premium. Masih sangat bagus, tidak ada cacat permanen, warna masih pekat 90%. Sangat cocok untuk gaya casual outdoor.</p>
                    </div>
                </div>

                <div class="bg-stone-50 rounded-3xl p-8 border border-stone-100">
                    <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6">Spesifikasi Barang</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Bahan</p>
                            <p class="text-sm font-bold text-gray-800">Heavyweight Denim</p> </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Ukuran</p>
                            <p class="text-sm font-bold text-gray-800">L (P: 70cm, L: 55cm)</p> </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Kondisi</p>
                            <p class="text-sm font-bold text-green-700">Sangat Baik (9/10)</p> </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <h3 class="text-2xl font-playfair font-bold text-gray-900 mb-8 flex items-center">
                    <span class="w-1.5 h-8 bg-green-700 rounded-full mr-3"></span>
                    Ulasan
                </h3>
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-center mb-4">
                            <div class="flex text-orange-400 text-[10px] space-x-0.5">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="ml-auto text-[10px] font-bold text-gray-400 italic">12 Jan 2026</span>
                        </div>
                        <p class="text-sm text-gray-600 font-medium leading-relaxed mb-4">"Barangnya mantap banget, sesuai foto. Pengiriman juga cepet!"</p>
                        <div class="flex items-center pt-4 border-t border-gray-50">
                            <div class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-[10px] text-green-700 font-black border border-green-100">AB</div>
                            <span class="ml-3 text-[10px] font-bold text-gray-900 uppercase tracking-widest">Andi Budiman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
