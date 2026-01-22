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
            <div class="lg:col-span-2 space-y-8">

                <div class="space-y-4">
                    <div class="flex items-center justify-between px-2">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-stone-200 flex items-center justify-center">
                                <i class="fa-solid fa-store text-xs text-stone-600"></i>
                            </div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm italic">ThriftVibe Official</h2>
                                <p class="text-[10px] text-gray-400 uppercase tracking-tighter italic">Kota Bandung</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="divide-y divide-gray-50">
                            <div class="p-6 transition-all hover:bg-stone-50/50">
                                <div class="flex flex-col sm:flex-row gap-6">
                                    <div class="w-full sm:w-28 h-28 flex-shrink-0">
                                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&q=80" class="w-full h-full object-cover rounded-2xl">
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <span class="text-[9px] font-black text-green-700 uppercase tracking-widest">Outerwear</span>
                                                <h3 class="font-bold text-gray-900 text-base">Vintage Denim Jacket</h3>
                                                <p class="text-[10px] text-gray-400 mt-0.5 italic">Denim • L • Kondisi 9/10</p>
                                            </div>
                                            <button class="text-gray-300 hover:text-red-500 transition-colors">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="flex items-center justify-between mt-4">
                                            <span class="text-lg font-black text-gray-900">Rp 185.000</span>
                                            <div class="flex items-center gap-1 bg-white p-1 rounded-xl border border-stone-100 shadow-sm">
                                                <button class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-green-700"><i class="fa-solid fa-minus text-[10px]"></i></button>
                                                <span class="w-8 text-center font-bold text-sm">1</span>
                                                <button class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-green-700"><i class="fa-solid fa-plus text-[10px]"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between px-2">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-stone-200 flex items-center justify-center">
                                <i class="fa-solid fa-store text-xs text-stone-600"></i>
                            </div>
                            <div>
                                <h2 class="font-bold text-gray-900 text-sm italic">SecondBrand Jkt</h2>
                                <p class="text-[10px] text-gray-400 uppercase tracking-tighter italic">Jakarta Selatan</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                        <div class="divide-y divide-gray-50">
                            <div class="p-6 transition-all hover:bg-stone-50/50">
                                <div class="flex flex-col sm:flex-row gap-6">
                                    <div class="w-full sm:w-28 h-28 flex-shrink-0">
                                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&q=80" class="w-full h-full object-cover rounded-2xl">
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <span class="text-[9px] font-black text-green-700 uppercase tracking-widest">Accessories</span>
                                                <h3 class="font-bold text-gray-900 text-base">Vintage Gold Watch</h3>
                                                <p class="text-[10px] text-gray-400 mt-0.5 italic">Seiko • Gold • Seperti Baru</p>
                                            </div>
                                            <button class="text-gray-300 hover:text-red-500 transition-colors">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                        <div class="flex items-center justify-between mt-4">
                                            <span class="text-lg font-black text-gray-900">Rp 320.000</span>
                                            <div class="flex items-center gap-1 bg-white p-1 rounded-xl border border-stone-100 shadow-sm">
                                                <button class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-green-700"><i class="fa-solid fa-minus text-[10px]"></i></button>
                                                <span class="w-8 text-center font-bold text-sm">1</span>
                                                <button class="w-7 h-7 flex items-center justify-center text-gray-400 hover:text-green-700"><i class="fa-solid fa-plus text-[10px]"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <span class="text-gray-500">Total Produk (2 Toko)</span>
                            <span class="font-bold text-gray-900">Rp 505.000</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Biaya Layanan</span>
                            <span class="text-[10px] font-black text-green-700 uppercase tracking-widest bg-green-50 px-3 py-1 rounded-full border border-green-100">Gratis</span>
                        </div>

                        <div class="pt-6 border-t border-dashed border-stone-200">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Estimasi Total Bayar</p>
                            <p class="text-3xl font-black text-green-700 tracking-tighter">Rp 505.000</p>
                            <p class="text-[10px] text-gray-400 italic mt-2 leading-tight">* Belum termasuk ongkos kirim dari masing-masing toko</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <a href="{{ url('/pembayaran') }}" class="w-full bg-green-700 hover:bg-green-800 text-white py-5 rounded-[1.5rem] font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-3 group">
                            <span>Lanjut ke Checkout</span>
                            <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>

                        <a href="/produk" class="w-full bg-stone-50 hover:bg-stone-100 text-stone-500 hover:text-stone-700 py-4 rounded-[1.5rem] font-bold text-[10px] uppercase tracking-widest transition-all text-center block border border-stone-100">
                            Lanjut Belanja
                        </a>
                    </div>

                    <div class="mt-8 pt-8 border-t border-stone-50 flex items-center justify-center gap-4">
                        <div class="flex items-center gap-2 opacity-40 grayscale hover:grayscale-0 transition-all cursor-default">
                            <i class="fa-solid fa-shield-check text-green-700"></i>
                            <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter leading-tight">Secure<br>Payment</span>
                        </div>
                        <div class="w-px h-6 bg-stone-200"></div>
                        <div class="flex items-center gap-2 opacity-40">
                            <i class="fa-solid fa-truck-fast text-gray-600"></i>
                            <span class="text-[9px] font-bold text-gray-600 uppercase tracking-tighter leading-tight">Express<br>Shipping</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

