@extends('ui.base')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <nav class="flex text-sm text-gray-600">
                <a href="#" class="hover:text-gray-900">Beranda</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-gray-900">Produk</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-gray-900">Jaket & Sweater</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 font-medium">Vintage Denim Jacket</span>
            </nav>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Product Images -->
            <div>
                <div class="bg-white rounded-xl overflow-hidden mb-4">
                    <img id="mainImage" src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=800&q=80" alt="Product" class="w-full h-[500px] object-cover">
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <button onclick="changeImage('https://images.unsplash.com/photo-1551028719-00167b16eac5?w=800&q=80')" class="border-2 border-green-700 rounded-lg overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200&q=80" alt="Thumbnail" class="w-full h-24 object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1495105787522-5334e3ffa0ef?w=800&q=80')" class="border-2 border-gray-200 rounded-lg overflow-hidden hover:border-green-700">
                        <img src="https://images.unsplash.com/photo-1495105787522-5334e3ffa0ef?w=200&q=80" alt="Thumbnail" class="w-full h-24 object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=800&q=80')" class="border-2 border-gray-200 rounded-lg overflow-hidden hover:border-green-700">
                        <img src="https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=200&q=80" alt="Thumbnail" class="w-full h-24 object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=800&q=80')" class="border-2 border-gray-200 rounded-lg overflow-hidden hover:border-green-700">
                        <img src="https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=200&q=80" alt="Thumbnail" class="w-full h-24 object-cover">
                    </button>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="bg-white rounded-xl p-6">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full">-47%</span>
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Seperti Baru</span>
                    </div>

                    <h1 class="text-3xl font-playfair text-gray-900 mb-2">Vintage Denim Jacket</h1>
                    <p class="text-gray-600 mb-4">LEVI'S • Size M</p>

                    <div class="flex items-center mb-6">
                        <div class="flex items-center">
                            <span class="text-orange-500 mr-1">⭐⭐⭐⭐⭐</span>
                            <span class="font-semibold text-gray-900 ml-2">4.8</span>
                        </div>
                        <span class="text-gray-400 mx-3">|</span>
                        <button class="text-gray-600 hover:text-gray-900 text-sm">24 Ulasan</button>
                        <span class="text-gray-400 mx-3">|</span>
                        <span class="text-gray-600 text-sm">87 Terjual</span>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <div class="flex items-baseline gap-3 mb-1">
                            <span class="text-3xl font-bold text-gray-900">Rp 185.000</span>
                            <span class="text-lg text-gray-400 line-through">Rp 350.000</span>
                        </div>
                        <p class="text-sm text-green-700">Hemat Rp 165.000</p>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Deskripsi</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Jaket denim vintage original Levi's dalam kondisi sangat baik. Material denim berkualitas tinggi,
                            warna masih solid tanpa pudar. Cocok untuk gaya kasual sehari-hari. Produk ini sudah melalui
                            quality check dan pembersihan menyeluruh.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Detail Produk</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex">
                                <span class="text-gray-600 w-32">Brand:</span>
                                <span class="text-gray-900 font-medium">Levi's</span>
                            </div>
                            <div class="flex">
                                <span class="text-gray-600 w-32">Kategori:</span>
                                <span class="text-gray-900 font-medium">Jaket & Sweater</span>
                            </div>
                            <div class="flex">
                                <span class="text-gray-600 w-32">Kondisi:</span>
                                <span class="text-gray-900 font-medium">Seperti Baru</span>
                            </div>
                            <div class="flex">
                                <span class="text-gray-600 w-32">Ukuran:</span>
                                <span class="text-gray-900 font-medium">M</span>
                            </div>
                            <div class="flex">
                                <span class="text-gray-600 w-32">Material:</span>
                                <span class="text-gray-900 font-medium">100% Cotton Denim</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-900 mb-3">Kuantitas</h3>
                        <div class="flex items-center gap-3">
                            <button onclick="decreaseQty()" class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                            </button>
                            <input id="quantity" type="text" value="1" readonly class="w-16 h-10 border border-gray-300 rounded-lg text-center font-semibold">
                            <button onclick="increaseQty()" class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-50 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </button>
                            <span class="text-gray-600 text-sm ml-2">Stok: 1</span>
                        </div>
                    </div>

                    <div class="flex gap-3 mb-6">
                        <button class="flex-1 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Tambah ke Keranjang
                        </button>
                        <button class="w-12 h-12 border-2 border-gray-300 rounded-lg hover:border-red-500 hover:bg-red-50 flex items-center justify-center transition-colors">
                            <svg class="w-6 h-6 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <button class="w-full bg-white border-2 border-green-700 text-green-700 hover:bg-green-50 px-6 py-3 rounded-lg font-medium transition-colors">
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white rounded-xl p-6 mb-8">
            <h2 class="text-2xl font-playfair text-gray-900 mb-6">Ulasan Pembeli</h2>

            <!-- Rating Summary -->
            <div class="grid md:grid-cols-2 gap-8 mb-8 pb-8 border-b">
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-gray-900 mb-2">4.8</div>
                        <div class="flex justify-center mb-2">
                            <span class="text-orange-500 text-xl">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="text-sm text-gray-600">24 ulasan</p>
                    </div>
                    <div class="flex-1 space-y-2">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 w-6">5★</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500" style="width: 80%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">20</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 w-6">4★</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500" style="width: 15%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">3</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 w-6">3★</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500" style="width: 5%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">1</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 w-6">2★</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500" style="width: 0%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">0</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-600 w-6">1★</span>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-500" style="width: 0%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8 text-right">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Individual Reviews -->
            <div class="space-y-6">
                <!-- Review 1 -->
                <div class="border-b pb-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-green-700 font-semibold">A</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Andi Pratama</h4>
                                    <p class="text-sm text-gray-500">2 hari yang lalu</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-orange-500">⭐⭐⭐⭐⭐</span>
                                    <span class="ml-2 text-sm font-semibold text-gray-900">5.0</span>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed mb-3">
                                Kualitas jaket sangat bagus! Sesuai deskripsi, kondisi seperti baru. Pengiriman cepat dan packaging rapi.
                                Sangat puas dengan pembelian ini. Recommended seller!
                            </p>
                            <div class="flex gap-2">
                                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=100&q=80" alt="Review" class="w-20 h-20 object-cover rounded-lg">
                                <img src="https://images.unsplash.com/photo-1495105787522-5334e3ffa0ef?w=100&q=80" alt="Review" class="w-20 h-20 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="border-b pb-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-purple-700 font-semibold">S</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Siti Nurhaliza</h4>
                                    <p class="text-sm text-gray-500">5 hari yang lalu</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-orange-500">⭐⭐⭐⭐⭐</span>
                                    <span class="ml-2 text-sm font-semibold text-gray-900">5.0</span>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Jaket denim yang saya cari-cari akhirnya ketemu! Ukurannya pas, warna masih bagus.
                                Harga juga sangat terjangkau untuk brand Levi's. Terima kasih ThriftVibe! 💙
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="pb-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-blue-700 font-semibold">D</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Dimas Prasetyo</h4>
                                    <p class="text-sm text-gray-500">1 minggu yang lalu</p>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-orange-500">⭐⭐⭐⭐</span>
                                    <span class="ml-2 text-sm font-semibold text-gray-900">4.0</span>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed">
                                Overall bagus, tapi ada sedikit bekas pemakaian di bagian siku. Tapi masih oke lah untuk harga segini.
                                Cocok buat daily wear.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full mt-4 text-green-700 hover:text-green-800 font-medium py-2">
                Lihat Semua Ulasan →
            </button>
        </div>

        <!-- Related Products -->
        <div>
            <h2 class="text-2xl font-playfair text-gray-900 mb-6">Produk Serupa</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Product Card -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1495105787522-5334e3ffa0ef?w=400&q=80" alt="Product" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">-40%</span>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500 mb-1">H&M • L</p>
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Black Denim Jacket</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-lg font-bold text-gray-900">Rp 150.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=400&q=80" alt="Product" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">-52%</span>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500 mb-1">ZARA • M</p>
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Blue Jean Jacket</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-lg font-bold text-gray-900">Rp 175.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=400&q=80" alt="Product" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">-48%</span>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500 mb-1">GAP • S</p>
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Light Wash Jacket</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-lg font-bold text-gray-900">Rp 165.000</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow cursor-pointer group">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1601333144130-8cbb312386b6?w=400&q=80" alt="Product" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">-55%</span>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500 mb-1">WRANGLER • L</p>
                        <h3 class="font-semibold text-gray-900 text-sm mb-2">Classic Trucker Jacket</h3>
                        <div class="flex items-baseline gap-2">
                            <span class="text-lg font-bold text-gray-900">Rp 190.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
@section('scripts')
  <script>
        function changeImage(url) {
            document.getElementById('mainImage').src = url;

            // Update border on thumbnails
            const thumbnails = document.querySelectorAll('button[onclick^="changeImage"]');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('border-green-700');
                thumb.classList.add('border-gray-200');
            });
            event.currentTarget.classList.remove('border-gray-200');
            event.currentTarget.classList.add('border-green-700');
        }

        function decreaseQty() {
            const input = document.getElementById('quantity');
            const current = parseInt(input.value);
            if (current > 1) {
                input.value = current - 1;
            }
        }

        function increaseQty() {
            const input = document.getElementById('quantity');
            const current = parseInt(input.value);
            const max = 1; // Stock
            if (current < max) {
                input.value = current + 1;
            }
        }
    </script>
@endsection
