@extends('components.layouts.app')

@section('title', 'Edit Data Employees')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('edit.data.employees.update', $items->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group col-sm-2">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name"
                    value="{{ $items->first_name }}">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name"
                    value="{{ $items->last_name }}">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Email </label>
                <input type="text" class="form-control" placeholder="Enter Email Company" name="email"
                    value="{{ $items->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter Phone" name="phone"
                    value="{{ $items->phone }}">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="ml-3 mt-3">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
@endsection
