<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
public function showRegister()
{
    return view('register');
}
public function showLogin()
{
    return view('login');
}

public function searchLocation(Request $request)
{
    $query = $request->get('q');
    $locations = DB::table('tbl_locations')
        ->orwhere('region', 'like', "%$query%")
        ->orwhere('street', 'like', "%$query%")
        ->orWhere('ward', 'like', "%$query%")
        ->orWhere('district', 'like', "%$query%")
        ->limit(10)
        ->get();

    return response()->json($locations);
}
public function register(Request $request)
{
   $request->validate([
    'first_name'=>'required|string|max:255',
    'last_name'=>'required|string|max:255',
    'email'=>'required|email|unique:users,email',
    'address'=>'required|string',
    'phone'=>'required|string',
    'phone2'=>'nullable|string',
    'password'=>'required|confirmed|min:6',
   ]);
   DB::table('users')->insert([
        'name'       => $request->first_name . ' ' . $request->last_name,
        'email'      => $request->email,
        'password'   => bcrypt($request->password),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect()->route('login')->with('success', 'Account created successfully!');
}

public function login(Request $request)
{
    $credentials=$request->validate([
        'email'=>'required|email',
        'password'=>'required|string',
    ]);
     if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success', 'Logged in successfully!');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}
}
