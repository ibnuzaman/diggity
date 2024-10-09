<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\Response;

class FilterCourseController extends Controller
{
    public function byLatest(Request $request)
    {
        $query = $request->query();
        $courses = Course::latest()->withAvg('reviews', 'rating');
        if ($query) {
            return response()->json([
                'data' => $courses->paginate(6)->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
            ]);
        } else {
            return response()->json([
                'satus' => Response::HTTP_OK,
                'data' => $courses->paginate(3)->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
            ], Response::HTTP_OK);
        }
    }

    public function byTopRatedCourses()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Course::withAvg('reviews', 'rating')
                ->orderBy('reviews_avg_rating', 'desc')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ], Response::HTTP_OK);
    }

    public function byRetrievePopularCourses()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Course::orderBy('subscriber', 'desc')
                ->withAvg('reviews', 'rating')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ], Response::HTTP_OK);
    }

    public function byCategoryCourses(Request $request)
    {
        $categoryId = $request->query('category_id');
        $categoryIdsArray = explode(',', $categoryId);
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Course::withAvg('reviews', 'rating')
                ->join('course_categories', 'courses.id', '=', 'course_categories.course_id')
                ->join('categories', 'course_categories.category_id', '=', 'categories.id')
                ->whereIn('course_categories.category_id', $categoryIdsArray)
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ], Response::HTTP_OK);
    }

    public function byLevel(Request $request)
    {
        $level = $request->query('level');
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Course::where('level', $level)
                ->withAvg('reviews', 'rating')
                ->paginate(6)
                ->through(function ($course) {
                    $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                    return $course;
                }),
        ], Response::HTTP_OK);
    }

    public function byPrice(Request $request)
    {
        $price = $request->query('price');
        if ($price == 'Gratis') {
            return response()->json([
                'status' => Response::HTTP_OK,
                'data' => Course::where('final_price', $price)
                    ->withAvg('reviews', 'rating')
                    ->paginate(6)
                    ->through(function ($course) {
                        $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                        return $course;
                    }),
            ], Response::HTTP_OK);
        }
        if ($price == 'Berbayar') {
            return response()->json([
                'status' => Response::HTTP_OK,
                'data' => Course::where('final_price', '>', 0)
                    ->withAvg('reviews', 'rating')
                    ->paginate(6)
                    ->through(function ($course) {
                        $course->reviews_avg_rating = number_format($course->reviews_avg_rating, 1);
                        return $course;
                    }),
            ], Response::HTTP_OK);
        }
    }
}
