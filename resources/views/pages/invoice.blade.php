@extends('ui.base')
@section('content')
    <!-- Invoice -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12">
            <!-- Header -->
            <div class="flex justify-between items-start mb-8 pb-8 border-b">
                <div>
                    <h1 class="text-4xl font-playfair text-gray-900 mb-2">ThriftVibe</h1>
                    <p class="text-gray-600">Fashion berkelanjutan untuk gaya yang tak terbatas</p>
                    <div class="mt-4 text-sm text-gray-600 space-y-1">
                        <p>Jl. Sudirman No. 123, Jakarta Selatan</p>
                        <p>Email: hello@thriftvibe.id</p>
                        <p>Phone: +62 812-3456-7890</p>
                    </div>
                </div>
                <div class="text-right">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">INVOICE</h2>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><span class="font-medium">No Invoice:</span> #INV-2024-00123</p>
                        <p><span class="font-medium">Tanggal:</span> 20 Jan 2024</p>
                        <p><span class="font-medium">Status:</span> <span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-semibold">Lunas</span></p>
                    </div>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Pembeli:</h3>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p class="font-medium text-gray-900">John Doe</p>
                        <p>Jl. Contoh No. 456, RT/RW 01/02</p>
                        <p>Jakarta Selatan, DKI Jakarta 12345</p>
                        <p>Phone: +62 821-9876-5432</p>
                        <p>Email: john.doe@email.com</p>
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Pengiriman:</h3>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><span class="font-medium">Kurir:</span> JNE Regular</p>
                        <p><span class="font-medium">No Resi:</span> JNE123456789012</p>
                        <p><span class="font-medium">Estimasi:</span> 3-5 hari kerja</p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-8">
                <h3 class="font-semibold text-gray-900 mb-4">Detail Pesanan:</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="text-left py-3 text-sm font-semibold text-gray-900">Produk</th>
                                <th class="text-center py-3 text-sm font-semibold text-gray-900">Qty</th>
                                <th class="text-right py-3 text-sm font-semibold text-gray-900">Harga</th>
                                <th class="text-right py-3 text-sm font-semibold text-gray-900">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=60&q=80" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Vintage Denim Jacket</p>
                                            <p class="text-xs text-gray-500">LEVI'S • Size M • Seperti Baru</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 text-center text-sm text-gray-600">1</td>
                                <td class="py-4 text-right text-sm text-gray-600">Rp 185.000</td>
                                <td class="py-4 text-right text-sm font-semibold text-gray-900">Rp 185.000</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=60&q=80" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Leather Crossbody Bag</p>
                                            <p class="text-xs text-gray-500">COACH • Seperti Baru</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 text-center text-sm text-gray-600">1</td>
                                <td class="py-4 text-right text-sm text-gray-600">Rp 245.000</td>
                                <td class="py-4 text-right text-sm font-semibold text-gray-900">Rp 245.000</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=60&q=80" alt="Product" class="w-12 h-12 object-cover rounded">
                                        <div>
                                            <p class="font-medium text-gray-900">Vintage Gold Watch</p>
                                            <p class="text-xs text-gray-500">SEIKO • Seperti Baru</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 text-center text-sm text-gray-600">1</td>
                                <td class="py-4 text-right text-sm text-gray-600">Rp 320.000</td>
                                <td class="py-4 text-right text-sm font-semibold text-gray-900">Rp 320.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary -->
            <div class="flex justify-end">
                <div class="w-full md:w-80">
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-semibold text-gray-900">Rp 750.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Diskon Produk</span>
                            <span class="font-semibold text-green-600">- Rp 180.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Ongkos Kirim (JNE Regular)</span>
                            <span class="font-semibold text-gray-900">Rp 20.000</span>
                        </div>
                    </div>
                    <div class="border-t-2 pt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-900">Total Pembayaran</span>
                            <span class="text-2xl font-bold text-green-700">Rp 590.000</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="mt-8 pt-8 border-t">
                <h3 class="font-semibold text-gray-900 mb-3">Informasi Pembayaran:</h3>
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-sm">
                            <p class="font-semibold text-green-900 mb-1">Pembayaran Berhasil</p>
                            <p class="text-green-700">Metode: Transfer Bank BCA</p>
                            <p class="text-green-700">Tanggal: 20 Januari 2024, 14:30 WIB</p>
                            <p class="text-green-700">No. Referensi: PAY-2024-00123</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-12 pt-8 border-t text-center">
                <p class="text-sm text-gray-600 mb-2">Terima kasih telah berbelanja di ThriftVibe!</p>
                <p class="text-xs text-gray-500">Jika ada pertanyaan, hubungi kami di hello@thriftvibe.id atau WhatsApp +62 812-3456-7890</p>
                <div class="mt-6 flex justify-center gap-6 text-xs text-gray-500">
                    <a href="#" class="hover:text-gray-700">Syarat & Ketentuan</a>
                    <span>•</span>
                    <a href="#" class="hover:text-gray-700">Kebijakan Pengembalian</a>
                    <span>•</span>
                    <a href="#" class="hover:text-gray-700">Bantuan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
