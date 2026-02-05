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
                <h1 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Koleksi <span class="text-green-700">Thrift.</span></h1>
                <p class="text-gray-500 max-w-md italic text-sm mt-2">Barang pilihan berkualitas dari penjual terpercaya di seluruh Indonesia.</p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <aside class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-50 sticky top-24">
                    <h3 class="font-bold text-xl text-gray-900 mb-8">Filter</h3>

                    <div class="mb-8">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Kategori</h4>
                        <div class="space-y-3">
                            @forelse($kategori as $kat)
                                <label class="flex items-center group cursor-pointer">
                                    <div class="relative flex items-center">
                                        <input type="checkbox" name="kategori[]" value="{{ $kat->id }}"
                                            class="kategori-checkbox peer h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-200 transition-all checked:bg-green-700 checked:border-green-700" />
                                        <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                            <i class="fa-solid fa-check text-[10px]"></i>
                                        </span>
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-600 group-hover:text-green-700">{{ $kat->nama_kategori }}</span>
                                </label>
                            @empty
                                <p class="text-xs text-gray-400 italic">Tidak ada kategori.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </aside>

            <main class="flex-1">
                <div id="produk-wrapper" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                    @forelse($produk as $item)
                        @php
                            // Logika Gambar PHP
                            $imgData = $item->deskrisp->first();
                            $imgName = $imgData ? $imgData->gambar : '';
                            $imageUrl = ($imgName && !str_contains($imgName, 'default'))
                                ? asset('uploads/gambar/' . $imgName)
                                : 'https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image';

                            $rating = $item->rating ? number_format($item->rating, 1) : '0.0';
                        @endphp

                        <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-2xl transition-all duration-500 group relative flex flex-col h-full">
                            <div class="relative h-72 overflow-hidden bg-gray-100">
                                <img src="{{ $imageUrl }}"
                                    alt="{{ $item->nama_produk }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    onerror="this.src='https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image'">

                                <div class="absolute top-4 left-4">
                                    <span class="bg-green-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-lg">
                                        {{ $item->status_stok }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-[10px] font-bold text-green-700 uppercase tracking-widest">
                                        {{ $item->kategori->nama_kategori ?? 'Uncategorized' }}
                                    </span>
                                    <div class="flex items-center text-orange-400 text-xs font-bold">
                                        <i class="fa-solid fa-star mr-1"></i>
                                        <span class="text-gray-900">{{ $rating }}</span>
                                    </div>
                                </div>

                                <h3 class="font-bold text-gray-900 text-lg mb-1 truncate uppercase">{{ $item->nama_produk }}</h3>

                                <a href="{{ url('/detail-toko/' . $item->toko->id) }}" class="inline-flex items-center text-[10px] text-gray-400 mb-4 uppercase font-bold italic hover:text-green-700 transition-colors">
                                    <i class="fa-solid fa-shop mr-1"></i> {{ $item->toko->nama_toko ?? 'Unknown Store' }}
                                </a>

                                <div class="mt-auto">
                                    <div class="flex items-center justify-between mb-6">
                                        <p class="text-2xl font-black text-gray-900 tracking-tight">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter italic">
                                            Terjual {{ $item->jumlah_terjual }}
                                        </span>
                                    </div>

                                    <div class="grid grid-cols-5 gap-2">
                                        <button data-id="{{ $item->id }}" class="btn-add-cart col-span-1 bg-stone-100 hover:bg-green-700 hover:text-white text-gray-600 h-12 rounded-2xl transition-all flex items-center justify-center">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                        <a href="{{ url('/detail-produk/' . $item->id) }}" class="col-span-4 bg-green-700 hover:bg-black text-white font-bold text-xs h-12 rounded-2xl transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-2 tracking-widest uppercase">
                                            <i class="fa-solid fa-eye text-[10px]"></i>
                                            <span>Detail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-100">
                            <i class="fa-solid fa-box-open text-4xl text-gray-200 mb-4"></i>
                            <p class="text-gray-400 font-medium italic">Opps! Tidak ada produk yang sesuai filter.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="module" src="{{ asset('js/controllers/keranjang.controller.js') }}"></script>
    <script>
        $(document).ready(function() {
            const appUrl = window.location.origin;

            function loadProducts(categoryIds = []) {
                let skeleton = '';
                for (let i = 0; i < 3; i++) {
                    skeleton += `<div class="animate-pulse bg-gray-100 rounded-[2rem] h-[450px]"></div>`;
                }
                $('#produk-wrapper').html(skeleton);

                $.ajax({
                    url: '{{ route('produk.filter') }}',
                    method: 'GET',
                    data: { kategori: categoryIds },
                    success: function(data) {
                        renderProducts(data);
                    },
                    error: function() {
                        $('#produk-wrapper').html('<p class="text-center col-span-full text-red-500">Gagal memuat data.</p>');
                    }
                });
            }

            function renderProducts(products) {
                let html = '';
                if (products.length > 0) {
                    products.forEach(function(item) {
                        // Logika Rating (Menyesuaikan alias di Controller)
                        const rawRating = item.rating_rata_rata || item.rating;
                        const rating = rawRating ? parseFloat(rawRating).toFixed(1) : '0.0';

                        // Logika Gambar No-Image (Sesuai diskusi sebelumnya)
                        let imgName = (item.deskrisp && item.deskrisp.length > 0) ? item.deskrisp[0].gambar : '';
                        let imageUrl = (imgName && !imgName.includes('default'))
                            ? `${appUrl}/uploads/gambar/${imgName}`
                            : 'https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image';

                        html += `
                        <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-2xl transition-all duration-500 group relative flex flex-col h-full animate-fadeIn">
                            <div class="relative h-72 overflow-hidden bg-gray-100">
                                <img src="${imageUrl}" alt="${item.nama_produk}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                    onerror="this.src='https://placehold.co/600x600/f5f5f4/a8a29e?text=No+Image'">

                                <div class="absolute top-4 left-4">
                                    <span class="bg-green-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-lg">
                                        ${item.status_stok}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-[10px] font-bold text-green-700 uppercase tracking-widest">
                                        ${item.kategori ? item.kategori.nama_kategori : 'Fashion'}
                                    </span>
                                    <div class="flex items-center text-orange-400 text-xs font-bold">
                                        <i class="fa-solid fa-star mr-1"></i>
                                        <span class="text-gray-900">${rating}</span>
                                    </div>
                                </div>

                                <h3 class="font-bold text-gray-900 text-lg mb-1 truncate uppercase">${item.nama_produk}</h3>
                                <a href="/detail-toko/${item.toko?.id}" class="inline-flex items-center text-[10px] text-gray-400 mb-4 uppercase font-bold italic hover:text-green-700 transition-colors">
                                    <i class="fa-solid fa-shop mr-1"></i> ${item.toko ? item.toko.nama_toko : 'Toko'}
                                </a>

                                <div class="mt-auto">
                                    <div class="flex items-center justify-between mb-6">
                                        <p class="text-2xl font-black text-gray-900 tracking-tight">Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</p>
                                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter italic">Terjual ${item.jumlah_terjual}</span>
                                    </div>

                                    <div class="grid grid-cols-5 gap-2">
                                        <button data-id="${item.id}" class="btn-add-cart col-span-1 bg-stone-100 hover:bg-green-700 hover:text-white text-gray-600 h-12 rounded-2xl transition-all flex items-center justify-center">
                                            <i class="fa-solid fa-cart-plus"></i>
                                        </button>
                                        <a href="/detail-produk/${item.id}" class="col-span-4 bg-green-700 hover:bg-black text-white font-bold text-xs h-12 rounded-2xl transition-all shadow-lg shadow-green-100 flex items-center justify-center space-x-2 tracking-widest uppercase">
                                            <i class="fa-solid fa-eye text-[10px]"></i>
                                            <span>Detail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                } else {
                    html = `<div class="col-span-full text-center py-20 bg-gray-50 rounded-[2rem] border-2 border-dashed border-gray-100">
                                <p class="text-gray-400 italic">Produk tidak ditemukan untuk kategori ini.</p>
                            </div>`;
                }
                $('#produk-wrapper').html(html);
            }

            // Handle category filter change
            $('.kategori-checkbox').on('change', function() {
                let selectedCategories = [];
                $('.kategori-checkbox:checked').each(function() {
                    selectedCategories.push($(this).val());
                });
                loadProducts(selectedCategories);
            });
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease forwards;
        }
    </style>
@endsection
