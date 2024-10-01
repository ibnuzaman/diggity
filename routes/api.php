<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FilterCourseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/up', function () {
    return response()->json(['status' => 'ok']);
});

/**
 * API Routes for version 1.
 *
 * Prefix: v1
 *
 * Routes:
 * - GET /dailyVisitors: Fetch the number of daily visitors.
 * - GET /weeklyVisitors: Fetch the number of weekly visitors.
 * - GET /visitors: Fetch the number of visitors.
 * - GET /monthlyVisitors: Fetch the number of monthly visitors.
 * - GET /yearlyVisitors: Fetch the number of yearly visitors.
 *
 * Controllers:
 * - VisitorController: Handles all visitor-related actions.
 */
Route::middleware(['visitors'])->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/dailyVisitors', [VisitorController::class, 'dailyVisitors']);
        Route::get('/weeklyVisitors', [VisitorController::class, 'weeklyVisitors']);
        Route::get('/visitors', [VisitorController::class, 'visitors']);
        Route::get('/monthlyVisitors', [VisitorController::class, 'monthlyVisitors']);
        Route::get('/yearlyVisitors', [VisitorController::class, 'yearlyVisitors']);
    });
});



/**
 * API Routes for version 1.
 *
 * Prefix: v1
 *
 * Routes:
 * - GET /reviews/latest: Fetch the latest reviews.
 * - GET /reviews: Fetch all reviews.
 * - POST /reviews/{course_id}: Store a new review for a specific course.
 * - GET /reviews/higherRating: Fetch reviews with higher ratings.
 * - GET /reviews/lowerRating: Fetch reviews with lower ratings.
 *
 * Controllers:
 * - ReviewController: Handles all review-related actions.
 */
Route::prefix('v1')->group(function () {
    Route::get('/reviews/latest', [ReviewController::class, 'latest']);
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews/{course_id}', [ReviewController::class, 'store']);
    Route::get('reviews/higherRating', [ReviewController::class, 'higherRating']);
    Route::get('reviews/lowerRating', [ReviewController::class, 'lowerRating']);
});
Route::prefix('v1')->group(function () {
    Route::post('/courses', [CourseController::class, 'store']);
});

Route::prefix('v1')->group(function () {
    Route::get('/courses/all', [FilterCourseController::class, 'byLatest']);
    Route::get('/courses/topRated', [FilterCourseController::class, 'byTopRatedCourses']);
    Route::get('/courses/popular', [FilterCourseController::class, 'byRetrievePopularCourses']);
    Route::get('/courses', [FilterCourseController::class, 'byCategoryCourses']); // raw params to get the category id, ex http://127.0.0.1:8000/api/v1/courses?category_id=6,2
    Route::get('/courses/level', [FilterCourseController::class, 'byLevel']); // raw params to get the level, ex http://127.0.0.1:8000/api/v1/courses/level/?level=Pemula
    Route::get('/courses/price/', [FilterCourseController::class, 'byPrice']); // raw params to get the price, ex http://127.0.0.1:8000/api/v1/courses/price?price=paid
});
