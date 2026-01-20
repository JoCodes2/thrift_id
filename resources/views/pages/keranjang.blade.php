@extends('ui.base')
@section('content')
 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex text-sm text-gray-600">
                <a href="#" class="hover:text-gray-900">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Keranjang Belanja</span>
            </nav>
        </div>

        <h1 class="text-3xl font-playfair text-gray-900 mb-8">Keranjang Belanja</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Item 1 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&q=80" alt="Product" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Vintage Denim Jacket</h3>
                                    <p class="text-sm text-gray-500">LEVI'S • Size M • Seperti Baru</p>
                                </div>
                                <button class="text-gray-400 hover:text-red-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-lg font-bold text-gray-900">Rp 185.000</span>
                                    <span class="text-sm text-gray-400 line-through">Rp 350.000</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="w-12 text-center font-semibold">1</span>
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=200&q=80" alt="Product" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Leather Crossbody Bag</h3>
                                    <p class="text-sm text-gray-500">COACH • Seperti Baru</p>
                                </div>
                                <button class="text-gray-400 hover:text-red-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-lg font-bold text-gray-900">Rp 245.000</span>
                                    <span class="text-sm text-gray-400 line-through">Rp 500.000</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="w-12 text-center font-semibold">1</span>
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <div class="flex gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=200&q=80" alt="Product" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Vintage Gold Watch</h3>
                                    <p class="text-sm text-gray-500">SEIKO • Seperti Baru</p>
                                </div>
                                <button class="text-gray-400 hover:text-red-500">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-lg font-bold text-gray-900">Rp 320.000</span>
                                    <span class="text-sm text-gray-400 line-through">Rp 750.000</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="w-12 text-center font-semibold">1</span>
                                    <button class="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-24">
                    <h2 class="font-semibold text-gray-900 text-lg mb-4">Ringkasan Belanja</h2>

                    <div class="space-y-3 mb-6 pb-6 border-b">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total Harga (3 barang)</span>
                            <span class="font-semibold text-gray-900">Rp 750.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total Diskon</span>
                            <span class="font-semibold text-green-600">- Rp 180.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Ongkos Kirim</span>
                            <span class="font-semibold text-gray-900">Rp 20.000</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                        <span class="text-lg font-semibold text-gray-900">Total Belanja</span>
                        <span class="text-2xl font-bold text-green-700">Rp 590.000</span>
                    </div>

                    <button class="w-full bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors mb-3">
                        Lanjut ke Checkout
                    </button>

                    <button class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-lg font-medium transition-colors">
                        Lanjut Belanja
                    </button>

                    <div class="mt-6 pt-6 border-t">
                        <div class="flex items-start gap-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p>Pembayaran aman & terpercaya dengan berbagai metode</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')

@endsection
