@extends('FontEnd.header')
@section('title', 'Register')
@section('containt')
    <div class="container my-5">
        <div class="mb-5">
            <h1>Register</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form class="form" method="POST" action="{{ route('register.custom') }}">
            <div class="row mb-3">
                <div class="col-2"> <label>Email</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="email" id="email"
                        placeholder="Email@"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Password</label></div>
                <div class="col-10"> <input style="width: 400px" type="password" name="password" id="password"
                        placeholder="Passowrd"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Comfirmation</label></div>
                <div class="col-10"> <input style="width: 400px" type="password" name="password_comfirmation"
                        id="password_comfirmation" placeholder="Comfirmation"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Your name</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="name" id="name"
                        placeholder="Your name"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Your phone</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="phone" id="phone"
                        placeholder="Your phone"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Avata image</label></div>
                <div class="col-10"> <input style="width: 400px" accept="image/*" type="file" name="avatar"
                        id="avatar"></div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary mb-3">Registration</button>
            </div>
        </form>
    </div>

@endsection
