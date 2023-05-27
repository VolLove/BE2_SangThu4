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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
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
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 15%">Address</th>
                                                    <th style="width: 15%">Phone</th>
                                                    <th style="width: 15%">Transport Fee</th>
                                                    <th style="width: 10%">Date created</th>
                                                    <th style="width: 30%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($bills as $bill)
                                                    <tr>
                                                        <td>{{ $bill->address }} </td>
                                                        <td>{{ $bill->phone }} </td>
                                                        <td>{{ date('d-m-Y', strtotime($bill->created_at)) }} </td>
                                                        <td class="project-actions text-right">
                                                            @if ($bill->status == false)
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('bills.pay', $bill->id) }}"
                                                                    onclick="return confirm('Pay?')">
                                                                    <i class="fa-solid fa-cash-register"></i>
                                                                    Payment confirmation
                                                                </a>
                                                            @else
                                                                <a class="btn btn-info btn-sm disabled" href="#">
                                                                    <i class="fa-solid fa-cash-register"></i>
                                                                    Already paid
                                                                </a>
                                                            @endif
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('bills.view', $bill->id) }}">
                                                                <i class="fas fa-folder">
                                                                </i>
                                                                View
                                                            </a>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ route('bills.remove', $bill->id) }}">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- /.content -->
    @endisset
    @isset($user)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary">
                            <div class="card-body box-profile">
                                <a class="btn btn-info btn-sm float-right" href="{{ route('user.edit', $user->id) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ url('avatars/' . $user->avatar) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b>
                                        <p class="float-right">{{ $user->email }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b>
                                        <p class="float-right">{{ $user->phone }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b>
                                        <p class="float-right">{{ $user->address }}</p>
                                    </li>
                                </ul>
                                <a href="{{ route('user.changepassword', $user->id) }}"
                                    class="btn btn-primary btn-block"><b>Change
                                        password</b></a>

                                <a href="{{ route('user.remove', $user->id) }}" class="btn btn-danger btn-block"><b>
                                        Delete</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">Name user</th>
                                                    <th style="width: 10%">Address</th>
                                                    <th style="width: 10%">Phone</th>
                                                    <th style="width: 10%">Total</th>
                                                    <th style="width: 10%">Date created</th>
                                                    <th style="width: 20%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($user->bills as $bill)
                                                    <tr>
                                                        <td>{{ $bill->user->name }} </td>
                                                        <td>{{ $bill->address }} </td>
                                                        <td>{{ $bill->phone }} </td>
                                                        <td>{{ $bill->total }} </td>
                                                        <td>{{ date('d-m-Y', strtotime($bill->created_at)) }} </td>
                                                        <td class="project-actions text-right">
                                                            @if ($bill->status == false)
                                                                <a class="btn btn-info btn-sm"
                                                                    href="{{ route('bills.pay', $bill->id) }}"
                                                                    onclick="return confirm('Pay?')">
                                                                    <i class="fa-solid fa-cash-register"></i>
                                                                    Payment confirmation
                                                                </a>
                                                            @else
                                                                <a class="btn btn-info btn-sm disabled" href="#">
                                                                    <i class="fa-solid fa-cash-register"></i>
                                                                    Already paid
                                                                </a>
                                                            @endif
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('bills.view', $bill->id) }}">
                                                                <i class="fas fa-folder">
                                                                </i>
                                                                View
                                                            </a>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ route('bills.remove', $bill->id) }}">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete
                                                            </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%">Name user</th>
                                                    <th style="width: 10%">Address</th>
                                                    <th style="width: 10%">Phone</th>
                                                    <th style="width: 10%">Total</th>
                                                    <th style="width: 10%">Date created</th>
                                                    <th style="width: 20%"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- /.content -->
    @endisset
@endsection
