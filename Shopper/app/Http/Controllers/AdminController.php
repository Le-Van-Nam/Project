<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Authlogin(){

    }
    public function index(){
        return view('admin_login');

    }
    public function conv(){
        $users=\App\Models\users::all();
        foreach($users as $value){
            $a=\App\Models\users::find($value->id);
            $a->password=bcrypt($value->password);
            $a->save();
        }
    }
    public function postindex(LoginRequest $request){
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('admin');
        }else{
            return redirect('login-admin')->with('notice','Username hoặc mk ko chính xác');
        }

    }
    public function dashboard(){
        $this->Authlogin();
        return view('admin.dashboard');

    }
    public function logout(){
        Auth::logout();
        return redirect('login-admin');
    }


}
