<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $date = now()->format('Y-m-d');

        $dailyVisitors = Traffic::whereDate('created_at', $date)
            ->sum('visits');

        dd($dailyVisitors);

        return view('visitors', compact('dailyVisitors'));
    }
}
