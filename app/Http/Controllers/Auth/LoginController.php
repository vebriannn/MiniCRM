<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $requests)
    {
        $requests->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $requests->only('email', 'password');

        if(Auth::attempt($credentials)) {
            
            $requests->session()->regenerate();
            return redirect()->route('dashboard');
        }   

        return back()->withErrors([
            'errors' => ['Maaf Login Gagal, Mohon Check Kembali Email Dan Password Anda!!!']
        ]);
    }

    public function logout(Request $requests) {

        Auth::logout();
        
        $requests->session()->invalidate();
        $requests->session()->regenerateToken();

        Alert::success('Success', 'Anda Berhasil Logout!!!');
        return redirect()->route('login');
    }

    
}