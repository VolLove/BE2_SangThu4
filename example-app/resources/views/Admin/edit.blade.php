@extends('Admin.templates')
@section('title', $page)
@section('containt')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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

        {{-- user edit --}}
        @if (isset($user))
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
            <!-- /.content -->
            {{-- nothing in page --}}
        @else
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="inputName" class="form-control" value="AdminLTE">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Project Description</label>
                                        <textarea id="inputDescription" class="form-control" rows="4">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" class="form-control custom-select">
                                            <option disabled>Select one</option>
                                            <option>On Hold</option>
                                            <option>Canceled</option>
                                            <option selected>Success</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Client Company</label>
                                        <input type="text" id="inputClientCompany" class="form-control"
                                            value="Deveint Inc">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Project Leader</label>
                                        <input type="text" id="inputProjectLeader" class="form-control"
                                            value="Tony Chicken">
                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('admin', []) }}" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                    </div>
                </div>
            </section>
            <!-- /.content -->
        @endif
    </div>
    <!-- /.content-wrapper -->
@endsection
