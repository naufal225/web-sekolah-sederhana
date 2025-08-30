<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activities');
    }

    public function getActivities(Request $request)
    {
        $query = Activity::latest();

        if ($request->has('category') && !empty($request->category) && $request->category !== "all") {
            $query->byCategory($request->category);
        }

        $activities = $query->paginate(9);

        return response()->json($activities);
    }

    public function show($slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        return response()->json([
            'status' => 'success',
            'data' => $activity
        ]);
    }

    public function latest()
    {
        $activity = Activity::latest()
            ->take(3)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $activity
        ]);
    }
}
