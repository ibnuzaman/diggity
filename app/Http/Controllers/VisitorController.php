<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use App\Models\Visitor;
use Illuminate\Http\Request;


class VisitorController extends Controller
{
    public function dailyVisitor()
    {
        $date = now()->format('Y-m-d');
        $dailyVisitors = Traffic::whereDate('created_at', $date)
            ->sum('visits');
        return response()->json(['dailyVisitors' => $dailyVisitors]);
    }

    public function weeklyVisitors()
    {
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        $weeklyTraffic = Traffic::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(visits) as visits')
            ->groupBy('date')
            ->get();

        return response()->json(['weeklyTraffic' => $weeklyTraffic]);
    }
}
