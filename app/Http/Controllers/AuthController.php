<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($data);

        if($user){
            return redirect()->route('login');
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }

    public function dashboardPage(){
        $users = User::simplepaginate(2);
        return view('dashboard', compact('users'));
    }

    public function innerPage(){
        return view('inner');
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
