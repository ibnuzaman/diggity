<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class FilterCourseController extends Controller
{
    public function byLatest(Request $request)
    {
        $query = $request->query();
        $courses = Course::latest()->withAvg('reviews', 'rating')->withCount('subscribers');
        if ($query) {
            return response()->json([
                'data' => $courses->paginate(6)->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
            ]);
        } else {
            return response()->json([
                'data' => $courses->paginate(3)->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
            ]);
        }
    }

    public function byTopRatedCourses()
    {
        return response()->json([
            'data' => Course::withAvg('reviews', 'rating')
                ->withCount('subscribers')
                ->orderBy('reviews_avg_rating', 'desc')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ]);
    }

    public function byRetrievePopularCourses()
    {
        return response()->json([
            'data' => Course::withCount('subscribers')
                ->withAvg('reviews', 'rating')
                ->orderBy('subscribers_count', 'desc')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ]);
    }

    public function byCategoryCourses(Request $request)
    {

        $categoryId = $request->query('category_id');
        $categoryIdsArray = explode(',', $categoryId);
        return response()->json([
            'data' => Course::withCount('subscribers')
                ->withAvg('reviews', 'rating')
                ->join('course_categories', 'courses.id', '=', 'course_categories.course_id')
                ->join('categories', 'course_categories.category_id', '=', 'categories.id')
                ->whereIn('course_categories.category_id', $categoryIdsArray)
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ]);
    }

    public function byLevel(Request $request)
    {
        $level = $request->query('level');
        return response()->json([
            'data' => Course::where('level', $level)
                ->withAvg('reviews', 'rating')
                ->withCount('subscribers')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ]);
    }

    public function byPrice(Request $request)
    {
        $price = $request->query('price');
        if ($price == 'Gratis') {
            return response()->json([
                'data' => Course::where('price', $price)
                    ->withAvg('reviews', 'rating')
                    ->withCount('subscribers')
                    ->paginate(6)
                    ->through(function ($course) {
                        $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                        return $course;
                    }),
            ]);
        }
        if ($price == 'Berbayar') {
            return response()->json([
                'data' => Course::where('price', '>', 0)
                    ->withAvg('reviews', 'rating')
                    ->withCount('subscribers')
                    ->paginate(6)
                    ->through(function ($course) {
                        $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                        return $course;
                    }),
            ]);
        }
    }
}
