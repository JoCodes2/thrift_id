
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8">
                <div class="relative group">
                    <div class="w-32 h-32 rounded-full border-4 border-green-700 overflow-hidden bg-green-50 flex items-center justify-center">
                        <i class="fa-solid fa-user text-5xl text-green-700"></i>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-playfair font-bold text-gray-900">{{ Auth::user()->nama }}</h1>
                    <p class="text-gray-500 flex items-center justify-center md:justify-start mt-1">
                        <i class="fa-solid fa-envelope mr-2 text-xs"></i> {{ Auth::user()->email }}
                    </p>
                    <div class="mt-3 flex flex-wrap justify-center md:justify-start gap-2">
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase tracking-wider">
                            {{ Auth::user()->role }}
                        </span>
                        <span class="px-3 py-1 bg-stone-100 text-stone-600 text-xs font-medium rounded-full">
                            Bergabung sejak {{ Auth::user()->created_at->format('M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
