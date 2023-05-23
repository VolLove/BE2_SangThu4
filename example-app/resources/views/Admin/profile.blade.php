@extends('Admin.templates')
@section('title', 'Dashboard')
@section('containt')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>

            {{ session('success') }}
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
            {{ session('errors') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>Warning!</h5>
            {{ session('warning') }}
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @isset($useradmin)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Profile Image -->
                        <div class="card card-primary">
                            <div class="card-body box-profile">
                                <a class="btn btn-info btn-sm float-right" href="{{ route('account.edit') }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ url('avatars/' . $useradmin->avatar, []) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $useradmin->name }}</h3>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b>
                                        <p class="float-right">{{ $useradmin->email }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b>
                                        <p class="float-right">{{ $useradmin->phone }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b>
                                        <p class="float-right">{{ $useradmin->address }}</p>
                                    </li>
                                </ul>
                                <a href="{{ route('changepassword', ['id' => 1]) }}"
                                    class="btn btn-primary btn-block"><b>Change
                                        password</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    @endisset

    @isset($bills)
    @endisset
@endsection
