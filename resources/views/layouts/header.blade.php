<!-- Top Header -->
<header :class="sidebarCollapsed ? 'ml-16' : 'ml-64'" 
        class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white/95 px-6 backdrop-blur transition-all duration-300">
    <!-- Search -->
    <div class="relative w-full max-w-md ml-20">
        <!-- <svg class="absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg> -->
        <input type="text" 
               placeholder="ค้นหาลูกค้า, ดีล, กิจกรรม..." 
               class="w-full rounded-lg border-0 bg-gray-100 py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-3">
        <!-- Notifications -->
        <button class="relative rounded-lg border border-gray-300 p-2 hover:bg-gray-50">
            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
            <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white">
                3
            </span>
        </button>

        <!-- Add Customer Button -->
        <button class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            เพิ่มลูกค้าใหม่
        </button>

        <!-- User Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" 
                    class="flex items-center gap-2 rounded-lg border border-gray-300 px-3 py-2 hover:bg-gray-50">
                <div class="h-6 w-6 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" 
                 @click.away="open = false"
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 origin-top-right rounded-lg border border-gray-200 bg-white shadow-lg"
                 style="display: none;">
                <div class="py-1">
                    <a href="{{ route('profile.edit') }}" 
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
