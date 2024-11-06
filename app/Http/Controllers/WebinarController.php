<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Material;
use App\Models\SubMaterials;

class WebinarController extends Controller
{

    public function index(Request $request)
    {
        try {
            $query = Webinar::select('id', 'image', 'title', 'description', 'starting_price', 'final_price', 'webinar_date');

            if ($request->has('category_id')) {
                $categoryIds = explode(',', $request->category_id);
                $query->whereIn('category_id', $categoryIds);
            }

            $data = $query->latest()->paginate(6);

            if ($data->isEmpty()) {
                return response()->json([
                    'message' => 'Data not found',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'message' => 'Welcome to the Webinar API',
                'status' => 'Connected',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get data',
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show($id)
    {
        try {
            $webinar = Webinar::with(['materials.SubMaterials', 'speakers'])->find($id);
            if ($webinar) {
                return response()->json([
                    'title' => $webinar->title,
                    'status' => 'Connected',
                    'data' => $webinar,
                ]);
            } else {
                return response()->json([
                    'message' => 'Data not found',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get data',
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }



    public function store(Request $request)
    {

        try {
            $validateData = $request->validate([
                'title' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'webinar_date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'meeting_room' => 'required|string',
                'starting_price' => 'required|numeric',
                'discounted_price' => 'nullable|numeric',
                'final_price' => 'nullable|numeric',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'materials' => 'required|array',
                'materials.*.material_name' => 'required|string',
                'materials.*.sub_material_count' => 'required|integer',
                'materials.*.sub_materials' => 'required|array',
                'materials.*.sub_materials.*.sub_material_name' => 'required|string',
                'materials.*.sub_materials.*.sub_material_order' => 'required|integer',
                'speaker_name' => 'required|string',
                'speaker_job' => 'required|string',
                'speaker_image' => 'nullable|string',
                'speaker_summary' => 'required|string',
                'company_speaker' => 'nullable|string',
            ]);

            foreach ($validateData['materials'] as $material) {
                if (count($material['sub_materials']) != $material['sub_material_count']) {
                    return response()->json([
                        'message' => 'Jumlah sub material untuk ' . $material['material_name'] . ' harus ' . $material['sub_material_count'],
                        'status' => 'Failed',
                        'data' => null,
                    ], Response::HTTP_BAD_REQUEST);
                }
            }

            $webinar = new Webinar();
            $webinar->title = $validateData['title'];
            $webinar->image = $request->file('image')->store('webinars', 'public') ?? null;
            $webinar->webinar_date = $validateData['webinar_date'];
            $webinar->start_time = $validateData['start_time'];
            $webinar->end_time = $validateData['end_time'];
            $webinar->meeting_room = $validateData['meeting_room'];
            $webinar->starting_price = $validateData['starting_price'];
            $webinar->discounted_price = $validateData['discounted_price'] ?? null;
            $webinar->final_price = $validateData['discounted_price'] ? $validateData['starting_price'] - $validateData['discounted_price'] : $validateData['starting_price'];
            $webinar->description = $validateData['description'];
            $webinar->category_id = $validateData['category_id'];
            $webinar->save();

            foreach ($validateData['materials'] as $material) {
                $newMaterial = new Material([
                    'material_name' => $material['material_name'],
                ]);
                $webinar->materials()->save($newMaterial);

                foreach ($material['sub_materials'] as $subMaterial) {
                    $newSubMaterial = new SubMaterials([
                        'sub_material_count' => $material['sub_material_count'],
                        'sub_material_name' => $subMaterial['sub_material_name'],
                        'sub_material_order' => $subMaterial['sub_material_order'],
                    ]);
                    $newMaterial->subMaterials()->save($newSubMaterial);
                }
            }

            $webinar->speakers()->create([
                'speaker_name' => $validateData['speaker_name'],
                'speaker_job' => $validateData['speaker_job'] ?? null,
                'speaker_summary' => $validateData['speaker_summary'] ?? null,
                'speaker_image' => $validateData['speaker_image'] ?? null,
                'speaker_description' => $validateData['speaker_description'] ?? null,
                'company_speaker' => $validateData['company_speaker'] ?? null,
            ]);

            return response()->json([
                'message' => 'Webinar created successfully',
                'status' => 'Connected',
                'data' => $webinar,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create webinar',
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $webinar = Webinar::find($id);
            if (!$webinar) {
                return response()->json([
                    'message' => 'Data not found',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_NOT_FOUND);
            }

            $validateData = $request->validate([
                'title' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'webinar_date' => 'required|date',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'meeting_room' => 'required|string',
                'starting_price' => 'required|numeric',
                'discounted_price' => 'nullable|numeric',
                'final_price' => 'nullable|numeric',
                'description' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'material_count' => 'required|integer',
                'sub_material_count' => 'required|integer',
                'materials' => 'required|array',
                'materials.*.material_name' => 'required|string',
                'materials.*.sub_materials' => 'required|array',
                'materials.*.sub_materials.*.sub_material_name' => 'required|string',
                'materials.*.sub_materials.*.sub_material_order' => 'required|integer',
                'speaker_name' => 'required|string',
                'speaker_job' => 'required|string',
                'speaker_image' => 'nullable|string',
                'speaker_summary' => 'required|string',
                'company_speaker' => 'nullable|string',
            ]);

            if (count($validateData['materials']) != $validateData['material_count']) {
                return response()->json([
                    'message' => 'Jumlah materi harus ' . $validateData['material_count'],
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_BAD_REQUEST);
            }

            foreach ($validateData['materials'] as $material) {
                if (count($material['sub_materials']) != $validateData['sub_material_count']) {
                    return response()->json([
                        'message' => 'Jumlah sub material harus ' . $validateData['sub_material_count'],
                        'status' => 'Failed',
                        'data' => null,
                    ], Response::HTTP_BAD_REQUEST);
                }
            }



            $webinar->title = $validateData['title'];
            if ($request->hasFile('image')) {
                $webinar->image = $request->file('image')->store('webinars', 'public');
            }
            $webinar->webinar_date = $validateData['webinar_date'];
            $webinar->start_time = $validateData['start_time'];
            $webinar->end_time = $validateData['end_time'];
            $webinar->meeting_room = $validateData['meeting_room'];
            $webinar->starting_price = $validateData['starting_price'];
            $webinar->discounted_price = $validateData['discounted_price'] ?? null;
            $webinar->final_price = $validateData['discounted_price'] ? $validateData['starting_price'] - $validateData['discounted_price'] : $validateData['starting_price'];
            $webinar->description = $validateData['description'];
            $webinar->category_id = $validateData['category_id'];
            // dd($webinar);   
            $webinar->save();

            foreach ($webinar->materials as $material) {
                $material->subMaterials()->delete();
            }
            $webinar->materials()->delete();

            foreach ($validateData['materials'] as $material) {
                $newMaterial = new Material([
                    'material_name' => $material['material_name'],
                ]);
                $webinar->materials()->save($newMaterial);

                foreach ($material['sub_materials'] as $subMaterial) {
                    $newSubMaterial = new SubMaterials([
                        'sub_material_count' => $validateData['sub_material_count'],
                        'sub_material_name' => $subMaterial['sub_material_name'],
                        'sub_material_order' => $subMaterial['sub_material_order'],
                    ]);
                    $newMaterial->subMaterials()->save($newSubMaterial);
                }
            }

            $webinar->speakers()->delete();
            $webinar->speakers()->create([
                'speaker_name' => $validateData['speaker_name'],
                'speaker_job' => $validateData['speaker_job'] ?? null,
                'speaker_summary' => $validateData['speaker_summary'] ?? null,
                'speaker_image' => $validateData['speaker_image'] ?? null,
                'speaker_description' => $validateData['speaker_description'] ?? null,
                'company_speaker' => $validateData['company_speaker'] ?? null,
            ]);
            // dd($webinar);

            return response()->json([
                'message' => 'Webinar updated successfully',
                'status' => 'Connected',
                'data' => $webinar,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update webinar',
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
                    'message' => 'Data not found',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_NOT_FOUND);
            }

            $orderDetailsCount = $webinar->orderDetails()->count();
            if ($orderDetailsCount > 0) {
                $webinar->orderDetails()->delete();
            }


            $webinar->speakers()->delete();


            foreach ($webinar->materials as $material) {
                $material->subMaterials()->delete();
                $material->delete();
            }


            $webinar->delete();

            return response()->json([
                'message' => 'Data deleted successfully',
                'status' => 'Connected',
                'data' => null,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete webinar',
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
