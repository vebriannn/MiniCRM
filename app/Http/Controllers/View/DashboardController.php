<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() { 
        return view('pages.index');
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


    public function getDataApi() {
        $items = Companies::query();

        return DataTables::of($items)
        ->addColumn('action', function($item) {
            if (Auth::user()->role == 'superadmin') {
                return  '<a href="'.route('view.data.employees', $item->id).'" class="btn btn-success">View Detail</a>' .
                        '<a href="'.route('edit.data.companies', $item->id).'" class="btn btn-primary">Edit</a>' .
                        '<a href="'.route('delete.data.companies', $item->id).'" class="btn btn-danger" id="id-delete">Delete</a>';
            } else {
                return '<a href="'.route('view.data.employees', $item->id).'" class="btn btn-success">View Detail</a>';
            }
        })->toJson();
    }

}   