<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function handle(string $code)
    {
        $link = Link::where('code', $code)->first();

        if (! $link || ! $link->is_active || $link->isExpired()) {
            abort(404);
        }

        $link->increment('clicks');

        return redirect()->away($link->original_url);
    }
}
