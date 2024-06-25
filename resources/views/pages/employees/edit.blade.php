@extends('components.layouts.app')

@section('title', 'Edit Data Employees')

@section('content')
    <div class="card mx-3">
        <div class="card-header d-flex justify-content-between">
            <h4>Create Data Employees</h4>
            <a href="{{ route('dashboard') }}" class="btn btn-primary ms-2" type="button">Back</a>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="{{ route('edit.data.employees.update', $items->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <div class="col-md me-3">
                            <div class="form-floating">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name"
                                    value="{{ $items->first_name }}">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md ms-3">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name"
                                        name="last_name" value="{{ $items->last_name }}">
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mt-4">
                        <div class="col-md me-3">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <label>Email </label>
                                    <input type="text" class="form-control" placeholder="Enter Email Company"
                                        name="email" value="{{ $items->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md ms-3">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" name="phone"
                                        value="{{ $items->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
