<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'password'=>'required',
            'disability_id'=>'required|array',
            'email'=>'required|unique:users',
            'date_of_birth'=>'required',
            'confirmation_password'=>'required',
        ]);
        $data=$req->except(['password','disability_id','confirmation_password']);
        if($req->password!=$req->confirmation_password){
            return  $this->send_json(null,400,"Password Confirmation not same");
        }
        $data['password']=bcrypt($req->password);

        $user=User::create($data);

        $user->disabilites()->sync($req->disability_id);

        return $this->send_json($user->load('disabilites'),200,'register success');
    }
    public function login(Request $req)
    {
        $data=$req->only(['email','password']);
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>1]))
        {
            $auth=Auth::user();
            $token=$auth;
        }

    }
}
