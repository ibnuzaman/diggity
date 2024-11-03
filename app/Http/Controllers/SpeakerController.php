<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use Symfony\Component\HttpFoundation\Response;

class SpeakerController extends Controller
{    
    public function index()
    {
        try{
            $data = Speaker::latest()->paginate(6);

            if ($data->isEmpty()) {
                return response()->json([
                    'message' => 'No Speaker found',
                    'status' => 'Not Found',
                ], Response::HTTP_NOT_FOUND);
            }
            
            return response()->json([
                'message' => 'Welcome to the Speaker API',
                'status' => 'Connected',
                'data' => $data,
            ], Response::HTTP_OK);


        }catch (\Exception $e){
            return response()->json([
                'message' => 'Failed to connect to the Speaker API',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try{
            $data = Speaker::find($id);

            if (!$data) {
                return response()->json([
                    'message' => 'No Speaker found',
                    'status' => 'Not Found',
                ], Response::HTTP_NOT_FOUND);
            }
            
            return response()->json([
                'message' => 'Welcome to the Speaker API',
                'status' => 'Connected',
                'data' => $data,
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Failed to connect to the Speaker API',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([                
                'speaker_name' => 'required|string',
                'speaker_job' => 'required|string',
                'speaker_summary' => 'required|string',
                'company_speaker' => 'required|string',
                'speaker_image' => 'required|string',
                'webinar_id' => 'required|uuid|exists:webinars,id',
            ]);

            $data = new Speaker();
            $data->speaker_name = $request->speaker_name;
            $data->speaker_job = $request->speaker_job;
            $data->speaker_summary = $request->speaker_summary;
            $data->company_speaker = $request->company_speaker;
            $data->speaker_image = $request->speaker_image;
            $data->webinar_id = $request->webinar_id;            
            $data->save();

            return response()->json([
                'message' => 'Speaker created successfully',
                'status' => 'Connected',
                'data' => $data,
            ], Response::HTTP_CREATED);              
        }       
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Speaker',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([                
                'speaker_name' => 'required|string',
                'speaker_job' => 'required|string',
                'speaker_summary' => 'required|string',
                'company_speaker' => 'required|string',
                'speaker_image' => 'required|string',
                'webinar_id' => 'required|uuid|exists:webinars,id',
            ]);

            $data = Speaker::find($id);
            $data->speaker_name = $request->speaker_name;
            $data->speaker_job = $request->speaker_job;
            $data->speaker_summary = $request->speaker_summary;
            $data->company_speaker = $request->company_speaker;
            $data->speaker_image = $request->speaker_image;
            $data->webinar_id = $request->webinar_id;            
            $data->save();

            return response()->json([
                'message' => 'Speaker updated successfully',
                'status' => 'Connected',
                'data' => $data,
            ], Response::HTTP_OK);              
        }       
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Speaker',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }

    public function destroy($id)
    {
        try {
            $data = Speaker::find($id);    
            
            if(!$data){
                return response()->json([
                    'message' => 'No Speaker found',
                    'status' => 'Not Found',
                ], Response::HTTP_NOT_FOUND);
            }

            $data->delete();

            return response()->json([
                'message' => 'Speaker deleted successfully',
                'status' => 'Connected',
            ], Response::HTTP_OK);              
        }       
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Speaker',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }
}
