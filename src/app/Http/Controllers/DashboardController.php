<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $links = Link::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        $totalClicks = $links->sum('clicks');

        return view('dashboard', compact('links', 'totalClicks'));
    }
}

