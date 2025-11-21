<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Short Link
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('links.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Destination URL</label>
                        <input type="url" name="original_url" value="{{ old('original_url') }}"
                               class="w-full border rounded px-3 py-2 text-sm">
                        @error('original_url')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Custom code (optional)</label>
                        <input type="text" name="code" value="{{ old('code') }}"
                               class="w-full border rounded px-3 py-2 text-sm">
                        @error('code')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Expires at (optional)</label>
                        <input type="datetime-local" name="expires_at" value="{{ old('expires_at') }}"
                               class="w-full border rounded px-3 py-2 text-sm">
                        @error('expires_at')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded text-sm">
                        Create Link
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
