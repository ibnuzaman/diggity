<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index()
    {
        return response()->json([
            'data' => Review::all(),
        ]);
    }

    public function store(Request $request, $course_id)
    {
        $data = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string',
        ]);

        try {
            $review = new Review();
            $review->course_id = $course_id;
            $review->rating = $data['rating'];
            $review->review = $data['review'];
            // $review->user_id = auth()->id();
            // test user_id
            $review->user_id = 1;
            $review->save();

            return response()->json([
                'message' => 'Review created successfully',
                'review' => $review,
            ]);
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Failed to create review',
                    'error' => $e->getMessage(),
                ], 500);
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to create review']);
            }
        }
    }
}
