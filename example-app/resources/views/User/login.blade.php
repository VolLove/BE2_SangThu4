@extends('User.headerPage')
@section('title', 'Login')
@section('containt')
    <div class="container my-5">
        <div class="mb-5">
            <h1 class="mb-3">Login</h1>


        </div>
        <form class="form" method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-2"> <label>Email</label></div>
                <div class="col-10"> <input class="@error('email') is-invalid @enderror" style="width: 400px" type="email"
                        name="email" id="email" value="{{ old('email') }}" placeholder="Email" required="required"
                        autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Password</label></div>
                <div class="col-10"> <input class="@error('password') is-invalid @enderror" style="width: 400px"
                        type="password" name="password" id="paddword" placeholder="Passowrd" required="required">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
        </form>
    </div>
@endsection
