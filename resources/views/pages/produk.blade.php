@extends('ui.base')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex text-sm text-gray-600">
                <a href="#" class="hover:text-gray-900">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Semua Produk</span>
            </nav>
        </div>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-playfair text-gray-900 mb-2">Semua Produk</h1>
            <p class="text-gray-600">Temukan koleksi thrifting terbaik untuk gaya unikmu</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filter -->
            <aside class="lg:w-64 flex-shrink-0">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-24">
                    <h3 class="font-semibold text-gray-900 mb-4">Filter</h3>

                    <!-- Kategori -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Kategori</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Pakaian Wanita</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Pakaian Pria</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Jaket & Sweater</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Tas</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Sepatu</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Aksesoris</span>
                            </label>
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Rentang Harga</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Di bawah Rp 100.000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Rp 100.000 - Rp 250.000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Rp 250.000 - Rp 500.000</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Di atas Rp 500.000</span>
                            </label>
                        </div>
                    </div>

                    <!-- Kondisi -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Kondisi</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Seperti Baru</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Bagus</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="w-4 h-4 text-green-700 rounded border-gray-300 focus:ring-green-700">
                                <span class="ml-2 text-sm text-gray-700">Baik</span>
                            </label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Brand</h4>
                        <input type="text" placeholder="Cari brand..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-green-700 focus:border-transparent">
                    </div>

                    <!-- Reset Button -->
                    <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        Reset Filter
                    </button>
                </div>
            </aside>

            <!-- Products Grid -->
            <main class="flex-1">
                <!-- Sort & Results Info -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <p class="text-gray-600 text-sm">Menampilkan <span class="font-semibold">126 produk</span></p>
                    <div class="flex items-center gap-2">
                        <label class="text-sm text-gray-600">Urutkan:</label>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-green-700 focus:border-transparent">
                            <option>Terbaru</option>
                            <option>Harga: Terendah</option>
                            <option>Harga: Tertinggi</option>
                            <option>Rating Tertinggi</option>
                            <option>Paling Populer</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product Card 1 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
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
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
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
                            <img src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
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
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
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

                    <!-- Product Card 5 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-45%</span>
                                <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Bagus</span>
                            </div>
                            <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <div class="text-xs text-gray-500 mb-1 font-medium">ZARA • S</div>
                            <h3 class="font-semibold text-gray-900 mb-2">Floral Midi Dress</h3>
                            <div class="flex items-center mb-3">
                                <span class="text-orange-500 mr-1">⭐</span>
                                <span class="font-semibold text-gray-900">4.6</span>
                                <span class="text-gray-500 text-sm ml-1">(15 ulasan)</span>
                            </div>
                            <div class="flex items-baseline gap-2">
                                <span class="text-xl font-bold text-gray-900">Rp 165.000</span>
                                <span class="text-sm text-gray-400 line-through">Rp 300.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 6 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=500&q=80" alt="Product" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-3 left-3 flex gap-2">
                                <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-60%</span>
                                <span class="bg-white text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">Seperti Baru</span>
                            </div>
                            <button class="absolute top-3 right-3 bg-white w-9 h-9 rounded-full flex items-center justify-center hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <div class="text-xs text-gray-500 mb-1 font-medium">NIKE • 42</div>
                            <h3 class="font-semibold text-gray-900 mb-2">Classic White Sneakers</h3>
                            <div class="flex items-center mb-3">
                                <span class="text-orange-500 mr-1">⭐</span>
                                <span class="font-semibold text-gray-900">5.0</span>
                                <span class="text-gray-500 text-sm ml-1">(42 ulasan)</span>
                            </div>
                            <div class="flex items-baseline gap-2">
                                <span class="text-xl font-bold text-gray-900">Rp 280.000</span>
                                <span class="text-sm text-gray-400 line-through">Rp 700.000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center items-center gap-2">
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="px-4 py-2 bg-green-700 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
                    <span class="px-2">...</span>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">12</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </main>
        </div>
    </div>
@endsection
@section('scripts')

@endsection

