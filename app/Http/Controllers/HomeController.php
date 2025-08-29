<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = News::published()->latest()->take(3)->get();
        $latestActivity = Activity::latest()->take(3)->get();

        return view('home', compact('latestNews', 'latestActivity'));
    }

    public function getLatestContent()
    {
        $news = News::published()->latest()->take(3)->get();
        $activities = Activity::latest()->take(3)->get();

        return response()->json([
            'news' => $news,
            'activities' => $activities
        ]);
    }
}
