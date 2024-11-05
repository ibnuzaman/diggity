<?php

use App\Http\Controllers\Admin\RegisteredController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FilterCourseController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\MaterialController;



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
    Route::get('reviews/higher-rating', [ReviewController::class, 'higherRating']);
    Route::get('reviews/lower-rating', [ReviewController::class, 'lowerRating']);
});



// Route::post('/reg', [RegisteredController::class, 'store']);
// Route::prefix('admin')->group(function () {
//     Route::get('/', [AuthenticatedSessionController::class, 'index']);
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//     Route::middleware(['admin'])->group(function () {
//         Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboard']);
//         Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);
//     });
// });

/**
 * API Routes for version 1.
 *
 * Prefix: v1
 *
 * Routes:
 * - POST /courses: Store a new course.
 * - PUT /courses/{id}: Update a specific course.
 * - DELETE /courses/{id}: Delete a specific course.
 * - GET /courses/all: Fetch all courses.
 * - GET /courses/topRated: Fetch top-rated courses.
 * - GET /courses/popular: Fetch popular courses.
 * - GET /courses: Fetch courses by category.
 * - GET /courses/level: Fetch courses by level.
 * - GET /courses/price: Fetch courses by price.
 *
 * Controllers:
 * - CourseController: Handles all course-related actions.
 * - FilterCourseController: Handles all course filtering actions.
 */
Route::prefix('v1')->group(function () {
    Route::post('/courses', [CourseController::class, 'store']);
    Route::post('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::get('/courses/all', [FilterCourseController::class, 'byLatest']);
    Route::get('/courses/top-rated', [FilterCourseController::class, 'byTopRatedCourses']);
    Route::get('/courses/popular', [FilterCourseController::class, 'byPopularCourses']);
    Route::get('/courses/by-category', [FilterCourseController::class, 'byCategoryCourses']); // raw params to get the category id, ex http://127.0.0.1:8000/api/v1/courses/category?category_id=6,2
    Route::get('/courses/by-level', [FilterCourseController::class, 'byLevel']); // raw params to get the level, ex http://127.0.0.1:8000/api/v1/courses/level/?level=Pemula
    Route::get('/courses/by-price/', [FilterCourseController::class, 'byPrice']); // raw params to get the price, ex http://127.0.0.1:8000/api/v1/courses/price?price=paid
});


/**
 * API Routes for Category Management
 *
 * This group of routes is protected by the 'admin' middleware and is prefixed with 'v1'.
 * It provides the following endpoints for managing categories:
 *
 * - GET /v1/category: Retrieve a list of categories.
 * - POST /v1/category: Create a new category.
 * - GET /v1/category/{id}: Retrieve a specific category by its ID.
 * - PUT /v1/category/{id}: Update a specific category by its ID.
 * - DELETE /v1/category/{id}: Delete a specific category by its ID.
 *
 * All routes are handled by the CategoryController.
 */
// Route::middleware(['admin'])->group(function () {
Route::prefix('v1')->group(function () {
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
});
// });

/**
 * API Routes for Order Management
 *
 * This group of routes is prefixed with 'v1'.
 * It provides the following endpoints for managing orders:
 *
 * - POST /v1/invoice: Create a new invoice.
 * - POST /v1/callback: Handle the callback from Xendit.
 * - GET /v1/order: Retrieve a list of orders.
 *
 * All routes are handled by the OrderController.
 */
Route::post('/invoice', [OrderController::class, 'invoice']);
Route::post('/callback', [OrderController::class, 'handleCallback']);
Route::get('/order', [OrderController::class, 'index']);
Route::post('/join-webinar/{webinar_id}', [OrderController::class, 'joinWebinar']);
Route::get('/join-webinar/', function () {
    return "Join Webinar";
});


/**
 * API Routes for Bootcamp Management
 *
 * This file contains the following routes:
 *
 * - GET /bootcamps: Retrieve a list of all bootcamps.
 * - POST /bootcamp: Create a new bootcamp.
 * - GET /bootcamp/{id}: Retrieve details of a specific bootcamp by ID.
 * - PUT /bootcamp/{id}: Update an existing bootcamp by ID.
 * - DELETE /bootcamp/{id}: Delete a specific bootcamp by ID.
 * - POST /bootcamp/{id}/register: Register for a specific bootcamp by ID.
 * - GET /category/bootcamps: Retrieve bootcamps filtered by category.
 *
 * Each route is handled by the BootcampController.
 */
Route::get('/bootcamps', [BootcampController::class, 'index']);
Route::post('/bootcamp', [BootcampController::class, 'create']);
Route::get('/bootcamp/{id}', [BootcampController::class, 'show']);
Route::put('/bootcamp/{id}', [BootcampController::class, 'update']);
Route::delete('/bootcamp/{id}', [BootcampController::class, 'destroy']);
Route::post('/bootcamp/{id}/register', [BootcampController::class, 'register']);
Route::get('category/bootcamps/', [BootcampController::class, 'showByCategory']);



// TODO : Dinamis Material, Chapter, dan Subchapter 
// Menggunakan livewire state management agar lebih ringan 
Route::get('/webinar', [WebinarController::class, 'index']);
Route::get('/webinar/{id}', [WebinarController::class, 'show']);
Route::post('/webinar', [WebinarController::class, 'store']);
Route::post('/webinar/{id}', [WebinarController::class, 'update']);
Route::delete('/webinar/{id}', [WebinarController::class, 'destroy']);


Route::get('speaker', [SpeakerController::class, 'index']);
Route::get('speaker/{id}', [SpeakerController::class, 'show']);
Route::post('speaker', [SpeakerController::class, 'store']);
Route::put('speaker/{id}', [SpeakerController::class, 'update']);
Route::delete('speaker/{id}', [SpeakerController::class, 'destroy']);


Route::get('/material', [MaterialController::class, 'index']);
