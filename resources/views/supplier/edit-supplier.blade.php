<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Supplier')

<!-- Head -->
@include('app-layout.head')


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('app-layout.navbar')

        <!-- Main Sidebar Container -->
        @include('app-layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><b>Edit Supplier</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Supplier</li>
                                <li class="breadcrumb-item active">Edit Supplier</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Edit Supplier</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- form contents -->
                                <form action="{{ route('update-supplier', $supplier->id_supplier) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" id="nama" name="nama" class="form-control" value="{{ $supplier->nama_supplier }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control" required>{{ $supplier->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" id="email" name="email" class="form-control" value="{{ $supplier->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        @include('app-layout.footer')
    </div>
    <!-- ./wrapper -->

    <!-- script -->
    @include('app-layout.script')
    <!-- notif sweet alert -->
    @include('sweetalert::alert')
</body>

</html>
