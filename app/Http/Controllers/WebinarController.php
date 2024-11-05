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
            $query = Webinar::select('id', 'title', 'description', 'discounted_price', 'final_price', 'webinar_date');

            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
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
                'image' => 'nullable|string',
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

            $webinar = new Webinar();
            $webinar->title = $validateData['title'];
            $webinar->image = $validateData['image'] ?? null;
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

            $webinar->speakers()->create([
                'speaker_name' => $validateData['speaker_name'],
                'speaker_job' => $validateData['speaker_job'] ?? null,
                'speaker_summary' => $validateData['speaker_summary'] ?? null,
                'speaker_image' => $validateData['speaker_image'] ?? null,
                'speaker_description' => $validateData['speaker_description'] ?? null,
                'company_speaker' => $validateData['company_speaker'] ?? null,
            ]);

            foreach ($validateData['materials'] as $material) {
                $newMaterial = new Material([
                    'material_name' => $material['material_name'],
                ]);
                $webinar->materials()->save($newMaterial);
                if (count($material['sub_materials']) != $validateData['sub_material_count']) {
                    return response()->json([
                        'message' => 'Jumlah sub material harus ' . $validateData['sub_material_count'],
                        'status' => 'Failed',
                        'data' => null,
                    ], Response::HTTP_BAD_REQUEST);
                }

                foreach ($material['sub_materials'] as $subMaterial) {
                    $newSubMaterial = new SubMaterials([
                        'sub_material_name' => $subMaterial['sub_material_name'],
                        'sub_material_order' => $subMaterial['sub_material_order'],
                    ]);
                    $newMaterial->subMaterials()->save($newSubMaterial);
                }
            }

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
            $validateData = $request->validate([
                'title' => 'required|string',
                'image' => 'nullable|string',
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
                    'message' => 'Material count does not match the number of materials provided',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_BAD_REQUEST);
            }

            $webinar = Webinar::find($id);
            if (!$webinar) {
                return response()->json([
                    'message' => 'Data not found',
                    'status' => 'Failed',
                    'data' => null,
                ], Response::HTTP_NOT_FOUND);
            }

            $webinar->title = $validateData['title'];
            $webinar->image = $validateData['image'] ?? null;
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

            $webinar->speakers()->updateOrCreate(
                ['webinar_id' => $webinar->id],
                [
                    'speaker_name' => $validateData['speaker_name'],
                    'speaker_job' => $validateData['speaker_job'] ?? null,
                    'speaker_summary' => $validateData['speaker_summary'] ?? null,
                    'speaker_image' => $validateData['speaker_image'] ?? null,
                    'speaker_description' => $validateData['speaker_description'] ?? null,
                    'company_speaker' => $validateData['company_speaker'] ?? null,
                ]
            );

            $webinar->materials()->delete();
            foreach ($validateData['materials'] as $material) {
                $newMaterial = new Material([
                    'material_name' => $material['material_name'],
                ]);
                $webinar->materials()->save($newMaterial);
                if (count($material['sub_materials']) != $validateData['sub_material_count']) {
                    return response()->json([
                        'message' => 'Sub material count does not match the number of sub materials provided',
                        'status' => 'Failed',
                        'data' => null,
                    ], Response::HTTP_BAD_REQUEST);
                }

                foreach ($material['sub_materials'] as $subMaterial) {
                    $newSubMaterial = new SubMaterials([
                        'sub_material_name' => $subMaterial['sub_material_name'],
                        'sub_material_order' => $subMaterial['sub_material_order'],
                    ]);
                    $newMaterial->subMaterials()->save($newSubMaterial);
                }
            }

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
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => Response::HTTP_BAD_REQUEST,
                'status' => 'Failed',
                'data' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
