<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use Illuminate\Http\Request;


class VisitorController extends Controller
{
    public function dailyVisitors()
    {
        $ip = request()->ip();
        $date = now()->format('Y-m-d');
        $dailyVisitors = Traffic::whereDate('created_at', $date)
            ->sum('visits');
        if ($dailyVisitors == 0) {
            $traffic = new Traffic(['visitor' => $ip, 'visits' => 1, 'created_at' => now(), 'updated_at' => now()]);
            $traffic->save();
        }

        return response()->json(['dailyVisitorsTraffic' => $dailyVisitors]);
    }

    public function weeklyVisitors()
    {
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();
        $weeklyTraffic = Traffic::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(visits) as visits')
            ->groupBy('date')
            ->get();
        return response()->json(['weeklyVisitorsTraffic' => $weeklyTraffic]);
    }

    public function visitors()
    {
        $visitors = Traffic::all();
        return response()->json(['visitors' => $visitors]);
    }

    public function monthlyVisitors()
    {
        $currentMonth = now()->month;
        $monthlyVisitors = Traffic::whereMonth('created_at', $currentMonth)
            ->sum('visits');
        return response()->json(['monthlyVisitorsTraffic' => $monthlyVisitors]);
    }

    public function yearlyVisitors()
    {
        $currentYear = now()->year;
        $yearlyVisitors = Traffic::whereYear('created_at', $currentYear)
            ->sum('visits');
        return response()->json(['yearlyVisitorsTraffic' => $yearlyVisitors]);
    }
}
