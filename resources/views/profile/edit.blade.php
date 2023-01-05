<x-layout>
    <main class="min-h-[calc(100vh-10rem)] max-w-xl">
        @if (url()->previous() != url()->current())
            <a href="{{ url()->previous() }}" class="flex gap-2 mb-6 hover:underline w-fit text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <span>Back</span>
            </a>
        @endif

        <h1 class="text-4xl font-semibold mb-6">Edit profile</h1>

        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('PUT')

            <div class="flex flex-col mb-3">
                <label for="name" class="text-slate-400 mb-1">Full name</label>

                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                    class="bg-slate-800 rounded-md border-slate-600 mb-1">

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mb-3">
                <label for="name" class="text-slate-400 mb-1">Email</label>

                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="bg-slate-800 rounded-md border-slate-600 mb-1">

                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-700 px-5 py-2 rounded-md hover:opacity-90 transition-opacity">Update</button>
        </form>
    </main>
</x-layout>
