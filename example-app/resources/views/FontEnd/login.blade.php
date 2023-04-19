@extends('FontEnd.header')
@section('title', 'Login')
@section('containt')
    <div class="container my-5">
        <div class="mb-5">
            <h1>Login</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form class="form" method="POST" action="{{ route('login.custom') }}">
            <div class="row mb-3">
                <div class="col-2"> <label>Email</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="email" id="email"
                        value="{{ old('email') }}" placeholder="Email" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Password</label></div>
                <div class="col-10"> <input style="width: 400px" type="password" name="password" id="paddword"
                        placeholder="Passowrd" required="required"></div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
        </form>
    </div>
@endsection
