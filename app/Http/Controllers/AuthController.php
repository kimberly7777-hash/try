<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->where('region', 'like', "%$query%")
        ->where('street', 'like', "%$query%")
        ->orWhere('ward', 'like', "%$query%")
        ->orWhere('district', 'like', "%$query%")
        ->limit(10)
        ->get();

    return response()->json($locations);
}
public function register(Request $request)
{
   $trequest 
}
}
