<?php

namespace App\Http\Controllers;

use App\Models\Traffic;
use Illuminate\Http\Request;



/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Visitor API",
 *     description="API Documentation for Visitor Management",
 *     @OA\Contact(
 *         email="support@mysite.com"
 *     ),
 *     @OA\License(
 *         name="Proprietary",
 *         url=""
 *     )
 * )
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="API Server"
 * )
 */
class VisitorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/dailyVisitors",
     *     summary="Get daily visitors traffic",
     *     description="Returns the total number of visits for the current day. If no visits are recorded for the day, it initializes the traffic with the current visitor's IP and sets visits to 1.",
     *     tags={"Visitor"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="dailyVisitorsTraffic",
     *                 type="integer",
     *                 example=10
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
     *     tags={"Visitor"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="weeklyVisitorsTraffic",
     *                 type="integer",
     *                 example=50
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
            ->get()
            ->sum('visits');
        return response()->json(['weeklyVisitorsTraffic' => $weeklyTraffic]);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/visitors",
     *     summary="Get all visitors",
     *     description="Returns all visitors.",
     *     tags={"Visitor"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="visitors",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="visitor",
     *                         type="string",
     *                         example="192.168.1.1"
     *                     ),
     *                     @OA\Property(
     *                         property="visits",
     *                         type="integer",
     *                         example=10
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2021-09-01T00:00:00.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-09-01T00:00:00.000000Z"
     *                     )
     *                 )
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
     *     description="Returns the total number of visits for the current month.",
     *     tags={"Visitor"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="monthlyVisitorsTraffic",
     *                 type="integer",
     *                 example=200
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
     *     description="Returns the total number of visits for the current year.",
     *     tags={"Visitor"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="yearlyVisitorsTraffic",
     *                 type="integer",
     *                 example=1000
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
