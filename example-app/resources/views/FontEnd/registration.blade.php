@extends('FontEnd.header')
@section('title', 'Register')
@section('containt')
    <div class="container my-5">
        <div class="mb-5">
            <h1>Register</h1>
        </div>
        <form class="form" method="POST" action="#">
            <div class="row mb-3">
                <div class="col-2"> <label>Email</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="email" id="email"
                        value="{{ old('email') }}" placeholder="Email@" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Password</label></div>
                <div class="col-10"> <input style="width: 400px" type="password" name="password" id="password"
                        placeholder="Passowrd" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Comfirmation</label></div>
                <div class="col-10"> <input style="width: 400px" type="password" name="password_comfirmation"
                        id="password_comfirmation" placeholder="Comfirmation" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Your name</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="name" id="name"
                        value="{{ old('name') }}" placeholder="Your name" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Your phone</label></div>
                <div class="col-10"> <input style="width: 400px" type="text" name="phone" id="phone"
                        value="{{ old('phone') }}" placeholder="Your phone" required="required"></div>
            </div>
            <div class="row mb-3">
                <div class="col-2"> <label>Avata image</label></div>
                <div class="col-10"> <input style="width: 400px" accept="image/*" type="file" name="imageface"
                        id="imageface" required="required"></div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary mb-3">Login</button>
            </div>
        </form>
    </div>

@endsection
