<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            QR Code for {{ $link->short_url }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                {!! $qr !!}
                <p class="mt-4 text-sm text-gray-600">
                    Scan to visit: {{ $link->short_url }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
