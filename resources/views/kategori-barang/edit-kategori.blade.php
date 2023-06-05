<!DOCTYPE html>
<html lang="en">

<!-- Head Title -->
@extends('app-layout.head')
@section('title', 'Edit Kategori Barang')

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
                            <h1><b>Edit Kategori Barang</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kategori Barang</li>
                                <li class="breadcrumb-item active">Edit Kategori Barang</li>
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
                                <!-- card-header -->
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Edit Kategori Barang</h3>
                                </div>

                                <!-- form contents -->
                                <form action="{{ route('update-kategori', $kategoribarang->id_kategori_barang) }}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- card-body -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" id="nama_kategori" name="nama_kategori"
                                                class="form-control" value="{{ $kategoribarang->nama_kategori }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Keterangan</label>
                                            <textarea type="text" id="keterangan" name="keterangan" class="form-control"
                                                required>{{ $kategoribarang->keterangan }}</textarea>
                                        </div>
                                    </div>

                                    <!-- card-footer -->
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
