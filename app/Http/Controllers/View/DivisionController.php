<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Divisions;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    public function index() {
        $items = Divisions::all();
        return view('pages.division', compact('items'));
    }



    public function create() {
        return view('pages.divisions.create');
    }



    public function store(Request $requests) {
        $requests->validate([
            'name_division' => 'required|string',
            'member' => 'required|string',
        ]);
        
        Divisions::create([
            'name_division' => $requests->name_division,
            'member' => $requests->member,
        ]);
        
        Alert::success('Success', 'Division Berhasil Di Buat!!!');
        return redirect()->route('view.data.division');
    }


    public function edit(Request $requests, $id) {
        $items = Divisions::where('id', $id)->first();
        return view('pages.divisions.edit', compact('items'));
    }



    public function update(Request $requests, $id) {
        $data = $requests->except('_token');
        
        // membuat confirm validasi form
        $requests->validate([
            'name_division' => 'required|string',
            'member' => 'required|string',
        ]);
        
        $employees = Divisions::where('id', $id)->first();
        $employees->update($data);
        
        Alert::success('Success', 'Division Berhasil Di Ubah!!!');
        return redirect()->route('view.data.division');
    }


    
    public function delete($id) {
        Divisions::where('id', $id)->first()->delete();
        Alert::success('Berhasil', 'Data Division Berhasil Di Hapus');
        return redirect()->route('view.data.division');
    }
}