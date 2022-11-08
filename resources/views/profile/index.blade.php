@extends('layouts.app')
@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h1 class="text-center">{{ __('Profile') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <div class="input-group ">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text" id="email-group"><i class="fas fa-user-alt"></i> </span>
                                        </div>
                                        <input placeholder="{{__('Name')}}"  id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" autocomplete="name" autofocus>
                                    </div>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <div class="input-group ">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text" ><i class="fas fa-envelope"></i> </span>
                                        </div>
                                        <input id="email"placeholder="{{__('Email Address')}}"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" autocomplete="email">
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="input-group ">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text" ><i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input placeholder="{{__('New Password')}}"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <div class="input-group ">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text"><i class="fas fa-lock"></i> </span>
                                        </div>
                                        <input placeholder="{{__('Old Password')}}"  id="password-old" type="password" class="form-control" name="old_password">
                                    </div>
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
