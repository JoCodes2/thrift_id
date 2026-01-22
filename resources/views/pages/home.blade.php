@extends('ui.base')

@section('content')
    <section class="relative bg-gradient-to-r from-stone-100 to-stone-50 overflow-hidden border-b border-stone-200">
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/4 w-[400px] h-[400px] bg-green-100/20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div class="space-y-6">
                    <div class="inline-flex items-center bg-white/80 backdrop-blur-sm text-green-700 px-4 py-1.5 rounded-full text-[10px] font-bold shadow-sm border border-green-100 uppercase tracking-[0.2em]">
                        <span class="relative flex h-2 w-2 mr-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-600"></span>
                        </span>
                        Curated Thrift Store
                    </div>

                    <div class="space-y-3">
                        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-playfair text-gray-900 leading-[1.1] tracking-tight">
                            Temukan Gaya <br>
                            <span class="text-green-700 font-bold ">Unikmu.</span>
                        </h2>
                        <p class="text-gray-500 text-sm sm:text-base max-w-md leading-relaxed">
                            Koleksi pilihan terbaik dari brand ternama dengan kualitas yang terjaga. Fashion berkelanjutan dimulai dari sini.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ url('/produk') }}" class="bg-green-700 hover:bg-black text-white px-8 py-3.5 rounded-xl font-bold text-sm flex items-center justify-center transition-all shadow-lg shadow-green-100 group">
                            Mulai Belanja
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-4 pt-8 border-t border-stone-200">
                        <div>
                            <div class="text-xl font-black text-gray-900 ">500<span class="text-green-600">+</span></div>
                            <div class="text-[9px] text-gray-400 uppercase font-black tracking-widest">Ready Stock</div>
                        </div>
                        <div>
                            <div class="text-xl font-black text-gray-900 ">1.2K<span class="text-green-600">+</span></div>
                            <div class="text-[9px] text-gray-400 uppercase font-black tracking-widest">Trusted Buyer</div>
                        </div>
                        <div>
                            <div class="text-xl font-black text-gray-900 ">4.9</div>
                            <div class="text-[9px] text-gray-400 uppercase font-black tracking-widest">Satisfaction</div>
                        </div>
                    </div>
                </div>

                <div class="relative hidden lg:block">
                    <div class="relative h-[480px] w-[480px] mx-auto rounded-[2rem] overflow-hidden shadow-2xl border-[10px] border-white ring-1 ring-stone-200">
                        <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?w=800&q=80" alt="Thrift Fashion" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                    </div>

                    <div class="absolute bottom-6 -left-4 bg-white p-5 rounded-2xl shadow-xl border border-stone-100 flex items-center space-x-4 animate-bounce-slow">
                        <div class="w-10 h-10 bg-stone-900 rounded-xl flex items-center justify-center text-white">
                            <i class="fa-solid fa-wand-magic-sparkles text-sm"></i>
                        </div>
                        <div>
                            <div class="text-[11px] font-black text-gray-900 uppercase italic">Limited Collection</div>
                            <div class="text-[9px] text-gray-500 font-medium tracking-tight">Updated Every Week</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-10">
                <div>
                    <h2 class="text-2xl font-playfair text-gray-900  font-black uppercase tracking-tight">Produk <span class="text-green-700">Terlaris.</span></h2>
                    <p class="text-gray-400 text-[11px] font-medium italic mt-1 uppercase tracking-widest">Koleksi paling dicari minggu ini</p>
                </div>
                <a href="{{ url('/produk') }}" class="px-5 py-2 bg-white border border-stone-200 rounded-full text-[9px] font-bold uppercase tracking-widest hover:bg-stone-900 hover:text-white transition-all shadow-sm">Lihat Semua</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-[1.5rem] overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                    <div class="relative h-60 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&q=80" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-3 left-3">
                            <span class="bg-green-700/90 backdrop-blur-md text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter">Tersedia</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white/90 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition-all shadow-sm">
                            <i class="fa-regular fa-heart text-sm"></i>
                        </button>
                    </div>

                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[9px] font-black text-green-700 uppercase tracking-widest italic">Jackets</span>
                            <div class="flex items-center text-orange-400 text-[10px] font-bold">
                                <i class="fa-solid fa-star mr-1"></i>
                                <span class="text-gray-900">4.8</span>
                            </div>
                        </div>

                        <h3 class="font-bold text-gray-900 text-sm mb-1 truncate">Vintage Denim Jacket</h3>
                        <p class="text-[9px] text-gray-400 mb-4 uppercase font-bold italic flex items-center tracking-tight">
                            <i class="fa-solid fa-shop mr-1.5 text-green-600"></i> ThriftVibe Official
                        </p>

                        <div class="flex items-center justify-between mb-5">
                            <p class="text-lg font-black text-gray-900 tracking-tight">Rp 185.000</p>
                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter">12 Terjual</span>
                        </div>

                        <div class="grid grid-cols-5 gap-2">
                            <button class="col-span-1 bg-stone-100 hover:bg-green-700 hover:text-white text-gray-600 h-10 rounded-xl transition-all flex items-center justify-center">
                                <i class="fa-solid fa-cart-plus text-sm"></i>
                            </button>
                            <a href="{{ url('/detail-produk') }}" class="col-span-4 bg-green-700 hover:bg-black text-white font-bold text-[10px] uppercase h-10 rounded-xl transition-all flex items-center justify-center space-x-2 tracking-widest">
                                <i class="fa-solid fa-eye text-xs"></i>
                                <span>Detail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group">
                    <div class="relative h-60 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500&q=80" alt="Product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-3 left-3">
                            <span class="bg-stone-900/90 backdrop-blur-md text-white text-[9px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter">Terbatas</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white/90 backdrop-blur-md w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition-all shadow-sm">
                            <i class="fa-regular fa-heart text-sm"></i>
                        </button>
                    </div>

                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[9px] font-black text-green-700 uppercase tracking-widest italic">Accessories</span>
                            <div class="flex items-center text-orange-400 text-[10px] font-bold">
                                <i class="fa-solid fa-star mr-1"></i>
                                <span class="text-gray-900">4.9</span>
                            </div>
                        </div>

                        <h3 class="font-bold text-gray-900 text-sm mb-1 truncate">Vintage Gold Watch</h3>
                        <p class="text-[9px] text-gray-400 mb-4 uppercase font-bold italic flex items-center tracking-tight">
                            <i class="fa-solid fa-shop mr-1.5 text-green-600"></i> Luxury Second
                        </p>

                        <div class="flex items-center justify-between mb-5">
                            <p class="text-lg font-black text-gray-900 tracking-tight">Rp 320.000</p>
                            <span class="text-[9px] text-gray-400 font-bold uppercase tracking-tighter">5 Terjual</span>
                        </div>

                        <div class="grid grid-cols-5 gap-2">
                            <button class="col-span-1 bg-stone-100 hover:bg-green-700 hover:text-white text-gray-600 h-10 rounded-xl transition-all flex items-center justify-center">
                                <i class="fa-solid fa-cart-plus text-sm"></i>
                            </button>
                            <a href="{{ url('/detail-produk') }}" class="col-span-4 bg-green-700 hover:bg-black text-white font-bold text-[10px] uppercase h-10 rounded-xl transition-all flex items-center justify-center space-x-2 tracking-widest">
                                <i class="fa-solid fa-eye text-xs"></i>
                                <span>Detail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group opacity-90 hidden lg:block">
                     <div class="relative h-60 overflow-hidden bg-stone-100 flex items-center justify-center text-stone-300">
                        <i class="fa-solid fa-image text-4xl"></i>
                     </div>
                     <div class="p-5">
                        <div class="h-4 w-20 bg-stone-100 rounded mb-2"></div>
                        <div class="h-4 w-full bg-stone-100 rounded mb-2"></div>
                        <div class="h-8 w-full bg-stone-100 rounded"></div>
                     </div>
                </div>

                <div class="bg-white rounded-[1.5rem] overflow-hidden border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-500 group opacity-90 hidden lg:block">
                     <div class="relative h-60 overflow-hidden bg-stone-100 flex items-center justify-center text-stone-300">
                        <i class="fa-solid fa-image text-4xl"></i>
                     </div>
                     <div class="p-5">
                        <div class="h-4 w-20 bg-stone-100 rounded mb-2"></div>
                        <div class="h-4 w-full bg-stone-100 rounded mb-2"></div>
                        <div class="h-8 w-full bg-stone-100 rounded"></div>
                     </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }
    </style>
@endsection
