<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:courses',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'discounted_price' => 'nullable|numeric',
                'starting_price' => 'required|numeric',
                'final_price' => 'nullable|numeric',
                'level' => 'required|in:Pemula,Menengah,Ahli',
            ]);

            $course = new Course();
            $course->name = $validatedData['name'];
            $course->image = $request->file('image')->store('courses', 'public');
            $course->starting_price = $validatedData['starting_price'];
            $course->level = $validatedData['level'];
            $course->discounted_price = $validatedData['discounted_price'] ?? 0;

            if ($course->discounted_price > 0) {
                $course->final_price = $course->starting_price - $course->discounted_price;
            } else {
                $course->final_price = $course->starting_price;
            }

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

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:courses,name,' . $id,
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'discounted_price' => 'nullable|numeric',
                'starting_price' => 'required|numeric',
                'final_price' => 'nullable|numeric',
                'level' => 'required|in:Pemula,Menengah,Ahli',
            ]);

            $course = Course::findOrFail($id);
            $course->name = $validatedData['name'];
            $course->image = $request->file('image')->store('courses', 'public');
            $course->slug = Str::slug($course->name);
            $course->starting_price = $validatedData['starting_price'];
            $course->level = $validatedData['level'];
            $course->discounted_price = $validatedData['discounted_price'] ?? 0;

            if ($course->discounted_price > 0) {
                $course->final_price = $course->starting_price - $course->discounted_price;
            } else {
                $course->final_price = $course->starting_price;
            }

            $course->save();

            return response()->json([
                'message' => 'Course updated successfully',
                'course' => $course,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Course not found',
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();

            return response()->json([
                'message' => 'Course deleted successfully',
            ]);
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => 'Course not found',
            ], 404);
        }
    }
}
