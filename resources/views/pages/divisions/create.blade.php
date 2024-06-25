@extends('components.layouts.app')

@section('title', 'Create Data Devisions')

@section('content')
    <!-- Begin Page Content -->
    <div class="card mx-3">
        <div class="card-header d-flex justify-content-between">
            <h4>Create Data Divisions</h4>
            <a href="{{ route('dashboard') }}" class="btn btn-primary ms-2">Back</a>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="{{ route('create.data.division.store') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md me-3">
                            <div class="form-floating">
                                <label>Name Division</label>
                                <input type="text" class="form-control" placeholder="Enter Name Division "
                                    name="name_division">
                                @error('name_division')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md ms-3">
                            <div class="form-floating">
                                <label>Member</label>
                                <input type="text" class="form-control" placeholder="Enter Member" name="member">
                                @error('member')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
