<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Links') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Manage Links</h3>

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
