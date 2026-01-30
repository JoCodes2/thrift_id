@extends('ui.base')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <nav class="flex text-xs text-gray-400 space-x-2 mb-6 uppercase tracking-widest font-bold">
            <a href="/" class="hover:text-green-700 transition-colors">Beranda</a>
            <span>/</span>
            <span class="text-gray-600">Katalog Produk</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <p class="text-gray-500 max-w-md italic">Barang pilihan berkualitas dari berbagai penjual terpercaya di
                    seluruh Indonesia.</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-gray-400 uppercase">Urutkan:</span>
                <select
                    class="px-4 py-2.5 bg-white border border-gray-100 rounded-xl text-sm font-bold text-gray-700 shadow-sm focus:ring-2 focus:ring-green-700 outline-none">
                    <option>Terbaru</option>
                    <option>Harga Terendah</option>
                    <option>Harga Tertinggi</option>
                    <option>Terlaris</option>
                </select>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <aside class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-50 sticky top-24">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="font-bold text-xl text-gray-900">Filter</h3>
                        <button class="text-xs font-bold text-green-700 hover:text-green-800 uppercase">Reset</button>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Kategori</h4>
                        <div class="space-y-3">
                            @forelse($kategori as $kat)
                                <label class="flex items-center group cursor-pointer">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" name="kategori[]" value="{{ $kat->id }}"
                                            class="peer h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-200 transition-all checked:bg-green-700 checked:border-green-700" />
                                        <span
                                            class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            <i class="fa-solid fa-check text-[10px]"></i>
                                        </span>
                                    </div>
                                    <span
                                        class="ml-3 text-sm font-medium text-gray-600 group-hover:text-green-700">{{ $kat->nama_kategori }}</span>
                                </label>
                            @empty
                                <p class="text-sm text-gray-500">Tidak ada kategori.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Ketersediaan</h4>
                        <div class="flex flex-wrap gap-2">
                            <button
                                class="px-4 py-2 rounded-full border border-gray-100 text-xs font-bold bg-green-50 text-green-700">Tersedia</button>
                            <button
                                class="px-4 py-2 rounded-full border border-gray-100 text-xs font-bold text-gray-500 hover:bg-gray-50">Habis</button>
                        </div>
                    </div>
                </div>
            </aside>

            <main class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                    @forelse($produk as $item)
                        <div
                            class="bg-white rounded-[2rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-2xl transition-all duration-500 group relative">
                            <div class="relative h-72 overflow-hidden">
                                <img src="{{ asset('uploads/gambar/' . ($item->deskrisp->first()->gambar ?? 'default.jpg')) }}"
                                    alt="{{ $item->nama_produk }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                                <div class="absolute top-4 left-4">
                                    <span
                                        class="bg-green-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-lg">
                                        {{ ucfirst($item->status_stok) }}
                                    </span>
                                </div>

                                <button
                                    class="absolute top-4 right-4 bg-white/80 backdrop-blur-md w-10 h-10 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white transition-all shadow-sm">
                                    <i class="fa-regular fa-heart text-lg"></i>
                                </button>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-2">
                                    <span
                                        class="text-[10px] font-bold text-green-700 uppercase tracking-widest">{{ $item->kategori->nama_kategori ?? 'Kategori' }}</span>
                                    <div class="flex items-center text-orange-400 text-xs font-bold">
                                        <i class="fa-solid fa-star mr-1"></i>
                                        <span class="text-gray-900">4.8</span>
                                    </div>
                                </div>

                                <h3 class="font-bold text-gray-900 text-lg mb-1 truncate">{{ $item->nama_produk }}</h3>
                                <a href="{{ url('/detail-toko/' . $item->toko->id) }}"
                                    class="text-[10px] text-gray-400 mb-4 uppercase font-bold italic hover:text-green-700 transition-colors">
                                    <i class="fa-solid fa-shop mr-1"></i> {{ $item->toko->nama_toko ?? 'Nama Toko' }}
                                </a>

                                <div class="flex items-center justify-between mb-6">
                                    <p class="text-2xl font-black text-gray-900 tracking-tight">Rp
                                        {{ number_format($item->harga, 0, ',', '.') }}</p>
                                    <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">
                                        Terjual {{ $item->jumlah_terjual }} </span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div class="grid grid-cols-5 gap-2">
                                    <button
                                        class="col-span-1 bg-stone-100 hover:bg-green-100 text-gray-600 hover:text-green-700 h-12 rounded-2xl transition-all flex items-center justify-center">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </button>

                                    <a href="{{ url('/detail-produk/' . $item->id) }}"
                                        class="col-span-4 bg-green-700 hover:bg-green-800 text-white font-bold text-sm h-12 rounded-2xl transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-2">
                                        <i class="fa-solid fa-eye"></i>
                                        <span>Lihat Detail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500">Tidak ada produk tersedia.</p>
                        </div>
                    @endforelse
                </div>
        </div>

        <div class="mt-20 flex justify-center">
            <nav class="flex items-center space-x-2 bg-white p-2 rounded-2xl shadow-sm border border-gray-50">
                <button class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-stone-50 text-gray-400"><i
                        class="fa-solid fa-chevron-left"></i></button>
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl bg-green-700 text-white font-bold shadow-lg shadow-green-100">1</button>
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-stone-50 text-gray-600 font-bold">2</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-xl hover:bg-stone-50 text-gray-400"><i
                        class="fa-solid fa-chevron-right"></i></button>
            </nav>
        </div>
        </main>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Function to load products
            function loadProducts(categoryIds = []) {
                $.ajax({
                    url: '{{ route('produk.filter') }}',
                    method: 'GET',
                    data: {
                        kategori: categoryIds
                    },
                    success: function(data) {
                        renderProducts(data);
                    },
                    error: function() {
                        console.log('Error loading products');
                    }
                });
            }

            // Function to render products
            function renderProducts(products) {
                let html = '';
                if (products.length > 0) {
                    products.forEach(function(item) {
                        let imageUrl = item.deskrisp && item.deskrisp.length > 0 ?
                            '{{ asset('uploads/gambar/') }}/' + item.deskrisp[0].gambar :
                            '{{ asset('uploads/gambar/default.jpg') }}';
                        html += `
                    <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-2xl transition-all duration-500 group relative">
                        <div class="relative h-72 overflow-hidden">
                            <img src="${imageUrl}" alt="${item.nama_produk}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                            <div class="absolute top-4 left-4">
                                <span class="bg-green-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-lg">
                                    ${item.status_stok.charAt(0).toUpperCase() + item.status_stok.slice(1)}
                                </span>
                            </div>

                            <button class="absolute top-4 right-4 bg-white/80 backdrop-blur-md w-10 h-10 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white transition-all shadow-sm">
                                <i class="fa-regular fa-heart text-lg"></i>
                            </button>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-bold text-green-700 uppercase tracking-widest">${item.kategori ? item.kategori.nama_kategori : 'Kategori'}</span>
                                <div class="flex items-center text-orange-400 text-xs font-bold">
                                    <i class="fa-solid fa-star mr-1"></i>
                                    <span class="text-gray-900">4.8</span>
                                </div>
                            </div>

                            <h3 class="font-bold text-gray-900 text-lg mb-1 truncate">${item.nama_produk}</h3>
                            <p class="text-[10px] text-gray-400 mb-4 uppercase font-bold italic">
                                <i class="fa-solid fa-shop mr-1"></i> ${item.toko ? item.toko.nama_toko : 'Nama Toko'}
                            </p>

                            <div class="flex items-center justify-between mb-6">
                                <p class="text-2xl font-black text-gray-900 tracking-tight">Rp ${item.harga.toLocaleString('id-ID')}</p>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">
                                    Terjual ${item.jumlah_terjual}
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="grid grid-cols-5 gap-2">
                                <button class="col-span-1 bg-stone-100 hover:bg-green-100 text-gray-600 hover:text-green-700 h-12 rounded-2xl transition-all flex items-center justify-center">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>

                                <a href="{{ url('/detail-produk/') }}/${item.id}" class="col-span-4 bg-green-700 hover:bg-green-800 text-white font-bold text-sm h-12 rounded-2xl transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-2">
                                    <i class="fa-solid fa-eye"></i>
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                    });
                } else {
                    html =
                        '<div class="col-span-full text-center py-12"><p class="text-gray-500">Tidak ada produk tersedia untuk kategori ini.</p></div>';
                }
                $('.grid.grid-cols-1.sm\\:grid-cols-2.xl\\:grid-cols-3.gap-8').html(html);
            }

            // Handle category filter change
            $('input[name="kategori[]"]').on('change', function() {
                let selectedCategories = [];
                $('input[name="kategori[]"]:checked').each(function() {
                    selectedCategories.push($(this).val());
                });
                loadProducts(selectedCategories);
            });
        });
    </script>
@endsection
