<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news');
    }

    public function getNews(Request $request)
    {
        $query = News::published()->latest();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(perPage: 9);

        return response()->json($news);
    }

    public function latest()
    {
        $news = News::published()
            ->latest()
            ->take(3)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'data' => $news
        ]);
    }

}
