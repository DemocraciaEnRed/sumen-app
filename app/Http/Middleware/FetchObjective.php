<?php

namespace App\Http\Middleware;

use Closure;
use App\Objective;

class FetchObjective
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $objectiveId = $request->route()->parameter('objectiveId');
        $request->objective = Objective::findorfail($objectiveId);
        return $next($request);
    }
}
