@extends('ui.base')
@section('content')
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-sm p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-playfair text-gray-900 mb-2">Bagaimana Pengalamanmu?</h1>
                <p class="text-gray-600">Berikan rating dan ulasan untuk membantu pembeli lain</p>
            </div>

            <!-- Product Info -->
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg mb-8">
                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=100&q=80" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                <div>
                    <h3 class="font-semibold text-gray-900">Vintage Denim Jacket</h3>
                    <p class="text-sm text-gray-500">LEVI'S • Size M</p>
                    <p class="text-sm text-gray-500 mt-1">Pesanan #INV-2024-00123</p>
                </div>
            </div>

            <!-- Rating Form -->
            <div class="space-y-6">
                <!-- Star Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-3">Rating Produk*</label>
                    <div class="flex gap-2 justify-center mb-2" id="starRating">
                        <span class="star text-5xl text-gray-300" onclick="setRating(1)">⭐</span>
                        <span class="star text-5xl text-gray-300" onclick="setRating(2)">⭐</span>
                        <span class="star text-5xl text-gray-300" onclick="setRating(3)">⭐</span>
                        <span class="star text-5xl text-gray-300" onclick="setRating(4)">⭐</span>
                        <span class="star text-5xl text-gray-300" onclick="setRating(5)">⭐</span>
                    </div>
                    <p id="ratingText" class="text-center text-gray-500 text-sm">Klik untuk memberi rating</p>
                </div>

                <!-- Review Text -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Ceritakan pengalamanmu*
                    </label>
                    <textarea
                        id="reviewText"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-700 focus:border-transparent"
                        rows="5"
                        placeholder="Bagaimana kualitas produknya? Apakah sesuai deskripsi? Bagaimana pengalaman belanjamu?"></textarea>
                    <p class="text-sm text-gray-500 mt-1"><span id="charCount">0</span>/500 karakter</p>
                </div>

                <!-- Upload Photos -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Tambahkan Foto (Opsional)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-green-700 transition-colors cursor-pointer">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-600 mb-1">Klik untuk upload foto</p>
                        <p class="text-sm text-gray-500">PNG, JPG hingga 10MB (Max 5 foto)</p>
                    </div>

                    <!-- Preview Area -->
                    <div id="photoPreview" class="grid grid-cols-5 gap-3 mt-4 hidden">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=100&q=80" class="w-full h-20 object-cover rounded-lg">
                            <button class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Additional Ratings -->
                <div class="pt-6 border-t">
                    <h3 class="font-medium text-gray-900 mb-4">Penilaian Detail</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-700">Sesuai Deskripsi</span>
                                <span class="text-sm font-semibold text-gray-900" id="desc-value">5</span>
                            </div>
                            <input type="range" min="1" max="5" value="5" class="w-full accent-green-700" oninput="updateValue('desc', this.value)">
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-700">Kualitas Produk</span>
                                <span class="text-sm font-semibold text-gray-900" id="quality-value">5</span>
                            </div>
                            <input type="range" min="1" max="5" value="5" class="w-full accent-green-700" oninput="updateValue('quality', this.value)">
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-700">Kecepatan Pengiriman</span>
                                <span class="text-sm font-semibold text-gray-900" id="shipping-value">5</span>
                            </div>
                            <input type="range" min="1" max="5" value="5" class="w-full accent-green-700" oninput="updateValue('shipping', this.value)">
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-3 pt-6">
                    <button onclick="submitReview()" class="flex-1 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        Kirim Ulasan
                    </button>
                    <button class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">
                        Nanti Saja
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script>
        let currentRating = 0;
        const ratingTexts = ['', 'Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Sangat Bagus'];

        function setRating(rating) {
            currentRating = rating;
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-orange-500');
                } else {
                    star.classList.remove('text-orange-500');
                    star.classList.add('text-gray-300');
                }
            });
            document.getElementById('ratingText').textContent = ratingTexts[rating];
        }

        function updateValue(type, value) {
            document.getElementById(type + '-value').textContent = value;
        }

        // Character counter
        document.getElementById('reviewText').addEventListener('input', function() {
            const count = this.value.length;
            document.getElementById('charCount').textContent = count;
            if (count > 500) {
                this.value = this.value.substring(0, 500);
                document.getElementById('charCount').textContent = 500;
            }
        });

        function submitReview() {
            if (currentRating === 0) {
                alert('Silakan beri rating terlebih dahulu!');
                return;
            }

            const reviewText = document.getElementById('reviewText').value;
            if (!reviewText.trim()) {
                alert('Silakan tulis ulasan Anda!');
                return;
            }

            // Show success message
            alert('Terima kasih atas ulasanmu! 🎉');
            window.location.href = '#'; // Redirect to order history or home
        }
    </script>
@endsection
