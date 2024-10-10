<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bootcamps",
     *     summary="Get list of bootcamps",
     *     tags={"Bootcamps"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Bootcamps"),
     *             @OA\Property(property="data", type="array", @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *                 @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *                 @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *                 @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *                 @OA\Property(property="available_seats", type="integer", example=20),
     *                 @OA\Property(property="category_id", type="integer", example=1)
     *             ))
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No bootcamps found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="No bootcamps found")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $bootcamps = Bootcamp::paginate(6);

        if ($bootcamps->isEmpty()) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'No bootcamps found',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Bootcamps',
            'data' => $bootcamps
        ]);
    }


    /**
     * @OA\Get(
     *     path="/api/category/bootcamps/",
     *     summary="Get list of bootcamps by category",
     *     tags={"Bootcamps"},
     *     @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="Category ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Bootcamps"),
     *             @OA\Property(property="data", type="array", @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *                 @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *                 @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *                 @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *                 @OA\Property(property="available_seats", type="integer", example=20),
     *                 @OA\Property(property="category_id", type="integer", example=1)
     *             ))
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Category ID is required",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Category ID is required")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No bootcamps found for this category",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="No bootcamps found for this category")
     *         )
     *     )
     * )
     */
    public function showByCategory(Request $request): JsonResponse
    {

        $categoryId = $request->query('category_id');

        if (!$categoryId) {
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'Category ID is required',
            ], Response::HTTP_BAD_REQUEST);
        }

        $bootcamps = Bootcamp::where('category_id', $categoryId)->paginate(6);

        if ($bootcamps->isEmpty()) {
            return response()->json([
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'No bootcamps found for this category',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Bootcamps',
            'data' => $bootcamps
        ]);
    }


    /**
     * @OA\Post(
     *     path="/api/bootcamp",
     *     summary="Create a new bootcamp",
     *     tags={"Bootcamps"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *             @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *             @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *             @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *             @OA\Property(property="available_seats", type="integer", example=20),
     *             @OA\Property(property="category_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Bootcamp created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=201),
     *             @OA\Property(property="message", type="string", example="Bootcamp created successfully"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *                 @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *                 @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *                 @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *                 @OA\Property(property="available_seats", type="integer", example=20),
     *                 @OA\Property(property="category_id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=400),
     *             @OA\Property(property="message", type="string", example="Validation error")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to create bootcamp",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to create bootcamp")
     *         )
     *     )
     * )
     */
    public function create(Request $request)
    {

        try {
            $validateData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'bootcamp_date' => 'required|date',
                'bootcamp_level' => 'required|in:Pemula,Menengah,Ahli',
                'available_seats' => 'required|integer',
                'category_id' => 'required|integer'
            ]);

            $bootcamp = new Bootcamp();
            $bootcamp->name = $validateData['name'];
            $bootcamp->description = $validateData['description'];
            $bootcamp->bootcamp_date = $validateData['bootcamp_date'];
            $bootcamp->bootcamp_level = $validateData['bootcamp_level'];
            $bootcamp->available_seats = $validateData['available_seats'];
            $bootcamp->category_id = $validateData['category_id'];
            $bootcamp->save();

            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Bootcamp created successfully',
                'data' => $bootcamp
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to create bootcamp',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/bootcamp/{id}",
     *     summary="Get bootcamp by ID",
     *     tags={"Bootcamps"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid"),
     *         description="Bootcamp ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Bootcamp"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="string", example="9d3545c8-2ecf-4986-8362-11e34ab0f720"),
     *                 @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *                 @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *                 @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *                 @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *                 @OA\Property(property="available_seats", type="integer", example=20),
     *                 @OA\Property(property="category_id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Bootcamp not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Bootcamp not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to retrieve bootcamp",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to retrieve bootcamp")
     *         )
     *     )
     * )
     */
    public function show($id)
    {

        try {
            $bootcamp = Bootcamp::find($id);

            if (!$bootcamp) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Bootcamp not found',
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Bootcamp',
                'data' => $bootcamp
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to retrieve bootcamp',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/bootcamp/{id}",
     *     summary="Update a bootcamp",
     *     tags={"Bootcamps"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid"),
     *         description="Bootcamp ID"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *             @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *             @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *             @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *             @OA\Property(property="available_seats", type="integer", example=20),
     *             @OA\Property(property="category_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Bootcamp updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Bootcamp updated successfully"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="string", example="9d3545c8-2ecf-4986-8362-11e34ab0f720"),
     *                 @OA\Property(property="name", type="string", example="Bootcamp Name"),
     *                 @OA\Property(property="description", type="string", example="Bootcamp Description"),
     *                 @OA\Property(property="bootcamp_date", type="string", format="date", example="2023-10-01"),
     *                 @OA\Property(property="bootcamp_level", type="string", example="Pemula"),
     *                 @OA\Property(property="available_seats", type="integer", example=20),
     *                 @OA\Property(property="category_id", type="integer", example=1)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Bootcamp not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Bootcamp not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to update bootcamp",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to update bootcamp")
     *         )
     *     )
     * )
     */
    public function update(Request $request, $id)
    {

        try {
            $bootcamp = Bootcamp::find($id);

            if (!$bootcamp) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Bootcamp not found',
                ], Response::HTTP_NOT_FOUND);
            }

            $validateData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'bootcamp_date' => 'required|date',
                'bootcamp_level' => 'required|in:Pemula,Menengah,Ahli',
                'available_seats' => 'required|integer',
                'category_id' => 'required|integer'
            ]);

            $bootcamp->name = $validateData['name'];
            $bootcamp->description = $validateData['description'];
            $bootcamp->bootcamp_date = $validateData['bootcamp_date'];
            $bootcamp->bootcamp_level = $validateData['bootcamp_level'];
            $bootcamp->available_seats = $validateData['available_seats'];
            $bootcamp->category_id = $validateData['category_id'];
            $bootcamp->save();

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Bootcamp updated successfully',
                'data' => $bootcamp
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to update bootcamp',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/bootcamp/{id}",
     *     summary="Delete a bootcamp",
     *     tags={"Bootcamps"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="Bootcamp ID"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Bootcamp deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Bootcamp deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Bootcamp not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Bootcamp not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to delete bootcamp",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to delete bootcamp")
     *         )
     *     )
     * )
     */
    public function destroy($id)
    {

        try {
            $bootcamp = Bootcamp::find($id);

            if (!$bootcamp) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Bootcamp not found',
                ], Response::HTTP_NOT_FOUND);
            }

            $bootcamp->delete();

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Bootcamp deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to delete bootcamp',
                'data' => $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/bootcamp/{id}/register",
     *     summary="Register for a bootcamp",
     *     tags={"Bootcamps"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string", format="uuid"),
     *         description="Bootcamp ID"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", example="John Doe"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="phone", type="string", example="1234567890")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Redirecting to WhatsApp",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=200),
     *             @OA\Property(property="message", type="string", example="Redirecting to WhatsApp"),
     *             @OA\Property(property="whatsapp_url", type="string", example="https://wa.me/6287843052780?text=...")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Bootcamp not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=404),
     *             @OA\Property(property="message", type="string", example="Bootcamp not found")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Failed to process order",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer", example=500),
     *             @OA\Property(property="message", type="string", example="Failed to process order")
     *         )
     *     )
     * )
     */
    public function register(Request $request, $id)
    {
        try {
            $bootcamp = Bootcamp::find($id);

            if (!$bootcamp) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'message' => 'Bootcamp not found',
                ], Response::HTTP_NOT_FOUND);
            }

            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);

            $message = "Pesanan Bootcamp " . $bootcamp->name . ".\n\n" .
                "Name: " . $validateData['name'] . "\n" .
                "Email: " . $validateData['email'] . "\n" .
                "Phone: " . $validateData['phone'];

            $whatsappUrl = "https://wa.me/6287843052780?text=" . urlencode($message);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Redirecting to WhatsApp',
                'whatsapp_url' => $whatsappUrl
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Failed to process order',
                'data' => $e->getMessage()
            ]);
        }
    }
}
