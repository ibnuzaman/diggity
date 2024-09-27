<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{


    public function index()
    {
        // $courses = Course::all();

        return response()->json([
            'data' => Course::all(),
        ]);
    }



    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'slug' => 'required|unique:courses,slug|max:255',
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'level' => 'required|in:beginner,intermediate,advanced',
            ]);

            $course = new Course();
            $course->slug = $validatedData['slug'];
            $course->name = $validatedData['name'];
            $course->price = $validatedData['price'];
            $course->level = $validatedData['level'];

            $course->save();

            dd($course);

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
