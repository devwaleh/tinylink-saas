<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Link
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('links.update', $link) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">
                            Destination URL
                        </label>
                        <input
                            type="url"
                            name="original_url"
                            value="{{ old('original_url', $link->original_url) }}"
                            class="w-full border rounded px-3 py-2 text-sm"
                        >
                        @error('original_url')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">
                            Expires at (optional)
                        </label>
                        <input
                            type="datetime-local"
                            name="expires_at"
                            value="{{ old('expires_at', optional($link->expires_at)->format('Y-m-d\TH:i')) }}"
                            class="w-full border rounded px-3 py-2 text-sm"
                        >
                        @error('expires_at')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex items-center gap-2">
                        <input
                            type="hidden"
                            name="is_active"
                            value="0"
                        >
                        <input
                            type="checkbox"
                            name="is_active"
                            id="is_active"
                            value="1"
                            {{ old('is_active', $link->is_active) ? 'checked' : '' }}
                            class="rounded border-gray-300"
                        >
                        <label for="is_active" class="text-sm text-gray-700">
                            Link is active
                        </label>
                    </div>

                    <div class="flex gap-3">
                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm"
                        >
                            Save changes
                        </button>

                        <a href="{{ route('links.index') }}"
                           class="text-sm text-gray-600 hover:text-gray-800">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
