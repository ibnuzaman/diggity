<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Category Controller',
            'categories' => $categories,
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Category Controller',
            'category' => $category,
        ], Response::HTTP_OK);
    }

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
