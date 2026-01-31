<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-playfair font-bold text-green-800 tracking-tight">ThriftVibe</a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                   class="{{ Request::is('/') ? 'text-green-700 border-b-2 border-green-700' : 'text-gray-600 hover:text-green-700' }} px-1 py-2 text-sm font-bold transition-all">
                   Beranda
                </a>
                <a href="{{ url('/produk') }}"
                   class="{{ Request::is('produk*') ? 'text-green-700 border-b-2 border-green-700' : 'text-gray-600 hover:text-green-700' }} px-1 py-2 text-sm font-bold transition-all">
                   Produk
                </a>
            </div>

            <div class="flex items-center space-x-4">
                @guest
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ url('/login') }}" class="text-sm font-semibold text-gray-700 hover:text-green-700">Masuk</a>
                        <a href="{{ url('/register') }}" class="bg-green-700 hover:bg-green-800 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all shadow-md">
                            Daftar
                        </a>
                    </div>
                @endguest

                @auth
                    @if(Auth::user()->role === 'pembeli')
                    <a href="{{ url('/keranjang') }}" class="text-gray-500 hover:text-green-700 relative p-2 transition-colors">
                        <i class="fa-solid fa-bag-shopping text-xl"></i>
                        <span id="cart-badge" class="absolute top-0 right-0 bg-red-500 text-white text-[10px] rounded-full px-1.5 font-bold border-2 border-white">0</span>
                    </a>

                    <div class="h-8 w-px bg-gray-200 mx-2 hidden md:block"></div>

                    <div class="relative" id="profileDropdownContainer">
                        <button type="button" id="profileDropdownBtn" class="flex items-center space-x-3 focus:outline-none group">
                            <div class="text-right hidden lg:block leading-tight">
                                <p class="text-[10px] uppercase tracking-wider text-gray-400 font-bold">Halo,</p>
                                <p class="text-sm font-bold text-gray-800">{{ Auth::user()->nama }}</p>
                            </div>
                            <div class="w-10 h-10 rounded-full border-2 border-green-700 p-0.5 transition-transform group-hover:scale-105">
                                <div class="w-full h-full rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="fa-solid fa-user text-green-700"></i>
                                </div>
                            </div>
                        </button>

                        <div id="profileMenu" class="absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 hidden z-[70]">
                            <div class="absolute -top-3 left-0 w-full h-3"></div>

                            <a href="{{ url('/profile') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700 transition-colors">
                                <i class="fa-solid fa-circle-user w-8 text-lg opacity-70"></i> Profil Saya
                            </a>
                        </div>
                    </div>
                    @endif
                @endauth

                <button class="md:hidden text-gray-700 p-2" id="mobile-menu-btn">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="hidden md:hidden bg-white border-t" id="mobile-menu">
        <div class="px-4 py-6 space-y-3">
            <a href="{{ url('/') }}" class="block px-4 py-3 rounded-xl font-bold {{ Request::is('/') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">Beranda</a>
            <a href="{{ url('/produk') }}" class="block px-4 py-3 rounded-xl font-bold {{ Request::is('produk*') ? 'bg-green-50 text-green-700' : 'text-gray-700' }}">Produk</a>
            @guest
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-100">
                    <a href="{{ url('/login') }}" class="text-center py-3 text-gray-700 font-bold border border-gray-200 rounded-xl">Masuk</a>
                    <a href="{{ url('/register') }}" class="text-center py-3 bg-green-700 text-white rounded-xl font-bold">Daftar</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
