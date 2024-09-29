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



Route::middleware(['visitors'])->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('/dailyVisitors', [VisitorController::class, 'dailyVisitors']);
        Route::get('/weeklyVisitors', [VisitorController::class, 'weeklyVisitors']);
        Route::get('/visitors', [VisitorController::class, 'visitors']);
        Route::get('/monthlyVisitors', [VisitorController::class, 'monthlyVisitors']);
        Route::get('/yearlyVisitors', [VisitorController::class, 'yearlyVisitors']);
    });
});

Route::post('reviews/{course_id}', [ReviewController::class, 'store']);
// Route::get('reviews/{course}', [ReviewController::class, 'index']);
Route::get('reviews/', [ReviewController::class, 'index']);

Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);

// require __DIR__ . '/api.php';
