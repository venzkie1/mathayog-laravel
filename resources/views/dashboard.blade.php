<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @auth
                    <h3 class="text-2xl text-center mb-4">{{ __("Good day, Esteemed ") }}<span class="text-green-500">{{ Auth::user()->firstname }}</span> <span class="text-green-500">{{ Auth::user()->lastname }}</span></h3>
                    @else
                    <h3 class="text-2xl text-center mb-4">{{ __('Welcome!') }}</h3>
                    @endauth

                    <!-- Centered search input and buttons -->
                    <form method="POST" action="{{ route('dashboard.search_data_by_level') }}">
                        @csrf
                        <div class="mb-4 text-center">
                            <input type="text" name="search" placeholder="Search data" class="w-full text-black px-4 py-2 rounded-md">
                        </div>

                        <div class="flex items-center justify-center mb-4">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">Search Data</button>
                            <a href="{{ route('dashboard') }}" class="bg-orange-500 text-white px-4 py-2 rounded-md">Clear Search</a>
                        </div>
                    </form>

                    <!-- Add padding for spacing -->
                    <div class="py-4">
                        <!-- Display the data (no need to check for 'post' request) -->
                        @if ($data->count() > 0)
                        {{-- All Data --}}
                            {{-- Page information --}}
                        <div class="mb-2">
                            Page {{ $data->currentPage() }} of {{ $data->lastPage() }}
                        </div>
                        <table class="w-full border">
                            <thead>
                                <tr>
                                    <th class="w-1/4 border">Level</th>
                                    <th class="w-1/4 border">Topic Title</th>
                                    <th class="w-1/4 border">Sub Topic Title</th>
                                    <th class="w-1/4 border">Skill Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $skill)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $skill->subTopic->topic->level->level }}</td>
                                        <td class="border px-4 py-2">{{ $skill->subTopic->topic->topic_title }}</td>
                                        <td class="border px-4 py-2">{{ $skill->subTopic->sub_topic_title }}</td>
                                        <td class="border px-4 py-2">{{ $skill->skill_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{-- {{ $data->links() }} --}}
                            {{ $data->onEachSide(1)->links() }}
                            {{-- {{ $data->onEachSide(1)->links('pagination::bootstrap-4') }} --}}
                        </div>
                    @else
                        <p style="color: red;">No results found. Please refine your search criteria and try again.</p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>