@extends('Admin.templates')
@section('title', $page)
@section('containt')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $page }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin', []) }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $page }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    {{-- admin edit information account user --}}
    @isset($user)
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" id="editForm" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control   @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <div class="">
                                        <img id="currentImage" src="{{ url('avatars/' . $user->avatar, []) }}"
                                            alt="{{ $user->avatar }}" style="max-width: 50px;max-height: 50px">
                                        <input name="avatar" type="file" id="imageInput"
                                            accept="image/png, image/gif, image/jpeg">
                                        @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control  @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control  @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address', $user->address) }}">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
            </div>

            <script>
                const currentImage = document.getElementById('currentImage');
                const editForm = document.getElementById('editForm');

                currentImage.addEventListener('click', function() {
                    imageInput.click();
                });

                imageInput.addEventListener('change', function() {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        currentImage.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                });
            </script>
        </section>
    @endisset
    {{-- admin destroy account user --}}
    @isset($user_destroy)
        <section class="content">

            <div class="row">
                <div class="col-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="{{ url('avatars/' . $user_destroy->avatar) }}"
                                    class="profile-user-img img-fluid img-circle" alt="{{ $user_destroy->name }}">
                            </div>

                            <h3 class="profile-username text-center">{{ $user_destroy->name }}</h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Name</b> <b class="float-right">{{ $user_destroy->name }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b> <b class="float-right">{{ $user_destroy->phone }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b><b class="float-right">{{ $user_destroy->email }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b><b class="float-right">{{ $user_destroy->address }}</b>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-6">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('user.destroy', $user_destroy) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <label for="password">Enter your password to confirm:</label>
                        <input class="form-control" type="password" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row pt-2">
                            <div class="col-12">
                                <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Confirm" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    @endisset
    {{-- admin change password account user --}}
    @isset($user_change_password)
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img src="{{ url('avatars/' . $user_change_password->avatar) }}"
                        class="profile-user-img img-fluid img-circle" alt="{{ $user_change_password->name }}">
                </div>

                <h3 class="profile-username text-center">{{ $user_change_password->name }}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Name</b> <b class="float-right">{{ $user_change_password->name }}</b>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <form class="form-horizontal" action="{{ route('user.handlepassword', $user_change_password->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> <label>New Password</label></label>
                    <div class="col-10"> <input required class="form-control" type="password" name="new_password">
                    </div>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label"> <label>Comfirmation</label></div>
                    <div class="col-10"> <input required class="form-control" type="password"
                            name="new_password_confirmation" id="password_confirmation"></div>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> <label>Password admin</label></label>
                    <div class="col-10"> <input required class="form-control" type="password" name="password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Confirm" class="btn btn-success float-right">
            </div>
            <!-- /.card-footer -->
        </form>
    @endisset
    @isset($manu_edit)
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('manufacter.edithandle', $manu_edit->id) }}" id="editForm"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" class="form-control   @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $manu_edit->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <div class="">
                                        <img id="currentImage" src="{{ url('images/' . $manu_edit->image, []) }}"
                                            alt="{{ $manu_edit->image }}" style="max-width: 100px;max-height: 100px">
                                        <input name="avatar" type="file" id="imageInput"
                                            accept="image/png, image/gif, image/jpeg">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Edit" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
            </div>

            <script>
                const currentImage = document.getElementById('currentImage');
                const editForm = document.getElementById('editForm');

                currentImage.addEventListener('click', function() {
                    imageInput.click();
                });

                imageInput.addEventListener('change', function() {
                    const file = this.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        currentImage.src = e.target.result;
                    }

                    reader.readAsDataURL(file);
                });
            </script>
        </section>
    @endisset
@endsection
