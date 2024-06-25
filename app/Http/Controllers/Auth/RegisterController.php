<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $requests)
    {
        $data = $requests->except('_token');
        
        $requests->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);
        
        user::create([
            'first_name' => $requests->first_name,
            'last_name' => $requests->last_name,
            'email' => $requests->email,
            'password' => $requests->password,
            'role' => $requests->role
        ]);

        Alert::success('Success', 'Akun Berhasil Di Buat!!!');
        
        return redirect()->route('register');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}