<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Tambah Supplier')

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
                            <h1><b>Tambah Supplier</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Supplier</li>
                                <li class="breadcrumb-item active">Tambah Supplier</li>
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
                                    <h3 class="card-title">Tambah Supplier</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- form contents -->
                                <form action="{{ route('simpan-supplier') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Supplier" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                            </div>
                                        </div>
                                    </div>
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
