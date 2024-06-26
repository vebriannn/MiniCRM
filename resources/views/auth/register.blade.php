@extends('components.layouts.auth')

@section('title', 'Users Register')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"
                        style="background-image: url('crm/img/urban-traffic-with-cityscape.jpg'); background-size: cover; background-position: center;">
                    </div>
                    <div class="col-lg-6">
                        <div class="pt-4 pb-3 px-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="exampleName">Your Name</label>
                                            <input type="text" class="form-control form-control-user" id="exampleName"
                                                placeholder="Your Name" name="name">
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="exampleInputEmail">Your Email</label>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Email Address" name="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Your Password</label>
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password" name="password" minlength="8">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Your Role</label>
                                    <div class="row mb-3 ml-1">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="option1"
                                                    checked="" value="user">
                                                <label class="form-check-label" for="option1">User</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="option2"
                                                    value="admin">
                                                <label class="form-check-label" for="option2">Admin</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="role" id="option3"
                                                    value="superadmin">
                                                <label class="form-check-label" for="option3">Super Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr class="m-0 mt-2 mb-2">
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
