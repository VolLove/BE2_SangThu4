@extends('Admin.templates')
@section('title', $page)
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
    @isset($users)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('user.search') }}" method="GET">
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
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
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
                                                        <i class="fas fa-edit"></i>

                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm "
                                                        href="{{ route('user.remove', $user->id) }}">
                                                        <i class="fas fa-trash"> </i>
                                                        Delete
                                                    </a>
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('user.changepassword', $user->id) }}">
                                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                                        Change password</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                {{ $users->links('pagination::bootstrap-5') }}

                            </div>
                            <!-- /.card -->
                            <!-- /.content -->
                        </div>
                    </div>
                </div>

            </div>

        </section>
    @endisset
    @isset($products)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="" method="GET">
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
                                                <th style="width: 10%">Tên</th>
                                                <th style="width: 10%">Hình ảnh</th>
                                                <th style="width: 10%">Loại</th>
                                                <th style="width: 10%">Hãng</th>
                                                <th style="width: 10%">Giới thiệu</th>
                                                <th style="width: 20%">Nội dung</th>
                                                <th style="width: 10%">Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->name }} </td>
                                                    <td> <img style="width: 50px"
                                                            src="{{ url('images/' . $product->image, []) }}" alt="">
                                                    <td>{{ $product->categories->name }} </td>
                                                    <td>{{ $product->manufacturer->name }} </td>
                                                    <td>{{ $product->intro }} </td>
                                                    <td style=" word-break: break-all;">
                                                        {{ Str::limit($product->description, 100) }}</td>

                                                    <td>{{ $product->price }} </td>

                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('product.edit', $product) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('product.destroy', $product->id) }}"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endisset
    @isset($manufacturer)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="" method="GET">
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
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool">
                                        <a href="{{ route('manufacter.add') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>

                                        </a>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Logo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($manufacturer as $manufacturer)
                                                <tr>
                                                    <td>{{ $manufacturer->name }} </td>
                                                    <td> <img style="width: 50px"
                                                            src="{{ url('images/' . $manufacturer->image, []) }}"
                                                            alt="">
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('manufacter.edit', $manufacturer->id) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('manufacter.destroy', $manufacturer->id) }}"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endisset
    @isset($categories)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="" method="GET">
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
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool">
                                        <a href="{{ url('admin/categoties/add', []) }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">Logo</th>
                                                <th style="width: 40%">Name</th>
                                                <th style="width: 10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td> <img style="width: 50px"
                                                            src="{{ url('images/' . $category->image, []) }}" alt="">
                                                    </td>
                                                    <td>{{ $category->name }} </td>
                                                    <td></td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('categories.edit', ['id' => 1]) }}">
                                                            <i class="fas fa-edit"></i> Edit </a>
                                                        <a class="btn btn-danger btn-sm "
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"
                                                            href="{{ route('categories.remove', $category->id) }}">
                                                            <i class="fas fa-trash">
                                                            </i> Delete </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{ $categories->links('pagination::bootstrap-5') }}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
    @isset($bills)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="" method="GET">
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
                                                <th style="width: 10%">Name user</th>
                                                <th style="width: 10%">Address</th>
                                                <th style="width: 10%">Phone</th>
                                                <th style="width: 10%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($bills as $bill)
                                                <tr>
                                                    <td style="width: 10%">{{ $bill->user->name }} </td>
                                                    <td style="width: 10%"># </td>
                                                    <td style="width: 10%"># </td>
                                                    <td style="width: 10%"># </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset

    @isset($temp)
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="" method="GET">
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
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool">
                                        <a href="{{ url('admin/temp/add', []) }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i></a>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    {{-- table conten --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endisset
@endsection
