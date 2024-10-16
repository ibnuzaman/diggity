<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use Symfony\Component\HttpFoundation\Response;

class WebinarController extends Controller
{
    public function index()
    {
        $data = Webinar::latest()->paginate(6);
        return response()->json([
            'message' => 'Welcome to the Webinar API',
            'status' => 'Connected',
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = Webinar::find($id);
        return response()->json([
            'message' => 'Welcome to the Webinar API',
            'status' => 'Connected',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        try {

            $validateData = $request->validate([
                'title' => 'required|string',
                'link_image' => 'required|string',
                'webinar_date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'meeting_room' => 'required|string',
                'starting_price' => 'required|numeric',
                'discounted_price' => 'required|numeric',
                'final_price' => 'nullable|numeric',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
            ]);                                  
            
            $webinar = new Webinar();
            $webinar->title = $validateData['title'];
            $webinar->link_image = $validateData['link_image'];
            $webinar->webinar_date = $validateData['webinar_date'];
            $webinar->start_time = $validateData['start_time'];
            $webinar->end_time = $validateData['end_time'];
            $webinar->meeting_room = $validateData['meeting_room'];
            $webinar->starting_price = $validateData['starting_price'];
            $webinar->discounted_price = $validateData['discounted_price'];
            $webinar->final_price = $validateData['final_price'];
            $webinar->description = $validateData['description'];
            $webinar->category_id = $validateData['category_id'];
            $webinar->save();

            if ($webinar->discounted_price > 0) {
                $webinar->final_price = $webinar->starting_price - $webinar->discounted_price;
                $webinar->save();
            } else {
                $webinar->final_price = $webinar->starting_price;
                $webinar->save();
            }

            return response()->json([
                'message' => Response::HTTP_CREATED,
                'status' => 'Connected',
                'data' => $webinar,
            ],Response::HTTP_CREATED);

        }catch (\Exception $e) {
            return response()->json([
                'message' => Response::HTTP_BAD_REQUEST,
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $webinar = Webinar::find($id);
            if ($webinar) {
                $validateData = $request->validate([
                    'title' => 'required|string',
                    'link_image' => 'required|string',
                    'webinar_date' => 'required|date',
                    'start_time' => 'required|date_format:H:i',
                    'end_time' => 'required|date_format:H:i',
                    'meeting_room' => 'required|string',
                    'starting_price' => 'required|numeric',
                    'discounted_price' => 'required|numeric',
                    'final_price' => 'nullable|numeric',
                    'description' => 'required|string',
                    'category_id' => 'required|exists:categories,id',
                ]);

                $webinar->title = $validateData['title'];
                $webinar->link_image = $validateData['link_image'];
                $webinar->webinar_date = $validateData['webinar_date'];
                $webinar->start_time = $validateData['start_time'];
                $webinar->end_time = $validateData['end_time'];
                $webinar->meeting_room = $validateData['meeting_room'];
                $webinar->starting_price = $validateData['starting_price'];
                $webinar->discounted_price = $validateData['discounted_price'];
                $webinar->final_price = $validateData['final_price'];
                $webinar->description = $validateData['description'];
                $webinar->category_id = $validateData['category_id'];
                $webinar->save();

                if ($webinar->discounted_price > 0) {
                    $webinar->final_price = $webinar->starting_price - $webinar->discounted_price;
                    $webinar->save();
                } else {
                    $webinar->final_price = $webinar->starting_price;
                    $webinar->save();
                }

                return response()->json([
                    'message' => Response::HTTP_OK,
                    'status' => 'Connected',
                    'data' => $webinar,
                ],Response::HTTP_OK);
            } else {
                return response()->json([
                    'message' => Response::HTTP_NOT_FOUND,
                    'status' => 'Failed',
                    'data' => 'Data not found',
                ], Response::HTTP_NOT_FOUND);
            }
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => Response::HTTP_BAD_REQUEST,
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($id)
    {
        try {
            $webinar = Webinar::find($id);
            if (!$webinar) {
                return response()->json([
                    'message' => Response::HTTP_NOT_FOUND,
                    'status' => 'Failed',
                    'data' => 'Data not found',
                ], Response::HTTP_NOT_FOUND);

            } 
            $webinar->delete();
            return response()->json([
                'message' => Response::HTTP_OK,
                'status' => 'Connected',
                'data' => 'Data deleted successfully',
            ],Response::HTTP_OK);                       
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => Response::HTTP_BAD_REQUEST,
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

}
