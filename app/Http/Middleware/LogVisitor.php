<?php

namespace App\Http\Middleware;

use App\Models\Traffic;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $visitor = $request->ip();
        // $date = now()->format('Y-m-d');

        // $visitorExist = Traffic::where('visitor', $ip)->whereDate('created_at', $date)->save();
        // $visitorExist = $request->ip();
        // $traffic = Traffic::firstOrCreate(['visitor' => $visitor]);
        // $traffic->save();

        // $time = now();

        // $visitor = $request->ip();
        // $traffic = Traffic::firstOrCreate(['visitor' => $visitor]);
        // $traffic->save();

        // return $next($request);

        // $time = now(); // @Todo: check timezone in the config/app.php
        $visitor = "129.1.4.11";

        // $visitor = $request->ip();
        $traffic = Traffic::where('visitor', $visitor)->first();

        if ($traffic) {
            // Resident visitor
            $traffic->visits++;
            // $traffic->update();
        } else {
            // New visitor
            $traffic = new Traffic(['visitor' => $visitor]);
            $traffic->save();
        }


        // $count = cache('visits', 1);
        // $visitor = request()->ip();
        // $time = now();

        // cache()->put('visits', ++$count);

        return $next($request);
    }
}
