@extends('Admin.templates')
@section('title', $page)
@section('containt')
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
        @if (isset($users))
            <!-- Content Wrapper. Contains page content -->

            <form action="{{ route('table.search') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-11 ml-5">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" class="form-control form-control-lg"
                                    placeholder="Enter email" required value="<?php
                                    if (isset($query)) {
                                        echo $query;
                                    } ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 10%">Name</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 10%">Phone</th>
                                    <th style="width: 20%">Address</th>
                                    <th style="width: 15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td> <img style="width: 50px" src="{{ url('avatars/' . $user->avatar, []) }}"
                                                alt="">
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->phone }} </td>
                                        <td>{{ $user->address }} </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('user.remove', $user->id) }}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.content -->
            </div>
        @elseif (isset($products))
            <form action="{{ route('table.search') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-11 ml-5">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" class="form-control form-control-lg"
                                    placeholder="Enter email" required value="<?php
                                    if (isset($query)) {
                                        echo $query;
                                    } ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool">
                            <a href="{{ url('admin/product/add', []) }}">
                                <i class="fa fa-plus" aria-hidden="true"></i>

                            </a>
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 10%">Name</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 10%">Phone</th>
                                    <th style="width: 20%">Address</th>
                                    <th style="width: 15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $products)
                                    <tr>
                                        <td> <img style="width: 50px" src="{{ url('avatars/' . $products->avatar, []) }}"
                                                alt="">
                                        <td>{{ $products->name }} </td>
                                        <td>{{ $products->email }} </td>
                                        <td>{{ $products->phone }} </td>
                                        <td>{{ $products->address }} </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{ route('products.edit', $products) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('products.remove', $products) }}">
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
                </div>
                <!-- /.card -->
                <!-- /.content -->
            </div>
        @else
            <form action="{{ route('table.search') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-11 ml-5">
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" class="form-control form-control-lg"
                                    placeholder="Enter email" required value="<?php
                                    if (isset($query)) {
                                        echo $query;
                                    } ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool">
                            <a href="{{ url('admin/product/add', []) }}">
                                <i class="fa fa-plus" aria-hidden="true"></i>

                            </a>
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 10%">#</th>
                                    <th style="width: 10%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 10%"># </td>
                                    <td style="width: 10%"># </td>
                                    <td style="width: 10%"># </td>
                                    <td style="width: 10%"># </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.content -->
            </div>
        @endif

        <!-- /.content-wrapper -->
    </div>
@endsection
