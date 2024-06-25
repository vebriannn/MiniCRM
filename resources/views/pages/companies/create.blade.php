@extends('components.layouts.app')

@section('title', 'Create Data Companies')

@section('content')
    <!-- Begin Page Content -->
    <div class="card mx-3">
        <div class="card-header d-flex justify-content-between">
            <h4>Create Data Companies</h4>
            <a href="{{route('dashboard')}}" class="btn btn-primary ms-2" >Back</a>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="{{ route('dashboard.create.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md me-3">
                            <div class="form-floating">
                                <label>Name Company</label>
                                <input type="text" class="form-control" placeholder="Enter Name Company" name="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md ms-3">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <label>Email Company</label>
                                    <input type="text" class="form-control" placeholder="Enter Email Company"
                                        name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mt-4">
                        <div class="col-md ">
                            <div class="form-group col-6 pl-0">
                                <label for="image">Logo Company</label>
                                <input type="file" class="form-control-file" id="image" name="logo">
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md ms-3">
                            <div class="form-floating">
                                <div class="form-floating">
                                    <label>Website Link</label>
                                    <input type="url" class="form-control" placeholder="Enter Website Link"
                                        name="website">
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


@endsection


