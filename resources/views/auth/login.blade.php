<x-layout>
    <main class="min-h-[calc(100vh-10rem)]">
        <h1 class="text-4xl font-semibold mb-6">Log in</h1>

        <form action="" method="post" class="flex flex-col">
            @csrf

            {{-- email, password --}}

            <div class="flex flex-col mb-3">
                <label for="name" class="text-slate-400 mb-1">Email</label>

                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="bg-slate-800 rounded-md border-slate-600 mb-1" placeholder="example@gmail.com">

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mb-3">
                <label for="password" class="text-slate-400 mb-1">Password</label>

                <input type="password" name="password" id="password"
                    class="bg-slate-800 rounded-md border-slate-600 mb-1" placeholder="Minimum 8 characters">

                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-700 px-5 py-2 rounded-md hover:opacity-90 transition-opacity">Log
                in</button>
        </form>
    </main>
</x-layout>
