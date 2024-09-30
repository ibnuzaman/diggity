<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

use function Laravel\Prompts\select;

class FilterCourseController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Course::latest()->with(['reviews'])->paginate(3),
        ]);
    }

    public function byLatest()
    {
        return response()->json([
            'data' => Course::latest()->with(['reviews'])->paginate(6),
        ]);
    }

    public function byTopRatedCourses()
    {
        return response()->json([
            'data' => Course::with(['reviews' => function ($query) {
                $query->orderBy('rating', 'desc');
            }])->paginate(6),
        ]);
    }

    public function byRetrievePopularCourses()
    {
        return response()->json([
            $data = DB::table('subscribers')
                ->select('course_id', DB::raw('count(*) as total_subscribers'))
                ->groupBy('course_id')
                ->orderBy('total_subscribers', 'desc')
                ->get(),
            'data' => Course::whereIn('id', $data->pluck('course_id'))->paginate(6),
        ]);
    }

    public function byCategoryCourses(Request $request)
    {
        $categoryId = $request->query('category_id');
        // dd($categoryId);
        $categoryIdsArray = explode(',', $categoryId);
        return response()->json([
            'data' => DB::table('courses')
                ->join('course_categories', 'courses.id', '=', 'course_categories.course_id')
                ->join('categories', 'course_categories.category_id', '=', 'categories.id')
                ->whereIn('course_categories.category_id', $categoryIdsArray)
                ->select('courses.*', 'categories.name as category_name')
                ->get(),
        ]);
    }

    public function byLevel(Request $request)
    {
        $level = $request->query('level');
        return response()->json([
            'data' => Course::where('level', $level)->paginate(6),
        ]);
    }

    public function byPrice(Request $request)
    {
        $price = $request->query('price');
        if ($price == 'free') {
            return response()->json([
                'data' => Course::where('price', $price)->paginate(6),
            ]);
        }
        if ($price == 'paid') {
            return response()->json([
                'data' => Course::where('price', '>', 0)->paginate(6),
            ]);
        }
    }
}
