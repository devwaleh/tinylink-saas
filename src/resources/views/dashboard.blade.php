<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <p class="text-sm text-gray-600">
                    Total clicks across your links:
                    <span class="font-bold">{{ $totalClicks }}</span>
                </p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="flex justify-between items-center mb-3 flex-wrap gap-2">
                    <h3 class="font-semibold">Your Links</h3>

                    <a href="{{ route('links.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded text-sm">
                        + Create Link
                    </a>
                </div>

                @include('links._table')
            </div>
        </div>
    </div>
</x-app-layout>
