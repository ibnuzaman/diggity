<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{


    public function index()
    {
        return response()->json([
            'data' => Review::paginate(4),
        ]);
    }

    public function latest()
    {
        return response()->json([
            'data' => Review::latest()->paginate(4),
        ]);
    }

    public function higherRating()
    {
        return response()->json([
            'data' => Review::where('rating', '>', 3)->paginate(4),
        ]);
    }

    public function lowerRating()
    {
        return response()->json([
            'data' => Review::where('rating', '<', 3)->paginate(4),
        ]);
    }

    public function store(Request $request, $course_id)
    {
        try {
            $validatedData = $request->validate([
                'review' => 'required|string',
                'rating' => 'required|integer|between:1,5',
            ]);

            $review = new Review();
            $review->course_id = $course_id;
            $review->review = $validatedData['review'];
            $review->rating = $validatedData['rating'];
            // $review->user_id = auth()->id();
            $review->user_id = 1; // test user_id

            $review->save();
            return response()->json([
                'message' => 'Review created successfully',
                'review' => $review,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
