@if ($links->count())
    <table class="min-w-full text-sm">
        <thead>
        <tr class="border-b text-left text-xs text-gray-500">
            <th class="py-2 pr-4">Short URL</th>
            <th class="py-2 pr-4">Destination</th>
            <th class="py-2 pr-4">Clicks</th>
            <th class="py-2 pr-4">Expires</th>
            <th class="py-2 pr-4">QR</th>
            <th class="py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($links as $link)
            <tr class="border-b">
                <td class="py-2 pr-4">
                    <a href="{{ $link->short_url }}" target="_blank" class="text-indigo-600 underline">
                        {{ $link->short_url }}
                    </a>
                </td>
                <td class="py-2 pr-4 max-w-xs truncate">
                    <span title="{{ $link->original_url }}">
                        {{ Str::limit($link->original_url, 40) }}
                    </span>
                </td>
                <td class="py-2 pr-4">{{ $link->clicks }}</td>
                <td class="py-2 pr-4">
                    {{ $link->expires_at?->format('Y-m-d H:i') ?? '—' }}
                </td>
                <td class="py-2 pr-4">
                    <a href="{{ route('links.qr', $link) }}" class="text-xs text-gray-600 underline">
                        View QR
                    </a>
                </td>
                <td class="py-2">
                    <div class="flex gap-2 text-xs">
                        <a href="{{ route('links.edit', $link) }}" class="text-indigo-600">Edit</a>
                        <form method="POST" action="{{ route('links.destroy', $link) }}"
                              onsubmit="return confirm('Delete this link?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $links->links() }}
    </div>
@else
    <p class="text-sm text-gray-500">No links yet.</p>
    <a href="{{ route('links.create') }}" class="mt-2 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded text-sm">+ Create Link</a>
@endif
