@extends('components.layouts.app')

@section('title', 'Edit Data Companies')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('edit.data.companies.update', $items->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group col-sm-2">
                <label>Name Company</label>
                <input type="text" class="form-control" placeholder="Enter Name Company" name="name" value="{{$items->name}}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Email Company</label>
                <input type="text" class="form-control" placeholder="Enter Email Company" name="email" value="{{$items->email}}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group col-sm-2">
                <label for="image">Logo Company</label>
                <input type="file" class="form-control-file" id="image"  name="logo">
                @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group col-sm-2">
                <label>Website Link</label>
                <input type="url" class="form-control" placeholder="Enter Website Link" name="website" value="{{$items->website}}">
                @error('website')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="ml-3 mt-3">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
@endsection
