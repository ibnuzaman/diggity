<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use Illuminate\Http\Request;


class VisitorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/dailyVisitors",
     *     summary="Get daily visitors traffic",
     *     description="Returns the total number of visits for the current day. If no visits are recorded for the day, it logs the current visitor's IP and initializes the visit count.",
     *     tags={"Visitors"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="dailyVisitorsTraffic",
     *                 type="integer",
     *                 description="Total number of visits for the current day"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
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

    
    /**
 * @OA\Get(
 *     path="/api/v1/weeklyVisitors",
 *     summary="Get weekly visitors traffic",
 *     description="Returns the total number of visits for the current week.",
 *     tags={"Visitors"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="weeklyVisitorsTraffic",
 *                 type="integer",
 *                 description="Total number of visits for the current week"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
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

    /**
 * @OA\Get(
 *     path="/api/v1/visitors",
 *     summary="Get weekly visitors traffic",
 *     description="Returns the total number of visits f",
 *     tags={"Visitors"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="weeklyVisitorsTraffic",
 *                 type="integer",
 *                 description="Total number of visits for the current week"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
    public function visitors()
    {
        $visitors = Traffic::all();
        return response()->json(['visitors' => $visitors]);
    }

    /**
 * @OA\Get(
 *     path="/api/v1/monthlyVisitors",
 *     summary="Get monthly visitors traffic",
 *     description="Returns the total number of visits for the current week.",
 *     tags={"Visitors"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="monthlyVisitorsTraffic",
 *                 type="integer",
 *                 description="Total number of visits for the current week"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
    public function monthlyVisitors()
    {
        $currentMonth = now()->month;
        $monthlyVisitors = Traffic::whereMonth('created_at', $currentMonth)
            ->sum('visits');
        return response()->json(['monthlyVisitorsTraffic' => $monthlyVisitors]);
    }

    /**
 * @OA\Get(
 *     path="/api/v1/yearlyVisitors",
 *     summary="Get yearly visitors traffic",
 *     description="Returns the total number of visits for the current week.",
 *     tags={"Visitors"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="yearlyVisitorsTraffic",
 *                 type="integer",
 *                 description="Total number of visits for the current week"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error"
 *     )
 * )
 */
    public function yearlyVisitors()
    {
        $currentYear = now()->year;
        $yearlyVisitors = Traffic::whereYear('created_at', $currentYear)
            ->sum('visits');
        return response()->json(['yearlyVisitorsTraffic' => $yearlyVisitors]);
    }
}
