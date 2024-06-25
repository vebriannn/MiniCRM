@extends('components.layouts.app')

@section('title', 'Create Data Devisions')

@section('content')
    <div class="container-fluid">

        <form action="{{ route('create.data.division.store') }}" method="POST">
            @csrf
            <div class="form-group col-sm-2">
                <label>Name Division</label>
                <input type="text" class="form-control" placeholder="Enter Name Division " name="name_division">
                @error('name_division')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-sm-2">
                <label>Member</label>
                <input type="text" class="form-control" placeholder="Enter Member" name="member">
                @error('member')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="ml-3 mt-3">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
@endsection
