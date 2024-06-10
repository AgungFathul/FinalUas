<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\isPengguna_Biasa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isPengguna_Biasa');
    }
    public function createtour()
    {   
        return view('frontend.createtour');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('guest.login')->with('success', 'Kamu berhasil logout');
    }



}
