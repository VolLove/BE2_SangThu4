@extends('FontEnd.headerPage')
@section('title', 'Register')
@section('containt')
    <div class="container my-5">
        <div class="my-5">
            <h1 class="my-5">Register</h1>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('register.custom') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-2"> <label>Email</label></div>
                    <div class="col-10"> <input required value="{{ old('email') }}" style="width: 400px" type="text"
                            name="email" id="email" placeholder="Email@"></div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-2"> <label>Password</label></div>
                    <div class="col-10"> <input required style="width: 400px" type="password" name="password"
                            id="password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-2"> <label>Comfirmation</label></div>
                    <div class="col-10"> <input required style="width: 400px" type="password" name="password_confirmation"
                            id="password_confirmation"></div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-2"> <label>Your name</label></div>
                    <div class="col-10"> <input style="width: 400px" value="{{ old('name') }}" type="text"
                            name="name" id="name" placeholder="Your name"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-2"> <label>Your phone</label></div>
                    <div class="col-10"> <input style="width: 400px" value="{{ old('phone') }}" type="text"
                            name="phone" id="phone" placeholder="Your phone"></div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-2"> <label>Avata image</label></div>
                    <div class="col-10"> <input style="width: 400px" accept="image/*" value="{{ old('image') }}"
                            type="file" name="avatar" id="avatar"></div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary mb-3">Registration</button>
                </div>
            </form>
        </div>
    </div>
@endsection
