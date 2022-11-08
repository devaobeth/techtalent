@extends('layouts.guest')

@section('content')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h1 class="text-center">{{ __('Login') }}</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="input-group ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text" id="email-group"><i class="fas fa-envelope"></i> </span>
                                    </div>
                                    <input id="email" placeholder="{{__('Email Address')}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
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
                               <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text" id="password-group"><i class="fas fa-lock"></i> </span>
                                   </div>
                                   <input placeholder="{{__('Password')}}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">                               </div>


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            <div class="row mt-3 mb-0">
                <div class="col-md-12 text-center">
                    <a href="{{url('/register')}}" class="text-decoration-none">
                        {{ __("Don't have an account?") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
