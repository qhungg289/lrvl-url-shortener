<x-layout>
    <main>
        <h1 class="text-4xl font-semibold mb-6">Profile</h1>

        <div class="mb-2 gap-4 flex items-center">
            <h2 class="text-2xl font-medium">Your information</h2>
        </div>
        <div class="mb-6 gap-4 flex flex-col md:flex-row">
            <div class="bg-slate-800 p-4 rounded-md">
                <p class="text-slate-400 mb-1">Name</p>
                <p>{{ auth()->user()->name }}</p>
            </div>
            <div class="bg-slate-800 p-4 rounded-md">
                <p class="text-slate-400 mb-1">Email</p>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div class="bg-slate-800 p-4 rounded-md">
                <p class="text-slate-400 mb-1">Joined</p>
                <p>{{ auth()->user()->created_at }}</p>
            </div>
        </div>

        <div class="mb-2 flex items-center gap-4">
            <h2 class="text-2xl font-medium">Your links</h2>
            <div class="rounded-full bg-slate-800 text-slate-400 w-6 h-6 text-sm flex items-center justify-center">
                {{ count($links) }}
            </div>
        </div>
        @if (count($links) == 0)
            <p class="text-slate-400 my-6">It's empty in here...</p>
        @else
            <div class="overflow-x-auto">
                <table class="table-auto">
                    <thead>
                        <tr class="text-left border-b border-slate-700 bg-slate-800">
                            <th class="p-4 rounded-tl-md">Original URL</th>
                            <th class="p-4">Shortened URL</th>
                            <th class="p-4">Views</th>
                            <th class="p-4 rounded-tr-md"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 text-slate-400">
                        @foreach ($links as $link)
                            <tr>
                                <td class="p-4">
                                    <a class="hover:underline focus:underline" target="_blank"
                                        href="{{ $link->destination }}">{{ $link->destination }}</a>
                                </td>
                                <td class="p-4">
                                    <a class="hover:underline focus:underline" target="_blank"
                                        href="{{ url($link->short_code) }}">{{ url($link->short_code) }}</a>
                                </td>
                                <td class="p-4 text-right">{{ $link->visit_count }}</td>
                                <td>
                                    <form action="{{ route('delete') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $link->id }}">
                                        <button type="submit" class="p-4 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </main>
</x-layout>
