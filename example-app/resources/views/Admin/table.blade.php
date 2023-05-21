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
    @isset($users)
        <!-- Content Wrapper. Contains page content -->
        <form action="{{ route('user.search') }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-md-11 ml-5">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Enter email"
                                required value="<?php
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
                                            <i class="fas fa-edit"></i>

                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm " href="{{ route('user.remove', $user->id) }}">
                                            <i class="fas fa-trash"> </i>
                                            Delete
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('user.changepassword', $user->id) }}">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                            Change password</a>
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
    @endisset
    @isset($products)
<<<<<<< HEAD
        <form action="{{ route('table.search') }}" method="GET">
=======
        <form action="" method="GET">
>>>>>>> bill-table
            @csrf
            <div class="row">
                <div class="col-md-11 ml-5">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Enter email"
                                required value="<?php
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
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Loại</th>
                                <th>Hãng</th>
                                <th>Giới thiệu</th>
                                <th>Nội dung</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
<<<<<<< HEAD
                                    <td>{{ $products->name }} </td>
                                    <td> <img style="width: 50px" src="{{ url('images/' . $products->image, []) }}"
                                            alt="">
                                    <td>{{ $products->category->name }} </td>
                                    <td>{{ $products->manufacturer->name }} </td>
                                    <td>{{ $products->intro }} </td>
                                    <td>{{ $products->description }} </td>
                                    <td>{{ $products->price }} </td>
=======
                                    <td> <img style="width: 50px" src="{{ url('images/' . $product->image, []) }}"
                                            alt="">
                                    <td>{{ $product->name }} </td>
                                    <td>{{ $product->category->name }} </td>
                                    <td>{{ $product->manufacturer->image }} </td>
>>>>>>> bill-table
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="">
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
    @endisset
<<<<<<< HEAD
    @isset($manufacturer)
        <form action="{{ route('table.search') }}" method="GET">
=======
    @isset($bills)
        <form action="" method="GET">
            @csrf
            <div class="row">
                <div class="col-md-11 ml-5">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Enter email"
                                required value="<?php
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
                                <th style="width: 10%">Name user</th>
                                <th style="width: 10%">Address</th>
                                <th style="width: 10%">Phone</th>
                                <th style="width: 10%">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($bills as $bill)
                                <tr>
                                    <td style="width: 10%"># </td>
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
            <!-- /.content -->
        </div>
    @endisset
    @isset($temp)
        <form action="" method="GET">
>>>>>>> bill-table
            @csrf
            <div class="row">
                <div class="col-md-11 ml-5">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" name="search" class="form-control form-control-lg"
                                placeholder="Enter Manufacter" required value="<?php
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
<<<<<<< HEAD
                        <a href="{{ route('manufacter.add') }}">
=======
                        <a href="{{ url('admin/temp/add', []) }}">
>>>>>>> bill-table
                            <i class="fa fa-plus" aria-hidden="true"></i>

                        </a>
                    </button>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manufacturer as $manufacturer)
                                <tr>
                                    <td>{{ $manufacturer->name }} </td>
                                    <td> <img style="width: 50px" src="{{ url('images/' . $manufacturer->image, []) }}"
                                            alt="">
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('product.edit', $manufacturer) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href={{ route('manufacter.destroy', $manufacturer->id) }}"
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
            <!-- /.content -->
        </div>
    @endisset
@endsection
