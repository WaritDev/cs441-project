<aside :class="sidebarCollapsed ? 'w-16' : 'w-64'" 
       class="fixed left-0 top-0 z-40 h-screen bg-gray-900 transition-all duration-300">
    <div class="flex h-full flex-col">
        <!-- Logo -->
        <div class="flex h-16 items-center justify-between border-b border-gray-800 px-4">
            <template x-if="!sidebarCollapsed">
                <div class="flex items-center gap-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-white">
                        ThaiCRM
                    </span>
                </div>
            </template>
            <template x-if="sidebarCollapsed">
                <div class="mx-auto flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600">
                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
            </template>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 space-y-1 p-3">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800/50 hover:text-white' }}">
                <svg class="h-5 w-5 shrink-0 {{ request()->routeIs('dashboard') ? 'text-blue-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="truncate font-medium">Dashboard</span>
            </a>

            <!-- Action Stream -->
            <a href="#" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-400 transition-colors hover:bg-gray-800/50 hover:text-white">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="truncate font-medium">Action Stream</span>
            </a>

            <!-- Pipeline -->
            <a href="#" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-400 transition-colors hover:bg-gray-800/50 hover:text-white">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="truncate font-medium">Pipeline</span>
            </a>

            <!-- Customers -->
            <a href="{{ route('customers') }}" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-400 transition-colors hover:bg-gray-800/50 hover:text-white">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="truncate font-medium">Customers</span>
            </a>

            <!-- Templates -->
            <a href="#" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-400 transition-colors hover:bg-gray-800/50 hover:text-white">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="truncate font-medium">Templates</span>
            </a>
        </nav>

        <!-- Bottom Section -->
        <div class="border-t border-gray-800 p-3">
            <!-- Settings -->
            <a href="{{ route('profile.edit') }}" 
               class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-400 transition-colors hover:bg-gray-800/50 hover:text-white {{ request()->routeIs('profile.edit') ? 'bg-gray-800 text-white' : '' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span x-show="!sidebarCollapsed" class="font-medium">Settings</span>
            </a>

            <!-- Collapse Toggle -->
            <button @click="sidebarCollapsed = !sidebarCollapsed"
                    class="mt-2 flex w-full items-center justify-center rounded-lg bg-gray-800/30 p-2 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
                <svg x-show="sidebarCollapsed" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <svg x-show="!sidebarCollapsed" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
        </div>
    </div>
</aside>
