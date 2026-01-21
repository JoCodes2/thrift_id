@extends('ui.base')

@section('content')
<div class="bg-gray-50 min-h-screen pb-12">
    @include('ui.profile-pembeli')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @include('ui.nav-profile')
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 gap-6">
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden transition-all hover:shadow-md">
                        <div class="p-6 md:p-8">
                            <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-stone-100 rounded-2xl flex items-center justify-center text-green-700">
                                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">No. Transaksi</p>
                                        <h3 class="font-bold text-gray-900">TRX-992834710</h3>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-full uppercase">
                                        <i class="fa-solid fa-truck-fast mr-1"></i> Dikirim
                                    </span>
                                    <span class="text-xs text-gray-400">12 Jan 2026</span>
                                </div>
                            </div>

                            <div class="border-t border-b border-gray-50 py-6 my-2">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden">
                                        <img src="#" class="w-full h-full object-cover opacity-50">
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-800 text-sm">Vintage Denim Jacket & 2 produk lainnya</h4>
                                        <p class="text-xs text-gray-500 mt-1">Total 3 Item Belanja</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400">Total Belanja</p>
                                        <p class="font-bold text-green-700 text-lg">Rp 450.000</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 mt-4">
                                <button class="px-6 py-2.5 text-sm font-bold text-gray-600 hover:text-green-700 transition-colors">
                                    Bantu Kami
                                </button>
                                <button class="px-6 py-2.5 bg-stone-900 text-white rounded-xl text-sm font-bold hover:bg-black transition-all shadow-lg shadow-stone-100">
                                    Detail Invoice
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
