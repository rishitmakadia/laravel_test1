<?php

namespace App\Http\Controllers;

use App\Models\DbTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function openLogin()
    {
        return view('authentication.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'emailname' => 'required', // Accepts either email or username
            'password' => 'required',
        ]);
        $input = $request->input('emailname');
        $password = $request->input('password');
        $field = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::attempt([$field => $input, 'password' => $password])) {
//            return auth()->user();
            return response()->json([
                'success' => true,
                'redirect_url' => url('/home'),
            ]);
//            return redirect()->intended('');
        }
        return response()->json([
            'success' => false,
            'errors' => ['Invalid credentials'],
        ]);
    }

    public function openRegister()
    {
        return view('authentication.register');
    }

    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all(),
            ]);
        }
        $data= $validator->validated();
        $data['password'] = Hash::make($data['password']); // Hash password
        $new_user = User::create($data);
        return response()->json([
            'success' => true,
            'name'=>$data['name'],
            'redirect_url' => route('login'),
        ]);
//        return redirect()->route("home");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
