<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeInfo extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $phone;
    public $email;
    public $name;
    public $birth_date;
    public $password;
    public $image = null;
    public $file;
    public $userDirections = [];
    public $file_is_uploaded = false;

    public $success_ = null;

    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->birth_date = $user->userinfo->birth_date;

        $this->image = $user->userinfo->image;
        $this->fname = $user->userinfo->fname;
        $this->lname = $user->userinfo->lname;
        $this->phone = $user->userinfo->phone;
        $this->email = $user->email;
    }

    public function render()
    {
        $data['user'] = Auth::user();
        $data['success'] = $this->success_;
        $data['directions'] = Direction::all();
        $data['avatar'] = Storage::url($data['user']->userinfo->image ?? "userinfo/unknown.png");
        return view('livewire.front.change-info',$data);
    }

    protected $rules = [
        'email' => 'required|email',
    ];

    public function changeName(){
        $data['user'] = Auth::user();
        $data['user']->userinfo->fname = $this->fname;
        $data['user']->userinfo->lname = $this->lname;
        $data['user']->userinfo->save();
        $this->success_ = "Success";
    }

    public function changePhone(){
        $data['user'] = Auth::user();
        $data['user']->userinfo->phone = $this->phone;
        $data['user']->userinfo->save();
        $this->success_ = "Success";
    }

    public function changeEmail(){
        $data['user'] = Auth::user();
        $data['user']->email = $this->email;
        $data['user']->save();
        $this->success_ = "Success";
    }

    public function changePassword(){
        $data['user'] = Auth::user();
        $data['user']->password = $this->password;
        $data['user']->save();
        $this->success_ = "Success";
    }

    public function changeImage()
    {
        $data['user'] = Auth::user();
        $data['user']->userinfo->image = $this->file->store('public/userinfo');
        $data['user']->userinfo->save();
    }

    public function deleteImage()
    {
        $data['user'] = Auth::user();
        $data['user']->userinfo->image = null;
        $data['user']->userinfo->save();
    }

    public function updated($propertyName){
        if($propertyName == "file"){
            $this->emit("image_uploaded");
        }
    }

    public function savePersonalData(){
        $data['user'] = Auth::user();
        $data['user']->name = $this->name;
        $data['user']->userinfo->birth_date = $this->birth_date;
        $data['user']->save();
        $data['user']->userinfo->save();
        $this->success_ = "Success";
    }

    public function directions(Request $request){
        $data['user'] = Auth::user();
        $directions = $request->get('directions',[]);
        $data['user']->directions()->delete();
        foreach ($this->userDirections as $direction_id){
            $data['user']->directions()->create([
                "direction_id" => $direction_id
            ]);
        }
        $this->success_ = "Success";
    }
}
