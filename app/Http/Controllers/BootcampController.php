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
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'in Bootcamp',
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
}
