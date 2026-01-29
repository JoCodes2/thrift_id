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
                    <div class="absolute top-6 left-6 z-10 flex flex-col gap-2">
                        <span
                            class="px-4 py-2 bg-green-700 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-xl">
                            {{ ucfirst($produk->status_stok) }}
                        </span>
                    </div>

                    <div
                        class="aspect-square bg-stone-100 rounded-[3rem] overflow-hidden border border-gray-100 shadow-sm transition-transform duration-500 hover:scale-[1.01]">
                        <img src="{{ asset('uploads/gambar/' . ($produk->deskrisp->first()->gambar ?? 'default.jpg')) }}"
                            alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="mb-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <span
                                class="px-4 py-1.5 bg-green-50 text-green-700 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-100">
                                {{ $produk->kategori->nama_kategori ?? 'Kategori' }}
                            </span>
                        </div>

                        <h1 class="text-4xl font-playfair font-bold text-gray-900 leading-tight">{{ $produk->nama_produk }}
                        </h1>

                        <div class="flex items-center mt-4 space-x-4">
                            <div class="flex items-center text-orange-400 font-bold">
                                <i class="fa-solid fa-star mr-1"></i>
                                <span class="text-gray-900 text-sm">4.8 <span class="text-gray-400 font-medium ml-1">(24
                                        Ulasan)</span></span>
                            </div>
                            <span class="text-gray-200">|</span>
                            <span class="text-sm text-gray-500 font-bold uppercase tracking-tighter">Terjual
                                {{ $produk->jumlah_terjual }}
                                Produk</span>
                        </div>
                    </div>

                    <div class="bg-stone-50 rounded-[2.5rem] p-8 mb-8 border border-stone-100 relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-100/30 rounded-full blur-2xl"></div>

                        <div class="relative z-10">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Harga Koleksi
                            </p>
                            <p class="text-4xl font-black text-gray-900 tracking-tighter">Rp
                                {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center p-6 border-2 border-stone-100 rounded-[2.5rem] mb-8 group hover:border-green-700/20 hover:bg-green-50/10 transition-all duration-300">
                        <div class="relative">
                            <div
                                class="w-16 h-16 rounded-2xl overflow-hidden bg-stone-100 shadow-sm border border-stone-200 p-1 flex-shrink-0">
                                <img src="{{ asset('uploads/foto/' . ($produk->toko->foto ?? 'default.jpg')) }}"
                                    alt="{{ $produk->toko->nama_toko ?? 'Logo Toko' }}"
                                    class="w-full h-full object-cover rounded-xl">
                            </div>
                            <div
                                class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-600 rounded-full border-2 border-white flex items-center justify-center">
                                <i class="fa-solid fa-check text-[8px] text-white"></i>
                            </div>
                        </div>

                        <div class="ml-5 flex-1">
                            <div class="flex items-center">
                                <h4
                                    class="font-black text-gray-900 leading-tight uppercase tracking-tight group-hover:text-green-700 transition-colors">
                                    {{ $produk->toko->nama_toko ?? 'Nama Toko' }}</h4>
                            </div>

                            <p class="text-[11px] text-gray-400 font-bold mt-1 uppercase tracking-widest flex items-center">
                                <i class="fa-solid fa-location-dot mr-1.5 text-green-700"></i>
                                {{ $produk->toko->alamat_toko ?? 'Alamat tidak tersedia' }}
                            </p>

                            <div class="flex flex-wrap items-center mt-2 gap-3">
                                <span class="text-[9px] font-black text-stone-400 uppercase flex items-center">
                                    <i class="fa-solid fa-phone mr-1 text-green-600/50"></i>
                                    {{ $produk->toko->no_hp_toko ?? '0812-3456-7890' }}
                                </span>
                                <span class="w-1 h-1 bg-stone-300 rounded-full"></span>
                                <span class="text-[9px] font-black text-stone-400 uppercase flex items-center">
                                    <i class="fa-solid fa-envelope mr-1 text-green-600/50"></i>
                                    {{ $produk->toko->email_toko ?? 'thrift@vibe.com' }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ url('/detail-toko') }}"
                            class="text-[10px] font-black text-green-700 hover:text-white hover:bg-green-700 uppercase px-6 py-3 bg-white border border-green-100 rounded-xl transition-all shadow-sm shadow-green-100">
                            Kunjungi Toko
                        </a>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <button
                                class="py-4 bg-stone-100 text-gray-700 font-bold rounded-2xl hover:bg-stone-200 transition-all flex items-center justify-center space-x-3 group">
                                <i class="fa-solid fa-cart-plus text-lg group-hover:scale-110 transition-transform"></i>
                                <span>Keranjang</span>
                            </button>
                            <a href="{{ url('/pembayaran') }}"
                                class="py-4 bg-green-700 text-white font-bold rounded-2xl shadow-xl shadow-green-100 hover:bg-green-800 transition-all transform active:scale-95 text-center block">
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
                            @if ($produk->deskrisp->count() > 0 && $produk->deskrisp->first()->deskripsi)
                                <p>{{ $produk->deskrisp->first()->deskripsi }}</p>
                            @else
                                <p>Deskripsi produk belum tersedia.</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-stone-50 rounded-3xl p-8 border border-stone-100">
                        <h4 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-6 text-stone-400">
                            Spesifikasi Barang</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Bahan</p>
                                <p class="text-sm font-bold text-gray-800">
                                    {{ $produk->deskrisp->count() > 0 ? $produk->deskrisp->first()->bahan ?? 'Tidak diketahui' : 'Tidak diketahui' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Ukuran</p>
                                <p class="text-sm font-bold text-gray-800">
                                    {{ $produk->deskrisp->count() > 0 ? $produk->deskrisp->first()->ukuran ?? 'Tidak diketahui' : 'Tidak diketahui' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Kondisi</p>
                                <p class="text-sm font-bold text-green-700">
                                    {{ $produk->deskrisp->count() > 0 ? $produk->deskrisp->first()->kondisi ?? 'Tidak diketahui' : 'Tidak diketahui' }}
                                </p>
                            </div>
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
                            <p class="text-sm text-gray-600 font-medium leading-relaxed mb-4">"Barangnya mantap banget,
                                sesuai foto. Pengiriman juga cepet!"</p>
                            <div class="flex items-center pt-4 border-t border-gray-50">
                                <div
                                    class="w-8 h-8 rounded-full bg-stone-100 flex items-center justify-center text-[10px] text-green-700 font-black border border-green-100">
                                    AB</div>
                                <span class="ml-3 text-[10px] font-bold text-gray-900 uppercase tracking-widest">Andi
                                    Budiman</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
