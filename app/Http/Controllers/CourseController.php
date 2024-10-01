<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;
use App\Models\Subscriber;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'level' => 'required|in:beginner,intermediate,advanced',
                'discount' => 'nullable|numeric',
            ]);

            $course = new Course();
            $course->name = $validatedData['name'];
            $course->price = $validatedData['price'];
            $course->level = $validatedData['level'];
            $course->discount = $validatedData['discount'] ?? 0;

            $course->save();

            return response()->json([
                'message' => 'Course created successfully',
                'course' => $course,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
    }
}
