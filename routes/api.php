<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CourseController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/up', function () {
    return response()->json(['status' => 'ok']);
});

/**
 * API Routes for Visitor Management
 *
 * This group of routes is protected by the 'visitors' middleware and is 
 * prefixed with 'v1'. It includes the following endpoints:
 *
 * @route GET /api/v1/weeklyVisitors
 * @description Fetches the weekly visitors data.
 * @controller VisitorController
 * @method weeklyVisitors
 *
 * @route GET /api/v1/dailyVisitors
 * @description Fetches the daily visitors data.
 * @controller VisitorController
 * @method dailyVisitors
 *
 * @route GET /api/v1/visitors
 * @description Fetches the general visitors data.
 * @controller VisitorController
 * @method visitors
 *
 * @route GET /api/v1/monthlyVisitors
 * @description Fetches the monthly visitors data.
 * @controller VisitorController
 * @method monthlyVisitors
 */

/* Tracker visitors diakses lewat middleware as [visitors]
    - weeklyVisitors
    - dailyVisitors
    - visitors
    - monthlyVisitors
    Add middleware [visitors] to the tracker visitor by IP
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

Route::prefix('v1')->group(function () {
    Route::get('/reviews/latest', [ReviewController::class, 'latest']);
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews/{course_id}', [ReviewController::class, 'store']);
    Route::get('reviews/higherRating', [ReviewController::class, 'higherRating']);
    Route::get('reviews/lowerRating', [ReviewController::class, 'lowerRating']);
});

Route::post('reviews/{course_id}', [ReviewController::class, 'store']);
Route::get('reviews/', [ReviewController::class, 'index']);

Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);

// require __DIR__ . '/api.php';
