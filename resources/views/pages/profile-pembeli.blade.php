@extends('ui.base')

@section('content')
<div class="bg-gray-50 min-h-screen pb-12">
    @include('ui.profile-pembeli')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            @include('ui.nav-profile')
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-900">Ubah Biodata Diri</h3>
                        <span class="text-xs text-gray-400">* Data Anda tersimpan dengan aman</span>
                    </div>

                    <form id="profileForm" method="POST" class="p-8 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="hidden" id="id" name="id">
                            <div class="relative flex flex-col">
                                <label class="text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <div class="relative">
                                    <input type="text" name="nama" value="{{ Auth::user()->nama }}"
                                           class="w-full pl-4 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all">
                                </div>
                            </div>

                            <div class="relative flex flex-col">
                                <label class="text-sm font-semibold text-gray-700 mb-2">Alamat Email</label>
                                <div class="relative">
                                    <input type="email" value="{{ Auth::user()->email }}" disabled
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-400 cursor-not-allowed">
                                    <i class="fa-solid fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-gray-300"></i>
                                </div>
                            </div>

                            <div class="relative flex flex-col">
                                <label class="text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
                                <div class="relative">
                                    <input type="text" name="no_hp" id="no_hp" value="{{ Auth::user()->no_hp }}"
                                           class="w-full pl-4 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all">
                                </div>
                            </div>

                            <div class="relative flex flex-col">
                                <label class="text-sm font-semibold text-gray-700 mb-2">Status Akun</label>
                                <div class="relative">
                                    <input type="text" value="{{ ucfirst(Auth::user()->role) }}" readonly
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-600">
                                </div>
                            </div>
                        </div>

                        <div class="relative flex flex-col">
                            <label class="text-sm font-semibold text-gray-700 mb-2">Alamat Pengiriman</label>
                            <div class="relative">
                                <textarea name="alamat" rows="4"
                                          class="w-full pl-4 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-700 focus:border-transparent outline-none transition-all">{{ Auth::user()->alamat }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" id="btnUpdateProfile" class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg flex items-center space-x-2">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
