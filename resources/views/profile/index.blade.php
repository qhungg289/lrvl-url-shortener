<x-layout>
    <main>
        <h1 class="text-4xl font-semibold mb-6">Profile</h1>

        <div class="mb-2 flex justify-between">
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
        <div class="overflow-x-auto">
            <table class="table-auto">
                <thead>
                    <tr class="text-left border-b border-slate-700 bg-slate-800">
                        <th class="p-4 rounded-tl-md">Original URL</th>
                        <th class="p-4">Shortened URL</th>
                        <th class="p-4 rounded-tr-md">Views</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700 text-slate-400">
                    @foreach ($links as $link)
                        <tr>
                            <td class="p-4">{{ $link->destination }}</td>
                            <td class="p-4">{{ url($link->short_code) }}</td>
                            <td class="p-4 text-right">{{ $link->visits_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-layout>
