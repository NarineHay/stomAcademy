<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LG;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccessStoreRequest;
use App\Jobs\SendAccessMail;
use App\Mail\SendAccessInfoEmail;
use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;

class AccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.locale')->only(['index', 'create', 'edit']);
    }

    public function index(Request $request)
    {
        $order = $request->get("order", "id");
        $sort = $request->get("sort", "asc");
        $search_webinar = $request->integer("search_webinar", 0);
        $search_user = $request->integer("search_user", 0);

        $access_query = Access::query();
        if ($search_webinar > 0) {
            $access_query = $access_query->where("course_id", $search_webinar)->orWhere("webinar_id", $search_webinar);
        }

        if ($search_user > 0) {
            if ($search_webinar > 0) {
                $access_query = $access_query->orWhere("user_id", $search_user);
            } else {
                $access_query = $access_query->where("user_id", $search_user);
            }
        }

        $accesses = $access_query->orderBY($order, $sort)->paginate(10);
        $users = User::query()->where("role", User::ROLE_USER)->get();
        $courses = Course::all();
        $webinars = Webinar::all();
        return view('admin.accesses.index', compact('accesses', 'users', 'webinars', 'courses', 'search_webinar', 'search_user'));
    }

    public function create()
    {
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.create', $data);
    }

    public function store(AdminAccessStoreRequest $request)
    {
        $type = $request->get("type");

        $course_id = $request->get('course_id');
        $webinar_id = $request->get('webinar_id');
        $access_time = $request->boolean("access_time");
        $duration = $request->get('duration');
        $code = $request->get('lang');

        $lang_id = LG::getId($code);
        $lang = Str::lower( $code);

        // LG::set($lang_id);
        App::setLocale($lang);
        Session::put('lg', $lang_id);

        if ($type == "course") {
            $course = Course::find($course_id);
            $webinar = null;
        } else {
            $course = null;
            $webinar = Webinar::find($webinar_id);
        }

        if ($request->get("access_type", "select") == "new") {
            $user_ids = [];
            $users_string = $request->get("users");
            $users_string_arr = collect(explode("\n", $users_string));
            $new_users = $users_string_arr->map(function ($item) {
                $item = trim($item);
                $item = str_replace(";", "", $item);;
                $arr = explode("*",$item);
                if(count($arr) == 2){
                    return [
                        'name' => trim($arr[0]),
                        'email' => trim($arr[1])
                    ];
                }else{
                    return null;
                }
            })->filter(function ($item){
                return !is_null($item);
            });

            // dd($new_users);
            foreach ($new_users as $user){
                $new_user = User::query()->where("email",$user['email'])->first();
                if(is_null($new_user)){
                    $user['password'] = Str::random(8);

                    $new_user = User::create($user);
                    $user_ids[] = $new_user->id;
                }
                $name = $new_user->fname . ' ' . $new_user->lname;
                $data = [
                    "password" => $user['password'] ?? null,
                    "email" => $new_user->email,
                    // "fname" => $new_user->fname,
                    // "lname" => $new_user->lname,
                    "name" => $name,
                    "type" => $type,
                    "course" => $course,
                    "webinar" => $webinar,
                    "access_time" => $access_time,
                    "duration" => $duration
                ];

                $subject = 'Вам добавлены новые видео в личный кабинет';
                // SendAccessMail::dispatch($data);
                //Mail::to($new_user)->send(new UserAccessMail($data));
                mail::send(new SendAccessInfoEmail($data, $subject));
            }

        }else{
            $user_ids = $request->get('user_ids');
            $subject = 'Вам добавлены новые видео в личный кабинет';
            foreach ($user_ids as $user_id) {
                $user = User::find($user_id);
                unset($user->password);
                $data = [
                    "email" => $user->email,
                    "name" => $user->name

                ];

                mail::send(new SendAccessInfoEmail($data, $subject));
            }
        }

        foreach ($user_ids as $user_id) {
            $access = new Access();
            $access->manager_id = Auth::user()->id;
            $access->user_id = $user_id;
            if ($type == "course") {
                $access->course_id = $course_id;
            } else {
                $access->webinar_id = $webinar_id;
            }
            $access->access_time = $access_time;
            if ($access_time) {
                $access->duration = $duration;
            }
            $access->save();


        }
        return redirect()->route('admin.accesses.index');
    }

    public function edit(Access $access)
    {
        $data['courses'] = Course::all();
        $data['webinars'] = Webinar::all();
        $data['users'] = User::all();
        return view('admin.accesses.edit', compact('access', 'data'));
    }

    public function update(Request $request, Access $access)
    {
        $access->user_id = $request->user_id;
        if ($request->get("type") == "course") {
            $access->course_id = $request->course_id;
        } else {
            $access->webinar_id = $request->webinar_id;
        }
        $access_time = $request->boolean("access_time");
        $access->access_time = $request->access_time;
        if ($access_time) {
            $access->duration = $request->duration;
        }
        $access->save();
        return redirect()->back()->with('success','Access has been updated successfully');
    }

    public function destroy(Access $access)
    {
        $access->delete();
        return redirect()->route('admin.accesses.index');
    }
}
