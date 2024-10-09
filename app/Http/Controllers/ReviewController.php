<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class ReviewController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/v1/reviews",
     *     summary="Get list of reviews",
     *     tags={"Reviews"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="course_id", type="integer", example=1),
     *                     @OA\Property(property="review", type="string", example="This is a great course!"),
     *                     @OA\Property(property="rating", type="integer", example=5),
     *                     @OA\Property(property="user_id", type="integer", example=1),
     *                     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $cekData = Review::all();
        if ($cekData->isEmpty()) {
            return response()->json([
                'message' => 'No reviews found',
            ]);
        }
        return response()->json([
            'data' => Review::paginate(4),
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/reviews/latest",
     *     summary="Get latest reviews",
     *     tags={"Reviews"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="course_id", type="integer", example=1),
     *                     @OA\Property(property="review", type="string", example="This is a great course!"),
     *                     @OA\Property(property="rating", type="integer", example=5),
     *                     @OA\Property(property="user_id", type="integer", example=1),
     *                     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function latest()
    {
        $cekLatest = Review::latest()->paginate(4);
        if ($cekLatest->isEmpty()) {
            return response()->json([
                'message' => 'No reviews found',
            ]);
        }

        return response()->json([
            'data' => Review::latest()->paginate(4),
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/reviews/higher-rating",
     *     summary="Get reviews with higher ratings",
     *     tags={"Reviews"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="course_id", type="integer", example=1),
     *                     @OA\Property(property="review", type="string", example="This is a great course!"),
     *                     @OA\Property(property="rating", type="integer", example=5),
     *                     @OA\Property(property="user_id", type="integer", example=1),
     *                     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function higherRating()
    {

        $cekRating = Review::where('rating', '>', 3)->paginate(4);
        if ($cekRating->isEmpty()) {
            return response()->json([
                'message' => 'No reviews found',
            ]);
        }

        return response()->json([
            'data' => Review::where('rating', '>', 3)->paginate(4),
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/reviews/lower-rating",
     *     summary="Get reviews with lower ratings",
     *     tags={"Reviews"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="course_id", type="integer", example=1),
     *                     @OA\Property(property="review", type="string", example="This course needs improvement."),
     *                     @OA\Property(property="rating", type="integer", example=2),
     *                     @OA\Property(property="user_id", type="integer", example=1),
     *                     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *                     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function lowerRating()
    {
        $cekRating = Review::where('rating', '<', 3)->paginate(4);
        if ($cekRating->isEmpty()) {
            return response()->json([
                'message' => 'No reviews found',
            ]);
        }

        return response()->json([
            'data' => Review::where('rating', '<', 3)->paginate(4),
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/reviews/{course_id}",
     *     summary="Create a new review",
     *     tags={"Reviews"},
     *     @OA\Parameter(
     *         name="course_id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"review","rating","user_id"},
     *             @OA\Property(property="review", type="string", example="This is a great course!"),
     *             @OA\Property(property="rating", type="integer", example=5),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Review created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Review created successfully"),
     *             @OA\Property(property="review", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="course_id", type="integer", example=1),
     *                 @OA\Property(property="review", type="string", example="This is a great course!"),
     *                 @OA\Property(property="rating", type="integer", example=5),
     *                 @OA\Property(property="user_id", type="integer", example=1),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=422),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request, $course_id)
    {
        try {
            $validatedData = $request->validate([
                'review' => 'required|string',
                'rating' => 'required|integer|between:1,5',
                'user_id' => 'required|integer',
            ]);

            $review = new Review();
            $review->course_id = $course_id;
            $review->review = $validatedData['review'];
            $review->rating = $validatedData['rating'];
            $review->user_id = 1; // test user_id
            // $review->user_id = User::find($validatedData['user_id'])->id;

            $review->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Review created successfully',
                'review' => $review,
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
