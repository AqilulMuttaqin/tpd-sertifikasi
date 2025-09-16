<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            {{-- Arsip --}}
            <li>
                <a href="{{ route('arsip.index') }}"
                    class="flex items-center p-2 rounded-lg group
                   {{ request()->routeIs('arsip.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-900 hover:bg-gray-100' }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 
                                {{ request()->routeIs('arsip.*') ? 'text-blue-600' : 'text-gray-500 group-hover:text-gray-900' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">Arsip</span>
                </a>
            </li>
            {{-- Kategori --}}
            <li>
                <a href="{{ route('kategori.index') }}"
                    class="flex items-center p-2 rounded-lg group
                   {{ request()->routeIs('kategori.*') ? 'bg-gray-100 text-blue-600' : 'text-gray-900 hover:bg-gray-100' }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 
                                {{ request()->routeIs('kategori.*') ? 'text-blue-600' : 'text-gray-500 group-hover:text-gray-900' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kategori Surat</span>
                </a>
            </li>
            {{-- About --}}
            <li>
                <a href="{{ route('about') }}"
                    class="flex items-center p-2 rounded-lg group
                   {{ request()->routeIs('about') ? 'bg-gray-100 text-blue-600' : 'text-gray-900 hover:bg-gray-100' }}">
                    <svg class="shrink-0 w-5 h-5 transition duration-75 
                                {{ request()->routeIs('about') ? 'text-blue-600' : 'text-gray-500 group-hover:text-gray-900' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">About</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
