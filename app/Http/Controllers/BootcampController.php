<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
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
