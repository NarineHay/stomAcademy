<?php

namespace App\Http\Middleware;

use App\Models\Access;
use App\Models\CourseWebinar;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $userId = Auth::id();
        $webinarId = $request->route('id'); // Assuming 'id' is a route parameter
        $course = CourseWebinar::query()->where("webinar_id",$webinarId)->first();
        $courseId = $course ? $course->course_id : null;

        $access = Access::where('user_id', $userId)
            ->where('webinar_id', $webinarId);

        if($courseId != null){
            $access = $access->orWhere('course_id', $courseId);

        }

        $access =  $access = $access->first();

        if ($access) {
            return $next($request);
        }

        return redirect()->route('personal.courses');
    }
}
