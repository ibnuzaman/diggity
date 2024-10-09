<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Str;



class CourseController extends Controller
{
   /**
 * @OA\Post(
 *     path="/api/v1/courses",
 *     summary="Create a new course",
 *     tags={"Courses"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 required={"name", "image", "starting_price", "level"},
 *                 @OA\Property(property="name", type="string", example="Introduction to Programming"),
 *                 @OA\Property(property="image", type="string", format="binary", description="Image file"),
 *                 @OA\Property(property="discounted_price", type="number", format="float", example=50.00),
 *                 @OA\Property(property="starting_price", type="number", format="float", example=100.00),
 *                 @OA\Property(property="final_price", type="number", format="float", example=50.00),
 *                 @OA\Property(property="level", type="string", enum={"Pemula", "Menengah", "Ahli"}, example="Pemula")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Course created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=201),
 *             @OA\Property(property="message", type="string", example="Course created successfully"),
 *             @OA\Property(property="course", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="Introduction to Programming"),
 *                 @OA\Property(property="image", type="string", example="courses/image.jpg"),
 *                 @OA\Property(property="starting_price", type="number", format="float", example=100.00),
 *                 @OA\Property(property="discounted_price", type="number", format="float", example=50.00),
 *                 @OA\Property(property="final_price", type="number", format="float", example=50.00),
 *                 @OA\Property(property="level", type="string", example="Pemula"),
 *                 @OA\Property(property="created_at", type="string", format="date-time", example="2023-10-01T12:00:00Z"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2023-10-01T12:00:00Z")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="integer", example=422),
 *             @OA\Property(property="errors", type="object", example={"name": {"The name field is required."}})
 *         )
 *     )
 * )
 */

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
                'status' => Response::HTTP_CREATED,
                'message' => 'Course created successfully',
                'course' => $course,
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/courses/{id}",
     *     summary="Update an existing course",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the course to update",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\MediaType(
    *             mediaType="multipart/form-data",
    *             @OA\Schema(
    *                 required={"name", "image", "starting_price", "level"},
    *                 @OA\Property(property="name", type="string", example="Advanced PHP Course"),
    *                 @OA\Property(property="image", type="string", format="binary"),
    *                 @OA\Property(property="discounted_price", type="number", format="float", example=50.00),
    *                 @OA\Property(property="starting_price", type="number", format="float", example=100.00),
    *                 @OA\Property(property="final_price", type="number", format="float", example=50.00),
    *                 @OA\Property(property="level", type="string", enum={"Pemula", "Menengah", "Ahli"}, example="Menengah")
    *             )
    *         )
    *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Course updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Course updated successfully"),
     *             @OA\Property(property="course", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Advanced PHP Course"),
     *                 @OA\Property(property="image", type="string", example="courses/advanced-php-course.jpg"),
     *                 @OA\Property(property="slug", type="string", example="advanced-php-course"),
     *                 @OA\Property(property="starting_price", type="number", format="float", example=100.00),
     *                 @OA\Property(property="discounted_price", type="number", format="float", example=50.00),
     *                 @OA\Property(property="final_price", type="number", format="float", example=50.00),
     *                 @OA\Property(property="level", type="string", example="Menengah")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=422),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Course not found")
     *         )
     *     )
     * )
     */
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
                'status' => Response::HTTP_OK,
                'message' => 'Course updated successfully',
                'course' => $course,
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Course not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/courses/{id}",
     *     summary="Delete a course",
     *     description="Deletes a course by its ID",
     *     operationId="deleteCourse",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the course to delete",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Course deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Course deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Course not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Course not found")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Course deleted successfully',
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Course not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
