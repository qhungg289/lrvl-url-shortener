<header class="py-8">
    <nav class="flex justify-between items-center">
        <a href="/" class="text-rose-600 text-4xl font-bold">LRVL</a>

        <div class="flex gap-2 relative" x-data="{ open: false }">
            @auth
                <button @click="open = !open"
                    class="font-semibold border border-slate-700 flex items-center gap-1 px-5 py-2 rounded-md focus:bg-slate-800 hover:bg-slate-800 transition-colors">
                    <span>{{ auth()->user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-cloak x-transition @click.outside="open = false"
                    class="rounded-md border border-slate-700 bg-slate-800 absolute top-11 right-0 p-4 space-y-4 shadow">
                    <a href="/profile">Profile</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </div>
            @endauth

            @guest
                <a href="/login"
                    class="bg-transparent px-5 py-2 rounded-md w-fit hover:opacity-90 hover:bg-slate-800 transition-all flex items-center">Log
                    in</a>
                <a href="/signup"
                    class="bg-transparent hover:bg-rose-600 hover:text-slate-100 border-2 text-rose-600 border-rose-600 px-5 py-2 rounded-md w-fit hover:opacity-90 transition-all flex items-center">Sign
                    up</a>
            @endguest
        </div>
    </nav>
</header>
