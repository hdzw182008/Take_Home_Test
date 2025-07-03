<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:6'    
        ]);

        $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];

        if(Auth::attempt($data)){              
            return redirect()->route('dashboard')->with('success', 'berhasil login');
        }else{
            return redirect()->route('login')->with('failed', 'gagal login');
        }
    }

    public function logout(){
                Auth::logout();
                return redirect()->route('login')->with('success', 'berhasil logout');
    }
}
