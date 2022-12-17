<header class="py-8">
    <nav class="flex justify-between items-center">
        <a href="/" class="text-rose-600 text-4xl font-bold hover:underline">LRVL</a>

        <div class="flex gap-2 relative" x-data="{ open: false }">
            @auth
                <button @click="open = !open"
                    class="border border-slate-700 flex items-center gap-1 px-5 py-2 rounded-md focus:bg-slate-800 hover:bg-slate-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </button>

                <div x-show="open" x-cloak x-transition @click.outside="open = false"
                    class="rounded-md border border-slate-700 bg-slate-800 absolute min-w-max top-11 right-0 shadow">
                    <a href="/profile"
                        class="hover:underline block px-4 py-3 m-4 rounded-md hover:bg-slate-600 shadow-2xl transition-colors">
                        <div class="flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-14 h-14">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                    </a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="hover:underline w-full px-4 py-3 text-slate-400">
                            Log out
                        </button>
                    </form>
                </div>
            @endauth

            @guest
                <a href="/login"
                    class="bg-transparent px-5 py-2 rounded-md w-fit hover:opacity-90 hover:bg-slate-800 transition-all flex items-center">Log
                    in</a>
                <a href="/signup"
                    class="bg-rose-700 text-slate-100 border-2 border-rose-700 px-5 py-2 rounded-md w-fit hover:opacity-90 transition-all flex items-center">Sign
                    up</a>
            @endguest
        </div>
    </nav>
</header>
