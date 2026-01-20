@extends('ui.base')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-playfair text-gray-900 mb-8">Checkout</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Checkout Form -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Shipping Address -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Alamat Pengiriman</h2>

                    <div class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap*</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon*</label>
                                <input type="tel" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent" placeholder="08123456789">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap*</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent" rows="3" placeholder="Jl. Contoh No. 123, RT/RW 01/02"></textarea>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi*</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent">
                                    <option>Pilih Provinsi</option>
                                    <option>DKI Jakarta</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                    <option>Jawa Timur</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten*</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent">
                                    <option>Pilih Kota</option>
                                    <option>Jakarta Selatan</option>
                                    <option>Jakarta Pusat</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos*</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent" placeholder="12345">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent" rows="2" placeholder="Tambahkan catatan untuk kurir..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Shipping Method -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Metode Pengiriman</h2>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-4 border-2 border-green-700 rounded-lg cursor-pointer bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="shipping" checked class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">JNE Regular</p>
                                    <p class="text-sm text-gray-600">Estimasi 3-5 hari</p>
                                </div>
                            </div>
                            <span class="font-semibold text-gray-900">Rp 20.000</span>
                        </label>

                        <label class="flex items-center justify-between p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-700 hover:bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="shipping" class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">JNE Express</p>
                                    <p class="text-sm text-gray-600">Estimasi 1-2 hari</p>
                                </div>
                            </div>
                            <span class="font-semibold text-gray-900">Rp 35.000</span>
                        </label>

                        <label class="flex items-center justify-between p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-700 hover:bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="shipping" class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">SiCepat Regular</p>
                                    <p class="text-sm text-gray-600">Estimasi 2-4 hari</p>
                                </div>
                            </div>
                            <span class="font-semibold text-gray-900">Rp 18.000</span>
                        </label>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Metode Pembayaran</h2>

                    <div class="space-y-3">
                        <label class="flex items-center justify-between p-4 border-2 border-green-700 rounded-lg cursor-pointer bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="payment" checked class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">Transfer Bank</p>
                                    <p class="text-sm text-gray-600">BCA, Mandiri, BNI</p>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </label>

                        <label class="flex items-center justify-between p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-700 hover:bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="payment" class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">E-Wallet</p>
                                    <p class="text-sm text-gray-600">GoPay, OVO, DANA, ShopeePay</p>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </label>

                        <label class="flex items-center justify-between p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-700 hover:bg-green-50">
                            <div class="flex items-center">
                                <input type="radio" name="payment" class="w-5 h-5 text-green-700">
                                <div class="ml-3">
                                    <p class="font-medium text-gray-900">COD (Cash on Delivery)</p>
                                    <p class="text-sm text-gray-600">Bayar saat barang diterima</p>
                                </div>
                            </div>
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm sticky top-8">
                    <h2 class="font-semibold text-gray-900 text-lg mb-4">Ringkasan Pesanan</h2>

                    <!-- Products -->
                    <div class="space-y-4 mb-6 pb-6 border-b">
                        <div class="flex gap-3">
                            <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=80&q=80" alt="Product" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900">Vintage Denim Jacket</h4>
                                <p class="text-xs text-gray-500">1x Rp 185.000</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=80&q=80" alt="Product" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900">Leather Crossbody Bag</h4>
                                <p class="text-xs text-gray-500">1x Rp 245.000</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=80&q=80" alt="Product" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="text-sm font-semibold text-gray-900">Vintage Gold Watch</h4>
                                <p class="text-xs text-gray-500">1x Rp 320.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="space-y-3 mb-6 pb-6 border-b">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal (3 barang)</span>
                            <span class="font-semibold text-gray-900">Rp 750.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Diskon Produk</span>
                            <span class="font-semibold text-green-600">- Rp 180.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Ongkos Kirim</span>
                            <span class="font-semibold text-gray-900">Rp 20.000</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-lg font-semibold text-gray-900">Total Pembayaran</span>
                        <span class="text-2xl font-bold text-green-700">Rp 590.000</span>
                    </div>

                    <!-- Checkout Button -->
                    <button class="w-full bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors mb-3">
                        Buat Pesanan
                    </button>

                    <p class="text-xs text-gray-500 text-center">
                        Dengan melanjutkan, kamu menyetujui <a href="#" class="text-green-700 hover:underline">Syarat & Ketentuan</a> kami
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
