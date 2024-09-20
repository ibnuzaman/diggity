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
        // test ip (hard code)
        // $visitor = "129.1.4.11";
        $visitor = "129.1.4.12";
        // $visitor = "129.1.4.13";
        // $visitor = $request->ip();
        $traffic = Traffic::where('visitor', $visitor)->first();

        if ($traffic) {
            $traffic->visits++;
        } else {
            $traffic = new Traffic(['visitor' => $visitor]);
            $traffic->save();
        }
        return $next($request);
    }
}
