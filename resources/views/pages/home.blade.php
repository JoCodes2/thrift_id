@extends('ui.base')
@section('content')
    <section class="relative bg-gradient-to-r from-stone-100 to-stone-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6 lg:space-y-8">
                    <!-- Badge -->
                    <div class="inline-flex items-center bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        Sustainable Fashion
                    </div>

                    <!-- Heading -->
                    <div>
                        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-playfair text-gray-900 leading-tight">
                            Temukan Gaya
                            <span class="text-green-700">Unikmu</span>
                        </h2>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-base sm:text-lg max-w-lg">
                        Koleksi thrifting berkualitas dengan harga terjangkau. Fashion berkelanjutan untuk gaya yang tak terbatas.
                    </p>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium flex items-center justify-center transition-colors">
                            Mulai Belanja
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <button class="bg-white hover:bg-gray-50 text-gray-800 px-6 py-3 rounded-lg font-medium border border-gray-300 transition-colors">
                            Lihat Kategori
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-green-700">500+</div>
                            <div class="text-sm text-gray-600 mt-1">Produk Tersedia</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-green-700">1.2K+</div>
                            <div class="text-sm text-gray-600 mt-1">Pelanggan Puas</div>
                        </div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-green-700">4.9</div>
                            <div class="text-sm text-gray-600 mt-1">Rating Toko</div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative hidden lg:block">
                    <div class="relative h-[500px] rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?w=800&q=80"
                             alt="Thrift Fashion"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <!-- Floating card -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                        <div class="flex items-center space-x-3">
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-gray-900">Eco-Friendly</div>
                                <div class="text-xs text-gray-600">100% Sustainable</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-playfair text-gray-900 mb-3">Jelajahi Kategori</h2>
                <p class="text-gray-600">Temukan koleksi thrifting favoritmu berdasarkan kategori</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                <!-- Category Card 1 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Pakaian Wanita</h3>
                    <p class="text-sm text-gray-600">45 Item</p>
                </div>

                <!-- Category Card 2 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-cyan-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Pakaian Pria</h3>
                    <p class="text-sm text-gray-600">38 Item</p>
                </div>

                <!-- Category Card 3 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Jaket & Sweater</h3>
                    <p class="text-sm text-gray-600">25 Item</p>
                </div>

                <!-- Category Card 4 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-amber-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Tas</h3>
                    <p class="text-sm text-gray-600">18 Item</p>
                </div>

                <!-- Category Card 5 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-sky-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                            <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Sepatu</h3>
                    <p class="text-sm text-gray-600">22 Item</p>
                </div>

                <!-- Category Card 6 -->
                <div class="bg-gray-50 hover:bg-gray-100 rounded-xl p-6 text-center cursor-pointer transition-all hover:shadow-lg group">
                    <div class="w-16 h-16 mx-auto mb-4 bg-pink-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Aksesoris</h3>
                    <p class="text-sm text-gray-600">30 Item</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-playfair text-gray-900 mb-3 flex items-center">
                        Produk Terlaris
                        <span class="ml-2">⭐</span>
                    </h2>
                    <p class="text-gray-600">Koleksi favorit pilihan pelanggan dengan rating tertinggi</p>
                </div>
                <button class="hidden sm:flex items-center text-gray-700 hover:text-gray-900 font-medium border border-gray-300 px-4 py-2 rounded-lg hover:bg-white transition-colors">
                    Lihat Semua
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&q=80" alt="Vintage Denim Jacket" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-47%</span>
                            <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Seperti Baru</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-1 font-medium">LEVI'S • M</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Vintage Denim Jacket</h3>
                        <div class="flex items-center mb-3">
                            <span class="text-orange-500 mr-1">⭐</span>
                            <span class="font-semibold text-gray-900">4.8</span>
                            <span class="text-gray-500 text-sm ml-1">(24 ulasan)</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-bold text-gray-900">Rp 185.000</span>
                            <span class="text-sm text-gray-400 line-through">Rp 350.000</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=500&q=80" alt="Leather Crossbody Bag" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-51%</span>
                            <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Seperti Baru</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-1 font-medium">COACH</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Leather Crossbody Bag</h3>
                        <div class="flex items-center mb-3">
                            <span class="text-orange-500 mr-1">⭐</span>
                            <span class="font-semibold text-gray-900">4.9</span>
                            <span class="text-gray-500 text-sm ml-1">(32 ulasan)</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-bold text-gray-900">Rp 245.000</span>
                            <span class="text-sm text-gray-400 line-through">Rp 500.000</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=500&q=80" alt="Oversized Wool Sweater" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-55%</span>
                            <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Bagus</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-1 font-medium">UNIQLO • L</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Oversized Wool Sweater</h3>
                        <div class="flex items-center mb-3">
                            <span class="text-orange-500 mr-1">⭐</span>
                            <span class="font-semibold text-gray-900">4.7</span>
                            <span class="text-gray-500 text-sm ml-1">(21 ulasan)</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-bold text-gray-900">Rp 125.000</span>
                            <span class="text-sm text-gray-400 line-through">Rp 280.000</span>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500&q=80" alt="Vintage Gold Watch" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-57%</span>
                            <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Seperti Baru</span>
                        </div>
                        <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="text-xs text-gray-500 mb-1 font-medium">SEIKO</div>
                        <h3 class="font-semibold text-gray-900 mb-2">Vintage Gold Watch</h3>
                        <div class="flex items-center mb-3">
                            <span class="text-orange-500 mr-1">⭐</span>
                            <span class="font-semibold text-gray-900">4.9</span>
                            <span class="text-gray-500 text-sm ml-1">(28 ulasan)</span>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-xl font-bold text-gray-900">Rp 320.000</span>
                            <span class="text-sm text-gray-400 line-through">Rp 750.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile View All Button -->
            <div class="mt-8 sm:hidden">
                <button class="w-full flex items-center justify-center text-gray-700 hover:text-gray-900 font-medium border border-gray-300 px-4 py-3 rounded-lg hover:bg-white transition-colors">
                    Lihat Semua Produk
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
