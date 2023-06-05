<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Produksi')

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
                            <h1><b>Edit Produksi</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Produksi</li>
                                <li class="breadcrumb-item active">Edit Produksi</li>
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
                                    <h3 class="card-title">Edit Produksi</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- form contents -->
                                <form action="{{ route('update-produksi', $produksi->id_produksi) }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tanggal Produksi</label>
                                            <input type="date" name="tgl_produksi" class="form-control"
                                                value="{{ $produksi->tgl_produksi }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Barang</label>
                                            <input type="text" name="nama_barang" class="form-control"
                                                value="{{ $produksi->nama_barang }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Bahan Baku</label>
                                            <input type="number" name="jumlah_bahan" class="form-control"
                                                value="{{ $produksi->jmlh_bahan }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Tenaga Kerja</label>
                                            <input type="number" name="jumlah_tenaga" class="form-control"
                                                value="{{ $produksi->jmlh_tenaga }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Produksi</label>
                                            <input type="number" name="jumlah_produksi" class="form-control"
                                                value="{{ $produksi->jmlh_produksi }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <input type="text" name="status" class="form-control"
                                                value="{{ $produksi->status }}" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Ubah Data</button>
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
