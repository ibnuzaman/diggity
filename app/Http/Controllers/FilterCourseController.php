<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\Response;

class FilterCourseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/courses/all",
     *     summary="Get the latest courses with average rating",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="query",
     *         in="query",
     *         required=false,
     *         description="Query parameters for filtering courses",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v1/courses/top-rated",
     *     summary="Get the top-rated courses",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid request parameters"
     *             )
     *         )
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/api/v1/courses/popular",
     *     summary="Get the popular courses",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid request parameters"
     *             )
     *         )
     *     )
     * )
     */

    public function byPopularCourses()
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


    /**
     * @OA\Get(
     *     path="/api/v1/courses/by-category",
     *     summary="Get courses by category",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         required=true,
     *         description="Comma-separated list of category IDs",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid request parameters"
     *             )
     *         )
     *     )
     * )
     */
    public function byCategoryCourses(Request $request) {}

    /**
     * @OA\Get(
     *     path="/api/v1/courses/by-level",
     *     summary="Get courses by level",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="level",
     *         in="query",
     *         required=true,
     *         description="Level filter (e.g., Pemula, Menengah, Ahli)",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid request parameters"
     *             )
     *         )
     *     )
     * )
     */
    public function byLevel(Request $request)
    {
        $level = $request->query('level');
        $cekLevel = Course::where('level', $level)->exists();
        if (!$cekLevel) {
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'error' => 'Invalid request parameters',
            ], Response::HTTP_BAD_REQUEST);
        }

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

    /**
     * @OA\Get(
     *     path="/api/v1/courses/by-price",
     *     summary="Get courses by price",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="price",
     *         in="query",
     *         required=true,
     *         description="Price filter (Gratis or Berbayar)",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Course Name"),
     *                     @OA\Property(property="reviews_avg_rating", type="string", example="4.5")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="error",
     *                 type="string",
     *                 example="Invalid request parameters"
     *             )
     *         )
     *     )
     * )
     */
    public function byPrice(Request $request)
    {
        $price = $request->query('price');

        $cekPrice = Course::where('final_price', $price)->exists();
        if (!$cekPrice) {
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'error' => 'Invalid request parameters',
            ], Response::HTTP_BAD_REQUEST);
        }

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
