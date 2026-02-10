@extends('ui.base')

@section('content')
    <div class="bg-stone-50 min-h-screen pb-20">
        <section class="relative bg-white border-b border-stone-200 overflow-hidden">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-green-50/50 skew-x-12 translate-x-20"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <div class="relative">
                        <div
                            class="w-32 h-32 md:w-40 md:h-40 rounded-[2.5rem] overflow-hidden border-4 border-white shadow-2xl ring-1 ring-stone-100">
                            <img src="{{ $toko->foto ? asset('uploads/foto/' . $toko->foto) : 'https://images.unsplash.com/photo-1541339907198-e08759df9a13?w=400&q=80' }}"
                                alt="Logo Toko" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="absolute -bottom-2 -right-2 bg-green-600 w-10 h-10 rounded-2xl border-4 border-white flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-check text-white text-sm"></i>
                        </div>
                    </div>

                    <div class="flex-1 text-center md:text-left space-y-4">
                        <div>
                            <h1 class="text-4xl font-playfair font-black text-gray-900 tracking-tight">
                                {{ $toko->nama_toko }}
                            </h1>
                            <p
                                class="text-gray-500 mt-2 flex items-center justify-center md:justify-start font-medium italic">
                                <i class="fa-solid fa-location-dot text-green-700 mr-2"></i> {{ $toko->alamat_toko }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4">
                            <div class="bg-stone-50 p-4 rounded-2xl border border-stone-100">
                                <div class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Produk</div>
                                <div class="text-xl font-black text-gray-900">{{ $produk->count() }}</div>
                            </div>
                            <div class="bg-stone-50 p-4 rounded-2xl border border-stone-100">
                                <div class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Bergabung</div>
                                <div class="text-xl font-black text-gray-900">{{ $toko->tahun_terdaftar }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-auto space-y-3">
                        @php
                            $raw_phone = preg_replace('/[^0-9]/', '', $toko->no_hp_toko);
                            if (str_starts_with($raw_phone, '0')) {
                                $formatted_phone = '62' . substr($raw_phone, 1);
                            } else {
                                $formatted_phone = $raw_phone;
                            }

                            $pesan_wa = urlencode("Halo " . $toko->nama_toko . ", saya melihat profil toko Anda di ThriftVibe dan tertarik dengan beberapa produknya.");
                        @endphp

                        <a href="https://api.whatsapp.com/send?phone={{ $formatted_phone }}&text={{ $pesan_wa }}"
                            target="_blank"
                            class="flex items-center justify-center space-x-3 w-full px-6 py-3 bg-stone-900 text-white rounded-2xl font-bold text-sm hover:bg-black transition-all shadow-xl shadow-stone-200">
                            <i class="fa-solid fa-phone-volume text-green-400"></i>
                            <span>Hubungi Toko</span>
                        </a>
                        <div class="p-4 rounded-2xl border border-dashed border-stone-300 bg-stone-50/50">
                            <div class="text-[10px] text-gray-400 font-black uppercase tracking-widest mb-1 text-center">
                                Email Bisnis</div>
                            <div class="text-xs font-bold text-gray-700 text-center uppercase tracking-tighter italic">
                                {{ $toko->email_toko }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
                <div>
                    <h2 class="text-2xl font-playfair font-black text-gray-900 uppercase ">Koleksi <span
                            class="text-green-700">Toko.</span></h2>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-[0.2em] mt-1">Menampilkan semua produk dari
                        {{ $toko->nama_toko }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($produk as $item)
                    <div
                        class="bg-white rounded-[2rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-2xl transition-all duration-500 group relative flex flex-col">
                        <div class="relative h-72 overflow-hidden">
                            @if ($item->deskrisp->first() && $item->deskrisp->first()->gambar)
                                <img src="{{ asset('uploads/gambar/' . $item->deskrisp->first()->gambar) }}" alt="Product"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-stone-100 flex items-center justify-center">
                                    <span class="text-stone-400 font-bold text-sm">Foto produk tidak ada</span>
                                </div>
                            @endif

                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-green-700/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-tighter shadow-lg">
                                    {{ $item->status_stok ? 'Tersedia' : 'Habis' }}
                                </span>
                            </div>

                            <button
                                class="absolute top-4 right-4 bg-white/80 backdrop-blur-md w-10 h-10 rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white transition-all shadow-sm">
                                <i class="fa-regular fa-heart text-lg"></i>
                            </button>
                        </div>

                        <div class="p-6 flex-1">

                            <h3 class="font-bold text-gray-900 text-lg mb-1 truncate">{{ $item->nama_produk }}</h3>
                            <p class="text-[10px] text-gray-400 mb-4 uppercase font-bold italic">
                                <i class="fa-solid fa-shop mr-1 text-green-700"></i> {{ $toko->nama_toko }}
                            </p>

                            <div class="flex items-center justify-between mb-6">
                                <p class="text-2xl font-black text-gray-900 tracking-tight">Rp
                                    {{ number_format($item->harga, 0, ',', '.') }}</p>
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Terjual
                                    {{ $item->jumlah_terjual }}</span>
                            </div>

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
                @endforeach
            </div>
        </section>
    </div>
@endsection
