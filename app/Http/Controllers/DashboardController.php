<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Msme;

class DashboardController extends Controller
{
    public function index()
    {
        $topDestinations = Destination::with([
            'images' => function ($query) {
                $query->take(1);
            }
        ])
            ->withCount(['comments', 'likes'])
            ->orderBy('view_count', 'desc')
            ->orderBy('likes_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->take(6)
            ->get();

        $topMsmes = Msme::with([
            'images' => function ($query) {
                $query->take(1);
            }
        ])
            ->withCount(['comments', 'likes'])
            ->orderBy('view_count', 'desc')
            ->orderBy('likes_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->take(6)
            ->get();

        return view('app.dashboard.index', compact('topDestinations', 'topMsmes'));
    }
}