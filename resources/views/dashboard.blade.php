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
                    {{ __("Good day, Esteemed ") }}<span class="text-green-500">{{ Auth::user()->firstname }}</span> <span class="text-green-500">{{ Auth::user()->lastname }}</span> <!-- Display user's firstname -->
                    @else
                        {{ __('Welcome!') }} <!-- Display a generic welcome message -->
                    @endauth

                    <!-- Center the search input and buttons -->
                    <form method="POST" action="{{ route('dashboard.display_data_by_level') }}">
                        @csrf
                        <div class="flex items-center justify-center">
                            <input type="text" name="search" placeholder="Search data" class="text-black">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md ml-2">Search Data</button>
                            <a href="{{ route('dashboard') }}" class="bg-orange-500 text-white px-4 py-2 rounded-md ml-2">Clear Search</a>
                        </div>
                    </form>

                    <!-- Add padding for spacing -->
                    <div class="py-4">
                        <!-- Display the data (no need to check for 'post' request) -->
                        @if ($data->count() > 0)
                            {{-- All Data --}}
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
                                    @foreach ($data as $level)
                                        @foreach ($level->topics as $topic)
                                            @foreach ($topic->subTopics as $subTopic)
                                                @foreach ($subTopic->courseSkillTitles as $skill)
                                                    <tr>
                                                        <td class="border">{{ $level->level }}</td>
                                                        <td class="border">{{ $topic->topic_title }}</td>
                                                        <td class="border">{{ $subTopic->sub_topic_title }}</td>
                                                        <td class="border">{{ $skill->skill_name }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p style="color: red;">No results found. Please refine your search criteria and try again.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
