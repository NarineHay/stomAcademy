<?php

namespace App\Http\Livewire\Front;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

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
    public $validator = false;
    public $validationErrors = null;


    public function rules()
    {
        $user = Auth::user();

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(\+?\d{1,3}|\(\+?\d{1,3}\))?\s?\d{10}$/'],

        ];

        if($user->email != $this->email){
            $rules['email'] = ['required', 'email', 'unique:users'];
        }

        if($this->password != null){
            $rules['password'] = 'required|min:8';
        }

        return $rules;
    }

    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->birth_date = $user->userinfo->birth_date;

        $this->image = $user->userinfo->image;
        $this->fname = $user->userinfo->fname;
        $this->lname = $user->userinfo->lname;
        $this->phone = $user->userinfo->phone;
        $this->email = $user->email;
        $this->userDirections = $user->direction_ids();

    }



    public function render()
    {

        $data['user'] = Auth::user();
        $data['success'] = $this->success_;

        $data['directions'] = Direction::all();
        $data['avatar'] = Storage::url($data['user']->userinfo->image ?? "userinfo/unknown.png");

        return view('livewire.front.change-info',$data);
    }


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

    public function savePersonalData(Request $request){

        $this->validate();

        $data['user'] = Auth::user();

        $data['user']->name = $this->name;
        $data['user']->email = $this->email;

        $data['user']->save();

        if($this->password != null){
            $data['user']->password = $this->password;
            $data['user']->save();
        }

        $data['user']->userinfo->fname = $this->fname;
        $data['user']->userinfo->lname = $this->lname;
        $data['user']->userinfo->birth_date = $this->birth_date;
        $data['user']->userinfo->phone = $this->phone;
        $data['user']->userinfo->save();

        $this->directions($request);

        $this->success_ = __('profile.save_changes');
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
        // $this->success_ = "Success";
    }
}
