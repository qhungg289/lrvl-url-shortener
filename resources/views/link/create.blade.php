<x-layout>
    <main class="min-h-[calc(100vh-10rem)] max-w-xl">
        <h1 class="text-4xl font-semibold mb-6">Generate new shortened link</h1>

        <form action="/link" method="post" class="flex flex-col">
            @csrf

            <div class="flex flex-col mb-3">
                <label for="link" class="text-slate-400 mb-1">Your full link</label>

                @if (session('full_link'))
                    <input type="text" name="link" id="link" readonly value="{{ session('full_link') }}"
                        class="bg-slate-800 rounded-md border-slate-600 mb-1">
                @else
                    <input type="text" name="link" id="link" placeholder="Paste your link in here..."
                        value="{{ old('link') }}" class="bg-slate-800 rounded-md border-slate-600 mb-1">
                @endif

                @error('link')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            @empty(session('short_link'))
                <button type="submit"
                    class="bg-blue-700 px-5 py-2 rounded-md hover:opacity-90 transition-opacity">Create</button>
            @endempty
        </form>

        <div class="flex flex-col">
            @if (session('short_link'))
                <label for="short_link" class="text-slate-400 mb-1">Your shortened link</label>
                <input type="text" name="short_link" id="short_link" readonly value="{{ session('short_link') }}"
                    class="bg-slate-800 rounded-md border-slate-600 mb-3">

                <div class="flex gap-3">
                    <button
                        class="copy-btn bg-emerald-600 px-5 py-2 rounded-md block hover:opacity-90 transition-opacity"
                        data-clipboard-target="#short_link">Copy</button>
                    <a href="/"
                        class="bg-blue-700 px-5 py-2 rounded-md block w-fit hover:opacity-90 transition-opacity">New</a>
                </div>
            @endif
        </div>
    </main>

    <script>
        new ClipboardJS(".copy-btn")
    </script>
</x-layout>
