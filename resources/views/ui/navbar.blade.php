    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-playfair text-gray-800">ThriftVibe</h1>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Beranda</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Produk</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">Kategori</a>
                </div>

                <!-- Icons -->
                <div class="flex items-center space-x-4">
                    <button class="text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <button class="text-gray-700 hover:text-gray-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </button>
                    <!-- Mobile menu button -->
                    <button class="md:hidden text-gray-700" id="mobile-menu-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t">
                <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Produk</a>
                <a href="#" class="block text-gray-700 hover:bg-gray-100 px-3 py-2 rounded-md text-base font-medium">Kategori</a>
            </div>
        </div>
    </nav>
