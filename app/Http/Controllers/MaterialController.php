<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index(){
        try{
            $data = Material::latest()->paginate(6);

            if ($data->isEmpty()) {
                return response()->json([
                    'message' => 'No Material found',
                    'status' => 'Not Found',
                ], Response::HTTP_NOT_FOUND);
            }
            
            return response()->json([
                'message' => 'Welcome to the Material API',
                'status' => 'Connected',
                'data' => $data,
            ], Response::HTTP_OK);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Failed to connect to the Material API',
                'status' => 'Not Connected',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }  
    }

    
}
