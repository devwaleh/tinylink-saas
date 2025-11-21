<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LinkController extends Controller
{
    public function index()
    {
        $links = Link::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'original_url' => ['required', 'url', 'max:2000'],
            'expires_at'   => ['nullable', 'date', 'after:now'],
            'code'         => ['nullable', 'alpha_num', 'min:3', 'max:20', 'unique:links,code'],
        ]);

        $code = $data['code'] ?? $this->generateUniqueCode();

        $link = Link::create([
            'user_id'      => Auth::id(),
            'code'         => $code,
            'original_url' => $data['original_url'],
            'expires_at'   => $data['expires_at'] ?? null,
        ]);

        return redirect()
            ->route('links.index')
            ->with('status', 'Short link created: ' . $link->short_url);
    }

    protected function generateUniqueCode(): string
    {
        do {
            $code = Str::random(6);
        } while (Link::where('code', $code)->exists());

        return $code;
    }

    public function edit(Link $link)
    {
        $this->authorizeLink($link);

        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $this->authorizeLink($link);

        $data = $request->validate([
            'original_url' => ['required', 'url', 'max:2000'],
            'expires_at'   => ['nullable', 'date', 'after:now'],
            'is_active'    => ['boolean'],
        ]);

        $link->update($data);

        return redirect()
            ->route('links.index')
            ->with('status', 'Link updated.');
    }

    public function destroy(Link $link)
    {
        $this->authorizeLink($link);

        $link->delete();

        return redirect()
            ->route('links.index')
            ->with('status', 'Link deleted.');
    }

    public function qr(Link $link)
    {
        $this->authorizeLink($link);

        $qr = QrCode::size(300)->generate($link->short_url);

        return view('links.qr', compact('link', 'qr'));
    }

    protected function authorizeLink(Link $link): void
    {
        abort_if($link->user_id !== Auth::id(), 403);
    }
}

