<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{


    public function index()
    {
        return response()->json([
            'data' => Course::all(),
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'level' => 'required|in:beginner,intermediate,advanced',
            ]);

            $course = new Course();
            $course->name = $validatedData['name'];
            $course->price = $validatedData['price'];
            $course->level = $validatedData['level'];

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
