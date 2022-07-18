<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/search" method="GET" class="space-y-2 mb-6">
                        <x-input id="query" name="query" type="search" placeholder="Search something" class="block w-full" value="{{ request()->get('query') }}" />
                        <x-button>Search</x-button>
                    </form>

                    @if ($results)
                        <div class="space-y-4">
                            @if ($results->count())
                                <em>Found {{ $results->total() }} results</em>
                                @foreach ($results as $result)
                                    <div>
                                        <h1 class="text-lg font-semibold">{{ $result->title }} #{{ $result->published }}</h1>
                                        <p>{{ $result->teaser }}</p>
                                    </div>
                                @endforeach
                                {{ $results->links() }}
                            @else
                                <p>No results found!</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
