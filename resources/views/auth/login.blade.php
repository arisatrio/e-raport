@extends('layouts.auth')
@section('content')
<div id="loginform">
    <div class="logo">
        <h5 class="font-medium mb-3">LOGIN | E-RAPOR</h5>
    </div>
    <!-- Form -->
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal mt-3"  method="POST" id="loginform" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                    </div>
                    <input type="text" name="username" value="{{ old('username') }}" required class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="NIP/NIS" aria-label="Email" aria-describedby="basic-addon1">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required aria-label="Password" aria-describedby="basic-addon1">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-control custom-checkbox">
                            <a href="{{ route('password.request') }}" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Forgot password?</a>
                        </div>
                    </div>
                </div> --}}
                <div class="form-group text-center">
                    <div class="col-xs-12 pb-2">
                        <button class="btn btn-block btn-lg text-white" type="submit" style="background: #017cc2;">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection