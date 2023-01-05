<x-layout>
    <main>
        <a href="{{ url()->previous() }}" class="flex gap-2 hover:underline w-fit text-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span>Back</span>
        </a>

        <h1 class="text-4xl font-semibold my-6">Profile</h1>

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
            <div class="overflow-x-auto" x-data="{ open: false, deleteId: '' }">
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
                                <td class="p-4 max-w-sm truncate">
                                    <a class="hover:underline focus:underline" target="_blank"
                                        href="{{ $link->destination }}">{{ $link->destination }}</a>
                                </td>
                                <td class="p-4">
                                    <a class="hover:underline focus:underline" target="_blank"
                                        href="{{ url($link->short_code) }}">{{ url($link->short_code) }}</a>
                                </td>
                                <td class="p-4 text-right">{{ $link->visit_count }}</td>
                                <td>
                                    <button class="p-4 hover:text-red-500"
                                        @click="open = true; deleteId = {{ $link->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <template x-teleport="body">
                    <div class="fixed inset-0 z-30 flex items-center justify-center" x-show="open">
                        <div class="fixed h-screen w-full bg-slate-900/80" x-on:click="open = false" x-show="open"
                            x-transition.opacity></div>

                        <div class="fixed rounded-md border border-slate-700 bg-slate-800 shadow p-6 mx-auto w-4/5 max-w-lg"
                            x-show="open" x-transition>
                            <p class="text-2xl font-semibold mb-6">Do you want to delete this link?</p>
                            <form action="{{ route('delete') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" :value="deleteId">
                                <div class="flex gap-2">
                                    <button type="submit"
                                        class="bg-red-700 text-slate-100 px-5 py-2 rounded-md w-fit hover:bg-red-600 transition-colors flex items-center">Delete</button>
                                    <button
                                        class="bg-transparent px-5 py-2 rounded-md w-fit hover:bg-slate-600 transition-colors flex items-center"
                                        @click.prevent="open = false">No</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </template>
            </div>
        @endif
    </main>
</x-layout>
