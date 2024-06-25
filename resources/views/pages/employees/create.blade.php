@extends('components.layouts.app')

@section('title', 'Create Data Employees')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('create.data.employees.store', $CompanyID) }}" method="POST">
            @csrf
            <div class="form-group col-sm-2">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name">
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name">
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Email </label>
                <input type="email" class="form-control" placeholder="Enter Email Company" name="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
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
