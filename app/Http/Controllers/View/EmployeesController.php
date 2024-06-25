<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Companies;
use App\Models\Employees;

use RealRashid\SweetAlert\Facades\Alert;


class EmployeesController extends Controller
{
    public function index($id) {
        $items = Companies::with('employees')->findOrFail($id);
        return view('pages.table-employees', compact('items'));
    }



    public function create($id) {
        $CompanyID = $id;
        return view('pages.employees.create', compact('CompanyID'));
    }



    public function store(Request $requests, $id) {
        $requests->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required',
            'phone' => 'required|string',
        ]);
        
        Employees::create([
            'first_name' => $requests->first_name,
            'last_name' => $requests->last_name,
            'email' => $requests->email,
            'company' => $id,
            'phone' => $requests->phone,
        ]);
        
        Alert::success('Success', 'Employees Berhasil Di Buat!!!');
        return redirect()->route('dashboard');
    }



    public function edit($id) {
        $items = Employees::where('id', $id)->first();
        return view('pages.employees.edit', compact('items'));
    }



    public function update(Request $requests, $id) {
        $data = $requests->except('_token');
        
        // membuat confirm validasi form
        $requests->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|',
            'phone' => 'required|',
        ]);
        
        $employees = Employees::where('id', $id)->first();
        $employees->update($data);
        
        Alert::success('Success', 'Employees Berhasil Di Ubah!!!');
        return redirect()->route('dashboard');
    }



    public function delete($id)
    {
        Employees::where('id', $id)->first()->delete();
        Alert::success('Berhasil', 'Data Employees Berhasil Di Hapus');
        return redirect()->route('dashboard');
    } 

}