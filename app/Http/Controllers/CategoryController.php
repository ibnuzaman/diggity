<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/category",
     *     operationId="getCategoriesList",
     *     tags={"Categories"},
     *     summary="Get list of categories",
     *     description="Returns list of categories",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Category Name"
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 )
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categories not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=404
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Categories not found"
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Categories not found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Category Controller',
            'categories' => $categories,
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/category/{id}",
     *     operationId="getCategoryById",
     *     tags={"Categories"},
     *     summary="Get category by ID",
     *     description="Returns a single category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="Category ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=200
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category Controller"
     *             ),
     *             @OA\Property(
     *                 property="category",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Category Name"
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=404
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category not found"
     *             )
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Category Controller',
                'category' => $category,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Category not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/v1/category",
     *     operationId="storeCategory",
     *     tags={"Categories"},
     *     summary="Create a new category",
     *     description="Stores a new category",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 example="New Category"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Category created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=201
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category created successfully"
     *             ),
     *             @OA\Property(
     *                 property="category",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="New Category"
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=422
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={"name": {"The name field is required."}}
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:categories',
            ]);

            $category = new Category();
            $category->name = $validatedData['name'];
            $category->save();

            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Category created successfully',
                'category' => $category,
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    /**
     * @OA\Put(
     *     path="/api/v1/category/{id}",
     *     operationId="updateCategory",
     *     tags={"Categories"},
     *     summary="Update an existing category",
     *     description="Updates a category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="Category ID"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 example="Updated Category"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=200
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category updated successfully"
     *             ),
     *             @OA\Property(
     *                 property="category",
     *                 type="object",
     *                 @OA\Property(
     *                     property="id",
     *                     type="integer",
     *                     example=1
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     example="Updated Category"
     *                 ),
     *                 @OA\Property(
     *                     property="created_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 ),
     *                 @OA\Property(
     *                     property="updated_at",
     *                     type="string",
     *                     format="date-time",
     *                     example="2023-01-01T00:00:00.000000Z"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=404
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category not found"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=422
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 example={"name": {"The name field is required."}}
     *             )
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255|unique:categories,name,' . $id,
            ]);

            $category = Category::findOrFail($id);
            $category->name = $validatedData['name'];
            $category->save();

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Category updated successfully',
                'category' => $category,
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Category not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/category/{id}",
     *     operationId="deleteCategory",
     *     tags={"Categories"},
     *     summary="Delete a category",
     *     description="Deletes a category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         ),
     *         description="Category ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=200
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category deleted successfully"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category not found",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=404
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="Category not found"
     *             )
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Category deleted successfully',
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Category not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
