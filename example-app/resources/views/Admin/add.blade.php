@extends('Admin.templates')
@section('title', $page)
@section('containt')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $page }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @isset($manufacturer)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('manufacter.addhandler') }}" enctype="multipart/form-data">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Manufacter name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Manufacter logo</label>
                                        <input type="file" name="image" accept="image/png, image/jpg, image/jpeg"
                                            class=" form-control-file">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a onclick="window.history.back()" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Manufacturer" class="btn btn-success float-right">
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    @endisset
    @isset($product)

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</small></h3>
                            </div>
                            <form action="{{ route('product.addhandler') }}" method="POST" roles="form"
                                enctype="multipart/form-data">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputStatus">Categories</label>
                                        <select id="inputStatus" name="cate" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            @foreach ($cates as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Manufacter</label>
                                        <select id="inputStatus" name="manu" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            @foreach ($manus as $manu)
                                                <option value="{{ $manu->id }}">{{ $manu->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea class="form-control" name="description" rows="4" value="{{ old('description') }}"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                            class=" form-control-file">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a onclick="window.history.back()" class="btn btn-secondary"
                                        class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Project" class="btn btn-success float-right">
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    @endisset
    @isset($category)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('categories.addhandler') }}" enctype="multipart/form-data">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Category name</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Category logo</label>
                                            <input type="file" name="image" accept="image/png, image/jpg, image/jpeg"
                                                class=" form-control-file">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="card-footer">
                                        <a onclick="window.history.back()" class="btn btn-secondary"
                                            class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Create new Project" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    @endisset
    @isset($temp)
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="" enctype="multipart/form-data">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @csrf
                                <div class="card-body">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="card-footer">
                                        <a onclick="window.history.back()" class="btn btn-secondary"
                                            class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Create new Project" class="btn btn-success float-right">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    @endisset


@endsection
