<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index() {
        $items = Companies::all();
        return view('pages.index', compact('items'));
    }



    public function create() {
        return view('pages.companies.create');
    }



    public function store(Request $requests) {
        
        $requests->validate([
            'name' => 'required|string',
            'email' => 'required',
            'logo' => 'required|image|mimes:jpeg,jpg,png',
            'website' => 'required|string',
        ]);
        
        $logo = $requests->logo;
        $getNewNameLogo = Str::random(10).$logo->getClientOriginalName();
        
        $logo->storeAs('public/imagesLogo', $getNewNameLogo);

        Companies::create([
            'name' => $requests->name,
            'email' => $requests->email,
            'logo' => $getNewNameLogo,
            'website' => $requests->website,
        ]);

        Alert::success('Success', 'Companies Berhasil Di Buat!!!');
        return redirect()->route('dashboard');
    }



    public function edit($id) {
        $items = Companies::where('id', $id)->first();
        return view('pages.companies.edit', compact('items'));
    }



    public function update(Request $requests, $id) {
        $data = $requests->except('_token');
        
        // membuat confirm validasi form
        $requests->validate([
            'name' => 'required|string',
            'email' => 'required',
            'website' => 'required|string',
        ]);
        
        $companies = Companies::where('id', $id)->first();
        
        if ($requests->logo) {
            
            // save new images
            $logo = $requests->logo;
            $getNewNameLogo = Str::random(10).$logo->getClientOriginalName();
            $logo->storeAs('public/imagesLogo', $getNewNameLogo);
            $data['logo'] = $getNewNameLogo;
            
            // delete old images
            Storage::delete('storage/imagesLogo'.$companies->logo);
        }
        
        $companies->update($data);
        
        Alert::success('Success', 'Companies Berhasil Di Ubah!!!');
        return redirect()->route('dashboard');
    }



    public function deleteCompanies($id)
    {
        $items = Companies::with('employees')->findOrFail($id);
        if($items->employees->isEmpty()) {
            Companies::where('id', $id)->first()->delete();
            Alert::success('Berhasil', 'Data Companies Berhasil Di Hapus');
        }
        else {
            
            Alert::error('Gagal', 'Maaf Anda Gagal Menghapus Companies Karena Masih Ada Employees!!!');
        }
        
        return redirect()->route('dashboard');
    } 

}   