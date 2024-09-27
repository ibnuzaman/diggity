<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function index()
    {
        // $courses = Course::all();

        return response()->json([
            // 'courses' => $courses,
            // 'status' => 'success',
            'data' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        // $data = request()->validate([
        //     'slug' => 'required|string|unique:courses,slug|max:100',
        //     'name' => 'required|string|max:100',
        //     'price' => 'required|numeric|min:0',
        //     'level' => 'required|in:beginner,intermediate,advanced',
        // ]);

        $course = new Course();
        $course->slug = $request->input('slug');
        $course->name = $request->input('name');
        $course->price = $request->input('price');
        // $course->level = $request->input('level');

        $course->save();

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course,

        ]);
    }
}
